<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script>
    var backLine = "<?php echo $backLine; ?>";
    var backList = backLine.split('|');
    $.each(backList, function(ind, val){
        var pic = new Image();
        pic.src = '/view/design/background/'+val;
    });

    $('#backChange').click(function(){
        number = Math.floor((Math.random() * backList.length));
        $('body').attr('style', 'background-image: url("/view/design/background/'+backList[number]+'"); background-size: 100%;');
    });
</script>

<script src="/view/design/js/<?php echo $controller->page; ?>_<?php echo $controller->subpage; ?>.js"></script>