<?php
    $user = json_decode($_SESSION['user']);
    $userInfo = '<input type="hidden" id="userId" value="'.$user->id.'">';

    require_once 'model/spread.php';
    $spread = new spread($user->id);
    $spreadList = $spread->getList();

    $createButton = '<li class="nav-item"><a class="nav-link" id="createSpread" data-toggle="collapse" href="#spreadForm" role="button" aria-expanded="false" aria-controls="spreadForm">'.ucfirst($translateList['create']).'</a></li>';
    $openButton = '<li class="nav-item"><a class="nav-link" data-toggle="collapse" href="#spreadList" role="button" aria-expanded="false" aria-controls="spreadList">'.ucfirst($translateList['open']).'</a></li>';
    $editButton = '<li class="nav-item"><a class="nav-link" id="openSpread" data-toggle="collapse" href="#spreadForm" role="button" aria-expanded="false" aria-controls="spreadForm">'.ucfirst($translateList['edit']).'</a></li>';
    $rightMenu = $createButton.$openButton.$rightMenu;

    $spreadForm = '<div class="collapse" id="spreadForm">
                        <div class="card card-body">
                            <form class="createSpreadForm"> 
                                <div class="col-sm-12">
                                    <div class="titleInput">
                                        <label for="spreadTitle">Название:</label>
                                        <input type="text" class="form-control" id="spreadTitle">
                                    </div>
                                </div>  
                                <div class="col-sm-12">
                                    <div class="numberInput">
                                        <label for="spreadLength">Длина:</label>
                                        <input type="number" class="form-control" id="spreadLength">
                                    </div>
                                    <div class="numberInput">
                                        <label for="spreadHeight">Высота:</label>
                                        <input type="number" class="form-control" id="spreadHeight">
                                    </div>
                                </div> 
                                <div class="col-sm-12">
                                    <div class="textInput">
                                        <label for="spreadSpecification">Назначение:</label>
                                        <textarea class="form-control" id="spreadSpecification"></textarea>                    
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="textInput">
                                        <label for="spreadHistory">История:</label>
                                        <textarea class="form-control" id="spreadHistory"></textarea>                    
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <button type="button" class="form-control btn btn-info" id="spreadSave">Сохранить</button>
                                </div>
                            </form>
                        </div>
                    </div>';

    $spreadInfo = '<div class="collapse" id="spreadInfo">
                        <div class="card card-body col-sm-12">
                            <div class="col-sm-6"><h3 id="titleInfo"></h3></div>
                            <div class="col-sm-5" id="historyInfo"></div>
                            <div class="col-sm-11" id="specificationInfo"></div>
                        </div>
                    </div>';
    $spreadMap = '<div class="collapse" id="spreadMap">
                        <div class="card card-body col-sm-12">
                        </div>
                    </div>';

    $spreadList = '';
    if ($spreadList && is_array($spreadList) && count($spreadList) > 0) {
        $spreadList = '<div class="collapse" id="spreadMap">
                        <div class="card card-body col-sm-12">
                            <ul class="list-group spreadList">';
        foreach ($spreadList as $spreadLi)
        {
            $list .= '<li class="list-group-item"><button class="btn btn-default openSpread" data-id="'.$spreadLi['id'].'">'.$spreadLi['title'].'</button></li>';
        }
        $spreadList .= '</ul></div></div>';
    }

    $content = $userInfo.$spreadForm.$spreadInfo.$spreadMap.$spreadList;

    $positionModal = '<div class="modal fade" id="positionSelector" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content spreadPositionModal">
                                <div class="modal-body">
                                    <button type="button" class="close modalClose" id="positionSelectorClose" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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

    $infoModal = '<div class="modal fade" id="positionInfo" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content infoModal">
                            <div class="modal-header">
                                <button type="button" class="close modalClose" id="positionInfoClose" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 id="infoName"></h3> <p id="infoNumber"></p>
                            </div>
                            <div class="modal-body">
                                <label for="positionDescription">Собственное значение позиции:</label>
                                <div class="col-sm-12" id="infoDescription"></div>
                                <hr>
                                <label for="positionLink">Связи с позициями в раскладе:</label>
                                <div class="col-sm-12" id="infoLink"></div>
                                <hr>
                                <label for="positionCard">Советы по чтению карты:</label>
                                <div class="col-sm-12" id="infoCard"></div>
                                <hr>
                                <label for="positionFrame">Пример чтения:</label>
                                <div class="col-sm-12" id="infoFrame"></div>
                            </div>
                        </div>
                    </div>
                </div>';
                            
    $modals = $createModal.$listModal.$positionModal.$infoModal;