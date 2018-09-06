<!DOCTYPE html>
<html>
    <head>
        <?php include('Layout_head.php'); ?>
    </head>

    <body>
        <div id="wrapper" class="toggled">
            
            <?php include('Layout_navbar.php'); ?>

            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="container">
                        <?php if (isset($map) && is_string($map)): echo $map; endif; ?>
                    </div>
                </div>
            </div>
        </div>
        
        <?php include('Layout_script.php'); ?>
    </body>

</html> 