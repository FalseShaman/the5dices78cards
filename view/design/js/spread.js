var placeNumber = 0;
var deckName = 0;
var cardNumber = 0;

$('.deckSelectButton').click(function(){
    deckName = $(this).attr('id');
    $('.nav-item').children('.btn').removeClass('btn-info');
    $(this).removeClass('btn-dark');
    $(this).addClass('btn-info');
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
    $('#putCard').prop( "disabled", false );
});
$('.cardSelectButton').click(function(){
    cardNumber = cardNumber + parseInt($(this).attr('id'));
});
$('#putCard').click(function(){
    cardNumber = 0;
    $('#placeSelector').modal('toggle');
    console.log(cardNumber);
});