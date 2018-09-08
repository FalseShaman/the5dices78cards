<!DOCTYPE html>
<html>
    <head>
        <?php include('Layout_head.php'); ?>
    </head>

    <body style="background-image: url('/view/design/background/stone.jpg'); background-size: contain;">
        <div class="container-fluid">
            <div class="container">
                <?php echo $content; ?>
            </div>
        </div>

        <nav class="navbar navbar-dark bg-dark" style="position: absolute; top: 0; width: 10%; font-size: 1.7em;">
            <ul class="navbar-nav">
                <?php echo $leftMenu; ?>
            </ul>
        </nav>

        <nav class="navbar navbar-dark bg-dark" style="position: absolute; top: 0; right: 0; width: 10%; font-size: 1.5em;">
            <ul class="navbar-nav">
                <?php echo $rightMenu; ?>
            </ul>
        </nav>

        <?php include('Layout_script.php'); ?>
    </body>

</html> 