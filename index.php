<?php 
	include 'helper/helper.php';
	session_start();
	$isUser = isset($_SESSION['sap']);
	$isAdmin = isset($_SESSION['admin']);
	$string = split('\?', substr($_SERVER['REQUEST_URI'], 1));
	if(substr($string[0], -1)=="/") $string[0] = substr($string[0], 0, strlen($string[0])-1);
	$params = split('/',$string[0]);
	if($params[0] == 'admin') {
		include 'helper/mailer.php';
		if(isset($params[1]) && $params[1] == 'ajax') {
			include 'adminpages/ajax.php';
		} else {
			include 'admin.php';	
		}
	} else {
		
		if($params[0] == 'user' && isset($params[1]) && $params[1] == 'ajax') {
			include 'pages/ajax.php';
		} else {
			include 'home.php';	
		}
	
	}
?>