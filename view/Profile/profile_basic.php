<?php
    $user = json_decode($_SESSION['user']);

    require_once '/app/model/spread.php';
    $spread = new spread($user->id);
    $spreadList = $spread->getList();
    foreach ($spreadList as $spreadLi)
    {
        $rightMenu .= '<li class="nav-item"><button class="btn btn-light" href="javascript:void(0);" id="'.$spreadLi->id.'" style="margin: 10px 0;">'.$spreadLi->title.'</button></li>';
    }

    $openButton = '<button type="button" class="btn btn-light" id="profileEditButton" title="Редактировать" style="position: fixed; top: 10px; right: 12%;"><img class="img-responsive" src="/view/design/edit.png"></button>';
    $saveButton = '<button type="button" class="btn btn-light" id="profileSaveButton" title="Сохранить" style="position: fixed; top: 55px; right: 12%;"><img class="img-responsive" src="/view/design/save.png"></button>';
    $controlPanel .= $openButton.$saveButton;

    $profile = '<div class="row">';
    $profile .= '<div class="col-md-4"><h2>'.$user->name.'</h2></div>';
    $profile .= '<div class="col-md-8"><p>'.$user->rules.'</p></div>';
    $profile .= '<div class="col-md-4"><h3>'.$user->specialization.'</h3></div>';
    $profile .= '<div class="col-md-8"><p>'.$user->decks.'</p></div>';
    $profile .= '</div>';

    $content = $controlPanel.$profile;