<?php
$halaman   = $_POST['jhal'] ?? ''; // variable jhal + jrow berasal dari ajax
$id        = $_POST['jrow'] ?? '';
$table     = $_POST['jtable'] ?? '';

require_once("../../../config/config.php");
require_once("../../../config/koneksi.php");
require_once("../../../config/fungsi_adminview.php");
require_once("../../../config/fungsi_keamanan.php");
session_start();

cekLevel('keluarga'); // cek status user.. sudah login / belum.. di izinkan mengakses / tidak
if($table == "keluarga"){
  // kalau halaman keluarga yg di hapus
  $namatable  = 'tbl_keluarga';
  $pk         =  'id_keluarga'; // primarykey table

  //$sql   = "  SELECT c.*, p. FROM tbl_ c LEFT JOIN tbl_ p ON c.id_pegawai = p.id_pegawai";
  // $sql   .= " WHERE $pk=$rowid";
  $sql      = "SELECT * FROM $namatable WHERE $pk=$id";
  $query    = $koneksi->query($sql);
  $data     = $query->fetch_object();

  ?>

  <div class="modal-header">
    <h4 class="modal-title">Ingin menghapus data <?php echo $table ?> ? </h4>
  </div>

  <div class="modal-body">
    <div class="pesan-form">
      <!-- Pesan Kesalahan -->
    </div>
    <form class="form-horizontal" method="post">

      <div class="form-group">
        <label class="col-sm-3 control-label" for="">Nama keluarga</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" disabled value="<?php echo $data->nama ?>">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-3 control-label" for="">Tempat - Tgl Lahir</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" disabled value="<?php echo $data->tempat_lahir.' - '.UbahTanggalKeBulan($data->tanggal_lahir) ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="">Pekerjaan</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" disabled value="<?php echo $data->pekerjaan ?>">
        </div>
      </div>
    </form>

  </div>
  <div class="modal-footer">
      <button type='button' class='btn btn-simpan btn-danger btn-hapus'>Hapus</button>
      <button type='button' class='btn btn-faded pull-left' data-dismiss='modal'>Kembali</button>
  </div>
<?php }
elseif($table == "pendidikan"){
  $namatable  = 'tbl_pendidikan';
  $pk         = 'id_pendidikan'; // primarykey table

  //$sql   = "  SELECT c.*, p. FROM tbl_ c LEFT JOIN tbl_ p ON c.id_pegawai = p.id_pegawai";
  // $sql   .= " WHERE $pk=$rowid";
  $sql      = "SELECT * FROM $namatable WHERE $pk=$id";
  $query    = $koneksi->query($sql);
  $data     = $query->fetch_object();

  ?>

  <div class="modal-header">
    <h4 class="modal-title">Ingin menghapus data <?php echo $table ?> ? </h4>
  </div>

  <div class="modal-body">
    <div class="pesan-form">
      <!-- Pesan Kesalahan -->
    </div>
    <form class="form-horizontal" method="post">

      <div class="form-group">
        <label class="col-sm-3 control-label" for="">Tingkat Pendidikan</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" disabled value="<?php echo $data->tingkat_pendidikan ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="">Jurusan</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" disabled value="<?php echo $data->jurusan ?>">
        </div>
      </div>
    </form>

  </div>
  <div class="modal-footer">
      <button type='button' class='btn btn-simpan btn-danger btn-hapus'>Hapus</button>
      <button type='button' class='btn btn-faded pull-left' data-dismiss='modal'>Kembali</button>
  </div>
<?php  } ?>
