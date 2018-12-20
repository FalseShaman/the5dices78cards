<?php
    $user = json_decode($_SESSION['user']);
    $userInfo = '<input type="hidden" id="userId" value="'.$user->id.'">';

    require_once 'model/spread.php';
    $spread = new spread($user->id);
    $spreadMass = $spread->getList();

    $listButton = '<li class="nav-item"><a class="nav-link" data-toggle="collapse" href="#spreadList" role="button" aria-expanded="false" aria-controls="spreadList">Список</a></li>';
    $spreadButton = '<li class="nav-item"><a class="nav-link" data-toggle="collapse" href="#spreadInfo" role="button" aria-expanded="false" aria-controls="spreadInfo">Стол</a></li>';
    $positionButton = '<li class="nav-item"><a class="nav-link" data-toggle="collapse" href="#positionInfo" role="button" aria-expanded="false" aria-controls="positionInfo">Карта</a></li>';
    $rightMenu = $listButton.$spreadButton.$positionButton;

    $spreadForm = '<div class="collapse" id="spreadForm">
                        <form class="spreadForm">
                            <input type="hidden" name="id" value="0">
                            <div class="col-sm-12">
                                <label>Название:</label>
                                <input type="text" class="form-control" name="title">
                            </div>  
                            <div class="col-sm-12">
                                <label>Назначение:</label>
                                <textarea class="form-control" name="specification"></textarea>   
                            </div>
                            <div class="col-sm-12">
                                <label>История:</label>
                                <textarea class="form-control" name="history"></textarea>    
                            </div>
                            <div class="col-sm-6">
                                <button type="button" class="form-control btn btn-default" id="saveSpread">Сохранить</button>
                            </div>
                            <div class="col-sm-6">
                                <button type="button" class="form-control btn btn-default" id="cancelSpreadForm">Отмена</button>
                            </div>
                        </form>
                    </div>';

    $spreadList = '';
    $spreadList = '<div class="collapse" id="spreadList">
                    <div class="col-sm-12 spreadList">
                        <button class="btn btn-info" id="createSpread">Новый</button></li>';
    if (count($spreadMass) > 0) {
        foreach ($spreadMass as $spread)
        {
            $spreadList .= '<button class="btn btn-default openSpread" data-id="'.$spread['id'].'">'.$spread['title'].'</button>';
        }
    }
    $spreadList .= '</div></div>';

    $positionInfo = '<div class="collapse" id="positionInfo">
                        <button class="btn btn-default" id="editPosition" data-id="0"><img class="img-responsive" src="/view/design/edit.png"></button>
                        <button class="btn btn-default" id="clearPosition" data-id="0" data-place="0"><img class="img-responsive" src="/view/design/clear.png"></button>
                        <div class="col-sm-12"><h3 id="infoName"></h3></div>
                        <hr>
                        <label>Собственное значение позиции:</label>
                        <div class="col-sm-12" id="infoDescription"></div>
                        <hr>
                        <label>Связи с позициями в раскладе:</label>
                        <div class="col-sm-12" id="infoLink"></div>
                        <hr>
                        <label>Советы по чтению карты:</label>
                        <div class="col-sm-12" id="infoCard"></div>
                        <hr>
                        <label>Пример чтения:</label>
                        <div class="col-sm-12" id="infoFrame"></div>
                        <hr>
                    </div>';

    $spreadInfo = '<div class="collapse" id="spreadInfo">
                        <input type="hidden" id="spreadId" value="0">
                        <div class="col-sm-12 spreadInfo">
                            <button class="btn btn-default" id="editSpread"><img class="img-responsive" src="/view/design/edit.png"></button>
                            <div class="col-sm-6" id="historyInfo"></div>
                            <div class="col-sm-7"><h3 id="titleInfo"></h3></div>
                            <div class="col-sm-12" id="specificationInfo"></div>
                            <div class="spreadMap">';                   
        for ($place = 1; $place < 82; $place++) 
        {
            $spreadInfo .= '<div><button class="btn btn-default putPosition" data-id="0" data-place="'.$place.'"><img class="img-responsive" src="/view/design/refresh.png"></button></div>';
        }
    $spreadInfo .= '</div></div></div>';

    $positionForm = '<div class="collapse" id="positionForm">
                        <form class="positionForm"> 
                            <input type="hidden" name="id" value="0">
                            <input type="hidden" name="place" value="0">
                            <input type="hidden" name="spreadId" value="0">
                            <div class="col-sm-12">
                                <div class="nameInput">
                                    <label>Имя:</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="numberInput">
                                    <label>Номер:</label>
                                    <input type="number" class="form-control" name="number">
                                </div>              
                            </div>
                            <div class="col-sm-12">
                                <label>Собственное значение позиции:</label>
                                <textarea class="form-control" name="description"></textarea>  
                            </div>
                            <div class="col-sm-12">
                                <label>Связи с позициями в раскладе:</label>
                                <textarea class="form-control" name="link"></textarea>         
                            </div>
                            <div class="col-sm-12">
                                <label>Советы по чтению карты:</label>
                                <textarea class="form-control" name="card"></textarea>         
                            </div>
                            <div class="col-sm-12">
                                <label>Пример чтения:</label>
                                <textarea class="form-control" name="frame"></textarea>      
                            </div>
                            <div class="col-sm-6">
                                <button type="button" class="form-control btn btn-default" id="savePosition">Сохранить</button>
                            </div>
                            <div class="col-sm-6">
                                <button type="button" class="form-control btn btn-default" id="cancelPositionForm">Отмена</button>
                            </div>
                        </form> 
                    </div>';
                            
    $content = $userInfo.$spreadForm.$spreadList.$positionInfo.$spreadInfo.$positionForm;
