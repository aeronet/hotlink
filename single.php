<?php  
$urlFILE = str_replace('-', '+',$_GET['post']);
$file 	= $urlFILE.'.json'; 
$dir  	= "json/single";
$result	= glob('./'.$dir .'/'.$file);
//print_r($result);
if (!empty($result)) {

	$get_file 	= file_get_contents(__DIR__ . '/'.$dir.'/'.$file);
	$json 		= json_decode($get_file, true);

	foreach ($json as $key => $value) {
		
		echo $value['title'];

echo '<ul>';


			foreach ($value['IMG'] as $subkey => $subvalue) {
							$linkIMG = strtolower($subvalue['parentIMG'].'/'.$subvalue['fileIMG'].'.html');
					?>
					<li style="float: left;">
					<a href="<?php echo $linkIMG ?>" title="<?php echo $subvalue['titleIMG'] ?>" >
<img src="<?php echo $subvalue['urlIMG']; ?>" onerror="this.src='<?php echo $subvalue['thumbIMG'] ?>'" alt="<?php echo $subvalue['titleIMG'] ?>" width="200" height="150" />
					</a>
					</li>
					<?php
				
				}	
	

echo '</ul>';
	}

} else {

	 header('HTTP/1.1 404 Not Found'); //This may be put inside err.php instead
	 include 'errors/404.php';
  	 exit; //Do not do any more work in this script.

}


?>
