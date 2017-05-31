<?php
if ((!isset($_POST['hapus'])) && (empty($_POST['tanggal_agenda']) OR empty($_POST['judul']) OR empty($_POST['isi']) )){
  echo die("Data tidak lengkap");
}
require_once("../../../config/fungsi_admindata.php");
require_once("../../../config/config.php");
require_once("../../../config/koneksi.php");
require_once("../../../config/fungsi_adminview.php");
require_once("../../../config/fungsi_keamanan.php");
cekLevel('agenda'); // cek status user.. sudah login / belum.. di izinkan mengakses / tidak

extract($_POST);
$namatable = 'tbl_agenda';
$pk        =  'id_agenda';

$tanggal_agenda = UbahTanggal($tanggal_agenda??'');
if(isset($tambah)){
  // Jika proses tambah data
  $sql   = "INSERT INTO $namatable (tanggal_agenda, judul, isi) ";
  $sql  .= " VALUES(?, ?, ?)";
  $query = $koneksi->prepare($sql);
  $query->bind_param('sss',$tanggal_agenda, $judul, $isi);
  $page = 1;
}
elseif (isset($ubah)){
  // Jika proses edit data
  $sql   = "UPDATE $namatable SET tanggal_agenda=?,judul=?,isi=? WHERE $pk=?";
  $query = $koneksi->prepare($sql);
  $query->bind_param('sssi',$tanggal_agenda, $judul, $isi,$ubah);
  $page = 2;
}
elseif (isset($hapus)){
  // Jika proses hapus data
  $sql   = "DELETE FROM $namatable WHERE $pk=?";
  $query = $koneksi->prepare($sql);
  $query->bind_param('i', $hapus);
  $page = 3;
}
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
