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

    require dirname(__DIR__).'/../model/spread.php';
    $spread = new Spread();
    $content = $spread->getMap($positions);

    $content .= '<div class="modal fade" id="cardSelector" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>';
?>
