<?php
session_start();
require_once("../../../config/config.php");
require_once("../../../config/koneksi.php");
require_once("../../../config/fungsi_adminview.php");
require_once("../../../config/fungsi_keamanan.php");
require_once("../../../config/fungsi_basic.php");

cekLevel('diklat'); // cek status user.. sudah login / belum.. di izinkan mengakses / tidak

$rowid      = $_POST['jrow'] ?? ''; // mengecek apakah user ngklik tombol edit
$judulModal = ($rowid == '' ? 'Tambah':'Ubah'); // kalau rowid kosong maka tampilkan kata Tambah pada dialog box jika tidak tampilkan Ubah data
$namaHalaman = "diklat"; // set halaman default

// Konfigurasi Database
$namatable = "tbl_diklat";
$pk        = "id_diklat"; // primarykey di table
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
      $sql   = "  SELECT c.*, p.id_pegawai,p.nip,p.nama FROM tbl_diklat c LEFT JOIN tbl_pegawai p ON c.id_pegawai = p.id_pegawai";
      $sql   .= " WHERE $pk=$rowid";

      // $sql = "SELECT * FROM $namatable WHERE $pk=$rowid";
      if($diklat=$koneksi->query($sql)){
        if($diklat->num_rows > 0){
          $data     = $diklat->fetch_object();
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
    <form class="form" role="form" method="post" name="diklat" id="formdiklat">
      <input type="hidden" name="<?php echo $ket ?>" value="<?php echo $data->id_diklat ?>" >

      <div class="form-group">
        <label for="">NIP</label>
        <select class="form-control selectpicker2" name="nip" data-show-subtext="true" data-live-search="true" style="width: 100%" data-title="Nomor Induk Pegawai">
          <?php if(isset($data->id_pegawai)){ ?>
            <option value="<?php echo $data->nip ?>" selected><?php echo $data->nip.' - '.$data->nama ?></option>
          <?php } ?>
        </select>
      </div>


      <div class="form-group">
        <label for="">Nama Diklat</label>
        <input type="text" name="nama_diklat"  class="form-control" placeholder="Nama Diklat" value="<?php echo ($data->nama_diklat ?? '') ?>"  >
      </div>
      <div class="form-group">
        <label for="">Lama</label>
        <input type="text" name="lama"  class="form-control" placeholder="lama diklat" value="<?php echo ($data->lama ?? '') ?>"  >
      </div>
      <div class="form-group">
        <label for="">Lama Waktu Per</label>
        <select class="form-control" name="lama_waktu">
          <?php Dropdown(['Jam','Hari','Minggu','Bulan'],$data->lama_waktu??'') ?>
        </select>
      </div>
      <div class="form-group">
        <label for="">Tahun</label>
        <input type="year" name="tahun_penyelenggaraan"  class="form-control" placeholder="" value="<?php echo ($data->tahun_penyelenggaraan?? '') ?>"  >
      </div>


      <div class="form-group">
        <label for="">Tanggal STTPP</label>
        <div class="input-group date">
          <input type="text"name="tanggal_sttpp" placeholder="YYYY-DD-MM" value="<?php echo UbahTanggalKeView($data->tanggal_sttpp??'') ?>"  class="tanggalx form-control" >
          <span class="input-group-addon text-blue"><i class="fa fa-calendar"></i></span>
        </div>
      </div>

      <div class="form-group">
        <label for="">No. STTPP</label>
        <input type="text" name="no_sttpp"  class="form-control" placeholder="Nomor Surat Tanda Tamat Pendidikan dan Pelatihan" value="<?php echo ($data->no_sttpp?? '') ?>"  >
      </div>

    </form>
  </div>
</div>

<div class='modal-footer'>
  <button type='button' class='btn btn-faded pull-left' data-dismiss='modal'>Kembali</button>
  <button type='button' class='btn btn-simpan btn-primary' id="btn-simpan">Simpan</button>
  <button type='button' class='btn btn-info'>Reset</button>
</div>
