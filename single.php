<?php include "header.php"; ?>
<h2 align="center"><?php echo the_title($page); ?></h2>
<?php include "deskripsi.php"; ?>
<?php echo '<ul style="list-style: none;">';	
foreach ($page['IMG'] as $key => $value) {
	$linkIMG = $page['url'].'/'.$value['attachment'].'.html'; ?>
		<li style="float: left;">
			<a href="<?php echo pathUrl().$linkIMG ?>" title="<?php echo clean($value['title']) ?>" >
				<img src="<?php echo $value['urlIMG']; ?>" onerror="this.src='<?php echo $value['thumbIMG'] ?>'" alt="<?php echo clean($value['title']) ?>" title="<?php echo clean($value['title']) ?>" width="200" height="150" />
			</a>
		</li>
<?php } echo '</ul>'; ?>
<?php include "footer.php"; ?>