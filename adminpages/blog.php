<?php 
	$blogs = getUnapprovedBlogs();
	for($i=0; $i<count($blogs); $i++) {
		$blog = $blogs[$i]; ?>
		<div class="well">			
			<?php include './blogpages/post.php'; ?>
			<button class="btn btn-success approve" data-id="<?php echo $blog['id'];?>" data-loading-text="..."><span class="glyphicon glyphicon-ok" aria-hidden="true"> </span></button>
			<button class="btn btn-danger disapprove" data-id="<?php echo $blog['id'];?>" data-loading-text="..."><span class="glyphicon glyphicon-remove" aria-hidden="true"> </span></button>
		</div>
	<?php }
?>