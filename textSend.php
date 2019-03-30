<?php 
include 'baglan.php';
session_start();

$header=$_POST["textHeader"];
$github=$_POST['textGit'];

$sonuc = parse_url($github);
$ek_url = substr($sonuc['path'],0,-4);

$yeni_url = 'https://raw.githubusercontent.com'.$ek_url.'/master/README.md';

//https://github.com/fatihemree/codesAjax.git
//https://raw.githubusercontent.com/defunkt/jquery-pjax/master/README.md

//print_r($header);

$content=$_POST["textcontent"];
$user=$_SESSION['user'];
//echo "<br>".$header.$github."CONTENT:".$content."-".$user;

$tag=json_decode($_POST["tag"],TRUE);  
$etiket = $_POST["kategori"];


/*
*
* tag etiketi dizi şeklinde alınıyor bunu tag database gönderilecek;
*
*/





if (isset($_POST["submit"])) {
	# code...
$ekle = $bag->ekle("text", "header,git,content,username",array("$header","$yeni_url","$content","$user"));
}


?>



