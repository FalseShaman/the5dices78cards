<?php
    $positions = array(
        1 => array('number' => 1, 'name' => 'Инанна'),
        6 => array('number' => 2, 'name' => 'Нети'),
        12 => array('number' => 3, 'name' => 'Шугурра'),
        18 => array('number' => 4, 'name' => 'Мерная веревка'),
        19 => array('number' => 5, 'name' => 'Лазурное ожерелье'),
        20 => array('number' => 6, 'name' => 'Нумуз'),
        21 => array('number' => 7, 'name' => 'Золотые браслеты'),
        22 => array('number' => 8, 'name' => 'Брошь с желанием'),
        16 => array('number' => 9, 'name' => 'Мантия царицы'),
        3 => array('number' => 10, 'name' => 'Эрешкигаль'),
        10 => array('number' => 11, 'name' => 'Ниншубур'),
        9 => array('number' => 12, 'name' => 'Живая вода'),
        15 => array('number' => 13, 'name' => 'Живая еда'),
        2 => array('number' => 14, 'name' => 'Новая личность'),
        8 => array('number' => 15, 'name' => 'Жертва Думузи')
    );

    $translateList = getTranslate();
    require dirname(__DIR__).'/../model/spread.php';
    $spread = new Spread();
    $content = $spread->getMap($positions);
    $content .= $spread->getModal($translateList);
    $rightMenu = $spread->getDeckList($translateList);
?>
