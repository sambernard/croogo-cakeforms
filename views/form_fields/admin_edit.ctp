<?php
	echo
	$this->Form->create('FormField'),
		$this->Form->hidden('id'),
		$this->Form->input('depends_on', array('before' => 'If this field is only required based on the value of another field, enter the name of that field here, and the required value of that field below')),
		$this->Form->input('depends_value'),
		$this->Form->input('ValidationRule'),
	$this->Form->end('Update');
?>
