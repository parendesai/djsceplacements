<?php include 'pages/links.php'; ?>
<?php include 'pages/navbar.php'; ?>
<?php 	
	if($params[0]=="logout") {
		if ($isUser) {
			session_unset();
		}
		header("Location: ".$_SERVER['HTTP_REFERER']);
	}	
	else if ($params[0]=="edit") {
		if($isUser) {
			include 'pages/edit.php';
		} else if(isset($_SESSION['usap'])) {
			include 'pages/edit.php';
		} else {
			include 'pages/login.php';
		}
	}		
	else if ($params[0]=="change-password") {
		if($isUser) {
			include 'pages/change.php';
		} else if(isset($_SESSION['usap'])) {
			include 'pages/edit.php';
		} else {
			include 'pages/login.php';
		}
	}		
	else if ($params[0]=="login") {
		if($isUser) {
			header("Location: /");
		} else {
			include 'pages/login.php';
		}
	}
	else if ($params[0]=="register") {
		if($isUser) {
			include 'pages/register.php';
		} else if(isset($_SESSION['usap'])) {
			include 'pages/edit.php';
		} else {
			include 'pages/login.php';
		}
	} else {
		include 'pages/home.php';
	}			 
?>
<?php include 'pages/scripts.php'; ?>
<script type="text/javascript" src="/js/authentication.js"></script>
<script type="text/javascript" src="/js/home.js"></script>
<?php include 'pages/footer.php'; ?>
