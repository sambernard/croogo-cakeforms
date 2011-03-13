<?php
class Cform extends CformsAppModel {

	var $name = 'Cform';
	var $validate = array(
		'name' => array('notEmpty'),
		'recipient' => array('email' => array(
						      'rule' => 'email',
						      'message' => 'Please include a valid email address',
						      'allowEmpty' => true
						      ))
	);
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Next' => array(
			'className' => 'Cforms.Cform',
			'foreignKey' => 'next',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'FormField' => array(
			'className' => 'Cforms.FormField',
			'foreignKey' => 'cform_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => 'FormField.order',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Cforms.Submission'
	);

}
?>