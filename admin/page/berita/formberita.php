<?php
session_start();
require_once("../../../config/config.php");
require_once("../../../config/koneksi.php");
require_once("../../../config/fungsi_adminview.php");
require_once("../../../config/fungsi_keamanan.php");
require_once("../../../config/fungsi_basic.php");

cekLevel('berita'); // cek status user.. sudah login / belum.. di izinkan mengakses / tidak

$rowid      = $_POST['jrow'] ?? ''; // mengecek apakah user ngklik tombol edit
$judulModal = ($rowid == '' ? 'Tambah':'Ubah'); // kalau rowid kosong maka tampilkan kata Tambah pada dialog box jika tidak tampilkan Ubah data
$namaHalaman = "berita"; // set halaman default

// Konfigurasi Database
$namatable = "tbl_berita";
$pk        = "id_berita"; // primarykey di table
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
      //$sql   = "  SELECT satu.*, dua. FROM tbl_ c LEFT JOIN tbl_ p ON c.id_pegawai = p.id_pegawai";
      // $sql   .= " WHERE $pk=$rowid";

      $sql = "SELECT * FROM $namatable WHERE $pk=$rowid";
      if($berita=$koneksi->query($sql)){
        if($berita->num_rows > 0){
          $data     = $berita->fetch_object();
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
    <form class="form" role="form" method="post" name="berita" id="formberita" enctype="multipart/form-data">
      <input type="hidden" name="<?php echo $ket ?>" value="<?php echo $data->id_berita ?>" >
      <div class="form-group">
        <label for="">Tanggal Berita </label>
        <div class="input-group date">
          <input type="text"name="tanggal_post" placeholder="YYYY-DD-MM" value="<?php echo UbahTanggalKeView($data->tanggal_berita??'') ?>"  class="tanggalwaktu form-control" >
          <span class="input-group-addon text-blue"><i class="fa fa-calendar"></i></span>
        </div>

      </div>
      <div class="form-group">
        <label for="">Judul</label>
        <input type="text" name="judul"  class="form-control" placeholder="Judul Berita" autofocus="" value="<?php echo ($data->judul ?? '') ?>"  >
      </div>

      <div class="form-group">
        <label for="">Isi</label>
        <textarea name="isi" class="form-control" rows="8" cols="80"><?php echo ($data->isi ?? '')  ?></textarea>
      </div>
      <div class="form-group">
        <label for="">Kategori</label>
        <select class="form-control" name="kategori">
          <?php Dropdown(['BERITA','PENGUMUMAN'],$data->kategori ?? '') ?>
        </select>
      </div>
      <div class="form-group">
        <label for="">Sumber</label>
        <input type="text" name="sumber"  class="form-control" placeholder="Kosongkan jika tidak ada" value="<?php echo ($data->sumber ?? '') ?>"  >
      </div>
      <div class="form-group">
        <label for="">Foto</label>
        <input type="file" name="gambar" class="form-control">
        <?php if(isset($data->foto) && (!$data->foto == "")){ ?>
          <input type="hidden" name="gambar2" value="<?php echo $data->foto ?>">
          <div class="pull-right">
            <p class="text-warning">* Kosongkan File Jika Tidak ingin mengganti</p>
          </div>
            <img class="img-thumbnail " src="../files/foto_berita/<?php echo $data->foto ?>" width="150px" alt="">
        <?php } ?>
      </div>


    </form>
  </div>
</div>

<div class='modal-footer'>
  <button type='button' class='btn btn-faded pull-left' data-dismiss='modal'>Kembali</button>
  <button type='button' class='btn btn-simpan btn-primary' id="btn-simpan">Simpan</button>
  <button type='button' class='btn btn-info'>Reset</button>
</div>
