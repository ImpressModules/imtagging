<?php
/**
 * Persian language constants used in admin section of the module
 *
 * @copyright http://smartfactory.ca The SmartFactory
 * @copyright http://www.impresscms.ir Official ImpressCMS support site for Persians
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @since 1.0
 * @author Sina Asghari (aka stranger) <pesian_stranger@users.sourceforge.net>
 * 
 */
if (!defined("ICMS_ROOT_PATH")) die("ICMS root path not defined");

// Requirements
define("_AM_IMTAGGING_REQUIREMENTS", "نیازمندی‌های ماژول");
define("_AM_IMTAGGING_REQUIREMENTS_INFO", "ما سیستم شما را بررسی کردیم، متاسفانه شما تمامی امکانات مورد نیاز را ندارید. برای به کار انداختن این ماژول باید موارد زیر را داشته باشید.");
define("_AM_IMTAGGING_REQUIREMENTS_ICMS_BUILD", "این ماژول برای کار به ایمپرس سی‌ام‌اس ۱.۱.۱ نیازمند است.");
define("_AM_IMTAGGING_REQUIREMENTS_SUPPORT", "برای هرگونه سوال به انجمن ایمپرس سی‌ام‌اس در <a href='http://community.impresscms.org'>http://community.impresscms.org</a> مراجعه نمایید.");

// general
define("_AM_IMTAGGING_TAGS", "برچسب‌ها");
define("_AM_IMTAGGING_CATEGORIES", "شاخه‌ها");
define("_AM_IMTAGGING_FIRST_USE", "این اولین باری است که از این ماژول استفاده می کنید. لطفاً ابتدا آن را به‌روز برسانید تا ساختار پایگاه داده به درستی ایجاد شود.");

// Category
define("_AM_IMTAGGING_CATEGORIES_DSC", "تمامی شاخه‌های ماژول");
define("_AM_IMTAGGING_CATEGORY_CREATE", "افزودن شاخه");
define("_AM_IMTAGGING_CATEGORY", "شاخه");
define("_AM_IMTAGGING_CATEGORY_CREATE_INFO", "برای ساختن شاخه‌ی جدید فرم زیر را پر کنید..");
define("_AM_IMTAGGING_CATEGORY_EDIT", "ویرایش این شاخه");
define("_AM_IMTAGGING_CATEGORY_EDIT_INFO", "برای ویرایش این شاخه فرم زیر را پر کنید..");
define("_AM_IMTAGGING_CATEGORY_MODIFIED", "شاخه با موفقیت تغییر کرد.");
define("_AM_IMTAGGING_CATEGORY_CREATED", "شاخه با موفقیت ایجاد شد.");
define("_AM_IMTAGGING_CATEGORY_VIEW", "توضیحات شاخه");
define("_AM_IMTAGGING_CATEGORY_VIEW_DSC", "اطلاعات درباره‌ی این شاخه.");

// Category_link
define("_AM_IMTAGGING_CATEGORY_LINK_LINKS_DSC", "تمامی شاخه‌های لینک شده در ماژول");
define("_AM_IMTAGGING_CATEGORY_LINK_CREATE", "افزودن شاخه‌ی لینک شده");
if (!defined("_AM_IMTAGGING_CATEGORY_LINK")) {
	define("_AM_IMTAGGING_CATEGORY_LINK", "شاخه‌های لینک شده");
}
define("_AM_IMTAGGING_CATEGORY_LINK_CREATE_INFO", "برای ساختن شاخه‌ی جدید فرم زیر را پر کنید.");
define("_AM_IMTAGGING_CATEGORY_LINK_EDIT", "ویرایش این شاخه");
define("_AM_IMTAGGING_CATEGORY_LINK_EDIT_INFO", "برای ویرایش این شاخه فرم زیر را پر کنید.");
define("_AM_IMTAGGING_CATEGORY_LINK_MODIFIED", "شاخه با موفقیت تغییر کرد.");
define("_AM_IMTAGGING_CATEGORY_LINK_CREATED", "شاخه با موفقیت ایجاد شد.");
define("_AM_IMTAGGING_CATEGORY_LINK_VIEW", "اطلاعات شاخه");
define("_AM_IMTAGGING_CATEGORY_LINK_VIEW_DSC", "اطلاعات درباره‌ی این شاخه.");

// Tag
define("_AM_IMTAGGING_TAGS_DSC", "تمامی برچسب‌های ماژول");
define("_AM_IMTAGGING_TAG_CREATE", "افزودن برچسب");
define("_AM_IMTAGGING_TAG", "برچسب");
define("_AM_IMTAGGING_TAG_CREATE_INFO", "برای ثبت برچسب جدید فرم زیر را پر کنید.");
define("_AM_IMTAGGING_TAG_EDIT", "این برچسب را ویرایش کنید");
define("_AM_IMTAGGING_TAG_EDIT_INFO", "برای ویرایش این برچسب فرم زیر را پر کنید..");
define("_AM_IMTAGGING_TAG_MODIFIED", "برچسب با موفقیت تغییر کرد.");
define("_AM_IMTAGGING_TAG_CREATED", "برچسب با موفقیت ایجاد شد.");
define("_AM_IMTAGGING_TAG_VIEW", "اطلاعات برچسب");
define("_AM_IMTAGGING_TAG_VIEW_DSC", "توضیحات مربوط به این برچسب.");
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
