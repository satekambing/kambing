
<?php
require_once("../config/config.php");
require_once("../config/koneksi.php");
require_once("../config/aman.php");

error_reporting(E_ALL);
if(isset($_POST['username']) && isset($_POST['pass'])){
  $user = $_POST['username'];
  $pass = $_POST['pass'];

  if($user == "" OR $pass == ""){
    echo (die("Data Tidak Lengkap"));
  }else{
    $login = $koneksi->prepare("SELECT email FROM tbl_user WHERE username=?");
    $login->bind_param("s",$user);
    $login->execute();
    $login->store_result();


    $login->bind_result($email);
    $login->fetch();
    if($login->num_rows > 0){
      echo 1;
    }else{
      echo "username / password salah";
    }
  }
}else{
  echo "Gagal";
}
?>
