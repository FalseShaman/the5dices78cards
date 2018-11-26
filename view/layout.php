<!DOCTYPE html>
<html>
    <head>
        <?php include('layout_head.php'); ?>
    </head>

    <body>
        <div class="container-fluid">
            <div class="topPanel">
                <h2>ordo draco sacerdos librarium</h2>
            </div>
            <div class="container">
                <?php echo $content; ?>
            </div>
        </div>

        <nav class="navbar navbar-dark bg-dark leftMenu">
            <ul class="navbar-nav">
                <?php if($leftMenu && $leftMenu > ''): ?>
                    <?php echo $leftMenu; ?>
                <?php endif; ?>
            </ul>
        </nav>

        <nav class="navbar rightMenu">
            <ul class="navbar-nav">
                <button type="button" class="btn btn-light" id="backChangeButton"><img class="img-responsive" src="/view/design/refresh.png"></button>
                <?php if($rightMenu && $rightMenu > ''): ?>
                    <?php echo $rightMenu; ?>
                <?php endif; ?>
            </ul>
        </nav>

        <?php include('layout_script.php'); ?>
    </body>

</html>