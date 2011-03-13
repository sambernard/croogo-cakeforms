<div class="cforms form">
<h2>Add New Form</h2>
<div class="actions">
    <ul>
        <li><?php echo $this->Html->link(__('Back to Index', true), array('controller' => 'cforms', 'action' => 'index')); ?></li>
    </ul>
</div>
<?php echo $this->Form->create('Cform');?>
	<?php
		echo $this->Form->input('name');
	?>
<?php echo $this->Form->end('Submit');?>
</div>