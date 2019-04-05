<?php 
include 'baglan.php';

$baslik = array(
		"ajax nedir?",
		"php apache server?",
		"robotların geleceği",
		"dünya döner",
		"dudu dudu",
		"php nedir?",
		"siz hala css mi?",
		"wordpress nedir?",
		"banada öğret",
		"printer",
		"ybs okumak"

);


for($i=1; $i<11 ; $i++){
	
	//$icerik= shuffle($baslik);
	$git_link= "google.com";
	$kategori = array(
		"PHP",
		"JAVASCRIPT",
		"CSS"
	);
	$k= rand(0,2);
	$tag = array(
		"sass",
		"laravel",
		"python",
		"ajax",
		"veri",
		"data",
		"yapayzeka",
		"zeka",
		"yapay",
		"genius",
		"robot",
		"dunya",
		"evren",
		"kod",
		"codergirl",
		"kodyazmak",
		"baslamak",
		"galaksi",
		"yıldız",
		"kodlamak",
		"kesmek"
	);
	$x = rand(0,20);
	$y = rand(0,20); 
	$z = rand(0,20); 

$tags = $tag[$x].",".$tag[$y].",".$tag[$z];
	
	$ekle = $bag->ekle("texts","baslik,git_link,icerik,yazar_id,kategori,etiket",array("$baslik[$i]","$git_link","NABERLAN","$i","$kategori[$k]","$tags"));


}


 ?>