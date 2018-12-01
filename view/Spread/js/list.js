$('body')
    .on('click', '.openSpread', function(){
        spreadId = $(this).attr('data-id');
        $.ajax({
            method: "POST",
            url: "/spread/get",
            dataType: 'json',
            data: {
                id: spreadId
            },
            success: function(response) {
                if (response.status == 'done') {
                    writeMap(response.data.spread.height, response.data.spread.length);
                    $('#spreadSelector').modal('toggle');  
                    putPosition(response.data.positionList);
                }
            }
        }); 
    })
;       