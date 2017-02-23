<?php 
	if(!$isUser && isset($params[2]) && $params[2]=='login') {
		$user = getUser($_POST['sap']);
		if(md5($_POST['password']) == $user['password']) {
			if($user['updated'] == 0){
				$_SESSION['usap'] = $_POST['sap']; 
				$edit = 1;
				$_SESSION['name'] = $user['fname']." ".$user['lname']; 
			} else {
				$_SESSION['sap'] = $_POST['sap']; 
				$_SESSION['name'] = $user['fname']." ".$user['lname']; 
				if($user['admin'] == 1) {
					$_SESSION['admin'] = 1;
				} 			
			}
			echo "true";
		} else {
			echo "false";	
		}
	}

	if(($isUser || isset($_SESSION['usap'])) && isset($params[2]) && $params[2]=='edit') {
		if(isset($_SESSION['sap'])) {$sap = $_SESSION['sap'];} else { $sap = $_SESSION['usap']; $ret = "reload";}
		$user = editUser($sap, htmlentities($_POST['phone'], ENT_QUOTES), htmlentities($_POST['email'], ENT_QUOTES), htmlentities($_POST['fname'], ENT_QUOTES), htmlentities($_POST['lname'], ENT_QUOTES), htmlentities($_POST['mname'], ENT_QUOTES), htmlentities($_POST['qname'], ENT_QUOTES), htmlentities($_POST['ssc'], ENT_QUOTES), htmlentities($_POST['hsc'], ENT_QUOTES), htmlentities($_POST['cgpa'], ENT_QUOTES), htmlentities($_POST['address'], ENT_QUOTES), htmlentities($_POST['addressa'], ENT_QUOTES), htmlentities($_POST['addressc'], ENT_QUOTES), htmlentities($_POST['addressp'], ENT_QUOTES), htmlentities($_POST['internships'], ENT_QUOTES), htmlentities($_POST['gender'], ENT_QUOTES), htmlentities($_POST['lang'], ENT_QUOTES), htmlentities($_POST['sscYear'], ENT_QUOTES), htmlentities($_POST['hscYear'], ENT_QUOTES), htmlentities($_POST['curBacklog'], ENT_QUOTES), htmlentities($_POST['pastBacklog'], ENT_QUOTES), htmlentities($_POST['dob'], ENT_QUOTES), htmlentities($_POST['sscName'], ENT_QUOTES), htmlentities($_POST['hscName'], ENT_QUOTES), htmlentities($_POST['sscBoard'], ENT_QUOTES), htmlentities($_POST['hscBoard'], ENT_QUOTES), htmlentities($_POST['yeardrop'], ENT_QUOTES), htmlentities($_POST['beStartYear'], ENT_QUOTES), htmlentities($_POST['beYear'], ENT_QUOTES));
		if(isset($ret)) {echo "reload"; }
		else print_r($user);
	}

	if($isUser && isset($params[2]) && $params[2]=='change') {
		echo changePassword($_SESSION['sap'], $_POST['password'], md5($_POST['newpassword']));
	}

	if($isUser && isset($params[2]) && $params[2]=="register") {
		echo registerUser($_POST['cid'], $_SESSION['sap'], $_POST['status']);
	}

	if($isUser && isset($params[2]) && $params[2]=='query' && isset($params[3]) && $params[3]=='add') {
		echo addQuery($_SESSION['sap'], $_POST['company'], htmlentities($_POST['querytext'], ENT_QUOTES));
	}
?>