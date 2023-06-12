<?php

$nama= $_POST['nama'];
$hp= $_POST['hp'];
$alamat= $_POST['alamat'];
$usermail= $_POST['usermail'];
$body= "
Nama : $nama <br/>
HP : $hp <br/>
Alamat: $alamat <br/>
Email: $usermail <br/>
";

function Send_Mail($to,$subject,$body)
{
require 'PHPmailer/class.phpmailer.php';

 

$usermail= $_POST['usermail'];
$mail = new PHPMailer();
$mail->IsMail(true); // SMTP
$mail->SMTPAuth = true; // SMTP authentication
$mail->Host= "103.155.221.82";
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->SetFrom("email@gmail.com","email sender");
$mail->Username = "yayat@amc.net.id"; // 
$mail->Password = "id4AMC2022"; // 
$mail->SetFrom($usermail, 'user');
$mail->AddReplyTo($usermail,'user');
$mail->Subject = $subject;
$mail->MsgHTML($body);
$address = $to;
$mail->AddAddress($address, $to);
$mail->AddAddress($usermail);
if(!$mail->Send())
return false;
else
return true;

}

$to = "sales@amc.net.id";
$subject = "Tanya_dari_web";
echo"<br/><br/><center><h3>email telah terkirim</h3></center>";
Send_Mail($to,$subject,$body);
?>