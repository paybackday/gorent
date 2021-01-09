<?php
ob_start();
session_start();
include 'baglan.php';
if (isset($_POST['admingiris'])) {

$kullanici_mail=$_POST['kullanici_mail'];
$kullanici_password=md5($_POST['kullanici_password']);

$kullanicisor=$db->prepare("SELECT * from kullanici where kullanici_mail=:mail and kullanici_password=:password and kullanici_yetki=:yetki ");
$kullanicisor->execute(array(
'mail'=>$kullanici_mail,
'password'=>$kullanici_password,
'yetki'=> 5

));
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

$say=$kullanicisor->rowCount();
	
	if ($say==1) {
		$_SESSION['kullanici_mail']=$kullanici_mail;
		header("Location:../production/index.php");
		// Giriş başarılı oldluğunda gerçekleşicek kodlar...

	}
	else{
		header("Location:../production/login.php?durum=no");
	}

}

// Kulanıcı giriş başlangıç

if (isset($_POST['kullanicigiris'])) {

$kullanici_mail=htmlspecialchars($_POST['kullanici_mail']);
$kullanici_password=md5($_POST['kullanici_password']);

$kullanicisor=$db->prepare("SELECT * from kullanici where kullanici_mail=:mail and kullanici_password=:password and kullanici_yetki=:yetki and kullanici_durum=:durum ");
$kullanicisor->execute(array(
'mail'=>$kullanici_mail,
'password'=>$kullanici_password,
'yetki'=> 1,
'durum'=> 1

));
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

$say=$kullanicisor->rowCount();
	
	if ($say==1) {
		$_SESSION['userkullanici_mail']=$kullanici_mail;
		header("Location:../../");
		// Giriş başarılı oldluğunda gerçekleşicek kodlar...

	}
	else{
		header("Location:../../uyelik.php?durum=no");
	}

}

//Kullanıcı giriş bitiş


//Genel Ayar Sayfasının Kaydedilmesi
if (isset($_POST['genelayarkaydet'])) {
	//Tablo guncelleme islemi
	$ayarkaydet=$db->prepare("UPDATE ayar SET 
		ayar_title=:ayar_title,
		ayar_description=:ayar_description,
		ayar_keywords=:ayar_keywords,
		ayar_author=:ayar_author
		WHERE ayar_id=0");
	$update=$ayarkaydet->execute(array(
		'ayar_title'=> $_POST['ayar_title'],
		'ayar_description'=> $_POST['ayar_description'],
		'ayar_keywords'=> $_POST['ayar_keywords'],
		'ayar_author'=> $_POST['ayar_author']

	));

	if ($update) {

		header("Location:../production/genel-ayar.php?durum=ok");
		# code...
	}
	else{
		header("Location:../production/genel-ayar.php?durum=no");
	}
	
}

//İletişim Ayar Sayfasının Kaydedilmesi
if (isset($_POST['iletisimayarkaydet'])) {
	//Tablo guncelleme islemi
	$ayarkaydet=$db->prepare("UPDATE ayar SET 
		ayar_tel=:ayar_tel,
		ayar_gsm=:ayar_gsm,
		ayar_faks=:ayar_faks,
		ayar_mail=:ayar_mail,
		ayar_il=:ayar_il,
		ayar_ilce=:ayar_ilce,
		ayar_adres=:ayar_adres,
		ayar_mesai=:ayar_mesai
		WHERE ayar_id=0");
	$update=$ayarkaydet->execute(array(
		'ayar_tel'=> $_POST['ayar_tel'],
		'ayar_gsm'=> $_POST['ayar_gsm'],
		'ayar_faks'=> $_POST['ayar_faks'],
		'ayar_mail'=> $_POST['ayar_mail'],
		'ayar_il'=> $_POST['ayar_il'],
		'ayar_ilce'=> $_POST['ayar_ilce'],
		'ayar_adres'=> $_POST['ayar_adres'],
		'ayar_mesai'=> $_POST['ayar_mesai']

	));

	if ($update) {

		header("Location:../production/iletisim-ayar.php?durum=ok");
		# code...
	}
	else{
		header("Location:../production/iletisim-ayar.php?durum=no");
	}
	
}

//API Ayar Sayfasının Kaydedilmesi
if (isset($_POST['apiayarkaydet'])) {
	//Tablo guncelleme islemi
	$ayarkaydet=$db->prepare("UPDATE ayar SET 
		ayar_analytics=:ayar_analytics,
		ayar_maps=:ayar_maps,
		ayar_zopim=:ayar_zopim
		WHERE ayar_id=0");
	$update=$ayarkaydet->execute(array(
		'ayar_analytics'=> $_POST['ayar_analytics'],
		'ayar_maps'=> $_POST['ayar_maps'],
		'ayar_zopim'=> $_POST['ayar_zopim']
	));

	if ($update) {

		header("Location:../production/api-ayar.php?durum=ok");
		# code...
	}
	else{
		header("Location:../production/api-ayar.php?durum=no");
	}
	
}

//Sosyal Medya Ayar Sayfasının Kaydedilmesi
if (isset($_POST['sosyalayarkaydet'])) {
	//Tablo guncelleme islemi
	$ayarkaydet=$db->prepare("UPDATE ayar SET 
		ayar_facebook=:ayar_facebook,
		ayar_twitter=:ayar_twitter,
		ayar_instagram=:ayar_instagram,
		ayar_youtube=:ayar_youtube
		WHERE ayar_id=0");
	$update=$ayarkaydet->execute(array(
		'ayar_facebook'=> $_POST['ayar_facebook'],
		'ayar_twitter'=> $_POST['ayar_twitter'],
		'ayar_instagram'=> $_POST['ayar_instagram'],
		'ayar_youtube'=> $_POST['ayar_youtube']
	));

	if ($update) {

		header("Location:../production/sosyal-ayar.php?durum=ok");
		# code...
	}
	else{
		header("Location:../production/sosyal-ayar.php?durum=no");
	}
	
}

//Mail Ayar Sayfasının Kaydedilmesi
if (isset($_POST['mailayarkaydet'])) {
	//Tablo guncelleme islemi
	$ayarkaydet=$db->prepare("UPDATE ayar SET 
		ayar_smtphost=:ayar_smtphost,
		ayar_smtpuser=:ayar_smtpuser,
		ayar_smtppassword=:ayar_smtppassword,
		ayar_smtpport=:ayar_smtpport
		WHERE ayar_id=0");
	$update=$ayarkaydet->execute(array(
		'ayar_smtphost'=> $_POST['ayar_smtphost'],
		'ayar_smtpuser'=> $_POST['ayar_smtpuser'],
		'ayar_smtppassword'=> $_POST['ayar_smtppassword'],
		'ayar_smtpport'=> $_POST['ayar_smtpport']
	));

	if ($update) {

		header("Location:../production/mail-ayar.php?durum=ok");
		# code...
	}
	else{
		header("Location:../production/mail-ayar.php?durum=no");
	}
	
}


if (isset($_POST['hakkimizdakaydet'])) {
	// "img" Klasorune Resim Yukleme Islemi
	$yukleklasor= "../../img/"; // Resmin yuklenecegi klasor.
                      $tmp_name=$_FILES['hakkimizda_resim']['tmp_name'];
                      $name=$_FILES['hakkimizda_resim']['name'];
                      $boyut=$_FILES['hakkimizda_resim']['size'];
                      $tip=$_FILES['hakkimizda_resim']['type'];
                      $uzanti=substr($name, -4,4);
                      echo "$uzanti";
                      $rastgelesayi1=rand(10000,50000);
                      $rastgelesayi2=rand(10000,50000);
                      $resimad="hakkimizda_resim".$uzanti;

                      /*dosya var mi kontrol
                      if (strlen($name)==0) {?>
                        
                        <b><?php echo "Resim Dosyasi Seciniz!";?></b> <?php
                        exit();
                      }*/
                      if ($boyut>(1024*1024*12)) {?>
                        <b><?php echo "Dosya Boyutu Cok Fazla!";?></b> <?php
                        exit();
                      }
                      if ($tip !='image/jpeg' && $tip!='image/png' && $tip!='image/jpg') {?>
                        <b><?php echo "Yalnizca jpeg veya png formatinda olabilir.";?></b> <?php
                        
                      }
                      move_uploaded_file($tmp_name, "$yukleklasor/$resimad");
//"img" Klasorune Resim Yukleme Islemi ==SON==

// Hakkimizda Tablosu Guncelleme
$ayarkaydet=$db->prepare("UPDATE hakkimizda SET 
		hakkimizda_baslik=:hakkimizda_baslik,
		hakkimizda_icerik=:hakkimizda_icerik,
		hakkimizda_resim=:hakkimizda_resim,
		hakkimizda_video=:hakkimizda_video
		WHERE hakkimizda_id=0");
	$update=$ayarkaydet->execute(array(
		'hakkimizda_baslik'=> $_POST['hakkimizda_baslik'],
		'hakkimizda_icerik'=> $_POST['hakkimizda_icerik'],
		'hakkimizda_resim'=> $resimad,
		'hakkimizda_video'=> $_POST['hakkimizda_video']
	));

	if ($update) {

		header("Location:../production/hakkimizda.php?durum=ok");
		# code...
	}
	else{
		header("Location:../production/hakkimizda.php?durum=no");
	}
	
}


if ($_GET['servissil']=="ok") {
	//HAKKIMIZDA-->Servisler Tekli Silme
	$sil=$db->prepare("DELETE from servisler where servis_id=:id");
	$kontrol=$sil->execute(array(
		'id'=>$_GET['servis_id']
	));
	if ($kontrol) {
	header("Location:../production/servisler.php?sildurum=ok");
	}
	else {
	header("Location:../production/servisler.php?sildurum=no");
	}

}


if (isset($_POST['servisayarekle'])) {
	//Servisler Tablosuna Ekleme İşlemi
	$kaydet=$db->prepare("INSERT into servisler set 

		servis_logo=:servis_logo,
		servis_baslik=:servis_baslik,
		servis_icerik=:servis_icerik
		");
	
	$insert=$kaydet->execute(array(

		'servis_logo'=>$_POST['servis_logo'],
		'servis_baslik'=>$_POST['servis_baslik'],
		'servis_icerik'=>$_POST['servis_icerik']

	));

	if ($insert) {

		header("Location:../production/servisler.php?ekledurum=ok");
		# code...
	}
	else{
		header("Location:../production/servisler.php?ekledurum=no");
	}
	
}


if (isset($_POST['servisayarduzenle'])) {
	//Tablo guncelleme islemi
	$ayarkaydet=$db->prepare("UPDATE servisler SET 
		servis_logo=:servis_logo,
		servis_baslik=:servis_baslik,
		servis_icerik=:servis_icerik
		WHERE servis_id={$_POST['servis_id']}");
	$update=$ayarkaydet->execute(array(
		'servis_logo'=> $_POST['servis_logo'],
		'servis_baslik'=> $_POST['servis_baslik'],
		'servis_icerik'=> $_POST['servis_icerik']
	));

	if ($update) {

		header("Location:../production/servisler.php?duzenledurum=ok");
		# code...
	}
	else{
		header("Location:../production/servisler.php?duzenledurum=no");
	}
	
}



if (isset($_POST['tablosil'])) {
	//Servisler Tablosunu Silme İşlemi
	$tabloucur=$db->prepare("DELETE from servisler");
	$delete=$tabloucur->execute(array());

	if ($delete) {

		header("Location:../production/servisler.php?tablosil=ok");
		# code...
	}
	else{
		header("Location:../production/servisler.php?tablosil=no");
	}
	
}


//Kullanıcı Düzenleme İşlemi
if (isset($_POST['kullaniciduzenle'])) {
	//Tablo guncelleme islemi
	$kullanici_id=$_POST['kullanici_id'];
	$ayarkaydet=$db->prepare("UPDATE kullanici SET 
		kullanici_tc=:kullanici_tc,
		kullanici_adsoyad=:kullanici_adsoyad,
		kullanici_gsm=:kullanici_gsm,
		kullanici_il=:kullanici_il,
		kullanici_ilce=:kullanici_ilce,
		kullanici_adres=:kullanici_adres
		WHERE kullanici_id={$_POST['kullanici_id']}");
	$update=$ayarkaydet->execute(array(
		'kullanici_tc'=> $_POST['kullanici_tc'],
		'kullanici_adsoyad'=> $_POST['kullanici_adsoyad'],
		'kullanici_gsm'=> $_POST['kullanici_gsm'],
		'kullanici_il'=> $_POST['kullanici_il'],
		'kullanici_ilce'=> $_POST['kullanici_ilce'],
		'kullanici_adres'=> $_POST['kullanici_adres']
		

	));

	if ($update) {

		header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=ok");
		# code...
	}
	else{
		header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=no");
	}
	
}

if ($_GET['kullanicisil']=="ok") {
	//Kullanıcı Tablosu--> Tekli Silme
	$sil=$db->prepare("DELETE from kullanici where kullanici_id=:id");
	$kontrol=$sil->execute(array(
		'id'=>$_GET['kullanici_id']
	));
	if ($kontrol) {
	header("Location:../production/kullanici.php?kullanicisil=ok");
	}
	else {
	header("Location:../production/kullanici.php?kullanicisil=no");
	}

}

if (isset($_POST['logoduzenle'])) {
	//Logoyu genel ayarlar sayfasindan degistirmek.
	$uploads_dir = '../../img';
	@$tmp_name= $_FILES['ayar_logo']["tmp_name"];
	@$name= $_FILES['ayar_logo']["name"];
	$benzersizsayi=rand(2000,32000);
	echo $refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi$name");
	
	$duzenle=$db->prepare("UPDATE ayar SET
		ayar_logo=:logo
		WHERE ayar_id=0");
	$update=$duzenle->execute(array(
		'logo'=>$refimgyol
	));
		if ($update) {
			$resimsilunlink=$_POST['eski_yol'];
			unlink("../../$resimsilunlink");
			Header("Location:../production/genel-ayar.php?durum=ok");
			# code...
		}
		else{
			Header("Location:../production/genel-ayar.php?durum=no");
		}
	# code...
}

//Uyelik sayfasindan KULLANICI KAYDI yapmak
if (isset($_POST['kullanicikaydet'])) {
	$kullanici_adsoyad=htmlspecialchars($_POST['kullanici_adsoyad']);
	$kullanici_mail=htmlspecialchars($_POST['kullanici_mail']);
	$kullanici_password=htmlspecialchars($_POST['kullanici_password']);
	$kullanici_password2=htmlspecialchars($_POST['kullanici_password2']);
	$kullanici_tc=htmlspecialchars($_POST['kullanici_tc']);
	$kullanici_gsm=htmlspecialchars($_POST['kullanici_gsm']);
	
	$dtgun=$_POST['dtgun'];
	$dtay=$_POST['dtay'];
	$dtyil=$_POST['dtyil'];
	//Dogum tarihin datetime seklinde yapilandirilmasi
	$datedt="$dtyil-$dtay-$dtgun 00:00:00";
	$dtarih=date("Y-m-d H:i:s", strtotime($datedt));

	$egun=$_POST['egun'];
	$eay=$_POST['eay'];
	$eyil=$_POST['eyil'];
	//Ehliyet tarihin datetime seklinde yapilandirilmasi
	$date_ehliyet="$eyil-$eay-$egun 00:00:00";
	$etarih=date("Y-m-d H:i:s", strtotime($date_ehliyet));

	$kullanici_il=$_POST['kullanici_il'];
	$kullanici_ilce=$_POST['kullanici_ilce'];
	$kullanici_adres=$_POST['kullanici_adres'];

	if ($kullanici_password==$kullanici_password2) {
		if (strlen($kullanici_password)>=6) {
			
			//Baslangıc

			$kullanicisor=$db->prepare("SELECT * from kullanici where kullanici_mail=:mail");
			$kullanicisor->execute(array(
				'mail'=>$kullanici_mail
			));

			//Dönen satır sayısını belirtir.
			$say=$kullanicisor->rowCount();

			//Bu eposta adresli kayıt yoksa kayıt işlemi yaptıracak eğer kod parçası
			if ($say==0) {
				$password=md5($kullanici_password);
				$kullanici_yetki=1;

			//Kullanici kayit islemi yapiliyor.

				$kullanicikaydet=$db->prepare("INSERT INTO kullanici set 
				kullanici_adsoyad=:kullanici_adsoyad,
				kullanici_mail=:kullanici_mail,
				kullanici_password=:kullanici_password,
				kullanici_tc=:kullanici_tc,
				kullanici_gsm=:kullanici_gsm,
				kullanici_dogum=:kullanici_dogum,
				kullanici_ehliyet=:kullanici_ehliyet,
				kullanici_il=:kullanici_il,
				kullanici_ilce=:kullanici_ilce,
				kullanici_adres=:kullanici_adres,
				kullanici_yetki=:kullanici_yetki
				");
	
				$insert=$kullanicikaydet->execute(array(

				'kullanici_adsoyad'=>$kullanici_adsoyad,
				'kullanici_mail'=>$kullanici_mail,
				'kullanici_password'=>$password,
				'kullanici_tc'=>$kullanici_tc,
				'kullanici_gsm'=>$kullanici_gsm,
				'kullanici_dogum'=>$dtarih,
				'kullanici_ehliyet'=>$etarih,
				'kullanici_il'=>$kullanici_il,
				'kullanici_ilce'=>$kullanici_ilce,
				'kullanici_adres'=>$kullanici_adres,
				'kullanici_yetki'=>$kullanici_yetki

				));

				if ($insert) {
					echo "Kayıt Başarılı";
					header("Location:../../index.php?durum=loginok");
					
				}
				else{
					echo "Kayıt Başarısız";
					header("Location:../../uyelik.php?durum=basarisiz");
				}
			//Kullanici kayit islemi bitiriliyor.
			}else{
				Header("Location:../../uyelik.php?durum=var");
			}
		//Bitis
		}
		else{
			Header("Location:../../uyelik.php?durum=eksiksifre");
		}
		
	} else{
		Header("Location:../../uyelik.php?durum=farklisifre");
	}
}

//Hesabım sayfası kullanıcı düzenleme alanı
if (isset($_POST['hesabimguncelle'])) {

	$kullanici_mail=htmlspecialchars($_POST['kullanici_mail']);
	$kullanici_gsm=htmlspecialchars($_POST['kullanici_gsm']);
	$kullanici_il=$_POST['kullanici_il'];
	$kullanici_ilce=htmlspecialchars($_POST['kullanici_ilce']);
	$kullanici_adres=htmlspecialchars($_POST['kullanici_adres']);
	//Tablo guncelleme islemi
	$ayarkaydet=$db->prepare("UPDATE kullanici SET 
		kullanici_mail=:kullanici_mail,
		kullanici_gsm=:kullanici_gsm,
		kullanici_il=:kullanici_il,
		kullanici_ilce=:kullanici_ilce,
		kullanici_adres=:kullanici_adres
		WHERE kullanici_id={$_POST['kullanici_id']}");
	$update=$ayarkaydet->execute(array(
		'kullanici_mail'=> $kullanici_mail,
		'kullanici_gsm'=> $kullanici_gsm,
		'kullanici_il'=> $kullanici_il,
		'kullanici_ilce'=> $kullanici_ilce,
		'kullanici_adres'=> $kullanici_adres
		

	));

	if ($update) {
		session_destroy();
		header("Location:../../uyelik.php");
		# code...
	}
	else{
		header("Location:../../hesabim.php?update=no");
	}
	
}

//Hesabım sayfası sifre guncelleme alanı
if (isset($_POST['sifreguncelle'])) {

	$kullanici_password=htmlspecialchars($_POST['kullanici_password']);
	$kullanici_password2=htmlspecialchars($_POST['kullanici_password2']);
	
	if ($kullanici_password==$kullanici_password2) {

		if (strlen($kullanici_password)>=6) {
			$password=md5($kullanici_password);

			//Sifre degistirme baslangic
			$ayarkaydet=$db->prepare("UPDATE kullanici SET 
			kullanici_password=:kullanici_password
			WHERE kullanici_id={$_POST['kullanici_id']}");
			$update=$ayarkaydet->execute(array(
			'kullanici_password'=> $password ));

			if ($update) {
				session_destroy();
				header("Location:../../uyelik.php");
				# code...
			}
			else{
				header("Location:../../hesabim.php?update=no");
			}

			//Sifre degistirme bitis


		}
		else{
			Header("Location:../../hesabim.php?durum=eksiksifre");
		}


	}
	else{
		Header("Location:../../hesabim.php?durum=farklisifre");
	}
}


if (isset($_POST['aracekle'])) {

	//Arac resmini sunucuya eklemek.
	$uploads_dir = '../../img';
	@$tmp_name= $_FILES['arac_resim']["tmp_name"];
	@$name= $_FILES['arac_resim']["name"];
	$benzersizsayi=rand(2000,32000);
	echo $refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi$name"); //$refimgyol==> dosyanin yoludur. Veritabaninda arac_resim indeksine yukle emre unutma.
	
	
	$kaydet=$db->prepare("INSERT into araclar set 

		arac_resim=:arac_resim,
		arac_marka=:arac_marka,
		arac_model=:arac_model,
		arac_modelyil=:arac_modelyil,
		arac_yakit=:arac_yakit,
		arac_vites=:arac_vites,
		arac_km=:arac_km,
		arac_plaka=:arac_plaka,
		arac_sinif=:arac_sinif,
		arac_fiyat=:arac_fiyat,
		arac_kapasite=:arac_kapasite,
		lokasyon_id=:lokasyon_id,
		arac_aciklama=:arac_aciklama
		");
	
	$insert=$kaydet->execute(array(

		'arac_resim'=>$refimgyol,
		'arac_marka'=>$_POST['arac_marka'],
		'arac_model'=>$_POST['arac_model'],
		'arac_modelyil'=>$_POST['arac_modelyil'],
		'arac_yakit'=>$_POST['arac_yakit'],
		'arac_vites'=>$_POST['arac_vites'],
		'arac_km'=>$_POST['arac_km'],
		'arac_plaka'=>$_POST['arac_plaka'],
		'arac_sinif'=>$_POST['arac_sinif'],
		'arac_fiyat'=>$_POST['arac_fiyat'],
		'arac_kapasite'=>$_POST['arac_kapasite'],
		'lokasyon_id'=>$_POST['lokasyon_id'],
		'arac_aciklama'=>$_POST['arac_aciklama']


	));

	if ($insert) {
		header("Location:../production/arac-ekle.php?ekledurum=ok&resimyol=$refimgyol");
	}
	else{
		header("Location:../production/arac-ekle.php?ekledurum=no");	
	}

}

if ($_GET['aracsil']=="ok") {
		//Veritabanindan araci silmeden once resim yolunu cekip resmi sil ondan sonra araci silme kod satiridir.
		$aracsor=$db->prepare("SELECT * FROM araclar where arac_id=:id");
		$aracsor->execute(array(
		'id'=>$_GET['arac_id']
		));
		$araccek=$aracsor->fetch(PDO::FETCH_ASSOC);
		$resimsilunlink=$araccek['arac_resim'];
		unlink("../../$resimsilunlink");
	//Araçlar Tablosu --> Araç Silme
	$sil=$db->prepare("DELETE from araclar where arac_id=:id");
	$kontrol=$sil->execute(array(
		'id'=>$_GET['arac_id']
	));
	if ($kontrol) {
		header("Location:../production/araclar.php?aracsilme=ok");
	}
	else {
		header("Location:../production/araclar.php?aracsilme=no");
	}

}


if (isset($_POST['aracduzenle'])) {
	//Arac resmini sunucuya eklemek.
	if (!file_exists($_FILES['arac_resim']['tmp_name']) || !is_uploaded_file($_FILES['arac_resim']['tmp_name'])) 
	{
		$ayarkaydet=$db->prepare("UPDATE araclar SET 
		arac_marka=:arac_marka,
		arac_model=:arac_model,
		arac_modelyil=:arac_modelyil,
		arac_yakit=:arac_yakit,
		arac_vites=:arac_vites,
		arac_km=:arac_km,
		arac_plaka=:arac_plaka,
		arac_sinif=:arac_sinif,
		arac_fiyat=:arac_fiyat,
		arac_kapasite=:arac_kapasite,
		lokasyon_id=:lokasyon_id,
		arac_aciklama=:arac_aciklama,
		arac_uygunluk=:arac_uygunluk
		WHERE arac_id={$_POST['arac_id']}");
		$update=$ayarkaydet->execute(array(
		'arac_marka'=> $_POST['arac_marka'],
		'arac_model'=> $_POST['arac_model'],
		'arac_modelyil'=> $_POST['arac_modelyil'],
		'arac_yakit'=> $_POST['arac_yakit'],
		'arac_vites'=> $_POST['arac_vites'],
		'arac_km'=> $_POST['arac_km'],
		'arac_plaka'=> $_POST['arac_plaka'],
		'arac_sinif'=> $_POST['arac_sinif'],
		'arac_fiyat'=> $_POST['arac_fiyat'],
		'arac_kapasite'=> $_POST['arac_kapasite'],
		'lokasyon_id'=> $_POST['lokasyon_id'],
		'arac_aciklama'=> $_POST['arac_aciklama'],
		'arac_uygunluk'=> $_POST['arac_uygunluk']
	));

	if ($update) {

		header("Location:../production/araclar.php?duzenledurum=ok");
		# code...
		}
	else{
		header("Location:../production/araclar.php?duzenledurum=no");
		}
    	
	}
	else{
		$aracsor=$db->prepare("SELECT * FROM araclar where arac_id=:id");
		$aracsor->execute(array(
		'id'=>$_POST['arac_id']
		));
		$araccek=$aracsor->fetch(PDO::FETCH_ASSOC);
		$resimsilunlink=$araccek['arac_resim'];
		unlink("../../$resimsilunlink");
		$uploads_dir = '../../img';
		@$tmp_name= $_FILES['arac_resim']["tmp_name"];
		@$name= $_FILES['arac_resim']["name"];
		$benzersizsayi=rand(2000,32000);
		echo $refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi$name");

		$kaydet=$db->prepare("UPDATE araclar set
		arac_resim=:arac_resim,
		arac_marka=:arac_marka,
		arac_model=:arac_model,
		arac_modelyil=:arac_modelyil,
		arac_yakit=:arac_yakit,
		arac_vites=:arac_vites,
		arac_km=:arac_km,
		arac_plaka=:arac_plaka,
		arac_sinif=:arac_sinif,
		arac_fiyat=:arac_fiyat,
		arac_kapasite=:arac_kapasite,
		lokasyon_id=:lokasyon_id,
		arac_aciklama=:arac_aciklama,
		arac_uygunluk=:arac_uygunluk
		WHERE arac_id={$_POST['arac_id']}");
	
	$insert=$kaydet->execute(array(
		'arac_resim'=>$refimgyol,
		'arac_marka'=>$_POST['arac_marka'],
		'arac_model'=>$_POST['arac_model'],
		'arac_modelyil'=>$_POST['arac_modelyil'],
		'arac_yakit'=>$_POST['arac_yakit'],
		'arac_vites'=>$_POST['arac_vites'],
		'arac_km'=>$_POST['arac_km'],
		'arac_plaka'=>$_POST['arac_plaka'],
		'arac_sinif'=>$_POST['arac_sinif'],
		'arac_fiyat'=>$_POST['arac_fiyat'],
		'arac_kapasite'=>$_POST['arac_kapasite'],
		'lokasyon_id'=>$_POST['lokasyon_id'],
		'arac_aciklama'=>$_POST['arac_aciklama'],
		'arac_uygunluk'=>$_POST['arac_uygunluk']


	));

		if ($insert) 
			{
			header("Location:../production/araclar.php?duzenledurum=ok");
			}
		else
			{
			header("Location:../production/araclar.php?duzenledurum=no");	
			}



	
	
	}

	



}

//Kullanici iletisim sayfasindan admin panele mesaj gonderme
if (isset($_POST['mesajgonder'])) {

	$mesajkaydet=$db->prepare("INSERT INTO gelenler set 
				gelenler_adsoyad=:adsoyad,
				gelenler_mail=:mail,
				gelenler_konu=:konu,
				gelenler_mesaj=:mesaj
				");
	
	$insert=$mesajkaydet->execute(array(

				'adsoyad'=>$_POST['adsoyad'],
				'mail'=>$_POST['mail'],
				'konu'=>$_POST['konu'],
				'mesaj'=>$_POST['mesaj']

	));


	if ($insert) 
			{
			header("Location:../../iletisim.php?mesajgonder=ok");
			}
		else
			{
			header("Location:../../iletisim.php?mesajgonder=no");	
			}




}


//Admin Panel-->Mesajlar-->Direk silme islemi
if ($_GET['gelenlersil']=="ok") {

	$sil=$db->prepare("DELETE from gelenler where gelenler_id=:id");
	$kontrol=$sil->execute(array(
		'id'=>$_GET['gelenler_id']
	));
	if ($kontrol) {
	header("Location:../production/gelenmesajlar.php?gelenlersil=ok");
	}
	else {
	header("Location:../production/gelenmesajlar.php?gelenlersil=no");
	}
	
}

// Kullanicinin aracini secip rezervasyon onay ekranindan gerekli onayin verilmesinden sonra rezervasyon kaydi yapilmasi
if (isset($_POST['rezervasyonyap'])) {

	$rez_alistarih=$_POST['rez_alistarih'];
	$rez_teslimtarih=$_POST['rez_teslimtarih'];
	$lokasyon_alisid=$_POST['lokasyon_alisid'];
	$lokasyon_teslimid=$_POST['lokasyon_teslimid'];
	$rez_fiyat=$_POST['rez_fiyat'];
	$kullanici_id=$_POST['kullanici_id'];
	$arac_id=$_POST['arac_id'];

	$rezyap=$db->prepare("INSERT into rez set 

		rez_alistarih=:rez_alistarih,
		rez_teslimtarih=:rez_teslimtarih,
		lokasyon_alisid=:lokasyon_alisid,
		lokasyon_teslimid=:lokasyon_teslimid,
		rez_fiyat=:rez_fiyat,
		kullanici_id=:kullanici_id,
		arac_id=:arac_id
		");
	
	$insert=$rezyap->execute(array(

		'rez_alistarih'=>$rez_alistarih,
		'rez_teslimtarih'=>$rez_teslimtarih,
		'lokasyon_alisid'=>$lokasyon_alisid,
		'lokasyon_teslimid'=>$lokasyon_teslimid,
		'rez_fiyat'=>$rez_fiyat,
		'kullanici_id'=>$kullanici_id,
		'arac_id'=>$arac_id

	));

	//Araclar tablosunda bulunan arac_uygunlugu'nun "1" (yani arac kullanimda) ve lokasyon_id'nin de onay sayfasindan post edilen lokasyon_teslimid olmasi

	if($lokasyon_alisid==$lokasyon_teslimid){


	$aracdurumguncelle=$db->prepare("UPDATE araclar set
		lokasyon_id=:lokasyon_id,
		arac_uygunluk=:arac_uygunluk
		WHERE arac_id={$arac_id}
		");

	$guncelle=$aracdurumguncelle->execute(array(

		'lokasyon_id'=>$lokasyon_teslimid,
		'arac_uygunluk'=>1

	));

}
	else if ($lokasyon_alisid!=$lokasyon_teslimid){

		$aracdurumguncelle=$db->prepare("UPDATE araclar set
		lokasyon_id=:lokasyon_id,
		arac_uygunluk=:arac_uygunluk,
		arac_yerdegisim=:arac_yerdegisim
		WHERE arac_id={$arac_id}
		");

		$guncelle=$aracdurumguncelle->execute(array(

		'lokasyon_id'=>$lokasyon_teslimid,
		'arac_uygunluk'=>1,
		'arac_yerdegisim'=>1
		));
		
	}

		


		if ($insert and $guncelle) {

			header("Location:../../rezervasyonlarim.php?rez=ok");
			# code...
		}
		else{
			header("Location:../../rezervasyonlarim.php?rez=no");
		}


}

if ($_GET['rezbitir']=="ok") {

	$rez_id=$_GET['rez_id'];
	//Rezervasyon tablosunda bulunan rezarvasyon durumunun aktif degil yani bitti seklinde degistirilmesi
	$rezbitir=$db->prepare("UPDATE rez set
		rez_durum=:rez_durum
		WHERE rez_id={$rez_id}");
	
	$updaterez=$rezbitir->execute(array(
		'rez_durum'=>0
	));

	//Araclar tablosunda bulunan yer degistirme degiskenine arac kontrol edildi ve yeni lokasyona kabul edildi anlaminda olan tekrar indislenmesini saglayan 0 atamasinin yapilmasi.

	$aracguncelle=$db->prepare("UPDATE araclar set
		arac_uygunluk=:arac_uygunluk,
		arac_yerdegisim=:arac_yerdegisim
		WHERE arac_id={$_GET['arac_id']}");
	
	$updatearac=$aracguncelle->execute(array(
		'arac_uygunluk'=>0,
		'arac_yerdegisim'=>0
	));



		if ($updaterez and $updatearac) {

			header("Location:../production/rezervasyonlar.php?rez=ok");
			# code...
		}
		else{
			header("Location:../production/rezervasyonlar.php?rez=no");
		}


}

if (isset($_POST['admin-resimduzenle'])) {

		
		$adminresimsor=$db->prepare("SELECT * FROM kullanici where kullanici_id=:id");
		$adminresimsor->execute(array(
		'id'=>$_POST['kullanici_id']
		));


		$adminresimcek=$adminresimsor->fetch(PDO::FETCH_ASSOC);
		$resimsilunlink=$adminresimcek['kullanici_resim'];
		unlink("../production/$resimsilunlink");
		$uploads_dir = '../production/images';
		@$tmp_name= $_FILES['admin_resim']["tmp_name"];
		@$name= $_FILES['admin_resim']["name"];
		$benzersizsayi=rand(2000,32000);
		echo $refimgyol=substr($uploads_dir, 14)."/".$benzersizsayi.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi$name");

		$kaydet=$db->prepare("UPDATE kullanici set
		kullanici_resim=:kullanici_resim
		WHERE kullanici_id={$_POST['kullanici_id']}");
	
		$insert=$kaydet->execute(array(
		'kullanici_resim'=>$refimgyol


	));

		if ($insert) 
			{
			header("Location:../production/admin-duzenle.php?resimduzenle=ok");
			}
		else
			{
			header("Location:../production/admin-duzenle.php?resimduzenle=no");	
			}



}



?>