<?php
/**
 * Classes responsible for managing imTagging category tree objects
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @package imtagging
 */
if (!defined("ICMS_ROOT_PATH")) die("ICMS root path not defined");

class ImtaggingTree extends icms_ipf_Object {

	/**
	 * Constructor
	 *
	 * @param object $handler ImtaggingTreeHandler object
	 */
	public function __construct(&$handler) {
		parent::__construct($handler);

		$this->quickInitVar('tree_id', XOBJ_DTYPE_INT, true);
		$this->quickInitVar('tree_title', XOBJ_DTYPE_TXTBOX, true);
		$this->quickInitVar('tree_description', XOBJ_DTYPE_TXTAREA);
		$this->quickInitVar('tree_default', XOBJ_DTYPE_INT, false, false, false, 0);
		$this->initCommonVar('weight');

		$this->setControl('tree_default', 'yesno');
	}

	function getVar($key, $format = 's') {
		if ($format == 's' && $key == 'tree_default') {
			return $this->tree_default();
		}

		return parent::getVar($key, $format);
	}

	function tree_default() {
		return $this->getVar('tree_default', 'e') ? _YES : _NO;
	}
}

class ImtaggingTreeHandler extends icms_ipf_Handler {

	/**
	 * Constructor
	 */
	public function __construct(&$db) {
		parent::__construct($db, 'tree', 'tree_id', 'tree_title', 'tree_description', 'imtagging');
	}

	/**
	 * Id of the tree used by every module that has no tree of its own
	 *
	 * @return int id of the default tree, 0 when there are no trees
	 */
	public function getDefaultTreeId(): int {
		$rows = $this->query('SELECT tree_id FROM ' . $this->table . ' WHERE tree_default = 1 ORDER BY tree_id', null);
		if ($rows) {
			return (int) $rows[0]['tree_id'];
		}

		$rows = $this->query('SELECT tree_id FROM ' . $this->table . ' ORDER BY weight, tree_id', null);

		return $rows ? (int) $rows[0]['tree_id'] : 0;
	}

	/**
	 * Id of the tree a module item has to use, the default tree when none is linked
	 *
	 * @param string $moduleDirname dirname of the module
	 * @param string $itemName name of the object of the module
	 * @return int id of the tree
	 */
	public function getTreeIdForItem($moduleDirname, $itemName): int {
		$tree_link_handler = icms_getModuleHandler('tree_link', 'imtagging');
		$treeId = $tree_link_handler->getTreeIdForTarget($moduleDirname, $itemName);

		return $treeId ?: $this->getDefaultTreeId();
	}

	/**
	 * @return array<int, string> titles of all trees, indexed by their id
	 */
	public function getTreeList(): array {
		$criteria = new icms_db_criteria_Compo();
		$criteria->setSort('weight, tree_title');

		$ret = array();
		foreach ($this->getObjects($criteria, true) as $treeObj) {
			$ret[$treeObj->id()] = $treeObj->getVar('tree_title', 'e');
		}

		return $ret;
	}

	/**
	 * Makes sure a default tree exists and that every category belongs to a tree
	 *
	 * @return int id of the default tree
	 */
	public function ensureDefaultTree(): int {
		$treeId = $this->getDefaultTreeId();

		if (!$treeId) {
			$treeObj = $this->create();
			$treeObj->setVar('tree_title', _CO_IMTAGGING_TREE_DEFAULT_TITLE);
			$treeObj->setVar('tree_default', 1);
			$this->insert($treeObj, true);
			$treeId = (int) $treeObj->id();
		}

		$category_handler = icms_getModuleHandler('category', 'imtagging');
		$this->db->queryF(sprintf('UPDATE %s SET category_tid = %d WHERE category_tid = 0', $category_handler->table, $treeId));

		return $treeId;
	}

	/**
	 * Only one tree can be the default tree, and there always has to be one
	 */
	function beforeSave(&$obj) {
		if ($obj->getVar('tree_default', 'e')) {
			return true;
		}

		$currentDefault = $this->getDefaultTreeId();
		if ($currentDefault && $currentDefault == $obj->id()) {
			$obj->setVar('tree_default', 1);
		}

		return true;
	}

	function afterSave(&$obj) {
		if ($obj->getVar('tree_default', 'e')) {
			$this->db->queryF(sprintf('UPDATE %s SET tree_default = 0 WHERE tree_id <> %d', $this->table, (int) $obj->id()));
		}

		return true;
	}

	/**
	 * The default tree and trees that still contain categories cannot be deleted
	 */
	function beforeDelete(&$obj) {
		if ($obj->getVar('tree_default', 'e')) {
			$obj->setErrors(_AM_IMTAGGING_TREE_DELETE_DEFAULT);

			return false;
		}

		$category_handler = icms_getModuleHandler('category', 'imtagging');
		$criteria = new icms_db_criteria_Item('category_tid', (int) $obj->id());
		if ($category_handler->getCount($criteria) > 0) {
			$obj->setErrors(_AM_IMTAGGING_TREE_DELETE_NOT_EMPTY);

			return false;
		}

		return true;
	}

	function afterDelete(&$obj) {
		$tree_link_handler = icms_getModuleHandler('tree_link', 'imtagging');
		$tree_link_handler->deleteAll(new icms_db_criteria_Item('tree_link_tid', (int) $obj->id()));

		return true;
	}
}
