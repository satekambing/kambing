<?php require_once("../../../config/fungsi_basic.php") ?>
<div class="pesan-form" >
</div>
<form class="form" role="form" method="post" name="kepangkatan">
  <div class="form-group">
    <label for="">NIP</label>
    <select class="form-control selectpicker2" name="nip" data-show-subtext="true" data-live-search="true" style="width: 100%" data-title="Nomor Induk Pegawai">

    </select>
  </div>
  <div class="form-group">
    <label for="">Nomor SK</label>
    <input type="text" name="no_sk" placeholder="Nomor Surat Keputusan" class="form-control" >
  </div>
  <div class="form-group">
    <label for="">Tanggal SK</label>
    <div class="input-group date">
      <input type="text"name="tanggal_sk" placeholder="YYYY-DD-MM" class="tanggalx form-control"  >
      <span class="input-group-addon text-blue"><i class="fa fa-calendar"></i></span>
    </div>
  </div>
  <div class="form-group">
    <label for="">Jenis Kenaikan</label>
    <input type="text" name="jenis_kenaikan" placeholder="Ini nanti isi sama dropdown select" class="form-control" >
  </div>
  <div class="form-group">
    <label for="">Tanggal Mulai Kerja</label>
    <div class="input-group date">
      <input type="text"name="tmt" placeholder="YYYY-DD-MM" class="tanggalx form-control"  >
      <span class="input-group-addon text-blue"><i class="fa fa-calendar"></i></span>
    </div>
  </div>

</form>
<script>
//$(".tanggalx").val("00");
</script>
