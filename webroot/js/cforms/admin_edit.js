$(document).ready(function() {
	$("#sortable tbody").sortable({});
	$("#accordion").accordion({autoHeight: false});

	$("#addField").dialog({
		modal: true,
		autoOpen: false
	});

	$("#addField form").live('submit', function(){
		var data = $(this).serialize();
		var url = $(this).attr('action');

		$.post(
		url,
		data,
		function(response){
			if(response){
				$.get(base + '/admin/cforms/form_fields/get_row/' + response,
				      function(data){
					$("#sortable tbody").append(data);
				      });
				$("#addField").dialog('close');
				}
			}
		);
		return false;
	});

	$("#addFieldLink").click(function(){
		var url = $(this).attr('href');

		$.get(url,
			function(data){
			  $("#addField").html(data);
			  $("#addField").dialog('open');
			});
		return false;
		});


	$("#addValidation").dialog({
		modal: true,
		autoOpen: false
	});

	$(".validationLink").live('click', function(){
		var url = $(this).attr('href');
		$.get(url,
			function(data){
			  $("#addValidation").html(data);
			  $("#addValidation").dialog('open');
			});
		return false;
		});

	$('#addValidation form').live('submit', function(){
		var data = $(this).serialize();
		var url = $(this).attr('action');

		$.post(
		url,
		data,
		function(response){
			if(response == 'success'){
				$("#addValidation").dialog('close');
				}
			}
		);
		return false;
		})

	$("button, input:submit, a.jsbutton").button();
	$("#sortable tbody").bind('sortupdate', function(event, ui) {

		var data = $('input[name*="data[FormField]"][name*="[id]"]').serialize();

		$.post(
		base + '/admin/cforms/form_fields/sort/',
		data,
		function(response){
			if(response == 'success'){
			}
		}
		);
	});

	$('select[id*="FormField"][id*="Type"]').live('change', function(){
		var value = $(this).val();
		var select = ['checkbox', 'select', 'radio'];

		if(jQuery.inArray(value, select) > -1){
			$(this).closest('td').children('div.text').show();
		} else{
			$(this).closest('td').children('div.text').hide();
		}
		});

	$('.delete').live('click', function(){

		var fieldId = $(this).closest('tr').find('input[name*="data[FormField]"][name*="[id]"]').val();
		clicked = $(this);
		if(fieldId){
			$.post(
			base + '/admin/cforms/form_fields/delete/' + fieldId,
			function(response){
				if(response == 'success'){
					clicked.closest('tr').remove();
				}
			}
			);

		} else {
			$(this).closest('tr').remove();	
		}
		});
});