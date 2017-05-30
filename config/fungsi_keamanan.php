<?php
/**
  * Keterangan : Fungsi untuk menangani keamanana sistem
**/
function levelUser($angka){
  $kelas_user   = array(
                    1 => 'Super Admin',
                    2 => 'Kepala BKP',
                    3 => 'Kasubag',
                    4 => 'Pegawai'
                  );
  return $kelas_user[$angka];
}
function cekLogin(){
  if(!isset($_SESSION['user']) OR $_SESSION['user'] == ''){
    echo die("Belum Login ");
  }
}
function cekLevel(array $angkaLevel){
  // misal 4 = pegawai
  cekLogin();
  if(!in_array($_SESSION['level'], $angkaLevel)){
    // kalau level user ada di daftar white list halaman
    echo die(PesanPeringatan(array('jenis'=>'warning','judul'=>'Akses Dilarang','isipesan'=>'User tidak berhak mengakses halaman ini')));
  }
}
?>
