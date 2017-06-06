<?php
if ((!isset($_POST['hapus'])) && (empty($_POST['nip']) OR empty($_POST['nama']) OR empty($_POST['email']) )){
  echo die("Data tidak lengkap");
}
require_once("../../../config/fungsi_admindata.php");
require_once("../../../config/config.php");
require_once("../../../config/koneksi.php");
require_once("../../../config/fungsi_adminview.php");
require_once("../../../config/fungsi_keamanan.php");
session_start();
cekLevel('pegawai'); // cek status user.. sudah login / belum.. di izinkan mengakses / tidak

extract($_POST);
$namatable = 'tbl_pegawai';
$pk        =  'id_pegawai';

if(isset($tambah)){
  // Jika proses tambah data
  $cekUser = cekDuplikasiData($namatable,'nip',$nip);
  if ($cekUser > 0) {echo die("Data NIP <b>".$nip.'</b> Sudah ada');}
  $gambar = "";
  if(isset($_FILES['gambar']) && !$_FILES['gambar']['name'] == ""){
    // echo die('zzz1');
    // echo die('ada gambar');
    $gambar = uploadfoto($_FILES['gambar'],'foto_pegawai');
    // echo $gambar;
  }
  // Insert - data user
  $cekUser = cekDuplikasiData('tbl_user','username',$nip);
  if ($cekUser > 0) {echo die("Data Username <b>".$nip.'</b> Sudah ada');}

  $sql   = "INSERT INTO tbl_user (username, namalengkap, email, level)";
  $sql  .= " VALUES(?,?,?,?)";
  $levelx = 4; // defaultnya pegawai
  $query2 = $koneksi->prepare($sql);
  $query2->bind_param('sssi', $nip, $nama, $email, $levelx);
  $query2->execute();

  // Insert - data pegawai
  $tanggal_lahir = UbahTanggal($tanggal_lahir??'');
  $sql   = "INSERT INTO $namatable (nip, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, agama, no_telp, email, foto_profil) ";
  $sql  .= " VALUES(?,?,?,?,?,?,?,?,?)";
  $query = $koneksi->prepare($sql);
  $query->bind_param('sssssssss', $nip, $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $agama, $no_telp, $email, $gambar);
  // $query->bind_params('s',$gambar);
  $page = 1;
}
elseif (isset($ubah)){
  // Jika proses edit data
  $tanggal_lahir = UbahTanggal($tanggal_lahir??'');
  $gambar = $gambar2;
  if(isset($_FILES['gambar']) && !$_FILES['gambar']['name'] == ""){
    // echo die('zzz1');
    // echo die('ada gambar');
    if(file_exists('../../../files/foto_pegawai/'.$gambar2)){
      unlink('../../../files/foto_pegawai/'.$gambar2);
    }
    $gambar = uploadfoto($_FILES['gambar'],'foto_pegawai');
    // echo $gambar;
  }
  $sql   = "UPDATE $namatable SET nip=?, nama=?, jenis_kelamin=?, tempat_lahir=?, tanggal_lahir=?, agama=?, no_telp=?, email=?, foto_profil=? WHERE $pk=?";
  $query = $koneksi->prepare($sql);
  $query->bind_param('sssssssssi', $nip, $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $agama, $no_telp, $email, $gambar, $ubah);

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
