var spreadTitle = '';
var spreadHeight = 0;
var spreadLength = 0;
var spreadSpecification = '';
var spreadHistory = '';

$('#spreadTitle').keyup(function(){
    spreadTitle = $(this).val();
});
$('#spreadHeight').keyup(function(){
    spreadHeight = $(this).val();
});
$('#spreadLength').keyup(function(){
    spreadLength = $(this).val();
});
$('#spreadSpecification').keyup(function(){
    spreadSpecification = $(this).val();
});
$('#spreadHistory').keyup(function(){
    spreadHistory = $(this).val();
});

$('#spreadSaveButton').click(function(){
    var write = true;
    if (spreadTitle.length == 0) {
        $('#spreadTitle').attr('style', 'border: 3px solid #FF6C00;');
        $('label[for="spreadTitle"]').attr('style', 'color: #FF6C00;');
        write = false;
    }
    if (spreadHeight <= 0) {
        $('#spreadHeight').attr('style', 'border: 3px solid #FF6C00;');
        $('label[for="spreadHeight"]').attr('style', 'color: #FF6C00;');
        write = false;
    }
    if (length <= 0) {
        $('#spreadLength').attr('style', 'border: 3px solid #FF6C00;');
        $('label[for="spreadLength"]').attr('style', 'color: #FF6C00;');
        write = false;
    }
    if (spreadSpecification.length == 0) {
        $('#spreadSpecification').attr('style', 'border: 3px solid #FF6C00;');
        $('label[for="spreadSpecification"]').attr('style', 'color: #FF6C00;');
        write = false;
    }
    if (spreadHistory.length == 0) {
        $('#spreadHistory').attr('style', 'border: 3px solid #FF6C00;');
        $('label[for="spreadHistory"]').attr('style', 'color: #FF6C00;');
        write = false;
    }

    if (write) {
        $.ajax({
            method: "POST",
            url: "/spread/save",
            dataType: 'json',
            data: {
                title: spreadTitle,
                height: spreadHeight,
                length: spreadLength,
                specification: spreadSpecification,
                history: spreadHistory
            },
            success: function(response) {
                if (response.status == 'done') {
                    $('#newSpreadPlace').append('<input type="hidden" id="spreadId" value="'+response.id+'">');
                    var divHeight = Math.floor(100/spreadHeight);
                    var divWidth = Math.floor(100/spreadLength);
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