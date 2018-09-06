<?php

    class Spread
    {
        public function getMap($positions) {
            $map = '<div class="row">';
            $cardCount = count($positions);
            for ($placeNumber=0; $placeNumber < 78; $placeNumber++)
            {
                $map .= '<div class="col-md-1" id="cardPlace'.$placeNumber.'" style="border: solid 1px; border-radius: 7px; height: 250px;">';
                foreach($positions as $place => $data)
                {
                    if ($placeNumber == $data['position']) {
                        $map .= '<img src="http://1001goroskop.ru/img/cards/koloda/57.jpg" width="60" height="150">';
                        $map .= '<span style="text-align: center; font-size: 0.8em; word-break: break-all;">'.$place.'</span>';

                        $cardCount--;
                        break;
                    }
                }
                $map .= '</div>';

                if ($cardCount == 0) {
                    break;
                }
            }
            $map .= '</div>';

            return $map;
        }
    }

?>