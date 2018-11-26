<?php
    $form = '';
    $form = '<form id="createSpreadForm" class="createSpreadForm"> 
                <div class="col-md-12">
                    <div class="nameInput">
                        <label for="title">Название:</label>
                        <input type="text" class="form-control" id="title">
                    </div>
                    <div class="numberInput">
                        <label for="length">Длина:</label>
                        <input type="number" class="form-control" id="length">
                    </div>
                    <div class="numberInput">
                        <label for="height">Высота:</label>
                        <input type="number" class="form-control" id="height">
                    </div>
                </div> 
                <div class="col-md-12">
                    <div class="textInput">
                        <label for="specification">Назначение:</label>
                        <textarea class="form-control" id="specification"></textarea>                    
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="textInput">
                        <label for="history">История:</label>
                        <textarea class="form-control" id="history"></textarea>                    
                    </div>
                </div>
            </form>';
    
    $spreadPlace = '<div class="col-md-12" id="newSpreadPlace"></div>';

    $content = $form.$spreadPlace;

    $saveButton = '<button type="button" class="btn btn-light" id="spreadSaveButton" title="Сохранить"><img class="img-responsive" src="/view/design/save.png"></button>';
    $rightMenu = $saveButton;