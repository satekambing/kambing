<?php
include ("../config/config.php");
include ("../config/koneksi.php");
include ("../config/fungsi_admindata.php");
if (isset($_POST['submit'])){
  uploadfoto($_FILES['gambar'],'berita');
}
?>
<form class="" action="" method="post" enctype="multipart/form-data">
  <input type="file" name="gambar">
  <input type="submit" name="submit" value="simpan">
</form>
