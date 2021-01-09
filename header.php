<?php
ob_start();
session_start();
date_default_timezone_set('Europe/Istanbul');
include 'nedmin/gorenting/baglan.php';
$ayarsor=$db->prepare("SELECT * from ayar where ayar_id=:id");
$ayarsor->execute(array(
'id'=>0

));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

$kullanicisor=$db->prepare("SELECT * from kullanici where kullanici_mail=:mail");
$kullanicisor->execute(array(
'mail'=> $_SESSION['userkullanici_mail']

));
$say=$kullanicisor->rowCount();
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
?>

	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="<?php echo $ayarcek['ayar_author'];  ?>">
		<!-- Meta Description -->
		<meta name="description" content="<?php echo $ayarcek['ayar_description'];  ?>">
		<!-- Meta Keyword -->
		<meta name="keywords" content="<?php echo $ayarcek['ayar_keywords'];  ?>">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title><?php echo $ayarcek['ayar_title'];  ?></title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">					
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">			
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/main.css">
		</head>
		<body>

			  <header id="header" id="home">
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="index.php"><img src="<?php echo $ayarcek['ayar_logo'] ?>" alt="" title="" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="index.php">Anasayfa</a></li>
				          <li><a href="hakkimizda.php">Hakkımızda</a></li>
				          <li><a href="araclar.php">Araçlar</a></li>
				          
				          
				          
				          <li><a href="iletisim.php">İletişim</a></li>

				        <?php if (isset($_SESSION['userkullanici_mail'])) { ?>
				          	<li class="menu-has-children"><a href=""><?php echo $kullanicicek['kullanici_adsoyad']; ?></a>
				            <ul>
				              <li><a href="hesabim.php">Hesabım</a></li>
				              <li><a href="rezervasyonlarim.php">Rezarvasyonlarım</a></li>
				              <li><a href="logout.php">Güvenli Çıkış</a></li>
				            </ul>
				          </li> 
				      	<?php } else{ ?>
							<li><a href="uyelik.php">Giriş Yap / Kayıt OL</a></li>

						<?php }?>
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header><!-- #header -->