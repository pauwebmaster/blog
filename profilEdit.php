<?php 

include 'baglan.php';
session_start();
/*foreach ($_POST as $key => $value) {
	//echo "$".$key.' =  $_POST["' .$key .'"]; <br>' ;

 echo ".$".$key;
}
*/

$name = $_POST["name"]; 
$last_name = $_POST["last_name"]; 
$date = $_POST["date"]; 
$telefon = $_POST["telefon"]; 
$passwordOld = $_POST["passwordOld"]; 
$passwordNew = $_POST["passwordNew"]; 
$passwordNew2 = $_POST["passwordNew2"]; 
$gender = $_POST["gender"]; 
$userBio = $_POST["userBio"]; 
//$action = $_POST["action"]; 
//$profilUserImgFile= $_POST["profilUserImgFile"];


if (isset($_POST["action"])) {

/*$ekle = $bag->ekle("n_users",
	"name,surname,birtday,tel_num,gender,bio"
	,array("$name","$last_name","$date","$telefon","$gender","$userBio"));*/


/*$ekle = $bag->ekle("n_users",
	"username,email,pass, name,surname,birthday,tel_num,gender,bio,onay,verif_code"
	,array("fatih","fatih@gmail.com","fatih","$name","$last_name","$date","$telefon","$gender","$userBio","1","456"));
}*/

 ?>