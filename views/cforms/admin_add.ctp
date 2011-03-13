<div class="cforms form">
<h2>Add New Form</h2>
<div class="actions">
    <ul>
        <li><?php echo $html->link(__('Back to Index', true), array('controller' => 'cforms', 'action' => 'index')); ?></li>
    </ul>
</div>
<?php echo $form->create('Cform');?>
	<?php
		echo $form->input('name');
	?>
<?php echo $form->end('Submit');?>
</div>