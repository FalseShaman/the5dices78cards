var username;
var pass;
var pass_again;

$('#username').change(function(){
    username = $(this).val();
    if (username > '') {
        $('#login').prop('disabled', false);
    } else {
        $('#login').prop('disabled', true);
    }
});
$('#pass').change(function(){
     pass = $(this).val();
     if (pass > '') {
         $('#login').prop('disabled', false)
         if (pass == pass_again) {
             $('#register').prop('disabled', false)
         } else {
             $('#register').prop('disabled', true)
         }
     }
});
$('#pass_again').change(function(){
    pass_again = $(this).val();
    if (pass_again > '' && pass == pass_again) {
        $('#register').prop('disabled', false);
    } else {
        $('#register').prop('disabled', true);
    }
});

$('#register').click(function(){
    $.ajax({
        method: "POST",
        url: "/register",
        data: {
            username: username,
            pass: pass
        },
        success: function(response) {
            console.log(response);
        }
    });
});

$('#login').click(function(){
    $.ajax({
        method: "POST",
        url: "/login",
        data: {
            username: username,
            pass: pass
        },
        success: function(response) {
            console.log(response);
        }
    });
});

