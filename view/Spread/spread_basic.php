<?php
    $list = glob(dirname(__FILE__) . "/*.php");

    $translateList = getTranslate();
    $content = '<div class="row">';
    foreach ($list as $li) {
        $spreadName = ltrim(rtrim(end(explode('/', $li)), '.php'), 'spread_');
        if ($spreadName != 'basic') {
            $content .= '<a href="'.$spreadName.'"><h3>'.$translateList[$spreadName].'</h3></a>';
        }
    }
?>
