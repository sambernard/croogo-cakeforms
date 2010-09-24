<div class="cforms form">
<?php echo $form->create('Cform');?>
	<fieldset>
 		<legend><?php __('Add Form');?></legend>
	<?php
		echo $form->input('name');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>