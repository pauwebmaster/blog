<?php 
include 'header.php';
include 'baglan.php';

//$text_id=$_GET["text_id"];
$text_id=51;
$textBookInfo = $bag->cek("OBJ", "texts", "*", "WHERE id=?", array($text_id));
$userInfo = $bag->cek("OBJ", "n_users", "username,picture,name,surname", "WHERE id=?", array($textBookInfo->yazar_id));

if(!empty($userInfo->name))
$userName= $userInfo->name." ".$userInfo->surname;
else
$userName=$userInfo->username;
?>


<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.6/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
<div class="textBookBanner">

	<div class="draftBookBanner">
		<div class="textBookHeader" ><p><?php echo $textBookInfo->baslik; ?></p></div>

		<div class="textBookUser">
			<div class="row">
				<div class="col s4">
					<div class="textBookUserImg z-depth-4" style=" background-image: url(img/avatar1.svg); "></div>


				</div>
				<div class="col s8">
					<p class="textBookHeaderName"><?php echo $userName; ?></p>
					<p class="textBookHeaderDate">Haz 03 2019</p>
				</div>
			</div>
		</div>

		<div class="textBookHeaderBannerTypeLogo  z-depth-5"><img id="TBtur_logo" src="#" alt=""></div>
		<div class="textBookHeaderGithubLogo"><img src="img/github.svg" alt=""></div>

	</div>

</div>
<div class="containerText">
	<div class="row">
		<div class="container">
			<div class="col s12">
				<div class="textBookContent"> <?php echo $textBookInfo->icerik; ?></div>
			</div>
		</div>


		<div class="container">
			<div class="col s12">
				<!-- <iframe id="textBookMarkdown" src="markdown.php" " frameborder="0"></iframe>-->	
				<div id="markdownGıthub"></div>

			</div>
		</div>
	</div>
</div>


<script src="js/fitty.min.js"></script>
<script>
	$(document).ready(function () {
		


		$("#markdownGıthub").load(<?php echo '"'."markdown.php?textGit='".$textBookInfo->git_link."'".'"'; ?>);

		fitty('.textBookHeader p',{
			minSize: 16,
			maxSize: 55,
			observeMutations: false,
 //multiLine: true

});


/**
*
*css3 logo
*
*/
switch(<?php echo '"'.$textBookInfo->kategori.'"'; ?>) {
	case "PHP":
	$(".textBookHeaderBannerTypeLogo img").attr("src","img/php-logo.svg");
	$(".textBookBanner").css("background-color","#767eb4");
	break;
	case "CSS":
	$(".textBookHeaderBannerTypeLogo img").attr("src","img/css3.svg");
	$(".textBookBanner").css("background-color"," #3faef2");

	break;
	default:
	$(".textBookHeaderBannerTypeLogo img").attr("src","img/js-logo.svg");
}

const TBtur_logo=  $("#TBtur_logo").attr("src");
if(TBtur_logo=="img/css3.svg" || TBtur_logo =="img/php-logo.svg"){
	$(".textBookHeaderBannerTypeLogo").removeClass("z-depth-5");
	$(".textBookHeaderBannerTypeLogo").css("background","#ffffff00");
	$(".textBookHeaderBannerTypeLogo").css("filter","drop-shadow(0px 0px 6px white)");
	if (TBtur_logo =="img/php-logo.svg") {
		$(".textBookHeaderBannerTypeLogo").css("width","150");
	}
}


/*
* github
*
*/
if(<?php echo '"'.$textBookInfo->git_link.'"'; ?> == ""){

	$(".textBookHeaderGithubLogo").css("display","none");

}

});
</script>



<?php 

include 'footer.php';
?>