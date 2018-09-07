var placeNumber = 0;
var deckName = 0;
var cardNumber = 0;

$('.deckSelectButton').click(function(){
    deckName = $(this).attr('id');
    $('.nav-item').children('.btn').removeClass('btn-info');
    $(this).removeClass('btn-light');
    $(this).addClass('btn-info');
    $('.placeSelectButton').prop('disabled', false);
});

$('.placeSelectButton').click(function(){
    placeNumber = $(this).attr('id');
    $('#placeSelector').modal('toggle');
});
$('.arcanaSelectButton').click(function(){
    cardNumber = parseInt($(this).attr('id'));
    if (cardNumber == 0) {
        $('#majorSelector').show();
    } else {
        $('#minorSelector').show();
    }
    $('#arcanaSelector').hide();
    $('#putCard').prop('disabled', false);
});
$('.cardSelectButton').click(function(){
    cardNumber = cardNumber + parseInt($(this).attr('id'));
});
$('#putCard').click(function(){
    var card = '<img src="/gallery/'+deckName+'/'+cardNumber+'.jpg">';
    $('#cardPlace').append(card);
    placeNumber = 0;
    cardNumber = 0;
    $('#arcanaSelector').show();
    $('#majorSelector').hide();
    $('#minorSelector').hide();
    $('#putCard').prop('disabled', true);
    $('#placeSelector').modal('toggle');
    console.log(cardNumber);
});