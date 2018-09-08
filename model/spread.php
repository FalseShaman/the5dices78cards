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
                    if ($placeNumber == $place) {
                        $cardCounter++;
                        $map .= '<button type="button" class="btn btn-success placeSelectButton" id="'.$placeNumber.'" style="width: 100%; margin: 10px 0; padding: 5px 5px; opacity: 0.65; white-space: normal;" data-toggle="tooltip" title="'.$data['name'].' ('.$data['number'].')">'.$data['number'].'</button>';
                        break;
                    }
                }
                $map .= '</div>';
            }
            $map .= '</div>';
            return $map;
        }

        public function getModal($translateList) {
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
            for ($i=0;$i<10;$i++) {
                $minorCardSelector .= '<button type="button" class="btn btn-dark cardSelectButton" id="'.$i.'" style="margin: 10px;">'.$translateList['minorArcana'][$i].'</button>';
            }
            $modal = '<div class="modal fade" id="placeSelector" tabindex="-1" role="dialog" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Выбор карты</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div id="arcanaSelector">'.$arcanaSelector.'</div>
                    <div id="majorSelector" style="display: none;">'.$majorCardSelector.'</div>
                    <div id="minorSelector" style="display: none;">'.$minorCardSelector.'</div>
                </div>
                <div class="modal-footer"></div>
            </div></div></div>';
            return $modal;
        }

        public function getDeckList($translateList) {
            $folder = scandir(dirname(__DIR__).'/gallery/');
            $deckList = array_diff($folder, array('.', '..'));
            $deckSelector = '';
            foreach ($deckList as $deck) {
                $deckSelector .= '<li class="nav-item"><button class="btn btn-light deckSelectButton" href="javascript:void(0);" id="'.$deck.'">'.$translateList[$deck].'</button></li>';
            }
            return $deckSelector;
        }
    }
?>