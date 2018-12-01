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
                	console.log(response.data);
                    $('#spreadSelector').modal('toggle');  
                }
            }
        }); 
    })
;       