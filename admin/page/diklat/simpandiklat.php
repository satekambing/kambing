<?php
if ((!isset($_POST['hapus'])) && (empty($_POST['tanggal_sttpp']) OR empty($_POST['lama']) OR empty($_POST['lama_waktu']) OR empty($_POST['nip']) )){
  echo die("Data tidak lengkap");
}
require_once("../../../config/fungsi_admindata.php");
require_once("../../../config/config.php");
require_once("../../../config/koneksi.php");
require_once("../../../config/fungsi_adminview.php");
require_once("../../../config/fungsi_keamanan.php");
session_start();
cekLevel('diklat'); // cek status user.. sudah login / belum.. di izinkan mengakses / tidak

extract($_POST);
$namatable = 'tbl_diklat';
$pk        =  'id_diklat';

if(isset($tambah)){
  // Jika proses tambah data
  // $cekEmail = cekEmail($email);
  // if ($cekEmail == "salah") {echo die("Format Email Salah");}

  // $cekUser = cekDuplikasiData($namatable,'username',$username);
  // if ($cekUser > 0) {echo die("Data Username <b>".$username.'</b> Sudah ada');}
  $nip    = CariPegawai($nip); // mencari id_pegawai berdasarkan nip
  // $tanggal= UbahDateRange($tanggal_mulaiakhir);
  // $tanggal_diklat = UbahTanggal($tanggal_diklat??''); // konversi date range ke date biasa
  //
  $tanggal_sttpp = UbahTanggal($tanggal_sttpp??'');

  $sql   = "INSERT INTO $namatable (id_pegawai, nama_diklat, lama, lama_waktu, tahun_penyelenggaraan, tanggal_sttpp, no_sttpp) ";
  $sql  .= " VALUES(?, ?, ?, ?, ?, ?, ?)";
  $query = $koneksi->prepare($sql);
  $query->bind_param('issssss', $nip, $nama_diklat, $lama, $lama_waktu, $tahun_penyelenggaraan, $tanggal_sttpp, $no_sttpp);
  $page = 1;
}
elseif (isset($ubah)){
  // Jika proses edit data
  $nip    = CariPegawai($nip); // mencari id_pegawai berdasarkan nip
  $tanggal_sttpp = UbahTanggal($tanggal_sttpp??'');

  $sql   = "UPDATE $namatable SET id_pegawai=?, nama_diklat=?, lama=?, lama_waktu=?, tahun_penyelenggaraan=?, tanggal_sttpp=?, no_sttpp=? WHERE $pk=?";
  $query = $koneksi->prepare($sql);
  $query->bind_param('issssssi',$nip, $nama_diklat, $lama, $lama_waktu, $tahun_penyelenggaraan, $tanggal_sttpp, $no_sttpp ,$ubah);
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
