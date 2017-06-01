<?php require_once("../../../config/fungsi_basic.php") ?>
<div class="pesan-form" >
</div>
<form class="form" role="form" method="post" name="diklat">

  <div class="form-group">
    <label for="">NIP</label>
    <select class="form-control selectpicker2" name="nip" data-show-subtext="true" data-live-search="true" style="width: 100%" data-title="Nomor Induk Pegawai">

    </select>
  </div>
  <div class="form-group">
    <label for="nama">Nama Diklat</label>
    <input type="text" name="nama_diklat" placeholder="Nama Diklat " class="form-control" >
  </div>
  <div class="form-group">
    <label for="nama">Lama</label>
    <div class="row">
      <div class="col-lg-7">
        <input type="text" name="lama" placeholder="Lama Mengikut Diklat" class="form-control" >
      </div>
      <div class="col-lg-5">
        <select class="form-control" name="lama_waktu">
          <?php KolomWaktu() ?>
        </select>
      </div>
    </div>

  </div>
  <div class="form-group">
    <label for="">Tahun</label>
    <input type="text" name="tahun_penyelenggaraan" placeholder="Tahun Penyelenggaraan" class="form-control" >
  </div>
  <div class="form-group">
    <label for="">Tanggal STTPP</label>
    <div class="input-group date" >
      <input type="text" name="tanggal_sttpp" placeholder="YYYY-DD-MM" class="tanggalx form-control"  >
      <span class="input-group-addon text-blue"><i class="fa fa-calendar"></i></span>
    </div>
  </div>

  <div class="form-group">
    <label for="">No. STTPP</label>
    <input type="text" name="no_sttpp" placeholder="Nomor - Surat Tanda Tamat Pendidikan dan Pelatihan" class="form-control" >
  </div>



  </div>
</form>
<script>
//$(".tanggalx").val("00");
</script>
