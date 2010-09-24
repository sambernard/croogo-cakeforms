<?php
echo $this->Html->scriptBlock('
			$(document).ready(function(){
                            $("#CformAdminListCformsForm").submit(function(){
				form_id = $("#CformCforms").val();
                                tinyMCE.execCommand("mceInsertContent",false,"{cform_"+form_id+"}");
                                $("#insert-cform").dialog("close");
                                return false;
                            });
                        });

			');
?>
<div>
<h4>Insert a Form</h4>
<p>To edit/create a form click <?php echo $html->link('here', array('controller' => 'cforms', 'action' => 'index', 'plugin' => 'cforms'));?>.</p>

<?php echo
    $form->create(),
    $form->input('cforms', array('empty' => 'Select a Form')),
    $form->end('Insert Form');?>
</div>