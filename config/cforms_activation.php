<?php
/**
 * Cforms Activation
 *
 * Activation class for Cforms plugin.
 *
 * @package  Croogo
 * @author   Sam Bernard <sam@sambernard.net>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.sambernard.net
 */
class CformsActivation {
/**
 * onActivate will be called if this returns true
 *
 * @param  object $controller Controller
 * @return boolean
 */
    public function beforeActivation(&$controller) {
        return true;
    }
/**
 * Called after activating the plugin in ExtensionsPluginsController::admin_toggle()
 *
 * @param object $controller Controller
 * @return void
 */
    public function onActivation(&$controller) {
        // ACL: set ACOs with permissions
        $controller->Croogo->addAco('Cforms');
        $controller->Croogo->addAco('Cforms/admin_index');
        $controller->Croogo->addAco('Cforms/admin_edit');
        $controller->Croogo->addAco('Cforms/admin_add');
        $controller->Croogo->addAco('Cforms/admin_delete');
        $controller->Croogo->addAco('Cforms/admin_list_cforms');

        $controller->Croogo->addAco('FormFields');
        $controller->Croogo->addAco('FormFields/admin_edit');
        $controller->Croogo->addAco('FormFields/admin_add');
        $controller->Croogo->addAco('FormFields/admin_delete');
        $controller->Croogo->addAco('FormFields/admin_get_row');
        $controller->Croogo->addAco('FormFields/admin_sort');

        $controller->Croogo->addAco('Submissions');
        $controller->Croogo->addAco('Submissions/admin_export');
        $controller->Croogo->addAco('Submissions/admin_index');
        $controller->Croogo->addAco('Submissions/admin_view');
        $controller->Croogo->addAco('Submissions/admin_delete');
	$controller->Croogo->addAco('Submissions/view_upload');
    }
/**
 * onDeactivate will be called if this returns true
 *
 * @param  object $controller Controller
 * @return boolean
 */
    public function beforeDeactivation(&$controller) {
        return true;
    }
/**
 * Called after deactivating the plugin in ExtensionsPluginsController::admin_toggle()
 *
 * @param object $controller Controller
 * @return void
 */
    public function onDeactivation(&$controller) {
        // ACL: remove ACOs with permissions
        $controller->Croogo->removeAco('Cforms');
        $controller->Croogo->removeAco('FormFields');
        $controller->Croogo->removeAco('Submissions');
    }
}
?>