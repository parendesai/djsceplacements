<?php include 'pages/links.php'; ?>
<link rel="stylesheet" type="text/css" href="/css/summernote.css">
<link rel="stylesheet" type="text/css" href="/css/select2.min.css">
<link rel="stylesheet" type="text/css" href="/css/admin.css">
<?php include 'pages/navbar.php'; ?>
<?php 
	if(!isset($_SESSION['admin'])) {
		include "pages/login.php";
	} else {
		include "adminpages/dashboard.php";
	}
	// if(isset($_GET['page'])) {
		
	// 	if($_GET['page']=="logout") {
	// 		if (isset($_SESSION['sap'])) {
	// 			session_unset();
	// 		}
	// 		header("Location: ".$_SERVER['HTTP_REFERER']);
	// 	}	
	// 	if ($_GET['page']=="edit") {
	// 		if(isset($_SESSION['sap'])) {
	// 			include 'pages/edit.php';
	// 		} else if(isset($_SESSION['usap'])) {
	// 			include 'pages/edit.php';
	// 		} else {
	// 			include 'pages/login.php';
	// 		}
	// 	}		
	// 	if ($_GET['page']=="change-password") {
	// 		if(isset($_SESSION['sap'])) {
	// 			include 'pages/change.php';
	// 		} else if(isset($_SESSION['usap'])) {
	// 			include 'pages/edit.php';
	// 		} else {
	// 			include 'pages/login.php';
	// 		}
	// 	}		
	// 	if ($_GET['page']=="login") {
	// 		if(isset($_SESSION['sap'])) {
	// 			header("Location: /");
	// 		} else {
	// 			include 'pages/login.php';
	// 		}
	// 	}
	// 	if ($_GET['page']=="register") {
	// 		if(isset($_SESSION['sap'])) {
	// 			include 'pages/register.php';
	// 		} else if(isset($_SESSION['usap'])) {
	// 			include 'pages/edit.php';
	// 		} else {
	// 			include 'pages/login.php';
	// 		}
	// 	}
			
	// } 
?>
<?php include 'pages/scripts.php'; ?>
<script type="text/javascript" src="/js/summernote.min.js"></script>
<script type="text/javascript" src="/js/admin.js"></script>
<script type="text/javascript" src="/js/home.js"></script>
<script type="text/javascript" src="/js/select2.full.min.js"></script>
<?php include 'pages/footer.php'; ?>
