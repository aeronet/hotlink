<?php

$dir  = "json/single";
echo '<ul>';
echo "<pre>";
foreach(glob('./'.$dir .'/*.*') as $file) {
    
    // $title = ucwords(urldecode(str_replace('+',' ',str_replace('.json','',str_replace('./json/single/','',$file)))));

    // $url = str_replace('+','-',str_replace('.json','.html',str_replace('./json/single/','',$file)));

    // echo '<li><a href="'.$url.'" title="'.$title.'">'.$title.'</a></li>';


    $get_file 	= file_get_contents(__DIR__ .$file);
	$json 		= json_decode($get_file, true);

	$url 	= $json['single']['url'].'.html';
	$title 	= ucwords($json['single']['title']);

	echo '<li><a href="'.$url.'" title="'.$title.'">'.$title.'</a></li>';
}
echo '</ul>';

?>