<?php
if ((!isset($_POST['hapus'])) && (empty($_POST['tanggal_master']) OR empty($_POST['']) OR empty($_POST['']) )){
  echo die("Data tidak lengkap");
}
require_once("../../../config/fungsi_admindata.php");
require_once("../../../config/config.php");
require_once("../../../config/koneksi.php");
require_once("../../../config/fungsi_adminview.php");
require_once("../../../config/fungsi_keamanan.php");
session_start();
cekLevel('master'); // cek status user.. sudah login / belum.. di izinkan mengakses / tidak

extract($_POST);
$namatable = 'tbl_master';
$pk        =  'id_master';

if(isset($tambah)){
  // Jika proses tambah data
  // $cekEmail = cekEmail($email);
  // if ($cekEmail == "salah") {echo die("Format Email Salah");}

  // $cekUser = cekDuplikasiData($namatable,'username',$username);
  // if ($cekUser > 0) {echo die("Data Username <b>".$username.'</b> Sudah ada');}
  // $nip    = CariPegawai($nip); // mencari id_pegawai berdasarkan nip
  // $tanggal= UbahDateRange($tanggal_mulaiakhir);
  // $tanggal_master = UbahTanggal($tanggal_master??''); // konversi date range ke date biasa
  //
  $sql   = "INSERT INTO $namatable (tanggal_master,,) ";
  $sql  .= " VALUES(?, ?)";
  $query = $koneksi->prepare($sql);
  $query->bind_param('sss', , );
  $page = 1;
}
elseif (isset($ubah)){
  // Jika proses edit data
  $tanggal_master = UbahTanggal($tanggal_master??'');
  $sql   = "UPDATE $namatable SET tanggal_master=?,=?,=? WHERE $pk=?";
  $query = $koneksi->prepare($sql);
  $query->bind_param('sssi',$tanggal_master, $, $,$);
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
