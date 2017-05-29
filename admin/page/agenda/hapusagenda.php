<?php
  $halaman   = $_POST['jhal'] ?? '';
  $id   = $_POST['jrow'] ?? '';

  require_once("../../../config/config.php");
  require_once("../../../config/koneksi.php");
  require_once("../../../config/fungsi_adminview.php");


  $namatable  = 'tbl_agenda';
  $pk         =  'id_agenda';

  $query    = $koneksi->query("SELECT * FROM $namatable WHERE $pk=$id");
  $data     = $query->fetch_object();

?>

<div class="modal-header">
  <h4 class="modal-title">Ingin menghapus data <b> <?php echo $halaman ?></b> ? </h4>
</div>

<div class="modal-body">
<div class="pesan-form" >
</div>
<form class="form-horizontal" action="index.html" method="post">

  <div class="form-group">
    <label class="col-sm-3 control-label" for="">Nama Agenda</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" disabled value="<?php echo $data->judul ?>">
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-3 control-label" for="">Tanggal</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" disabled value="<?php echo UbahTanggalKeBulan($data->tanggal_agenda) ?>">
    </div>
  </div>

  <!-- <div class="form-group">
    <label class="col-sm-3 control-label" for="">Status</label>
    <div class="col-sm-9">
      <button type="button" class="btn btn-warning btn-block" name="button">Aman - Tidak ada relasi dengan table lain</button>
    </div>
  </div> -->

</form>

</div>
<div class="modal-footer">
    <button type='button' class='btn btn-simpan btn-danger btn-hapus'>Hapus</button>
    <button type='button' class='btn btn-faded pull-left' data-dismiss='modal'>Kembali</button>
</div>
