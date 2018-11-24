<?php
    $user = json_decode($_SESSION['user']);
    require_once 'spread.php';
    $spread = new spread($user->id);
    $spreadList = $spread->getList();
    foreach ($spreadList as $spreadLi)
    {
        $rightMenu .= '<li class="nav-item"><button class="btn btn-light" href="javascript:void(0);" id="'.$spreadLi->id.'" style="margin: 10px 0;">'.$spreadLi->title.'</button></li>';
    }