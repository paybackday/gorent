<?php 
include 'header.php';
$lokasyonsoralis=$db->prepare("SELECT * from lokasyon");
$lokasyonsoralis->execute();

$lokasyonsorteslim=$db->prepare("SELECT * from lokasyon");
$lokasyonsorteslim->execute();
?>


			<!-- start banner Area -->
			<section class="banner-area relative" style="background-image:url(img/anasayfa-header.jpg)" id="home">
				<div class="overlay overlay-bg"></div>	
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-center">
						<div class="banner-content col-lg-7 col-md-6 ">
							<h6 class="text-white ">GORent Araç Kİralama</h6>
							<h1 class="text-white">
								Güvenli ve Konforlu Seyahat İçin...				
							</h1>
							<p class="pt-20 pb-20 text-white">
								Kiralama sonrasında dezenfekte edilen, bakımlı araçlarımızla müşterilerimizin memnuniyeti her zaman önceliklidir.
							</p>
							
						</div>
						<div class="col-lg-5  col-md-6 header-right">
							<h4 class="text-white pb-30">Aracını Hemen Kirala!</h4>
							<form class="form" method="POST" action="arac-secim.php" role="form" autocomplete="off">
							    <!--
							    <div class="form-group">
							       	<div class="default-select" id="default-select"">
										<select>
											<option value="" disabled selected hidden>Select Your Car</option>
											<option value="1">BMW</option>
											<option value="1">Farrari</option>
											<option value="1">Toyota</option>
										</select>
									</div>
							    </div>
							-->
							    <div class="form-group row">
							        <div class="col-md-12">
								       	<div class="default-select" id="default-select">
											<select name="lokasyon_alis">
												<?php while($lokasyoncek=$lokasyonsoralis->fetch(PDO::FETCH_ASSOC)) { ?>
												<option value="<?php echo $lokasyoncek['lokasyon_id']; ?>"><?php echo $lokasyoncek['lokasyon_ad']; ?></option>

											<?php } ?>
											</select>
										</div>
							        </div>

							        <div style="margin-top: 10px" class="col-md-12">
								       	<div class="default-select" id="default-select">
											<select name="lokasyon_teslim">
												<?php while($lokasyoncekteslim=$lokasyonsorteslim->fetch(PDO::FETCH_ASSOC)) { ?>
													<option value="<?php echo $lokasyoncekteslim['lokasyon_id'] ?>"><?php echo $lokasyoncekteslim['lokasyon_ad'] ?></option>
												<?php } ?>
											</select>
										</div>
							        </div>
							    </div>

							    <div class="form-group row">
							        <div class="col-md-6 wrap-left">
										<div style="margin-top: 10px;" class="input-group dates-wrap">                                          
											<input class="dates form-control" placeholder="Alış Tarih" name="alis_tarih" type="date">                   <div class="input-group-prepend">
												<span  class="input-group-text"><span class="lnr lnr-calendar-full"></span></span>
											</div>											
										</div>
							        </div>
							    
							    
							        
							        <div class="col-md-3">
								       	<div style="margin-top: 10px;" class="default-select" id="default-select">
											<select name="alis_saat">
												<option value="9">09</option>
												<?php for ($i=0; $i <=23 ; $i++) { ?>
													<option value="<?php echo $i; ?>"><?php if($i==0 || $i==1 || $i==2 || $i==3 || $i==4 || $i==5 || $i==6 || $i==7 || $i==8 || $i==9){ echo 0;} ?><?php echo $i; ?></option>
												<?php } ?>
											</select>
										</div>
							        </div>
							        <div class="col-md-3">
								       	<div style="margin-top: 10px;" class="default-select" id="default-select">
											<select name="alis_dakika">
												
												<?php for ($i=0; $i <60 ; $i+=10) { ?>
													<option value="<?php echo $i; ?>"><?php if($i==0){echo 0;} ?><?php echo $i; ?></option>
												<?php } ?>
											</select>
										</div>
							        </div>

							    </div>

							    <div class="form-group row">
							        <div class="col-md-6 wrap-left">
										<div style="margin-top: 10px;" class="input-group dates-wrap">                                          
											<input class="dates form-control" placeholder="Teslim Tarih" name="teslim_tarih" type="date">                        
											<div class="input-group-prepend">
												<span  class="input-group-text"><span class="lnr lnr-calendar-full"></span></span>
											</div>											
										</div>
							        </div>
							    
							    
							        
							        <div class="col-md-3">
								       	<div style="margin-top: 10px;" class="default-select" id="default-select">
											<select name="teslim_saat">
												<option value="9">09</option>
												<?php for ($i=0; $i <=23 ; $i++) { ?>
													<option value="<?php echo $i; ?>"><?php if($i==0 || $i==1 || $i==2 || $i==3 || $i==4 || $i==5 || $i==6 || $i==7 || $i==8 || $i==9){ echo 0;} ?><?php echo $i; ?></option>
												<?php } ?>
											</select>
										</div>
							        </div>
							        <div class="col-md-3">
								       	<div style="margin-top: 10px;" class="default-select" id="default-select">
											<select name="teslim_dakika">
												
												<?php for ($i=0; $i <60 ; $i+=10) { ?>
													<option value="<?php echo $i; ?>"><?php if($i==0){echo 0;} ?><?php echo $i; ?></option>
												<?php } ?>
											</select>
										</div>
							        </div>

							    </div>
							    <div class="form-group row">
							        <div class="col-md-12">
							            <button type="submit" class="btn btn-default btn-lg btn-block text-center text-uppercase">Ara</button>
							        </div>
							    </div>
							</form>
						</div>											
					</div>
				</div>					
			</section>
			<!-- End banner Area -->	

			<!-- Start feature Area -->
			<section class="feature-area section-gap" id="service">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="col-md-8 pb-40 header-text">
							<h1>Başlıca Sunduğumuz Hizmetler</h1>
							
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

			<!-- Start home-about Area -->
			<section class="home-about-area" id="about">
				<div class="container-fluid">				
					<div class="row justify-content-center align-items-center">
						<div class="col-lg-6 no-padding home-about-left">
							<img class="img-fluid" src="img/anasayfa-info.jpg" alt="">
						</div>
						<div class="col-lg-6 no-padding home-about-right">
							<h1>Yaygın Ağımız ile <br>
							Her Yerdeyiz!</h1>
							<p>
								<span>Türkiye'nin Dört Bir Yanında Hizmet Veriyoruz</span>
							</p>
							<p>
								Türkiye'nin birçok ilinde şubemiz bulunduğundan dolayı artık araba kiralamak çok kolay. Hedefimiz daha çok ilde hizmet verebilmek ve siz müşterilerimizi memnun bırakabilmektir.
							</p>
							<a class="text-uppercase primary-btn" href="hakkimizda.php">Hakkımızda</a>
						</div>
					</div>
				</div>	
			</section>
			<!-- End home-about Area -->	

			


			

			
			

			

			<br><br>

			<?php include 'footer.php'?>