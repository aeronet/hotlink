<?php  



$file 	= $_GET['img'].'.json'; 
$dir  	= "json/attachment";
$result	= glob('./'.$dir .'/'.$file);
//print_r($result);
if (!empty($result)) {

	$get_file 	= file_get_contents(__DIR__ . '/'.$dir.'/'.$file);
	$json 		= json_decode($get_file, true);
	foreach ($json as $key => $value) {

		$parent = $value['parentIMG'];
		$title = $value['titleIMG'];
			echo '<h2 align="center">'.$title.'</h2>';

		include "deskripsi.php";
					?>
				
<img src="<?php echo $value['urlIMG']; ?>" onerror="this.src='<?php echo $value['thumbIMG'] ?>'" alt="<?php echo $value['titleIMG'] ?>" width="600" height="500" />
					
	<?php

	}


$file_related 		= $parent.'.json'; 
$dir_related  		= "json/single";
$result_related		= glob('./'.$dir_related .'/'.$file_related);
$get_file_related 	= file_get_contents(__DIR__ . '/'.$dir_related.'/'.$file_related);
$json_related 		= json_decode($get_file_related, true);
						foreach ($json_related as $key => $value) {
							$value_related = $value['IMG'];
						}
echo '<ul>';
$value_related = removeElementWithValue($value_related,'titleIMG',$title);
			foreach ( $value_related as $subkey => $subvalue) {

							$linkIMG = strtolower($subvalue['fileIMG'].'.html');
					?>
					<li style="float: left;">
					<a href="<?php echo $linkIMG ?>" title="<?php echo $subvalue['titleIMG'] ?>" >
<img src="<?php echo $subvalue['urlIMG']; ?>" onerror="this.src='<?php echo $subvalue['thumbIMG'] ?>'" alt="<?php echo $subvalue['titleIMG'] ?>" width="200" height="150" />
					</a>
					</li>
					<?php
				}	
echo '</ul>';


} else {

	 header('HTTP/1.1 404 Not Found'); //This may be put inside err.php instead
	 include 'errors/404.php';
  	 exit; //Do not do any more work in this script.

}


function removeElementWithValue($array, $key, $value){
     foreach($array as $subKey => $subArray){
          if($subArray[$key] == $value){
               unset($array[$subKey]);
          }
     }
     return $array;
}

?>
