<?php 
	if($params[3]=="answer") {
		echo editQuery($_POST['id'], htmlentities($_POST['querytext'], ENT_QUOTES), htmlentities($_POST['answer']), $_POST['status']);
		$query = getQuery($_POST['id']);
		if($_POST['mail']==1) {
			$user = getUser($query['sapid']);
			$company = getcompany($query['cid'], null);
			$subject = "Your Question Regarding ".$company['name'];
			$message = "<p>Hello ".$user['fname']." ".$user['lname'].",</p><p>Your Question Regarding ".$company['name']." has been answered.</p><br /><br /><p>".$query['querytext']."</p><br /><p>".$query['answer']."</p><br /><br /><p>For more information go to <a href='".$_SERVER['SERVER_NAME']."/register/".$company['slug']."'>".$_SERVER['SERVER_NAME']."/register/".$company['slug']."</a></p>";
			sendMail($user['email'], $user['fname']." ".$user['lname'], $subject, $message);
		}
	}

	if($params[3]=="mark") {
		$query = getQuery($_POST['id']);
		echo editQuery($_POST['id'], $query['querytext'], "", '3');
		$user = getUser($query['sapid']);
		$company = getcompany($query['cid'], null);
		$subject = "Your Question Regarding ".$company['name'];
		$message = "<p>Hello ".$user['fname']." ".$user['lname'].",</p><p>Your Question Regarding ".$company['name']." has been marked as solved.</p><br /><br /><p>".$query['querytext']."</p><br /><br /><p>For more information go to <a href='".$_SERVER['SERVER_NAME']."/register/".$company['slug']."'>".$_SERVER['SERVER_NAME']."/register/".$company['slug']."</a></p>";
		sendMail($user['email'], $user['fname']." ".$user['lname'], $subject, $message);
	}

	if($params[3]=="delete") { 
		echo deleteQuery($_POST['id']);
	}
?>