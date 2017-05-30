
<?php
require_once("../config/config.php");
require_once("../config/koneksi.php");
if(isset($_GET['username']) && isset($_GET['pass'])){
  $user = $_GET['username'];
  $pass = $_GET['pass'];

  if($user == "" OR $pass == ""){
    echo (die("Data Tidak Lengkap"));
  }else{
    // cek user & pass
    var_dump($koneksi);
    $loginx = $koneksi->query("SELECT username,level FROM tbl_user WHERE username=?");
    $loginx->bind_param('ss',$user,$user);
    echo "ada";

    if ($loginx->execute()){
      echo 1;
    }else{
      echo "Gagal";
    }
  }
}else{
  echo "Gagal";
}
?>
