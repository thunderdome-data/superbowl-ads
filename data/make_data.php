<?php
$icons = array('6' => 'icon-animals.png','7' => 'icon-celeb.png','8' => 'icon-children.png', '9' => 'icon-humor.png', '10' => 'icon-sex.png');
$f = 'data_2014.txt';
$lines = file($f);
//array_shift($lines);
foreach($lines as $line) {
    $pieces = explode("\t",$line);
    $pieces[5] = make_link($pieces[5]);
    $cats = '';
    for($i=6; $i<=10;$i++) {
        $pieces[$i] = trim($pieces[$i]);
        if(strtolower($pieces[$i]) == 'yes') {
            $cats .= '<img class="cat-icon" src="lib/img/' . $icons[$i] . '" />';
        }
    }
    $pieces[3] .= ' ' . $cats;
    echo implode("\t",$pieces) . "\n";

}
function make_link($url) {
    $pieces = explode('/',trim($url));
    $id = array_pop($pieces);
    $id = preg_replace('%watch\?v=%','',$id);
    return '<button type="button"  class="video-button" onclick="show_video(' . "'" . $id . "'" . ')">Watch ad</button>';

}