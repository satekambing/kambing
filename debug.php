<?php
include("config/fungsi_admindata.php");
if (isset($_FILES['foto'])){
  echo $_FILES['foto']['name'];
  uploadfoto($_FILES['foto'],'berita');
}
?>
<form class="" action="debug.php" method="post" enctype="multipart/form-data">
  <input type="file" name="foto">
  <input type="submit" name="simpan" value="simpan">
</form>
