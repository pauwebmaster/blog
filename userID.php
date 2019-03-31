<?php 
include 'baglan.php';
session_start();
//header('Content-type: application/json');

$userID=$_POST["loginuser"];
$passwordID=$_POST["loginpassword"];
$scrt=$_POST['captcha'];


if (isset($userID) && isset($passwordID) && !empty($scrt)) {



$sonuc = $bag->cek("OBJ", "n_users", "username,pass,onay", "WHERE username=? AND pass=?", array($userID,$passwordID));
$user = isset($sonuc->username)? $sonuc->username : NULL;
$password =isset($sonuc->pass)? $sonuc->pass : NULL;
$verif =isset($sonuc->onay)? $sonuc->onay : NULL;


if ($user && $password && $verif == 1 && recapt_curl($scrt)===true ) {

$_SESSION['user']=$userID;

header('Location:index.php');
}

else{
header('Content-type: application/json');

			echo json_encode(false);
}


}

// reCAPTCHA Function
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