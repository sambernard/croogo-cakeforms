<a href="#"><?php __('Forms'); ?></a>
<ul>
    <li><?php echo $this->Html->link(__('List Forms', true), array('controller' => 'cforms', 'action' => 'index', 'plugin' => 'cforms')); ?></li>
    <li><?php echo $this->Html->link(__('Create Form', true), array('controller' => 'cforms', 'action' => 'add', 'plugin' => 'cforms')); ?></li>
    <li><?php echo $this->Html->link(__('Validation Rules', true), array('controller' => 'validation_rules', 'action' => 'index', 'plugin' => 'cforms')); ?></li>
</ul>