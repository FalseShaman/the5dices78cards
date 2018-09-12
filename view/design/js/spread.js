var placeNumber = 0;
var deckName = 0;
var arcanaNumber = 0;
var cardNumber = 0;
var placeName = 0;
var placeDesc = 0;

$('.deckSelectButton').click(function(){
    $('.nav-item').children('.btn').removeClass('btn-info');
    $(this).removeClass('btn-light');
    $(this).addClass('btn-info');

    deckName = $(this).attr('id');

    $('.placeSelectButton').prop('disabled', false);
    $.each($('.deskCard'), function(ind, val){
        $(val).attr('src', '/gallery/'+deckName+'/'+$(val).attr('data-card')+'.jpg');
    });
});

$('.placeSelectButton').click(function(){
    placeNumber = 0;
    arcanaNumber = 0;
    cardNumber = 0;
    placeName = 0;
    placeDesc = 0;
    $('#placeName').val('');
    $('#placeDesc').val('');

    $('#positionSelector').show();
    $('#placeNamed').show();
    $('#arcanaSelector').hide();
    $('#majorSelector').hide();
    $('#minorSelector').hide();
    placeNumber = $(this).attr('data-place');
    $('#placeSelector').modal('toggle');
});

$('#placeNamed').click(function(){
    placeName = $('#placeName').val();
    placeDesc = $('#placeDesc').val();

    $('#positionSelector').hide();
    $('#placeNamed').hide();
    $('#arcanaSelector').show();
});

$('.arcanaSelectButton').click(function(){
    arcanaNumber = parseInt($(this).attr('id'));
    if (arcanaNumber == 0) {
        $('#majorSelector').show();
    } else {
        $('#minorSelector').show();
    }
    $('#arcanaSelector').hide();
});

$('.cardSelectButton').click(function(){
    cardNumber = arcanaNumber + parseInt($(this).attr('id'));
    var rotate = 12 - Math.floor((Math.random() * 24));
    $('#cardPlace'+placeNumber+' .deskCard').attr('src', '/gallery/'+deckName+'/'+cardNumber+'.jpg').attr('style', 'transform: rotate('+rotate+'deg); margin: 20px;').attr('data-card', cardNumber).show();
    $('#cardPlace'+placeNumber+' .deskPosition').text(placeName);
    $('#cardPlace'+placeNumber+' .clearPosition').show();
    $('#cardPlace'+placeNumber+' .editPlace').show();
    $('#cardPlace'+placeNumber+' .showCard').show();
    $('#cardPlace'+placeNumber+' .placeSelectButton').hide();
    $('#placeSelector').modal('toggle');
});

$('.clearPosition').click(function(){
    placeNumber = $(this).attr('data-position');
    $('#cardPlace'+placeNumber+' .deskCard').attr('src', '').attr('style', '').attr('data-card', 0).hide();
    $('#cardPlace'+placeNumber+' .deskPosition').text('').hide();
    $('#cardPlace'+placeNumber+' .clearPosition').hide();
    $('#cardPlace'+placeNumber+' .editPlace').hide();
    $('#cardPlace'+placeNumber+' .showCard').hide();
    $('#cardPlace'+placeNumber+' .placeSelectButton').show();
});

$('.showCard').click(function(){
    placeNumber = $(this).attr('data-position');
    $('#cardPlace'+placeNumber+' .deskPosition').show();
});

$('#spreadSaverButton').click(function(){
    $('#spreadSaver').modal('toggle');
});

$('#saveSpread').click(function(){
    var spreadName = $('#spreadName').val();
    var map = '';

    $.each($('.deskCard'), function(ind,val){
        if($(val).attr('data-card') > 0) {
            map += ind+'->'+$(val).attr('data-card')+'|';
        }
    });

    $.ajax({
        method: "POST",
        url: "/spread/save",
        dataType: 'json',
        data: {
            name: spreadName,
            map: map
        },
        success: function(response) {
            if (response.status == 'done') {
                $('#spreadName').val('');
                $('#spreadSaver').modal('toggle');
            } else {
                $('#errorLabel').text(response.message);
                $('#errorLabel').show();
            }
        }
    });
});