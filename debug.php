<?php
include("config/config.php");
include("config/fungsi_admindata.php");
if (isset($_FILES['gambar'])){
  echo $_FILES['gambar']['name'];
  uploadfoto($_FILES['gambar'],'berita');
}
?>
<form class="" action="debug.php" method="post" enctype="multipart/form-data">
  <input type="file" name="gambar">
  <input type="submit" name="simpan" value="simpan">
</form>
