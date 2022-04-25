<?php
//echo 'ms';

$mess = $_POST['mes_sum'];
$mess = htmlspecialchars(stripslashes($mess), ENT_QUOTES);
$mess = str_replace('/', '', $mess);
$mess = str_replace('.', '', $mess);
$mess = str_replace('`', '', $mess);

$to      = 'toporkovruslan35@gmail.com';
$subject = 'the subject';
//$message = 'hello';
$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$mail = mail($to, $subject, $mess, $headers);
if($mail == 1){
    echo 'success';
}
//echo $mail;
class ControllerCommonMs extends Controller {
	public function index() {
	    
	}
}