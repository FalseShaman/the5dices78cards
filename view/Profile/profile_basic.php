<?php
    $user = json_decode($_SESSION['user']);

    $specializationSelect = '<select id="profileSpecialization">';
    foreach ($specializationList as $key => $specializationLi)
    {
        $specializationSelect .= $user->specialization == $specializationLi ? '<option value="'.$key.'" selected>' : '<option value="'.$key.'">';
        $specializationSelect .= $specializationLi.'</option>';
    }
    $specializationSelect .= '</select>';
    $profile = '<div class="row" style="background: #CCCCB4; color: #1B2743; border-radirus: 10px;">
                    <div class="col-sm-5"><h2>'.$user->name.'</h2></div>
                    <div class="col-sm-6"><input type="text" id="profileRules" value="'.$user->rules.'" placeholder="12 кредо"></div>
                    <div class="col-sm-5"><p>'.$user->register.'</p></div>
                    <div class="col-sm-6">'.$specializationSelect.'</div>
                    <div class="col-sm-11"><input type="text" id="profileDecks" value="'.$user->decks.'" placeholder="Используемые колоды"></div>
                </div>';

    $content = $controlPanel.$profile;

    $listButton = '<button type="button" class="btn btn-light" id="saveProfile" title="Сохранить"><img class="img-responsive" src="/view/design/save.png"></button>';
    $rightMenu = $newButton.$listButton;