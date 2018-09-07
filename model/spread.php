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
                        $map .= '<p style="text-align: center; font-size: 0.8em; word-break: break-all;">'.$place.'</p>';
                        $map .= '<button type="button" class="btn btn-light" style="position: absolute; bottom: 10px;">Choose</button>';

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