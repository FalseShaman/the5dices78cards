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
    $.each($('.deckCard'), function(ind, val){
        $(val).attr('src', '/gallery/'+deckName+'/'+$(val).attr('data-card')+'.jpg');
    });
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
    var rotate = 12 - Math.floor((Math.random() * 24));
    cardNumber = arcanaNumber + parseInt($(this).attr('id'));
    $('#'+placeNumber+'.deskCard').attr('src', '/gallery/'+deckName+'/'+cardNumber+'.jpg').attr('style', 'transform: rotate('+rotate+'deg); margin: 20px;').attr('data-card', cardNumber);
    $('#'+placeNumber+'.placeSelectButton').hide();
    $('#placeSelector').modal('toggle');
});