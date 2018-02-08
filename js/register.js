function checkForm(e) {
    $(".warning-email").text("");
    $(".warning-password").text("");
    $(".warning-name").text("");
    $(".warning-confirmpassword").text("");
    var error = 0;

    // //check password với confirmpassword
    if ($('#password').val() == "") {
        $(".warning-password").text("A value is required.");
        error++;
    }

    if ($('#password').val() != $('#confirmpassword').val()) {
        // alert("ahihi");
        $(".warning-confirmpassword").text("Password and it's confimation don't match.");
        $('#confirmpassword').focus();
        error++;
    }

    // check name
    if ($('#name').val() == "") {
        $(".warning-name").text("A value is required.");
        error++;
    }
    // check birht
    var birth = $('#birthdate').val();
    if(checkbirth(birth)==false)
    {
        error++;
    }

    //check email
    if ($("#email").val() == "") {
        $(".warning-email").text("A value is required.");
        error++;
    } else {
        var emailStr = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        var isemail = emailStr.test($('#email').val());
        if (!isemail) {
            $(".warning-email").text("Invaild email.");
            error++;
        }
    }
    if (error == 0) {
        var email = $('#email').val();
        var password = $('#password').val();
        var confirmpassword = $('#confirmpassword').val();
        var name = $('#name').val();
        var birthdate = $('#birthdate').val();
        var gender = $('#gender').val();
        var country = $('#country').val();
        // tao du lieu cua file
        var files = document.getElementById('photofile').files;
        var avatar = files[0];

        var data = new FormData();
        data.append('email', email);
        data.append('password', password);
        data.append('confirmpassword', confirmpassword);
        data.append('name', name);
        data.append('birthdate', birthdate);
        data.append('gender', gender);
        data.append('country', country);
        data.append('avatar', avatar);

        $.ajax({
            url: "../model/chekForm.php",
            processData: false,
            contentType: false,
            data,
            type: 'post',
            success: function(result) {
                result = JSON.parse(result);
                if (result.success) {
                    alert("Sign Up Success");
                    location.href = '/login';
                } else alert(result.message);
                console.log(result);
            }
        });

    }
    return false;
}
function checkbirth(birth)
{
         // console.log(birth);
         var d = new Date();
         var day = d.getDate();
         var month = d.getMonth()+1;
         var year = d.getFullYear();
         var currentime = year+"-"+month+"-"+day;
         birth = parseDate(birth).getTime();
         currentime = parseDate(currentime).getTime();
        if (birth < currentime) {
            return true;
        } else {
            return false;
        }
}
function parseDate(str) {
              var mdy = str.split('-');
              return new Date(mdy[0], mdy[1], mdy[2]);
        }
