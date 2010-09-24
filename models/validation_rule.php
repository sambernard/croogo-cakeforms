<?php
class ValidationRule extends CformsAppModel {

	var $name = 'ValidationRule';
	var $validate = array(
		'rule' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasAndBelongsToMany = array(
		'FormField' => array(
			'className' => 'Cforms.FormField',
			'joinTable' => 'form_fields_validation_rules',
			'foreignKey' => 'validation_rule_id',
			'associationForeignKey' => 'form_field_id',
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

}
?>