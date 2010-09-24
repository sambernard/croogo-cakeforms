<?php
echo $this->Html->scriptBlock('
			base = "' . $this->base. '";
			');
echo $this->Html->script(array('/cforms/js/cforms/admin_edit.js'));
?>
<div class="cforms form">
<?php echo $form->create('Cform');?>
	<?php
		echo $form->input('id');
		echo $form->input('name', array('label' => 'Form Name'));
	?>
	<div id="accordion">
		<h3><a href="#">Form Fields</a></h3>
		<div id="fields">
			<table id="sortable">
			<thead>
			<?php echo $html->tableHeaders(array('', 'Field Name', 'Label(Question)', 'Type', 'Required','actions'));?>
			</thead>
			<tbody>
			<?php
			if(!empty($this->data['FormField'])){
				$i=1;
				foreach($this->data['FormField'] as $key => $field){
					echo $this->element('form_field_row', array('key' => $key, 'field' => $field, 'multiTypes' => $multiTypes));
				}
			}
			?>
			</tbody>
			</table>
			<?php echo $html->link('Add Field', array('plugin' => 'cforms', 'admin' => true, 'controller' => 'form_fields', 'action' => 'add', $this->data['Cform']['id']), array('class' => 'jsbutton', 'id' => 'addFieldLink'));?>
		</div>
		<h3><a href="#">Miscellaneous Options</a></h3>
		<div>
		<?php
			echo $form->input('action', array('label' => 'Alternative Form Action'));
			echo $form->input('redirect', array('label' => 'Alternative Success Page/Redirect'));
			echo $form->input('hide_after_submission');
			echo $form->input('show_after_submission', array('label' => 'Show this message once the form has been submitted.'));
		?>
		</div>
		<h3><a href="#">Email Options/Autoconfirmation</a></h3>
		<div>
		<?php
			echo $form->input('recipient', array('label' => 'Admin email address'));
			echo $form->input('from', array('label' => 'FROM: email address'));
			echo $form->input('auto_confirmation', array('label' => 'Send a copy of this email to the visitor:'));
		?>
		</div>
	</div>
<?php echo $form->end('Submit');?>
</div>

<div id="addField" title="Add Field">
</div>

<div id="addValidation" title="Edit Validation">
</div>