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

// The fields as they exist at this point in the script:
  [0]=>
  string(4) "2015"
  [1]=>
  string(7) "Wix.com"
  [2]=>
  string(14) "It's That Easy"
  [3]=>
  string(200) "The company promotes it's services to simplify website creation, specifically for small business owners, as former NFL quarterback Brett Favre gets business advice from Rex Lee (Lloyd on "Entourage")."
  [4]=>
  string(0) ""
  [5]=>
  string(43) "https://www.youtube.com/watch?v=8IaaxVgIIr8"
  [6]=>
  string(2) "No"
  [7]=>
  string(3) "Yes"
  [8]=>
  string(2) "No"
  [9]=>
  string(2) "No"
  [10]=>
  string(2) "No"
*/

    $pieces[5] = make_link($pieces[5]);
    $cats = '';
    for($i=6; $i<=10;$i++) {
        $pieces[$i] = trim($pieces[$i]);
        if(strtolower($pieces[$i]) == 'yes') {
            $cats .= '<img class="cat-icon" src="lib/img/' . $icons[$i] . '" />';
        }
    }
    $pieces[4] .= ' ' . $cats;

    // Man, this is ugly. 
    // A row in the superbowl-ads.js looks like this:
    // [{"v":2014,"f":"2014"},"Axe Peace","Make Love, Not War","Soldiers and dictators appear to be engaging in war activites, but they are actually demonstrating love.","N/A","<button type=\"button\"  class=\"video-button\" onclick=\"show_video('63b4O_2HCYM')\">Watch ad</button>","No","No","No","No","No"]
    echo '[{"v":' . $pieces[0] . ',"f": "' . $pieces[0] . '"},"' . $pieces[1] . '","' . $pieces[2] . '","' . str_replace('"', "'", $pieces[3]) . '","' . str_replace('"', '\"', $pieces[4]) . '","' . str_replace('"', '\"', $pieces[5]) . '","' . $pieces[6] . '","' . $pieces[7] . '","' . $pieces[8] . '","' . $pieces[9] . '","' . $pieces[0] . '"],';
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
