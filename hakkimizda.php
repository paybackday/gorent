<?php include 'header.php'; //Header alaninin dahil edilmesi 
$hakkimizdasor=$db->prepare("SELECT * from hakkimizda where hakkimizda_id=:id");
$hakkimizdasor->execute(array(
'id'=>0

));
$hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);
?>

			<!-- start banner Area -->
			<section class="banner-area relative" style="background-image:url(img/hakkimizda-header.jpg)"  id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						
						<div class="about-content col-lg-12">
							
							<h1 class="text-white">
												
							</h1>	
							<!-- <p class="text-white link-nav"><a href="index.php">Anasayfa </a>  <span class="lnr lnr-arrow-right"></span>  <a href="hakkimizda.php"> Hakkimizda</a></p>
						-->
						</div>										
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start home-about Area -->
			<section class="home-about-area" id="about">
				<div class="container-fluid">				
					<div class="row justify-content-center align-items-center">
						<div class="col-lg-6 no-padding home-about-left">
							<img class="img-fluid" src="img/<?php echo $hakkimizdacek['hakkimizda_resim'] ?>" alt="">
						</div>
						<div class="col-lg-6 no-padding home-about-right"><br><br>
							<h1><?php echo $hakkimizdacek['hakkimizda_baslik'] ?></h1>
							<!-- Paragraf kismi istenirse ara metin olarak kullanilabilir.
							
							<p>
								<span>We are here to listen from you deliver exellence</span>
							</p>
							
							Ara Metin paragraf kismi bitis. -->
							<p>

								<?php echo $hakkimizdacek['hakkimizda_icerik'] ?>
							</p>
							<a class="text-uppercase primary-btn" href="#">Detaylar</a>
						</div>
					</div>
				</div>	
			</section><br><br>
			<!-- End home-about Area -->	

			<!-- Start Video Area -->
			<section class="home-about-area" id="about">
				<div class="container-fluid">				
					<div class="row justify-content-center align-items-center">
						<div class="col-lg-6 no-padding home-about-center">
							<iframe class="container-fluid" height="500" src="https://www.youtube.com/embed/<?php echo $hakkimizdacek['hakkimizda_video']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>	
					</div>
				</div>	
			</section>
			<!-- End Video Area -->	















			<!-- Servisler Başlangıç -->
			<section class="feature-area section-gap" id="service">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="col-md-8 pb-40 header-text">
							<h1>Başlıca Size Sunduğumuz Hizmetler</h1>
							<p>
								GORent Arac Kiralama ile guveni hissedin.
							</p>
						</div>
					</div>


					<div class="row">
						<?php
                        $servissor=$db->prepare("SELECT * from servisler");
                        $servissor->execute();

                        while ($serviscek=$servissor->fetch(PDO::FETCH_ASSOC)) {
                        ?>


						<div class="col-lg-4 col-md-6">
							<div class="single-feature">
								<h4><?php if ($serviscek['servis_logo']=="kullanici") {echo "<span class='lnr lnr-user'></span>";}
										else if ($serviscek['servis_logo']=="lisans") {echo "<span class='lnr lnr-license'></span>";}
										else if ($serviscek['servis_logo']=="telefon") {echo "<span class='lnr lnr-phone'></span>";}
										else if ($serviscek['servis_logo']=="roket") {echo "<span class='lnr lnr-rocket'></span>";}
										else if ($serviscek['servis_logo']=="elmas") {echo "<span class='lnr lnr-diamond'></span>";}
										else if ($serviscek['servis_logo']=="yorum") {echo "<span class='lnr lnr-bubble'></span>";}
										?>
								<?php echo $serviscek['servis_baslik']; ?></h4>
								<p>
									<?php echo $serviscek['servis_icerik']; ?>
								</p>
							</div>
						</div>


												
					<?php } ?>



					
					













					</div>
				</div>	
			</section>
			<!-- End feature Area -->				

		

			
			<?php include 'footer.php'; //Footer alaninin dahil edilmesi?>