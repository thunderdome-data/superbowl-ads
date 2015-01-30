<?php
$icons = array('6' => 'icon-animals.png','7' => 'icon-celeb.png','8' => 'icon-children.png', '9' => 'icon-humor.png', '10' => 'icon-sex.png');
$f = 'data_2015.tsv';
$lines = file($f);
foreach($lines as $line) {
echo $line;
    $pieces = explode("\t",$line);

    // Remove the timestamp field, which is in the spreadsheet because we used Google Forms to input the data.
    array_shift($pieces);

    // Other shifting to account for order of columns in the Google Form:
    $desc = $pieces[2];
    $title = $pieces[3];
    $pieces[2] = $title;
    $pieces[3] = $desc;

/*
// The categories as they exist in the app.
0        data.addColumn("number","Year");
1        data.addColumn("string","Advertiser");
2        data.addColumn("string","Title");
3        data.addColumn("string","Description");
4        data.addColumn("string","Category");
5        data.addColumn("string"," "); <-- This is where the video embed stuff goes.
6        data.addColumn("string","Animals");
7        data.addColumn("string","Celebrity");
8        data.addColumn("string","Children");
9        data.addColumn("string","Humor");
10        data.addColumn("string","Sex");

*/

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
    if ( strpos($url, 'youtube') > -1 ):
        $pieces = explode('/',trim($url));
        $id = array_pop($pieces);
        $id = preg_replace('%watch\?v=%','',$id);
        $video_type = 'youtube';
    elseif ( strpos($url, 'bcove') > -1 ):
        $id = array_pop(explode('/', $url));
        $video_type = 'bcove';
    else:
        return '';
    endif;
    return '<button type="button"  class="video-button" onclick="show_video(\'' . $id . '\', \'' . $video_type . '\')">Watch ad</button>';
}
