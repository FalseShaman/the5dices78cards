<?php
    $form = '';
    $form = '<div class="col-md-2">
                <label for="height">Высота:</label>
                <input type="number" id="height">
            </div>
            <div class="col-md-2">
                <label for="length">Длина:</label>
                <input type="number" id="length">
            </div>
            <div class="col-md-4">
                <label for="title">Название:</label>
                <input type="text" id="title">
            </div>
            <div class="col-md-2">
                <button class="form-control" id="createSpread">Создать</button>
            </div>';
    
    $spreadPlace = '<div class="col-md-12" id="newSpreadPlace></div>';

    $content = $form.$spreadPlace;