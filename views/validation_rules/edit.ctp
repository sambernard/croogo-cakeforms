<div class="validationRules form">
<?php echo $this->Form->create('ValidationRule');?>
	<fieldset>
 		<legend><?php __('Edit ValidationRule');?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('rule');
		echo $this->Form->input('message');
		echo $this->Form->input('FormField');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('ValidationRule.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('ValidationRule.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List ValidationRules', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Form Fields', true), array('controller' => 'form_fields', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Form Field', true), array('controller' => 'form_fields', 'action' => 'add')); ?> </li>
	</ul>
</div>
