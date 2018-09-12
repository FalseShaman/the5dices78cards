var username;
var pass;
var pass_again;

$('#username').keyup(function(){
    username = $(this).val();
    if (username.length > 0 && pass.length > 0) {
        $('#login').prop('disabled', false);
    } else {
        $('#login').prop('disabled', true);
    }
});
$('#pass').keyup(function(){
    pass = $(this).val();
    if (username.length > 0 && pass.length > 0) {
        $('#login').prop('disabled', false);
        if (pass == pass_again) {
            $('#register').prop('disabled', false);
        } else {
            $('#register').prop('disabled', true);
        }
    }
});
$('#pass_again').keyup(function(){
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
        url: "/auth/register",
        dataType: 'json',
        data: {
            username: username,
            pass: pass
        },
        success: function(response) {
            if (response.status == 'done') {
                window.location.href = '/spread';
            } else {
                $('#errorLabel').text(response.message);
                $('#errorLabel').show();
            }
        }
    });
});

$('#login').click(function(){
    $.ajax({
        method: "POST",
        url: "/auth/login",
        dataType: 'json',
        data: {
            username: username,
            pass: pass
        },
        success: function(response) {
            if (response.status == 'done') {
                window.location.href = '/spread';
            } else {
                $('#errorLabel').text(response.message);
                $('#errorLabel').show();
            }
        }
    });
});

