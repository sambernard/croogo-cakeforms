<div class="validationRules view">
<h2><?php  __('ValidationRule');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $validationRule['ValidationRule']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Rule'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $validationRule['ValidationRule']['rule']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Message'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $validationRule['ValidationRule']['message']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Edit ValidationRule', true), array('action' => 'edit', $validationRule['ValidationRule']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete ValidationRule', true), array('action' => 'delete', $validationRule['ValidationRule']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $validationRule['ValidationRule']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List ValidationRules', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New ValidationRule', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Form Fields', true), array('controller' => 'form_fields', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Form Field', true), array('controller' => 'form_fields', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Form Fields');?></h3>
	<?php if (!empty($validationRule['FormField'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Label'); ?></th>
		<th><?php __('Type'); ?></th>
		<th><?php __('Length'); ?></th>
		<th><?php __('Null'); ?></th>
		<th><?php __('Default'); ?></th>
		<th><?php __('Cform Id'); ?></th>
		<th><?php __('Required'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($validationRule['FormField'] as $formField):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $formField['id'];?></td>
			<td><?php echo $formField['name'];?></td>
			<td><?php echo $formField['label'];?></td>
			<td><?php echo $formField['type'];?></td>
			<td><?php echo $formField['length'];?></td>
			<td><?php echo $formField['null'];?></td>
			<td><?php echo $formField['default'];?></td>
			<td><?php echo $formField['cform_id'];?></td>
			<td><?php echo $formField['required'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'form_fields', 'action' => 'view', $formField['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'form_fields', 'action' => 'edit', $formField['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'form_fields', 'action' => 'delete', $formField['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $formField['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Form Field', true), array('controller' => 'form_fields', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
