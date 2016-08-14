<?php 
require_once 'Classes/PHPExcel.php';
if($isAdmin){
	if($params[2] == "company") {
		include 'ajaxcompany.php';
	}
	if($params[2] == "mail") {
		include 'ajaxmail.php';
	}
	
	if($params[2] == "users") {
		include 'ajaxuser.php';
	}

	if($params[2] == "update") {
		include 'ajaxupdates.php';
	}

	if($params[2] == "query") {
		include 'ajaxqueries.php';
	}

	if($params[2] == "blog") {
		include 'ajaxblog.php';
	}
}
?>