<?php
	if($params[3]=="makeadmin") {
		echo changeAdmin($_POST['sap']);
	}
	if($params[3]=="resetpass") {
		echo resetPassword($_POST['sap']);
	}
	if($params[3]=="add") {
		echo addUser($_POST['sap']);
	}
?>