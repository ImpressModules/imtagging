<?php
/**
 * Classes responsible for managing imTagging category objects
 *
 * @copyright http://smartfactory.ca The SmartFactory
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @since 1.0
 * @author marcan aka Marc-André Lanciault <marcan@smartfactory.ca>
 * 
 */
if (!defined("ICMS_ROOT_PATH")) die("ICMS root path not defined");

icms_loadLanguageFile('imtagging', 'common');

class ImtaggingCategory extends icms_ipf_seo_Object {
	public $items = false;

	/**
	 * Constructor
	 *
	 * @param object $handler ImtaggingCategoryHandler object
	 */
	public function __construct(&$handler) {
		parent::__construct($handler);

		$this->quickInitVar('category_id', XOBJ_DTYPE_INT, true);
		$this->quickInitVar('category_tid', XOBJ_DTYPE_INT, false);
		$this->quickInitVar('category_pid', XOBJ_DTYPE_INT, false);
		$this->quickInitVar('category_title', XOBJ_DTYPE_TXTBOX);
		$this->quickInitVar('category_description', XOBJ_DTYPE_TXTAREA);
		$this->initCommonVar('weight');

		$this->setControl('category_tid', array(
			'itemHandler' => 'tree',
			'method' => 'getTreeList',
			'module' => 'imtagging',
			'onSelect' => 'submit'));

		$this->setControl('category_pid', array(
			'name' => 'categoryparent'));

		$this->initiateSEO();
	}

	/**
	 * Overriding the IcmsPersistableObject::getVar method to assign a custom method on some
	 * specific fields to handle the value before returning it
	 *
	 * @param str $key key of the field
	 * @param str $format format that is requested
	 * @return mixed value of the field that is requested
	 */
	function getVar($key, $format = 's') {
		if ($format == 's' && in_array($key, array(
			'category_pid',
			'category_tid'))) {
			return call_user_func(array(
				$this,
				$key));
		}
		return parent::getVar($key, $format);
	}

	function category_tid() {
		$tree_handler = icms_getModuleHandler('tree', 'imtagging');
		$treeObj = $tree_handler->get($this->getVar('category_tid', 'e'));

		return $treeObj && !$treeObj->isNew() ? $treeObj->getVar('tree_title') : '';
	}

	function category_pid() {
		$icms_persistable_registry = icms_ipf_registry_Handler::getInstance();
		$ret = $this->getVar('category_pid', 'e');
		$obj = $icms_persistable_registry->getSingleObject('category', $ret, 'imtagging');

		if ($obj && !$obj->isNew()) {
			if (defined('XOOPS_CPFUNC_LOADED')) {
				$ret = $obj->getAdminViewItemLink();
			} else {
				$ret = $obj->getItemLink();
			}

			return $ret;
		}

		return '';
	}

	/**
	 * Returns the need to br
	 *
	 * @return bool true | false
	 */
	function need_do_br() {
		global $icmsConfig;

		$imtagging_module = icms_getModuleInfo('imtagging');
		if (!is_object(icms::$user)) {
			return true;
		}

		$groups = icms::$user->getGroups();

		$editor_default = $icmsConfig['editor_default'];
		$gperm_handler = icms::handler('icms_member_groupperm');
		if (file_exists(ICMS_EDITOR_PATH . "/" . $editor_default . "/xoops_version.php") && $gperm_handler->checkRight('use_wysiwygeditor', $imtagging_module->getVar("mid"), $groups)) {
			return false;
		} else {
			return true;
		}
	}
}

class ImtaggingCategoryHandler extends icms_ipf_Handler {
	public $parentName = 'category_pid';

	/**
	 * Constructor
	 */
	public function __construct(&$db) {
		parent::__construct($db, 'category', 'category_id', 'category_title', 'category_description', 'imtagging');
	}

	/**
	 * Get the ids of all categories below a category, at any depth
	 *
	 * @param int $categoryId id of the parent category
	 * @return array<int, int> ids of all descendants
	 */
	function getDescendantIds($categoryId) {
		$childrenByParent = array();
		$rows = $this->query('SELECT category_id, category_pid FROM ' . $this->table, null);
		foreach ((array) $rows as $row) {
			$childrenByParent[(int) $row['category_pid']][] = (int) $row['category_id'];
		}

		$descendants = array();
		$queue = array((int) $categoryId);
		while ($queue) {
			$current = array_shift($queue);
			foreach ($childrenByParent[$current] ?? array() as $childId) {
				if (in_array($childId, $descendants, true)) {
					continue;
				}

				$descendants[] = $childId;
				$queue[] = $childId;
			}
		}

		return $descendants;
	}

	function getCategoryName($category_id) {
		$icms_persistable_registry = icms_ipf_registry_Handler::getInstance();
		$catgeoryObj = $icms_persistable_registry->getSingleObject('category', $category_id, 'imtagging');
		if ($catgeoryObj && !$catgeoryObj->isNew()) {
			return $catgeoryObj->getVar('category_title');
		} else {
			return false;
		}
	}

	/**
	 * BeforeSave event
	 *
	 * Event automatically triggered by IcmsPersistable Framework before the object is inserted or updated.
	 *
	 * @param object $obj ImtaggingCategory object
	 * @return true
	 */
	function beforeSave(&$obj) {
		$obj->setVar('dobr', $obj->need_do_br());

		if (!$obj->getVar('category_tid', 'e')) {
			$tree_handler = icms_getModuleHandler('tree', 'imtagging');
			$obj->setVar('category_tid', $tree_handler->getDefaultTreeId());
		}

		$parentId = (int) $obj->getVar('category_pid', 'e');
		if (!$parentId) {
			return true;
		}

		$invalidParents = array_merge(array((int) $obj->id()), $this->getDescendantIds($obj->id()));
		if (in_array($parentId, $invalidParents, true)) {
			$obj->setErrors(_AM_IMTAGGING_CATEGORY_INVALID_PARENT);

			return false;
		}

		$parentObj = $this->get($parentId);
		if ($parentObj->isNew() || $parentObj->getVar('category_tid', 'e') != $obj->getVar('category_tid', 'e')) {
			$obj->setErrors(_AM_IMTAGGING_CATEGORY_PARENT_OTHER_TREE);

			return false;
		}

		return true;
	}

	/**
	 * AfterSave event
	 *
	 * Moves the descendants of a category along when it moves to another tree
	 *
	 * @param object $obj ImtaggingCategory object
	 * @return true
	 */
	function afterSave(&$obj) {
		$descendantIds = $this->getDescendantIds($obj->id());
		if ($descendantIds) {
			$this->db->queryF(sprintf(
				'UPDATE %s SET category_tid = %d WHERE category_id IN (%s)',
				$this->table,
				(int) $obj->getVar('category_tid', 'e'),
				implode(', ', $descendantIds)
			));
		}

		return true;
	}

	/**
	 * AfterDelete event
	 *
	 * Removes the links to the deleted category and moves its children up one level
	 *
	 * @param object $obj ImtaggingCategory object
	 * @return true
	 */
	function afterDelete(&$obj) {
		$categoryId = (int) $obj->getVar('category_id', 'e');
		$parentId = (int) $obj->getVar('category_pid', 'e');

		$this->db->queryF(sprintf(
			'UPDATE %s SET category_pid = %d WHERE category_pid = %d',
			$this->table,
			$parentId,
			$categoryId
		));

		$category_link_handler = icms_getModuleHandler('category_link', 'imtagging');
		$criteria = new icms_db_criteria_Item('category_link_cid', $categoryId);
		$category_link_handler->deleteAll($criteria);

		return true;
	}
}
