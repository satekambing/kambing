<?php
// perlu koneksi broh

function CariPegawai($nip){
  if($nip==''){
    $nip = $_SESSION['user'];
  }
  $koneksi	= new mysqli(SERVER, USER, PASS, DBNAME);
  $sql = "SELECT id_pegawai,nip FROM tbl_pegawai WHERE nip='$nip' ";
  $cari = $koneksi->query($sql);
  // echo $cari->num_rows.' '.$nip;
  if($cari->num_rows >= 1){
      $data = $cari->fetch_object();
      $koneksi->close();
      $nip = $data->id_pegawai;
      return $nip;
  }else {
    return 0; // data id_pegawai tidak ditemukan
  }
}
function UbahTanggal($tanggal){
  // untuk simpan ke database
  $tanggal = explode("/",$tanggal);
  $tanggal = str_replace(" ","",$tanggal);
  $tanggal = $tanggal[2].'-'.$tanggal[1].'-'.$tanggal[0];

  return $tanggal;
}
function UbahDateRange($tanggal){
  // untuk memecah tanggal 27/03/1993 - 27/03/2017 menadi tanggal mulai & Akhir
  $tanggal = explode("-",$tanggal);
  $tanggalmulai = $tanggal[0];
  // pecah lagi untuk mengurutkan sesuai yyyy-mm-dd
  $tanggalmulai = UbahTanggal($tanggalmulai);

  $tanggalakhir = $tanggal[1];
  $tanggalakhir = UbahTanggal($tanggalakhir);

  $tanggal = ['mulai'=>$tanggalmulai, 'selesai'=> $tanggalakhir];
  return $tanggal;
}
function UbahTanggalWaktu($tanggal){
  // untuk simpan ke database - tanpa detik.. cuma jam:menit
  $tanggal  = explode("-",$tanggal);
  $tanggalx = UbahTanggal($tanggal[0]);
  $tanggaly = str_replace(" ","",$tanggal[1]);

  return $tanggalx.' '.$tanggaly.':00';
}
// Upload Gambar
function uploadfoto(array $file, $folder = ""){
  // Name , Type, tmp_name, error, size
  $nama   = $file['name'];
  $tmp    = $file['tmp_name'];
  $size   = $file['size'];
  $type   = $file['type'];
  $error  = $file['error'];

  $acak		= rand(1,99);
  $time   = time();
	$nama_file_unik	= $acak.$time.$nama;
  $lokasi = ROOT.'/files/'.$folder.'/'.$nama_file_unik;
  if($folder == ""){
    $lokasi = ROOT.'/files/'.$nama_file_unik;
  }
  // echo $lokasi;
  if($error == 0){
    if ($size <= 2000000) {
      if($type == 'image/jpeg' || $type == 'image/png'){
        move_uploaded_file($tmp,$lokasi);
        return $nama_file_unik;
      }else {
        return die('Hanya JPG dan PNG yang diperbolehkan');
      }
    }else{
      return die('Error Ukuran Terlalu Besar '.$size);
    }
  }else {
    return die('Error Gagal Upload');
  }
  move_uploaded_file($tmp,$nama_file);

}
function hapusGambar($nama_file, $folder=null){
  if ($folder == null){
    $folder = "";
  }
  $lokasi = ROOT.'/files/'.$folder.'/'.$nama_file;
  if(file_exists($lokasi) && !$nama_file==""){
    unlink($lokasi);
  }
}
function cekDuplikasiData($namatable,$kolom,$isidata){
  $koneksi	= new mysqli(SERVER, USER, PASS, DBNAME);
  $sql = "SELECT $kolom FROM $namatable WHERE $kolom=";
  if(is_int($isidata)){
    $sql .= $isidata;
  }else{
    $sql .= "'".$isidata."'";
  }
  $cek = $koneksi->query($sql);
  // return 'zzz';
  if($cek->num_rows > 0){
    return $cek->num_rows;
  }
}
function cekEmail($email){
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return "salah";
  }
}
function riwayat($nip,$id_halaman,$halaman,$status,$ket){
  $koneksi	= new mysqli(SERVER, USER, PASS, DBNAME);
  $sql      = "INSERT INTO tbl_riwayat (id_pegawai, id_halaman, halaman, status, keterangan)";
  $sql     .= " VALUES (?,?,?,?,?)";
  $r        = $koneksi->prepare($sql);
  $r->bind_param('iisss',$nip,$id_halaman,$halaman,$status,$ket);
  $r->execute();
}
?>
