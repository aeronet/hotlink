<?php
include "header.php";
$dir  = "json/single";
echo '<ul>';
echo "<pre>";
foreach(glob('./'.$dir .'/*.*') as $file) {
    $get_file 	= file_get_contents(__DIR__ .$file);
	$json 		= json_decode($get_file, true);

	$url 	= $json['single']['url'].'.html';
	$title 	= ucwords($json['single']['title']);

	echo '<li><a href="'.pathUrl().$url.'" title="'.clean($title).'">'.clean($title).'</a></li>';
}
echo '</ul>';
include "footer.php";
?>
