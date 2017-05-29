<?php require_once("../../../config/fungsi_basic.php") ?>
<div class="pesan-form" >
</div>
<form class="form" role="form" method="post" name="biodata">

  <div class="form-group">
    <label for="">NIP</label>
    <select class="form-control selectpicker2" name="nip" data-show-subtext="true" data-live-search="true" style="width: 100%" data-title="Nomor Induk Pegawai">

    </select>
  </div>
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" name="nama" placeholder="Nama Lengkap Pegawai" class="form-control" autofocus>
  </div>

  <div class="form-group">
    <label for="">Jenis Kelamin</label>
    <div class="radio">
      <label for="jenis_kelamin">
        <input type="radio" name="jenis_kelamin" value="l" checked="true">
        Laki - Laki
      </label>
      <label for="jenis_kelamin">
        <input type="radio" name="jenis_kelamin" value="p">
          Perempuan
      </label>
    </div>
  </div>

  <div class="form-group">
    <label for="">Tempat Lahir</label>
    <input type="text" name="tempat_lahir" placeholder="Kota Lahir" class="form-control" >
  </div>

  <div class="form-group">
    <label for="">Tanggal Lahir</label>
    <div class="input-group date" >
      <input type="text"name="tanggal_lahir" placeholder="YYYY-DD-MM" class="tanggalx form-control"  >
      <span class="input-group-addon text-blue"><i class="fa fa-calendar"></i></span>
    </div>
  </div>

  <div class="form-group">
    <label for="">Agama</label>
    <select class="form-control" name="agama">
      <?php KolomAgama() ?>
    </select>
  </div>

  <div class="form-group">
    <label for="">No. Telp</label>
    <input type="text" name="no_telp"  class="form-control">
  </div>

  <div class="form-group">
    <label for="">Email</label>
    <div class="input-group">
      <input type="email" name="email" placeholder="namaemail@example.com"  class="form-control" >
      <span class="input-group-addon">
        <i class="fa fa-envelope text-blue"></i>
      </span>
    </div>
  </div>


  </div>
</form>
<script>
//$(".tanggalx").val("00");
</script>
