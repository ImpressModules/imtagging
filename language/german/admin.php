<?php
/**
 * English language constants used in admin section of the module
 *
 * @copyright http://smartfactory.ca The SmartFactory
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @since 1.0
 * @author marcan aka Marc-André Lanciault <marcan@smartfactory.ca>
 * 
 */
if (!defined("ICMS_ROOT_PATH")) die("ICMS root path not defined");

// Requirements
define("_AM_IMTAGGING_REQUIREMENTS", "Voraussetzungen für imTagging");
define("_AM_IMTAGGING_REQUIREMENTS_INFO", "Es wurde Ihr System geprüft, leider erfüllt es nicht alle Anforderungen damit es genutzt werden kann. Folgende Anforderungen werden benötigt.");
define("_AM_IMTAGGING_REQUIREMENTS_ICMS_BUILD", "Das Modul benötigt mindestens ImpressCMS 1.1.1 RC 1.");
define("_AM_IMTAGGING_REQUIREMENTS_SUPPORT", "Sollten Sie Fragen oder Bedenken haben, besuchen Sie das <a href='http://www.impresscms.de/modules/newbb/'>Impresscms.de - Forum</a>.");

// general
define("_AM_IMTAGGING_TAGS", "Tags");
define("_AM_IMTAGGING_CATEGORIES", "Kategorien");
define("_AM_IMTAGGING_FIRST_USE", "Das ist der erste Start von diesem Modul, es aktualisiert sich automatisch und erstellt ein Datenbankschema.");

// Category
define("_AM_IMTAGGING_CATEGORIES_DSC", "Zeige alle Kategorien von diesem Modul");
define("_AM_IMTAGGING_CATEGORY_CREATE", "Kategorie hinzufügen");
define("_AM_IMTAGGING_CATEGORY", "Kategorie");
define("_AM_IMTAGGING_CATEGORY_CREATE_INFO", "Zum Erstellen einer neuen Kategorie bitte das Formular ausfüllen.");
define("_AM_IMTAGGING_CATEGORY_EDIT", "Kategorie bearbeiten");
define("_AM_IMTAGGING_CATEGORY_EDIT_INFO", "Zum Bearbeiten einer Kategorien bitte das Formular ausfüllen.");
define("_AM_IMTAGGING_CATEGORY_MODIFIED", "Die Kategorie wurde erfolgreich aktualisiert.");
define("_AM_IMTAGGING_CATEGORY_CREATED", "Die Kategorie wurde erstellt.");
define("_AM_IMTAGGING_CATEGORY_VIEW", "Kategorie anzeigen");
define("_AM_IMTAGGING_CATEGORY_VIEW_DSC", "Mehr Informationen zu der Kategorie anzeigen.");

// Category_link
define("_AM_IMTAGGING_CATEGORY_LINK_LINKS_DSC", "Alle Kategorie-Links des Modules");
define("_AM_IMTAGGING_CATEGORY_LINK_CREATE", "Kategorie-Link hinzufügen");
if (!defined("_AM_IMTAGGING_CATEGORY_LINK")) {
	define("_AM_IMTAGGING_CATEGORY_LINK", "Kategorie-Link");
}
define("_AM_IMTAGGING_CATEGORY_LINK_CREATE_INFO", "Zum Erstellen für ein neuen Kategorie-Link das Formular ausfüllen.");
define("_AM_IMTAGGING_CATEGORY_LINK_EDIT", "Kategorie-Link bearbeiten");
define("_AM_IMTAGGING_CATEGORY_LINK_EDIT_INFO", "Zum Bearbeiten des Kategorie-Link das Formular ausfüllen.");
define("_AM_IMTAGGING_CATEGORY_LINK_MODIFIED", "Der Kategorie-Link wurde geändert.");
define("_AM_IMTAGGING_CATEGORY_LINK_CREATED", "Der Kategorie-Link wurde erstellt.");
define("_AM_IMTAGGING_CATEGORY_LINK_VIEW", "Infos über den Kategorie-Link");
define("_AM_IMTAGGING_CATEGORY_LINK_VIEW_DSC", "Hier sind mehr Informationen über den Kategorie-Link.");

// Tag
define("_AM_IMTAGGING_TAGS_DSC", "Alle Tags von diesem Modul");
define("_AM_IMTAGGING_TAG_CREATE", "Tag hinzufügen");
define("_AM_IMTAGGING_TAG", "Tag");
define("_AM_IMTAGGING_TAG_CREATE_INFO", "Zum Erstellen eines neuen Tags das Formular ausfüllen.");
define("_AM_IMTAGGING_TAG_EDIT", "Tag bearbeiten");
define("_AM_IMTAGGING_TAG_EDIT_INFO", "Zum Bearbeiten eines Tags das Formular ausfüllen.");
define("_AM_IMTAGGING_TAG_MODIFIED", "Das Tag wurde aktualisiert.");
define("_AM_IMTAGGING_TAG_CREATED", "Das Tag wurde erstellt.");
define("_AM_IMTAGGING_TAG_VIEW", "Tag Infos");
define("_AM_IMTAGGING_TAG_VIEW_DSC", "Mehr Informationen zum Tag anzeigen.");
if (!defined("_AM_IMTAGGING_TREES")) {
	define("_AM_IMTAGGING_TREES", "Category trees");
}
if (!defined("_AM_IMTAGGING_TREE_CREATE")) {
	define("_AM_IMTAGGING_TREE_CREATE", "Add a tree");
}
if (!defined("_AM_IMTAGGING_TREE_EDIT")) {
	define("_AM_IMTAGGING_TREE_EDIT", "Edit this tree");
}
if (!defined("_AM_IMTAGGING_TREE_CREATED")) {
	define("_AM_IMTAGGING_TREE_CREATED", "The tree has been successfully created.");
}
if (!defined("_AM_IMTAGGING_TREE_MODIFIED")) {
	define("_AM_IMTAGGING_TREE_MODIFIED", "The tree was successfully modified.");
}
if (!defined("_AM_IMTAGGING_TREE_DELETE_DEFAULT")) {
	define("_AM_IMTAGGING_TREE_DELETE_DEFAULT", "The default tree cannot be deleted. Make another tree the default first.");
}
if (!defined("_AM_IMTAGGING_TREE_DELETE_NOT_EMPTY")) {
	define("_AM_IMTAGGING_TREE_DELETE_NOT_EMPTY", "This tree still contains categories. Delete or move them first.");
}
if (!defined("_AM_IMTAGGING_TREE_LINKS")) {
	define("_AM_IMTAGGING_TREE_LINKS", "Tree per module item");
}
if (!defined("_AM_IMTAGGING_TREE_LINK_CREATE")) {
	define("_AM_IMTAGGING_TREE_LINK_CREATE", "Link a module item to a tree");
}
if (!defined("_AM_IMTAGGING_TREE_LINK_EDIT")) {
	define("_AM_IMTAGGING_TREE_LINK_EDIT", "Edit this tree link");
}
if (!defined("_AM_IMTAGGING_TREE_LINK_CREATED")) {
	define("_AM_IMTAGGING_TREE_LINK_CREATED", "The tree link has been successfully created.");
}
if (!defined("_AM_IMTAGGING_TREE_LINK_MODIFIED")) {
	define("_AM_IMTAGGING_TREE_LINK_MODIFIED", "The tree link was successfully modified.");
}
if (!defined("_AM_IMTAGGING_CATEGORY_INVALID_PARENT")) {
	define("_AM_IMTAGGING_CATEGORY_INVALID_PARENT", "A category cannot be its own parent or the parent of one of its parents.");
}
if (!defined("_AM_IMTAGGING_CATEGORY_PARENT_OTHER_TREE")) {
	define("_AM_IMTAGGING_CATEGORY_PARENT_OTHER_TREE", "The parent category has to be in the same tree.");
}
