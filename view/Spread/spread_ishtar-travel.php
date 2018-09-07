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
    $deckList = $spread->getDeckList();
    $content = $spread->getMap($positions);

    $content .= '<div class="modal fade" id="cardSelector" tabindex="-1" role="dialog" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Выбор карты</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>';
    $content .= '<div class="modal-body">';
    foreach ($deckList as $deck) {
        if ($deck != '.' || $deck != '..') {
            $content .= '<button type="button" class="btn btn-dark deckSelectButton" id="'.$deck.'">'.$translateList[$deck].'</button>';
        }
    }
    $content .= '</div><div class="modal-footer"><button type="button" class="btn btn-success">Положить на стол</button></div></div></div></div>';
?>
