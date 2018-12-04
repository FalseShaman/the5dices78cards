<?php
    $user = json_decode($_SESSION['user']);

    $profile = '<form class="profileForm"> 
                    <div class="col-sm-5">
                        <h2>'.$user->name.'</h2>
                        <p>'.$user->specialization.'</p>
                    </div>
                    <div class="col-sm-5"><textarea id="profileRules" placeholder="12 кредо">'.$user->rules.'</textarea></div>
                    <div class="col-sm-11"><input type="text" id="profileDecks" value="'.$user->decks.'" placeholder="Используемые колоды"></div>
                </form>';

    $content = $profile;

    $listButton = '<button type="button" class="btn btn-light" id="saveProfile" title="Сохранить"><img class="img-responsive" src="/view/design/save.png"></button>';
    $rightMenu = $newButton.$listButton;