<?php 
include 'baglan.php';
session_start();

$header=$_POST["textHeader"];
$github=$_POST['textGit'];


if (!empty($_POST['textGit'])) {
$sonuc = parse_url($github);
$ek_url = substr($sonuc['path'],0,-4);
$yeni_url = 'https://raw.githubusercontent.com'.$ek_url.'/master/README.md';
}
else
{
	
	$yeni_url="";
}

//https://github.com/fatihemree/codesAjax.git
//https://raw.githubusercontent.com/defunkt/jquery-pjax/master/README.md

//print_r($header);

$content=$_POST["textcontent"];
//$user=$_SESSION['user'];
$user=1;
//echo "<br>".$header.$github."CONTENT:".$content."-".$user;

$tag=json_decode($_POST["tag"],FALSE);  

$kategori = $_POST["kategori"];


foreach ($tag as $key =>$value) {
	
	foreach ($value as $key2 => $etiket) {
		
	$etiketDizisi[$key]=$etiket;
	
	
	}
	
}

$tagSerialize=  implode(",",$etiketDizisi);





if (isset($_POST["submit"])) {
	# code...
$ekle = $bag->ekle("texts","baslik,git_link,icerik,yazar_id,kategori,etiket",array("$header","$yeni_url","$content","$user","$kategori","$tagSerialize"));

}


?>



