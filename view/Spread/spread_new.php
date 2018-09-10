<?php
    $translateList = getTranslate();
    $deckList = getDeckList();

    $rightMenu = '';
    foreach ($deckList as $deck) {
        $rightMenu .= '<li class="nav-item"><button class="btn btn-light deckSelectButton" href="javascript:void(0);" id="'.$deck.'" style="margin: 10px 0;">'.$translateList[$deck].'</button></li>';
    }

    $map = '<div class="row">';
    for ($placeNumber=0; $placeNumber < 78; $placeNumber++)
    {
        $map .= '<div class="col-md-2" id="cardPlace'.$placeNumber.'" style="border: solid 1px; border-radius: 7px; height: 250px;">
                    <button type="button" data-place="'.$placeNumber.'" class="btn btn-success placeSelectButton" style="width: 100%; margin: 10px 0; padding: 5px 5px;" disabled>Выбрать</button>
                    <img class="img-rounded deskCard" src="" width="120" height="210" border-radius: 11px; style="display: none;">
                    <p class="deskPosition" style="position: absolute; top: 10px; margin-right: 10px; color: #ffffff; background-color: #000000; opacity: 0.7; word-break: break-all; display: none;"></p>
                    <button type="button" class="btn btn-default" class="clearPosition" data-position="'.$placeNumber.'" style="position: absolute; top: 5px; left: 5px; display: none;">
                        <img class="img-responsive" src="design/clear.png"></button>
                    <button type="button" class="btn btn-default" class="editPlace" data-position="'.$placeNumber.'" data-status="0" style="position: absolute; top: 5px; right: 5px; display: none;">
                        <img class="img-responsive" src="design/edit.png"></button>
                    <button type="button" class="btn btn-default" class="showCard" data-position="'.$placeNumber.'" data-status="0" style="position: absolute; bottom: 5px; right: 5px; display: none;">
                        <img class="img-responsive" src="design/show.png"></button>
                </div>';
    }
    $map .= '</div>';

    $arcanaSelector = '<button type="button" class="btn btn-dark arcanaSelectButton" id="0" style="margin: 10px;">Старшие арканы</button><br>
                                    <button type="button" class="btn btn-dark arcanaSelectButton" id="22" style="margin: 10px;">Жезлы</button>
                                    <button type="button" class="btn btn-dark arcanaSelectButton" id="36" style="margin: 10px;">Кубки</button>
                                    <button type="button" class="btn btn-dark arcanaSelectButton" id="50" style="margin: 10px;">Мечи</button>
                                    <button type="button" class="btn btn-dark arcanaSelectButton" id="64" style="margin: 10px;">Диски</button>';
    $majorCardSelector = '';
    for ($i=0;$i<22;$i++) {
        $majorCardSelector .= '<button type="button" class="btn btn-dark cardSelectButton" id="'.$i.'" style="margin: 10px;">'.$translateList['majorArcana'][$i].'</button>';
    }
    $minorCardSelector = '';
    for ($i=0;$i<14;$i++) {
        $minorCardSelector .= '<button type="button" class="btn btn-dark cardSelectButton" id="'.$i.'" style="margin: 10px;">'.$translateList['minorArcana'][$i].'</button>';
    }

    $placeModal = '<div class="modal fade" id="placeSelector" tabindex="-1" role="dialog" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Выбор карты</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div id="positionSelector" class="form-group">
                            <input type="text" id="placeName" class="form-control" placeholder="Позиция">
                            <textarea id="placeDesc" class="form-control"></textarea>
                            <button type="button" id="placeNamed" class="form-control btn btn-success">Ок</button>
                        </div>
                        <div id="arcanaSelector" style="display: none;">'.$arcanaSelector.'</div>
                        <div id="majorSelector" style="display: none;">'.$majorCardSelector.'</div>
                        <div id="minorSelector" style="display: none;">'.$minorCardSelector.'</div>
                    </div>
                    <div class="modal-footer"></div>
                </div></div></div>';

    $saveButton = '<button type="button" class="btn btn-dark" id="spreadSaverButton" style="position: fixed; top: 5px; left: 12%;"><img class="img-responsive" src="design/save.png"></button>';

    $spreadModal = '<div class="modal fade" id="spreadSaver" tabindex="-1" role="dialog" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Сохранить расклад</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div id="positionSelector" class="form-group">
                                <input type="text" id="spreadName" class="form-control" placeholder="Название раклада">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="saveSpread" class="form-control btn btn-success">Ок</button>
                        </div>
                    </div></div></div>';

    $content = $saveButton.$map.$placeModal.$spreadModal;
?>
