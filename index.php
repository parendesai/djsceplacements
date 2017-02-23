<?php
	$department = explode(".", $_SERVER['SERVER_NAME'])[0];
	include 'helper/helper.php';
	// session_name($department);
	// session_set_cookie_params(0, '/', '.djsceplacements.in');
	session_start();
	$isUser = isset($_SESSION['sap']);
	$isAdmin = isset($_SESSION['admin']);
	$string = explode('?', substr($_SERVER['REQUEST_URI'], 1));
	if(substr($string[0], -1)=="/") $string[0] = substr($string[0], 0, strlen($string[0])-1);
	$params = explode('/',$string[0]);
	if($params[0] == 'administrator') {
		include 'helper/mailer.php';
		if(isset($params[1]) && $params[1] == 'ajax') {
			include 'adminpages/admin_ajax.php';
		} else {
			include 'admin.php';
		}
	} else if($params[0] == "experiences") {

		if(isset($params[1]) && $params[1] == 'ajax') {
			include 'blogpages/ajax.php';
		} else {
			include 'blog.php';
		}

	} else {

		if($params[0] == 'user' && isset($params[1]) && $params[1] == 'ajax') {
			include 'pages/ajax.php';
		} else {
			include 'home.php';
		}

	}
?>