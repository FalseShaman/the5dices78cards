<?php
    $user = json_decode($_SESSION['user']);

    require_once 'model/spread.php';
    $spread = new spread($user->id);
    $spreadList = $spread->getList();

    $content = '<div class="col-md-12 spreadMap" id="spreadMap">';
    
    include 'model/Spread/modals/spread_create.php' ;
    include 'model/Spread/modals/spread_list.php';
    include 'model/Spread/modals/spread_position.php';

    $newButton = '<button type="button" class="btn btn-light" id="spreadCreate" title="Создать"><img class="img-responsive" src="/view/design/new.png"></button>';
    $listButton = '<button type="button" class="btn btn-light" id="spreadList" title="Список"><img class="img-responsive" src="/view/design/open.png"></button>';
    $saveButton = '<button type="button" class="btn btn-light" id="spreadSave" title="Сохранить"><img class="img-responsive" src="/view/design/save.png"></button>';
    $rightMenu = $newButton.$listButton.$saveButton;