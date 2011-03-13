<div class="validationRules form">
<?php echo $this->Form->create('ValidationRule');?>
	<fieldset>
 		<legend><?php __('Add ValidationRule');?></legend>
	<?php
		echo $this->Form->input('rule');
		echo $this->Form->input('message');
		echo $this->Form->input('FormField');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List ValidationRules', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Form Fields', true), array('controller' => 'form_fields', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Form Field', true), array('controller' => 'form_fields', 'action' => 'add')); ?> </li>
	</ul>
</div>
