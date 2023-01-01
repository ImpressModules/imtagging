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
		$this->quickInitVar('category_pid', XOBJ_DTYPE_INT, false);
		$this->quickInitVar('category_title', XOBJ_DTYPE_TXTBOX);
		$this->quickInitVar('category_description', XOBJ_DTYPE_TXTAREA);
		$this->initCommonVar('weight');

		$this->setControl('category_pid', array(
			'name' => 'parentcategory'));

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
			'category_pid'))) {
			return call_user_func(array(
				$this,
				$key));
		}
		return parent::getVar($key, $format);
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
		} else {
			return '';
		}
	}

	/**
	 * Returns the need to br
	 *
	 * @return bool true | false
	 */
	function need_do_br() {
		global $icmsConfig;

		$imtagging_module = icms_getModuleInfo('imtagging');
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
		return true;
	}
}
