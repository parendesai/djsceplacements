<?php include 'pages/links.php'; ?>
<link rel="stylesheet" type="text/css" href="/css/summernote.css">
<link rel="stylesheet" type="text/css" href="/css/select2.min.css">
<link rel="stylesheet" type="text/css" href="/css/blog.css">

<div class="row padded">
<div class="container">
		<ol class="breadcrumb">
		  <li><a href="/">Placements Home</a></li>
		  <li><a href="/blog">Blog Home</a></li>
		  <li class="active"><?php echo ucwords($params[1]); ?></li>
		</ol>
      <div class="blog-header">
        <h1 class="blog-title">The Placement Blog</h1>
        <p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p>
        <?php if($isUser) { ?>
        	<p class="lead blog-description">Logged in as <?php echo $_SESSION['name'];?></p>
        <?php }?>
      </div>
<?php 
	if(!isset($params[1])) header("location: /blog/page/1");

	if($isUser && isset($params[1]) && $params[1]=="add") {
		include 'blogpages/blogadd.php';
	} else {
		include 'blogpages/blogcontainer.php';
	}
	

?>
</div>
<?php include 'pages/scripts.php'; ?>
<script type="text/javascript" src="/js/authentication.js"></script>
<script type="text/javascript" src="/js/summernote.min.js"></script>
<script type="text/javascript" src="/js/select2.full.min.js"></script>
<script type="text/javascript" src="/js/blog.js"></script>
<script type="text/javascript" src="/js/login.js"></script>
<script type="text/javascript" src="/js/edit.js"></script>
<?php include 'pages/footer.php'; ?>