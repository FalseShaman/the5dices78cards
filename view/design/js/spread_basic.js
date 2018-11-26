var title = '';
var height = 0;
var length = 0;
var specification = '';
var history = '';

$('#title').keyup(function(){
    title = $(this).val();
});
$('#height').keyup(function(){
    height = $(this).val();
});
$('#length').keyup(function(){
    length = $(this).val();
});
$('#specification').keyup(function(){
    specification = $(this).val();
});
$('#history').keyup(function(){
    history = $(this).val();
});

$('#spreadSaveButton').click(function(){
    var write = true;
    if (title.length) {
        $('#title').attr('style', 'border: 3px solid #FF6C00;');
        $('label[for="title"]').attr('style', 'color: #FF6C00;');
        write = false;
    }
    if (height <= 0) {
        $('#height').attr('style', 'border: 3px solid #FF6C00;');
        $('label[for="height"]').attr('style', 'color: #FF6C00;');
        write = false;
    }
    if (length <= 0) {
        $('#length').attr('style', 'border: 3px solid #FF6C00;');
        $('label[for="length"]').attr('style', 'color: #FF6C00;');
        write = false;
    }
    if (specification.length) {
        $('#specification').attr('style', 'border: 3px solid #FF6C00;');
        $('label[for="specification"]').attr('style', 'color: #FF6C00;');
        write = false;
    }
    if (history.length) {
        $('#history').attr('style', 'border: 3px solid #FF6C00;');
        $('label[for="history"]').attr('style', 'color: #FF6C00;');
        write = false;
    }

    if (write) {
        $.ajax({
            method: "POST",
            url: "/spread/save",
            dataType: 'json',
            data: {
                name: name,
                pass: pass
            },
            success: function(response) {
                if (response.status == 'done') {
                    $('#newSpreadPlace').append('<input type="hidden" id="spreadId" value="'+response.id+'">');
                    var divHeight = Math.floor(100/height);
                    var divWidth = Math.floor(100/length);
                    var divCount = Math.floor(100/divHeight) * Math.floor(100/divWidth);
                    var map = '';
                    for (pos=divCount; pos>0; pos--)
                    {
                        map += '<div style="width: '+divWidth+'%; height: '+divHeight+'%; border: 2px solid #200772; border-radius: 5px;"><button class="btn btn-info">Выбрать</button></div>'
                    }
                    $('#newSpreadPlace').append(map);  
                } else {
                    $('#newSpreadPlace').append('<h3 style="color: #FF6C00;">'+response.message+'</h3>');
                }
            }
        }); 
    }
});