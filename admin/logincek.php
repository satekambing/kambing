
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
    $user = 4;
    $login = $koneksi->prepare("SELECT username FROM tbl_user WHERE id_user=?");
    $login->bind_param("i",$user);
    $login->execute();

    $login->bind_result($username);
    $login->fetch();
    echo $username;
  }
}else{
  echo "Gagal";
}
?>
