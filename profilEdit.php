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
//$date = $_POST["date"]; 
//$telefon = $_POST["telefon"]; 
//$passwordOld = $_POST["passwordOld"]; 
//$passwordNew = $_POST["passwordNew"]; 
//$passwordNew2 = $_POST["passwordNew2"]; 
$gender = $_POST["gender"]; 
$userBio = $_POST["userBio"]; 
//$action = $_POST["action"]; 
$profilUserImgFile= $_POST["resimlink"];
$userID= 25;
//print_r($_POST);


if (isset($_POST["action"])) {

$güncelle = $bag->guncelle(0, "n_users", "first_name,last_name,gender,bio,picture", "WHERE id=?", array("$name","$last_name","$gender","$userBio","$profilUserImgFile","$userID"));
/*if ($güncelle) {
echo ;
}
else
{
	echo "olmadı";
}*/



}



 ?>