<?php 
    $rowCount = 5;
    $colCount = 4;
    
    $divSize = intval(12 / $rowCount);
    $divCount = $rowCount * $colCount;
    
    $spread = array(
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
    
    $map = '<div class="row">';
    for ($placeNumber=0; $placeNumber<$divCount; $placeNumber++)
    {
        $map .= '<div class="col-md-'.$divSize.'" id="cardPlace'.$placeNumber.'">';

        $placeFound = false;
        foreach($spread as $place => $data)
        {
            if ($placeNumber == $data['position']) {
                $map .= '<div class="card" style="width: 13rem;">
                            <img class="card-img-top" src="http://1001goroskop.ru/img/cards/koloda/57.jpg" width="170" height="300" alt="0">
                            <div class="card-body">
                                <h5 class="card-title">'.$place.'</h5>
                                <p class="card-text">...</p>
                            </div>
                        </div>';

                $placeFound = true;
            }
        }

        if (!$placeFound) {
            $map .= '<div class="card" style="width: 13rem;">
                            <img class="card-img-top" src="http://1001goroskop.ru/img/cards/koloda/56.jpg" width="170" height="300" alt="0">
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <p class="card-text"></p>
                            </div>
                        </div>';
        }

        $map .= '</div>';
    }
    $map .= '</div>';
?>
