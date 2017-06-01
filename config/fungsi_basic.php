<?php
// function JudulHalaman(array $data){
//   $result = "<h1>".$data['judul']."</h1>";
//   return $result;
// }
function DropDown(array $data, $selected = null){
  $withkey = 0;
  if ($data[0] == null){
    $withkey = 1; // kalo menggunakan key / misalnya untuk level di table user
  }
  foreach ($data as $key => $value) {
    $seleksi = "";
    if ($selected == $value){
      $seleksi = "SELECTED";
    }
    if ($withkey == 0){
      $key = $value ;
    }
    echo "<option $seleksi value='$key'>$value</option>";
    # code...
  }
}
function KolomAgama($agama = null){
  echo "<option value=''>Pilih Kolom Agama</option>";
  $data = array('Islam','Kristen','Katolik','Hindu','Budha','Khonghucu');
  DropDown($data, $agama);
}
function KolomUser($user = null){
  // 0, Super Admin, 1 = Kepala BKP, 2 Kasubag, 3 Pegawai
  echo "<option value=''>Pilih Kolom Level</option>";
  $data = array(1=>'Super Admin','Kepala BKP','Kasubag','Pegawai');
  DropDown($data, $user);
}
function KolomStatus($status = null){
  //	1 = Aktif , 0 = Non Aktif
  $data = array(1=>'Aktif',2=>'Tidak Aktif');
  DropDown($data, $status);
}
function KolomWaktu($waktu = null){
  $data = array('Jam','Hari','Minggu','Bulan','Tahun');
  DropDown($data, $waktu);
}
// untuk data user - level
function UbahLevel(integer $level){
//  1, Super Admin, 2 = Kepala BKP, 3 Kasubag, 4 Pegawai

}

?>
