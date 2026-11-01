<?php

/**
 * Admin page to link module items to the category tree they use
 *
 * List, add, edit and delete tree_link objects
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @package imtagging
 */

/**
 * Edit a Tree_link
 *
 * @param int $tree_link_id Tree_linkid to be edited
 */
function edittree_link($tree_link_id = 0) {
	global $imtagging_tree_link_handler, $icmsAdminTpl;

	$tree_linkObj = $imtagging_tree_link_handler->get($tree_link_id);

	if (!$tree_linkObj->isNew()) {
		icms::$module->displayAdminMenu(4, _AM_IMTAGGING_TREE_LINKS . " > " . _CO_ICMS_EDITING);
		$sform = $tree_linkObj->getForm(_AM_IMTAGGING_TREE_LINK_EDIT, 'addtree_link');
	} else {
		icms::$module->displayAdminMenu(4, _AM_IMTAGGING_TREE_LINKS . " > " . _CO_ICMS_CREATINGNEW);
		$sform = $tree_linkObj->getForm(_AM_IMTAGGING_TREE_LINK_CREATE, 'addtree_link');
	}

	$sform->assign($icmsAdminTpl);
	$icmsAdminTpl->display('db:imtagging_admin_tree_link.html');
}

include_once "admin_header.php";

$imtagging_tree_link_handler = icms_getModulehandler('tree_link');

$clean_op = '';
$valid_op = array(
	'mod',
	'addtree_link',
	'del',
	'');

if (isset($_GET['op'])) $clean_op = htmlentities((string) $_GET['op']);
if (isset($_POST['op'])) $clean_op = htmlentities((string) $_POST['op']);

$clean_tree_link_id = isset($_GET['tree_link_id']) ? (int) $_GET['tree_link_id'] : 0;

if (in_array($clean_op, $valid_op, true)) {
	switch ($clean_op) {
		case "mod":
			icms_cp_header();

			edittree_link($clean_tree_link_id);
			break;

		case "addtree_link":
			$controller = new icms_ipf_Controller($imtagging_tree_link_handler);
			$controller->storeFromDefaultForm(_AM_IMTAGGING_TREE_LINK_CREATED, _AM_IMTAGGING_TREE_LINK_MODIFIED);

			break;

		case "del":
			$controller = new icms_ipf_Controller($imtagging_tree_link_handler);
			$controller->handleObjectDeletion();

			break;

		default:
			icms_cp_header();

			icms::$module->displayAdminMenu(4, _AM_IMTAGGING_TREE_LINKS);

			$objectTable = new icms_ipf_view_Table($imtagging_tree_link_handler);
			$objectTable->addColumn(new icms_ipf_view_Column('tree_link_target', _GLOBAL_LEFT, '300'));
			$objectTable->addColumn(new icms_ipf_view_Column('tree_link_tid'));

			$objectTable->addIntroButton('addtree_link', 'tree_link.php?op=mod', _AM_IMTAGGING_TREE_LINK_CREATE);

			$icmsAdminTpl->assign('imtagging_tree_link_table', $objectTable->fetch());

			$icmsAdminTpl->display('db:imtagging_admin_tree_link.html');
			break;
	}
	icms_cp_footer();
}
