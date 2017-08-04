<?php
if ((!isset($_POST['hapus'])) && (empty($_POST['tanggal_pensiun']) OR empty($_POST['keterangan']))){
  echo die("Data tidak lengkap");
}
require_once("../../../config/fungsi_admindata.php");
require_once("../../../config/config.php");
require_once("../../../config/koneksi.php");
require_once("../../../config/fungsi_adminview.php");
require_once("../../../config/fungsi_keamanan.php");
session_start();
cekLevel('pensiun'); // cek status user.. sudah login / belum.. di izinkan mengakses / tidak

extract($_POST);
$namatable = 'tbl_pensiun';
$pk        =  'id_pensiun';

$nip    = CariPegawai($nip??''); // mencari id_pegawai berdasarkan nip
if($_SESSION['level'] == 4){
  // kalau yg input pegawai = otomatis status menjadi proses
  $status = 1;
  $ket = "";
}
if(isset($tambah)){
  $tanggal_pensiun = UbahTanggal($tanggal_pensiun??'');

  $sql   = "INSERT INTO $namatable (id_pegawai,tanggal_pensiun,keterangan) ";
  $sql  .= " VALUES(?, ?, ?)";
  $query = $koneksi->prepare($sql);
  $query->bind_param('iss',$nip, $tanggal_pensiun, $keterangan);
  $page = 1;
}
elseif (isset($ubah)){
  // Jika proses edit data
  $tanggal_pensiun = UbahTanggal($tanggal_pensiun??'');
  $sql   = "UPDATE $namatable SET id_pegawai=?,tanggal_pensiun=?,keterangan=? WHERE $pk=?";
  $query = $koneksi->prepare($sql);
  $query->bind_param('issi',$nip,$tanggal_pensiun, $keterangan, $ubah);
  $page = 2;
}
elseif (isset($hapus)){
  // Jika proses hapus data
  $sql   = "DELETE FROM $namatable WHERE $pk=?";
  $query = $koneksi->prepare($sql);
  $query->bind_param('i', $hapus);
  $page = 3;
}
if($query->execute() == TRUE){ // Jika Query Berhasil
  // Jika proses query berhasil
  // tambah ke riwayat
  if($page == 1){
    $last_id = $query->insert_id;
  }elseif($page == 2){
    $last_id = $ubah;
  }elseif($page == 3){
    $last_id = $hapus;
  }
  riwayat($nip, $last_id, $namatable, $status, $ket);
  echo $page;
}else {
  // Jika proses query gagal
  echo $query->error;
}
?>
