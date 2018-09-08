<?php
    $translateList = getTranslate();

    $folder = scandir(dirname(__DIR__).'/gallery/');
    var_dump($folder);
    $deckList = array_diff($folder, array('.', '..'));
    $rightMenu = '';
    foreach ($deckList as $deck) {
        $rightMenu .= '<li class="nav-item"><button class="btn btn-light deckSelectButton" href="javascript:void(0);" id="'.$deck.'">'.$translateList[$deck].'</button></li>';
    }

    $map = '<div class="row">';
    for ($placeNumber=0; $placeNumber < 78; $placeNumber++)
    {
        $map .= '<div class="col-md-2" id="cardPlace'.$placeNumber.'" style="border: solid 1px; border-radius: 7px; height: 250px;">
                    <button type="button" class="btn btn-success placeSelectButton" style="width: 100%; margin: 10px 0; padding: 5px 5px;" disabled>Выбрать</button>
                    <a href="javascript:void(0);" class="cardInfoButton" data-toggle="tooltip" title="">
                        <img class="deskCard" src="" width="130" height="200" style="display: none;">
                    </a> 
                </div>';
    }
    $map .= '</div>';

    $arcanaSelector = '<button type="button" class="btn btn-dark arcanaSelectButton" id="0" style="margin: 10px;">Старшие арканы</button><br>
                                    <button type="button" class="btn btn-dark arcanaSelectButton" id="22" style="margin: 10px;">Жезлы</button>
                                    <button type="button" class="btn btn-dark arcanaSelectButton" id="36" style="margin: 10px;">Кубки</button>
                                    <button type="button" class="btn btn-dark arcanaSelectButton" id="50" style="margin: 10px;">Мечи</button>
                                    <button type="button" class="btn btn-dark arcanaSelectButton" id="64" style="margin: 10px;">Диски</button>';
    $majorCardSelector = '';
    for ($i=0;$i<21;$i++) {
        $majorCardSelector .= '<button type="button" class="btn btn-dark cardSelectButton" id="'.$i.'" style="margin: 10px;">'.$translateList['majorArcana'][$i].'</button>';
    }
    $minorCardSelector = '';
    for ($i=0;$i<14;$i++) {
        $minorCardSelector .= '<button type="button" class="btn btn-dark cardSelectButton" id="'.$i.'" style="margin: 10px;">'.$translateList['minorArcana'][$i].'</button>';
    }

    $modal = '<div class="modal fade" id="placeSelector" tabindex="-1" role="dialog" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Выбор карты</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div id="positionSelector" class="form-group">
                            <input type="text" id="placeName" class="form-control" placeholder="Позиция">
                            <input type="text" id="placeCount" class="form-control" placeholder="Номер">
                            <button type="button" id="placeNamed" class="btn btn-success">Ок</button>
                        </div>
                        <div id="arcanaSelector" style="display: none;">'.$arcanaSelector.'</div>
                        <div id="majorSelector" style="display: none;">'.$majorCardSelector.'</div>
                        <div id="minorSelector" style="display: none;">'.$minorCardSelector.'</div>
                    </div>
                    <div class="modal-footer"></div>
                </div></div></div>';

    $content = $map.$modal;
?>
