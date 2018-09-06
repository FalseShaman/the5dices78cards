<?php
    $divSize = intval(12 / $colCount);
    $divCount = $rowCount * $colCount;
    
    $positions = array(
        'Инанна' => array('position' => 1),
        'Нети' => array('position' => 4),
        'Шугурра' => array('position' => 8),
        'Мерная веревка' => array('position' => 12),
        'Лазурное ожерелье' => array('position' => 16),
        'Нумуз' => array('position' => 17),
        'Золотые браслеты' => array('position' => 18),
        'Брошь с желанием' => array('position' => 19),
        'Мантия царицы' => array('position' => 15),
        'Эрешкигаль' => array('position' => 11),
        'Ниншубур' => array('position' => 10),
        'Живая еда' => array('position' => 13),
        'Живая вода' => array('position' => 14),
        'Новая личность' => array('position' => 3),
        'Жертва Думузи' => array('position' => 7)
    );

    require 'Spread.php';
    $spread = new Spread($divSize, $divCount);

    $map = $spread->getMap($positions);
?>
