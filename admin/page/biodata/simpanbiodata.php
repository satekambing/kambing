<?php
if(isset($_POST['tambah'])){
  if(($_POST['tambah'] == "keluarga") && (empty($_POST['nama']) OR empty($_POST['tempat_lahir'])) ){
    echo die("Data tidak lengkap");
  }
  elseif(($_POST['tambah'] == "pendidikan") && (empty($_POST['tingkat_pendidikan']) OR empty($_POST['sekolah']) ) ){
    echo die("Data tidak lengkap");
  }
}elseif(isset($_POST['ubah'])){
  if(($_POST['ubah'] == "detailbiodata") && (empty($_POST['nama']) OR empty($_POST['nip'])OR empty($_POST['email'])) ){
    echo die("Data tidak lengkap");
  }
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

    $tanggal_lahir = UbahTanggal($tanggal_lahir);

    $sql   = "INSERT INTO $namatable (id_pegawai, nama, tempat_lahir, tanggal_lahir, pekerjaan, status) ";
    $sql  .= " VALUES(?,?,?,?,?,?) ";
    $query = $koneksi->prepare($sql);
    $query->bind_param('isssss', $nip, $nama, $tempat_lahir, $tanggal_lahir, $pekerjaan, $status);
    $page = "<tr><td>-</td><td>$nama</td><td>$tempat_lahir - $tanggal_lahir</td><td>$pekerjaan</td><td>$status</td></tr>";
  }
  elseif ($tambah == "pendidikan"){
    $namatable = "tbl_pendidikan";
    $pk        = "id_pendidikan";

    $tanggal_lulus = UbahTanggal($tanggal_lulus);

    $sql   = "INSERT INTO $namatable (id_pegawai, tingkat_pendidikan, jurusan, sekolah, tanggal_lulus) ";
    $sql  .= " VALUES(?,?,?,?,?) ";
    $query = $koneksi->prepare($sql);
    $query->bind_param('issss',$nip, $tingkat_pendidikan, $jurusan, $sekolah, $tanggal_lulus);
    $page = "<tr><td>-</td><td>$tingkat_pendidikan</td><td>$jurusan</td><td>$sekolah</td><td>$tanggal_lulus</td><td>-</td></tr>";
  }

}
elseif(isset($hapus)){
  if ($_SESSION['level'] == 4){
    // kalau level user itu pegawai maka nip = nip saat login
    $id_pegawai    = CariPegawai($_SESSION['user']); // mencari id_pegawai berdasarkan nip
  }
  if($jtable == "keluarga"){
    // Jika proses hapus data
    $namatable = "tbl_keluarga";
    $pk        = "id_keluarga";

    $sql   = "DELETE FROM $namatable WHERE $pk=?";
    $query = $koneksi->prepare($sql);
    $query->bind_param('i', $hapus);
    $page = 3;
  }
  elseif($jtable == "pendidikan"){
    $namatable = "tbl_pendidikan";
    $pk        = "id_pendidikan";

    $sql   = "DELETE FROM $namatable WHERE $pk=?";
    $query = $koneksi->prepare($sql);
    $query->bind_param('i', $hapus);
    $page = 3;
  }
}
elseif(isset($_POST['ubah'])){
  $namatable = "tbl_pegawai";
  $pk        = "id_pegawai";
  echo $_SESSION['user'];
  if ($_SESSION['level'] == 4){
    // kalau level user itu pegawai maka nip = nip saat login
    $nip    = CariPegawai($_SESSION['user']); // mencari id_pegawai berdasarkan nip
  }
  if($nip == 0){
    // kalau data pegawai tidak ditemukan
    // Jika proses tambah data
    $cekUser = cekDuplikasiData($namatable,'nip',$_SESSION['user']);
    if ($cekUser > 0) {echo die("Data NIP <b>".$nip.'</b> Sudah ada');}
    $gambar = "";
    if(isset($_FILES['gambar']) && !$_FILES['gambar']['name'] == ""){
      // echo die('zzz1');
      // echo die('ada gambar');
      $gambar = uploadfoto($_FILES['gambar'],'foto_pegawai');
      // echo $gambar;
    }
    // Insert - data pegawai
    $tanggal_lahir = UbahTanggal($tanggal_lahir??'');
    $sql   = "INSERT INTO $namatable (nip, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, agama, no_telp, email, foto_profil) ";
    $sql  .= " VALUES(?,?,?,?,?,?,?,?,?)";
    $query = $koneksi->prepare($sql);
    $query->bind_param('sssssssss', $_SESSION['user'], $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $agama, $no_telp, $email, $gambar);
    // $query->bind_params('s',$gambar);
    $page = 1;
  }else{
    $tanggal_lahir = UbahTanggal($tanggal_lahir??'');
    $gambar = $gambar2??'';
    if(isset($_FILES['gambar']) && !$_FILES['gambar']['name'] == ""){
      // echo die('zzz1');
      // echo die('ada gambar');
      if(file_exists('../../../files/foto_pegawai/'.$gambar2)){
        unlink('../../../files/foto_pegawai/'.$gambar2);
      }
      $gambar = uploadfoto($_FILES['gambar'],'foto_pegawai');
      // echo $gambar;
    }
    // update email sekalian

    // $sql   = "UPDATE $namatable SET namalengkap=?,email=? WHERE username=?";
    // $query = $koneksi->prepare($sql);
    // $query->bind_param('sss',$namalengkap,$email,$nip);

    $sql   = "UPDATE $namatable SET nama=?, jenis_kelamin=?, tempat_lahir=?, tanggal_lahir=?, agama=?, no_telp=?, email=?, foto_profil=? WHERE $pk=?";
    $query = $koneksi->prepare($sql);
    $query->bind_param('ssssssssi', $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $agama, $no_telp, $email, $gambar, $nip);

    echo $nama.'-'. $jenis_kelamin.'-'. $tempat_lahir.'-'. $tanggal_lahir.'-'. $agama.'-'. $no_telp.'-'. $email.'-'. $gambar.'-'. $nip;
    $page = 2;
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
