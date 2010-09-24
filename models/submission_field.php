<?php
class SubmissionField extends CformsAppModel {

	var $name = 'SubmissionField';
	var $validate = array(
		//'submission_id' => array('numeric'),
		//'form_field' => array('notempty')
	);

	var $belongsTo = array('Submission' => array('className' => 'Cforms.Submission'));

}
?>