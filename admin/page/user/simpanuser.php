<?php
if ((!isset($_POST['hapus'])) && (empty($_POST['username']) OR empty($_POST['namalengkap']) OR empty($_POST['email']) )){
  echo die("Data tidak lengkap");
}

require_once("../../../config/fungsi_admindata.php");
require_once("../../../config/config.php");
require_once("../../../config/koneksi.php");
require_once("../../../config/fungsi_adminview.php");
require_once("../../../config/fungsi_keamanan.php");
session_start();
// cekLevel('user'); // cek status user.. sudah login / belum.. di izinkan mengakses / tidak
extract($_POST);
$namatable = 'tbl_user';
$pk        =  'id_user';

// $tanggal_user = UbahTanggal($tanggal_user??'');
if(isset($tambah)){
  // Jika proses tambah data

  // Cek Format Email
  $cekEmail = cekEmail($email);
  if ($cekEmail == "salah") {echo die("Format Email Salah");}

  // Cek Duplikasi data
  $cekUser = cekDuplikasiData($namatable,'username',$username);
  if ($cekUser > 0) {echo die("Data Username <b>".$username.'</b> Sudah ada');}

  $cekUser = cekDuplikasiData($namatable,'Email',$email);
  if ($cekUser > 0) {echo die("Data Email <b>".$email.'</b> Sudah ada');}

  $level   = 4;
  $status  = 1;
  $pass    = md5($pass);
  // echo die($username.'-'.$namalengkap.'-'.$email.'-'.$pass.'-'.$level.'-'.$status);
  $sql   = "INSERT INTO $namatable (username,namalengkap,email,pass,level,status) ";
  $sql  .= " VALUES(?, ?, ?, ?, ?, ?)";
  $query = $koneksi->prepare($sql);
  $query->bind_param('ssssii',$username,$namalengkap,$email,$pass,$level,$status);
  $page = 1;
}
elseif (isset($ubah)){
  // Jika proses edit data
  $sql   = "UPDATE $namatable SET tanggal_user=?,=?,=? WHERE $pk=?";
  $query = $koneksi->prepare($sql);
  $query->bind_param('sssi',$tanggal_user);
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
