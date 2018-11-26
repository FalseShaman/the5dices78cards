<?php
    $form = '';
    $form = '<form id="createSpreadForm" class="col-md-12 createSpreadForm"> 
                <div class="textInput">
                    <label for="title">Название:</label>
                    <input type="text" class="form-control" id="title">
                </div>
                <div class="numberInput">
                    <label for="height">Высота:</label>
                    <input type="number" class="form-control" id="height">
                </div>
                <div class="numberInput">
                    <label for="length">Длина:</label>
                    <input type="number" class="form-control" id="length">
                </div>
                <button type="button" class="btn btn-info form-control" id="createSpread">Создать</button>       
            </form>';
    
    $spreadPlace = '<div class="col-md-12" id="newSpreadPlace"></div>';

    $content = $form.$spreadPlace;

    $openButton = '<button type="button" class="btn btn-light" id="profileEditButton" title="Редактировать"><img class="img-responsive" src="/view/design/edit.png"></button>';
    $saveButton = '<button type="button" class="btn btn-light" id="profileSaveButton" title="Сохранить"><img class="img-responsive" src="/view/design/save.png"></button>';
    $rightMenu = $openButton.$saveButton;