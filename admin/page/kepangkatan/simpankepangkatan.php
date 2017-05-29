<?php
if (empty($_POST['nip']) OR empty($_POST['no_sk']) OR empty($_POST['jenis_kenaikan']) OR empty($_POST['tmt'])){
  echo die("Data tidak lengkap");
}
require_once("../../../config/fungsi_admindata.php");
require_once("../../../config/config.php");

extract($_POST);
$nip = CariPegawai($nip); // konvert nilai id_pegawai ke nip
$namatable = 'tbl_kepangkatan';

require("../../../config/koneksi.php");
// kasih proteksi
// echo die(var_dump($koneksi));
$sql   = "INSERT INTO $namatable (id_pegawai, jenis_kenaikan, no_sk, tanggal_sk, tmt) ";
$sql  .= " VALUES(?, ?, ?, ?, ?)";
$query = $koneksi->prepare($sql);

$tanggal_sk  = UbahTanggal($tanggal_sk);
$tmt    = UbahTanggal($tmt);
// i = integer, s = string... bind_param('tipe data kolom..', 'isi kolom 1','isi kolom 2')
$query->bind_param('issss',$nip, $jenis_kenaikan, $no_sk, $tanggal_sk, $tmt);
// s 8 kali karna semua kolom berjumlah 8 dan semuanya bertipe string
if($query->execute() == TRUE){ // Jika Koneksi Berhasil
  echo 1; // 1 jika sukses
}else {
  // echo 'Gagal -> '.$query->error; // 0 jika gagal
  echo $query->error;
}
?>
