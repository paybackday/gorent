	<?php include 'header.php';
	$alislokasyon=$_POST['lokasyon_alis']; //$alislokasyon degiskenine anasayfada secilen alis yeri degerleri aliniyor.(1,2 vb.)
	$alis_tarih=$_POST['alis_tarih']; // donen deger "2020-05-22" tipinde unutma!
	$alis_saat=$_POST['alis_saat'];  // 0'lar 00 degilde direk 0 olarak donuyor unutma!
	$alis_dakika=$_POST['alis_dakika'];

	$teslimlokasyon=$_POST['lokasyon_teslim'];
	$teslim_tarih=$_POST['teslim_tarih'];
	$teslim_saat=$_POST['teslim_saat'];
	$teslim_dakika=$_POST['teslim_dakika'];

	$lokasyonaracsor=$db->prepare("SELECT K.arac_id,K.arac_resim,K.arac_marka,K.arac_model,K.arac_modelyil,K.arac_yakit,K.arac_vites,K.arac_km,K.arac_plaka,K.arac_sinif,K.arac_fiyat,K.arac_kapasite,Y.lokasyon_ad,K.arac_aciklama,K.arac_uygunluk from araclar K, lokasyon Y where K.lokasyon_id = Y.lokasyon_id and K.lokasyon_id={$alislokasyon} and K.arac_uygunluk=0");
	$lokasyonaracsor->execute();
	
	//Alim tarihinin veritabani datetime cinsine cevrilmesi "yil-ay-gun saat:dakika:saniye"
	$datealis="$alis_tarih $alis_saat:$alis_dakika:00";
	$dalis=date("Y-m-d H:i:s", strtotime($datealis));
	//Teslim tarihinin veritabani datetime cinsine cevrilmesi "yil-ay-gun saat:dakika:saniye"
	$dateteslim="$teslim_tarih $teslim_saat:$teslim_dakika:00";
	$dteslim=date("Y-m-d H:i:s", strtotime($dateteslim));
	
	//Fiyatin hesaplanabilmesi icin gun farkini bul. Hesaplarken $days i carpacaksin.
	$gunfarki = abs(strtotime($dateteslim) - strtotime($datealis));
	$days = floor(($gunfarki - $years * 365*60*60*24 -  
             $months*30*60*60*24)/ (60*60*24)); 

	$hours = floor(($gunfarki - $years * 365*60*60*24  
       - $months*30*60*60*24 - $days*60*60*24) 
                                   / (60*60));
	if($hours>1){
		$days+=1;
	}
	$rezervearacsor=$db->prepare("SELECT K.arac_id,K.arac_resim,K.arac_marka,K.arac_model,K.arac_modelyil,K.arac_yakit,K.arac_vites,K.arac_km,K.arac_plaka,K.arac_sinif,K.arac_fiyat,K.arac_kapasite,Y.lokasyon_ad,K.arac_aciklama,K.arac_uygunluk,K.arac_yerdegisim,L.rez_alistarih,L.rez_teslimtarih,L.lokasyon_alisid,L.lokasyon_teslimid,L.rez_fiyat,L.rez_durum,L.kullanici_id,L.arac_id from araclar K, lokasyon Y, rez L where K.lokasyon_id = Y.lokasyon_id AND K.arac_id=L.arac_id and K.lokasyon_id={$alislokasyon} and K.arac_uygunluk=1 and L.rez_durum=1");
	$rezervearacsor->execute();
	?>
			<!-- Banner Baslangic -->
			<section class="banner-area relative" style="background-image: url(img/arac-listele.jpg);" id="home">	
				<div class="overlay overlay-bg" ></div>
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
						<div class="col-md-8 pb-40 header-text">
							<h1 class="text-center pb-10">Araçlarımız</h1>
							<p class="text-center">
								Seçtiğiniz <?php $lokasyonadsor=$db->prepare("SELECT lokasyon_ad from lokasyon where lokasyon_id={$alislokasyon}"); $lokasyonadsor->execute(); $lokasyonadcek=$lokasyonadsor->fetch(PDO::FETCH_ASSOC);  echo $lokasyonadcek['lokasyon_ad']; ?> lokasyonunda bulunan araçlarımız
							</p>
						</div>
					</div>
					<!--				
					<div class="active-model-carusel"> // Kaydirmali gorunum ekranini ortadan kaldirmak.
					-->
						<?php 
			if (!isset($kullanicicek['kullanici_mail'])){

					header("Location:uyelik.php?uyelik=yok");
					}

			$datenow=date("Y-m-d H:i:s");
			 if ($dalis<$datenow) { ?>
							<div class="alert alert-danger">
										<strong>Hata!</strong> Alış tarihi şimdiki zamandan önceki bir zaman olamaz. Lütfen tekrar deneyiniz.
									</div>
								<?php }


			else{
			?>

						<?php if ($dalis>$dteslim) { ?>
							<div class="alert alert-danger">
										<strong>Hata!</strong> Girilen alış tarihi teslim tarihinden büyük olamaz. Lütfen tekrar deneyiniz.
									</div>
								<?php } ?>

						<?php if ($dalis==$dteslim) { ?>
							<div class="alert alert-danger">
										<strong>Hata!</strong> Girilen alış tarihi ve teslim tarihi ayni olamaz. Lütfen tekrar deneyiniz.
									</div>
								<?php } ?>


				<?php 
					if($dalis<$dteslim) {
						while($lokasyonaraccek=$lokasyonaracsor->fetch(PDO::FETCH_ASSOC)) { ?>
						<div style="margin-top: 30px" class="row align-items-center single-model item">
							<div class="col-lg-6 model-left">
								<div class="title justify-content-between d-flex">
									<h3><?php echo $lokasyonaraccek['arac_marka']; ?> <br>
									<?php echo $lokasyonaraccek['arac_model']; ?></h3>
									
									<h2><?php echo $lokasyonaraccek['arac_fiyat']; ?><span style="color: black; font-size: 20pt;">₺</span><span>/günlük</span></h2>
								</div>
								<p>
									<?php echo $lokasyonaraccek['arac_aciklama']; ?>
								</p>
								<p>
									<b>Yıl              :</b> <?php echo $lokasyonaraccek['arac_modelyil']; ?> <br>
									<b>Sınıf            :</b> <?php echo $lokasyonaraccek['arac_sinif']; ?> <br>
									<b>Kapasite         :</b> <?php echo $lokasyonaraccek['arac_kapasite']; ?> Kişi <br>
									<b>Vites            :</b> <?php echo $lokasyonaraccek['arac_vites']; ?> <br>
									<b>Yakıt			:</b> <?php echo $lokasyonaraccek['arac_yakit']; ?> <br>
									<b>Bulunduğu Lokasyon:</b> <?php echo $lokasyonaraccek['lokasyon_ad']; ?>
								</p>
								<form action="arac-onay.php" method="POST">
									<input type="hidden" name="lokasyon_alisid" value="<?php echo $alislokasyon ?>">
									<input type="hidden" name="alis_tarihzaman" value="<?php echo $dalis ?>">
									<input type="hidden" name="lokasyon_teslimid" value="<?php echo $teslimlokasyon ?>">
									<input type="hidden" name="teslim_tarihzaman" value="<?php echo $dteslim ?>">
									<input type="hidden" name="kira_suresi" value="<?php echo $days ?>">
									<input type="hidden" name="arac_gunlukfiyat" value="<?php echo $lokasyonaraccek['arac_fiyat']; ?>">
									<input type="hidden" name="arac_id" value="<?php echo $lokasyonaraccek['arac_id']; ?>">
									<button type="submit" class="text-uppercase primary-btn">Seç</button>
								</form>

								
							</div>
							<div class="col-lg-6 model-right">
								<img style="border: 3px solid; border-color: #FFC107;" class="img-fluid" src="<?php echo $lokasyonaraccek['arac_resim']; ?>" alt="">
							</div>
						</div>
					
						
					<?php

						}




						while($rezbittiysearaccek=$rezervearacsor->fetch(PDO::FETCH_ASSOC)) { 
							if (($dalis>$rezbittiysearaccek['rez_teslimtarih'] and $dteslim>$rezbittiysearaccek['rez_teslimtarih'] and $rezbittiysearaccek['arac_yerdegisim']==0) or ($dalis<$rezbittiysearaccek['rez_alistarih'] and $dteslim<$rezbittiysearaccek['rez_alistarih'] and $rezbittiysearaccek['arac_yerdegisim']==0)) {
							?>
						<div style="margin-top: 30px" class="row align-items-center single-model item">
							<div class="col-lg-6 model-left">
								<div class="title justify-content-between d-flex">
									<h3><?php echo $rezbittiysearaccek['arac_marka']; ?> <br>
									<?php echo $rezbittiysearaccek['arac_model']; ?></h3>
									
									<h2><?php echo $rezbittiysearaccek['arac_fiyat']; ?><span style="color: black; font-size: 20pt;">₺</span><span>/günlük</span></h2>
								</div>
								<p>
									<?php echo $rezbittiysearaccek['arac_aciklama']; ?>
								</p>
								<p>
									<b>Yıl              :</b> <?php echo $rezbittiysearaccek['arac_modelyil']; ?> <br>
									<b>Sınıf            :</b> <?php echo $rezbittiysearaccek['arac_sinif']; ?> <br>
									<b>Kapasite         :</b> <?php echo $rezbittiysearaccek['arac_kapasite']; ?> Kişi <br>
									<b>Vites            :</b> <?php echo $rezbittiysearaccek['arac_vites']; ?> <br>
									<b>Yakıt			:</b> <?php echo $rezbittiysearaccek['arac_yakit']; ?> <br>
									<b>Bulunduğu Lokasyon:</b> <?php echo $rezbittiysearaccek['lokasyon_ad']; ?>
								</p>

								<form action="arac-onay.php" method="POST">
									<input type="hidden" name="lokasyon_alisid" value="<?php echo $alislokasyon ?>">
									<input type="hidden" name="alis_tarihzaman" value="<?php echo $dalis ?>">
									<input type="hidden" name="lokasyon_teslimid" value="<?php echo $teslimlokasyon ?>">
									<input type="hidden" name="teslim_tarihzaman" value="<?php echo $dteslim ?>">
									<input type="hidden" name="kira_suresi" value="<?php echo $days ?>">
									<input type="hidden" name="arac_gunlukfiyat" value="<?php echo $rezbittiysearaccek['arac_fiyat']; ?>">
									<input type="hidden" name="arac_id" value="<?php echo $rezbittiysearaccek['arac_id']; ?>">
									<button type="submit" class="text-uppercase primary-btn">Seç</button>
								</form>
								
							</div>
							<div class="col-lg-6 model-right">
								<img style="border: 3px solid; border-color: #FFC107;" class="img-fluid" src="<?php echo $rezbittiysearaccek['arac_resim']; ?>" alt="">
							</div>
						</div>
						
					<?php
							}
						} 







					}
				}
					?>

						<!--
					</div> 
				-->
					
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