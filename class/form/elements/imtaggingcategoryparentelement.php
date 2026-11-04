<?php
/**
 * Creating a parent category select box that only offers the categories of the tree of the category
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @package imtagging
 */
if (!defined("ICMS_ROOT_PATH")) die("ICMS root path not defined");

class ImtaggingCategoryparentElement extends icms_form_elements_Select {

	function __construct($object, $key) {
		parent::__construct($object->vars[$key]['form_caption'], $key, $object->getVar($key, 'e'));

		$tree_handler = icms_getModuleHandler('tree', 'imtagging');
		$treeId = (int) $object->getVar('category_tid', 'e') ?: $tree_handler->getDefaultTreeId();

		$criteria = new icms_db_criteria_Compo();
		$criteria->add(new icms_db_criteria_Item('category_tid', $treeId));
		$criteria->add(new icms_db_criteria_Item('category_id', (int) $object->id(), '<>'));
		$criteria->setSort('weight, category_title');

		$categories = $object->handler->getObjects($criteria);
		$categoryTree = new icms_ipf_Tree($categories, 'category_id', 'category_pid');

		$options = array(0 => '----');
		$this->collectOptions($categoryTree, 0, '', $options);
		$this->addOptionArray($options);
	}

	private function collectOptions($categoryTree, $key, $prefix, array &$options) {
		if ($key > 0) {
			$options[$key] = $prefix . $categoryTree->_tree[$key]['obj']->getVar('category_title');
			$prefix .= '-';
		}

		foreach ($categoryTree->_tree[$key]['child'] ?? array() as $childKey) {
			$this->collectOptions($categoryTree, $childKey, $prefix, $options);
		}
	}
}
