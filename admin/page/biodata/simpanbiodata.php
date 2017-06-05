<?php
if(isset($_POST['tambah'])){
  if(($_POST['tambah'] == "keluarga") && (empty($_POST['nama']) OR empty($_POST['tempat_lahir'])) ){
    echo die("Data tidak lengkap");
  }
}else{
  echo die("Halaman tidak ditemukan");
}
require_once("../../../config/fungsi_admindata.php");
require_once("../../../config/config.php");
require_once("../../../config/koneksi.php");
require_once("../../../config/fungsi_adminview.php");
require_once("../../../config/fungsi_keamanan.php");
session_start();
cekLevel('biodata'); // cek status user.. sudah login / belum.. di izinkan mengakses / tidak
if ($_SESSION['level'] == 4){
  // kalau level user itu pegawai maka nip = nip saat login
  $nip    = CariPegawai($_SESSION['user']); // mencari id_pegawai berdasarkan nip
}
extract($_POST);
$namatable = "tbl_pegawai";
$pk        = "id_pegawai";
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
  if($tambah == "keluarga"){
    // jika proses tambah itu data keluarga 2017-01-01
    $namatable = "tbl_keluarga";
    $pk        = "id_keluarga";


    $sql   = "INSERT INTO $namatable (id_pegawai, nama, tempat_lahir, tanggal_lahir, pekerjaan, status) ";
    $sql  .= " VALUES(?,?,?,?,?,?) ";
    $query = $koneksi->prepare($sql);
    $query->bind_param('isssss', $nip, $nama, $tempat_lahir, $tanggal_lahir, $pekerjaan, $status);
    $page = 1;
  }
}
// extract($_POST);
if($query->execute() == TRUE){ // Jika Koneksi Berhasil
  // Jika proses query berhasil
  echo $page; //
}else {
  // Jika proses query gagal
  echo $query->error;
}
// i = integer, s = string... bind_param('tipe data kolom..', 'isi kolom 1','isi kolom 2')
// s 8 kali karna semua kolom berjumlah 8 dan semuanya bertipe string

?>
