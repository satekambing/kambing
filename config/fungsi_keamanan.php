<?php
/**
  * Keterangan : Fungsi untuk menangani keamanana sistem
**/
function levelUser(int $angka){
  switch ($angka) {
    case 1:
      return ["Super Admin",SUPER_ADMIN,"danger"];
      break;
    case 2:
      return ["Kepala BKP",KEPALA_BKP,"warning"];
      break;
    case 3:
      return ["Kasubag",KASUBAG,"info"];
    break;
    case 4:
      return ["Pegawai",PEGAWAI,"primary"];
    break;
  }
}
function cekLogin($direct=null){
  if(!isset($_SESSION['user']) OR $_SESSION['user'] == ''){
    if($direct=="direct"){
      header('location: login.php');
    }
    echo die("Belum Login ");
  }
}
function cekLevel($halaman){
  cekLogin();

  $ceklevel  = levelUser($_SESSION['level']);
  $level     = $ceklevel[1]; // mengambil konstanta berdasarkan user yg login saat itu juga

  if(!in_array($halaman, $level)){
    echo die(PesanPeringatan(array('jenis'=>'warning','judul'=>'Akses Dilarang','isipesan'=>'User tidak berhak mengakses halaman ini')));
  }
}
function cekMenu($halaman){
    $level = $_SESSION['level'];
    if(in_array($level, $halaman)){
      return true;
    }
}
?>
