	<?php include 'header.php'; 
	
	$alis_lokasyonid=$_POST['lokasyon_alisid'];
	$alis_tarihzaman=$_POST['alis_tarihzaman'];
	$teslim_lokasyonid=$_POST['lokasyon_teslimid'];
	$teslim_tarihzaman=$_POST['teslim_tarihzaman'];
	$kira_suresi=$_POST['kira_suresi'];
	$arac_gunlukfiyat=$_POST['arac_gunlukfiyat'];
	$arac_id=$_POST['arac_id'];
	$arac_toplamfiyat=$kira_suresi*$arac_gunlukfiyat;

	//lokasyonların adını getirme
	//Alis lokasyonunun adini getirme
	$lokasyonalissor=$db->prepare("SELECT * from lokasyon where lokasyon_id={$alis_lokasyonid}");
	$lokasyonalissor->execute();
	$lokasyonaliscek=$lokasyonalissor->fetch(PDO::FETCH_ASSOC);

	//Teslim lokasyonunun adini getirme
	$lokasyonteslimsor=$db->prepare("SELECT * from lokasyon where lokasyon_id={$teslim_lokasyonid}");
	$lokasyonteslimsor->execute();
	$lokasyonteslimcek=$lokasyonteslimsor->fetch(PDO::FETCH_ASSOC);

	//Arac ile ilgili ozet bilgi cekmek
	$aracozetsor=$db->prepare("SELECT * from araclar where arac_id={$arac_id}");
	$aracozetsor->execute();
	$aracozetcek=$aracozetsor->fetch(PDO::FETCH_ASSOC);



	?>

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
							<div class="col-lg-7 col-md-7">
								<center><h4 class="mb-30">Kişisel Bilgiler</h4></center><hr><small style="color: orange">&nbsp&nbsp *Eğer bilgilerinizde bir yanlışlık olduğunu düşünüyorsanız hesabım sayfasından bilgilerinizi güncelleyebilirsiniz.</small>
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
										<label for="mail">E-Mail:</label>
										<input type="text" name="kullanici_mail" placeholder="Mail adresinizi giriniz" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mail adresinizi giriniz'"  class="single-input" value="<?php echo $kullanicicek['kullanici_mail'] ?> " disabled>
									</div>
									<div class="mt-10">
										<label for="gsm">Cep Telefonu:</label>
										<input type="text" name="kullanici_gsm" value="<?php echo $kullanicicek['kullanici_gsm'] ?>"class="single-input" disabled >
									</div><br>
									<center><h4 class="mb-30">Fatura Bilgileri</h4></center><hr>
									<div class="mt-10">
										<label for="il">İl:</label>
										<div class="form-group" id="">
											<select name="kullanici_il" disabled="">
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
										<input type="text" name="kullanici_ilce" value="<?php echo $kullanicicek['kullanici_ilce'] ?>"class="single-input" disabled>
									</div>
									
									<div class="mt-10">
										<label for="adres"><i class="fa fa-thumb-tack" aria-hidden="true"></i>&nbsp&nbspAdres:</label>
										<textarea disabled="" class="single-textarea" name="kullanici_adres" placeholder="Güncel adresinizi giriniz" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'" class="single-input"><?php echo $kullanicicek['kullanici_adres'] ?></textarea>
									</div>
									<input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>">
									<br>
									


								</form>

							<center><h4 class="mb-30">Ödeme Bilgileri</h4></center><hr>
							<br><br><br><hr>	
							</div>
							<div class="col-lg-5 col-md-5">
								<center><h4 class="mb-30">Rezarvasyon Özeti</h4></center><hr>
								<div class="mt-10">
										<h6><label for="alisb">Alış:</label></h6>
										<label for="alis"><?php echo $lokasyonaliscek['lokasyon_ad']; ?><br>
														<?php echo substr($alis_tarihzaman,0,16);?>
										</label>
								</div>

								<div class="mt-10">
										<h6><label for="teslimb">Teslim:</label></h6>
										<label for="teslim"><?php echo $lokasyonteslimcek['lokasyon_ad']; ?><br>
											<?php echo substr($teslim_tarihzaman,0,16);?>
										</label>
								</div>

								<div class="mt-10">
										<h6><label for="kirab">Kiralama Süresi:</label></h6>
										<label for="kira"><?php echo $kira_suresi." Gün"; ?></label>
								</div><br>

								<div class="alert alert-success">
											<strong>Genel Toplam:</strong><br>
											<strong style="color:#B71C1C; font-size: 14pt;"><?php echo $arac_toplamfiyat."₺ KDV Dahil"; ?></strong>
								</div><br>

								<div class="mt-10">
										<h6><label for="aracb"><i class="fa fa-car"></i> Seçtiğiniz Araç:</label></h6>
										<label for="arac"><?php echo $aracozetcek['arac_marka']." ".$aracozetcek['arac_model']." veya benzeri araçlar" ; ?>
											<br><?php echo $aracozetcek['arac_modelyil']."<br>".$aracozetcek['arac_yakit']."<br>".$aracozetcek['arac_vites']."<br>".$aracozetcek['arac_kapasite']." Kişi" ; ?>
										</label>
								</div>
								<form action="nedmin/gorenting/islem.php" method="POST">
									<input type="hidden" name="rez_alistarih" value="<?php echo $alis_tarihzaman; ?>">
									<input type="hidden" name="rez_teslimtarih" value="<?php echo $teslim_tarihzaman; ?>">
									<input type="hidden" name="lokasyon_alisid" value="<?php echo $alis_lokasyonid; ?>">
									<input type="hidden" name="lokasyon_teslimid" value="<?php echo $teslim_lokasyonid; ?>">
									<input type="hidden" name="rez_fiyat" value="<?php echo $arac_toplamfiyat; ?>">
									<input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id'];  ?>">
									<input type="hidden" name="arac_id" value="<?php echo $arac_id; ?>">

									<center><button type="submit" name="rezervasyonyap" class="btn btn-success btn-block">Ödeme Yap&Onayla</button></center>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Align Area -->

			<?php include 'footer.php' ?>