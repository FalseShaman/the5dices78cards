<?php
    $list = glob(dirname(__FILE__) . "/*.php");

    $content = '';
    foreach ($list as $li) {
        $spreadName = ltrim(rtrim(end(explode('/', $li)), '.php'), 'spread_');
        $content .= $spreadName.'----';
    }
?>
