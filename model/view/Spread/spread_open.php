<?php
    $user = json_decode($_SESSION['user']);

    require_once '/app/model/spread.php';
    $spread = new spread($user->id);
    $spreadList = $spread->getList();

    if (!empty($spreadList)) {
        foreach($spreadList as $li) {
            $rightMenu .= '<li class="nav-item"><button class="btn btn-light spreadSelectButton" href="javascript:void(0);" id="'.$li['id'].'" data-map="'.$li['map'].'" style="margin: 10px 0;">'.$li['title'].'</button></li>';
        }

        $map = '<div class="row">';
        for ($placeNumber=0; $placeNumber < 78; $placeNumber++)
        {
            $map .= '<div class="col-md-2" id="cardPlace'.$placeNumber.'" style="border: solid 1px #ffffff; border-radius: 7px; height: 250px;">
                    <button type="button" data-place="'.$placeNumber.'" class="btn btn-success placeSelectButton" style="width: 100%; margin: 10px 0; padding: 5px 5px;" disabled>Выбрать</button>
                    
                    <img class="img-rounded arcanaImage" src="" width="120" height="210" style="border-radius: 7px; display: none;">
                    <p class="descPosition"></p>
                    
                    <button type="button" class="btn btn-default editPlace" data-position="'.$placeNumber.'" style="position: absolute; top: 0px; right: 0px; padding: 0; opacity: 0.6; display: none;">
                        <img class="img-responsive" src="/view/design/edit.png"></button>
                    <button type="button" class="btn btn-default showArcana" data-position="'.$placeNumber.'" style="position: absolute; bottom: 0px; right: 0px; padding: 0; opacity: 0.6; display: none;">
                        <img class="img-responsive" src="/view/design/show.png"></button>
                </div>';
        }
        $map .= '</div>';

        $content .= $map;
    }
?>
