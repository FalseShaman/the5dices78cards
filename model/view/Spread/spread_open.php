<?php
    $user = json_decode($_SESSION['user']);
    $translateList = getTranslate();
    $deckList = getDeckList();

    foreach ($deckList as $deck) {
        $rightMenu .= '<li class="nav-item"><button class="btn btn-light deckSelectButton" id="'.$deck.'" style="margin: 10px 0;">'.$translateList[$deck].'</button></li>';
    }

    require_once '/app/model/spread.php';
    $spread = new spread($user->id);
    $spreadList = $spread->getList();

    if (!empty($spreadList)) {
        $leftMenu .= '<li class="nav-item"><hr style="border: 1px solid #ffffff;"></li>';
        $leftMenu .= '<li class="nav-item"><img class="img-responsive" src="/view/design/box.png"></li>';
        foreach($spreadList as $li) {
            $map = json_decode($li['map']);
            var_dump($map);
//            if (!empty($map) && is_array($map)) {
//                $leftMenu .= '<li class="nav-item"><span id="spread'.$li['id'].'" style="display: none;">';
//                foreach ($map as $place) {
//                    $leftMenu .= '<span class="place" data-place="'.$place->place.'" data-arcana="'.$place->arcana.'" data-position="'.$place->position.'"></span>';
//                }
//                $leftMenu .= '</span><button class="btn btn-dark spreadSelectButton" id="'.$li['id'].'" style="margin: 10px 0;">'.$li['title'].'</button></li>';
//            }
        }

        $map = '<div class="row">';
        for ($placeNumber=0; $placeNumber < 78; $placeNumber++)
        {
            $map .= '<div class="col-md-2" id="cardPlace'.$placeNumber.'" style="border: solid 1px #ffffff; border-radius: 7px; height: 250px;">
                    <img class="img-rounded arcanaImage" src="" width="120" height="210" style="border-radius: 7px; margin-top: 20px; margin-left: 10px; display: none;">
                    <p class="descPosition"></p>
                    
                    <button type="button" class="btn btn-default showArcana" data-position="'.$placeNumber.'" style="position: absolute; bottom: 0px; right: 0px; padding: 0; opacity: 0.6; display: none;">
                        <img class="img-responsive" src="/view/design/show.png"></button>
                </div>';
        }
        $map .= '</div>';

        $content .= $map;
    }
?>
