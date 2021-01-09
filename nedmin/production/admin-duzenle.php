<?php 
include 'header.php';

$baglananadminsor=$db->prepare("SELECT * from kullanici where kullanici_id=:id");
$baglananadminsor->execute(array(
'id'=> $kullanicicek['kullanici_id']

));
$baglananadmincek=$baglananadminsor->fetch(PDO::FETCH_ASSOC);

?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Profil Resmi Değiştir<small>
                      <?php  
                      if ($_GET['resimduzenle']=="ok") {?>
                        <b><?php echo "İşlem Durumu: Profil Resmi Güncellendi";?></b> <?php
                      }
                      elseif ($_GET['resimduzenle']=="no") { ?>
                        <b style="color: red"><?php echo "İşlem Durumu: Profil Resmi Güncelleme Başarısız. Lütfen daha sonra tekrar deneyiniz.";?></b><?php
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
                    <br />
                    
                    <form action="../gorenting/islem.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">



                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Profil Resmi:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="admin_resim" value=""  class="form-control col-md-7 col-xs-12">
                          <?php
                        if(strlen($baglananadmincek['kullanici_resim'])>0) {?>
                          <center><img style="border: 3px solid gray; margin-top: 7px;" src="../production/<?php echo $baglananadmincek['kullanici_resim'];?>" width="128px" height="128px"/></center>
                          

                        <?php } else {?>

                          <center><img style="border: 3px solid gray; margin-top: 7px;" width="128px" height="128px" src="../production/img/resimyok.jpg"></center>
                        <?php } ?>
                          
                        </div>
                      </div>

                      

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ad Soyad <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="kullanici_adsoyad" value="<?php echo $baglananadmincek['kullanici_adsoyad'] ?>" id="first-name" required="required" class="form-control col-md-7 col-xs-12" disabled>
                        </div>
                      </div>
                      
                  

                 

                      

                      
                      
                      <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>">
                      
                    
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="admin-resimduzenle" class="btn btn-success">Değiştir</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
<br><br><br>


          

        


          
          </div>
        </div>
        <!-- /page content -->

        <?php include 'footer.php' ?>