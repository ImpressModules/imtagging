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
define("_AM_IMTAGGING_REQUIREMENTS", "imTagging Requirements");
define("_AM_IMTAGGING_REQUIREMENTS_INFO", "We've reviewed your system, unfortunately it doesn't meet all the requirements needed for imTagging to function. Below are the requirements needed.");
define("_AM_IMTAGGING_REQUIREMENTS_ICMS_BUILD", "imTagging requires at least ImpressCMS %s");
define("_AM_IMTAGGING_REQUIREMENTS_SUPPORT", "Should you have any question or concerns, please visit our forums at <a href='http://community.impresscms.org'>http://community.impresscms.org</a>.");

// general
define("_AM_IMTAGGING_TAGS", "Tags");
define("_AM_IMTAGGING_CATEGORIES", "Categories");
define("_AM_IMTAGGING_FIRST_USE", "This is the first time you access this module. Please update the module in order to dynamically create the database scheme.");

// Category
define("_AM_IMTAGGING_CATEGORIES_DSC", "All categories in the module");
define("_AM_IMTAGGING_CATEGORY_CREATE", "Add a category");
define("_AM_IMTAGGING_CATEGORY", "Category");
define("_AM_IMTAGGING_CATEGORY_CREATE_INFO", "Fill-out the following form to create a new category.");
define("_AM_IMTAGGING_CATEGORY_EDIT", "Edit this category");
define("_AM_IMTAGGING_CATEGORY_EDIT_INFO", "Fill-out the following form in order to edit this category.");
define("_AM_IMTAGGING_CATEGORY_MODIFIED", "The category was successfully modified.");
define("_AM_IMTAGGING_CATEGORY_CREATED", "The category has been successfully created.");
define("_AM_IMTAGGING_CATEGORY_VIEW", "Category info");
define("_AM_IMTAGGING_CATEGORY_VIEW_DSC", "Here is the info about this category.");

// Category_link
define("_AM_IMTAGGING_CATEGORY_LINK_LINKS_DSC", "All category linksin the module");
define("_AM_IMTAGGING_CATEGORY_LINK_CREATE", "Add a category link");
if (!defined("_AM_IMTAGGING_CATEGORY_LINK")) {
	define("_AM_IMTAGGING_CATEGORY_LINK", "Category link");
}
define("_AM_IMTAGGING_CATEGORY_LINK_CREATE_INFO", "Fill-out the following form to create a new category link.");
define("_AM_IMTAGGING_CATEGORY_LINK_EDIT", "Edit this category link");
define("_AM_IMTAGGING_CATEGORY_LINK_EDIT_INFO", "Fill-out the following form in order to edit this category link.");
define("_AM_IMTAGGING_CATEGORY_LINK_MODIFIED", "The category link was successfully modified.");
define("_AM_IMTAGGING_CATEGORY_LINK_CREATED", "The category link has been successfully created.");
define("_AM_IMTAGGING_CATEGORY_LINK_VIEW", "Category link info");
define("_AM_IMTAGGING_CATEGORY_LINK_VIEW_DSC", "Here is the info about this category link.");

// Tag
define("_AM_IMTAGGING_TAGS_DSC", "All tags in the module");
define("_AM_IMTAGGING_TAG_CREATE", "Add a tag");
define("_AM_IMTAGGING_TAG", "Tag");
define("_AM_IMTAGGING_TAG_CREATE_INFO", "Fill-out the following form to create a new tag.");
define("_AM_IMTAGGING_TAG_EDIT", "Edit this tag");
define("_AM_IMTAGGING_TAG_EDIT_INFO", "Fill-out the following form in order to edit this tag.");
define("_AM_IMTAGGING_TAG_MODIFIED", "The tag was successfully modified.");
define("_AM_IMTAGGING_TAG_CREATED", "The tag has been successfully created.");
define("_AM_IMTAGGING_TAG_VIEW", "Tag info");
define("_AM_IMTAGGING_TAG_VIEW_DSC", "Here is the info about this tag.");
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
