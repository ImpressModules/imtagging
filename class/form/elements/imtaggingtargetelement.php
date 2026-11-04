<?php
/**
 * Creating a selectbox with the module items that can use a category tree
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @package imtagging
 */
if (!defined("ICMS_ROOT_PATH")) die("ICMS root path not defined");

class ImtaggingTargetElement extends icms_form_elements_Select {

	function __construct($object, $key) {
		parent::__construct($object->vars[$key]['form_caption'], $key, $object->getVar($key, 'e'));

		$this->addOptionArray(array(
			0 => _CO_IMTAGGING_TREE_LINK_TARGET_SELECT) + $object->handler->getTargets());
	}
}
