var placeNumber = 0;
var deckName = 0;
var arcanaNumber = 0;
var cardNumber = 0;
var placeName = 0;
var placeCount = 0;

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
    placeCount = 0;
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
    placeCount = $('#placeCount').val();

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
    $('#cardPlace'+placeNumber+' .deskCard').append('<img class="img-fluid" src="/gallery/'+deckName+'/'+cardNumber+'.jpg" style="margin: 20px; transform: rotate(\'+rotate+\'deg);">')
    $('#cardPlace'+placeNumber+' .deskCard').attr('style', 'padding: 0; border: 0;');
    $('#cardPlace'+placeNumber+' .deskCard').attr('data-card', cardNumber);
    $('#cardPlace'+placeNumber+' .deskCard').attr('title', placeName+' ('+placeCount+')');
    $('#cardPlace'+placeNumber+' .deskCard').attr('data-content', placeName+' ('+placeCount+')');
    $('#cardPlace'+placeNumber+' .deskCard').show();
    $('#cardPlace'+placeNumber+' .placeSelectButton').hide();
    $('#placeSelector').modal('toggle');
});