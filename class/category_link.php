<?php
/**
 * Classes responsible for managing imTagging category_link link objects
 *
 * @copyright http://smartfactory.ca The SmartFactory
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @since 1.0
 * @author marcan aka Marc-André Lanciault <marcan@smartfactory.ca>
 * 
 */
if (!defined("ICMS_ROOT_PATH")) die("ICMS root path not defined");

class ImtaggingCategory_link extends icms_ipf_Object {

	/**
	 * Constructor
	 *
	 * @param object $handler ImtaggingCategory_linkHandler object
	 */
	public function __construct(&$handler) {
		parent::__construct($handler);

		$this->quickInitVar('category_link_id', XOBJ_DTYPE_INT, true);
		$this->quickInitVar('category_link_cid', XOBJ_DTYPE_INT, false);
		$this->quickInitVar('category_link_mid', XOBJ_DTYPE_INT, false);
		$this->quickInitVar('category_link_item', XOBJ_DTYPE_TXTBOX);
		$this->quickInitVar('category_link_iid', XOBJ_DTYPE_INT);

		$this->setControl('category_link_cid', array(
			'name' => 'categorytree',
			'itemHandler' => 'category',
			'module' => 'imtagging',
			'tree' => 'all'));

		$this->setControl('category_link_mid', array(
			'name' => 'module',
			'onSelect' => 'submit'));
		$this->setControl('category_link_item', array(
			'name' => 'item',
			'onSelect' => 'submit'));
		$this->setControl('category_link_iid', 'itemid');
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
			'category_link_cid',
			'category_link_mid',
			'category_link_iid'))) {
			return call_user_func(array(
				$this,
				$key));
		}
		return parent::getVar($key, $format);
	}

	function category_link_cid() {
		$icms_persistable_registry = icms_ipf_registry_Handler::getInstance();
		$ret = $this->getVar('category_link_cid', 'e');
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

	function category_link_mid() {
		$mid = $this->getVar('category_link_mid', 'e');
		$moduleObj = $this->getCategory_linkModule();
		if ($moduleObj) {
			return '<a href="' . ICMS_MODULES_URL . '/' . $moduleObj->getVar('dirname') . '/">' . $moduleObj->getVar('name') . '</a>';
		} else {
			return '';
		}
	}

	function getCategory_linkModule() {
		$module_handler = icms::handler('icms_module');
		return $module_handler->get($this->getVar('category_link_mid', 'e'));
	}

	function category_link_iid() {
		$iid = $this->getVar('category_link_iid', 'e');
		$moduleObj = $this->getCategory_linkModule();
		$itemName = $this->getVar('category_link_item', 'e');
		if (!$moduleObj || !$itemName) {
			return '';
		}

		$category_link_module_handler = icms_getModulehandler($itemName, $moduleObj->getVar('dirname'), 'imtagging', true);
		if (!$category_link_module_handler) {
			return '';
		}

		$category_link_object = $category_link_module_handler->get($iid);
		if ($category_link_object && !$category_link_object->isNew()) {
			return $category_link_object->getItemLink();
		} else {
			return '';
		}
	}
}

class ImtaggingCategory_linkHandler extends icms_ipf_Handler {

	/**
	 * Constructor
	 */
	public function __construct(&$db) {
		parent::__construct($db, 'category_link', 'category_link_id', 'category_link_iid', '', 'imtagging');
	}

	/**
	 * retrieve category_ids for an object
	 *
	 * @param int $iid id of the related object
	 * @param object IcmsPersistableHandler
	 * @return array array of category_ids
	 */
	function getCategoriesForObject($iid, &$handler) {
		$moduleObj = icms_getModuleInfo($handler->_moduleName);

		$criteria = new icms_db_criteria_Compo();
		$criteria->add(new icms_db_criteria_Item('category_link_mid', $moduleObj->getVar("mid")));
		$criteria->add(new icms_db_criteria_Item('category_link_item', $handler->_itemname));
		$criteria->add(new icms_db_criteria_Item('category_link_iid', $iid));
		$sql = 'SELECT category_link_cid FROM ' . $this->table;
		$rows = $this->query($sql, $criteria);
		$ret = array();
		foreach ($rows as $row) {
			$ret[] = $row['category_link_cid'];
		}
		return $ret;
	}

	/**
	 * retrieve categories that are linked to an array of object ids
	 *
	 * @param array $iids array of object ids
	 * @param object $handler IcmsPersistableHandler
	 * @return array array of ImtaggingCategory objects
	 */
	function getCategoriesFromObjectIds($iids, &$handler) {
		if (empty($iids)) {
			return array();
		}

		$moduleObj = icms_getModuleInfo($handler->_moduleName);
		$criteria = new icms_db_criteria_Compo();
		$criteria->add(new icms_db_criteria_Item('category_link_mid', $moduleObj->getVar("mid")));
		$criteria->add(new icms_db_criteria_Item('category_link_item', $handler->_itemname));
		$criteria->add(new icms_db_criteria_Item('category_link_iid', '(' . implode(', ', array_map('intval', $iids)) . ')', 'IN'));

		$sql = 'SELECT category_link_cid, category_link_iid FROM ' . $this->table;
		$rows = $this->query($sql, $criteria);

		$category_ids = array();
		$iids_by_cid = array();
		foreach ($rows as $row) {
			$iids_by_cid[$row['category_link_cid']][] = $row['category_link_iid'];
		}

		if (empty($iids_by_cid)) {
			return array();
		}

		$imtagging_category_handler = icms_getModulehandler('category', 'imtagging');
		$criteria = new icms_db_criteria_Compo();
		$criteria->add(new icms_db_criteria_Item('category_id', '(' . implode(', ', array_map('intval', array_keys($iids_by_cid))) . ')', 'IN'));
		$ret = $imtagging_category_handler->getObjects($criteria);

		// add iids to each categoryObj
		foreach ($ret as $categoryObj) {
			$categoryObj->items[$handler->_moduleName][$handler->_itemname] = $iids_by_cid[$categoryObj->id()];
		}
		return $ret;
	}

	function getItemidsForCategory($cid, &$handler) {
		$moduleObj = icms_getModuleInfo($handler->_moduleName);

		$criteria = new icms_db_criteria_Compo();
		$criteria->add(new icms_db_criteria_Item('category_link_mid', $moduleObj->getVar('mid')));
		$criteria->add(new icms_db_criteria_Item('category_link_item', $handler->_itemname));
		$imtagging_category_handler = icms_getModulehandler('category', 'imtagging');
		$categoryIds = array_merge(array((int) $cid), $imtagging_category_handler->getDescendantIds($cid));
		$criteria->add(new icms_db_criteria_Item('category_link_cid', '(' . implode(', ', $categoryIds) . ')', 'IN'));
		$sql = 'SELECT DISTINCT category_link_iid FROM ' . $this->table;
		$rows = $this->query($sql, $criteria);
		$ret = array();
		foreach ($rows as $row) {
			$ret[] = $row['category_link_iid'];
		}
		return $ret;
	}

	/**
	 * Keeps only the categories that belong to the tree the item has to use
	 *
	 * @param object $obj object that gets the categories
	 * @param mixed $categoryIds ids of the selected categories
	 * @return mixed the ids that belong to the tree, or the unchanged value when it is no array
	 */
	function filterCategoriesOfTree(&$obj, $categoryIds) {
		if (!is_array($categoryIds) || !$categoryIds) {
			return $categoryIds;
		}

		$tree_handler = icms_getModuleHandler('tree', 'imtagging');
		$treeId = $tree_handler->getTreeIdForItem($obj->handler->_moduleName, $obj->handler->_itemname);

		$criteria = new icms_db_criteria_Compo();
		$criteria->add(new icms_db_criteria_Item('category_id', '(' . implode(', ', array_map('intval', $categoryIds)) . ')', 'IN'));
		$criteria->add(new icms_db_criteria_Item('category_tid', $treeId));

		$category_handler = icms_getModuleHandler('category', 'imtagging');
		$allowedIds = array_map('intval', array_keys($category_handler->getObjects($criteria, true)));

		return array_values(array_filter($categoryIds, function ($id) use ($allowedIds) {
			return in_array((int) $id, $allowedIds, true);
		}));
	}

	function deleteAllForObject(&$obj) {
		/**
		 *
		 * @todo: add $moduleObj as a static var
		 */
		$moduleObj = icms_getModuleInfo($obj->handler->_moduleName);
		$mid = $moduleObj->getVar("mid");

		$criteria = new icms_db_criteria_Compo();
		$criteria->add(new icms_db_criteria_Item('category_link_mid', $mid));
		$criteria->add(new icms_db_criteria_Item('category_link_item', $obj->handler->_itemname));
		$criteria->add(new icms_db_criteria_Item('category_link_iid', $obj->id()));

		$this->deleteAll($criteria);
	}

	function storeCategoriesForObject(&$obj, $category_var = 'categories') {
		/**
		 *
		 * @todo: check if categories have changed and if so don't do anything
		 */

		// delete all current categories linked to this object
		$this->deleteAllForObject($obj);

		$moduleObj = icms_getModuleInfo($obj->handler->_moduleName);

		$category_array = $this->filterCategoriesOfTree($obj, $obj->getVar($category_var));

		if (is_array($category_array)) {
			foreach ($category_array as $category) {
				$category_linkObj = $this->create();
				$category_linkObj->setVar('category_link_mid', $moduleObj->getVar("mid"));
				$category_linkObj->setVar('category_link_item', $obj->handler->_itemname);
				$category_linkObj->setVar('category_link_iid', $obj->id());
				$category_linkObj->setVar('category_link_cid', $category);
				$this->insert($category_linkObj);
			}
		}
	}
}
