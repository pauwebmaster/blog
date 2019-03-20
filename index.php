<?php 
include 'header.php';
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
			<div class="col s11  indexContentMainCard ">
				<div class="row">
					<?php for ($i=0; $i <6 ; $i++) { ?>
						<div class="col s4  mainCard">

							<div class="indexCardNew z-depth-4">
								<div class="indexCardBG">
									<div class="indexType">JS</div>
									<h5>ajax nedir?</h5>
									<p class="indexUsers"><i class="fas fa-user" style="margin-right: 10px;"></i>fatihemree</p>
									<p class="indexContent">
										Ajax, “Asynchronous JavaScript and XML” (Türkçe: Eşzamansız JavaScript ve XML) anlamına gelen ve bir çok programlama dili ile uyumlu çalışan bir tekniktir.
<!-- <div class="indexSave">
	<i class="fas fa-bookmark"></i>
</div> -->
</div>

</div>

</div>
<?php } ?> 	 


</div>

<div class="col s1 indexTrendCard">
	<!-- Grey navigation panel -->
</div>
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

<!--index login -->
<?php 
include 'loginCard.php';
include 'footer.php';
 ?>