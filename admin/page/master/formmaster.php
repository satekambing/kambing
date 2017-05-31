<?php
session_start();
require_once("../../../config/config.php");
require_once("../../../config/koneksi.php");
require_once("../../../config/fungsi_adminview.php");
require_once("../../../config/fungsi_keamanan.php");

cekLevel('master'); // cek status user.. sudah login / belum.. di izinkan mengakses / tidak

$rowid      = $_POST['jrow'] ?? ''; // mengecek apakah user ngklik tombol edit
$judulModal = ($rowid == '' ? 'Tambah':'Ubah'); // kalau rowid kosong maka tampilkan kata Tambah pada dialog box jika tidak tampilkan Ubah data
$namaHalaman = ""; // set halaman default

// Konfigurasi Database
$namatable = "";
$pk        = ""; // primarykey di table
$ket       = "tambah";

?>
<div class='modal-header'>
  <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
    <span aria-hidden='true'>×</span>
  </button>
  <h4 class='modal-title'><?php echo $judulModal.' '.$namaHalaman ?></h4>
</div>

<div class='modal-body'>
  <div class="isi-datamodal">
    <?php
    if (!$rowid == ""){

      // cari data di database dulu
      $sql = "SELECT * FROM $namatable WHERE $pk=$rowid";
      if($master=$koneksi->query($sql)){
        if($master->num_rows > 0){
          $data     = $master->fetch_object();
          $ket      = "ubah";
        }else{
          echo die(PesanPeringatanModal(['jenis' => 'danger', 'judul' => '404', 'isipesan' => 'Data Tidak Ditemukan']));
        }
      }else{
        echo die("Query Gagal");
      }
    }

    ?>
    <div class="pesan-form" >
      <!-- Pesan Kesalahan ada disini -->
    </div>
    <form class="form" role="form" method="post" name="master" id="formmaster">
      <input type="hidden" name="<?php echo $ket ?>" value="<?php echo $data->id_master ?>" >

      <div class="form-group">
        <label for="">Tanggal master </label>
        <div class="input-group date">
          <input type="text"name="tanggal_master" placeholder="YYYY-DD-MM" value="<?php echo UbahTanggalKeView($data->tanggal_master??'') ?>"  class="tanggalx form-control" >
          <span class="input-group-addon text-blue"><i class="fa fa-calendar"></i></span>
        </div>

      </div>

      <div class="form-group">
        <label for=""></label>
        <input type="text" name=""  class="form-control" placeholder="" value="<?php echo ($data->judul ?? '') ?>"  >
      </div>

      <div class="form-group">
        <label for=""></label>
        <textarea name="" class="form-control" rows="8" cols="80"><?php echo ($data->isi ?? '')  ?></textarea>
      </div>

    </form>
  </div>
</div>

<div class='modal-footer'>
  <button type='button' class='btn btn-faded pull-left' data-dismiss='modal'>Kembali</button>
  <button type='button' class='btn btn-simpan btn-primary' id="btn-simpan">Simpan</button>
  <button type='button' class='btn btn-info'>Reset</button>
</div>
