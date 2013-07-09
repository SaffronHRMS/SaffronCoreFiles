$(document).ready(function()
{
	$('#personal_btn').click(function()
	{
		$('#waiting').show(500);
		$('#emp_personal').hide(0);
		$('#message').hide(0);

		$.ajax(
		{
			type : 'POST',
			url : 'http://local.tech.com/index.php/hrms_emp_detail_controller',
			dataType : 'json',
			data: 
			{
				fname : $('#fname').val()
			},
			success : function(data)
			{
				$('#waiting').hide(500);
				$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success')
				.text(data.msg).show(500);
				
				if (data.error === true)
				$('#emp_personal').show(500);
			},
			error : function(XMLHttpRequest, textStatus, errorThrown)
			{
				$('#waiting').hide(500);
				$('#message').removeClass().addClass('error')
				.text('There was an error.').show(500);
				$('#emp_personal').show(500);
			}
		});
		return false;
	});
});