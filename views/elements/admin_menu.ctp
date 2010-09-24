<a href="#"><?php __('Forms'); ?></a>
<ul>
    <li><?php echo $html->link(__('List Forms', true), array('controller' => 'cforms', 'action' => 'index', 'plugin' => 'cforms')); ?></li>
    <li><?php echo $html->link(__('Create Form', true), array('controller' => 'cforms', 'action' => 'add', 'plugin' => 'cforms')); ?></li>
</ul>