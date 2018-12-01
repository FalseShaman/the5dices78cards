var spreadId = 0;
var positionId = 0;
var positionPlace = 0;

function setError(inputId) {
    $('#'+inputId).attr('style', 'border: 3px solid #FF6C00;');
    $('label[for="'+inputId+'"]').attr('style', 'color: #FF6C00;');
}
function removeErrors(formClass) {
    $('.'+formClass+' label').attr('style', '');
    $('.'+formClass+' input').attr('style', '');
    $('.'+formClass+' textarea').attr('style', '');
}
function writeInfo(title, specification, history) {
    $('#titleInfo').text(title);
    $('#specificationInfo').text(specification);
    $('#historyInfo').text(history);
}
function writeMap(height = 0, length = 0) {
    $('#spreadMap').empty();
    if (height > 0 && height < 10 && length > 0 && length < 10) {
        var divWidth = Math.floor(100/length);
        var divCount = height * length;
        var map = '';
        for (pos=divCount; pos>0; pos--)
        {
            var place = divCount - pos + 1;
            map += '<div style="width: '+divWidth+'%;">'+
                        '<button class="btn btn-default spreadPosition" data-place="'+place+'" data-id="0">Выбрать</button>'+
                    '</div>';
        }
        $('#spreadMap').append(map);  
    }
}
function putPosition(positionList) {
    $.each(positionList, function(ind, val){
        var div = $('button[data-place="'+val['place']+'"]').parent();
        $(div).addClass('chosenPosition');
        $(div).empty();
        $(div).append('<button class="showPosition"><img class="img-responsive" src="/view/design/show.png"></button>');
        $(div).append('<button class="editPosition"><img class="img-responsive" src="/view/design/edit.png"></button>');
    });
}

$('#spreadCreate').click(function(){
    spreadId = 0;
    $.getScript( "view/Spread/js/create.js", function( data, textStatus, jqxhr ) {
        console.log(textStatus+'-'+"view/Spread/js/create.js");
        $('#modalScript').text(data);
    });
    $('#spreadCreator').modal('toggle');
});
$('#spreadList').click(function(){
    $('#spreadSelector').modal('toggle');   
    $.getScript( "view/Spread/js/list.js", function( data, textStatus, jqxhr ) {
        console.log(textStatus+'-'+"view/Spread/js/list.js");
        $('#modalScript').text(data);
    });  
});
$('body')
    .on('click', '.spreadPosition', function(){
        positionId = $(this).attr('data-id');
        positionPlace = $(this).attr('data-place');
        $('#positionSelector').modal('toggle');
        $.getScript( "view/Spread/js/position.js", function( data, textStatus, jqxhr ) {
            console.log(textStatus+'-'+"view/Spread/js/position.js");
            $('#modalScript').text(data);
        });
    })
;       