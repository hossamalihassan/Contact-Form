$(function () {

				  //user , email, msg
	var errors = [true, true, true];


	$(".username").blur(function() {

		if( $(this).val().length <= 3 ) {
			$(this).css("border", "solid 1px #F00").parent().find('.custom-alert').fadeIn(300).end().find('.asterisx').fadeIn(100);
			errors[0] = true;
		} else {
			$(this).css("border", "solid 1px #080").parent().find('.custom-alert').fadeOut(300).end().find('.asterisx').fadeOut(100).css("border", "solid 1px #080");
			errors[0] = false;
		}


	});

	$(".email").blur(function() {

		if( $(this).val() === '' ) {
			$(this).css("border", "solid 1px #F00").parent().find('.custom-alert').fadeIn(300).end().find('.asterisx').fadeIn(100);
			
			errors[1] = true;
		} else {
			$(this).css("border", "solid 1px #080").parent().find('.custom-alert').fadeOut(300).end().find('.asterisx').fadeOut(100).css("border", "solid 1px #080");
			
			errors[1] = false;
		}


	});

	$(".message").blur(function() {

		if( $(this).val().length < 11 ) {
			$(this).css("border", "solid 1px #F00").parent().find('.custom-alert').fadeIn(300).end().find('.asterisx').fadeIn(100);
			errors[2] = true;
		} else {
			$(this).css("border", "solid 1px #080").parent().find('.custom-alert').fadeOut(300).end().find('.asterisx').fadeOut(100).css("border", "solid 1px #080");
			errors[2] = false;
		}


	});

	$("form").submit(function(e) {
		if (errors[0] === true || errors[1] === true || errors[2] === true) {
			e.preventDefault();
			$(".username, .email, .message").blur();
		}
	});


});