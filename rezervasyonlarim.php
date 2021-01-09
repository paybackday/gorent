	<?php include 'header.php'; 
	$rezervasyonsor=$db->prepare("SELECT X.rez_tarih, X.rez_alistarih, X.rez_teslimtarih, X.lokasyon_alisid, X.lokasyon_teslimid, X.rez_fiyat, X.rez_durum, X.kullanici_id, X.arac_id, Y.arac_marka, Y.arac_model from rez X, araclar Y  where X.kullanici_id={$kullanicicek['kullanici_id']} AND X.arac_id=Y.arac_id");
	$rezervasyonsor->execute();

	
	
	
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
							<div class="col-lg-12 col-md-12" style="overflow-x:auto; ">
								<center><h3 class="mb-30">Rezervasyonlarım</h3></center>
								<?php if($_GET['rez']=="ok") { ?>
										<div class="alert alert-success">
											<strong>Rezervasyon Tamamlandı!</strong> Ödemeniz alınarak rezervasyonunuz başarılı bir şekilde gerçekleştirildi. Rezervasyonunuzdan en geç 15 dk önce alış ofisimizde olmanız gerektiğini hatırlatırız.
										</div>
										<?php } ?>

										<table class="table table-hover{col-lg-12 col-md-12}">
  											<thead>
    											<tr>
      												<th class="bg-warning" scope="col"></th>
      												<th style="color: white;" class="bg-warning" scope="col">Rezervasyon Tarihi</th>
      												<th style="color: white;" class="bg-warning" scope="col">Alış</th>
      												<th style="color: white;" class="bg-warning" scope="col">Teslim</th>
      												<th style="color: white;" class="bg-warning" scope="col">Toplam Fiyat</th>
      												<th style="color: white;" class="bg-warning" scope="col">Araç Marka</th>
      												<th style="color: white;" class="bg-warning" scope="col">Araç Model</th>
    											</tr>
  											</thead>
  											<tbody>
  											<?php $say=0; while($rezervasyoncek=$rezervasyonsor->fetch(PDO::FETCH_ASSOC)) { $say++; ?>
    											<tr>
      												<th scope="row"><?php echo $say; ?></th>
      												<td><?php echo $rez_tarih=date("d.m.Y", strtotime($rezervasyoncek['rez_tarih']));   ?></td>
      												<td><?php echo $rez_alistarih=date("d.m.Y H:i", strtotime($rezervasyoncek['rez_alistarih']));   ?><br><?php $lokasyonalisadsor=$db->prepare("SELECT lokasyon_ad from lokasyon where lokasyon_id={$rezervasyoncek['lokasyon_alisid']}"); $lokasyonalisadsor->execute(); $lokasyonalisadcek=$lokasyonalisadsor->fetch(PDO::FETCH_ASSOC); echo $lokasyonalisadcek['lokasyon_ad']; ?></td>
      												<td><?php echo $rez_teslimtarih=date("d.m.Y H:i", strtotime($rezervasyoncek['rez_teslimtarih']));   ?><br><?php $lokasyonteslimadsor=$db->prepare("SELECT lokasyon_ad from lokasyon where lokasyon_id={$rezervasyoncek['lokasyon_teslimid']}"); $lokasyonteslimadsor->execute(); $lokasyonteslimadcek=$lokasyonteslimadsor->fetch(PDO::FETCH_ASSOC); echo $lokasyonteslimadcek['lokasyon_ad']; ?></td>
      												<td><?php echo $rezervasyoncek['rez_fiyat']."₺"; ?></td>
      												<td><?php echo $rezervasyoncek['arac_marka']; ?></td>
      												<td><?php echo $rezervasyoncek['arac_model']; ?></td>
    											</tr>
   											<?php } ?>
  											</tbody>
										</table>














								
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Align Area -->

			<?php include 'footer.php' ?>