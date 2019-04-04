<?php 
include 'baglan.php';
header('Content-type: application/json');

$username = isset($_GET["username"]) ? $_GET["username"] : NULL;
$email = isset($_GET["email"]) ? $_GET["email"] : NULL;




if(isset($email)){
$emails = $bag->cek("OBJ_ALL","n_users","*","WHERE email=?", array($email));
if($emails)
	echo json_encode(false);
else
	echo json_encode(true);

}
else{

$user = $bag->cek("OBJ_ALL","n_users","*","WHERE username=?", array($username));
if($user)
	echo json_encode(false);
else
	echo json_encode(true);


}
?>
