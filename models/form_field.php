<?php
class FormField extends CformsAppModel {

	var $name = 'FormField';
	var $validate = array(
		'name' => array('notempty'),
		//'type' => array('notempty'),
		'cform_id' => array('numeric'),
		//'required' => array('boolean')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array( 'Cforms.Cform' );

	var $hasAndBelongsToMany = array(
		'ValidationRule' => array(
			'className' => 'Cforms.ValidationRule',
			'joinTable' => 'form_fields_validation_rules',
			'foreignKey' => 'form_field_id',
			'associationForeignKey' => 'validation_rule_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

	var $types = array(
			   'text' => 'Single Line of Text',
			   'textarea' => 'Multiple Lines of Text',
			   'textonly' => 'Text Only(no input)',
			   'fieldset' => 'Fieldset',
			   'select' => 'Select Box',
			   'checkbox' => 'Checkboxes',
			   'radio' => 'Radio Buttons',
			   'file' => 'File Upload',
			   'date' => 'Date Picker',
			   'time' => 'Time Picker',
			   'datetime' => 'Datetime Picker'
			   );

	var $multiTypes = array('checkbox', 'radio', 'select');

	function beforeSave(){
		if(!empty($this->data['FormField']['name'])){
			$this->data['FormField']['name'] = Inflector::slug($this->data['FormField']['name']);
		}

		if(empty($this->data['FormField']['id']) && empty($this->data['FormField']['order'])){
			$order = $this->find('count', array('conditions' => array('cform_id' => $this->data['FormField']['cform_id']))) + 1;
			$this->data['FormField']['order'] = $order;
		}

		return true;
	}

}
?>