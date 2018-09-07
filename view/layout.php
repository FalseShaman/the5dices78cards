<!DOCTYPE html>
<html>
    <head>
        <?php include('Layout_head.php'); ?>
    </head>

    <body style="background-image: url('/view/design/background-light.jpg'); background-repeat: no-repeat; background-size: cover;">
        <div class="container-fluid">
            <div class="container">
                <?php echo $content; ?>
            </div>
        </div>

        <?php include('Layout_navbar.php'); ?>

        <?php include('Layout_script.php'); ?>
    </body>

</html> 