function checkFormPassword() {
    $(".warning-currentPasswork").text("");
    $(".warning-newpasswowrd").text("");
    $(".warning-confirmation").text("");
    
    var error = 0;

    if ($('#currentPasswork').val() == "") {
        $(".warning-currentPasswork").text("A value is required.");
        error++;
    }

    if ($('#newpasswowrd').val() == "") {
        $(".warning-newpasswowrd").text("A value is required.");
        error++;
    }

    if ($('#newpasswowrd').val() != $('#confirmation').val()) {
        // alert("ahihi");
        $(".warning-confirmation").text(" New password and it's confimation don't match.");
        $('#confirmpassword').focus();
        error++;
    }


    if (error == 0) {
        var curpass = $('#currentPasswork').val();
        var newpass = $('#newpasswowrd').val();
        var confirpass = $('#confirmation').val();

        var data = new FormData();
        data.append('curpass', curpass);
        data.append('newpass', newpass);
        data.append('confirpass', confirpass);

        $.ajax({
            url: "../model/checkFormPassword.php",
            processData: false,
            contentType: false,
            data,
            type: 'post',
            success: function(result) {
                result = JSON.parse(result);
                // console.log(result.message.indexOf("Your profile has been"));
                if(result.message.indexOf("Your profile has been")==0)
                {
                	$('.alert').removeClass("alert-error");
                	$('.alert').addClass("alert-success");
                	$('.alert').text(result.message);
                }
                else{
                	$('.alert').removeClass("alert-success");
                	$('.alert').addClass("alert-error");
                	$('.alert').text(result.message);
                }
               
            }
        });

    }
    return false;
}
$(document).ready(function(){
	$('.manage-change').addClass("active");
	$('.growl').addClass("dis-none");
	$('.change').click(function(){
		// $('.growl').removeClass("dis-none");
		

		if($('.warning-currentPasswork').val()=="")
		{	
			if($('.warning-newpasswowrd').val()=="")
			{
				if($('.warning-confirmation').val()=="")
				{
					$('.growl').removeClass("dis-none");
				}
			}	
		}

		if($('#currentPasswork').val()=="")
		{
			// alert("ahihi");
			$('.growl').addClass("dis-none");
		}

		if($('#newpasswowrd').val()=="")
		{
			$('.growl').addClass("dis-none");
		}

		if($('#confirmation').val()=="")
		{
			$('.growl').addClass("dis-none");
		}

	})
	$('.close').click(function(){
		$('.growl').addClass("dis-none");
	})
})

