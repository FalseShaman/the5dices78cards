var spread_id = 0;
var deckName = 0;

$('.deckSelectButton').click(function(){
    $('.nav-item').children('.btn').removeClass('btn-info');
    $(this).removeClass('btn-light');
    $(this).addClass('btn-info');

    deckName = $(this).attr('id');

    $.each($('.arcanaImage'), function(ind, val){
        $(val).attr('src', '/gallery/'+deckName+'/'+$(val).attr('data-arcana')+'.jpg');
    });
});

$('.spreadSelectButton').click(function(){
    $(this).attr('style', 'cursor: pointer; color: #ffffff;');
    if (spread_id != 0) {
        $('#'+spread_id).attr('style', 'cursor: pointer; color: gray;');
    }

    spread_id = $(this).attr('id');

    $.each($('#spread'+spread_id+' .place'), function(ind, val){
        $('#cardPlace'+$(val).attr('data-place')+' .arcanaImage').attr('src', '/gallery/'+deckName+'/'+$(val).attr('data-arcana')+'.jpg').show();
        $('#cardPlace'+$(val).attr('data-place')+' .arcanaImage').attr('data-arcana', $(val).attr('data-arcana'));
        $('#cardPlace'+$(val).attr('data-place')+' .descPosition').text($(val).attr('data-position')).show();
        $('#cardPlace'+$(val).attr('data-place')+' .showArcana').show();
    });
});

$('.deckSelectButton').click(function(){
    $('.nav-item').children('.btn').removeClass('btn-info');
    $(this).removeClass('btn-light');
    $(this).addClass('btn-info');

    var deckName = $(this).attr('id');

    $.each($('.arcanaImage'), function(ind, val){
        if($(val).attr('data-arcana') > -1) {
            $(val).attr('src', '/gallery/' + deckName + '/' + $(val).attr('data-arcana') + '.jpg');
        }
    });
});

$(document).ready(function(){
    var count = $('.deckSelectButton').length;
    var number =  Math.floor((Math.random() * count));
    $('.deckSelectButton')[number].click();
});