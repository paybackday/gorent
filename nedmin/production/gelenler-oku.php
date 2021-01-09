<?php include 'header.php' ;
$gelenlersor=$db->prepare("SELECT * from gelenler where gelenler_id=:id");
$gelenlersor->execute(array(
'id'=> $_GET['gelenler_id']

));
$gelenlercek=$gelenlersor->fetch(PDO::FETCH_ASSOC);

$okunduguncelle=$db->prepare("UPDATE gelenler SET 
    gelenler_okundu=:gelenler_okundu
    WHERE gelenler_id={$_GET['gelenler_id']}");
  $update=$okunduguncelle->execute(array(
    'gelenler_okundu'=> 1
));
?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>"<?php echo $gelenlercek['gelenler_mail'] ?>" kullanıcısından gelen mesajı okuyorsunuz. <small>
                      <?php  
                      if ($_GET['durum']=="ok") {?>
                        <b><?php echo "İşlem Durumu: Güncelleme Başarılı";?></b> <?php
                      }
                      elseif ($_GET['durum']=="no") { ?>
                        <b style="color: red"><?php echo "İşlem Durumu: Güncelleme Başarısız";?></b><?php
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
                    
                    <form action="../gorenting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Gelen Zaman: <span class="required"></span>
                        </label>
                        <label style="color: black;" class="col-md-6 col-sm-6 col-xs-12" for="zaman"><?php echo $gelenlercek['gelenler_zaman'] ?> <span class="required"></span>
                        </label>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ad Soyad: <span class="required"></span>
                        </label>
                        <label style="color: black;" class="col-md-6 col-sm-6 col-xs-12" for="adsoyad"><?php echo $gelenlercek['gelenler_adsoyad'] ?> <span class="required"></span>
                        </label>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">E-Mail: <span class="required"></span>
                        </label>
                        <label style="color: black;" class="col-md-6 col-sm-6 col-xs-12" for="eposta"><?php echo $gelenlercek['gelenler_mail'] ?> <span class="required"></span>
                        </label>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Mesajın Konusu: <span class="required"></span>
                        </label>
                        <label style="color: black;" class="col-md-6 col-sm-6 col-xs-12" for="mesajkonu"><?php echo $gelenlercek['gelenler_konu'] ?> <span class="required"></span>
                        </label>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Mesajın İçeriği: <span class="required"></span>
                        </label>
                        <label style="color: black;" class="col-md-6 col-sm-6 col-xs-12" for="mesajicerik"><?php echo $gelenlercek['gelenler_mesaj'] ?> <span class="required"></span>
                        </label>
                      </div>

                      <input type="hidden" name="mesaj_id" value="<?php $mesajid; ?>">
                      
                      
                    
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          
                        </div>
                      </div>

                    </form>
                    <a href="../gorenting/islem.php?gelenler_id=<?php echo $_GET['gelenler_id']; ?>&gelenlersil=ok"><button class="btn btn-danger"><i class="fa fa-trash fa-2x"></i></button></a>
                        <button class="btn btn-default" onclick="history.back(-1)"><i style="color:#FFC107;" class="fa fa-arrow-left fa-2x"></i></button>
                        
                  </div>
                </div>
              </div>
            </div>
<br><br><br>


          

        


          
          </div>
        </div>
        <!-- /page content -->

        <?php include 'footer.php' ?>