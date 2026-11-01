<?php
/**
 * File containing onUpdate and onInstall functions for the module
 *
 * This file is included by the core in order to trigger onInstall or onUpdate functions when needed.
 * Of course, onUpdate function will be triggered when the module is updated, and onInstall when
 * the module is originally installed. The name of this file needs to be defined in the
 * icms_version.php
 *
 * <code>
 * $modversion['onInstall'] = "include/onupdate.inc.php";
 * $modversion['onUpdate'] = "include/onupdate.inc.php";
 * </code>
 *
 * @copyright http://smartfactory.ca The SmartFactory
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @since 1.0
 * @author marcan aka Marc-André Lanciault <marcan@smartfactory.ca>
 *
 */
if (!defined("ICMS_ROOT_PATH")) die("ICMS root path not defined");

// this needs to be the latest db version
define('IMTAGGING_DB_VERSION', 3);

/**
 * it is possible to define custom functions which will be call when the module is updating at the
 * correct time in update incrementation.
 * Simpy define a function named <direname_db_upgrade_db_version>
 */
/*
 * function imtagging_db_upgrade_1() {
 * }
 * function imtagging_db_upgrade_2() {
 * }
 */

function imtagging_db_upgrade_2() {
	$table = icms::$xoopsDB->prefix('imtagging_tag');
	$result = icms::$xoopsDB->queryF(sprintf("SHOW COLUMNS FROM %s LIKE 'tag_cancomment'", $table));

	if (!$result || icms::$xoopsDB->getRowsNum($result) === 0) {
		return true;
	}

	if (!icms::$xoopsDB->queryF(sprintf("ALTER TABLE %s DROP COLUMN tag_cancomment", $table))) {
		echo 'Error while removing column tag_cancomment.';
		return false;
	}

	return true;
}

/**
 * Creates the default category tree and moves the categories that have no tree to it
 */
function imtagging_ensureDefaultTree() {
	icms_loadLanguageFile('imtagging', 'common');
	$tree_handler = icms_getModuleHandler('tree', 'imtagging');
	$tree_handler->ensureDefaultTree();
}

function icms_module_update_imtagging($module) {
	/**
	 * Using the IcmsDatabaseUpdater to automaticallly manage the database upgrade dynamically
	 * according to the class defined in the module
	 */
	$icmsDatabaseUpdater = icms_db_legacy_Factory::getDatabaseUpdater();
	$icmsDatabaseUpdater->moduleUpgrade($module);
	imtagging_ensureDefaultTree();
	return true;
}

function icms_module_install_imtagging($module) {
	imtagging_ensureDefaultTree();
	return true;
}
