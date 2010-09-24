<?php
class Form extends CformsAppModel {

	var $name = 'Form';
	
        var $useTable = false;

	var $dependsOn = array();
	
	function beforeValidate(){
		foreach($this->dependsOn as $field => $dependsOn){
			$this->dependsOn($field, $dependsOn['field'], $dependsOn['value']);
		}
	}

	function dependsOn($field, $dependsOn, $dependsValue){
		
		if(isset($this->data[$this->name][$dependsOn]) && $this->data[$this->name][$dependsOn] == $dependsValue){
			return true;
		} else {
			unset($this->validate[$field]);
			unset($this->data[$this->name][$field]);
			return true;
		}
	}
	
	function buildSchema($id){
		
		$notInput = array('fieldset', 'textonly');
		App::import('Model', 'Cforms.Cform');
                $this->Cform = new Cform;
		$cform = $this->Cform->find('first', array(
						    'conditions' => array('Cform.id' => $id),
						    'contain' => array('FormField', 'FormField.ValidationRule')
						    ));
		$schema = array();
		$validate = array();
		
		foreach($cform['FormField'] as &$field){
			if(!in_array($field['type'], $notInput)){
				$schema[$field['name']] = array(
					'type' => 'string',
					'length' => $field['length'],
					'null' => null,
					'default' => $field['default']
				);
				
				if(!empty($field['ValidationRule'])){
					foreach($field['ValidationRule'] as $rule){
						$validate[$field['name']][$rule['rule']] = array(
							'rule' => $rule['rule'],
							'message' => $rule['message'],
							'allowEmpty' => ($field['required']?false:true)
							
						);
					}
				} elseif($field['required']){
					$validate[$field['name']] = array('notEmpty');
				}
				
				if(!empty($field['depends_on']) && !empty($field['depends_value'])){
					$dependsOn[$field['name']] = array('field' => $field['depends_on'], 'value' => $field['depends_value']);
				}
				
				$field['options'] = str_replace(', ', ',', $field['options']);
				$options = explode(',', $field['options']);
				$field['options'] = array_combine($options, $options);
			}
		}
		
		$this->validate = $validate;
		$this->_schema = $schema;
		$this->dependsOn = (isset($dependsOn)?$dependsOn:array());
		return $cform;
	}

}
?>