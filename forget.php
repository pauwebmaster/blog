//f_email data;

<?php 
include 'baglan.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

header('Content-type: application/json');



	if (isset($_POST['forget'])) {
		$f_mail = $_POST['f_email'];
		$exe = $bag->cek("","n_users","email,forget_hash","WHERE email=?",array($f_mail));
		$rs = $exe->fetch(PDO::FETCH_OBJ);
		$hash = isset($rs->forget_hash)? $rs->forget_hash : NULL;
		
		if ($exe)
		 {


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
                        $mail->addAddress($f_mail, "Hi");     
                        $mail->addReplyTo('bdowillian@gmail.com', 'Information'); // Geri Dönüş

                        $mail->isHTML(true);                                  // Set email format to HTML
                        $mail->Subject = 'Blog Parola Sıfırlama';
                        $mail->Body    = 'Parolanızı sıfırlamak için aşağıdaki linke tıklayınız.
                                http://localhost/blog/sifreYenileme.php?hash='.$hash.'&eposta='.$f_mail;
                        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                        $mail->CharStet = "UTF-8";
                        $mail->send();
                        echo "başarılı";


                        } catch(Exception $e){
                            echo $e->ErrorInfo;
                        }



			
		}


	

		else {
			echo json_encode(false);
		}

	

	}


 ?>