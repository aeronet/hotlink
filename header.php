<?php include "functions.php"; 
$page = isPage();

// echo "<pre>";

// print_r($page);

// echo "</pre>";
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo the_title($page); ?></title>
<meta name="robots" content="index, follow">
<link rel="shortcut icon" href="<?php echo pathUrl().'miliartha.ico'; ?>" />
</head>
<body>