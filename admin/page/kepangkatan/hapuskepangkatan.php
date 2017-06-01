<?php
$halaman   = $_POST['jhal'] ?? ''; // variable jhal + jrow berasal dari ajax
$id        = $_POST['jrow'] ?? '';

require_once("../../../config/config.php");
require_once("../../../config/koneksi.php");
require_once("../../../config/fungsi_adminview.php");
require_once("../../../config/fungsi_keamanan.php");
session_start();
cekLevel('kepangkatan'); // cek status user.. sudah login / belum.. di izinkan mengakses / tidak

$namatable  = 'tbl_kepangkatan';
$pk         =  'id_kepangkatan'; // primarykey table

$sql   = "  SELECT c.*, p.id_pegawai,p.nip,p.nama FROM tbl_kepangkatan c LEFT JOIN tbl_pegawai p ON c.id_pegawai = p.id_pegawai";
$sql   .= " WHERE $pk=$id";
// $sql      = "SELECT * FROM $namatable WHERE $pk=$id";
$query    = $koneksi->query($sql);
$data     = $query->fetch_object();

?>

<div class="modal-header">
  <h4 class="modal-title">Ingin menghapus data <b> <?php echo $halaman ?></b> ? </h4>
</div>

<div class="modal-body">
  <div class="pesan-form">
    <!-- Pesan Kesalahan -->
  </div>
  <form class="form-horizontal" action="index.html" method="post">

    <div class="form-group">
      <label class="col-sm-3 control-label" for="">NIP</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" disabled value="<?php echo $data->nip ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label" for="">Nama Pegawai</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" disabled value="<?php echo $data->nama ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label" for="">Jenis Kenaikan</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" disabled value="<?php echo $data->jenis_kenaikan ?>">
      </div>
    </div>
  </form>

</div>
<div class="modal-footer">
    <button type='button' class='btn btn-simpan btn-danger btn-hapus'>Hapus</button>
    <button type='button' class='btn btn-faded pull-left' data-dismiss='modal'>Kembali</button>
</div>
