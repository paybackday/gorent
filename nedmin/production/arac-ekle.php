<?php include 'header.php';
$aracsor=$db->prepare("SELECT * from araclar");
$aracsor->execute(array());
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
                    <h2>Araç Ekle<small>
                      <?php  
                      if ($_GET['ekledurum']=="ok") {?>
                        <b><?php echo "İşlem Durumu: Araç ekleme başarılı";?></b> <?php
                      }
                      elseif ($_GET['ekledurum']=="no") { ?>
                        <b style="color: red"><?php echo "İşlem Durumu: Araç ekleme başarısız";?></b><?php
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
                        if(isset($_GET['resimyol'])) {?>
                          <center><img style="border: 3px solid gray; margin-top: 7px;" src="../../<?php echo $_GET['resimyol'];?>" width="300px" height="206px"/></center>
                          

                        <?php } else {?>

                          <center><img style="border: 3px solid gray; margin-top: 7px;" width="300px" height="200px" src="../../img/resimyok.jpg"></center>
                        <?php } ?>
                          
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Marka: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="arac_marka" placeholder="Aracın markasını giriniz" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Model: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="arac_model" placeholder="Aracın modelini giriniz" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Model Yılı: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" maxlength="4" name="arac_modelyil" placeholder="Aracın model yılını giriniz" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yakıt Türü: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <select name="arac_yakit" required="required" class="form-control col-md-7 col-xs-12">
                            <option>Yakit tipini seçiniz</option>
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
                            <option>Vites türünü seçiniz</option>
                            <option value="Otomatik">Otomatik</option>
                            <option value="Manuel">Manuel</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kilometre: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" maxlength="7" name="arac_km" placeholder="Aracın kilometresini giriniz" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Plaka: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="arac_plaka" placeholder="Aracın plakasını giriniz" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sınıf: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  name="arac_sinif" placeholder="Aracın sınıfını giriniz (Ekonomik, Lüks vb.)" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fiyat: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  name="arac_fiyat" value="" placeholder="Aracın fiyatını giriniz" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kapasite: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  name="arac_kapasite" placeholder="Araç kapasitesini giriniz. ('4','5' Kişilik vb.)" id="first-name" required="required" maxlength="2" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Lokasyon: <span class="required">*</span><br><a onclick="window.open('acilirpencere.php','','toolbar=no,scrollbars=no,resizable=no,width=250,height=200');"><br>Lokasyon Kodları İçin Tıklayınız</a> 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <select name="lokasyon_id" required="required" class="form-control col-md-7 col-xs-12">
                            <option>Araç lokasyonunu giriniz.</option>
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
                          <textarea class="ckeditor" id="editor1" name="arac_aciklama"></textarea>
                        </div>
                      </div>

                      
                      
                      

                      
                      
                    
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="aracekle" class="btn btn-success">Araç Ekle</button>
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