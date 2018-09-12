var placeNumber = 0;
var deckName = 0;
var arcanaNumber = -1;
var cardNumber = 0;
var placeName = 0;
var placeDesc = 0;

$('.deckSelectButton').click(function(){
    $('.nav-item').children('.btn').removeClass('btn-info');
    $(this).removeClass('btn-light');
    $(this).addClass('btn-info');

    deckName = $(this).attr('id');

    $('.placeSelectButton').prop('disabled', false);
    $.each($('.arcanaImage'), function(ind, val){
        $(val).attr('src', '/gallery/'+deckName+'/'+$(val).attr('data-arcana')+'.jpg');
    });
});

$('.placeSelectButton').click(function(){
    placeNumber = 0;
    arcanaNumber = -1;
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

$('.typeSelectButton').click(function(){
    arcanaNumber = parseInt($(this).attr('id'));
    if (arcanaNumber == 0) {
        $('#majorSelector').show();
    } else {
        $('#minorSelector').show();
    }
    $('#arcanaSelector').hide();
});

$('.arcanaSelectButton').click(function(){
    cardNumber = arcanaNumber + parseInt($(this).attr('id'));
    var rotate = 12 - Math.floor((Math.random() * 24));
    $('#cardPlace'+placeNumber+' .arcanaImage').attr('src', '/gallery/'+deckName+'/'+cardNumber+'.jpg').attr('style', 'transform: rotate('+rotate+'deg); margin: 20px;').attr('data-arcana', cardNumber).show();
    $('#cardPlace'+placeNumber+' .deskPosition').text(placeName);
    $('#cardPlace'+placeNumber+' .clearPosition').show();
    $('#cardPlace'+placeNumber+' .editPlace').show();
    $('#cardPlace'+placeNumber+' .placeSelectButton').hide();
    $('#placeSelector').modal('toggle');
});

$('.clearPosition').click(function(){
    placeNumber = $(this).attr('data-position');
    $('#cardPlace'+placeNumber+' .arcanaImage').attr('src', '').attr('style', '').attr('data-arcana', 0).hide();
    $('#cardPlace'+placeNumber+' .deskPosition').text('').hide();
    $('#cardPlace'+placeNumber+' .clearPosition').hide();
    $('#cardPlace'+placeNumber+' .editPlace').hide();
    $('#cardPlace'+placeNumber+' .placeSelectButton').show();
});

$('.showArcana').click(function(){
    placeNumber = $(this).attr('data-position');
    $('#cardPlace'+placeNumber+' .deskPosition').show();
});

$('#spreadSaverButton').click(function(){
    $('#spreadSaver').modal('toggle');
});

$('#saveSpread').click(function(){
    var title = $('#spreadTitle').val();
    var map = '';

    $.each($('.arcanaImage'), function(ind,val){
        if($(val).attr('data-arcana') > -1) {
            map += ind+'->'+$(val).attr('data-arcana')+'|';
        }
    });

    $.ajax({
        method: "POST",
        url: "/spread/save",
        dataType: 'json',
        data: {
            title: title,
            map: map
        },
        success: function(response) {
            if (response.status == 'done') {
                $('#spreadTitle').val('');
                $('#spreadSaver').modal('toggle');
            } else {
                $('#errorLabel').text(response.message);
                $('#errorLabel').show();
            }
        }
    });
});