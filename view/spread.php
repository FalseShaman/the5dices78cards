<!DOCTYPE html>
<html>
    <head>
        <?php include('Layout_head.php'); ?>
    </head>

    <body>
        <div class="container-fluid">
            <div class="container">
                <?php if ($map) { echo $map; } ?>
                <?php if ($list) { var_dump($list); } ?>
            </div>
        </div>

        <?php include('Layout_navbar.php'); ?>

        <?php include('Layout_script.php'); ?>
    </body>

</html> 