<?php
    $positions = array(
        'Суть проблемы' => array('position' => 25),
        'Дополнительный фактор' => array('position' => 26),
        'Цели и желания' => array('position' => 1),
        'Корень проблемы' => array('position' => 37),
        'Прошлое' => array('position' => 24),
        'Будущее' => array('position' => 27),
        'Позиция кверента' => array('position' => 40),
        'Окружение' => array('position' => 28),
        'Страхи и надежды' => array('position' => 16),
        'Итог' => array('position' => 3)
    );

    require 'Spread.php';
    $spread = new Spread();

    $map = $spread->getMap($positions);
?>
