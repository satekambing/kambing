<?php
session_start();
$halaman   = $_POST['jhal'] ?? ''; // variable jhal + jrow berasal dari ajax
$id        = $_POST['jrow'] ?? '';

require_once("../../../config/config.php");
require_once("../../../config/koneksi.php");
require_once("../../../config/fungsi_adminview.php");
require_once("../../../config/fungsi_keamanan.php");
cekLevel('user'); // cek status user.. sudah login / belum.. di izinkan mengakses / tidak

$namatable  = 'tbl_user';
$pk         =  'id_user'; // primarykey table

$query    = $koneksi->query("SELECT * FROM $namatable WHERE $pk=$id");
$data     = $query->fetch_object();

?>

<div class="modal-header">
  <h4 class="modal-title">Ingin menghapus data <b> <?php echo $halaman ?></b> ? </h4>
</div>

<div class="modal-body">
  <div class="pesan-form">
    <!-- Pesan Kesalahan -->
  </div>
  <form class="form" action="index.html" method="post">
    <div class="form-group">
      <label for="">Nama Lengkap</label>
      <input type="text" name="namalengkap"  class="form-control" placeholder="Nama Lengkap " value="<?php echo ($data->namalengkap ?? '') ?>"  >
    </div>
    <div class="form-group">
      <label for="">Email</label>
      <input type="email" name="email"  class="form-control" placeholder="exp: contoh@gmail.com" value="<?php echo ($data->email ?? '') ?>"  >
    </div>
  </form>

</div>
<div class="modal-footer">
    <button type='button' class='btn btn-simpan btn-danger btn-hapus'>Hapus</button>
    <button type='button' class='btn btn-faded pull-left' data-dismiss='modal'>Kembali</button>
</div>
