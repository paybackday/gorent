<?php include 'header.php';
$aracsor=$db->prepare("SELECT araclar.arac_id,araclar.arac_resim,araclar.arac_marka,araclar.arac_model,araclar.arac_modelyil,araclar.arac_yakit,araclar.arac_vites,araclar.arac_km,araclar.arac_plaka,araclar.arac_sinif,araclar.arac_fiyat,araclar.arac_kapasite,lokasyon.lokasyon_ad,araclar.arac_aciklama,araclar.arac_uygunluk FROM araclar, lokasyon WHERE araclar.arac_id = lokasyon.lokasyon_id");
$aracsor->execute();


?>
<head>
  <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
</head>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Araç İşlemleri <small>
                      <?php  
                      if ($_GET['aracsilme']=="ok") {?>
                        <b><?php echo "İşlem Durumu: Silme Başarılı";?></b> <?php
                      }
                      ?>
                      <?php 
                      if ($_GET['aracsilme']=="no") { ?>
                        <b style="color: red"><?php echo "İşlem Durumu: Silme Başarısız";?></b><?php
                      }
                      ?>
                      <?php  
                      if ($_GET['duzenledurum']=="ok") {?>
                        <b><?php echo "İşlem Durumu: Düzenleme Başarılı";?></b> <?php
                      }
                      ?>
                      <?php  
                      if ($_GET['duzenledurum']=="no") {?>
                        <b><?php echo "İşlem Durumu: Düzenleme Başarısız";?></b> <?php
                      }
                      ?>
                    </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   
                  <!-- Div İçerik Başlangıcı-->
                    
                  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Arac Numara</th>
                          <th>Görsel</th>
                          <th>Marka</th>
                          <th>Model</th>
                          <th>Yıl</th>
                          <th>Yakıt</th>
                          <th>Vites</th>
                          <th>Kilometre</th>
                          <th>Plaka</th>
                          <th>Sınıf</th>
                          <th>Fiyat</th>
                          <th>Kapasite</th>
                          <th>Lokasyon</th>
                          <th>Açıklama:</th>
                          <th>Uygunluk Durumu:</th>
                          <th>İşlemler</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php
                        $say=0;
                          while ($araccek=$aracsor->fetch(PDO::FETCH_ASSOC)) {
                            # code...
                          ?>
                            
                            <tr>
                          <td><?php $say++; echo $say; ?></td>
                          <td><img src="../../<?php echo $araccek['arac_resim'] ?>" width="70px" height="50px"></td>
                          <td><?php echo $araccek['arac_marka'];?></td>
                          <td><?php echo $araccek['arac_model'];?></td>
                          <td><?php echo $araccek['arac_modelyil'];?></td>
                          <td><?php echo $araccek['arac_yakit'];?></td>
                          <td><?php echo $araccek['arac_vites'];?></td>
                          <td><?php echo $araccek['arac_km'];?></td>
                          <td><?php echo $araccek['arac_plaka'];?></td>
                          <td><?php echo $araccek['arac_sinif'];?></td>
                          <td><?php echo $araccek['arac_fiyat'];?></td>
                          <td><?php echo $araccek['arac_kapasite'];?></td>
                          <td><?php echo $araccek['lokasyon_ad'];?></td>
                          <td><?php echo $araccek['arac_aciklama'];?></td>
                          <td><?php echo $araccek['arac_uygunluk'];?></td>
                          <td><center><a href="arac-duzenle.php?arac_id=<?php echo $araccek['arac_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a><a href="../gorenting/islem.php?arac_id=<?php echo $araccek['arac_id']; ?>&aracsil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
                        </tr>





                        <?php  }
                        ?>
                        
                      </tbody>
                    </table>







                  <!-- Div İçerik Bitişi-->

                  </div>
                </div>
              </div>
            </div>
<br><br><br>


          

        


          
          </div>
        </div>
        <!-- /page content -->

        <?php include 'footer.php' ?>