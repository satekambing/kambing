<?php
include("../config/koneksi.php");
include("../config/fungsi.php");
session_start();
if (isset($_SESSION['id_pendaftaran'])){
  $id 	 = $_SESSION['id_pendaftaran']; ?>
  <iframe src="page/laporan/form_pendaftaran.php?id=<?php echo $id ?>" width="750" height="700"></iframe>
<?php }
  else {
    echo "<h2>Tidak dapat menampilkan form cetak.</h2>";
  }
?>
