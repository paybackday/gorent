	<?php include 'header.php'; ?>

			<!-- start banner Area -->
			<section class="banner-area relative" style="background-image:url(img/hesabim-banner.jpg)" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
											
							</h1>	
							
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->	



			
			<!-- Start Align Area -->
			<div class="whole-wrap">
				<div class="container">
					<div class="section-top-border">
						<div class="row">
							<div class="col-lg-8 col-md-8">
								<h3 class="mb-30">Hesap Bilgileri</h3>
								<?php if($_GET['update']=="no") { ?>
										<div class="alert alert-danger">
											<strong>Hata!</strong> Bilgilerin güncellemesi işlemi başarısız. Lütfen daha sonra tekrar deneyin.
										</div>
										<?php } ?>
								<form class="form-area" action="nedmin/gorenting/islem.php" method="POST">
									<div class="mt-10">
										<label for="adsoyad">Ad Soyad:</label>
										<input type="text" name="kullanici_adsoyad" value="<?php echo $kullanicicek['kullanici_adsoyad'] ?>"class="single-input" disabled>
									</div>
									<div class="mt-10">
										<label for="mail">E-Mail:<small style="color: red">&nbsp&nbsp *E-mail adresiniz yenilendikten sonra eski adresiniz ile giriş yapamayacaksınız.</small></label>
										<input type="text" name="kullanici_mail" placeholder="Mail adresinizi giriniz" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mail adresinizi giriniz'"  class="single-input" value="<?php echo $kullanicicek['kullanici_mail'] ?>">
									</div>
									<div class="mt-10">
										<label for="gsm">Cep Telefonu:</label>
										<input type="text" name="kullanici_gsm" value="<?php echo $kullanicicek['kullanici_gsm'] ?>"class="single-input" >
									</div>
									<hr>
									<?php if($_GET['durum']=="farklisifre") { ?>
										<div class="alert alert-danger">
											<strong>Hata!</strong> Girdiğiniz şifreler eşleşmiyor.
										</div>
										<?php } ?>

										<?php if($_GET['durum']=="eksiksifre") { ?>
										<div class="alert alert-danger">
											<strong>Hata!</strong> Şifreler minimum 6 karakter uzunluğunda olmalıdır.
										</div>
										<?php } ?>
									<div class="mt-10">
										<label for="sifre">Şifre:</label>
										<input type="password" name="kullanici_password" placeholder="Şifrenizi giriniz" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Şifrenizi giriniz'" class="single-input">
									</div>
									<div class="mt-10">
										<label for="tkrsifre">Şifre Tekrar:</label>
										<input type="password" name="kullanici_password2" placeholder="Şifrenizi tekrar giriniz" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Şifrenizi tekrar giriniz'" class="single-input">
									</div><br>
									<center><button type="submit" name="sifreguncelle" class="btn btn-success">Şifreyi Güncelle</button></center>
									<hr>
									
									<div class="mt-10">
										<label for="il">İl:</label>
										<div class="form-group" id="">
											<select name="kullanici_il">
												<option value="<?php echo $kullanicicek['kullanici_il'] ?>"><?php echo $kullanicicek['kullanici_il'] ?></option>
												<option value="Adana">Adana</option>
    											<option value="Adıyaman">Adıyaman</option>
    											<option value="Afyonkarahisar">Afyonkarahisar</option>
    											<option value="Ağrı">Ağrı</option>
    											<option value="Amasya">Amasya</option>
   												<option value="Ankara">Ankara</option>
    											<option value="Antalya">Antalya</option>
    											<option value="Artvin">Artvin</option>
    											<option value="Aydın">Aydın</option>
    											<option value="Balıkesir">Balıkesir</option>
    											<option value="Bilecik">Bilecik</option>
    											<option value="Bingöl">Bingöl</option>
   												<option value="Bitlis">Bitlis</option>
    											<option value="Bolu">Bolu</option>
    											<option value="Burdur">Burdur</option>
    											<option value="Bursa">Bursa</option>
    											<option value="Çanakkale">Çanakkale</option>
    											<option value="Çankırı">Çankırı</option>
    											<option value="Çorum">Çorum</option>
    											<option value="Denizli">Denizli</option>
    											<option value="Diyarbakır">Diyarbakır</option>
    											<option value="Edirne">Edirne</option>
    											<option value="Elazığ">Elazığ</option>
    											<option value="Erzincan">Erzincan</option>
    											<option value="Erzurum">Erzurum</option>
    											<option value="Eskişehir">Eskişehir</option>
    											<option value="Gaziantep">Gaziantep</option>
    											<option value="Giresun">Giresun</option>
   												<option value="Gümüşhane">Gümüşhane</option>
    											<option value="Hakkâri">Hakkâri</option>
    											<option value="Hatay">Hatay</option>
    											<option value="Isparta">Isparta</option>
    											<option value="Mersin">Mersin</option>
    											<option value="İstanbul">İstanbul</option>
    											<option value="İzmir">İzmir</option>
    											<option value="Kars">Kars</option>
    											<option value="Kastamonu">Kastamonu</option>
    											<option value="Kayseri">Kayseri</option>
    											<option value="Kırklareli">Kırklareli</option>
    											<option value="Kırşehir">Kırşehir</option>
    											<option value="Kocaeli">Kocaeli</option>
    											<option value="Konya">Konya</option>
    											<option value="Kütahya">Kütahya</option>
    											<option value="Malatya">Malatya</option>
    											<option value="Manisa">Manisa</option>
    											<option value="Kahramanmaraş">Kahramanmaraş</option>
    											<option value="Mardin">Mardin</option>
    											<option value="Muğla">Muğla</option>
    											<option value="Muş">Muş</option>
    											<option value="Nevşehir">Nevşehir</option>
    											<option value="Niğde">Niğde</option>
    											<option value="Ordu">Ordu</option>
    											<option value="Rize">Rize</option>
    											<option value="Sakarya">Sakarya</option>
    											<option value="Samsun">Samsun</option>
    											<option value="Siirt">Siirt</option>
    											<option value="Sinop">Sinop</option>
    											<option value="Sivas">Sivas</option>
    											<option value="Tekirdağ">Tekirdağ</option>
    											<option value="Tokat">Tokat</option>
    											<option value="Trabzon">Trabzon</option>
    											<option value="Tunceli">Tunceli</option>
    											<option value="Şanlıurfa">Şanlıurfa</option>
    											<option value="Uşak">Uşak</option>
    											<option value="Van">Van</option>
    											<option value="Yozgat">Yozgat</option>
    											<option value="Zonguldak">Zonguldak</option>
    											<option value="Aksaray">Aksaray</option>
    											<option value="Bayburt">Bayburt</option>
    											<option value="Karaman">Karaman</option>
    											<option value="Kırıkkale">Kırıkkale</option>
    											<option value="Batman">Batman</option>
    											<option value="Şırnak">Şırnak</option>
    											<option value="Bartın">Bartın</option>
    											<option value="Ardahan">Ardahan</option>
    											<option value="Iğdır">Iğdır</option>
    											<option value="Yalova">Yalova</option>
    											<option value="Karabük">Karabük</option>
    											<option value="Kilis">Kilis</option>
    											<option value="Osmaniye">Osmaniye</option>
    											<option value="Düzce">Düzce</option>
											</select>
										</div>
									</div>
									<div class="mt-10">
										<label for="ilce">İlçe:</label>
										<input type="text" name="kullanici_ilce" value="<?php echo $kullanicicek['kullanici_ilce'] ?>"class="single-input">
									</div>
									
									<div class="mt-10">
										<label for="adres"><i class="fa fa-thumb-tack" aria-hidden="true"></i>&nbsp&nbspAdres:</label>
										<textarea class="single-textarea" name="kullanici_adres" placeholder="Güncel adresinizi giriniz" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'" class="single-input"><?php echo $kullanicicek['kullanici_adres'] ?></textarea>
									</div>
									<input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>">
									<br>
									<center><button type="submit" name="hesabimguncelle" class="btn btn-success">Bilgileri Güncelle</button></center>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Align Area -->

			<?php include 'footer.php' ?>