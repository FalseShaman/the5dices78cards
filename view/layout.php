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
            <nav class="navbar navbar-expand-sm navbar-dark bg-dark leftMenu">
                <ul class="navbar-nav">
                    <?php echo $leftMenu; ?>
                </ul>
            </nav>
        <?php endif; ?>

        <?php if($rightMenu && $rightMenu > ''): ?>
            <nav class="navbar navbar-expand-sm navbar-dark bg-dark rightMenu">
                <ul class="navbar-nav">
                    <?php echo $rightMenu; ?>        
                </ul>
            </nav>           
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