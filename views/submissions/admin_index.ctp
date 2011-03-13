<div class="submissions index">
<h2><?php __('Submissions');?></h2>
<div class="actions">
    <ul>
        <li><?php echo $html->link(__('Back to Index', true), array('controller' => 'cforms', 'action' => 'index')); ?></li>
        <li><?php echo $html->link(__('Export Records', true), array('controller' => 'submissions', 'action' => 'export', $this->params['pass'][0])); ?></li>
    </ul>
</div>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('cform_id');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('ip');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($submissions as $submission):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $submission['Submission']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($submission['Cform']['name'], array('controller' => 'cforms', 'action' => 'view', $submission['Cform']['id'])); ?>
		</td>
		<td>
			<?php echo $submission['Submission']['created']; ?>
		</td>
		<td>
			<?php echo $submission['Submission']['ip']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $submission['Submission']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $submission['Submission']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $submission['Submission']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $submission['Submission']['id'])); ?>
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