<?php 
	if($params[3]=="send") {
		extract($_POST);
		$to = json_decode($to);
		$ret = array();
		for ($i=0; $i < count($to); $i++) {
			$user = getUser($to[$i]); 
			$ret[] = sendMail($user['email'], $user['fname']." ".$user['lname'], $subject, $message);
		}
		echo $ret;
	}

	if($params[3]=="registered") {
		extract($_POST);
		$users = getRegistered($company);
		$ret = array();
		for ($i=0; $i < count($users); $i++) {
			$ret[] = sendMail($users[$i]['email'], $users[$i]['fname']." ".$users[$i]['lname'], $subject, $message);
		}
		print_r($ret);
	}
?>