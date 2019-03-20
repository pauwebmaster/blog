<?php 

include '../baglan.php';


$kod = $_GET['kod'];
$email = $_GET['eposta'];

$guncelle = $bag->guncelle(0,"info_users" , "onay","WHERE email=? AND kod=?", array(1,$email,$kod));

if ($guncelle) {
	echo "Aktivasyon İşleminiz Başarıyla Gerçekleşmiştir. Giriş Yapabilirsiniz..";
}

else{
echo "Ya aktivasyon yapmışsınız ya da kod zaman aşımına uğramış.";

}

 ?>