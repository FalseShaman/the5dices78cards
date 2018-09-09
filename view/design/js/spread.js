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
    $('#placeCount').val('');

    $('#positionSelector').show();
    $('#arcanaSelector').hide();
    $('#majorSelector').hide();
    $('#minorSelector').hide();
    placeNumber = $(this).attr('data-place');
    $('#placeSelector').modal('toggle');
});

$('#placeNamed').click(function(){
    placeName = $('#placeName').val();
    placeDesc = $('#placeCount').val();

    $('#positionSelector').hide();
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
    $('#cardPlace'+placeNumber+' .deskPosition').text(placeName+' <br>'+ placeDesc);
    $('#cardPlace'+placeNumber+' .clearPosition').show();
    $('#cardPlace'+placeNumber+' .editPlace').show();
    $('#cardPlace'+placeNumber+' .showCard').show();
    $('#cardPlace'+placeNumber+' .placeSelectButton').hide();
    $('#placeSelector').modal('toggle');
});

$('.clearPosition').click(function(){
    placeNumber = $(this).attr('data-position');
    $('#cardPlace'+placeNumber+' .deskCard').attr('src', '').attr('style', '').attr('data-card', '').hide();
    $('#cardPlace'+placeNumber+' .deskPosition').text('').hide();
    $('#cardPlace'+placeNumber+' .clearPosition').hide();
    $('#cardPlace'+placeNumber+' .showCard').hide();
    $('#cardPlace'+placeNumber+' .placeSelectButton').show();
});

$('.showCard').click(function(){
    placeNumber = $(this).attr('data-position');
    if ($(this).attr('data-status') == 0) {
        $('#cardPlace'+placeNumber+' .deskPosition').show();
        $('#cardPlace'+placeNumber+' .clearPosition').hide();
        $(this).attr('data-status', 1);
    } else {
        $('#cardPlace'+placeNumber+' .deskPosition').hide();
        $('#cardPlace'+placeNumber+' .clearPosition').show();
        $(this).attr('data-status', 0);
    }
});