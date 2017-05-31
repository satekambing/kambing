<?php
try {
  $koneksi	= new mysqli(SERVER, USER, PASS, DBNAME);
  if($koneksi->connect_errno){
    throw new Exception("Gagal menghubungkan ke database");
  }
} catch (Exception $e) {
  echo die("Error ".$e->getMessage());
}
?>
