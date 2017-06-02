<?php
session_start();

require_once("../config/fungsi_keamanan.php");
cekLogin();

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
  <link rel="stylesheet" href="plugins/datatable/jquery.dataTables.min.css">

  <link rel="stylesheet" href="../resources/css/styleku.css">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <?php include("header.php") ?>
  </header>
  <aside class="main-sidebar">
    <?php include("menu.php") ?>
  </aside>

  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12">
          <?php include("konten.php") ?>
      </div>
    </div>
  </div>

</div>

<!-- kumpulan js -->
<script src="../resources/js/jquery-3.2.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="dist/js/app.min.js"></script>
<!-- Plugins -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="plugins/select2-master/dist/js/select2.min.js"></script>
<script src="plugins/daterangepicker/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src='plugins/ckeditor/ckeditor.min.js'></script>
<script src="../resources/js/fungsi_admin.js"></script>
<script src="plugins/datatable/jquery.dataTables.min.js">

</script>

 </body>
</html>
<script>
CKEDITOR.replace('CKEditor1');
$(".box").hide(1);
$(document).ready(function(){
    var x = window.location.search.substr(3);
    $("." + x).addClass("active");
    // return false;

    $(document).ready(function() {
      $('#contoh').DataTable({
        "ordering": false
      });
      // tinymce.init({
      //   selector: '.EditorMCE'
      // });
    });
    $(".box").fadeIn(300);
});
</script>
