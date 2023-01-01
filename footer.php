<?php
/**
 * Footer page included at the end of each page on user side of the mdoule
 *
 * @copyright http://smartfactory.ca The SmartFactory
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @since 1.0
 * @author marcan aka Marc-André Lanciault <marcan@smartfactory.ca>
 * @package imtagging
 * @version $Id$
 */
if (!defined("ICMS_ROOT_PATH")) die("ICMS root path not defined");

$icmsTpl->assign("imtagging_adminpage", imtagging_getModuleAdminLink());
$icmsTpl->assign("imtagging_is_admin", $imtagging_isAdmin);
$icmsTpl->assign('imtagging_url', IMTAGGING_URL);
$icmsTpl->assign('imtagging_images_url', IMTAGGING_IMAGES_URL);

$xoTheme->addStylesheet(IMTAGGING_URL . 'module' . ((defined("_ADM_USE_RTL") && _ADM_USE_RTL) ? '_rtl' : '') . '.css');

$icmsTpl->assign("ref_smartfactory", "imTagging is developed by The SmartFactory (http://smartfactory.ca), a division of INBOX International (http://inboxinternational.com)");

include_once ICMS_ROOT_PATH . '/footer.php';
