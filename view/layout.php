<!DOCTYPE html>
<html>
    <head>
        <?php include('layout_head.php'); ?>
    </head>

    <body>
        <div class="topPanel">
            <h2>ordo draco sacerdos librarium</h2>
        </div>

        <?php if($leftMenu && $leftMenu > ''): ?>
        <nav class="navbar navbar-dark bg-dark">
            <ul class="navbar-nav">
                <?php echo $leftMenu; ?>
            </ul>
        </nav>
        <?php endif; ?>

        <?php if($rightMenu && $rightMenu > ''): ?>
            <nav class="navbar navbar-dark bg-dark">
                <ul class="navbar-nav">
                    <li class="nav-item"><button type="button" class="btn btn-light" id="backChange"><img class="img-responsive" src="/view/design/refresh.png"></button></li>
                    <?php echo $rightMenu; ?>
                </ul>
            </nav>
        <?php endif; ?>     

        <div class="container-fluid">
            <div class="container">
                <?php echo $content; ?>
            </div>
        </div>
        
        <?php echo $modals; ?>
                 
        <?php include('layout_script.php'); ?>
    </body>

</html>