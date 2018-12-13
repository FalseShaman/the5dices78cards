<?php
    $user = json_decode($_SESSION['user']);
    $userInfo = '<input type="hidden" id="userId" value="'.$user->id.'">';

    require_once 'model/spread.php';
    $spread = new spread($user->id);
    $spreadMass = $spread->getList();

    $createButton = '<li class="nav-item"><a class="nav-link" id="createSpread" data-toggle="collapse" href="#spreadForm" role="button" aria-expanded="false" aria-controls="spreadForm">Создать</a></li>';
    $openButton = '<li class="nav-item"><a class="nav-link" data-toggle="collapse" href="#spreadList" role="button" aria-expanded="false" aria-controls="spreadList">Открыть</a></li>';
    $editButton = '<li class="nav-item"><a class="nav-link" data-toggle="collapse" href="#spreadForm" role="button" aria-expanded="false" aria-controls="spreadForm" disabled>Редактировать</a></li>';
    $rightMenu = $createButton.$openButton.$editButton;

    $spreadForm = '<div class="collapse" id="spreadForm">
                        <div class="card card-body">
                            <form class="spreadForm">
                                <input type="hidden" name="id" value="0">
                                <div class="col-sm-7 titleInput">
                                    <label>Название:</label>
                                    <input type="text" class="form-control" name="title">
                                </div>  
                                <div class="col-sm-12 textInput">
                                    <label>Назначение:</label>
                                    <textarea class="form-control" name="specification"></textarea>   
                                </div>
                                <div class="col-sm-12 textInput">
                                    <label>История:</label>
                                    <textarea class="form-control" name="history"></textarea>    
                                </div>
                                <div class="col-sm-12">
                                    <button type="button" class="form-control btn btn-info" id="saveSpread">Сохранить</button>
                                </div>
                            </form>
                        </div>
                    </div>';

    $spreadList = '';
    if ($spreadMass && is_array($spreadMass) && count($spreadMass) > 0) {
        $spreadList = '<div class="collapse" id="spreadList">
                        <div class="card card-body col-sm-12">
                            <ul class="list-group spreadList">';
        foreach ($spreadMass as $spread)
        {
            $list .= '<li class="list-group-item"><button class="btn btn-default openSpread" data-id="'.$spread['id'].'">'.$spread['title'].'</button></li>';
        }
        $spreadList .= '</ul></div></div>';
    }

    $spreadInfo = '<div class="collapse" id="spreadInfo">
                        <div class="card card-body col-sm-12">
                            <div class="col-sm-7"><h3 id="titleInfo"></h3></div>
                            <div class="col-sm-5" id="historyInfo"></div>
                            <div class="col-sm-8" id="specificationInfo"></div>
                            <div class="col-sm-3" id="spreadGeometry"></div>
                            <div class="spreadMap">';                   
        for ($place = 1; $place < 82; $place++) 
        {
            $spreadInfo .= '<div><button class="btn btn-default putPosition" data-place="'.$place.'"><img class="img-responsive" src="/view/design/refresh.png"></button></div>';
        }
    $spreadInfo .= '</div></div>';

    $positionForm = '<div class="collapse" id="positionForm">
                        <div class="card card-body">
                            <form class="positionForm"> 
                                <input type="hidden" name="id" value="0">
                                <input type="hidden" name="place" value="0">
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
                                    <div class="textInput">
                                        <label>Собственное значение позиции:</label>
                                        <textarea class="form-control" name="description"></textarea>                    
                                    </div>              
                                </div>
                                <div class="col-sm-12">
                                    <div class="textInput">
                                        <label>Связи с позициями в раскладе:</label>
                                        <textarea class="form-control" name="link"></textarea>                    
                                    </div>              
                                </div>
                                <div class="col-sm-12">
                                    <div class="textInput">
                                        <label>Советы по чтению карты:</label>
                                        <textarea class="form-control" name="card"></textarea>                    
                                    </div>              
                                </div>
                                <div class="col-sm-12">
                                    <div class="textInput">
                                        <label>Пример чтения:</label>
                                        <textarea class="form-control" name="frame"></textarea>                    
                                    </div>              
                                </div>
                                <div class="col-sm-12">
                                    <div class="numberInput">
                                        <button type="button" class="form-control btn btn-info" id="savePosition">Сохранить</button>
                                    </div>
                                </div>
                            </form> 
                        </div>
                    </div>';

    $positionInfo = '<div class="collapse" id="positionInfo">
                        <div class="card card-body">
                            <div class="col-sm-12">
                                <h3 id="infoName"></h3> <p id="infoNumber"></p>
                            </div>
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
                        </div>
                    </div>';
                            
    $content = $userInfo.$spreadForm.$spreadList.$spreadInfo.$spreadMap.$positionForm.$positionInfo;
