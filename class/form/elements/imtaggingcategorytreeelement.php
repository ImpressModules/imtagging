<?php
/**
 * Creating a parent category select box
 *
 * @copyright http://smartfactory.ca The SmartFactory
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @since 1.0
 * @author marcan aka Marc-André Lanciault <marcan@smartfactory.ca>
 * 
 */
if (!defined("ICMS_ROOT_PATH")) die("ICMS root path not defined");

include_once (ICMS_ROOT_PATH . "/modules/imtagging/class/form/elements/imtaggingtrayelement.php");

class ImtaggingCategoryTreeElement extends ImtaggingTrayElement {

	function __construct($object, $key) {

		// Creating Tray
		$var = $object->vars[$key];
		parent::__construct($var['form_caption'], '', $key);

		// Creating check boxes

		$itemHandler = isset($object->controls[$key]['itemHandler']) ? $object->controls[$key]['itemHandler'] : 'category';
		$module = isset($object->controls[$key]['module']) ? $object->controls[$key]['module'] : $object->handler->_moduleName;
		$userside = isset($object->controls[$key]['userside']) ? $object->controls[$key]['userside'] : false;
		$category_handler = icms_getModulehandler('category', $module);

		$category_title_field = $category_handler->identifierName;
		$criteria = new icms_db_criteria_Compo();
		$criteria->setSort("weight, " . $category_title_field);

		$treeId = $this->getTreeId($object, $key);
		if ($treeId) {
			$criteria->add(new icms_db_criteria_Item('category_tid', $treeId));
		}

		$categories = $category_handler->getObjects($criteria);

		include_once ICMS_ROOT_PATH . "/modules/imtagging/class/form/elements/imtaggingcategorycheckboxelement.php";
		$mytree = new icms_ipf_Tree($categories, "category_id", "category_pid");
		$ret = array();
		$options = $this->getOptionArray($mytree, $category_title_field, 0, $ret);

		$check_box = new ImtaggingCategoryCheckboxElement(null, $key . "[]", $object->getVar($key, 'e'), '<br />');
		$check_box->addOptionArray($options);
		$this->addElement($check_box);

		// if userside we will use a simple select box
		if (!$userside) {
			// if admin side then we will use the full blown categories control

			// on the fly new category creation
			$new_category_label = new icms_form_elements_Label(null, '<a href="#" onclick="jQuery(\'#new_category_tray\').toggle()">' . _CO_IMTAGGING_CATEGORY_ADD . '</a><br />');
			$this->addElement($new_category_label);

			// new category container
			$new_category_tray = new ImtaggingTrayElement(null, null, 'new_category_tray');

			// new category title
			$category_text = new icms_form_elements_Text(null, 'new_category_title', 40, 255);
			$new_category_tray->addElement($category_text);

			// parent select box
			$parent_cateory_select = new icms_form_elements_Select(null, 'category_pid', 0);
			$parent_options = array(
				0 => _CO_IMTAGGING_CATEGORY_CATEGORY_PID);
			if (is_array($options)) {
				foreach ($options as $k => $v) {
					$parent_options[$k] = $v;
				}
			}
			$parent_cateory_select->addOptionArray($parent_options);
			$new_category_tray->addElement($parent_cateory_select);

			// new category button
			$butt_create = new icms_form_elements_Button('', 'create_button', _CO_ICMS_CREATE, 'button');
			$butt_create->setExtra('onclick="imtaggingAddCategory();"');
			$new_category_tray->addElement($butt_create);

			$this->addElement($new_category_tray);
		}
	}

	/**
	 * Tree whose categories are offered: the one set on the control, or the one linked to the item of the
	 * module, which is the default tree for modules without a tree of their own
	 *
	 * @return int id of the tree, 0 to offer the categories of all trees
	 */
	private function getTreeId($object, $key) {
		$treeSetting = $object->controls[$key]['tree'] ?? null;
		if ($treeSetting === 'all') {
			return 0;
		}

		if ($treeSetting) {
			return (int) $treeSetting;
		}

		$tree_handler = icms_getModuleHandler('tree', 'imtagging');

		return $tree_handler->getTreeIdForItem($object->handler->_moduleName, $object->handler->_itemname);
	}

	/**
	 * Get options for a category select with hierarchy (recursive)
	 *
	 * @param XoopsObjectTree $tree
	 * @param string $fieldName
	 * @param int $key
	 * @param array $ret
	 * @param string $prefix_curr
	 *
	 * @return array
	 */
	function getOptionArray($tree, $fieldName, $key, array &$ret, $prefix_curr = "") {
		if ($key > 0) {
			$value = $tree->_tree[$key]['obj']->getVar($tree->_myId);
			$ret[$key] = $prefix_curr . $tree->_tree[$key]['obj']->getVar($fieldName);
			$prefix_curr .= "-";
		}
		if (isset($tree->_tree[$key]['child']) && !empty($tree->_tree[$key]['child'])) {
			foreach ($tree->_tree[$key]['child'] as $childkey) {
				$this->getOptionArray($tree, $fieldName, $childkey, $ret, $prefix_curr);
			}
		}
		return $ret;
	}
}
