<?php include 'header.php' ?>
<!-- #header -->

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

			
			<!-- Start contact-page Area -->
			<section class="contact-page-area section-gap">
				<div class="container">
					<div class="row">
						
						<?php if($_GET['uyelik']=="yok") { ?>
									<div style="margin-bottom: 40px;" class="alert alert-info">
										<strong>Bilgilendirme!</strong> Rezervasyonunuzu yapmadan önce lütfen üye girişi yapınız. Hesabınız bulunmuyorsa hemen kayıt olabilirsiniz.
									</div>
								<?php } ?>

						<div class="col-lg-4 d-flex flex-column address-wrap">
							<form class="form-area " action="nedmin/gorenting/islem.php" method="POST" >
								<center><h2>Giriş Yap</h2></center><br>

								<?php if($_GET['durum']=="no") { ?>
									<div class="alert alert-danger">
										<strong>Hata!</strong> Hatalı kullanıcı adı veya şifre.
									</div>
								<?php } ?>

								<label for="email">E-Mail:</label>
								<input type="mail" name="kullanici_mail" placeholder="E-Mail adresinizi giriniz" class="common-input mb-20 form-control">
								<label for="sifre">Şifre:</label><br>
								<input type="password" name="kullanici_password" placeholder="Şifrenizi giriniz" class="common-input mb-20 form-control">
								<button type="submit" style="float: right;" name="kullanicigiris" class="btn btn-success">Giriş Yap</button>
							</form>
							
																			
						</div>



						<div class="col-lg-7 ">
							<form class="form-area " action="nedmin/gorenting/islem.php" method="POST" >
								<div class="row justify-content-end">	
									<div class="col-lg-7 form-group ">
										<center><h2>Üye Ol</h2></center><br>
										
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

										<?php if($_GET['durum']=="var") { ?>
										<div class="alert alert-danger">
											<strong>Hata!</strong> Sistemde zaten kaydınız bulunmaktadır.
										</div>
										<?php } ?>

										<?php if($_GET['durum']=="basarisiz") { ?>
										<div class="alert alert-danger">
											<strong>Hata!</strong> Kaydınız gerçekleştirilemedi. Lütfen daha sonra tekrar deneyin.
										</div>
										<?php } ?>


										<label class="control-label" for="adsoyad">Ad Soyad<span class="required">*</span></label>
										<input name="kullanici_adsoyad" placeholder="Ad Soyad Giriniz" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ad Soyad Giriniz'" class="common-input mb-20 form-control" required="" type="text">
									
										<label for="email">E-Mail<span class="required">*</span></label>
										<input name="kullanici_mail" placeholder="E-Mail Adresi Giriniz" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'E-Mail Adresi Giriniz'" class="common-input mb-20 form-control" required="" type="email">

										<label for="sifre">Şifre:</label><br>
										<input type="password" name="kullanici_password" placeholder="Şifrenizi giriniz" class="common-input mb-20 form-control">

										<label for="sifre">Şifre Tekrar:</label><br>
										<input type="password" name="kullanici_password2" placeholder="Şifrenizi tekrar giriniz" class="common-input mb-20 form-control">

										<label for="tc">TC Kimlik:<span class="required">*</span></label>
										<input type="text" maxlength="11" name="kullanici_tc" class="common-input mb-20 form-control" required="">

										<label for="phone">Cep Telefonu:<span class="required">*</span><small style="color: red">&nbsp&nbsp *Başında "0" olmadan giriniz.</small></label>
										<input type="text" maxlength="11" id="phone" name="kullanici_gsm" class="common-input mb-20 form-control" required="">

										<label>Doğum Tarihi<span class="required">*</span><small style="color: red">&nbsp&nbsp GG/AA/YYYY</small></label><br>
											
										<select name="dtgun" style="float: left;">
												<?php 
												
												for ($tarih = strtotime("2018-01-01"); $tarih <= strtotime("2018-01-31"); $tarih = strtotime("+1 day", $tarih)) { ?>
													<option value="<?php echo date("d", $tarih); ?>"><?php echo date("d", $tarih); ?></option>
												<?php } ?>
										</select>

											
										<select name="dtay" style="float: left; margin-left: 10px">
												<?php 
												
												for ($tarih = strtotime("2018-01-01"); $tarih <= strtotime("2018-12-31"); $tarih = strtotime("+1 month", $tarih)) { ?>
													<option value="<?php echo date("m", $tarih); ?>"><?php echo date("m", $tarih); ?></option>
												<?php } ?>
										</select>

										<select name="dtyil" style="float: left; margin-left: 10px">
												<?php 
												
												for ($j=1930; $j <=2001 ; $j++) { ?>
													<option value="<?php echo $j; ?>"><?php echo $j; ?></option>
												<?php } ?>
										</select><br><br>



										<label>Ehliyet Tarihi<span class="required">*</span><small style="color: red">&nbsp&nbsp GG/AA/YYYY</small></label><br>
											
										<select name="egun" style="float: left;">
												<?php 
												
												for ($tarih = strtotime("2018-01-01"); $tarih <= strtotime("2018-01-31"); $tarih = strtotime("+1 day", $tarih)) { ?>
													<option value="<?php echo date("d", $tarih); ?>"><?php echo date("d", $tarih); ?></option>
												<?php } ?>
										</select>

											
										<select name="eay" style="float: left; margin-left: 10px">
												<?php 
												
												for ($tarih = strtotime("2018-01-01"); $tarih <= strtotime("2018-12-31"); $tarih = strtotime("+1 month", $tarih)) { ?>
													<option value="<?php echo date("m", $tarih); ?>"><?php echo date("m", $tarih); ?></option>
												<?php } ?>
										</select>

										<select name="eyil" style="float: left; margin-left: 10px">
												<?php 
												
												for ($j=1930; $j <=2001 ; $j++) { ?>
													<option value="<?php echo $j; ?>"><?php echo $j; ?></option>
												<?php } ?>
										</select><br><br>

										<label style="float: left;">Şehir<span class="required">*</span></label><br>
										<select style="float: left;" id="heard" class="form-control" name="kullanici_il">
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

                          				<label style="margin-top: 10px">İlçe<span class="required">*</span></label><br>
                          				<input type="text" name="kullanici_ilce" value="" id="first-name" required="required" class="form-control" required="">

                          				<label>Adres<span class="required">*</span></label><br>
                          				<textarea class="common-textarea form-control" name="kullanici_adres" placeholder="Adres Giriniz" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Adres Giriniz'" required=""></textarea> <br>

                          				<button type="submit" name="kullanicikaydet" class="btn btn-success">Kayıt OL</button>


																				
									</div>
								</div>
							</form>	
						</div>
					
					</div>
				</div>	
			</section>
			




			<?php include 'footer.php' ?>

