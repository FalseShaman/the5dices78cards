var placeNumber = 0;
var deckName = 0;
var arcanaNumber = 0;
var cardNumber = 0;

$('.deckSelectButton').click(function(){
    $('.nav-item').children('.btn').removeClass('btn-info');
    $(this).removeClass('btn-light');
    $(this).addClass('btn-info');
    deckName = $(this).attr('id');
    $('.placeSelectButton').prop('disabled', false);
});

$('.placeSelectButton').click(function(){
    placeNumber = 0;
    arcanaNumber = 0;
    cardNumber = 0;
    $('#arcanaSelector').show();
    $('#majorSelector').hide();
    $('#minorSelector').hide();
    placeNumber = $(this).attr('id');
    $('#placeSelector').modal('toggle');
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
    var card = '<img class="deskCard" src="/gallery/'+deckName+'/'+cardNumber+'.jpg" width="100" height="180">';
    $('#cardPlace'+placeNumber).append(card);
    $('#'+placeNumber+'.placeSelectButton').hide();
    $('#placeSelector').modal('toggle');
});