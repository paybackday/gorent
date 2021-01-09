	<?php include 'header.php';
	$aracsor=$db->prepare("SELECT K.arac_id,K.arac_resim,K.arac_marka,K.arac_model,K.arac_modelyil,K.arac_yakit,K.arac_vites,K.arac_km,K.arac_plaka,K.arac_sinif,K.arac_fiyat,K.arac_kapasite,Y.lokasyon_ad,K.arac_aciklama,K.arac_uygunluk FROM araclar K, lokasyon Y WHERE K.lokasyon_id = Y.lokasyon_id");
	$aracsor->execute();
	?>
			<!-- Banner Baslangic -->
			<section class="banner-area relative" style="background-image: url(img/araclar-banner.jpg);" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							
							
						</div>											
					</div>
				</div>
			</section>
			<!-- Banner Bitis -->	

			<!-- Model Baslangic-->
			
			<section class="model-area section-gap" id="cars">
				
				<div class="container">
					
					<div class="row d-flex justify-content-center pb-40">
						<div class="col-md-9 pb-40 header-text">
							<!--<h1 class="text-center pb-10"></h1>-->
							<p class="text-center">
								<h6>Portföyümüzde bulunan araç çeşitliliği sayesinde müşterilerimizin ihtiyacını her segmentte karşılıyoruz.</h6>
							</p>
						</div>
					</div>				
					<div class="active-model-carusel">
						<?php while($araccek=$aracsor->fetch(PDO::FETCH_ASSOC)) { ?>
						<div class="row align-items-center single-model item">
							<div class="col-lg-6 model-left">
								<div class="title justify-content-between d-flex">
									<h3><?php echo $araccek['arac_marka']; ?> <br>
									<?php echo $araccek['arac_model']; ?></h3>
									
									<h2><?php echo $araccek['arac_fiyat']; ?><span style="color: black; font-size: 20pt;">₺</span><span>/günlük</span></h2>
								</div>
								<p>
									<?php echo $araccek['arac_aciklama']; ?>
								</p>
								<p>
									<b>Yıl              :</b> <?php echo $araccek['arac_modelyil']; ?> <br>
									<b>Sınıf            :</b> <?php echo $araccek['arac_sinif']; ?> <br>
									<b>Kapasite         :</b> <?php echo $araccek['arac_kapasite']; ?> Kişi <br>
									<b>Vites            :</b> <?php echo $araccek['arac_vites']; ?> <br>
									<b>Yakıt			:</b> <?php echo $araccek['arac_yakit']; ?> <br>
									<b>Bulunduğu Lokasyon:</b> <?php echo $araccek['lokasyon_ad']; ?>
								</p>
								<a class="text-uppercase primary-btn" href="index.php">Hemen Kirala!</a>
							</div>
							<div class="col-lg-6 model-right">
								<img style="border: 3px solid; border-color: #FFC107;" class="img-fluid" src="<?php echo $araccek['arac_resim']; ?>" alt="">
							</div>
						</div>
					
						
						<?php } ?>
					</div>
					
				</div>
				
			</section>

			<!-- Model Bitis -->			

			
			<section class="callaction-area relative section-gap">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-10">
							<h1 class="text-white">Sorun mu Yaşıyorsunuz?</h1>
							<p>
								Bizimle iletişime geçmek, her türlü soru, öneri, görüş, şikayetlerinizi dile getirebilmek ve istediğiniz zaman destek alabilmek için iletişim sayfasından bize ulaşın!
							</p>
							<a class="callaction-btn text-uppercase" href="iletisim.php">İLETİŞİM</a>	
						</div>
					</div>
				</div>	
			</section><br><br>

			
	
			<?php include 'footer.php' ?>