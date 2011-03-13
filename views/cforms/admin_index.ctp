<div class="cforms index">
<h2><?php __('Cforms');?></h2>

<div class="actions">
    <ul>
        <li><?php echo $html->link('Add new form', array('action' => 'add'));?></li>
    </ul>
</div>

<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('recipient');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($cforms as $cform):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $html->link($cform['Cform']['name'], array('action' => 'edit', $cform['Cform']['id'])); ?>
		</td>
		<td>
			<?php echo $cform['Cform']['recipient']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View Submissions', true), array('controller' => 'submissions', 'action' => 'index', $cform['Cform']['id'])); ?>
			<?php echo $html->link(__('Export Records', true), array('controller' => 'submissions', 'action' => 'export', $cform['Cform']['id'])); ?>
                        <?php echo $html->link(__('Edit Form', true), array('action' => 'edit', $cform['Cform']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $cform['Cform']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $cform['Cform']['id'])); ?>
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
