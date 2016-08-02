<?php 
require_once 'Classes/PHPExcel.php';
if($isAdmin){
	if($params[2] == "company") {
		include 'ajaxcompany.php';
	}
	if($params[2] == "mail") {
		include 'ajaxmail.php';
	}
	
	if($params[2] == "users" && $params[3]=="makeadmin") {
		echo changeAdmin($_POST['sap']);
	}

}
?>