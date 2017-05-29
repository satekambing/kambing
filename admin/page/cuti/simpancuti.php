<?php
if (empty($_POST['nip']) OR empty($_POST['no_surat']) OR empty($_POST['tanggal_mulaiakhir']) OR empty($_POST['jenis_cuti'])){
  echo die("Data tidak lengkap");
}
require_once("../../../config/fungsi_admindata.php");
require_once("../../../config/config.php");

extract($_POST);
$nip = CariPegawai($nip); // konvert nilai id_pegawai ke nip
$namatable = 'tbl_cuti';

require("../../../config/koneksi.php");
// kasih proteksi
// echo die(var_dump($koneksi));
$sql   = "INSERT INTO $namatable (id_pegawai, jenis_cuti, no_surat, tanggal_surat, tanggal_mulai, tanggal_selesai, keterangan) ";
$sql  .= " VALUES(?, ?, ?, ?, ?, ?, ?)";
$query = $koneksi->prepare($sql);

$tanggal_surat  = UbahTanggal($tanggal_surat);
$tanggal        = UbahDateRange($tanggal_mulaiakhir);
// i = integer, s = string... bind_param('tipe data kolom..', 'isi kolom 1','isi kolom 2')
$query->bind_param('issssss',$nip, $jenis_cuti, $no_surat, $tanggal_surat, $tanggal['mulai'], $tanggal['selesai'], $keterangan);
// s 8 kali karna semua kolom berjumlah 8 dan semuanya bertipe string
if($query->execute() == TRUE){ // Jika Koneksi Berhasil
  echo 1; // 1 jika sukses
}else {
  // echo 'Gagal -> '.$query->error; // 0 jika gagal
  echo $query->error;
}
?>
