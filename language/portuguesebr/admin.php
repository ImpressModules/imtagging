<?php
/**
 * Portuguese language constants used in admin section of the module
 *
 * @copyright http://smartfactory.ca The SmartFactory
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @since 1.0
 * @author marcan aka Marc-André Lanciault <marcan@smartfactory.ca>
 * 
 * @translation        GibaPhp - http://br.impresscms.org
 */
if (!defined("ICMS_ROOT_PATH")) die("O caminho para o raiz do site não foi definido");

// Requirements
define("_AM_IMTAGGING_REQUIREMENTS", "Requerimentos do Tag");
define("_AM_IMTAGGING_REQUIREMENTS_INFO", "Nós analisamos seu sistema, infelizmente ele não atende todos os requisitos necessários para trabalhar corretamente com o módulo Tag (Etiquetas). Abaixo estão os requisitos necessários.");
define("_AM_IMTAGGING_REQUIREMENTS_ICMS_BUILD", "O Tag (Etiquetas) exige, no mínimo, ImpressCMS 1.1.1 RC 1.");
define("_AM_IMTAGGING_REQUIREMENTS_SUPPORT", "Se tiver alguma pergunta ou comentário, por favor visite o nosso fórum em <a href='http://community.impresscms.org'>http://community.impresscms.org</a> ou caso deseja suporte em seu idioma português <a href='http://br.impresscms.org'>http://br.impresscms.org</a> quando estiver aberto.");

// general
define("_AM_IMTAGGING_TAGS", "Tags");
define("_AM_IMTAGGING_CATEGORIES", "Categorias");
define("_AM_IMTAGGING_FIRST_USE", "Esta é a primeira vez que você acessando este módulo. Atualize o módulo agora para criar a base de dados.");

// Category
define("_AM_IMTAGGING_CATEGORIES_DSC", "Todas as categorias no módulo");
define("_AM_IMTAGGING_CATEGORY_CREATE", "Incluir categoria");
define("_AM_IMTAGGING_CATEGORY", "Categoria");
define("_AM_IMTAGGING_CATEGORY_CREATE_INFO", "Preencha o seguinte formulário para criar uma nova categoria.");
define("_AM_IMTAGGING_CATEGORY_EDIT", "Editar esta categoria");
define("_AM_IMTAGGING_CATEGORY_EDIT_INFO", "Preencher o seguinte formulário para modificar esta categoria.");
define("_AM_IMTAGGING_CATEGORY_MODIFIED", "A categoria foi modificada com sucesso.");
define("_AM_IMTAGGING_CATEGORY_CREATED", "A categoria foi criada com sucesso.");
define("_AM_IMTAGGING_CATEGORY_VIEW", "Informações da categoria");
define("_AM_IMTAGGING_CATEGORY_VIEW_DSC", "Aqui está a informação sobre esta categoria.");

// Category_link
define("_AM_IMTAGGING_CATEGORY_LINK_LINKS_DSC", "Todas as categorias agregadas no módulo");
define("_AM_IMTAGGING_CATEGORY_LINK_CREATE", "Incluir um link para a categoria");
if (!defined("_AM_IMTAGGING_CATEGORY_LINK")) {
	define("_AM_IMTAGGING_CATEGORY_LINK", "Link da Categoria");
}
define("_AM_IMTAGGING_CATEGORY_LINK_CREATE_INFO", "Preencha o seguinte formulário para criar um novo link na categoria.");
define("_AM_IMTAGGING_CATEGORY_LINK_EDIT", "Editar este link de categoria");
define("_AM_IMTAGGING_CATEGORY_LINK_EDIT_INFO", "Preencha o seguinte formulário para modificar este linkd de categoria.");
define("_AM_IMTAGGING_CATEGORY_LINK_MODIFIED", "O link da categoria foi modificado com sucesso.");
define("_AM_IMTAGGING_CATEGORY_LINK_CREATED", "O link da categoria foi criado com sucesso.");
define("_AM_IMTAGGING_CATEGORY_LINK_VIEW", "Informação do link da Categoria");
define("_AM_IMTAGGING_CATEGORY_LINK_VIEW_DSC", "Aqui está as Informações sobre o link desta categoria.");

// Tag
define("_AM_IMTAGGING_TAGS_DSC", "Todas as tags no módulo");
define("_AM_IMTAGGING_TAG_CREATE", "Incluir tag");
define("_AM_IMTAGGING_TAG", "Tag");
define("_AM_IMTAGGING_TAG_CREATE_INFO", "Preencha o seguinte formulário para criar uma nova Tag/etiqueta.");
define("_AM_IMTAGGING_TAG_EDIT", "Editar esta tag");
define("_AM_IMTAGGING_TAG_EDIT_INFO", "Preencha o seguinte formulário para modificar esta tag.");
define("_AM_IMTAGGING_TAG_MODIFIED", "A Tag/etiqueta foi modificada com sucesso.");
define("_AM_IMTAGGING_TAG_CREATED", "A Tag/etiqueta foi criada com sucesso.");
define("_AM_IMTAGGING_TAG_VIEW", "Informação da Tag");
define("_AM_IMTAGGING_TAG_VIEW_DSC", "Aqui está a informação sobre esta tag.");
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
