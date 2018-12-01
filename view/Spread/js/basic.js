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
function writeMap(height = 0, length = 0) {
    if (height > 0 && height < 10 && length > 0 && length < 10) {
        var divWidth = Math.floor(100/length);
        var divCount = height * length;
        var map = '';
        for (pos=divCount; pos>0; pos--)
        {
            map += '<div style="width: '+divWidth+'%;">'+
                        '<button class="btn btn-default spreadPosition" data-place="'+pos+'" data-id="0">Выбрать</button>'+
                    '</div>';
        }
        $('#spreadMap').append(map);  
    }
}
function putPosition(positionList) {
  $.each(positionList, function(ind, val){
    $('button[data-place="'+val['id']+'"]').parent().empty().append('<p>'+val['number']+' ('+val['name']+')</p>');
  });
}

$('#spreadCreate').click(function(){
    spreadId = 0;
    $('#spreadCreator').modal('toggle');
});
$('#spreadList').click(function(){
    $('#spreadSelector').modal('toggle');     
});

$('body')
    .on('click', '.spreadPosition', function(){
        positionId = $(this).attr('data-id');
        positionPlace = $(this).attr('data-place');
        $('#positionSelector').modal('toggle');
    })
;       

$.getScript( "view/Spread/js/create.js", function( data, textStatus, jqxhr ) {
  console.log(textStatus+"view/Spread/js/create.js");
  $('#modalScript').text(data);
});
$.getScript( "view/Spread/js/list.js", function( data, textStatus, jqxhr ) {
  console.log(textStatus+"view/Spread/js/list.js");
  $('#modalScript').text(data);
});
$.getScript( "view/Spread/js/position.js", function( data, textStatus, jqxhr ) {
  console.log(textStatus+"view/Spread/js/position.js");
  $('#modalScript').text(data);
});