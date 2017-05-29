<?php
// echo die(123);

if (empty($_POST['tanggal_post']) OR empty($_POST['judul']) OR empty($_POST['isi'])){
  echo die("Data tidak lengkap");
}

require_once("../../../config/fungsi_admindata.php");
require_once("../../../config/config.php");

extract($_POST);
$nip = CariPegawai($nip); // konvert nilai id_pegawai ke nip
$namatable = 'tbl_berita';
$gambar = "";
// echo die('namafile '.$_FILES['gambar']['name']);
if(isset($_FILES['gambar']) && !$_FILES['gambar']['name'] == ""){
  // echo die('zzz1');
  // echo die('ada gambar');
  $gambar = uploadfoto($_FILES['gambar'],'berita');
  // echo $gambar;
}
// echo die('uda ngelawatin isset');

require("../../../config/koneksi.php");
// kasih proteksi
// echo die(var_dump($koneksi));
$sql   = "INSERT INTO $namatable (judul, isi, kategori, tanggal_post, sumber, foto) ";
$sql  .= " VALUES(?, ?, ?, ?, ?, ?)";
$query = $koneksi->prepare($sql);

$tanggal_post    = UbahTanggal($tanggal_post);
// i = integer, s = string... bind_param('tipe data kolom..', 'isi kolom 1','isi kolom 2')
$query->bind_param('ssssss', $judul, $isi, $kategori, $tanggal_post, $sumber, $gambar);
// s 8 kali karna semua kolom berjumlah 8 dan semuanya bertipe string
if($query->execute() == TRUE){ // Jika Koneksi Berhasil
  echo 1; // 1 jika sukses
}else {
  // echo 'Gagal -> '.$query->error; // 0 jika gagal
  echo $query->error;
}
?>
