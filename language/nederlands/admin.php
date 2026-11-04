<?php
/**
 * Dutch language constants used in admin section of the module
 *
 * @copyright http://smartfactory.ca The SmartFactory
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @since 1.0
 * @author marcan aka Marc-André Lanciault <marcan@smartfactory.ca> (english)
 * @author McDonald (translation into dutch)
 * 
 */
if (!defined('ICMS_ROOT_PATH')) die('ICMS root path not defined');

// general
define('_AM_IMTAGGING_TAGS', 'Tags');
define('_AM_IMTAGGING_CATEGORIES', 'Categorieën');
define('_AM_IMTAGGING_FIRST_USE', 'Dit is de eerste keer dat je deze module gebruikt. Update de module alstublieft om de nodige database dynamisch aan te maken.');

// Category
define('_AM_IMTAGGING_CATEGORIES_DSC', 'Alle categorieënn in de module');
define('_AM_IMTAGGING_CATEGORY_CREATE', 'Toevoegen categorie');
define('_AM_IMTAGGING_CATEGORY', 'Categorie');
define('_AM_IMTAGGING_CATEGORY_CREATE_INFO', 'Vul het volgende formulier in om een nieuwe categorie te maken.');
define('_AM_IMTAGGING_CATEGORY_EDIT', 'Bewerk deze categorie');
define('_AM_IMTAGGING_CATEGORY_EDIT_INFO', 'Vul het volgende formulier in om de categorie te bewerken.');
define('_AM_IMTAGGING_CATEGORY_MODIFIED', 'De categorie is succesvol bijgewerkt.');
define('_AM_IMTAGGING_CATEGORY_CREATED', 'De categorie is succesvol aangemaakt.');
define('_AM_IMTAGGING_CATEGORY_VIEW', 'Categorie info');
define('_AM_IMTAGGING_CATEGORY_VIEW_DSC', 'Hier is de info over deze categorie.');

// Category_link
define('_AM_IMTAGGING_CATEGORY_LINK_LINKS_DSC', 'Alle categorie linken in de module');
define('_AM_IMTAGGING_CATEGORY_LINK_CREATE', 'Toevoegen categorie link');
define('_AM_IMTAGGING_CATEGORY_LINK', 'Categorie link');
define('_AM_IMTAGGING_CATEGORY_LINK_CREATE_INFO', 'Vul het volgende formulier in om een nieuwe categorie link te maken.');
define('_AM_IMTAGGING_CATEGORY_LINK_EDIT', 'Bewerk deze categorie link');
define('_AM_IMTAGGING_CATEGORY_LINK_EDIT_INFO', 'Vul het volgende formulier in om de categorie link te bewerken.');
define('_AM_IMTAGGING_CATEGORY_LINK_MODIFIED', 'De categorie link is succesvol bijgewerkt.');
define('_AM_IMTAGGING_CATEGORY_LINK_CREATED', 'De categorie link is succesvol aangemaakt.');
define('_AM_IMTAGGING_CATEGORY_LINK_VIEW', 'Categorie link info');
define('_AM_IMTAGGING_CATEGORY_LINK_VIEW_DSC', 'Hier is de info over deze categorie link.');

// Tag
define('_AM_IMTAGGING_TAGS_DSC', 'Alle tags in de module');
define('_AM_IMTAGGING_TAG_CREATE', 'Toevoegen tag');
define('_AM_IMTAGGING_TAG', 'Tag');
define('_AM_IMTAGGING_TAG_CREATE_INFO', 'Vul het volgende formulier in om een nieuwe tag te maken.');
define('_AM_IMTAGGING_TAG_EDIT', 'Bewerk deze tag');
define('_AM_IMTAGGING_TAG_EDIT_INFO', 'Vul het volgende formulier in om deze tag te bewerken.');
define('_AM_IMTAGGING_TAG_MODIFIED', 'De tag is succesvol bijgewerkt.');
define('_AM_IMTAGGING_TAG_CREATED', 'De tag is succesvol aangemaakt.');
define('_AM_IMTAGGING_TAG_VIEW', 'Tag info');
define('_AM_IMTAGGING_TAG_VIEW_DSC', 'Hier is de info over deze tag.');
define('_AM_IMTAGGING_REQUIREMENTS', 'imTagging vereisten');
define('_AM_IMTAGGING_REQUIREMENTS_INFO', 'Je systeem voldoet niet aan alle vereisten om imTagging te laten werken. Hieronder staan de vereisten.');
define('_AM_IMTAGGING_REQUIREMENTS_ICMS_BUILD', 'imTagging vereist minstens ImpressCMS %s');
define('_AM_IMTAGGING_REQUIREMENTS_SUPPORT', "Heb je vragen of opmerkingen? Bezoek dan onze forums op <a href='http://community.impresscms.org'>http://community.impresscms.org</a>.");
if (!defined("_AM_IMTAGGING_TREES")) {
	define("_AM_IMTAGGING_TREES", "Categoriebomen");
}
if (!defined("_AM_IMTAGGING_TREE_CREATE")) {
	define("_AM_IMTAGGING_TREE_CREATE", "Boom toevoegen");
}
if (!defined("_AM_IMTAGGING_TREE_EDIT")) {
	define("_AM_IMTAGGING_TREE_EDIT", "Deze boom bewerken");
}
if (!defined("_AM_IMTAGGING_TREE_CREATED")) {
	define("_AM_IMTAGGING_TREE_CREATED", "De boom is succesvol aangemaakt.");
}
if (!defined("_AM_IMTAGGING_TREE_MODIFIED")) {
	define("_AM_IMTAGGING_TREE_MODIFIED", "De boom is succesvol gewijzigd.");
}
if (!defined("_AM_IMTAGGING_TREE_DELETE_DEFAULT")) {
	define("_AM_IMTAGGING_TREE_DELETE_DEFAULT", "De standaardboom kan niet verwijderd worden. Maak eerst een andere boom de standaard.");
}
if (!defined("_AM_IMTAGGING_TREE_DELETE_NOT_EMPTY")) {
	define("_AM_IMTAGGING_TREE_DELETE_NOT_EMPTY", "Deze boom bevat nog categorieën. Verwijder of verplaats ze eerst.");
}
if (!defined("_AM_IMTAGGING_TREE_LINKS")) {
	define("_AM_IMTAGGING_TREE_LINKS", "Boom per module-item");
}
if (!defined("_AM_IMTAGGING_TREE_LINK_CREATE")) {
	define("_AM_IMTAGGING_TREE_LINK_CREATE", "Een module-item aan een boom koppelen");
}
if (!defined("_AM_IMTAGGING_TREE_LINK_EDIT")) {
	define("_AM_IMTAGGING_TREE_LINK_EDIT", "Deze boomkoppeling bewerken");
}
if (!defined("_AM_IMTAGGING_TREE_LINK_CREATED")) {
	define("_AM_IMTAGGING_TREE_LINK_CREATED", "De boomkoppeling is succesvol aangemaakt.");
}
if (!defined("_AM_IMTAGGING_TREE_LINK_MODIFIED")) {
	define("_AM_IMTAGGING_TREE_LINK_MODIFIED", "De boomkoppeling is succesvol gewijzigd.");
}
if (!defined("_AM_IMTAGGING_CATEGORY_INVALID_PARENT")) {
	define("_AM_IMTAGGING_CATEGORY_INVALID_PARENT", "Een categorie kan niet haar eigen parent zijn of de parent van een van haar parents.");
}
if (!defined("_AM_IMTAGGING_CATEGORY_PARENT_OTHER_TREE")) {
	define("_AM_IMTAGGING_CATEGORY_PARENT_OTHER_TREE", "De bovenliggende categorie moet in dezelfde boom staan.");
}
