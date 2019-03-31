<?php 
ob_start(); 
$dbhost = "us-cdbr-iron-east-03.cleardb.net"; //Veritabanın bulunduğu host
$dbuser = "b4d75f547986fc"; //Veritabanı Kullanıcı Adı
$dbpass = "78e273f8"; //Veritabanı Şifresi
$dbdata = "heroku_aa918aba70a4844"; //Veritabanı Adı

include"dbclass.php";

$bag = new db();

ob_end_flush();
?>