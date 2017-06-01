<?php
session_start();
require_once("../../../config/config.php");
require_once("../../../config/koneksi.php");
require_once("../../../config/fungsi_adminview.php");
require_once("../../../config/fungsi_keamanan.php");

cekLevel('cuti'); // cek status user.. sudah login / belum.. di izinkan mengakses / tidak

$rowid      = $_POST['jrow'] ?? ''; // mengecek apakah user ngklik tombol edit
$judulModal = ($rowid == '' ? 'Tambah':'Ubah'); // kalau rowid kosong maka tampilkan kata Tambah pada dialog box jika tidak tampilkan Ubah data
$namaHalaman = "Cuti"; // set halaman default

// Konfigurasi Database
$namatable = "tbl_cuti";
$pk        = "id_cuti"; // primarykey di table
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
      $sql   = "  SELECT c.*,p.nip,p.nama FROM tbl_cuti c LEFT JOIN tbl_pegawai p ON c.id_pegawai = p.id_pegawai";
      $sql   .= " WHERE $pk=$rowid";
      if($cuti=$koneksi->query($sql)){
        if($cuti->num_rows > 0){
          $data     = $cuti->fetch_object();
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
    <form class="form" role="form" method="post" name="cuti" id="formcuti">
      <input type="hidden" name="<?php echo $ket ?>" value="<?php echo $data->id_cuti ?>" >
      <div class="form-group">
        <label for="">NIP</label>
        <select class="form-control selectpicker2" name="nip" data-show-subtext="true" data-live-search="true" style="width: 100%" data-title="Nomor Induk Pegawai">
          <?php if(isset($data->id_pegawai)){ ?>
            <option value="<?php echo $data->nip ?>" selected><?php echo $data->nip.' - '.$data->nama ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label for="">Nomor Surat</label>
        <input type="text" name="no_surat" placeholder="Nomor Surat Cuti" class="form-control" value="<?php echo ($data->no_surat??'') ?>" >
      </div>
      <div class="form-group">
        <label for="">Tanggal Surat Dibuat</label>
        <div class="input-group date">
          <input type="text"name="tanggal_surat" placeholder="YYYY-DD-MM" class="tanggalx form-control" value="<?php echo UbahTanggalKeView($data->tanggal_cuti??'') ?>"  >
          <span class="input-group-addon text-blue"><i class="fa fa-calendar"></i></span>
        </div>
      </div>
      <div class="form-group">
        <label for="">Tanggal Cuti</label>
        <div class="input-group date">
          <input type="text" name="tanggal_mulaiakhir" placeholder="YYYY-DD-MM" class="tanggalpicker form-control" value="<?php echo UbahTanggalKeView($data->tanggal_mulai??'').' - '.UbahTanggalKeView($data->tanggal_selesai??'') ?>" >
          <span class="input-group-addon text-blue"><i class="fa fa-calendar"></i></span>
        </div>
      </div>
      <div class="form-group">
        <label for="">Jenis</label>
        <input type="text" name="jenis_cuti" placeholder="Contoh : Liburan / Sakit " class="form-control" value="<?php echo ($data->jenis_cuti??'') ?>" >
      </div>
      <div class="form-group">
        <label for="">Keterangan</label>
        <textarea name="keterangan" rows="5" cols="80" class="form-control" ><?php echo ($data->keterangan??'') ?></textarea>
      </div>

    </form>
  </div>
</div>

<div class='modal-footer'>
  <button type='button' class='btn btn-faded pull-left' data-dismiss='modal'>Kembali</button>
  <button type='button' class='btn btn-simpan btn-primary' id="btn-simpan">Simpan</button>
  <button type='button' class='btn btn-info'>Reset</button>
</div>
