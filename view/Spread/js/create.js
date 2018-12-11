var spreadTitle = $('#spreadTitle').val();
var spreadHeight = $('#spreadHeight').val();
var spreadLength = $('#spreadLength').val();
var spreadSpecification = $('#spreadSpecification').val();
var spreadHistory = $('#spreadHistory').val();

$('#spreadTitle').keyup(function(){
    spreadTitle = $(this).val();
});
$('#spreadHeight').keyup(function(){
    $('#spreadHeight').prop('disabled', false);
    spreadHeight = $(this).val();
});
$('#spreadLength').keyup(function(){
    $('#spreadLength').prop('disabled', false);
    spreadLength = $(this).val();
});
$('#spreadSpecification').keyup(function(){
    spreadSpecification = $(this).val();
});
$('#spreadHistory').keyup(function(){
    spreadHistory = $(this).val();
});

$('#spreadSave').click(function(){
    var write = true;
    removeErrors('createSpreadForm');

    if (spreadTitle.length == 0) {
        setError('spreadTitle');
        write = false;
    }
    if (spreadHeight <= 0 || spreadHeight > 10) {
        setError('spreadHeight');
        write = false;
    }
    if (spreadLength <= 0 || spreadLength > 10) {
        setError('spreadLength');
        write = false;
    }

    if (write) {
        $('#spreadSave').prop('disabled', true);
        
        $.ajax({
            method: "POST",
            url: "/spread/save",
            dataType: 'json',
            data: {
                id: spreadId,
                title: spreadTitle,
                height: spreadHeight,
                length: spreadLength,
                specification: spreadSpecification,
                history: spreadHistory
            },
            success: function(response) {
                if (response.status == 'done') {, spreadTitle, spreadSpecification, spreadHistory
                    spreadId = response.id;
                    spreadData = {'title': spreadTitle, 'specification': spreadSpecification, 'history': spreadHistory, 'height': spreadHeight, 'length': spreadLength};
                    showSpread();
                    showMap();

                    $('.spreadList').append('<li class="list-group-item"><button class="btn btn-default openSpread" data-id="'+response.id+'">'+spreadTitle+'</button></li>')
                    $('#spreadTitle').val('');
                    $('#spreadHeight').val(0);
                    $('#spreadLength').val(0);
                    $('#spreadSpecification').val('');
                    $('#spreadHistory').val('');
                    $('#spreadCreator').modal('toggle');
                } else {
                    $('#spreadSave').parent().children('h3').remove();
                    $('#spreadSave').parent().append('<h3 style="color: #FF6C00;">'+response.message+'</h3>');
                }
            }
        }); 
    }
});