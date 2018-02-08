function checkFormManager() {
    $(".warning-emails").text("");
    $(".warning-name").text("");
    
    var error = 0;

    // //check password với confirmpassword
    
    // check name
    if ($('#name').val() == "") {
        $(".warning-name").text("A value is required.");
        error++;
    }
   
    //check email
    if ($("#email").val() == "") {
        $(".warning-emails").text("A value is required.");
        error++;
    } else {
        var emailStr = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        var isemail = emailStr.test($('#email').val());
        if (!isemail) {
            $(".warning-emails").text("Invaild email.");
            error++;
        }
    }
    if (error == 0) {
        var email = $('#email').val();
        var name = $('#name').val();
        // tao du lieu cua file
        var files = document.getElementById('photofile').files;
        var avatar = files[0];

        var data = new FormData();
        data.append('email', email);
        data.append('name', name);
        data.append('avatar', avatar);

        $.ajax({
            url: "../model/checkFormManager.php",
            processData: false,
            contentType: false,
            data,
            type: 'post',
            success: function(result) {
                result = JSON.parse(result);
                // console.log(result.message.indexOf("Your profile has been"));
                if(result.success)
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

                $('.growl').removeClass("dis-none");
               
            }
        });

    } else {
                $('.growl').addClass("dis-none");
    }
    return false;
}

$(document).ready(function(){
    $('.manage-exit').addClass("active");
	$('#save').click(function(){

        return checkFormManager();

        
	})
	$('.close').click(function(){
		$('.growl').addClass("dis-none");
	})
})