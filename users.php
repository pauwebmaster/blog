<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

include 'baglan.php';

$name = $_POST["username"];
$email = $_POST["email"];
$password =$_POST["password"];
$date =$_POST["date"];
$kod = md5(rand(0,100));
$uye_onay = 0;

//echo "name: ".$name."  email: ".$email." pass: ".$password. " date: ".$date;

	/*$sonuc = $bag->cek("OBJ_ALL","info_users","name,email","WHERE email=? OR name=?", array($email,$name));
			if ($sonuc) {
				echo "kayıtlıdır";
			}
else{


}*/

  $ekle = $bag->ekle("info_users", "name,email,password,date,kod,onay",array("$name","$email","$password","$date","$kod","$uye_onay"));


$mail = new PHPMailer(true);

	try{

	$mail->SMTPDebug = 2;                                 
    $mail->isSMTP();                                      
    $mail->Host = 'smtp.gmail.com';  
    $mail->SMTPAuth = true;                              
    $mail->Username = 'bdowillian@gmail.com';                 
    $mail->Password = 'qwzxdf00';                           
    $mail->SMTPSecure = 'tls';                            
    $mail->Port = 587;                                   


	$mail->setFrom('bdowillian@gmail.com', 'Joe Willian');
    $mail->addAddress($email, $username);     
    $mail->addReplyTo('bdowillian@gmail.com', 'Information'); // Geri Dönüş

    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Blog Aktivasyon İşlemi';
    $mail->Body    = 'Hesabınızı aktif hâle getirmek için aşağıdaki linke tıklayınız.
    		http://localhost/blog/aktivasyon/dogrula.php?eposta='.$email.'&kod='.$kod;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->CharStet = "UTF-8";
    $mail->send();
    echo "başarılı";


	} catch(Exception $e){
		echo $e->ErrorInfo;
	}


 ?>