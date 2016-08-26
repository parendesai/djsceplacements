<?php 
	$multiple= true;
	for($i=0; $i < count($blogs); $i++) {
		$blog = $blogs[$i];
		include 'post.php';
	}
?>
