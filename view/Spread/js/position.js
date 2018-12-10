var positionName = $('#positionName').val();
var positionNumber = $('#positionNumber').val();
var positionDescription = $('#positionDescription').val();
var positionLink = $('#positionLink').val();
var positionCard = $('#positionCard').val();
var positionFrame = $('#positionFrame').val();

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
$('#positionFrame').keyup(function(){
    positionFrame = $(this).val();
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
        $('#positionSave').prop('disabled', true);

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
                card: positionCard,
                frame: positionFrame
            },
            success: function(response) {
                if (response.status == 'done') {
                    positionId = response.id;
                    putPosition([{'id': positionId, 'place': positionPlace, 'name': positionName, 'number': positionNumber, 'description': positionDescription, 'link': positionLink, 'card': positionCard, 'frame': positionFrame}], userId);

                    $('#positionName').val('');
                    $('#positionNumber').val(0);
                    $('#positionDescription').val('');
                    $('#positionLink').val('');
                    $('#positionCard').val('');
                    $('#positionFrame').val('');
                    $('#positionSelector').modal('toggle');
                } else {
                    $('#positionSave').parent().children('h3').remove();
                    $('#positionSave').parent().append('<h3 style="color: #FF6C00;">'+response.message+'</h3>');
                }
            }
        }); 
    }
});