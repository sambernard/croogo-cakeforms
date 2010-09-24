<?php

class CformsAppController extends AppController {
    public $components = array('RequestHandler', 'Cforms.Cforms');



    function beforeFilter(){
        parent::beforeFilter();
        if($this->RequestHandler->isAjax()){
            Configure::write('debug', 0);
        }

        if(isset($this->Auth)){
            if(empty($this->Auth->loginAction['plugin'])){
                $this->Auth->loginAction['plugin'] = null;
            }
        }
        $this->Security->enabled = false;
    }
}

?>