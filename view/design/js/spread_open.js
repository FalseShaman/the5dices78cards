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

    var title = $(this).text();
    var map = [];
    var line = $(this).attr('data-map').split('|');
    $.each(line, function(ind, val){
        if (val > '') {
            var memory = val.split('->');
            map[ind] = { 'place': memory[0], 'arcana': memory[1], 'title': title }
        }
    });

    $.each(map, function(ind, val){
        $('#cardPlace'+val.place+' .arcanaImage').attr('src', '/gallery/egypt/'+val.arcana+'.jpg').show();
        $('#cardPlace'+val.place+' .descPosition').text(val.title).show();
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