<?php
/**
 * English language constants commonly used in the module
 *
 * @copyright http://smartfactory.ca The SmartFactory
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @since 1.0
 * @author marcan aka Marc-André Lanciault <marcan@smartfactory.ca>
 *
 */
if (!defined("ICMS_ROOT_PATH")) die("ICMS root path not defined");

// category
define("_CO_IMTAGGING_CATEGORY_CATEGORY_TITLE", "Titel");
define("_CO_IMTAGGING_CATEGORY_CATEGORY_TITLE_DSC", "");
define("_CO_IMTAGGING_CATEGORY_CATEGORY_DESCRIPTION", "Beschreibung");
define("_CO_IMTAGGING_CATEGORY_CATEGORY_DESCRIPTION_DSC", "");
define("_CO_IMTAGGING_CATEGORY_CATEGORY_CREATED_DATE", "Erstellungsdatum");
define("_CO_IMTAGGING_CATEGORY_CATEGORY_CREATED_DATE_DSC", "");
define("_CO_IMTAGGING_CATEGORY_CATEGORY_PID", "Elternkategorie");
define("_CO_IMTAGGING_CATEGORY_CATEGORY_PID_DSC", "");

define("_CO_IMTAGGING_CATEGORY_ADD", "+ neue Kategorie");

// category link
define("_CO_IMTAGGING_CATEGORY_LINK_CATEGORY_LINK_CID", "Kategorie");
define("_CO_IMTAGGING_CATEGORY_LINK_CATEGORY_LINK_CID_DSC", "");
define("_CO_IMTAGGING_CATEGORY_LINK_CATEGORY_LINK_MID", "Modul");
define("_CO_IMTAGGING_CATEGORY_LINK_CATEGORY_LINK_MID_DSC", "");
define("_CO_IMTAGGING_CATEGORY_LINK_CATEGORY_LINK_ITEM", "Item");
define("_CO_IMTAGGING_CATEGORY_LINK_CATEGORY_LINK_ITEM_DSC", "");
define("_CO_IMTAGGING_CATEGORY_LINK_CATEGORY_LINK_IID", "Linked item");
define("_CO_IMTAGGING_CATEGORY_LINK_CATEGORY_LINK_IID_DSC", "");
define("_CO_IMTAGGING_CATEGORY_LINK_MID_SELECT", "Modul auswählen...");
define("_CO_IMTAGGING_CATEGORY_LINK_ITEM_SELECT", "Select an item...");
define("_CO_IMTAGGING_CATEGORY_LINK_IID_SELECT", "Select an object...");

// tag
define("_CO_IMTAGGING_TAG_TAG_TITLE", "Title");
define("_CO_IMTAGGING_TAG_TAG_TITLE_DSC", "");
define("_CO_IMTAGGING_TAG_TAG_DESCRIPTION", "Beschreibung");
define("_CO_IMTAGGING_TAG_TAG_DESCRIPTION_DSC", "");
define("_CO_IMTAGGING_TAG_TAG_CREATED_DATE", "Erstellungsdatum");
define("_CO_IMTAGGING_TAG_TAG_CREATED_DATE_DSC", "");
define("_CO_IMTAGGING_TAG_TAG_UID", "Erstellt durch");
define("_CO_IMTAGGING_TAG_TAG_UID_DSC", "");
if (!defined("_CO_IMTAGGING_CATEGORY_CATEGORY_TID")) {
	define("_CO_IMTAGGING_CATEGORY_CATEGORY_TID", "Category tree");
}
if (!defined("_CO_IMTAGGING_CATEGORY_CATEGORY_TID_DSC")) {
	define("_CO_IMTAGGING_CATEGORY_CATEGORY_TID_DSC", "Changing the tree reloads the list of possible parent categories.");
}
if (!defined("_CO_IMTAGGING_TREE_TREE_TITLE")) {
	define("_CO_IMTAGGING_TREE_TREE_TITLE", "Title");
}
if (!defined("_CO_IMTAGGING_TREE_TREE_TITLE_DSC")) {
	define("_CO_IMTAGGING_TREE_TREE_TITLE_DSC", "");
}
if (!defined("_CO_IMTAGGING_TREE_TREE_DESCRIPTION")) {
	define("_CO_IMTAGGING_TREE_TREE_DESCRIPTION", "Description");
}
if (!defined("_CO_IMTAGGING_TREE_TREE_DESCRIPTION_DSC")) {
	define("_CO_IMTAGGING_TREE_TREE_DESCRIPTION_DSC", "");
}
if (!defined("_CO_IMTAGGING_TREE_TREE_DEFAULT")) {
	define("_CO_IMTAGGING_TREE_TREE_DEFAULT", "Default tree");
}
if (!defined("_CO_IMTAGGING_TREE_TREE_DEFAULT_DSC")) {
	define("_CO_IMTAGGING_TREE_TREE_DEFAULT_DSC", "Modules without a tree of their own use the default tree. There is always exactly one.");
}
if (!defined("_CO_IMTAGGING_TREE_DEFAULT_TITLE")) {
	define("_CO_IMTAGGING_TREE_DEFAULT_TITLE", "Default");
}
if (!defined("_CO_IMTAGGING_TREE_LINK_TREE_LINK_TID")) {
	define("_CO_IMTAGGING_TREE_LINK_TREE_LINK_TID", "Tree");
}
if (!defined("_CO_IMTAGGING_TREE_LINK_TREE_LINK_TID_DSC")) {
	define("_CO_IMTAGGING_TREE_LINK_TREE_LINK_TID_DSC", "");
}
if (!defined("_CO_IMTAGGING_TREE_LINK_TREE_LINK_TARGET")) {
	define("_CO_IMTAGGING_TREE_LINK_TREE_LINK_TARGET", "Module item");
}
if (!defined("_CO_IMTAGGING_TREE_LINK_TREE_LINK_TARGET_DSC")) {
	define("_CO_IMTAGGING_TREE_LINK_TREE_LINK_TARGET_DSC", "The item of a module that gets its categories from the selected tree.");
}
if (!defined("_CO_IMTAGGING_TREE_LINK_TARGET_SELECT")) {
	define("_CO_IMTAGGING_TREE_LINK_TARGET_SELECT", "Select a module item...");
}
