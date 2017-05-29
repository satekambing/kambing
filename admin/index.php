<?php
require_once("../config/fungsi_adminview.php");
require_once("../config/config.php");
require_once("../config/koneksi.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Halaman - Admin</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../resources/css/font-awesome.min.css">

  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/skin-modifku.min.css">

  <!-- Plugins -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="plugins/select2-master/dist/css/select2modiv.min.css">
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="jquery.dataTables.min.css">

  <link rel="stylesheet" href="../resources/css/styleku.css">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>V1</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu">
        <li class="header">Menu</li>
        <li><a href="#"><i class="fa fa-dashboard text-red"></i> <span>Dashboard</span></a></li>

        <li class="header">Halaman Depan</li>
        <li class="berita"><a href="?p=berita"><i class="fa fa-newspaper-o text-faded"></i> <span>Berita</span></a></li>
        <li class="profil"><a href="?p=profil"><i class="fa fa-address-book text-faded"></i> <span>Profil</span></a></li>
        <li class="galery"><a href="?p=galery"><i class="fa fa-file-photo-o text-faded"></i> <span>Galery</span></a></li>
        <li class="agenda"><a href="?p=agenda"><i class="fa fa-calendar-check-o text-faded"></i> <span>Agenda</span></a></li>

        <li class="kepegawaian header">Kepegawaian</li>
        <li class="biodata"><a href="?p=biodata"><i class="fa fa-user text-faded"></i> <span>Biodata</span><span class="pull-right-container"><small class="label pull-right bg-red">Belum Lengkap</small></span></a></li>
        <li class="kepangkatan"> <a href="?p=kepangkatan"><i class="fa fa-file text-faded"></i> <span>Kenaikan Pangkat</span></a></li>
        <li class="cuti"><a href="?p=cuti"><i class="fa fa-calendar text-faded"></i> <span>Cuti</span></a></li>
        <li class="gaji"><a href="?p=gaji"><i class="fa fa-home text-faded"></i> <span>Kenaikan Gaji</span></a></li>
        <li class="diklat"><a href="?p=diklat"><i class="fa fa-book text-faded"></i> <span>Diklat </span></a></li>
        <li class="pensiun"><a href="?p=pensiun"><i class="fa fa-circle-o text-faded"></i> <span>Pensiun</span></a></li>

        <li class="header">Pengaturan</li>
        <li><a href="?p=user"><i class="fa fa-user text-faded"></i><span>User</span></a></li>


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12">
          <?php include("konten.php") ?>
      </div>
    </div>
  </div>

</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<!-- <script src="plugins/jQuery/jquery-2.2.3.min.js"></script> -->
<script src="../resources/js/jquery-3.2.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="dist/js/app.min.js"></script>
<!-- Plugins -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="plugins/select2-master/dist/js/select2.min.js"></script>
<script src="plugins/daterangepicker/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>

<script src="../resources/js/fungsi_admin.js"></script>
<script src="jquery.dataTables.min.js">

</script>

 </body>
</html>
<script>
// $(window).load(function() { $("#loading").fadeOut("slow"); })
$(".box").hide(1);
$(document).ready(function(){
    var x = window.location.search.substr(3);
    $("." + x).addClass("active");
    // return false;

    $(document).ready(function() {
      $('#contoh').DataTable();
    });
    $(".box").fadeIn(300);
})

</script>
