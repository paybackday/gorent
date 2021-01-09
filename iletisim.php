	<?php include 'header.php' ?>
	<head>
		<style type="text/css">
			.map-container{
overflow:hidden;
position:relative;
height:0;
margin-bottom: 50px;
}
.map-container iframe{
left:0;
top:0;
height:445px;
width:100%;
position:absolute;
}
		</style>
	</head>

			<!-- start banner Area -->
			<section class="banner-area relative" style="background-image: url(img/iletisim.png);" id="home">	
				<div class="overlay overlay-bg" ></div>
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
						<div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 445px; width: 100% ">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3017.8729068186058!2d31.143594843009033!3d40.852714085374814!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x409d9ff7756a04cd%3A0x1b09f9efba0cef74!2zS2FyYSBIYWPEsW11c2EsIFDEsW5hcmxhciBDZC4gMjctMjUsIDgxMTAwIETDvHpjZSBNZXJrZXovRMO8emNl!5e0!3m2!1str!2str!4v1589890705187!5m2!1str!2str" frameborder="0"
    style="border:0" allowfullscreen></iframe>
</div>
						<div class="col-lg-4 d-flex flex-column address-wrap">
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-home"></span>
								</div>
								<div class="contact-details">
									<h5><?php echo $ayarcek['ayar_adres'];?></h5>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-phone-handset"></span>
								</div>
								<div class="contact-details">
									<h5><?php echo $ayarcek['ayar_tel'];?></h5>
									
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-smartphone"></span>
								</div>
								<div class="contact-details">
									<h5><?php echo $ayarcek['ayar_gsm'];?></h5>
									
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-phone"></span>
								</div>
								<div class="contact-details">
									<h5><?php echo $ayarcek['ayar_faks'];?></h5>
									
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-envelope"></span>
								</div>
								<div class="contact-details">
									<h5><?php echo $ayarcek['ayar_mail'];?></h5>
								</div>
							</div>														
						</div>
						<div class="col-lg-8">
							<?php if($_GET['mesajgonder']=="ok") { ?>
										<div class="alert alert-success">
											<strong>Mesaj gönderimi başarılı!</strong>
										</div>
										<?php } ?>

							<?php if($_GET['mesajgonder']=="no") { ?>
										<div class="alert alert-danger">
											<strong>Hata!</strong> Mesajınız gönderilemedi. Lütfen daha sonra tekrar deneyiniz.
										</div>
										<?php } ?>
							<form class="form-area " action="nedmin/gorenting/islem.php" method="POST" class="contact-form text-right">
								<div class="row">	
									<div class="col-lg-6 form-group">
										<input name="adsoyad" placeholder="Adınızı soyadınızı giriniz" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Adınızı Soyadınızı Giriniz'" class="common-input mb-20 form-control" required="" type="text" value="<?php echo $kullanicicek['kullanici_adsoyad']?>">
									
										<input name="mail" placeholder="Email adresinizi giriniz" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email adresinizi giriniz'" class="common-input mb-20 form-control" required="" type="email" value="<?php echo $kullanicicek['kullanici_mail']?>">

										<input name="konu" placeholder="Konuyu giriniz" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Konuyu giriniz'" class="common-input mb-20 form-control" required="" type="text">
										<div class="mt-20 alert-msg" style="text-align: left;"></div>
									</div>
									<div class="col-lg-6 form-group">
										<textarea class="common-textarea form-control" name="mesaj" placeholder="Mesajınızı giriniz" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
										<button type="submit" name="mesajgonder" class="primary-btn mt-20 text-white" style="float: right;">Gönder</button>
																				
									</div>
								</div>
							</form>	
						</div>
					</div>
				</div>	
			</section>
			<!-- End contact-page Area -->

			<?php include 'footer.php' ?>