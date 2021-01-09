<?php include 'header.php';
$servissor=$db->prepare("SELECT * from servisler where servis_id=:id");
  $servissor->execute(array(
      'id'=>$_GET['servis_id']
  ));

  $serviscek=$servissor->fetch(PDO::FETCH_ASSOC);


?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Sunulan Servisler</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">



            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Servisleri Kontrol Et <small>
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

<!-- Servisler Tablosu Ekleme Formu -->
                    <form action="../gorenting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Logo <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <select name="servis_logo" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                            <option value="<?php echo $serviscek['servis_logo'] ?>"><?php echo ucwords($serviscek['servis_logo']) ?></option>
                            <option value="kullanici">Kullanıcı</option>
                            <option value="lisans">Lisans</option>
                            <option value="telefon">Telefon</option>
                            <option value="roket">Roket</option>
                            <option value="elmas">Elmas</option>
                            <option value="yorum">Yorum</option>
                          </select>
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Başlık <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="servis_baslik" value="<?php echo $serviscek['servis_baslik'] ?>" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İçerik<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="servis_icerik" value="<?php echo $serviscek['servis_icerik'] ?>" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                       <input type="hidden" name="servis_id" value="<?php echo $_GET['servis_id'] ?>" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                    
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="servisayarduzenle" class="btn btn-success">Düzenle</button>
                        </div>
                      </div>

                    </form>
                    
                <!-- Servisler Tablosu Ekleme Formu Bitis -->

















                    

                    
                    </div>
                  </div>
                </div>
              
              





            </div>
          </div>
        </div>
        

       <?php include 'footer.php' ?>