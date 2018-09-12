<?php
    $user = $_SESSION['user'];
    var_dump(json_decode($user));

    require_once '../../spread.php';
    $spread = new spread();
    var_dump($spread);
?>
