<?php
class CformCssHelper extends AppHelper {
    public $helpers = array('Html', 'Form', 'Javascript');

    public function beforeRender() {
	$view =& ClassRegistry::getObject('view');
	if($view){
	    $this->Javascript->link(array('/cforms/js/jquery-1.4.2.min.js', '/cforms/js/form/form.js'), false);
	    $view->addScript($this->Html->css(array('/cforms/css/fancy_white')));
	}
    }
}

?>