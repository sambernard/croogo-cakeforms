<?php echo
	$this->Form->create('FormField'),
		$this->Form->hidden('cform_id'),
		$this->Form->input('name'),
		$this->Form->input('type'),
		$this->Form->input('required'),		
	$this->Form->end('Submit');?>