<?php
if ((!isset($_POST['hapus'])) && (empty($_POST['nip']) OR empty($_POST['tanggal_mulaiakhir']) OR empty($_POST['jenis_cuti']) )){
  echo die("Data tidak lengkap");
}
require_once("../../../config/config.php");
require_once("../../../config/koneksi.php");
require_once("../../../config/fungsi_admindata.php");
require_once("../../../config/fungsi_adminview.php");
require_once("../../../config/fungsi_keamanan.php");
session_start();
cekLevel('cuti'); // cek status user.. sudah login / belum.. di izinkan mengakses / tidak

extract($_POST);
$namatable = 'tbl_cuti';
$pk        =  'id_cuti';

if(isset($tambah)){
  // Jika proses tambah data
  $nip            = CariPegawai($nip); // konvert nilai id_pegawai ke nip
  $tanggal        = UbahDateRange($tanggal_mulaiakhir);
  $tanggal_surat  = UbahTanggal($tanggal_surat??'');

  $sql   = "INSERT INTO $namatable (id_pegawai, jenis_cuti, no_surat, tanggal_surat, tanggal_mulai, tanggal_selesai, keterangan) ";
  $sql  .= " VALUES(?, ?, ?, ?, ?, ?, ?)";
  $query = $koneksi->prepare($sql);
  $query->bind_param('issssss', $nip,$jenis_cuti,$no_surat,$tanggal_surat,$tanggal['mulai'],$tanggal['selesai'],$keterangan); //7 data = 1 int (i_pegawai) 6 string
  $page = 1;
}
elseif (isset($ubah)){
  // Jika proses edit data
  $nip            = CariPegawai($nip); // konvert nilai id_pegawai ke nip
  $tanggal        = UbahDateRange($tanggal_mulaiakhir);
  $tanggal_surat  = UbahTanggal($tanggal_surat??'');

  $sql   = "UPDATE $namatable SET id_pegawai=?,jenis_cuti=?,no_surat=?,tanggal_surat=?,tanggal_mulai=?,tanggal_selesai=?,keterangan=? WHERE $pk=?";
  $query = $koneksi->prepare($sql);
  $query->bind_param('isssssss', $nip,$jenis_cuti,$no_surat,$tanggal_surat,$tanggal['mulai'],$tanggal['selesai'],$keterangan,$ubah); //7 data = 1 int (i_pegawai) 6 string

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
