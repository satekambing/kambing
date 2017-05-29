<?php
if (empty($_POST['nip']) OR empty($_POST['tanggal_pensiun']) OR empty($_POST['keterangan'])){
  echo die("Data tidak lengkap");
}
require_once("../../../config/fungsi_admindata.php");
require_once("../../../config/config.php");

extract($_POST);
$nip = CariPegawai($nip); // konvert nilai id_pegawai ke nip
$namatable = 'tbl_pensiun';

require("../../../config/koneksi.php");
// kasih proteksi
// echo die(var_dump($koneksi));
$sql   = "INSERT INTO $namatable (id_pegawai, tanggal_pensiun, keterangan) ";
$sql  .= " VALUES(?, ?, ?)";
$query = $koneksi->prepare($sql);

$tanggal_pensiun    = UbahTanggal($tanggal_pensiun);
// i = integer, s = string... bind_param('tipe data kolom..', 'isi kolom 1','isi kolom 2')
$query->bind_param('iss',$nip, $tanggal_pensiun, $keterangan);
// s 8 kali karna semua kolom berjumlah 8 dan semuanya bertipe string
if($query->execute() == TRUE){ // Jika Koneksi Berhasil
  echo 1; // 1 jika sukses
}else {
  // echo 'Gagal -> '.$query->error; // 0 jika gagal
  echo $query->error;
}
?>
