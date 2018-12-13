var userId = $('#userId').val();

// Spread form
$('#createSpread').click(function(){
    $('#spreadEdit').prop('disabled', true);

    $('.spreadForm').find('input').val('');
    $('.spreadForm').find('textarea').val(''); 
    $('.spreadForm').find('input[name="id"]').val(0); 
});
$('#saveSpread').click(function(){
    var write = true;
    $('.spreadForm').children().removeClass('error');

    var id = $('.spreadForm').find('input[name="id"]').val(); 
    var title = $('.spreadForm').find('input[name="title"]').val(); 
    var specification = $('.spreadForm').find('textarea[name="specification"]').val(); 
    var history = $('.spreadForm').find('textarea[name="history"]').val(); 

    if (title.length == 0) {
        $('.spreadForm').find('input[name="title"]').parent().addClass('error');
        write = false;
    }

    if (write) {
        $.ajax({
            method: "POST",
            url: "/spread/put",
            dataType: 'json',
            data: {
                id: id,
                title: title,
                specification: specification,
                history: history
            },
            success: function(response) {
                if (response.status == 'done') {
                    $('#spreadEdit').prop('disabled', false);

                    $('.spreadForm').find('input[name="id"]').val(response.id);
                    $('.spreadForm').find('input[name="title"]').val(title);
                    $('.spreadForm').find('input[name="specification"]').val(specification);
                    $('.spreadForm').find('input[name="history"]').val(history);

                    $('#titleInfo').text(title);
                    $('#specificationInfo').text(specification);
                    $('#historyInfo').text(history); 

                    $('#spreadForm').collapse();
                    $('#spreadInfo').collapse();
                } else {
                    $('#saveSpread').parent().addClass('error');
                    $('#saveSpread').text('Что-то пошло не так');
                    console.log(response);
                }
            }
        }); 
    }
});

$('body')
// Spread list
    .on('click', '.openSpread', function(){
        var id = $(this).attr('data-id');
        $.ajax({
            method: "POST",
            url: "/spread/get",
            dataType: 'json',
            data: {
                id: id
            },
            success: function(response) {
                if (response.status == 'done') {
                    $('#spreadEdit').prop('disabled', false);

                    $('.spreadForm').find('input[name="id"]').val(response.data.spread.id);
                    $('.spreadForm').find('input[name="title"]').val(response.data.spread.title);
                    $('.spreadForm').find('input[name="specification"]').val(response.data.spread.specification);
                    $('.spreadForm').find('input[name="history"]').val(response.data.spread.history);

                    $('#titleInfo').text(response.data.spread.title);
                    $('#specificationInfo').text(response.data.spread.specification);
                    $('#historyInfo').text(response.data.spread.history); 

                    $.each(response.data.positionList, function(ind, val){
                        var div = $('button[data-place="'+val['place']+'"]').parent();
                        $(div).addClass('chosenPosition');
                        $(div).empty();
                        $(div).append('<button class="btn btn-default showPosition" data-id="'+val['id']+'"><img class="img-responsive" src="/view/design/show.png"></button>');
                        if (response.data.spread.user_id == userId) {
                            $(div).append('<button class="btn btn-default editPosition" data-id="'+val['id']+'"><img class="img-responsive" src="/view/design/edit.png"></button>');
                            $(div).append('<button class="btn btn-default clearPosition" data-id="'+val['id']+'" data-place="'+val['place']+'"><img class="img-responsive" src="/view/design/clear.png"></button>');
                        }
                    });

                    $('#spreadList').collapse();
                    $('#spreadInfo').collapse();
                } else {
                    console.log(response);
                }
            }
        }); 
    })
// Position form
    .on('click', '.putPosition', function(){
        $('.positionForm').find('input').val('');
        $('.positionForm').find('textarea').val(''); 
        $('.positionForm').find('input[name="id"]').val(0); 
        $('.positionForm').find('input[name="place"]').val($(this).attr('data-place'));

        $('#spreadInfo').collapse();    
        $('#positionForm').collapse();
    })
    .on('click', '#savePosition', function(){
        var write = true;
        $('.positionForm').children().children().removeClass('error');

        var id = $('.positionForm').find('input[name="id"]').val(); 
        var spreadId = $('.spreadForm').find('input[name="id"]').val();
        var place = $('.positionForm').find('input[name="place"]').val(); 
        var name = $('.positionForm').find('input[name="name"]').val(); 
        var number = $('.positionForm').find('input[name="number"]').val(); 
        var description = $('.positionForm').find('textarea[name="description"]').val(); 
        var link = $('.positionForm').find('textarea[name="link"]').val(); 
        var card = $('.positionForm').find('textarea[name="card"]').val(); 
        var frame = $('.positionForm').find('textarea[name="frame"]').val(); 

        if (name.length == 0) {
            $('.positionForm').find('input[name="name"]').parent().addClass('error');
            write = false;
        }
        if (number <= 0) {
            $('.positionForm').find('input[name="number"]').parent().addClass('error');
            write = false;
        }

        if (write) {
            $.ajax({
                method: "POST",
                url: "/spread/putPosition",
                dataType: 'json',
                data: {
                    id: id,
                    spread: spreadId,
                    place: place,
                    name: name,
                    number: number,
                    description: description,
                    link: link,
                    card: card,
                    frame: frame
                },
                success: function(response) {
                    if (response.status == 'done') {
                        var div = $('button[data-place="'+place+'"]').parent();
                        $(div).empty();
                        $(div).append('<button class="btn btn-default showPosition" data-id="'+response.id+'"><img class="img-responsive" src="/view/design/show.png"></button>');
                        $(div).append('<button class="btn btn-default editPosition" data-id="'+response.id+'"><img class="img-responsive" src="/view/design/edit.png"></button>');
                        $(div).append('<button class="btn btn-default clearPosition" data-id="'+response.id+'" data-place="'+place+'"><img class="img-responsive" src="/view/design/clear.png"></button>');

                        $('#positionForm').collapse();
                        $('#spreadInfo').collapse();
                    } else {
                        $('#savePosition').parent().addClass('error');
                        $('#savePosition').text('Что-то пошло не так');
                        console.log(response);
                    }
                }
            }); 
        }
    })
    .on('click', '.editPosition', function(){
        var id = $(this).attr('data-id');
        $.ajax({
            method: "POST",
            url: "/spread/getPosition",
            dataType: 'json',
            data: {
                id: id
            },
            success: function(response) {
                if (response.status == 'done') {
                    $('.positionForm').find('input[name="id"]').val(response.data.id); 
                    $('.positionForm').find('input[name="place"]').val(response.data.place); 
                    $('.positionForm').find('input[name="name"]').val(response.data.name); 
                    $('.positionForm').find('input[name="number"]').val(response.data.number); 
                    $('.positionForm').find('textarea[name="description"]').val(response.data.description); 
                    $('.positionForm').find('textarea[name="link"]').val(response.data.link); 
                    $('.positionForm').find('textarea[name="card"]').val(response.data.card); 
                    $('.positionForm').find('textarea[name="frame"]').val(response.data.frame); 

                    $('#spreadInfo').collapse();
                    $('#positionForm').collapse();
                } else {
                    console.log(response);
                }
            }
        }); 
    })
// Position info
    .on('click', '.showPosition', function(){
        var id = $(this).attr('data-id');
        $.ajax({
            method: "POST",
            url: "/spread/getPosition",
            dataType: 'json',
            data: {
                id: id
            },
            success: function(response) {
                if (response.status == 'done') {
                    $('#infoName').text(response.data.name);
                    $('#infoNumber').text('('+response.data.number+')');
                    $('#infoDescription').text(response.data.description);
                    $('#infoLink').text(response.data.link);
                    $('#infoCard').text(response.data.card);
                    $('#infoFrame').text(response.data.frame);

                    $('#spreadInfo').collapse();
                    $('#positionInfo').collapse();
                } else {
                    console.log(response);
                }
            }
        }); 
    })
// Position remove
    .on('click', '.clearPosition', function(){
        var id = $(this).attr('data-id');
        var place = $(this).attr('data-place');

        $.ajax({
            method: "POST",
            url: "/spread/removePosition",
            dataType: 'json',
            data: {
                id: id
            },
            success: function(response) {
            }
        }); 

        var div = $(this).parent();
        $(div).empty();
        $(div).append('<button class="btn btn-default spreadPosition" data-place="'+place+'"><img class="img-responsive" src="/view/design/refresh.png"></button>');
    })
;       
