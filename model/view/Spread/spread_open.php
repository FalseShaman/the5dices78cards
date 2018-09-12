<?php
    $user = json_decode($_SESSION['user']);
    $deckList = getDeckList();

    foreach ($deckList as $deck) {
        $rightMenu .= '<li class="nav-item"><button class="btn btn-light deckSelectButton" href="javascript:void(0);" id="'.$deck.'" style="margin: 10px 0;">'.$translateList[$deck].'</button></li>';
    }

    require_once '/app/model/spread.php';
    $spread = new spread($user->id);
    $spreadList = $spread->getList();

    if (!empty($spreadList)) {
        $leftMenu .= '<li class="nav-item"><hr style="color: #ffffff;border: 1px solid #ffffff;"></li>';
        foreach($spreadList as $li) {
            $leftMenu .= '<li class="nav-item"><button class="btn btn-dark spreadSelectButton" href="javascript:void(0);" id="'.$li['id'].'" data-map="'.$li['map'].'" style="margin: 10px 0;">'.$li['title'].'</button></li>';
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
