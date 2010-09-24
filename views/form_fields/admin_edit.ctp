<?php
	echo
	$form->create('FormField'),
		$form->hidden('id'),
		$form->input('depends_on', array('before' => 'If this field is only required based on the value of another field, enter the name of that field here, and the required value of that field below')),
		$form->input('depends_value'),
		$form->input('ValidationRule'),
	$form->end('Update');
?>
