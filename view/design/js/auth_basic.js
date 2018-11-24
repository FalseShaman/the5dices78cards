var username = 0;
var pass = 0;

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
    }
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

