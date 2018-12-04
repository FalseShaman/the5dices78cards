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
                    $('#spreadSelector').modal('toggle');  
                    
                    writeInfo(response.data.spread.title, response.data.spread.specification, response.data.spread.history);
                    writeMap(response.data.spread.height, response.data.spread.length);
                    putPosition(response.data.positionList);
                }
            }
        }); 
    })
;       