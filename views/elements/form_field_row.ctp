<?php
	$typeOptions['value'] = $field['options'];
	$typeOptions['type'] = 'text' ;
	
	if(!in_array($field['type'], $multiTypes)){
		$typeOptions['div'] = array('style' => 'display:none');
	}
	
	$row = array(
	'<span class="ui-icon ui-icon-arrowthick-2-n-s"></span>',
	$form->hidden('FormField.' . $key . '.id', array('value' => $field['id'])) .
	$form->input('FormField.' . $key . '.name', array('label' => false, 'value' => $field['name'])),
	$form->input('FormField.' . $key . '.label', array('label' => false, 'value' => $field['label'])),
	$form->input('FormField.' . $key . '.type', array('label' => false, 'value' => $field['type'])) .
	$form->input('FormField.' . $key . '.options', $typeOptions),
	$form->input('FormField.' . $key . '.required', array('label' => false, 'checked' => ($field['required']?'checked':''))),
	'<span class="ui-icon ui-icon-circle-close delete">Remove</span>' . $html->link('Add Validation', array('controller' => 'form_fields', 'action' => 'edit', $field['id']), array('class' => 'validationLink'))
	);
	
	echo $html->tableCells($row, array('class' => 'ui-state-default'),array('class' => 'ui-state-default'));
?>