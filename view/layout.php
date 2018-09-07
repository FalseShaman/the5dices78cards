<!DOCTYPE html>
<html>
    <head>
        <?php include('Layout_head.php'); ?>
    </head>

    <body style="background-image: url('/design/background-light.jpg')">
        <div class="container-fluid">
            <div class="container">
                <?php echo $content; ?>
            </div>
        </div>

        <?php include('Layout_navbar.php'); ?>

        <?php include('Layout_script.php'); ?>
    </body>

</html> 