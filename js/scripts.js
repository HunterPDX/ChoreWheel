
/* Teams */
/*********/

$(function(){
	$('.delete').click(function(){
		
		var teamID = $(this).attr('id');
		var parent = $(this).parent();
		
		
		$.ajax({
			type: 'post',
			url: 'team-delete.php',
			dataType: 'text',
			data: 'ajax=1&delete=' + teamID,
			beforeSend: function() {
				parent.attr('style','background-color:#cc0000');
			},
			success: function() {
				parent.slideUp(300,function() {
					parent.remove();
				});
			}
		});

	});
});

$(document).ready(function(){
	
	// Display alerts for 3 seconds before sliding up
	$('.alert').delay(3000).slideUp(500)
	
});