<?php
    $user = json_decode($_SESSION['user']);

    require_once '/app/model/spread.php';
    $spread = new spread($user->id);
    $spreadList = $spread->getList();

    if (!empty($spreadList)) {
        var_dump($spreadList);
    }
?>
