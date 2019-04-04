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
$phone =$_POST["phone"];
$kod = md5(rand(0,100));
$forget_hash = md5(rand(0,100));
$image = "img/profil/avatar1.png";
$uye_onay = 0;

//echo "name: ".$name."  email: ".$email." pass: ".$password. " date: ".$date;

	/*$sonuc = $bag->cek("OBJ_ALL","info_users","name,email","WHERE email=? OR name=?", array($email,$name));
			if ($sonuc) {
				echo "kayıtlıdır";
			}
else{


}*/

        if (!empty($_POST['captchai'])) {

            if (recapt_curl($_POST['captchai']) === true) {

                $ekle = $bag->ekle("n_users", "username,email,pass,tel_num,verif_code,onay,forget_hash,picture",array("$name","$email","$password","$phone","$kod","$uye_onay","$forget_hash","$image"));

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
                        $mail->addAddress($email, $name);     
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
                
            }

                        

        }

  
            // reCAPTCHA Functiton

                    function recapt_curl($div_id) {
                        
                            $ch = curl_init();
                                curl_setopt_array($ch,[
                                        CURLOPT_URL =>'https://www.google.com/recaptcha/api/siteverify',
                                        CURLOPT_POST => true,
                                        CURLOPT_POSTFIELDS => 'secret=6Ld4DpsUAAAAADArIQHuhF6vPRky-sesMt4XSQ61&response='.$div_id,
                                        CURLOPT_RETURNTRANSFER => true 
                                ]);
                                $output = curl_exec($ch);
                                curl_close($ch);
                                 $result = json_decode($output, true);

                                 if($result['success'] === false){
                                    
                                    //echo 'Ben robot değilim işaretleyin.' . '<br>' . $output;
                                    return false;

                                 }

                                 else{

                                    //echo "İşlemlerinize devam edebilirsiniz." . '<br>'. $output;
                                    return true;
                                 }
                        }
                    // reCAPTCHA Function



 ?>