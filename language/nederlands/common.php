<?php
/**
 * Dutch language constants commonly used in the module
 *
 * @copyright http://smartfactory.ca The SmartFactory
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @since 1.0
 * @author marcan aka Marc-André Lanciault <marcan@smartfactory.ca> (english)
 * @author McDonald (translation into dutch)
 * 
 */
if (!defined('ICMS_ROOT_PATH')) die('ICMS root path not defined');

// category
define('_CO_IMTAGGING_CATEGORY_CATEGORY_TITLE', 'Titel');
define('_CO_IMTAGGING_CATEGORY_CATEGORY_TITLE_DSC', '');
define('_CO_IMTAGGING_CATEGORY_CATEGORY_DESCRIPTION', 'Omschrijving');
define('_CO_IMTAGGING_CATEGORY_CATEGORY_DESCRIPTION_DSC', '');
define('_CO_IMTAGGING_CATEGORY_CATEGORY_CREATED_DATE', 'Aanmaak datum');
define('_CO_IMTAGGING_CATEGORY_CATEGORY_CREATED_DATE_DSC', '');
define('_CO_IMTAGGING_CATEGORY_CATEGORY_PID', 'Hoofd categorie');
define('_CO_IMTAGGING_CATEGORY_CATEGORY_PID_DSC', '');

// category link
define('_CO_IMTAGGING_CATEGORY_LINK_CATEGORY_LINK_CID', 'Categorie');
define('_CO_IMTAGGING_CATEGORY_LINK_CATEGORY_LINK_CID_DSC', '');
define('_CO_IMTAGGING_CATEGORY_LINK_CATEGORY_LINK_MID', 'Module');
define('_CO_IMTAGGING_CATEGORY_LINK_CATEGORY_LINK_MID_DSC', '');
define('_CO_IMTAGGING_CATEGORY_LINK_CATEGORY_LINK_ITEM', 'Item');
define('_CO_IMTAGGING_CATEGORY_LINK_CATEGORY_LINK_ITEM_DSC', '');
define('_CO_IMTAGGING_CATEGORY_LINK_CATEGORY_LINK_IID', 'Gelinkt item');
define('_CO_IMTAGGING_CATEGORY_LINK_CATEGORY_LINK_IID_DSC', '');
define('_CO_IMTAGGING_CATEGORY_LINK_MID_SELECT', 'Selekteer een module...');
define('_CO_IMTAGGING_CATEGORY_LINK_ITEM_SELECT', 'Selekteer een item...');
define('_CO_IMTAGGING_CATEGORY_LINK_IID_SELECT', 'Selekteer een objekt...');

// tag
define('_CO_IMTAGGING_TAG_TAG_TITLE', 'Titel');
define('_CO_IMTAGGING_TAG_TAG_TITLE_DSC', '');
define('_CO_IMTAGGING_TAG_TAG_DESCRIPTION', 'Omschrijving');
define('_CO_IMTAGGING_TAG_TAG_DESCRIPTION_DSC', '');
define('_CO_IMTAGGING_TAG_TAG_CREATED_DATE', 'Aanmaak datum');
define('_CO_IMTAGGING_TAG_TAG_CREATED_DATE_DSC', '');
define('_CO_IMTAGGING_TAG_TAG_UID', 'Gemaakt door');
define('_CO_IMTAGGING_TAG_TAG_UID_DSC', '');

define('_CO_IMTAGGING_CATEGORY_ADD', '+ Nieuwe categorie toevoegen');
if (!defined("_CO_IMTAGGING_CATEGORY_CATEGORY_TID")) {
	define("_CO_IMTAGGING_CATEGORY_CATEGORY_TID", "Categorieboom");
}
if (!defined("_CO_IMTAGGING_CATEGORY_CATEGORY_TID_DSC")) {
	define("_CO_IMTAGGING_CATEGORY_CATEGORY_TID_DSC", "Wijzigen van de boom laadt de lijst met mogelijke bovenliggende categorieën opnieuw.");
}
if (!defined("_CO_IMTAGGING_TREE_TREE_TITLE")) {
	define("_CO_IMTAGGING_TREE_TREE_TITLE", "Titel");
}
if (!defined("_CO_IMTAGGING_TREE_TREE_TITLE_DSC")) {
	define("_CO_IMTAGGING_TREE_TREE_TITLE_DSC", "");
}
if (!defined("_CO_IMTAGGING_TREE_TREE_DESCRIPTION")) {
	define("_CO_IMTAGGING_TREE_TREE_DESCRIPTION", "Beschrijving");
}
if (!defined("_CO_IMTAGGING_TREE_TREE_DESCRIPTION_DSC")) {
	define("_CO_IMTAGGING_TREE_TREE_DESCRIPTION_DSC", "");
}
if (!defined("_CO_IMTAGGING_TREE_TREE_DEFAULT")) {
	define("_CO_IMTAGGING_TREE_TREE_DEFAULT", "Standaardboom");
}
if (!defined("_CO_IMTAGGING_TREE_TREE_DEFAULT_DSC")) {
	define("_CO_IMTAGGING_TREE_TREE_DEFAULT_DSC", "Modules zonder eigen boom gebruiken de standaardboom. Er is er altijd precies één.");
}
if (!defined("_CO_IMTAGGING_TREE_DEFAULT_TITLE")) {
	define("_CO_IMTAGGING_TREE_DEFAULT_TITLE", "Standaard");
}
if (!defined("_CO_IMTAGGING_TREE_LINK_TREE_LINK_TID")) {
	define("_CO_IMTAGGING_TREE_LINK_TREE_LINK_TID", "Boom");
}
if (!defined("_CO_IMTAGGING_TREE_LINK_TREE_LINK_TID_DSC")) {
	define("_CO_IMTAGGING_TREE_LINK_TREE_LINK_TID_DSC", "");
}
if (!defined("_CO_IMTAGGING_TREE_LINK_TREE_LINK_TARGET")) {
	define("_CO_IMTAGGING_TREE_LINK_TREE_LINK_TARGET", "Module-item");
}
if (!defined("_CO_IMTAGGING_TREE_LINK_TREE_LINK_TARGET_DSC")) {
	define("_CO_IMTAGGING_TREE_LINK_TREE_LINK_TARGET_DSC", "Het item van een module dat zijn categorieën uit de gekozen boom haalt.");
}
if (!defined("_CO_IMTAGGING_TREE_LINK_TARGET_SELECT")) {
	define("_CO_IMTAGGING_TREE_LINK_TARGET_SELECT", "Kies een module-item...");
}
