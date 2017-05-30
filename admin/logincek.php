
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
    echo "username ->".$user.br;
    // cek user & pass
    // var_dump($koneksi);
    echo "Sate".br;
    $stmt = $koneksi->prepare("SELECT username FROM tbl_user WHERE id_user=?");
    /* bind parameters for markers */
    $stmt->bind_param("i", $user);

    /* execute query */
    $stmt->execute();

    /* bind result variables */
    $stmt->bind_result($username);

    /* fetch value */
    $stmt->fetch();

    printf($username);

    /* close statement */
    $stmt->close();
  }
}else{
  echo "Gagal";
}
?>
