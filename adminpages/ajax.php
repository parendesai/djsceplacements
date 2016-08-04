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

}
?>