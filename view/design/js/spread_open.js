var spread_id = 0;
var deckName = 'ghousts';

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
    if (spread_id != 0) {
        $('#'+spread_id).removeClass('btn-light').addClass('btn-dark');
    }
    spread_id = $(this).attr('id');
    $(this).removeClass('btn-dark').addClass('btn-light');

    var map = jQuery.parseJSON($(this).attr('data-map'));

    $.each(map, function(ind, val){
        $('#cardPlace'+val.place+' .arcanaImage').attr('src', '/gallery/egypt/'+val.arcana+'.jpg').show();
        $('#cardPlace'+val.place+' .descPosition').text(val.position).show();
        $('#cardPlace'+val.place+' .showArcana').show();
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