function setError(inputId) {
    $('#'+inputId).attr('style', 'border: 3px solid #FF6C00;');
    $('label[for="'+inputId+'"]').attr('style', 'color: #FF6C00;');
}
function removeErrors(formClass) {
    $('.'+formClass+' label').attr('style', '');
    $('.'+formClass+' input').attr('style', '');
    $('.'+formClass+' textarea').attr('style', '');
}

$('#spreadCreate').click(function(){
    $('#spreadCreator').modal('toggle');
});
$('#spreadList').click(function(){
    $('#spreadSelector').modal('toggle');     
});

$('body')
    .on('click', '.spreadPosition', function(){
        positionPlace = $(this).attr('data-place');
        $('#positionSelector').modal('toggle');
    })
;       

var spreadId = 0;
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

$('#spreadSave').click(function(){
    var write = true;
    removeErrors('createSpreadForm');

    if (spreadTitle.length == 0) {
        setError('spreadTitle');
        write = false;
    }
    if (spreadHeight <= 0) {
        setError('spreadHeight');
        write = false;
    }
    if (spreadLength <= 0) {
        setError('spreadLength');
        write = false;
    }

    if (write) {
        $.ajax({
            method: "POST",
            url: "/spread/save",
            dataType: 'json',
            data: {
                id: spreadId,
                title: spreadTitle,
                height: spreadHeight,
                length: spreadLength,
                specification: spreadSpecification,
                history: spreadHistory
            },
            success: function(response) {
                if (response.status == 'done') {
                    var divWidth = Math.floor(100/spreadLength);
                    var divCount = spreadHeight * spreadLength;
                    var map = '';
                    for (pos=divCount; pos>0; pos--)
                    {
                        map += '<div style="width: '+divWidth+'%;" data-place="'+pos+'"><button class="btn btn-default spreadPosition">Выбрать</button></div>'
                    }
                    $('#spreadMap').append(map);  
                    spreadId = response.id;
                } else {
                    $('#spreadMap').append('<h3 style="color: #FF6C00;">'+response.message+'</h3>');
                }
            }
        }); 
    }
});

var positionId = 0;
var positionPlace = 0;
var positionName = '';
var positionNumber = 0;
var positionDescription = '';
var positionLink = '';
var positionCard = '';

$('#positionName').keyup(function(){
    positionName = $(this).val();
});
$('#positionNumber').keyup(function(){
    positionNumber = $(this).val();
});
$('#positionDescription').keyup(function(){
    positionDescription = $(this).val();
});
$('#positionLink').keyup(function(){
    positionLink = $(this).val();
});
$('#positionCard').keyup(function(){
    positionCard = $(this).val();
});

$('#positionSave').click(function(){
    var write = true;
    removeErrors('createPositionForm');

    if (positionName.length == 0) {
        setError('positionName');
        write = false;
    }
    if (positionNumber < 0) {
        setError('positionNumber');
        write = false;
    }

    if (write) {
        $.ajax({
            method: "POST",
            url: "/spread/save",
            dataType: 'json',
            data: {
                id: positionId,
                spread: spreadId,
                place: positionPlace,
                name: positionName,
                number: positionNumber,
                description: positionDescription,
                link: positionLink,
                card: positionCard
            },
            success: function(response) {
                if (response.status == 'done') {
                    $('#positionSelector').modal('toggle');
                    $('.spreadPosition[data-place="'+response.id+'"]').attr('data-id', response.id);
                } else {
                    $('#positionSave').parent().append('<h3 style="color: #FF6C00;">'+response.message+'</h3>');
                }
            }
        }); 
    }
});
