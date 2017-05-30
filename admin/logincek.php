<?php
session_start();
require_once("../config/config.php");
require_once("../config/koneksi.php");

error_reporting(E_ALL);
if(isset($_POST['username']) && isset($_POST['pass'])){
  $user = $_POST['username'];
  $pass = $_POST['pass'];

  if($user == "" OR $pass == ""){
    echo (die("Data Tidak Lengkap"));
  }else{
    $login = $koneksi->prepare("SELECT username,pass,level FROM tbl_user WHERE (username=? OR email=?) AND pass=?");
    $pass  = md5($pass); // konfersi ke md5 dahulu

    $login->bind_param("sss",$user,$user,$pass);
    $login->execute();

    $login->store_result();
    $login->bind_result($username,$pass,$level);
    $login->fetch();
    if($login->num_rows > 0){
      // set session dulu kalo login berhasil
      $_SESSION['user'] = $username;
      $_SESSION['pass'] = $pass;
      $_SESSION['level'] = $level;
      echo 1;
    }else{
      echo "username / password salah";
    }
  }
}else{
  echo "Gagal";
}
?>
