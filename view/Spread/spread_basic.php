<?php
    $form = '';
    $form = '<form class="createSpreadForm"> 
                <div class="col-md-12">
                    <div class="nameInput">
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
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Выбор позиции</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
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
                                            <button type="button" class="form-control btn btn-success" id="positionSave" style="display: none">Ок</button>
                                        </div>
                                    </div>
                                </div>
                            </div>';

    $content = $form.$spreadMap.$positionSelectModal;

    $saveButton = '<button type="button" class="btn btn-light" id="spreadSave" title="Сохранить"><img class="img-responsive" src="/view/design/save.png"></button>';
    $rightMenu = $saveButton;