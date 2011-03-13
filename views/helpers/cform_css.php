<?php
class CformCssHelper extends AppHelper {
    public $helpers = array('Html', 'Form', 'Javascript');

    public function beforeRender() {
	if(!isset($this->params['admin']) || $this->params['admin'] == false){
		$view =& ClassRegistry::getObject('view');
		if($view){
		    $this->Html->script(array('jquery.min.js', '/cforms/js/form/form.js'), array('once' => true,
                                                                                                 'inline' => false));
                    $this->Html->css(array('/cforms/css/fancy_white'), 'stylesheet', array('inline' => false));
		}
	}
    }
}

?>