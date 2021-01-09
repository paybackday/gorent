<?php
ob_start();
session_start();
include '../gorenting/baglan.php';
$ayarsor=$db->prepare("SELECT * from ayar where ayar_id=:id");
$ayarsor->execute(array(
'id'=>0

));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);


$kullanicisor=$db->prepare("SELECT * from kullanici where kullanici_mail=:mail");
$kullanicisor->execute(array(
'mail'=> $_SESSION['kullanici_mail']

));
$say=$kullanicisor->rowCount();
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

if ($say==0) {
  header("Location:login.php?durum=izinsiz");
  exit;
  # code...
}
/* 1.Yontem
if (!isset($_SESSION['kullanici_mail'])) {
  # code...
}
*/

  $sorgula = $db->prepare("SELECT count(*) FROM gelenler where gelenler_okundu=:okundusay");
  $sorgula->execute(array(
  'okundusay'=>0
  ));
  $mesajokundusayisi = $sorgula->fetchColumn();

  $okunmayansor = $db->prepare("SELECT * FROM gelenler where gelenler_okundu=:okundusay");
  $okunmayansor->execute(array(
  'okundusay'=>0
  ));
  

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GORent | Yönetim Paneli</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><img src="../../img/panelogo.png"></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo $kullanicicek['kullanici_resim']; ?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Hoşgeldin,</span>
                <h2><?php echo $kullanicicek['kullanici_adsoyad']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Genel Gorunum</h3>
                <ul class="nav side-menu">
                <li><a href="index.php"><i class="fa fa-home"></i>Anasayfa</a></li>
                <li><a><i class="fa fa-cogs"></i>Site Ayarları <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="genel-ayar.php">Genel Ayarlar</a></li>
                      <li><a href="iletisim-ayar.php">İletişim Ayarları</a></li>
                      <li><a href="api-ayar.php">APİ Ayarları</a></li>
                      <li><a href="sosyal-ayar.php">Sosyal Medya Ayarları</a></li>
                      <li><a href="mail-ayar.php">Mail Ayarları</a></li>
                    </ul>
                  </li>
                <li><a><i class="fa fa-info-circle"></i>Hakkımızda<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="hakkimizda.php">Hakkımızda Ayarlar</a></li>
                      <li><a href="servisler.php">Servisler</a></li>
                    </ul>
                </li>
                <li><a href="gelenmesajlar.php"><i class="fa fa-envelope"></i> Mesajlar</a></li>
                <li><a href="kullanici.php"><i class="fa fa-user"></i>Kullanıcılar</a></li>
                <li><a><i class="fa fa-car"></i>Araç Ayarlar<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="arac-ekle.php">Araç Ekle</a></li>
                      <li><a href="araclar.php">Araçlar</a></li>
                    </ul>
                </li>
                <li><a href="rezervasyonlar.php"><i class="fa fa-history"></i>Rezervasyon</a></li>
                </ul>
              </div>


            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a href="logout.php" data-toggle="tooltip" data-placement="top" title="Güvenli Çıkış">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo $kullanicicek['kullanici_resim']; ?>" alt=""><?php echo $kullanicicek['kullanici_adsoyad']; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="admin-duzenle.php"> Profil Resmi Güncelle</a></li>
                    
                    
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i>Güvenli Çıkış</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green"><?php echo $mesajokundusayisi; ?></span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">

                    <?php 
                    $x=1;
                    while ( $x<= 4 and $okunmayancek=$okunmayansor->fetch(PDO::FETCH_ASSOC)) { ?>
                    <li>
                      <a>
                        <!-- Kullanicilarin mesajina profil resmi ekleme 
                        <span class="image"><img src="images/img.jpg" alt="Kullanici Profil Resmi" /></span>
                        -->
                        <span>
                          <span><?php echo $okunmayancek['gelenler_adsoyad']; ?></span>
                          <span class="time"><?php $date=strtotime( $okunmayancek['gelenler_zaman'] ); $mysqldate = date( 'd/m/Y H:i', $date ); echo $mysqldate; ?></span>
                        </span>
                        <span class="message">
                          <?php $yazi = $okunmayancek['gelenler_mesaj']; echo substr($yazi, 0,70)."..."; ?>
                        </span>
                      </a>
                    </li>
                    
                    <?php $x++; } ?>
                
                    <li>
                      <div class="text-center">
                        <a href="gelenmesajlar.php">
                          <strong>Tüm Mesajları Görüntüle</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>

                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->