<?php
    $form = '';
    $form = '<form id="createSpreadForm" class="createSpreadForm"> 
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
    
    $spreadPlace = '<div class="col-md-12 spreadMap" id="newSpreadPlace"></div>';

    $content = $form.$spreadPlace;

    $saveButton = '<button type="button" class="btn btn-light" id="spreadSaveButton" title="Сохранить"><img class="img-responsive" src="/view/design/save.png"></button>';
    $rightMenu = $saveButton;