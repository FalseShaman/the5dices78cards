$('.cardSelectButton').click(function() {
    console.log($(this).attr('id'));
    $('#cardSelector').modal('toggle');
});
