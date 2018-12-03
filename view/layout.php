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
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark topMenu">
            <ul class="navbar-nav">
                <?php echo $leftMenu; ?>
            </ul>
        </nav>
        <?php endif; ?>

        <?php if($rightMenu && $rightMenu > ''): ?>
            <?php echo $rightMenu; ?>                   
        <?php endif; ?>     

        <div class="container-fluid">
            <div class="container mainContent">
                <?php echo $content; ?>
            </div>
        </div>
        
        <?php echo $modals; ?>
                 
        <?php include('layout_script.php'); ?>
    </body>

</html>