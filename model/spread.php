<?php

    class Spread
    {
        public function getMap($positions) {
            $cardCount = count($positions);
            $cardCounter = 0;
            $map = '<div class="row">';
            for ($placeNumber=0; $placeNumber < 78; $placeNumber++)
            {
                if ($cardCounter > $cardCount) {
                    break;
                }

                $map .= '<div class="col-md-2" id="cardPlace'.$placeNumber.'" style="border: solid 1px; border-radius: 7px; height: 250px;">';
                foreach($positions as $place => $data)
                {
                    if ($placeNumber == $data['position']) {
                        $cardCounter++;
                        $map .= '<button type="button" class="btn btn-warning placeSelectButton" id="cardButton'.$placeNumber.'" style="width: 100%; margin-top: 10px;">'.$place.' ('.$cardCounter.')</button>';
                        break;
                    }
                }
                $map .= '</div>';
            }
            $map .= '</div>';
            return $map;
        }

        public function getModal($translateList) {
            $folder = scandir(dirname(__DIR__).'/gallery/');
            $deckList = array_diff($folder, array('.', '..'));

            $deckSelector = '';
            foreach ($deckList as $deck) {
                $deckSelector .= '<button type="button" class="btn btn-dark deckSelectButton" id="'.$deck.'" style="margin: 10px;">'.$translateList[$deck].'</button>';
            }
            $arcanaSelector = '<button type="button" class="btn btn-dark arcanaSelectButton" id="0" style="margin: 10px;">Старшие арканы</button>
                                <button type="button" class="btn btn-dark arcanaSelectButton" id="22" style="margin: 10px;">Жезлы</button>
                                <button type="button" class="btn btn-dark arcanaSelectButton" id="36" style="margin: 10px;">Кубки</button>
                                <button type="button" class="btn btn-dark arcanaSelectButton" id="50" style="margin: 10px;">Мечи</button>
                                <button type="button" class="btn btn-dark arcanaSelectButton" id="64" style="margin: 10px;">Диски</button>';
            $majorCardSelector = '';
            for ($i=0;$i<22;$i++) {
                $majorCardSelector .= '<button type="button" class="btn btn-dark cardSelectButton" id="'.$i.'" style="margin: 10px;">'.$i.'</button>';
            }
            $minorCardSelector = '';
            for ($i=0;$i<15;$i++) {
                $minorCardSelector .= '<button type="button" class="btn btn-dark cardSelectButton" id="'.$i.'" style="margin: 10px;">'.$i.'</button>';
            }

            $modal = '<div class="modal fade" id="placeSelector" tabindex="-1" role="dialog" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Выбор карты</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div id="deckSelector">'.$deckSelector.'</div>
                    <div id="cardSelector">'.$arcanaSelector.'</div>
                    <div id="cardSelector">'.$majorCardSelector.'</div>
                    <div id="cardSelector">'.$minorCardSelector.'</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="putCard">Положить на стол</button>
                </div>
            </div></div></div>';

            return $modal;
        }
    }

?>