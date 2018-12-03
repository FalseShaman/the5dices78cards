<?php
    $user = json_decode($_SESSION['user']);

    require_once 'model/spread.php';
    $spread = new spread($user->id);
    $spreadList = $spread->getList();

    $spreadInfo = '<div class="col-sm-12 spreadInfo">
                        <div class="col-sm-6"><h3 id="titleInfo"></h3></div>
                        <div class="col-sm-5" id="historyInfo"></div>
                        <div class="col-sm-11" id="specificationInfo"></div>
                    </div>';
    $spreadMap = '<div class="col-sm-12 spreadMap" id="spreadMap"></div>';

    $content = $spreadInfo.$spreadMap;
    
    $newButton = '<button type="button" class="btn btn-light createSpread" id="spreadCreate" title="Создать"><img class="img-responsive" src="/view/design/new.png"></button>';
    $listButton = '<button type="button" class="btn btn-light listSpread" id="spreadList" title="Список"><img class="img-responsive" src="/view/design/box.png"></button>';
    $rightMenu = $newButton.$listButton;

    $createModal = '<div class="modal fade" id="spreadCreator" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content createSpreadModal">
                                <div class="modal-body">
                                    <button type="button" class="close modalClose" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="form-control btn btn-info" id="spreadSave">Сохранить</button>
                                </div>
                            </div>
                        </div>
                    </div>';

    $list = '<ul class="list-group spreadList">';
    if ($spreadList && is_array($spreadList)) {
        foreach ($spreadList as $spreadLi)
        {
            $list .= '<li class="list-group-item">
                        <button class="btn btn-default openSpread" data-id="'.$spreadLi['id'].'">'.$spreadLi['title'].'</button>
                    </li>';
        }
        $list .= '</ul>';
    }
    $listModal = '<div class="modal fade" id="spreadSelector" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content spreadListModal">
                            <div class="modal-body">
                                <button type="button" class="close modalClose" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                '.$list.'
                            </div>
                        </div>
                    </div>
                </div>';

    $positionModal = '<div class="modal fade" id="positionSelector" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content spreadPositionModal">
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

    $infoModal = '<div class="modal fade" id="positionInfo" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content infoModal">
                                        <div class="modal-header">
                                            <button type="button" class="close modalClose" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h3 id="infoName"></h3> (<p id="infoNumber"></p>)
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-sm-12" id="infoDescription">
                                            </div>
                                            <div class="col-sm-12" id="infoLink">
                                            </div>
                                            <div class="col-sm-12" id="infoCard">
                                            </div>
                                            <div class="col-sm-12" id="infoFrame">
                                            </div>
                                        <div class="modal-footer">
                                            <button type="button" class="col-sm-6 btn btn-info" id="infoPrev">Предыдущая</button>
                                            <button type="button" class="col-sm-6 btn btn-info" id="infoNext">Следующая</button>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                            
    $modals = $createModal.$listModal.$positionModal.$infoModal;