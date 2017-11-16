
	<?php
	include "../header.php";
if (isset($_GET['page'])) {
	$get = $_GET['page'];
	$change = str_replace('-', ' ', $get);
	$read = ucwords($change);
	echo $read;
}
	?>
	<br>
	PAGE