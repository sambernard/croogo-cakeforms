<div class="validationRules index">
<h2><?php __('ValidationRules');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('rule');?></th>
	<th><?php echo $paginator->sort('message');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($validationRules as $validationRule):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $validationRule['ValidationRule']['id']; ?>
		</td>
		<td>
			<?php echo $validationRule['ValidationRule']['rule']; ?>
		</td>
		<td>
			<?php echo $validationRule['ValidationRule']['message']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $validationRule['ValidationRule']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $validationRule['ValidationRule']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $validationRule['ValidationRule']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $validationRule['ValidationRule']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('New ValidationRule', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Form Fields', true), array('controller' => 'form_fields', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Form Field', true), array('controller' => 'form_fields', 'action' => 'add')); ?> </li>
	</ul>
</div>
