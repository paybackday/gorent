<?php include 'header.php';
$gelenlersor=$db->prepare("SELECT * from gelenler");
$gelenlersor->execute();

?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Gelen Kutusu <small>
                      <?php  
                      if ($_GET['gelenlersil']=="ok") {?>
                        <b><?php echo "İşlem Durumu: Mesaj Silme Başarılı";?></b> <?php
                      }
                      elseif ($_GET['gelenlersil']=="no") { ?>
                        <b style="color: red"><?php echo "İşlem Durumu: Mesaj Silme Başarısız";?></b><?php
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
                          <th>Durum</th>
                          <th>Tarih&Zaman</th>
                          <th>Ad Soyad</th>
                          <th>E-Mail</th>
                          <th>Konu</th>
                          <th>İşlemler</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php
                          while($gelenlercek=$gelenlersor->fetch(PDO::FETCH_ASSOC)) { ?>

                        <tr>

                          <td>
                            <?php 
                            if ($gelenlercek['gelenler_okundu']==0) { ?>
                              <center><i class="fa fa-envelope-square fa-2x"></i></center>
                            <?php } else {?>
                              <center><i class="fa fa-check fa-2x"></i></center>
                            <?php } ?>
                           </td>

                          <td><?php echo $gelenlercek['gelenler_zaman'] ?></td>
                          <td><?php echo $gelenlercek['gelenler_adsoyad'] ?></td>
                          <td><?php echo $gelenlercek['gelenler_mail'] ?></td>
                          <td><?php echo $gelenlercek['gelenler_konu'] ?></td>
                          <td><center><a href="gelenler-oku.php?gelenler_id=<?php echo $gelenlercek['gelenler_id']; ?>"><button class="btn btn-primary btn-xs">Mesajı Oku</button></a><a href="../gorenting/islem.php?gelenler_id=<?php echo $gelenlercek['gelenler_id']; ?>&gelenlersil=ok"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a></center></td>
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