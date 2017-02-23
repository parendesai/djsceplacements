<?php 
require_once 'Classes/PHPExcel.php';
if($isAdmin){
	if($params[2] == "company") {
		include 'admin_ajaxcompany.php';
	}
	if($params[2] == "mail") {
		include 'admin_ajaxmail.php';
	}
	
	if($params[2] == "users") {
		include 'admin_ajaxuser.php';
	}

	if($params[2] == "update") {
		include 'admin_ajaxupdates.php';
	}

	if($params[2] == "query") {
		include 'admin_ajaxqueries.php';
	}

	if($params[2] == "blog") {
		include 'admin_ajaxblog.php';
	}
}
?>