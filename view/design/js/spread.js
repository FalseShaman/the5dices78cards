$.ajax({
    method: "POST",
    url: "/getDeckList",
    data: {},
    success: function(response) {
        console.log(response);
    }
});

$('.cardSelectButton').click(function() {
    console.log($(this).attr('id'));
    $('#cardSelector').modal('toggle');
});
