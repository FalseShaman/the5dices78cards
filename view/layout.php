<!DOCTYPE html>
<html>
    <head>
        <?php include('layout_head.php'); ?>
    </head>

    <body style="background-image: url('/view/design/background/stone.jpg'); background-size: 100%;">
        <button type="button" class="btn btn-default" id="changeBack" style="position: fixed; top: 5px; right: 190px;"><img class="img-responsive" src="/view/design/refresh.png"></button>

        <div class="container-fluid">
            <div class="container">
                <?php echo $content; ?>
            </div>
        </div>

        <?php if($leftMenu && $leftMenu > ''): ?>
            <nav class="navbar navbar-dark bg-dark" style="position: absolute; top: 5px; left: 5px; width: 10%; border: solid 1px gray; border-radius: 33px; font-size: 1.3em;">
                <ul class="navbar-nav">
                    <?php echo $leftMenu; ?>
                </ul>
            </nav>
        <?php endif; ?>

        <?php if($rightMenu && $rightMenu > ''): ?>
            <nav class="navbar navbar-dark bg-dark" style="position: absolute; top: 5px; right: 5px; width: 10%; border: solid 1px gray; border-radius: 33px; font-size: 1.1em;">
                <ul class="navbar-nav">
                    <?php echo $rightMenu; ?>
                </ul>
            </nav>
        <?php endif; ?>

        <?php include('layout_script.php'); ?>
    </body>

</html> 