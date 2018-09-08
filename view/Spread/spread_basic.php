<?php
    $translateList = getTranslate();
    $list = glob(dirname(__FILE__) . "/*.php");

    $content = '<div class="row">';
    foreach ($list as $li) {
        $spreadName = ltrim(rtrim(end(explode('/', $li)), '.php'), 'spread_');
        if ($spreadName != 'basic') {
            $content .= '<a class="btn btn-info" href="/spread/'.$spreadName.'"><h3>'.$translateList[$spreadName].'</h3></a><br>';
        }
    }
?>
