<?php
/**
 * English language constants used in admin section of the module
 *
 * @copyright http://smartfactory.ca The SmartFactory
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @since 1.0
 * @author marcan aka Marc-André Lanciault <marcan@smartfactory.ca>
 * @translator	debianus
 * 
 */
if (!defined("ICMS_ROOT_PATH")) die("ICMS root path not defined");

// Requirements
define("_AM_IMTAGGING_REQUIREMENTS", "Requisitos de imTagging");
define("_AM_IMTAGGING_REQUIREMENTS_INFO", "Hemos revisado su sitema, pero desafortunadamente no reune todos los requisitos necesarios para que funcione imTagging.");
define("_AM_IMTAGGING_REQUIREMENTS_ICMS_BUILD", "imTagging necesita al menos ImpressCMS  %s.");
define("_AM_IMTAGGING_REQUIREMENTS_SUPPORT", "Si tiene alguna duda o sugerencia que hacer, por favor, visite nuestros foros en <a href='http://community.impresscms.org'>http://community.impresscms.org</a>.");

// general
define("_AM_IMTAGGING_TAGS", "Etiquetas");
define("_AM_IMTAGGING_CATEGORIES", "Categorías");
define("_AM_IMTAGGING_FIRST_USE", "Esta es la primera vez que accede al módulo; por favor, actualícelo para crear dinámicamente la estructura de la base de datos.");

// Category
define("_AM_IMTAGGING_CATEGORIES_DSC", "Categorías del módulo");
define("_AM_IMTAGGING_CATEGORY_CREATE", "Añadir una categoría");
define("_AM_IMTAGGING_CATEGORY", "Categoría");
define("_AM_IMTAGGING_CATEGORY_CREATE_INFO", "Complete el siguiente formulario para crear una nueva categoría.");
define("_AM_IMTAGGING_CATEGORY_EDIT", "Modificar esta categoría");
define("_AM_IMTAGGING_CATEGORY_EDIT_INFO", "Complete el siguiente formulario para modificar esta categoría.");
define("_AM_IMTAGGING_CATEGORY_MODIFIED", "La categoría fue modificada con éxito.");
define("_AM_IMTAGGING_CATEGORY_CREATED", "La categoría fue creada con éxito.");
define("_AM_IMTAGGING_CATEGORY_VIEW", "Información");
define("_AM_IMTAGGING_CATEGORY_VIEW_DSC", "Información de la categoría.");

// Category_link
define("_AM_IMTAGGING_CATEGORY_LINK_LINKS_DSC", "Listado");
define("_AM_IMTAGGING_CATEGORY_LINK_CREATE", "Añadir una categoría para enlazar");
if (!defined("_AM_IMTAGGING_CATEGORY_LINK")) {
	define("_AM_IMTAGGING_CATEGORY_LINK", "Categoría para enlazar");
}
define("_AM_IMTAGGING_CATEGORY_LINK_CREATE_INFO", "Complete el siguiente formulario para crear una nueva categoría para enlazar.");
define("_AM_IMTAGGING_CATEGORY_LINK_EDIT", "Modificar");
define("_AM_IMTAGGING_CATEGORY_LINK_EDIT_INFO", "Complete el siguiente formulario para modificar esta categoría para enlazar.");
define("_AM_IMTAGGING_CATEGORY_LINK_MODIFIED", "La categoría fue modificada con éxito.");
define("_AM_IMTAGGING_CATEGORY_LINK_CREATED", "La categoría fue creada con éxito.");
define("_AM_IMTAGGING_CATEGORY_LINK_VIEW", "Información");
define("_AM_IMTAGGING_CATEGORY_LINK_VIEW_DSC", "");

// Tag
define("_AM_IMTAGGING_TAGS_DSC", "Lista de las etiquetas disponibles");
define("_AM_IMTAGGING_TAG_CREATE", "Añadir una etiqueta");
define("_AM_IMTAGGING_TAG", "Etiqueta");
define("_AM_IMTAGGING_TAG_CREATE_INFO", "Complete el siguiente formulario para crear una nueva etiqueta");
define("_AM_IMTAGGING_TAG_EDIT", "Modificar esta etiqueta");
define("_AM_IMTAGGING_TAG_EDIT_INFO", "Complete el siguiente formulario para modificar esta etiqueta.");
define("_AM_IMTAGGING_TAG_MODIFIED", "La categoría fue modificada con éxito.");
define("_AM_IMTAGGING_TAG_CREATED", "La categoría fue creada con éxito.");
define("_AM_IMTAGGING_TAG_VIEW", "Información");
define("_AM_IMTAGGING_TAG_VIEW_DSC", ".");
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
