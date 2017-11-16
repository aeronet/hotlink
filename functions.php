<?php

function removeElementWithValue($array, $key, $value){
     foreach($array as $subKey => $subArray){
          if($subArray[$key] == $value){
               unset($array[$subKey]);
          }
     }
     return $array;
}

function isPage() {

	
	if(isset($_GET['post']) and !isset($_GET['img'])) { 

			return  GETPost($_GET['post']);

	} elseif (isset($_GET['post']) AND isset($_GET['img'])) { 

			return  GETAttachment($_GET['img']);

	} elseif (isset($_GET['page'])) {
		
		echo "page bos";

	} else {

			$array = array( 'title' => '404 Not Found', );
		
			return $array;
	}

}


function GETAttachment($get){

	$file 		= $get.'.json'; 
	$dir  		= "json/attachment";
	$result		= glob('./'.$dir .'/'.$file);
	if (!empty($result)) {
	$get_file 	= file_get_contents(__DIR__ . '/'.$dir.'/'.$file);
	$json 		= json_decode($get_file, true);
		
		return 		  $json['attachment'];

	} else {

		not_found();

	}
	

}

function the_title($array) {

	if (!empty($array)){
		$title = clean($array['title']);
		return $title;
	
	}

}

function image_attachment_full($array) {

	if (!empty($array)){

		
		return $array['urlIMG'];
	
	}

}

function image_attachment_thumb($array) {

	if (!empty($array)){

		
		return $array['thumbIMG'];
	
	}

}

function image_attachment_parent($array) {

	if (!empty($array)){

		
		return $array['url'];
	
	}

}


function related_attachment($array) {

if (!empty($array)){

	$file_related 		= $array['url'].'.json'; 
	$dir_related  		= "json/single";
	$result_related		= glob('./'.$dir_related .'/'.$file_related);
	$get_file_related 	= file_get_contents(__DIR__ . '/'.$dir_related.'/'.$file_related);
	$json_related 		= json_decode($get_file_related, true);

							foreach ($json_related as $key => $value) {
								$value_related = $value['IMG'];
							}

	return removeElementWithValue($value_related,'title',$array['title']);
		
	}

}




function GETPost($get) {


$file 	= $get.'.json'; 
$dir  	= "json/single";
$result	= glob('./'.$dir .'/'.$file);

if (!empty($result)) {

	$get_file 	= file_get_contents(__DIR__ . '/'.$dir.'/'.$file);
	$json 		= json_decode($get_file, true);
	return $json['single'];

	} else {

		not_found();

	}

}


function clean($string) {
$out 	= str_replace('Www', 'www', $string);
return  $out;
}

function not_found(){

	 header('HTTP/1.1 404 Not Found'); //This may be put inside err.php instead
	 include 'errors/404.php';
  	 exit; //Do not do any more work in this script.


}

function pathUrl($dir = __DIR__){

    $root = "";
    $dir = str_replace('\\', '/', realpath($dir));

    //HTTPS or HTTP
    $root .= !empty($_SERVER['HTTPS']) ? 'https' : 'http';

    //HOST
    $root .= '://' . $_SERVER['HTTP_HOST'];

    //ALIAS
    if(!empty($_SERVER['CONTEXT_PREFIX'])) {
        $root .= $_SERVER['CONTEXT_PREFIX'];
        $root .= substr($dir, strlen($_SERVER[ 'CONTEXT_DOCUMENT_ROOT' ]));
    } else {
        $root .= substr($dir, strlen($_SERVER[ 'DOCUMENT_ROOT' ]));
    }

    $root .= '/';

    return $root;
}


?>