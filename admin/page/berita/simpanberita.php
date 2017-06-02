<?php
if ((!isset($_POST['hapus'])) && (empty($_POST['tanggal_post']) OR empty($_POST['kategori']) OR empty($_POST['isi']) )){
  echo die("Data tidak lengkap");
}
require_once("../../../config/fungsi_admindata.php");
require_once("../../../config/config.php");
require_once("../../../config/koneksi.php");
require_once("../../../config/fungsi_adminview.php");
require_once("../../../config/fungsi_keamanan.php");
session_start();
cekLevel('berita'); // cek status user.. sudah login / belum.. di izinkan mengakses / tidak

extract($_POST);

$namatable = 'tbl_berita';
$pk        =  'id_berita';

if(isset($tambah)){
  // Jika proses tambah data
  // $cekEmail = cekEmail($email);
  // if ($cekEmail == "salah") {echo die("Format Email Salah");}

  // $cekUser = cekDuplikasiData($namatable,'username',$username);
  // if ($cekUser > 0) {echo die("Data Username <b>".$username.'</b> Sudah ada');}
  // $nip    = CariPegawai($nip); // mencari id_pegawai berdasarkan nip
  // $tanggal= UbahDateRange($tanggal_mulaiakhir);
  // $tanggal_post = UbahTanggal($tanggal_post??''); // konversi date range ke date biasa
  //
  $gambar = "";
  if(isset($_FILES['gambar']) && !$_FILES['gambar']['name'] == ""){
    // echo die('zzz1');
    // echo die('ada gambar');
    $gambar = uploadfoto($_FILES['gambar'],'foto_berita');
    // echo $gambar;
  }
  $tanggal_post = UbahTanggalWaktu($tanggal_post??'');
  // echo die($tanggal_post);
  $sql   = "INSERT INTO $namatable (judul,isi,kategori,tanggal_post,sumber,foto) ";
  $sql  .= " VALUES(?, ?, ?, ?, ?, ?)";
  $query = $koneksi->prepare($sql);
  $query->bind_param('ssssss', $judul, $isi, $kategori, $tanggal_post, $sumber, $gambar);
  $page = 1;
}
elseif (isset($ubah)){
  // Jika proses edit data
  $tanggal_post = UbahTanggalWaktu($tanggal_post??'');
  $gambar = $gambar2;
  if(isset($_FILES['gambar']) && !$_FILES['gambar']['name'] == ""){
    // echo die('zzz1');
    // echo die('ada gambar');
    hapusGambar($gambar2??'','foto_berita');

    $gambar = uploadfoto($_FILES['gambar'],'foto_berita');
    // echo $gambar;
  }
  $sql   = "UPDATE $namatable SET judul=?,isi=?,kategori=?,tanggal_post=?,sumber=?,foto=? WHERE $pk=?";
  $query = $koneksi->prepare($sql);
  $query->bind_param('ssssssi', $judul, $isi, $kategori, $tanggal_post, $sumber, $gambar, $ubah);

  $page = 2;
}
elseif (isset($hapus)){
  // Jika proses hapus data
  $sql2   = "SELECT foto FROM $namatable WHERE $pk=?";
  $query2 = $koneksi->prepare($sql2);
  $query2->bind_param('i', $hapus);
  $query2->execute();

  $query2->bind_result($fotonya);
  $query2->fetch();

  $query2->close();

  // var_dump($query2);
  hapusGambar($fotonya??'','foto_berita');

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
