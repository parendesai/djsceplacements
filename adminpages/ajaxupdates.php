<?php
	if($params[3] == "add") {
		$date = date('d/m/Y');
		echo addUpdate($_POST['company'], htmlentities($_POST['descr'], ENT_QUOTES), $date);
		$company = getCompany($_POST['company'], null);
		$users = getRegistered($company['id']);
		$ret = array();
		$subject = "Update for ".$company['name'];
		$message = "<p>Hello,</p><p>There is a new update for ".$company['name']." dated ".$date."</p><br /><br />".$_POST['descr']."<p>For more information go to <a href='".$_SERVER['SERVER_NAME']."/register/".$company['slug']."'>".$_SERVER['SERVER_NAME']."/register/".$company['slug']."</a></p>";
		for ($i=0; $i < count($users); $i++) {
			$ret[] = sendMail($users[$i]['email'], $users[$i]['fname']." ".$users[$i]['lname'], $subject, $message);
		}
		print_r($ret);
	}
	if($params[3] == "delete") {
		echo deleteUpdate($_POST['updateid']);
	}
	if ($params[3] == "edit") {
		echo editUpdate($_POST['id'], htmlentities($_POST['descr']));
	}
?>