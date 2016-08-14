<?php 
	if($params[3] == "approve") {
		$blog = getBlog($_POST['id']);
		$user=getUser($blog['sapid']);
		echo approveBlog($blog['id']);
		$message="<p>Hello ".$user['fname'].",</p><p>Your Blog titled ".$blog['title']." has been approved</p><br /><br /><p>View it at</p><p><a href='".$_SERVER['SERVER_NAME']."/blog/article/".$blog['slug']."'>".$_SERVER['SERVER_NAME']."/blog/article/".$blog['slug']."</a></p>";
		$subject="Your Blog has been Approved";
		sendMail($user['email'], $user['fname']." ".$user['lname'], $subject, $message);
	}

	if($params[3] == "disapprove") {
		$blog = getBlog($_POST['id']);
		$user=getUser($blog['sapid']);
		echo disapproveBlog($blog['id']);
		$message="<p>Hello ".$user['fname'].",</p><p>Your Blog titled ".$blog['title']." has been disapproved</p>";
		$subject="Your Blog has been Disapproved";
		sendMail($user['email'], $user['fname']." ".$user['lname'], $subject, $message);
	}
?>