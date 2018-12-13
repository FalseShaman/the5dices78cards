var name = 0;
var pass = 0;

$('#name').keyup(function(){
    name = $(this).val();
});
$('#pass').keyup(function(){
    pass = $(this).val();
});

$('#login').click(function(){
    $.ajax({
        method: "POST",
        url: "/auth/login",
        dataType: 'json',
        data: {
            name: name,
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