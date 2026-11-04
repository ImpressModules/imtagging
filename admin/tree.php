<?php

/**
 * Admin page to manage category trees
 *
 * List, add, edit and delete tree objects
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @package imtagging
 */

/**
 * Edit a Tree
 *
 * @param int $tree_id Treeid to be edited
 */
function edittree($tree_id = 0) {
	global $imtagging_tree_handler, $icmsAdminTpl;

	$treeObj = $imtagging_tree_handler->get($tree_id);

	if (!$treeObj->isNew()) {
		icms::$module->displayAdminMenu(3, _AM_IMTAGGING_TREES . " > " . _CO_ICMS_EDITING);
		$sform = $treeObj->getForm(_AM_IMTAGGING_TREE_EDIT, 'addtree');
	} else {
		icms::$module->displayAdminMenu(3, _AM_IMTAGGING_TREES . " > " . _CO_ICMS_CREATINGNEW);
		$sform = $treeObj->getForm(_AM_IMTAGGING_TREE_CREATE, 'addtree');
	}

	$sform->assign($icmsAdminTpl);
	$icmsAdminTpl->display('db:imtagging_admin_tree.html');
}

include_once "admin_header.php";

$imtagging_tree_handler = icms_getModulehandler('tree');

$clean_op = '';
$valid_op = array(
	'mod',
	'addtree',
	'del',
	'');

if (isset($_GET['op'])) $clean_op = htmlentities((string) $_GET['op']);
if (isset($_POST['op'])) $clean_op = htmlentities((string) $_POST['op']);

$clean_tree_id = isset($_GET['tree_id']) ? (int) $_GET['tree_id'] : 0;

if (in_array($clean_op, $valid_op, true)) {
	switch ($clean_op) {
		case "mod":
			icms_cp_header();

			edittree($clean_tree_id);
			break;

		case "addtree":
			$controller = new icms_ipf_Controller($imtagging_tree_handler);
			$controller->storeFromDefaultForm(_AM_IMTAGGING_TREE_CREATED, _AM_IMTAGGING_TREE_MODIFIED);

			break;

		case "del":
			$controller = new icms_ipf_Controller($imtagging_tree_handler);
			$controller->handleObjectDeletion();

			break;

		default:
			icms_cp_header();

			icms::$module->displayAdminMenu(3, _AM_IMTAGGING_TREES);

			$objectTable = new icms_ipf_view_Table($imtagging_tree_handler);
			$objectTable->addColumn(new icms_ipf_view_Column('tree_title', _GLOBAL_LEFT, '200'));
			$objectTable->addColumn(new icms_ipf_view_Column('tree_description'));
			$objectTable->addColumn(new icms_ipf_view_Column('tree_default', 'center', 100));

			$objectTable->addIntroButton('addtree', 'tree.php?op=mod', _AM_IMTAGGING_TREE_CREATE);

			$icmsAdminTpl->assign('imtagging_tree_table', $objectTable->fetch());

			$icmsAdminTpl->display('db:imtagging_admin_tree.html');
			break;
	}
	icms_cp_footer();
}
