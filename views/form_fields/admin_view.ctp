<div class="formFields view">
<h2><?php  __('FormField');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $formField['FormField']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $formField['FormField']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Label'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $formField['FormField']['label']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $formField['FormField']['type']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Length'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $formField['FormField']['length']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Null'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $formField['FormField']['null']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Default'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $formField['FormField']['default']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cform'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($formField['Cform']['name'], array('controller' => 'cforms', 'action' => 'view', $formField['Cform']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Required'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $formField['FormField']['required']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit FormField', true), array('action' => 'edit', $formField['FormField']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete FormField', true), array('action' => 'delete', $formField['FormField']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $formField['FormField']['id'])); ?> </li>
		<li><?php echo $html->link(__('List FormFields', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New FormField', true), array('action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Cforms', true), array('controller' => 'cforms', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Cform', true), array('controller' => 'cforms', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Validation Rules', true), array('controller' => 'validation_rules', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Validation Rule', true), array('controller' => 'validation_rules', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Validation Rules');?></h3>
	<?php if (!empty($formField['ValidationRule'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Rule'); ?></th>
		<th><?php __('Message'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($formField['ValidationRule'] as $validationRule):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $validationRule['id'];?></td>
			<td><?php echo $validationRule['rule'];?></td>
			<td><?php echo $validationRule['message'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'validation_rules', 'action' => 'view', $validationRule['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'validation_rules', 'action' => 'edit', $validationRule['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'validation_rules', 'action' => 'delete', $validationRule['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $validationRule['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Validation Rule', true), array('controller' => 'validation_rules', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
