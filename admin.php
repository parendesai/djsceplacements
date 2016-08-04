<?php include 'pages/links.php'; ?>
<link rel="stylesheet" type="text/css" href="/css/summernote.css">
<link rel="stylesheet" type="text/css" href="/css/select2.min.css">
<link rel="stylesheet" type="text/css" href="/css/admin.css">
<?php include 'pages/navbar.php'; ?>
<?php 
	if($isUser) {
		if($isAdmin){
			include "adminpages/dashboard.php";
		} else {
			// Not authoried Page
		}
		
	} else if(isset($_SESSION['usap'])) {
		include "pages/edit.php";
		
	} else {
		include "pages/login.php";
	}
?>
<?php include 'pages/scripts.php'; ?>
<script type="text/javascript" src="/js/summernote.min.js"></script>
<script type="text/javascript" src="/js/select2.full.min.js"></script>
<script type="text/javascript" src="/js/authentication.js"></script>
<script type="text/javascript" src="/js/admin.js"></script>
<script type="text/javascript" src="/js/login.js"></script>
<script type="text/javascript" src="/js/edit.js"></script>
<script type="text/javascript" src="/js/adminedit.js"></script>
<script type="text/javascript" src="/js/admincreate.js"></script>
<script type="text/javascript" src="/js/admingenerate.js"></script>
<script type="text/javascript" src="/js/adminmail.js"></script>
<script type="text/javascript" src="/js/admindelete.js"></script>
<script type="text/javascript" src="/js/adminuser.js"></script>
<?php include 'pages/footer.php'; ?>
