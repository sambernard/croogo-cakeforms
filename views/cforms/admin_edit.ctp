<?php
echo $this->Html->scriptBlock('
			base = "' . $this->base. '";
			');
echo $this->Html->script(array('/cforms/js/cforms/admin_edit.js'));
?>
<div class="cforms form">
<h2>Edit Form</h2>
<div class="actions">
    <ul>
        <li><?php echo $this->Html->link(__('Back to Index', true), array('controller' => 'cforms', 'action' => 'index')); ?></li>
    </ul>
</div>
<?php echo $this->Form->create('Cform');?>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name', array('label' => 'Form Name'));
	?>
	<div id="accordion">
		<h3><a href="#">Form Fields</a></h3>
		<div id="fields">
			<table id="sortable">
			<thead>
			<?php echo $this->Html->tableHeaders(array('', 'Field Name', 'Label(Question)', 'Type', 'Required','actions'));?>
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
			<?php echo $this->Html->link('Add Field', array('plugin' => 'cforms', 'admin' => true, 'controller' => 'form_fields', 'action' => 'add', $this->data['Cform']['id']), array('class' => 'jsbutton', 'id' => 'addFieldLink'));?>
		</div>
		<h3><a href="#">Miscellaneous Options</a></h3>
		<div>
		<?php
			echo $this->Form->input('action', array('label' => 'Alternative Form Action'));
			echo $this->Form->input('redirect', array('label' => 'Alternative Success Page/Redirect'));
			echo $this->Form->input('hide_after_submission');
			echo $this->Form->input('success_message', array('label' => 'Show this message once the form has been submitted. HTML is allowed.'));
		?>
		</div>
		<h3><a href="#">Email Options/Autoconfirmation</a></h3>
		<div>
		<?php
			echo $this->Form->input('recipient', array('label' => 'Admin email address'));
			echo $this->Form->input('from', array('label' => 'FROM: email address'));
			echo $this->Form->input('auto_confirmation', array('label' => 'Send a copy of this email to the visitor:'));
		?>
		</div>
	</div>
<?php echo $this->Form->end('Submit');?>
</div>

<div id="addField" title="Add Field">
</div>

<div id="addValidation" title="Edit Validation">
</div>