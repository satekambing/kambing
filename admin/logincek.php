
<?php
require_once("../config/config.php");
require_once("../config/koneksi.php");
require_once("../config/aman.php");

error_reporting(E_ALL);
if(isset($_GET['username']) && isset($_GET['pass'])){
  $user = $_GET['username'];
  $pass = $_GET['pass'];

  if($user == "" OR $pass == ""){
    echo (die("Data Tidak Lengkap"));
  }else{
    $user = 3;
    $login = $koneksi->prepare("SELECT * FROM tbl_user WHERE id_user=?");
    $login->bind_param("i",$user);
    $login->execute();

    $login->fetch();
    echo "sate".$login->num_rows;
  }
}else{
  echo "Gagal";
}
?>
