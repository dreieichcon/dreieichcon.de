<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/src/SMTP.php';
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
date_default_timezone_set('Europe/Berlin');


$ts				= time();
$day			= date("Y-m-d", $ts);





function phpmailer_send_mail($receipients, $subject, $body, $files = array()){
	
	$mail	= new PHPMailer();
	
	try{
		//$initialise 
		$mail->SMTPDebug = 0;
		$mail->Debugoutput = 'html';
		$mail->isSMTP();
		$mail->Host       = 'smtp.strato.de';
		$mail->SMTPAuth   = true;
		$mail->Username   = 'noreply@conservices.de';
		$mail->Password   = 'keineAhnung2';
		$mail->SMTPSecure = 'ssl';
		$mail->Port       = 465;
		$mail->CharSet	  = 'utf-8';
		
		
		$mail->setFrom('noreply@conservices.de', 'conservices.de - bitte nicht antworten');
		
		foreach($receipients as $receiv){
			$mail->addAddress($receiv['mail'], $receiv['name']);
		}
		
		$mail->isHTML(true);
		$mail->Subject = utf8_decode('[dreieichcon.de] '. $subject);
		
		foreach ($files as $file) {
			$mail->AddAttachment($file, basename($file));
		}

		$mail->Body = utf8_decode($body);
		$mail->send();
		
		return true;
	}catch (Exception $exc){
		
		$log =  date("H.i.s", time()) ."- " . $exc . "\n";
		file_put_contents("../log/mailer_".$day.".txt", $log, FILE_APPEND);
		return $exc;
	}

}


?>