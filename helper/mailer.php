<?php 
	require_once('Classes/PHPMailerAutoload.php');
	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->Host = $_ENV['MAIL_HOST'];
	$mail->Port = $_ENV['MAIL_PORT'];
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;
	$mail->Username = $_ENV['MAIL_USER'];
	$mail->Password = $_ENV['MAIL_PASSWORD'];
	$mail->setFrom($_ENV['MAIL_USER'], "Placement Cell DJ Sanghvi");
	$mail->addReplyTo($_ENV['MAIL_USER'], "Placement Cell DJ Sanghvi");

	function sendMail($tomail, $toname, $subject, $body) {
		global $mail;
		$mail->Subject = $subject;
		$mail->msgHTML($body);
		$mail->addAddress($tomail, $toname);
		$ret = $mail->send();
		$mail->clearAddresses();
		return $ret;
	}
?>