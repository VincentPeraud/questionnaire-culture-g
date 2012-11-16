$('#questionnaire').live("submit", function()
{
	
	var q1 = $('input[name=question1]:checked').val();
	var q2 = $('#question2').val();
	var q3 = $('input[name=question3]:checked').val();
	var q4 = $('#question4').val();
	var q5 = $('#question5').val();
	var q6 = $('#question6').val();
	
	$('textarea, input').parent().removeClass("error");
	$('input').parent().parent().removeClass("error");

	if (!q1 || (q1 == "non" && !q2) || !q3 || !q4 || !q5)
	{
		$('#formError').modal('show');

		if (!q1)
			$('input[name=question1]').parent().parent().addClass("error");
		if ((q1 == "non" && !q2) || (!q1 && !q2))
			$('#question2').parent().addClass("error");
		if (!q3)
			$('input[name=question3]').parent().parent().addClass("error");
		if (!q4)
			$('#question4').parent().addClass("error");
		if (!q5)
			$('#question5').parent().addClass("error");
		return false;
	}

	return true;
});

$('#modal-close').live("click", function()
{
	$('#formError').modal('hide');
	return false;
});