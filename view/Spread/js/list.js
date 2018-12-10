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
                    spreadId = id;
                    spreadData = {'title': response.data.spread.title, 'specification': response.data.spread.specification, 'history': response.data.spread.history, 'height': response.data.spread.height, 'length': response.data.spread.length};
                    showSpread();
                    showMap();
                    putPosition(response.data.positionList, response.data.spread.user_id);

                    $('#spreadSelector').modal('toggle');  
                }
            }
        }); 
    })
;       