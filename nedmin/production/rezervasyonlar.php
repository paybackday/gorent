<?php include 'header.php';
$rezervasyonsor=$db->prepare("SELECT X.rez_id, X.rez_tarih, X.rez_alistarih, X.rez_teslimtarih, X.lokasyon_alisid, X.lokasyon_teslimid, X.rez_fiyat, X.rez_durum, L.kullanici_adsoyad, X.arac_id, Y.arac_marka, Y.arac_model from rez X, araclar Y, lokasyon Z,kullanici L  where X.arac_id=Y.arac_id and X.lokasyon_alisid=Z.lokasyon_id and X.lokasyon_teslimid=Z.lokasyon_id and X.kullanici_id=L.kullanici_id");
$rezervasyonsor->execute();
?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Rezervasyonlar <small>
                      <?php  
                      if ($_GET['rez']=="ok") {?>
                        <b><?php echo "İşlem Durumu: Rezervasyon Bitirildi";?></b> <?php
                      }
                      elseif ($_GET['rez']=="no") { ?>
                        <b style="color: red"><?php echo "İşlem Durumu: Rezervasyon tamamlanamadi. Lutfen daha sonra tekrar deneyiniz.";?></b><?php
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
                          <th>Tarih&Zaman</th>
                          <th>Alış</th>
                          <th>Teslim</th>
                          <th>Kullanıcı</th>
                          <th>Araç</th>
                          <th>Fiyat</th>
                          <th>Durum</th>
                          <th>İşlemler</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php while($rezervasyoncek=$rezervasyonsor->fetch(PDO::FETCH_ASSOC)) { ?>
                        
                        <tr>
                          <td><?php echo $rez_tarih=date("d.m.Y", strtotime($rezervasyoncek['rez_tarih'])); ?></td>
                          <td><?php echo $rez_alistarih=date("d.m.Y H:i", strtotime($rezervasyoncek['rez_alistarih']))?><br><?php $lokasyonalisadsor=$db->prepare("SELECT lokasyon_ad from lokasyon where lokasyon_id={$rezervasyoncek['lokasyon_alisid']}"); $lokasyonalisadsor->execute(); $lokasyonalisadcek=$lokasyonalisadsor->fetch(PDO::FETCH_ASSOC); echo $lokasyonalisadcek['lokasyon_ad']; ?></td>
                          <td><?php echo $rez_teslimtarih=date("d.m.Y H:i", strtotime($rezervasyoncek['rez_teslimtarih']))?><br><?php $lokasyonteslimadsor=$db->prepare("SELECT lokasyon_ad from lokasyon where lokasyon_id={$rezervasyoncek['lokasyon_teslimid']}"); $lokasyonteslimadsor->execute(); $lokasyonteslimadcek=$lokasyonteslimadsor->fetch(PDO::FETCH_ASSOC); echo $lokasyonteslimadcek['lokasyon_ad']; ?></td>
                          <td><?php echo $rezervasyoncek['kullanici_adsoyad']; ?></td>
                          <td><?php echo $rezervasyoncek['arac_marka']." ".$rezervasyoncek['arac_model']; ?></td>
                          <td><?php echo $rezervasyoncek['rez_fiyat']."₺"; ?></td>
                          <td><?php if($rezervasyoncek['rez_durum']==1){echo "Aktif";}else{echo "Aktif Degil";} ?></td>
                          <td>
                            <?php if($rezervasyoncek['rez_durum']==1){ ?>
                            <center><a href="../gorenting/islem.php?rez_id=<?php echo $rezervasyoncek['rez_id']; ?>&arac_id=<?php echo $rezervasyoncek['arac_id']; ?>&rezbitir=ok"><button class="btn btn-success btn-xs">Rezarvasyonu Bitir</button></center>
                            <?php } ?>


                          </td>
                        </tr>

                        <?php } ?>
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