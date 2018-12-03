var positionName = $('#positionName').val();
var positionNumber = $('#positionNumber').val();
var positionDescription = $('#positionDescription').val();
var positionLink = $('#positionLink').val();
var positionCard = $('#positionCard').val();

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
    console.log(positionNumber);
    if (positionNumber <= 0) {
        setError('positionNumber');
        write = false;
    }

    if (write) {
        $.ajax({
            method: "POST",
            url: "/spread/position",
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
                    positionId = response.id;
                    putPosition([{'id': positionId, 'place': positionPlace}]);

                    $('#positionSelector').modal('toggle');
                    $('#positionName').val('');
                    $('#positionNumber').val(0);
                    $('#positionDescription').val('');
                    $('#positionLink').val('');
                    $('#positionCard').val('');
                } else {
                    $('#positionSave').parent().children('h3').remove();
                    $('#positionSave').parent().append('<h3 style="color: #FF6C00;">'+response.message+'</h3>');
                }
            }
        }); 
    }
});