<?php

    class Spread
    {
        public $divSize;
        public $divCount;
        public $map;

        function __construct($divSize = 1, $divCount = 1) {
            $this->divSize = $divSize;
            $this->divCount = $divCount;
        }

        public function getMap($positions) {
            $map = '<div class="row">';
            for ($placeNumber=0; $placeNumber < $this->divCount; $placeNumber++)
            {
                $map .= '<div class="col-md-'.$this->divSize.'" id="cardPlace'.$placeNumber.'" style="border: solid 1px; border-radius: 7px;">';
                foreach($positions as $place => $data)
                {
                    if ($placeNumber == $data['position']) {
                        $map .= '<p style="text-align: center; font-weight: bold;">'.$place.'</p>';
                        $map .= '<img src="http://1001goroskop.ru/img/cards/koloda/57.jpg" width="60" height="150" alt="0">';
                    }
                }
                $map .= '</div>';
            }
            $map .= '</div>';

            return $map;
        }
    }

?>