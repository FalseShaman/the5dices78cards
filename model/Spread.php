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
                $map .= '<div class="col-md-'.$this->divSize.'" id="cardPlace'.$placeNumber.'">';

                $placeFound = false;
                foreach($positions as $place => $data)
                {
                    if ($placeNumber == $data['position']) {
                        $map .= '<div class="card" style="width: 11rem;">
                            <img class="card-img-top" src="http://1001goroskop.ru/img/cards/koloda/57.jpg" width="40" height="70">
                            <div class="card-body">
                                <h5 class="card-title">'.$place.'</h5>
                                <p class="card-text">...</p>
                            </div>
                        </div>';

                        $placeFound = true;
                    }
                }

                if (!$placeFound) {
                    $map .= '<div class="card" style="width: 11rem;">
                            <img class="card-img-top" src="" width="40" height="70">
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <p class="card-text"></p>
                            </div>
                        </div>';
                }

                $map .= '</div>';
            }
            $map .= '</div>';

            return $map;
        }
    }

?>