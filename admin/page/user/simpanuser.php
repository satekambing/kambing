<?php

if (empty($_POST['username']) OR empty($_POST['pass']) OR empty($_POST['level'])){
  echo die("Data tidak lengkap");
}
require_once("../../../config/fungsi_admindata.php");
require_once("../../../config/config.php");

extract($_POST);
$namatable = 'tbl_user';

if ($level == 4){
    $level = CariPegawai($username); // konvert nilai id_pegawai ke nip

    if($level == 0){
      echo die('Nip tidak ditemukan');
    }
}

require("../../../config/koneksi.php");
// kasih proteksi
// echo die(var_dump($koneksi));
$sql   = "INSERT INTO $namatable (username, namalengkap, email, pass, level, status) ";
$sql  .= " VALUES(?, ?, ?, ?, ?, ?)";
$query = $koneksi->prepare($sql);

$tanggal_pensiun    = UbahTanggal($tanggal_pensiun);
// i = integer, s = string... bind_param('tipe data kolom..', 'isi kolom 1','isi kolom 2')
$query->bind_param('ssssii', $username, $namalengkap, $email, $pass, $level, $status);
// s 8 kali karna semua kolom berjumlah 8 dan semuanya bertipe string
if($query->execute() == TRUE){ // Jika Koneksi Berhasil
  echo 1; // 1 jika sukses
}else {
  // echo 'Gagal -> '.$query->error; // 0 jika gagal
  echo $query->error;
}
?>
