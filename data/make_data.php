<?php
$icons = array('6' => 'icon-animals.png','7' => 'icon-celeb.png','8' => 'icon-children.png', '9' => 'icon-humor.png', '10' => 'icon-sex.png');
$f = 'data_2015.txt';
$lines = file($f);
//array_shift($lines);
foreach($lines as $line) {
    $pieces = explode("\t",$line);

    // Remove the timestamp field, which is in the spreadsheet because we used Google Forms to input the data.
    array_shift($pieces);

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
function make_link($url) 
{
    if ( $strpos($url, 'youtube') > -1 ):
        $pieces = explode('/',trim($url));
        $id = array_pop($pieces);
        $id = preg_replace('%watch\?v=%','',$id);
        $video_type = 'youtube';
    elseif ( strpos($url, 'bcove') > -1 0:
        $id = array_pop(explode('/', $url));
        $video_type = 'bcove';
    else:
        return '';
    endif;
    return '<button type="button"  class="video-button" onclick="show_video(\'' . $id . '\', \'' . $video_type . '\')">Watch ad</button>';
}
