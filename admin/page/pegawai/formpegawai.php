<?php
session_start();
require_once("../../../config/config.php");
require_once("../../../config/koneksi.php");
require_once("../../../config/fungsi_basic.php");
require_once("../../../config/fungsi_adminview.php");
require_once("../../../config/fungsi_keamanan.php");

cekLevel('pegawai'); // cek status user.. sudah login / belum.. di izinkan mengakses / tidak

$rowid      = $_POST['jrow'] ?? ''; // mengecek apakah user ngklik tombol edit
$judulModal = ($rowid == '' ? 'Tambah':'Ubah'); // kalau rowid kosong maka tampilkan kata Tambah pada dialog box jika tidak tampilkan Ubah data
$namaHalaman = "Pegawai"; // set halaman default

// Konfigurasi Database
$namatable = "tbl_pegawai";
$pk        = "id_pegawai"; // primarykey di table
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
      if($pegawai=$koneksi->query($sql)){
        if($pegawai->num_rows > 0){
          $data     = $pegawai->fetch_object();
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
    <form class="form" role="form" method="post" name="pegawai" id="formpegawai" enctype="multipart/form-data">
      <input type="hidden" name="<?php echo $ket ?>" value="<?php echo $data->id_pegawai ?>" >

      <div class="form-group">
        <label for="">NIP</label>
        <input type="text" name="nip"  class="form-control" placeholder="Nomor Induk Pegawai" autofocus value="<?php echo ($data->nip ?? '') ?>"  >
      </div>
      <div class="form-group">
        <label for="">Nama Lengkap</label>
        <input type="text" name="namalengkap"  class="form-control" placeholder="Nama Lengkap" value="<?php echo ($data->namalengkap ?? '') ?>"  >
      </div>
      <div class="form-group">
        <label for="">Jenis Kelamin</label>
        <div class="radio">

          <label>
            <input type="radio" name="jenis_kelamin" id="jenis_kelaminl" value="L" checked="">
            Laki - Laki
          </label> &nbsp
          <label class="radio-inline">
            <input type="radio" name="jenis_kelamin" id="jenis_kelaminp" value="P" >
            Perempuan
          </label>
        </div>

      </div>
      <div class="form-group">
        <label for="">Tempat Lahir</label>
        <input type="text" name="tempat_lahir"  class="form-control" placeholder="Tempat Lahir" value="<?php echo ($data->judul ?? '') ?>"  >
      </div>
      <div class="form-group">
        <label for="">Tanggal Lahir </label>
        <div class="input-group date">
          <input type="text" name="tanggal_lahir" placeholder="YYYY-DD-MM" value="<?php echo UbahTanggalKeView($data->tanggal_lahir??'') ?>"  class="tanggalx form-control" >
          <span class="input-group-addon text-blue"><i class="fa fa-calendar"></i></span>
        </div>
      </div>

      <div class="form-group">
        <label for="">Agama</label>
        <select class="form-control" name="agama">
          <?php KolomAgama() ?>
        </select>
      </div>
      <div class="form-group">
        <label for="">No Telp</label>
        <input type="text" name="no_telp"  class="form-control" placeholder="No Telp" value="<?php echo ($data->no_telp ?? '') ?>"  >
      </div>
      <div class="form-group">
        <label for="">Email</label>
        <input type="email" name="email"  class="form-control" placeholder="Contoh : test@gmail.com" value="<?php echo ($data->email ?? '') ?>"  >
      </div>
      <div class="form-group">
        <label for="">Foto</label>
        <input type="file" name="gambar" class="form-control">
      </div>

    </form>
  </div>
</div>

<div class='modal-footer'>
  <button type='button' class='btn btn-faded pull-left' data-dismiss='modal'>Kembali</button>
  <button type='button' class='btn btn-simpan btn-primary' id="btn-simpan">Simpan</button>
  <button type='button' class='btn btn-info'>Reset</button>
</div>
