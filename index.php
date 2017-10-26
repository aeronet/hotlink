<?php

$dir  = "json/single";
echo '<ul>';
foreach(glob('./'.$dir .'/*.*') as $file) {
    
    $title = ucwords(str_replace('-',' ',str_replace('.json','',str_replace('./json/single/','',$file))));

    $url = str_replace('.json','.html',str_replace('./json/single/','',$file));

    echo '<li><a href="'.$url.'" title="'.$title.'">'.$title.'</a></li>';
}
echo '</ul>';

?>