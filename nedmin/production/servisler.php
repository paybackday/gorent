<?php include 'header.php' ?>

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
                    <h2>Servisleri Kontrol Et <small><?php  
                      if ($_GET['sildurum']=="ok") {?>
                        <b><?php echo "İşlem Durumu: Silme Başarılı";?></b> <?php
                      }
                      elseif ($_GET['sildurum']=="no") { ?>
                        <b style="color: red"><?php echo "İşlem Durumu: Silme Başarısız";?></b><?php
                      }
                      else{
                        echo " ";
                      }

                      if ($_GET['ekledurum']=="ok") {?>
                        <b><?php echo "İşlem Durumu: Ekleme Başarılı";?></b> <?php
                      }
                      elseif ($_GET['ekledurum']=="no") { ?>
                        <b style="color: red"><?php echo "İşlem Durumu: Ekleme Başarısız";?></b><?php
                      }
                      else{
                        echo " ";
                      }

                      if ($_GET['duzenledurum']=="ok") {?>
                        <b><?php echo "İşlem Durumu: Düzenleme Başarılı";?></b> <?php
                      }
                      elseif ($_GET['duzenledurum']=="no") { ?>
                        <b style="color: red"><?php echo "İşlem Durumu: Düzenleme Başarısız";?></b><?php
                      }
                      else{
                        echo " ";
                      }

                      if ($_GET['tablosil']=="ok") {?>
                        <b><?php echo "İşlem Durumu: Tüm Kayıtlar Silinmiştir";?></b> <?php
                      }
                      elseif ($_GET['tablosil']=="no") { ?>
                        <b style="color: red"><?php echo "İşlem Durumu: Tüm Kayıtlar Silinirken Hata Meydana Geldi.";?></b><?php
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

<!-- Servisler Tablosu Ekleme Formu -->
                    <form action="../gorenting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Logo <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <select name="servis_logo" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                            <option value="">Lütfen Seçiniz</option>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Baslik <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="servis_baslik" value="" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Icerik<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="servis_icerik" value="" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                    
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="servisayarekle" class="btn btn-success">Ekle</button>
                        </div>
                      </div>

                    </form>
                    
                <!-- Servisler Tablosu Ekleme Formu Bitis -->

















                    <!-- Tablo İçeriği Başlangıcı-->

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        
                        <thead>
                          <tr class="headings">
                            
                            <th class="column-title">Servis Logo </th>
                            <th class="column-title">Servis Başlık </th>
                            <th class="column-title">Servis İçerik </th>
                            <th class="column-title no-link last"><span class="nobr">İşlemler</span></th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <?php
                        $servissor=$db->prepare("SELECT * from servisler");
                        $servissor->execute();

                        while ($serviscek=$servissor->fetch(PDO::FETCH_ASSOC)) {
                        ?>

                        <tbody>
                          <tr class="even pointer">
                            
                            <td class=" "><?php echo $serviscek['servis_logo'] ?></td>
                            <td class=" "><?php echo $serviscek['servis_baslik'] ?></td>
                            <td class=" "><?php echo $serviscek['servis_icerik'] ?></i></td>
                            <td class=" last"><a href="../gorenting/islem.php?servis_id=<?php echo $serviscek['servis_id'];?>&servissil=ok">SİL |</a> <a href="servisduzenle.php?servis_id=<?php echo $serviscek['servis_id'];?>"> DÜZENLE</a>
                            </td>
                          </tr>
                        </tbody>
                      <?php } ?>
                      <form action="../gorenting/islem.php" method="POST">
                      <tr><input type="submit" name="tablosil" value="Tüm Kayıtları Sil" class="btn-success"></tr>
                      </form>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              





            </div>
          </div>
        </div>
        <!-- /page content -->

       <?php include 'footer.php' ?>