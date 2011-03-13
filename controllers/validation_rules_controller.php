<?php
class ValidationRulesController extends CformsAppController {

	var $name = 'ValidationRules';
	var $helpers = array('Html', 'Form');
        
	function admin_index() {
		$this->ValidationRule->recursive = 0;
		$this->set('validationRules', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid ValidationRule', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('validationRule', $this->ValidationRule->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->ValidationRule->create();
			if ($this->ValidationRule->save($this->data)) {
				$this->Session->setFlash(__('The ValidationRule has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ValidationRule could not be saved. Please, try again.', true));
			}
		}
		$formFields = $this->ValidationRule->FormField->find('list');
		$this->set(compact('formFields'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid ValidationRule', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ValidationRule->save($this->data)) {
				$this->Session->setFlash(__('The ValidationRule has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ValidationRule could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ValidationRule->read(null, $id);
		}
		$formFields = $this->ValidationRule->FormField->find('list');
		$this->set(compact('formFields'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for ValidationRule', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->ValidationRule->del($id)) {
			$this->Session->setFlash(__('ValidationRule deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The ValidationRule could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>