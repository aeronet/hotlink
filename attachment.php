<?php include "header.php"; ?>
<h2 align="center"><?php echo the_title($page); ?></h2>
<?php include "deskripsi.php"; ?>
<center>
<img src="<?php echo image_attachment_full($page) ?>" onerror="this.src='<?php echo image_attachment_thumb($page) ?>'" alt="<?php echo the_title($page); ?>" title="<?php echo the_title($page); ?>" width="800" height="600" />
</center>
<?php
$value_related = related_attachment($page);
echo '<ul style="list-style: none;">';		
			foreach ( $value_related as $key => $value) {

							$linkIMG = $page['url'].'/'.$value['attachment'].'.html';
					?>
		<li style="float: left;">
			<a href="<?php echo pathUrl().$linkIMG ?>" title="<?php echo $value['title'] ?>" >
				<img src="<?php echo $value['urlIMG']; ?>" onerror="this.src='<?php echo $value['thumbIMG'] ?>'" alt="<?php echo clean($value['title']) ?>" title="<?php echo $value['title'] ?>" width="200" height="150" />
			</a>
		</li>
				<?php
				}	
echo '</ul>';
?>
<?php include "footer.php"; ?>