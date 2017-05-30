<?php
/**
  * Keterangan : Fungsi untuk menangani keamanana sistem
**/
function levelUser(int $angka){
  switch ($angka) {
    case 1:
      return ["Super Admin",SUPER_ADMIN];
      break;
    case 2:
      return ["Kepala BKP",KEPALA_BKP];
      break;
    case 3:
      return ["Kasubag",KASUBAG];
    break;
    case 4:
      return ["Pegawai",PEGAWAI];
    break;
  }
}
function cekLogin(){
  if(!isset($_SESSION['user']) OR $_SESSION['user'] == ''){
    echo die("Belum Login ");
  }
}
function cekLevel($halaman){
  // echo SERVER;
  $ceklevel  = levelUser($_SESSION['level']);
  $level     = $ceklevel[1]; // mengambil konstanta berdasarkan user yg login saat itu juga

  if(!in_array($halaman, $level)){
    
  }
}
?>
