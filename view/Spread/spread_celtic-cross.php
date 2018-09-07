<?php
    $positions = array(
        'Суть проблемы' => array('position' => 13),
        'Дополнительный фактор' => array('position' => 14),
        'Цели и желания' => array('position' => 1),
        'Корень проблемы' => array('position' => 25),
        'Прошлое' => array('position' => 12),
        'Будущее' => array('position' => 15),
        'Позиция кверента' => array('position' => 28),
        'Окружение' => array('position' => 16),
        'Страхи и надежды' => array('position' => 4),
        'Итог' => array('position' => 5)
    );

    require dirname(__DIR__).'../model/spread.php';
    $spread = new Spread();
    $content = $spread->getMap($positions);
?>
