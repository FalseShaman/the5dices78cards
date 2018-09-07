$('.cardSelectButton').click(function(){
    console.log($(this).attr('id'));
    $('#cardSelector').modal('toggle');
});
$('#putCard').click(function(){
    $('#cardSelector').modal('toggle');
});