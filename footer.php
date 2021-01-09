<!-- start footer Area -->		
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>Kisayol Linkler</h6>
								<ul>
									<li><a href="index.php">Anasayfa</a></li>
									<li><a href="hakkimizda.php">Hakkimizda</a></li>
									<li><a href="araclar.php">Araclar</a></li>
									<li><a href="iletisim.php">Bize Ulasin</a></li>
								</ul>								
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>İletişim</h6>
								<ul>
									<li><p><i class="fa fa-phone"></i><?php echo "&nbsp&nbsp".$ayarcek['ayar_tel'];?></p></li>
									<li><p><i class="fa fa-mobile"></i><?php echo "&nbsp&nbsp&nbsp&nbsp".$ayarcek['ayar_gsm'];?></p></li>
									<li><p><i class="fa fa-fax"></i><?php echo "&nbsp&nbsp".$ayarcek['ayar_faks'];?></p></li>
									<li><p><i class="fa fa-map-marker"></i><?php echo "&nbsp&nbsp&nbsp&nbsp". $ayarcek['ayar_adres'];?></p></li>
									
								</ul>								
							</div>
						</div>
																
						<div class="col-lg-3 col-md-6 col-sm-6 social-widget">
							<div class="single-footer-widget">
								<h6>Takip Et</h6>
								<p>Sosyal Medya</p>
								<div class="footer-social d-flex align-items-center">
									<a href="<?php echo $ayarcek['ayar_facebook'];  ?>" target="_blank"><i class="fa fa-facebook"></i></a>
									<a href="<?php echo $ayarcek['ayar_twitter'];  ?>" target="_blank"><i class="fa fa-twitter"></i></a>
									<a href="<?php echo $ayarcek['ayar_instagram'];  ?>" target="_blank"><i class="fa fa-instagram"></i></a>
									<a href="<?php echo $ayarcek['ayar_youtube'];  ?>" target="_blank"><i class="fa fa-youtube"></i></a>
								</div>
							</div>
						</div>

						<div class="col-lg-3  col-md-6 col-sm-6 ">
							<div class="single-footer-widget ">
								<h6>Haber Kaynağı</h6>
								<p>Güncel kampanyalar </p>
								<div class="" id="">
									<form novalidate="true" action="" method="get" class="form-inline">
										<input class="form-control" name="email" placeholder="Mail adresinizi girin " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mail adresinizi girin '" required="" type="email">
			                            	<button class="click-btn btn btn-default"><span class="lnr lnr-arrow-right"></span></button>
			                            	

										<div class="info">
											<?php
										if(isset($_GET['email'])){	 
											$kaydet=$db->prepare("INSERT into promo set 

											promo_email=:promo_email
											");
	
											$insert=$kaydet->execute(array(

											'promo_email'=>$_GET['email']

											));
											if ($insert) {
												echo "Emailiniz kaydedildi.";
											}else if(!isset($_GET['email']) and $insert)
												echo "Lütfen daha sonra tekrar deneyiniz.";
											
										}
											?>
										


										</div>
									</form>
								</div>
							</div>
						</div>	
						
						

					</div>
				</div>
			</footer>	
			<!-- End footer Area -->		

			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>			
  			<script src="js/easing.min.js"></script>			
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>	
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>	
			<script src="js/owl.carousel.min.js"></script>			
			<script src="js/jquery.sticky.js"></script>
			<script src="js/jquery.nice-select.min.js"></script>	
			<script src="js/waypoints.min.js"></script>
			<script src="js/jquery.counterup.min.js"></script>					
			<script src="js/parallax.min.js"></script>		
			<script src="js/mail-script.js"></script>	
			<script src="js/main.js"></script>	
		</body>
	</html>



