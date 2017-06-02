<?php
session_start();
require_once("../../../config/config.php");
require_once("../../../config/koneksi.php");
require_once("../../../config/fungsi_adminview.php");
require_once("../../../config/fungsi_keamanan.php");
require_once("../../../config/fungsi_basic.php");

cekLevel('user'); // cek status user.. sudah login / belum.. di izinkan mengakses / tidak

$rowid      = $_POST['jrow'] ?? ''; // mengecek apakah user ngklik tombol edit
$judulModal = ($rowid == '' ? 'Tambah':'Ubah'); // kalau rowid kosong maka tampilkan kata Tambah pada dialog box jika tidak tampilkan Ubah data
$namaHalaman = "User"; // set halaman default

// Konfigurasi Database
$namatable = "tbl_user";
$pk        = "id_user"; // primarykey di table
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
      if($user=$koneksi->query($sql)){
        if($user->num_rows > 0){
          $data     = $user->fetch_object();
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
    <form class="form" role="form" method="post" name="user" id="formuser">
      <input type="hidden" name="<?php echo $ket ?>" value="<?php echo $data->id_user ?>" >

      <div class="form-group">
        <label for="">Username</label>
        <input type="text" name="username"  class="form-control" placeholder="Username" autofocus value="<?php echo ($data->username ?? '') ?>"  >
      </div>
      <div class="form-group">
        <label for="">Nama Lengkap</label>
        <input type="text" name="namalengkap"  class="form-control" placeholder="Nama Lengkap " value="<?php echo ($data->namalengkap ?? '') ?>"  >
      </div>
      <div class="form-group">
        <label for="">Email</label>
        <input type="email" name="email"  class="form-control" placeholder="exp: contoh@gmail.com" value="<?php echo ($data->email ?? '') ?>"  >
      </div>
      <div class="form-group">
        <label for="">Level <?php echo $data->level?></label>
        <select class="form-control" name="level">
          <?php Dropdown(LEVEL_USER, $data->level??'') ?>
        </select>
      </div>
      <div class="form-group <?php echo (isset($data->pass) ? 'has-warning':''); ?>">
        <label for="">Password</label>
        <input type="password" name="pass"  class="form-control" placeholder="Password" value=""  >

        <?php if (isset($data->pass)){ ?>
          <span class="help-block">Kosongkan Password bila tidak ingin mengubahnya</span>
        <?php } ?>
      </div>
      <div class="form-group">
        <!-- <select class="form-control" name=""> -->
        <!-- </select> -->
      </div>
    </form>
  </div>
</div>

<div class='modal-footer'>
  <button type='button' class='btn btn-faded pull-left' data-dismiss='modal'>Kembali</button>
  <button type='button' class='btn btn-simpan btn-primary' id="btn-simpan">Simpan</button>
  <button type='button' class='btn btn-info'>Reset</button>
</div>
