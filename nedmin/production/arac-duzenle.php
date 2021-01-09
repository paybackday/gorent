<?php include 'header.php';
$aracsor=$db->prepare("SELECT * FROM araclar where arac_id=:id");
    $aracsor->execute(array(
    'id'=>$_GET['arac_id']
    ));
$araccek=$aracsor->fetch(PDO::FETCH_ASSOC);
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
                    <h2>Araç Düzenle<small>
                      <?php  
                      if ($_GET['duzenledurum']=="ok") {?>
                        <b><?php echo "İşlem Durumu: Araç düzenleme işlemi başarılı";?></b> <?php
                      }
                      elseif ($_GET['duzenledurum']=="no") { ?>
                        <b style="color: red"><?php echo "İşlem Durumu: Araç düzenleme işlemi başarısız";?></b><?php
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
                    
                    <form action="../gorenting/islem.php" method="POST" id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Araç Resim:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="arac_resim" value=""  class="form-control col-md-7 col-xs-12">
                          <?php
                        if(strlen($araccek['arac_resim'])>0) {?>
                          <center><img style="border: 3px solid gray; margin-top: 7px;" src="../../<?php echo $araccek['arac_resim'];?>" width="300px" height="206px"/></center>
                          

                        <?php } else {?>

                          <center><img style="border: 3px solid gray; margin-top: 7px;" width="300px" height="200px" src="../../img/resimyok.jpg"></center>
                        <?php } ?>
                          
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Marka: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="arac_marka" value="<?php echo $araccek['arac_marka'] ?>" placeholder="Aracın markasını giriniz" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Model: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="arac_model" value="<?php echo $araccek['arac_model'] ?>" placeholder="Aracın modelini giriniz" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Model Yılı: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" maxlength="4" value="<?php echo $araccek['arac_modelyil'] ?>" name="arac_modelyil" placeholder="Aracın model yılını giriniz" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yakıt Türü: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <select name="arac_yakit" required="required" class="form-control col-md-7 col-xs-12">
                            <option value="<?php echo $araccek['arac_yakit'] ?>"><?php echo $araccek['arac_yakit'] ?></option>
                            <option value="Benzin">Benzin</option>
                            <option value="Dizel">Dizel</option>
                            <option value="Benzin/LPG">Benzin/LPG</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Vites: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <select name="arac_vites" required="required" class="form-control col-md-7 col-xs-12">
                            <option value="<?php echo $araccek['arac_vites'] ?>"><?php echo $araccek['arac_vites'] ?></option>
                            <option value="Otomatik">Otomatik</option>
                            <option value="Manuel">Manuel</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kilometre: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" maxlength="7" value="<?php echo $araccek['arac_km'] ?>" name="arac_km" placeholder="Aracın kilometresini giriniz" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Plaka: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="arac_plaka" value="<?php echo $araccek['arac_plaka'] ?>" placeholder="Aracın plakasını giriniz" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sınıf: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  name="arac_sinif" value="<?php echo $araccek['arac_sinif'] ?>" placeholder="Aracın sınıfını giriniz (Ekonomik, Lüks vb.)" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fiyat: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  name="arac_fiyat" value="<?php echo $araccek['arac_fiyat'] ?>" placeholder="Aracın fiyatını giriniz" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kapasite: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" value="<?php echo $araccek['arac_kapasite'] ?>"  name="arac_kapasite" placeholder="Araç kapasitesini giriniz. ('4','5' Kişilik vb.)" id="first-name" required="required" maxlength="2" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Lokasyon: <span class="required">*</span><br><a onclick="window.open('acilirpencere.php','','toolbar=no,scrollbars=no,resizable=no,width=250,height=200');"><br>Lokasyon Kodları İçin Tıklayınız</a> 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <select name="lokasyon_id" required="required" class="form-control col-md-7 col-xs-12">
                            <option value="<?php echo $araccek['lokasyon_id'] ?>"><?php echo $araccek['lokasyon_id']; ?></option>
                            <?php
                            // lokasyon tablosunun satir sayisini say ve for dongusune sok.
                            $sorgu = $db->prepare("SELECT COUNT(*) FROM lokasyon");
                            $sorgu->execute();
                            $say = $sorgu->fetchColumn();
                            for ($i=1; $i <=$say ; $i++) {?>
                              <option value="<?php echo $i ?>"><?php echo $i ?></option>

                            <?php } ?>
                          </select>
                        </div>
                      </div>

                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Açıklama:<span class="required">*</span> 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="ckeditor" id="editor1" name="arac_aciklama"><?php echo $araccek['arac_aciklama'] ?></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Araç Uygunluk Durumu: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <select name="arac_uygunluk" required="required" class="form-control col-md-7 col-xs-12">
                            <option value="<?php echo $araccek['arac_uygunluk'] ?>"><?php echo $araccek['arac_uygunluk'] ?></option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                          </select>
                        </div>
                      </div>
                      
                      <input type="hidden" name="arac_id" value="<?php echo $araccek['arac_id'] ?>">
                      

                      
                      
                    
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="aracduzenle" class="btn btn-success">Düzenle</button>
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