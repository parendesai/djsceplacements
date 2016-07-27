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
		$user = editUser($sap, htmlspecialchars($_POST['phone'], ENT_QUOTES), htmlspecialchars($_POST['email'], ENT_QUOTES), htmlspecialchars($_POST['fname'], ENT_QUOTES), htmlspecialchars($_POST['lname'], ENT_QUOTES), htmlspecialchars($_POST['ssc'], ENT_QUOTES), htmlspecialchars($_POST['hsc'], ENT_QUOTES), htmlspecialchars($_POST['cgpa'], ENT_QUOTES), htmlspecialchars($_POST['address'], ENT_QUOTES), htmlspecialchars($_POST['internships'], ENT_QUOTES), $_POST['gender'], $_POST['lang']);
		if(isset($ret)) {echo "reload"; }
		else print_r($user);
	}

	if($isUser && isset($params[2]) && $params[2]=='change') {
		echo changePassword($_SESSION['sap'], $_POST['password'], md5($_POST['newpassword']));
	}

	if($isUser && isset($params[2]) && $params[2]=="register") {
		echo registerUser($_POST['cid'], $_SESSION['sap'], $_POST['status']);
	}
?>