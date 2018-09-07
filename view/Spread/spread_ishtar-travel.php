<?php
    $positions = array(
        'Инанна' => array('position' => 1),
        'Нети' => array('position' => 6),
        'Шугурра' => array('position' => 12),
        'Мерная веревка' => array('position' => 24),
        'Лазурное ожерелье' => array('position' => 30),
        'Нумуз' => array('position' => 31),
        'Золотые браслеты' => array('position' => 32),
        'Брошь с желанием' => array('position' => 33),
        'Мантия царицы' => array('position' => 28),
        'Эрешкигаль' => array('position' => 3),
        'Ниншубур' => array('position' => 10),
        'Живая вода' => array('position' => 20),
        'Живая еда' => array('position' => 21),
        'Новая личность' => array('position' => 2),
        'Жертва Думузи' => array('position' => 8)
    );

    $translateList = getTranslate();
    require dirname(__DIR__).'/../model/spread.php';
    $spread = new Spread();
    $content = $spread->getMap($positions);
    $content .= $spread->getModal($translateList);
    $rightMenu = $spread->getDeckList($translateList);
?>
