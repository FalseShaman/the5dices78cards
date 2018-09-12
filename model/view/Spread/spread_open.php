<?php
    $user = $_SESSION['user'];
    var_dump(json_decode($user));

    require_once '/app/model/spread.php';
    $spread = new spread();
    var_dump($spread);
?>
