<?php

if(!isset($_POST['kolom']) OR !isset($_POST['isi'])){
  echo die("Data tidak lengkap");
}
require_once("../../../config/fungsi_admindata.php");
require_once("../../../config/config.php");
require_once("../../../config/koneksi.php");
require_once("../../../config/fungsi_adminview.php");
require_once("../../../config/fungsi_keamanan.php");
session_start();
cekLevel('profil'); // cek status user.. sudah login / belum.. di izinkan mengakses / tidak

extract($_POST);
$namatable = 'tbl_profil';
$sqlcek = $koneksi->query("SELECT $kolom FROM $namatable");
if ($sqlcek->num_rows > 0){
  // kalau baris profil ada - artinya tdk kosong
  $sql    = "UPDATE $namatable SET $kolom=?";
  $page   = 2;  
}else{
  // kalau kosong.. insert dulu datanya
  $sql    = "INSERT INTO $namatable ($kolom) VALUES(?)";
  $page   = 1;
}

$query = $koneksi->prepare($sql);
$query->bind_param('s',$isi);
// i = integer, s = string... bind_param('tipe data kolom..', 'isi kolom 1','isi kolom 2')
// s 8 kali karna semua kolom berjumlah 8 dan semuanya bertipe string
if($query->execute() == TRUE){ // Jika Koneksi Berhasil
  // Jika proses query berhasil
  echo $page; //
}else {
  // Jika proses query gagal
  echo $query->error;
}
?>
