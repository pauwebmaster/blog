<?php 
include 'header.php';
include 'baglan.php';

?>
<!--sidebar-->

<div class="index-banner">

	<canvas id="indexCanvasBanner"></canvas>
	<div id="particles-js">

	</div>
</div>
<!--content-->
<div class="placeholder"></div>
<div class="indexContent">
	<div class="row">
		<!--card-->
		<div class="col s12  mainCard">

			<?php 
// $_GET["sayfa"] ile hangi sayfada olduğumuzu alıyoruz bir sayı girilmemişse veya veri boş gelirse 1 sayıyoruz.
			$sayfa = isset($_GET["sayfa"]) ? (int) $_GET["sayfa"] : 1;

 //yazdırma SEÇİMİ (OBJ_ALL) kullandık sayfa başı (5) kayıt sonraki linklerin deseni (?sayfa=) sayfalama numaraları (3)lü sıra olsun
			$sonuc = $bag->sayfala("OBJ_ALL", "texts", "*", "ORDER BY id ASC", array(), 5, $sayfa, "?sayfa=", 2);

 // $sonuc["veriler"] dizi olduğu için döngü kurduk
			foreach($sonuc["veriler"] as $indexKart) { 
				$userInfo = $bag->cek("ASSOC", "n_users", "username,picture,first_name,last_name", "WHERE id=?", array($indexKart->yazar_id));
				if(empty($userInfo))
					echo "başarılı";
				if($userInfo['first_name'] != NULL && $userInfo['last_name'] != NULL)
					$userName= $userInfo['first_name']." ".$userInfo['last_name'];
				else
					$userName=$userInfo['username'];

				$desen= "/<p>(.*?)<\/p>/i";

				preg_match($desen, $indexKart->icerik, $cardContent);
				if (empty($cardContent)) {
					$cardContent="kişi p etiketi yoktur";
				}
				
				switch ($indexKart->kategori) {
					case "PHP":
					$cardImgType="img/php-card-logo.svg" ;
					break;
					case "CSS":
					$cardImgType="img/css3.svg" ;
					break;
					default:
					$cardImgType="img/js-card-logo.svg" ;

				}


				?>
				<div class="blog-card alt z-depth-4">
					<div class="meta">
						<div class="photo" style="background-image: url(  <?php echo $cardImgType; ?> );"></div>
						<ul class="details">
							<li class="author"></li>
							<li class="date">Mart,25,2019</li>
							<li class="tags">
								<ul><i class="fas fa-tag" style="margin-right: 5px"></i>
									<?php $tag = explode(",", $indexKart->etiket);
									foreach ($tag as $key => $value){ 
										echo "<li>".$value."</il>";
									}
									?>
								</ul>
								<?php echo $github= !empty($indexKart->git_link)? '<i class="fab fa-github metaGithub"></i': NULL ?>
							</li>
						</ul>
					</div>
					<div class="description">
						<div class="description-text-grid">
							<h1><?php echo $indexKart->baslik ; ?></h1>
							<h2 style="display: none;">Java is not the s</h2></div>
							<p> <?php echo $cardContent[0]; ?> </p>
							<p class="read-more">
								<a   href= <?php echo "'textBook.php?text_id=".$indexKart->id."'";?> >Devamını Görmek İçin  <i class="fas fa-angle-double-right seeMoreIcon"></i></a>
							</p>
							<div class="chip chidPositon">
								<img src=<?php echo "'".$userInfo['picture']."'"; ?> alt="Contact Person">
								<?php echo $userName; ?>
							</div>
						</div>
					</div>

					


					<?php
				}

 // Sayfalama yapacak olan kodlarımız
				echo '<ul class="pagination">';
 echo $sonuc["sayfalar"];//sayfa sayilarini yazdirir (ilk onceki [-10]123[4]567[+10] sonraki son) seklinde
 echo '</ul>';
 
 // Bazen kayıt sayısı sayfa sayısı gerekli olabilir kullanabileceklerimiz
 echo $sonuc["toplamsayfa"]. " sayfada toplam " .$sonuc["toplamkayit"]. " kayit var, " .$sayfa. ". sayfadasınız.";

 ?>








</div>







</div>


</div>





<!--index login -->
<script src="js/particles.js"></script>
<script>
	
	/*
*
* GRADİENT BANNER
*
*/



var granimInstance = new Granim({
	element: '#indexCanvasBanner',
	direction: 'diagonal',
	isPausedWhenNotInView: true,
	states : {
		"default-state": {
			gradients: [
			['#1d3e45', '#144a55'],
			['#1d4d42', '#2c4f4d'],
			['#2e2f49', '#1d3e45']
			]
		}
	}
});



 /*
  *
  *
  * PARTİCLES
  *
  */


  particlesJS.load('particles-js', 'particlesSetting.json', function() {
    //console.log('çalıştı');
});



</script>
<script src="js/fitty.min.js"></script>
<script>
	$(document).ready(function(){  

		fitty('.description-text-grid h1', {
			minSize: 20,
			maxSize: 30,
			observeMutations: false,
		}); 

		$(".read-more a").hover(function(){ 
			$(this).css("margin-right","5px");
			$(".seeMoreIcon").show("slide","slow");
		},function(){
			$(".seeMoreIcon").hide("slide","slow");



		});

});


	</script>
	<!--index login -->
	<?php 
	include 'loginCard.php';
	include 'footer.php';
	?>