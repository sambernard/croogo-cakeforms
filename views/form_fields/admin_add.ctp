<?php echo
	$form->create('FormField'),
		$form->hidden('cform_id'),
		$form->input('name'),
		$form->input('type'),
		$form->input('required'),		
	$form->end('Submit');?>