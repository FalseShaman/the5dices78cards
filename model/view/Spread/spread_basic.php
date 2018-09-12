<?php
    $translateList = getTranslate();
    $deckList = getDeckList();

    $rightMenu = '';
    foreach ($deckList as $deck) {
        $rightMenu .= '<li class="nav-item"><button class="btn btn-light deckSelectButton" href="javascript:void(0);" id="'.$deck.'" style="margin: 10px 0;">'.$translateList[$deck].'</button></li>';
    }

    $openButton = '<a href="/spread/open" class="btn btn-light" id="spreadOpenButton" title="Открыть" style="position: fixed; top: 10px; left: 12%;"><img class="img-responsive" src="/view/design/open.png"></a>';
    $saveButton = '<button type="button" class="btn btn-light" id="spreadSaverButton" title="Сохранить" style="position: fixed; top: 55px; left: 12%;"><img class="img-responsive" src="/view/design/save.png"></button>';
    $controlPanel .= $openButton.$saveButton;

    $map = '<div class="row">';
    for ($placeNumber=0; $placeNumber < 78; $placeNumber++)
    {
        $map .= '<div class="col-md-2" id="cardPlace'.$placeNumber.'" style="border: solid 1px; border-radius: 7px; height: 250px;">
                    <button type="button" data-place="'.$placeNumber.'" class="btn btn-success placeSelectButton" style="width: 100%; margin: 10px 0; padding: 5px 5px;" disabled>Выбрать</button>
                    
                    <img class="img-rounded deskCard" src="" width="120" height="210" style="border-radius: 7px; display: none;">
                    <p class="deskPosition" style="position: absolute; top: 22%; margin-right: 15px; color: #ffffff; background-color: #000000; opacity: 0.7; word-break: break-all; text-align: center; display: none;"></p>
                    
                    <button type="button" class="btn btn-default clearPosition" data-position="'.$placeNumber.'" style="position: absolute; top: 0px; left: 0px; padding: 0; opacity: 0.6; display: none;">
                        <img class="img-responsive" src="/view/design/clear.png"></button>
                    <button type="button" class="btn btn-default editPlace" data-position="'.$placeNumber.'" style="position: absolute; top: 0px; right: 0px; padding: 0; opacity: 0.6; display: none;">
                        <img class="img-responsive" src="/view/design/edit.png"></button>
                    <button type="button" class="btn btn-default showCard" data-position="'.$placeNumber.'" style="position: absolute; bottom: 0px; right: 0px; padding: 0; opacity: 0.6; display: none;">
                        <img class="img-responsive" src="/view/design/show.png"></button>
                </div>';
    }
    $map .= '</div>';

    $typeArcanaSelector = '<button type="button" class="btn btn-dark arcanaSelectButton" id="0" style="margin: 10px;">Старшие арканы</button><br>
                                    <button type="button" class="btn btn-dark arcanaSelectButton" id="22" style="margin: 10px;">Жезлы</button>
                                    <button type="button" class="btn btn-dark arcanaSelectButton" id="36" style="margin: 10px;">Кубки</button>
                                    <button type="button" class="btn btn-dark arcanaSelectButton" id="50" style="margin: 10px;">Мечи</button>
                                    <button type="button" class="btn btn-dark arcanaSelectButton" id="64" style="margin: 10px;">Диски</button>';
    $majorArcanaSelector = '';
    for ($i=0;$i<22;$i++) {
        $majorArcanaSelector .= '<button type="button" class="btn btn-dark cardSelectButton" id="'.$i.'" style="margin: 10px;">'.$translateList['majorArcana'][$i].'</button>';
    }
    $minorArcanaSelector = '';
    for ($i=0;$i<14;$i++) {
        $minorArcanaSelector .= '<button type="button" class="btn btn-dark cardSelectButton" id="'.$i.'" style="margin: 10px;">'.$translateList['minorArcana'][$i].'</button>';
    }

    $placeModal = file_get_contents('/app/view/modals/placeSelector.html');
    $placeModal = preg_replace('/typeArcanaSelector/', $typeArcanaSelector, $placeModal);
    $placeModal = preg_replace('/majorArcanaSelector/', $majorArcanaSelector, $placeModal);
    $placeModal = preg_replace('/minorArcanaSelector/', $minorArcanaSelector, $placeModal);

    $spreadModal = file_get_contents('/app/view/modals/spreadSaver.html');

    $content = $controlPanel.$map.$placeModal.$spreadModal;
?>
