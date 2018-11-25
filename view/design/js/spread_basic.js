var height = 0;
var length = 0;
var title = '';

$('#height').keyup(function(){
    height = $(this).val();
});
$('#length').keyup(function(){
    length = $(this).val();
});
$('#title').keyup(function(){
    title = $(this).val();
});

$('#createSpread').click(function(){
    var divHeight = Math.floor(100/height);
    var divWidth = Math.floor(100/length);
    var divCount = Math.floor(100/divHeight) * Math.floor(100/divWidth);
    var map = '';
    
    for (pos=divCount; pos>0; pos--)
    {
        map += '<div style="width: '+divWidth+'%; height: '+divHeight+'%; border: 2px solid #200772; border-radius: 5px;"><button class="btn btn-info">Выбрать</button></div>'
    }
    
    $('#newSpreadPlace').append(map);
});