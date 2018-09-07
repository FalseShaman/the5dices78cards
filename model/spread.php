<?php

    class Spread
    {
        public function getMap($positions) {
            $cardCount = count($positions);
            $map = '<div class="row">';
            for ($placeNumber=0; $placeNumber < 78; $placeNumber++)
            {
                $map .= '<div class="col-md-2" id="cardPlace'.$placeNumber.'" style="border: solid 1px; border-radius: 7px; height: 250px;">';
                foreach($positions as $place => $data)
                {
                    if ($placeNumber == $data['position']) {
                        $map .= '<button type="button" class="btn btn-warning cardSelectButton" id="cardButton'.$placeNumber.'">'.$place.'</button>';
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