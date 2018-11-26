<?php
    $form = '';
    $form = '<form id="createSpreadForm" class="col-md-12 createSpreadForm"> 
                <div class="col-md-5 textInput">
                    <label for="title">Название:</label>
                    <input type="text" class="form-control" id="title">
                </div>
                <div class="col-md-3 numberInput">
                    <label for="height">Высота:</label>
                    <input type="number" class="form-control" id="height">
                </div>
                <div class="col-md-3 numberInput">
                    <label for="length">Длина:</label>
                    <input type="number" class="form-control" id="length">
                </div>
                <div class="col-md-12">
                    <button type="button" class="form-control" id="createSpread">Создать</button>
                </div>
            </form>';
    
    $spreadPlace = '<div class="col-md-12" id="newSpreadPlace"></div>';

    $content = $form.$spreadPlace;

    $openButton = '<button type="button" class="btn btn-light" id="profileEditButton" title="Редактировать"><img class="img-responsive" src="/view/design/edit.png"></button>';
    $saveButton = '<button type="button" class="btn btn-light" id="profileSaveButton" title="Сохранить"><img class="img-responsive" src="/view/design/save.png"></button>';
    $rightMenu = $openButton.$saveButton;