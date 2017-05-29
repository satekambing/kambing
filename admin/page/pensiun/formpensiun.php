<?php require_once("../../../config/fungsi_basic.php") ?>
<div class="pesan-form" >
</div>
<form class="form" role="form" method="post" name="pensiun">
  <div class="form-group">
    <label for="">NIP</label>
    <select class="form-control selectpicker2" name="nip" data-show-subtext="true" data-live-search="true" style="width: 100%" data-title="Nomor Induk Pegawai">

    </select>
  </div>
  <div class="form-group">
    <label for="">Tanggal Pensiun</label>
    <div class="input-group date">
      <input type="text"name="tanggal_pensiun" placeholder="YYYY-DD-MM" class="tanggalx form-control"  >
      <span class="input-group-addon text-blue"><i class="fa fa-calendar"></i></span>
    </div>
  </div>
  <div class="form-group">
    <label for="">Keterangan</label>
    <textarea name="keterangan" class="form-control" rows="8" cols="80"></textarea>

  </div>

</form>
<script>
//$(".tanggalx").val("00");
</script>
