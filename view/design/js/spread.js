var placeNumber = 0;
var deckName = 0;
var cardNumber = 0;

$('.placeSelectButton').click(function(){
    placeNumber = $(this).attr('id');
    $('#placeSelector').modal('toggle');
});
$('.deckSelectButton').click(function(){
    deckName = $(this).attr('id');
});
$('.arcanaSelectButton').click(function(){
    cardNumber = $(this).attr('id');
});
$('.cardSelectButton').click(function(){
    cardNumber += $(this).attr('id');
});
$('#putCard').click(function(){
    $('#placeSelector').modal('toggle');
    console.log(deckName+'--'+cardNumber);
});