<div class="validationRules form">
<?php echo $form->create('ValidationRule');?>
	<fieldset>
 		<legend><?php __('Edit ValidationRule');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('rule');
		echo $form->input('message');
		echo $form->input('FormField');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('ValidationRule.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('ValidationRule.id'))); ?></li>
		<li><?php echo $html->link(__('List ValidationRules', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Form Fields', true), array('controller' => 'form_fields', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Form Field', true), array('controller' => 'form_fields', 'action' => 'add')); ?> </li>
	</ul>
</div>
