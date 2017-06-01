<?php
if (empty($_POST['nip']) OR empty($_POST['nama_diklat']) OR empty($_POST['lama'])  OR empty($_POST['lama_waktu'])  OR empty($_POST['no_sttpp'])){
  echo die("Data tidak lengkap");
}
require_once("../../../config/fungsi_admindata.php");
require_once("../../../config/config.php");

extract($_POST);
$nip = CariPegawai($nip); // konvert nilai id_pegawai ke nip
$namatable = 'tbl_diklat';

require("../../../config/koneksi.php");
// kasih proteksi
// echo die(var_dump($koneksi));
$sql   = "INSERT INTO $namatable (id_pegawai, nama_diklat, lama, lama_waktu, tahun_penyelenggaraan, tanggal_sttpp, no_sttpp) ";
$sql  .= " VALUES(?, ?, ?, ?, ?, ?, ?)";
$query = $koneksi->prepare($sql);

$tanggal_sttpp    = UbahTanggal($tanggal_sttpp);
// i = integer, s = string... bind_param('tipe data kolom..', 'isi kolom 1','isi kolom 2')
$query->bind_param('issssss',$nip, $nama_diklat, $lama, $lama_waktu, $tahun_penyelenggaraan, $tanggal_sttpp, $no_sttpp);
// s 8 kali karna semua kolom berjumlah 8 dan semuanya bertipe string
if($query->execute() == TRUE){ // Jika Koneksi Berhasil
  echo 1; // 1 jika sukses
}else {
  // echo 'Gagal -> '.$query->error; // 0 jika gagal
  echo $query->error;
}
?>
