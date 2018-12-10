var userId = $('#userId').val();
var spreadId = 0;
var positionId = 0;
var positionPlace = 0;
var positionInfo = [];

function setError(inputId) {
    $('#'+inputId).attr('style', 'border: 3px solid #FF6C00;');
    $('label[for="'+inputId+'"]').attr('style', 'color: #FF6C00;');
}
function removeErrors(formClass) {
    $('.'+formClass+' label').attr('style', '');
    $('.'+formClass+' input').attr('style', '');
    $('.'+formClass+' textarea').attr('style', '');
}
function writeInfo(id, title, specification, history) {
    spreadId = id;
    $('#titleInfo').text(title);
    $('#specificationInfo').text(specification);
    $('#historyInfo').text(history);
}
function editInfo() {
    $('#spreadTitle').val($('#titleInfo').text());
    $('#spreadHeight').prop('disabled', true);
    $('#spreadLength').prop('disabled', true);
    $('#spreadSpecification').val($('#specificationInfo').text());
    $('#spreadHistory').val($('#historyInfo').text());
}
function writeMap(height = 0, length = 0) {
    $('#spreadMap').empty();
    if (height > 0 && height < 10 && length > 0 && length < 10) {
        var divWidth = Math.floor(100/length);
        var divCount = height * length;
        var map = '';
        console.log(divCount);
        for (pos=divCount; pos>0; pos--)
        {
            map += '<div style="width: '+divWidth+'%;">'+
                        '<button class="btn btn-default spreadPosition" data-place="'+pos+'" data-id="0"><img class="img-responsive" src="/view/design/open.png"></button>'+
                    '</div>';
        }
        $('#spreadMap').append(map);  
    }
}
function putPosition(positionList, spreadUser) {
    $.each(positionList, function(ind, val){
        positionInfo[val['id']] = val;

        var div = $('button[data-place="'+val['place']+'"]').parent();
        $(div).addClass('chosenPosition');
        $(div).empty();
        $(div).append('<button class="btn btn-default showPosition" data-id="'+val['id']+'"><img class="img-responsive" src="/view/design/show.png"></button>');
        if (spreadUser == userId) {
            $(div).append('<button class="btn btn-default editPosition" data-id="'+val['id']+'" data-place="'+val['place']+'"><img class="img-responsive" src="/view/design/edit.png"></button>');
        }
    });
}

$('#spreadCreate').click(function(){
    spreadId = 0;
    $('#spreadSave').prop('disabled', false);   
    $('#spreadCreator').modal('toggle');
});
$('#spreadCreatorClose').click(function(){
    $('#spreadCreator').modal('toggle');
});

$('#spreadList').click(function(){
    $('#spreadSelector').modal('toggle');   
});
$('#spreadSelectorClose').click(function(){
    $('#spreadSelector').modal('toggle');
});

$('#spreadEdit').click(function(){
    $('#spreadCreator').modal('toggle');
});

$('body')
    .on('click', '.spreadPosition', function(){
        positionId = $(this).attr('data-id');
        positionPlace = $(this).attr('data-place');

        $('#positionSave').prop('disabled', false);
        $('#positionSelector').modal('toggle');
    })
    .on('click', '.showPosition', function(){
        positionId = $(this).attr('data-id');
        var info = positionInfo[positionId];

        $('#infoName').text(info['name']);
        $('#infoNumber').text('('+info['number']+')');
        $('#infoDescription').text(info['description']);
        $('#infoLink').text(info['link']);
        $('#infoCard').text(info['card']);
        $('#infoFrame').text(info['frame']);
        $('#positionInfo').modal('toggle');
    })
    .on('click', '.editPosition', function(){
        positionId = $(this).attr('data-id');
        var info = positionInfo[positionId];
        positionPlace = info['place'];

        $('#positionName').val(info['name']);
        $('#positionNumber').val(info['number']);
        $('#positionDescription').val(info['description']);
        $('#positionLink').val(info['link']);
        $('#positionCard').val(info['card']);
        $('#positionFrame').val(info['frame']);
        $('#positionSave').prop('disabled', false);
        $('#positionSelector').modal('toggle');
    })
;       
$('#positionSelectorClose').click(function(){
    $('#positionSelector').modal('toggle');
});
$('#positionInfoClose').click(function(){
    $('#positionInfo').modal('toggle');
});
       
$(document).on('ready', function(){
    $.getScript( "view/Spread/js/create.js", function( data, textStatus, jqxhr ) {
        console.log(textStatus+'-'+"create.js");
        $('#modalCreateScript').text(data);
    });
    $.getScript( "view/Spread/js/list.js", function( data, textStatus, jqxhr ) {
        console.log(textStatus+'-'+"list.js");
        $('#modalListScript').text(data);
    });  
    $.getScript( "view/Spread/js/position.js", function( data, textStatus, jqxhr ) {
        console.log(textStatus+'-'+"position.js");
        $('#modalPositionScript').text(data);
    });
});