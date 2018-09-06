<?php
    $positions = array(
        'Инанна' => array('position' => 1),
        'Нети' => array('position' => 12),
        'Шугурра' => array('position' => 24),
        'Мерная веревка' => array('position' => 36),
        'Лазурное ожерелье' => array('position' => 48),
        'Нумуз' => array('position' => 49),
        'Золотые браслеты' => array('position' => 50),
        'Брошь с желанием' => array('position' => 51),
        'Мантия царицы' => array('position' => 40),
        'Эрешкигаль' => array('position' => 3),
        'Ниншубур' => array('position' => 16),
        'Живая еда' => array('position' => 26),
        'Живая вода' => array('position' => 27),
        'Новая личность' => array('position' => 2),
        'Жертва Думузи' => array('position' => 14)
    );

    require 'Spread.php';
    $spread = new Spread();

    $map = $spread->getMap($positions);
?>
