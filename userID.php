<?php 
include 'baglan.php';
session_start();
//header('Content-type: application/json');

$userID=$_GET["loginuser"];
$passwordID=$_GET["loginpassword"];



if (isset($userID) && isset($passwordID)) {



$sonuc = $bag->cek("OBJ", "info_users", "name,password,onay", "WHERE name=? AND password=?", array($userID,$passwordID));
$user = isset($sonuc->name)? $sonuc->name : NULL;
$password =isset($sonuc->password)? $sonuc->password : NULL;
$verif =isset($sonuc->onay)? $sonuc->onay : NULL;
if ($user && $password && $verif == 1  ) {

$_SESSION['user']=$userID;

header('Location:index.php');
}

else{
header('Content-type: application/json');

			echo json_encode(false);
}


}


 ?>