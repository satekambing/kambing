<?php
session_start();
require_once("../../../config/config.php");
require_once("../../../config/koneksi.php");
require_once("../../../config/fungsi_adminview.php");
require_once("../../../config/fungsi_keamanan.php");
require_once("../../../config/fungsi_basic.php");

cekLevel('pensiun'); // cek status user.. sudah login / belum.. di izinkan mengakses / tidak

$rowid      = $_POST['jrow'] ?? ''; // mengecek apakah user ngklik tombol edit
$judulModal = ($rowid == '' ? 'Tambah':'Ubah'); // kalau rowid kosong maka tampilkan kata Tambah pada dialog box jika tidak tampilkan Ubah data
$namaHalaman = "pensiun"; // set halaman default

// Konfigurasi Database
$namatable = "tbl_pensiun";
$pk        = "id_pensiun"; // primarykey di table
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
      $sql   = "  SELECT c.*, p.id_pegawai, p.nip, p.nama FROM tbl_pensiun c LEFT JOIN tbl_pegawai p ON c.id_pegawai = p.id_pegawai";
      $sql   .= " WHERE $pk=$rowid";

      // $sql = "SELECT * FROM $namatable WHERE $pk=$rowid";
      if($pensiun=$koneksi->query($sql)){
        if($pensiun->num_rows > 0){
          $data     = $pensiun->fetch_object();
          $ket      = "ubah";

          // cek juga riwayatnya
          $sql2     = "SELECT status,keterangan FROM tbl_riwayat WHERE halaman='$namatable' ";
          $sql2     .= " AND id_halaman=$rowid";
          $sql2     .= " ORDER BY id_riwayat DESC";
          $qriwayat  = $koneksi->query($sql2);
          $riwayat   = $qriwayat->fetch_object();

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
    <form class="form" role="form" method="post" name="pensiun" id="formpensiun">
      <input type="hidden" name="<?php echo $ket ?>" value="<?php echo $data->id_pensiun ?>" >

      <?php if ($_SESSION['level'] != 4): ?>
      <div class="form-group">
        <label for="">NIP</label>
        <select class="form-control selectpicker2" name="nip" data-show-subtext="true" data-live-search="true" style="width: 100%" data-title="Nomor Induk Pegawai">
          <?php if(isset($data->id_pegawai)){ ?>
            <option value="<?php echo $data->nip ?>" selected><?php echo $data->nip.' - '.$data->nama ?></option>
          <?php } ?>
        </select>
      </div>
    <?php endif; ?>
      <div class="form-group">
        <label for="">Tanggal pensiun </label>
        <div class="input-group date">
          <input type="text"name="tanggal_pensiun" placeholder="YYYY-DD-MM" value="<?php echo UbahTanggalKeView($data->tanggal_pensiun??'') ?>"  class="tanggalx form-control" >
          <span class="input-group-addon text-blue"><i class="fa fa-calendar"></i></span>
        </div>

      </div>

      <div class="form-group">
        <label for="">Keterangan</label>
        <textarea name="keterangan" class="form-control" rows="8" cols="80"><?php echo ($data->keterangan ?? '')  ?></textarea>
      </div>

        <?php if ($_SESSION['level'] == 1): ?>
        <div class="form-group">
          <div class="row">
            <div class="col-sm-5">
              <label for="">Status</label>
              <select class="form-control" name="status">
                <?php Dropdown(STATUS_ACC,$riwayat->status??'') ?>
              </select>
            </div>
            <div class="col-sm-7">
              <label for="">Keterangan</label>
              <input type="text" class="form-control" name="ket" value="<?php echo $riwayat->keterangan??'' ?>" placeholder="Keterangan Status">
            </div>
          </div>
        </div>
      <?php endif; ?>

    </form>
  </div>
</div>

<div class='modal-footer'>
  <button type='button' class='btn btn-faded pull-left' data-dismiss='modal'>Kembali</button>
  <button type='button' class='btn btn-simpan btn-primary' id="btn-simpan">Simpan</button>
  <button type='button' class='btn btn-info'>Reset</button>
</div>
