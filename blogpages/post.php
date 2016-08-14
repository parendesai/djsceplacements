<?php 
	$user = getUser($blog['sapid']);
    $comp = getCompany($blog['cid'], null);
    $slug = $blog['slug'];
?>
<div class="blog-post">
	<div class="row">
	  <h2 class="blog-post-title"><?php echo $blog['title'];?></h2>
	  <p class="blog-post-meta"><?php echo $blog['date'];?> by <a href="/blog/user/<?php echo $user['sap'];?>"><?php echo $user['fname'].' '.$user['lname'];?></a> for <a href="/blog/company/<?php echo $comp['slug'];?>"><?php echo $comp['name'];?></a><button class="btn btn-link pull-right" role="button" data-toggle="popover" data-placement="top" title="Share <?php echo $blog['title']?>" data-content="Hey, take a look at this placement experience at<br /><br /><a href='/blog/article/<?php echo $slug;?>'><?php echo $_SERVER['SERVER_NAME'].'/blog/article/'.$slug; ?></a>"><span class="glyphicon glyphicon-share" aria-hidden="true"></span></button></p>
	  
	 </div>
    <?php echo html_entity_decode($blog['blog']);?>
  </p>
</div><!-- /.blog-post -->
