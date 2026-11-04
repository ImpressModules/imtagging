<?php
/**
 * Classes responsible for linking a module item to the category tree it uses
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @package imtagging
 */
if (!defined("ICMS_ROOT_PATH")) die("ICMS root path not defined");

class ImtaggingTree_link extends icms_ipf_Object {

	/**
	 * Constructor
	 *
	 * @param object $handler ImtaggingTree_linkHandler object
	 */
	public function __construct(&$handler) {
		parent::__construct($handler);

		$this->quickInitVar('tree_link_id', XOBJ_DTYPE_INT, true);
		$this->quickInitVar('tree_link_tid', XOBJ_DTYPE_INT, true);
		$this->quickInitVar('tree_link_target', XOBJ_DTYPE_TXTBOX, true);

		$this->setControl('tree_link_tid', array(
			'itemHandler' => 'tree',
			'method' => 'getTreeList',
			'module' => 'imtagging'));
		$this->setControl('tree_link_target', 'target');
	}

	function getVar($key, $format = 's') {
		if ($format == 's' && in_array($key, array('tree_link_tid', 'tree_link_target'))) {
			return call_user_func(array($this, $key));
		}

		return parent::getVar($key, $format);
	}

	function tree_link_tid() {
		$tree_handler = icms_getModuleHandler('tree', 'imtagging');
		$treeObj = $tree_handler->get($this->getVar('tree_link_tid', 'e'));

		return $treeObj && !$treeObj->isNew() ? $treeObj->getVar('tree_title') : '';
	}

	function tree_link_target() {
		return $this->handler->getTargetLabel($this->getVar('tree_link_target', 'e'));
	}
}

class ImtaggingTree_linkHandler extends icms_ipf_Handler {

	/**
	 * Constructor
	 */
	public function __construct(&$db) {
		parent::__construct($db, 'tree_link', 'tree_link_id', 'tree_link_target', '', 'imtagging');
	}

	/**
	 * @return string key used to store a module item, like 'imblogging/post'
	 */
	public function getTargetKey($moduleDirname, $itemName): string {
		return $moduleDirname . '/' . $itemName;
	}

	/**
	 * @return int id of the tree linked to the module item, 0 when none is linked
	 */
	public function getTreeIdForTarget($moduleDirname, $itemName): int {
		$criteria = new icms_db_criteria_Item('tree_link_target', $this->getTargetKey($moduleDirname, $itemName));
		$rows = $this->query('SELECT tree_link_tid FROM ' . $this->table, $criteria);

		return $rows ? (int) $rows[0]['tree_link_tid'] : 0;
	}

	/**
	 * @return array<string, string> all module items that can use a tree, indexed by target key
	 */
	public function getTargets(): array {
		$module_handler = icms::handler('icms_module');
		$criteria = new icms_db_criteria_Compo();
		$criteria->add(new icms_db_criteria_Item('isactive', true));
		$criteria->setSort('name');

		$ret = array();
		foreach ($module_handler->getObjects($criteria) as $moduleObj) {
			$moduleObj->loadInfo($moduleObj->getVar('dirname'));
			foreach ($moduleObj->modinfo['object_items'] ?? array() as $itemName) {
				$ret[$this->getTargetKey($moduleObj->getVar('dirname'), $itemName)] = $moduleObj->getVar('name') . ' - ' . $itemName;
			}
		}

		return $ret;
	}

	public function getTargetLabel($target): string {
		return $this->getTargets()[$target] ?? (string) $target;
	}

	/**
	 * A module item uses one tree only: an earlier link for the same item is replaced
	 */
	function beforeSave(&$obj) {
		$criteria = new icms_db_criteria_Compo();
		$criteria->add(new icms_db_criteria_Item('tree_link_target', $obj->getVar('tree_link_target', 'e')));
		$criteria->add(new icms_db_criteria_Item('tree_link_id', (int) $obj->id(), '<>'));
		$this->deleteAll($criteria);

		return true;
	}
}
