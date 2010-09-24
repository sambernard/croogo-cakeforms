<?php
class Submission extends AppModel {

	var $name = 'Submission';
	var $validate = array(
		//'form_id' => array('numeric'),
		//'ip' => array('ip')
	);

	var $belongsTo = array('Cforms.Cform');

	var $hasMany = array(
		'SubmissionField' => array(
			'className' => 'Cforms.SubmissionField',
			'foreignKey' => 'submission_id',
			'dependent' => true,
		)
	);

	function submit($data){
		$this->create($data);
		$this->save();
		$id = $this->id;
		
		$formFields = array('Submission' => array('id' => $id));
		foreach($data['Form'] as $formField => $response){
			if(is_array($response)){
				$response = implode("\n", $response);
			}
			
			$formFields['SubmissionField'][] = array(
				'form_field' => $formField,
				'response' => $response
			);
		}
		if($this->saveAll($formFields, array('validate' => false))){
			return true;
		} else {
			return false;
		}
	}
	
	function getSubmissions($formId){
		$fields = $this->fields($formId);
		$skel = Set::combine($fields, '{n}');
		$submissions = $this->findAllByCformId($formId);
		foreach($submissions as &$submission){
			$submission['SubmissionField'] = Set::combine($submission['SubmissionField'], '{n}.form_field', '{n}.response');
			$submission = Set::merge($skel, $submission['Submission'], $submission['SubmissionField']);
		}		

		return $submissions;
	}

	function getSubmission($formId){
		$submission = $this->findByCformId($formId);
		
		$submission['SubmissionField'] = Set::combine($submission['SubmissionField'], '{n}.form_field', '{n}.response');
		$submission = Set::merge($submission['Submission'], $submission['SubmissionField']);
		
		return $submission;
	}
	
	function fields($formId){
		$submissions = $this->find('list', array(
							 'conditions' => array('cform_id' => $formId),
							 'fields' => array('id')
							 ));
		$data = $this->SubmissionField->find('all', array(
						 'conditions' => array('submission_id' => $submissions),
						 'group' => 'SubmissionField.form_field',
						 'contain' => array(),
						 'fields' => array('form_field')
						 ));
		$submissionFields = $this->find('first', array('conditions' => array('cform_id' => $formId)));
		$fields = Set::extract('{n}.SubmissionField.form_field', $data);
		$fields2 = array_keys($submissionFields['Submission']);
		
		$fields = Set::merge($fields2, $fields);

		return $fields;
	}

}
?>