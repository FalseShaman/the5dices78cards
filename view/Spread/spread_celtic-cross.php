<?php
    $positions = array(
         7 => array('number' => 1, 'name' => 'Суть проблемы'),
         9 => array('number' => 2, 'name' => 'Дополнительный фактор'),
         2 => array('number' => 3, 'name' => 'Цели и желания'),
         14 => array('number' => 4, 'name' => 'Корень проблемы'),
         6 => array('number' => 5, 'name' => 'Прошлое'),
         10 => array('number' => 6, 'name' => 'Будущее'),
         17 => array('number' => 7, 'name' => 'Позиция кверента'),
         11 => array('number' => 8, 'name' => 'Окружение'),
         5 => array('number' => 9, 'name' => 'Страхи и надежды'),
         8 => array('number' => 10, 'name' => 'Итог')
    );

    $translateList = getTranslate();
    require dirname(__DIR__).'/../model/spread.php';
    $spread = new Spread();
    $content = $spread->getMap($positions);
    $content .= $spread->getModal($translateList);
    $rightMenu = $spread->getDeckList($translateList);
?>
