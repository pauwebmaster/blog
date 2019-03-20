<?php 
include 'header.php';
include 'baglan.php';

//$text_id=$_GET["text_id"];
$text_id=3;
$textBookInfo = $bag->cek("OBJ", "text", "*", "WHERE id=?", array($text_id));

?>


<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.6/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
<div class="textBookBanner">

	<div class="draftBookBanner">
		<div class="textBookHeader" ><p><?php echo $textBookInfo->header; ?></p></div>

		<div class="textBookUser">
			<div class="row">
				<div class="col s5">

<img class="textBookUserImg z-depth-4" src=<?php if (	isset($_SESSION['userData'])) {
						echo'"'.$_SESSION['userData']['picture'].'"'; 
					} ?>>
</div>
				<div class="col s7">
					<p class="textBookHeaderName"><?php echo $textBookInfo->username; ?></p>
					<p class="textBookHeaderDate">Haz 03 2019</p>
				</div>
			</div>
		</div>

		<div class="textBookHeaderBannerTypeLogo  z-depth-5"><img src="img/js-logo.svg" alt=""></div>


	</div>

</div>
<div class="containerText">
	<div class="row">
			<div class="container">
		<div class="col s12">
			<div class="textBookContent"> <?php echo $textBookInfo->content; ?></div>
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
		


$("#markdownGıthub").load(<?php echo '"'."markdown.php?textGit='".$textBookInfo->git."'".'"'; ?>);

	fitty('.textBookHeader p',{
		 minSize: 16,
  maxSize: 55,
 observeMutations: false,
 //multiLine: true




	});
});
</script>



	<?php 
	
	include 'footer.php';
	?>