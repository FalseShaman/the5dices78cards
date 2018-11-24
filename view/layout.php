<!DOCTYPE html>
<html>
    <head>
        <?php include('layout_head.php'); ?>
        <style>
            .descPosition {
                position: absolute;
                top: 35%;
                margin-right: 15px;
                color: #ffffff;
                background-color: #000000;
                word-break: break-all;
                text-align: center;
                opacity: 0;
                width: 80%;
                height: 30%;
            }
            .descPosition:hover {
                opacity: 0.7;
            }
            .topPanel {
                background-color: #000000;
                border: 2px solid #ffffff;
                border-radius: 5px;
                margin-bottom: 20px;
            }
            .greetingWord {
                font-size: 20px;
                color: #ffffff;
            }
        </style>
    </head>

    <body style="background-image: url('/view/design/background/stone.jpg'); background-size: 100%;">

        <div class="container-fluid">
            <div class="topPanel">
                <h2>ordo draco sacerdos</h2>
                <button type="button" class="btn btn-default" id="changeBack" style="float: right; margin-top: 5px;"><img class="img-responsive" src="/view/design/refresh.png"></button>
            </div>
            <div class="container">
                <?php echo $content; ?>
            </div>
        </div>

        <?php if($leftMenu && $leftMenu > ''): ?>
            <nav class="navbar navbar-dark bg-dark" style="position: absolute; top: 5px; left: 5px; width: 10%; border: solid 1px gray; border-radius: 33px; font-size: 1.3em;">
                <ul class="navbar-nav">
                    <?php echo $leftMenu; ?>
                </ul>
            </nav>
        <?php endif; ?>

        <?php if($rightMenu && $rightMenu > ''): ?>
            <nav class="navbar navbar-dark bg-dark" style="position: absolute; top: 5px; right: 5px; width: 10%; border: solid 1px gray; border-radius: 33px; font-size: 1.1em;">
                <ul class="navbar-nav">
                    <?php echo $rightMenu; ?>
                </ul>
            </nav>
        <?php endif; ?>

        <?php include('layout_script.php'); ?>
    </body>

</html>