var spread_id = 0;

$('.spreadSelectButton').click(function(){
    if (spread_id != 0) {
        $('#'+spread_id).removeClass('btn-dark').addClass('btn-light');
    }
    spread_id = $(this).attr('id');
    $(this).removeClass('btn-light').addClass('btn-dark');

    var title = $(this).text();
    var map = [];
    var line = $(this).attr('data-map').split('|');
    $.each(line, function(ind, val){
        if (val > '') {
            var memory = val.split('->');
            map[ind] = { 'place': memory[0], 'arcana': memory[1], 'title': title }
        }
    });
    console.log(map);

    $.each(map, function(ind, val){
        $('#cardPlace'+val.place+' .arcanaImage').attr('src', '/gallery/egypt/'+val.arcana+'.jpg').show();
        $('#cardPlace'+val.place+' .descPosition').text(val.title).show();
        $('#cardPlace'+val.place+' .editPlace').show();
        $('#cardPlace'+val.place+' .showArcana').show();
    });
});