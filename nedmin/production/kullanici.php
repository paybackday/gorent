<?php include 'header.php';
$kullanicisor=$db->prepare("SELECT * from kullanici");
$kullanicisor->execute();

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
                    <h2>Kullanıcı Ayarları <small>
                      <?php  
                      if ($_GET['kullanicisil']=="ok") {?>
                        <b><?php echo "İşlem Durumu: Silme Başarılı";?></b> <?php
                      }
                      elseif ($_GET['kullanicisil']=="no") { ?>
                        <b style="color: red"><?php echo "İşlem Durumu: Silme Başarısız";?></b><?php
                      }
                      else{
                        echo " ";
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
                          <th>Kayıt Tarihi</th>
                          <th>Ad Soyad</th>
                          <th>E-Mail</th>
                          <th>GSM</th>
                          <th>İl</th>
                          <th>İlçe</th>
                          <th>Adres</th>
                          <th>TC Kimlik</th>
                          <th>Doğum Tarihi</th>
                          <th>Ehliyet Tarihi</th>
                          <th>İşlemler</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php
                          while($kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC)) { ?>

                            <tr>
                          <td><?php echo $kullanicicek['kullanici_zaman'] ?></td>
                          <td><?php echo $kullanicicek['kullanici_adsoyad'] ?></td>
                          <td><?php echo $kullanicicek['kullanici_mail'] ?></td>
                          <td><?php echo $kullanicicek['kullanici_gsm'] ?></td>
                          <td><?php echo $kullanicicek['kullanici_il'] ?></td>
                          <td><?php echo $kullanicicek['kullanici_ilce'] ?></td>
                          <td><?php echo $kullanicicek['kullanici_adres'] ?></td>
                          <td><?php echo $kullanicicek['kullanici_tc'] ?></td>
                          <td><?php echo $kullanicicek['kullanici_dogum'] ?></td>
                          <td><?php echo $kullanicicek['kullanici_ehliyet'] ?></td>
                          <td><center><a href="kullanici-duzenle.php?kullanici_id=<?php echo $kullanicicek['kullanici_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a><a href="../gorenting/islem.php?kullanici_id=<?php echo $kullanicicek['kullanici_id']; ?>&kullanicisil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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