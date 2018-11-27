<?php
    $user = json_decode($_SESSION['user']);

    require_once '/app/model/spread.php';
    $spread = new spread($user->id);
    $spreadList = $spread->getList();

    $list = '<ul class="list-group spreadList">';
    foreach ($spreadList as $spreadLi)
    {
        var_dump($spreadLi);
        $list .= '<li class="list-group-item">
                    <button class="btn btn-default openSpread">'.$spreadLi->title.'</button>
                </li>';
    }
    $list .= '</ul>';

    $form = '<form class="createSpreadForm"> 
                <div class="col-md-12">
                    <div class="titleInput">
                        <label for="spreadTitle">Название:</label>
                        <input type="text" class="form-control" id="spreadTitle">
                    </div>
                    <div class="numberInput">
                        <label for="spreadLength">Длина:</label>
                        <input type="number" class="form-control" id="spreadLength">
                    </div>
                    <div class="numberInput">
                        <label for="spreadHeight">Высота:</label>
                        <input type="number" class="form-control" id="spreadHeight">
                    </div>
                </div> 
                <div class="col-md-12">
                    <div class="textInput">
                        <label for="spreadSpecification">Назначение:</label>
                        <textarea class="form-control" id="spreadSpecification"></textarea>                    
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="textInput">
                        <label for="spreadHistory">История:</label>
                        <textarea class="form-control" id="spreadHistory"></textarea>                    
                    </div>
                </div>
            </form>';
    
    $spreadMap = '<div class="col-md-12 spreadMap" id="spreadMap"></div>';

    $positionSelectModal = '<div class="modal fade" id="positionSelector" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content positionModal">
                                        <div class="modal-body">
                                            <button type="button" class="close modalClose" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <form class="createPositionForm"> 
                                                <div class="nameInput">
                                                    <label for="positionName">Имя:</label>
                                                    <input type="text" class="form-control" id="positionName">
                                                </div>
                                                <div class="numberInput">
                                                    <label for="positionNumber">Номер:</label>
                                                    <input type="number" class="form-control" id="positionNumber">
                                                </div>
                                                <div class="textInput">
                                                    <label for="positionDescription">Собственное значение позиции:</label>
                                                    <textarea class="form-control" id="positionDescription"></textarea>                    
                                                </div>
                                                <div class="textInput">
                                                    <label for="positionLink">Связи с позициями в раскладе:</label>
                                                    <textarea class="form-control" id="positionLink"></textarea>                    
                                                </div>
                                                <div class="textInput">
                                                    <label for="positionCard">Советы по чтению карты:</label>
                                                    <textarea class="form-control" id="positionCard"></textarea>                    
                                                </div>
                                                <div class="textInput">
                                                    <label for="positionFrame">Пример чтения:</label>
                                                    <textarea class="form-control" id="positionFrame"></textarea>                    
                                                </div>
                                            </form> 
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="form-control btn btn-info" id="positionSave">Ок</button>
                                        </div>
                                    </div>
                                </div>
                            </div>';

    $content = $list.$form.$spreadMap.$positionSelectModal;

    $newButton = '<button type="button" class="btn btn-light" id="spreadCreate" title="Создать"><img class="img-responsive" src="/view/design/new.png"></button>';
    $listButton = '<button type="button" class="btn btn-light" id="spreadList" title="Список"><img class="img-responsive" src="/view/design/box.png"></button>';
    $saveButton = '<button type="button" class="btn btn-light" id="spreadSave" title="Сохранить"><img class="img-responsive" src="/view/design/save.png"></button>';
    $rightMenu = $saveButton;