<?php
if (empty($_POST['nip']) OR empty($_POST['nama']) OR empty($_POST['tempat_lahir']) OR empty($_POST['email']) OR empty($_POST['tanggal_lahir'])){
  echo die("Data tidak lengkap");
}
require_once("../../../config/config.php");
require_once("../../../config/koneksi.php");
// kasih proteksi
extract($_POST);

$namatable = 'tbl_pegawai';
$sql   = "INSERT INTO $namatable (nip, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, agama, no_telp, email) VALUES(?, ?, ?, ?, ?, ?, ?, ?) ";
$query = $koneksi->prepare($sql);

// i = integer, s = string... bind_param('tipe data kolom..', 'isi kolom 1','isi kolom 2')
$query->bind_param('ssssssss' ,$nip ,$nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $agama, $no_telp, $email);
// s 8 kali karna semua kolom berjumlah 8 dan semuanya bertipe string
if($query->execute() == TRUE){ // Jika Koneksi Berhasil
  echo 1; // 1 jika sukses
}else {
  // echo 'Gagal -> '.$query->error; // 0 jika gagal
  echo $query->error;
}
?>
