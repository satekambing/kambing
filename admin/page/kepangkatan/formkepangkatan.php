<?php
session_start();
require_once("../../../config/config.php");
require_once("../../../config/koneksi.php");
require_once("../../../config/fungsi_adminview.php");
require_once("../../../config/fungsi_basic.php");
require_once("../../../config/fungsi_keamanan.php");

cekLevel('kepangkatan'); // cek status user.. sudah login / belum.. di izinkan mengakses / tidak

$rowid      = $_POST['jrow'] ?? ''; // mengecek apakah user ngklik tombol edit
$judulModal = ($rowid == '' ? 'Tambah':'Ubah'); // kalau rowid kosong maka tampilkan kata Tambah pada dialog box jika tidak tampilkan Ubah data
$namaHalaman = "kepangkatan"; // set halaman default

// Konfigurasi Database
$namatable = "tbl_kepangkatan";
$pk        = "id_kepangkatan"; // primarykey di table
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
      $sql   = "  SELECT c.*, p.id_pegawai,p.nip,p.nama FROM tbl_kepangkatan c LEFT JOIN tbl_pegawai p ON c.id_pegawai = p.id_pegawai";
      $sql   .= " WHERE $pk=$rowid";

      // $sql = "SELECT * FROM $namatable WHERE $pk=$rowid";
      if($kepangkatan=$koneksi->query($sql)){
        if($kepangkatan->num_rows > 0){
          $data     = $kepangkatan->fetch_object();
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
    <form class="form" role="form" method="post" name="kepangkatan" id="formkepangkatan">
      <input type="hidden" name="<?php echo $ket ?>" value="<?php echo $data->id_kepangkatan ?>" >

      <div class="form-group">
        <label for="">NIP</label>
        <select class="form-control selectpicker2" name="nip" data-show-subtext="true" data-live-search="true" style="width: 100%" data-title="Nomor Induk Pegawai">
          <?php if(isset($data->id_pegawai)){ ?>
            <option value="<?php echo $data->nip ?>" selected><?php echo $data->nip.' - '.$data->nama ?></option>
          <?php } ?>
        </select>
      </div>

      <div class="form-group">
        <label for="">NO SK </label>
        <input type="text" name="no_sk"  class="form-control" placeholder="Nomor Surat Keputusan" value="<?php echo ($data->no_sk ?? '') ?>"  >
      </div>
      <div class="form-group">
        <label for="">Tanggal SK </label>
        <div class="input-group date">
          <input type="text"name="tanggal_sk" placeholder="YYYY-DD-MM" value="<?php echo UbahTanggalKeView($data->tanggal_sk??'') ?>"  class="tanggalx form-control" >
          <span class="input-group-addon text-blue"><i class="fa fa-calendar"></i></span>
        </div>

      </div>
      <div class="form-group">
        <label for="">Jenis Kenaikan</label>
        <select class="form-control" name="jenis_kenaikan">
          <?php DropDown(JENIS_KENAIKANPANGKAT,($data->jenis_kenaikan??'')) ?>
        </select>
      </div>
      <div class="form-group">
        <label for="">Tanggal Mulai Tugas (TMT) </label>
        <div class="input-group date">
          <input type="text"name="tmt" placeholder="YYYY-DD-MM" value="<?php echo UbahTanggalKeView($data->tmt??'') ?>"  class="tanggalx form-control" >
          <span class="input-group-addon text-blue"><i class="fa fa-calendar"></i></span>
        </div>

      </div>
    </form>
  </div>
</div>

<div class='modal-footer'>
  <button type='button' class='btn btn-faded pull-left' data-dismiss='modal'>Kembali</button>
  <button type='button' class='btn btn-simpan btn-primary' id="btn-simpan">Simpan</button>
  <button type='button' class='btn btn-info'>Reset</button>
</div>
