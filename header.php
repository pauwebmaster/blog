<?php
include 'google/gpData.php'; 
//session_start(); 
//print_r($_SESSION['userData']);
//echo $_SESSION['userData']['picture'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>blog</title>
	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

	<link href="https://fonts.googleapis.com/css?family=Poppins:800" rel="stylesheet">
	<link rel="stylesheet" href="css/modaal.css">

	<link rel="stylesheet"
	href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.6/styles/default.min.css">

	<script src="https://cdn.ckeditor.com/4.11.2/standard-all/ckeditor.js"></script>
	
	<script src="js/granim.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
	<script src="js/modaal.js"></script>


	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	
	<nav>
		<div class="nav-wrapper navbar ">
			<div data-target="slide-out" class="sideNavMenu sidenav-trigger"><i class="material-icons">clear_all</i></div>
			<a href="index.php" class="logo" ><i class="fas fa-home"></i></a>
			<div class="navSearchD ">
				<input type="text" placeholder="Arama Yapın" class="navSearch" name="navSearch">
			</div>
			<ul id="nav-mobile" class="right hide-on-med-and-down nav-right-button">
				<?php if (isset($_SESSION['user']) || isset($_SESSION['userData'])) {?>
					<a  class="btn waves-effect waves-light loginOut" href="loginOut.php">Çıkış yap</a>
				<?php } else{?>   	
					<button id="tikla" data-target="modal1"  class="btn waves-effect waves-light modal-trigger" type="button" name="action">Giriş Yap</button>
				<?php } ?>
			</ul>

		</div>
	</nav>
	<!--sidebar-->


	<div id="slide-out" class="sidenav indexSideNavMenu">
		<?php if (isset($_SESSION['user']) || isset($_SESSION['userData'])) {?>
			<div class="sidenavUsersInfo">

				<img class="userIMG" src=<?php if (	isset($_SESSION['userData'])) {
					echo'"'.$_SESSION['userData']['picture'].'"'; 
				} ?>>
				<?php  
				if (isset($_SESSION['user']))
				{
					?>
					<i c3lass="fas fa-user-circle" > </i>
				<?php 	} ?>

				<p class="sidenavUserName">
					<?php 
					if (isset($_SESSION['userData'])) {
						echo $_SESSION['userData']['first_name']." ". $_SESSION['userData']['last_name'];
					}
					elseif(isset($_SESSION['user'])){
						echo $_SESSION['user'];
					} ?>

				</p>
			</div>

			<div class="sidenavUserMenu">
			<!-- 	<ul>
					<li><a  href="text.php"><i class="fas fa-pen-nib"></i>Yazını Yaz</a></li>
					<li><a href=""><i class="fas fa-book-open"></i>Yazdıklarım</a></li>

				</ul> -->

				<div class="collection">
					<a  class="collection-item"  href="text.php"><i class="fas fa-pen-nib"></i>Yazını Yaz</a>	
					<a class="collection-item" href=""><i class="fas fa-book-open"></i>Yazdıklarım</a>
				</div>

			</div>



		<?php }else{ ?>

			<div class="sidenavUserMenu">
				<button id="tikla" data-target="modal1"  class="btn  modal-trigger sidenav_writers" type="button" name="action">Yazını Yaz</button>
			</div>

		<?php } ?>

		<div class="indexSideNavCategories">


			<h5>Kategoriler</h5>
			<div class="collection">
				<a class="collection-item active" href=""><i class="fab fa-js-square"></i>Javascript</a>
				<a class="collection-item" href=""><i class="fab fa-css3-alt"></i>CSS</a>
				<a class="collection-item" href=""><i class="fab fa-php"></i>PHP</a>     
			</div>


		</div>

		<div class="sideNavFooter grey-text">
			<ul>
				<li><a href="">Yazarlar</a></li>
				<li><a href="">Hakkımızda</a></li>
				<li><a href="">İletişim</a></li>
			</ul>

		</div>


		<canvas id="sidenavCanvasBanner"></canvas>
	</div>
	<!--sidebar-->