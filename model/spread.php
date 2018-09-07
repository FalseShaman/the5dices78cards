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
                        $map .= '<button type="button" class="btn btn-warning cardSelectButton" id="cardButton'.$placeNumber.'" style="width: 100%; margin-top: 10px;">'.$place.' ('.$cardCounter.')</button>';
                        break;
                    }
                }
                $map .= '</div>';
            }
            $map .= '</div>';
            return $map;
        }

        public function getDeckList() {
            $folder = scandir(dirname(__DIR__).'/gallery/');
            $list = array_diff($folder, array('.', '..'));
            return $list;
        }
    }

?>