<!DOCTYPE html>
<html>
    <head>
        <?php include('layout_head.php'); ?>
    </head>

    <body>
        <div class="container-fluid">
            <div class="topPanel">
                <h2>ordo draco sacerdos librarium</h2>
                <button type="button" class="btn btn-default backChangeButton" id="backChangeButton"><img class="img-responsive" src="/view/design/refresh.png"></button>
            </div>
            <div class="container">
                <?php echo $content; ?>
            </div>
        </div>

        <?php if($leftMenu && $leftMenu > ''): ?>
            <nav class="navbar navbar-dark bg-dark leftMenu">
                <ul class="navbar-nav">
                    <?php echo $leftMenu; ?>
                </ul>
            </nav>
        <?php endif; ?>

        <?php if($rightMenu && $rightMenu > ''): ?>
            <nav class="navbar rightMenu">
                <ul class="navbar-nav">
                    <?php echo $rightMenu; ?>
                </ul>
            </nav>
        <?php endif; ?>

        <?php include('layout_script.php'); ?>
    </body>

</html>