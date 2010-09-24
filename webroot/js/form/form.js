$(function() {
$('.cform .dependent').each(function(){
	var dependsName = $(this).attr('dependson');
	var dependsValue = $(this).attr('dependsvalue');

	var dependsOn = $('[name*="'+ dependsName + '"]');
	var div = $(this).closest('div');

	if(dependsOn.val() != dependsValue){
		div.hide();
	}

	dependsOn.live('change', function(){
				if(dependsValue == $(this).val()){
					 div.show();
			} else {
					div.hide();
			}});
		});
	});