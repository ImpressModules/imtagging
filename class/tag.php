<?php
/**
 * Classes responsible for managing imTagging tag objects
 *
 * @copyright http://smartfactory.ca The SmartFactory
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @since 1.0
 * @author marcan aka Marc-André Lanciault <marcan@smartfactory.ca>
 *
 */
if (!defined("ICMS_ROOT_PATH")) die("ICMS root path not defined");

class ImtaggingTag extends icms_ipf_seo_Object {

	/**
	 * Constructor
	 *
	 * @param object $handler ImtaggingTagHandler object
	 */
	public function __construct(&$handler) {
		parent::__construct($handler);

		$this->quickInitVar('tag_id', XOBJ_DTYPE_INT, true);
		$this->quickInitVar('tag_title', XOBJ_DTYPE_TXTBOX);
		$this->quickInitVar('tag_description', XOBJ_DTYPE_TXTAREA);
		$this->quickInitVar('tag_created_date', XOBJ_DTYPE_LTIME);
		$this->quickInitVar('tag_uid', XOBJ_DTYPE_INT);

		$this->setControl('tag_uid', 'user');

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
			'tag_uid'))) {
			return call_user_func(array(
				$this,
				$key));
		}
		return parent::getVar($key, $format);
	}

	/**
	 * Retrieving the name of the tager, linked to his profile
	 *
	 * @return str name of the tager
	 */
	function tag_uid() {
		return icms_member_user_Handler::getUserLink($this->getVar('tag_uid', 'e'));
	}

	/**
	 * Everybody can view a tag
	 *
	 * @param string $perm_name specific permission to check
	 * @return bool
	 */
	function accessGranted($perm_name = null) {
		return true;
	}

	/**
	 * Check to see if the current user can edit or delete this tag
	 *
	 * @return bool true if he can, false if not
	 */
	function userCanEditAndDelete() {
		global $imtagging_isAdmin;

		if (!is_object(icms::$user)) {
			return false;
		}

		if ($imtagging_isAdmin) {
			return true;
		}

		return $this->getVar('tag_uid', 'e') == icms::$user->getVar('uid');
	}
}

class ImtaggingTagHandler extends icms_ipf_Handler {

	/**
	 * Constructor
	 */
	public function __construct(&$db) {
		parent::__construct($db, 'tag', 'tag_id', 'tag_title', 'tag_description', 'imtagging');
	}

	/**
	 * Check if the current user can submit a new tag or not
	 *
	 * @return bool true if he can false if not
	 */
	public function userCanSubmit() {
		global $imtagging_isAdmin;

		if (!is_object(icms::$user)) {
			return false;
		}

		if ($imtagging_isAdmin) {
			return true;
		}

		$imtaggingConfig = icms_getModuleConfig(basename(dirname(__DIR__)));
		$tagerGroups = (array) ($imtaggingConfig['tager_groups'] ?? []);

		return count(array_intersect($tagerGroups, icms::$user->getGroups())) > 0;
	}

	public function getTagsCriteria($start = 0, $limit = 0, $userid = false, $year = false, $month = false) {
		$criteria = new icms_db_criteria_Compo();

		if ($start) {
			$criteria->setStart((int) $start);
		}

		if ($limit) {
			$criteria->setLimit((int) $limit);
		}

		$criteria->setSort('tag_created_date');
		$criteria->setOrder('DESC');

		if ($userid) {
			$criteria->add(new icms_db_criteria_Item('tag_uid', (int) $userid));
		}

		if ($year && $month) {
			$criteriaYearMonth = new icms_db_criteria_Compo();
			$criteriaYearMonth->add(new icms_db_criteria_Item('MONTH(FROM_UNIXTIME(tag_created_date))', (int) $month));
			$criteriaYearMonth->add(new icms_db_criteria_Item('YEAR(FROM_UNIXTIME(tag_created_date))', (int) $year));
			$criteria->add($criteriaYearMonth);
		}

		return $criteria;
	}

	public function getTags($start = 0, $limit = 0, $userid = false, $year = false, $month = false): array {
		$criteria = $this->getTagsCriteria($start, $limit, $userid, $year, $month);

		return (array) $this->getObjects($criteria, true, false);
	}

	public function getTagsCount($userid = false, $year = false, $month = false): int {
		$criteria = $this->getTagsCriteria(false, false, $userid, $year, $month);

		return (int) $this->getCount($criteria);
	}
}
