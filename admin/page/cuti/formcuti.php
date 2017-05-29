<?php require_once("../../../config/fungsi_basic.php") ?>
<div class="pesan-form" >
</div>
<form class="form" role="form" method="post" name="cuti">
  <div class="form-group">
    <label for="">NIP</label>
    <select class="form-control selectpicker2" name="nip" data-show-subtext="true" data-live-search="true" style="width: 100%" data-title="Nomor Induk Pegawai">

    </select>
  </div>
  <div class="form-group">
    <label for="">Nomor Surat</label>
    <input type="text" name="no_surat" placeholder="Nomor Surat Cuti" class="form-control" >
  </div>
  <div class="form-group">
    <label for="">Tanggal Surat Dibuat</label>
    <div class="input-group date">
      <input type="text"name="tanggal_surat" placeholder="YYYY-DD-MM" class="tanggalx form-control"  >
      <span class="input-group-addon text-blue"><i class="fa fa-calendar"></i></span>
    </div>
  </div>
  <div class="form-group">
    <label for="">Tanggal Cuti</label>
    <div class="input-group date">
      <input type="text"name="tanggal_mulaiakhir" placeholder="YYYY-DD-MM" class="tanggalpicker form-control"  >
      <span class="input-group-addon text-blue"><i class="fa fa-calendar"></i></span>
    </div>
  </div>
  <div class="form-group">
    <label for="">Jenis</label>
    <input type="text" name="jenis_cuti" placeholder="Contoh : Liburan / Sakit " class="form-control" >
  </div>
  <div class="form-group">
    <label for="">Keterangan</label>
    <textarea name="keterangan" rows="5" cols="80" class="form-control"></textarea>
  </div>


  </div>
</form>
<script>
//$(".tanggalx").val("00");
</script>
