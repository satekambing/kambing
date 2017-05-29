<?php require_once("../../../config/fungsi_basic.php") ?>
<div class="pesan-form" >
</div>
<form class="form" role="form" method="post" name="user">
  <div class="form-group">
    <label for="">Username</label>
    <input type="text" name="username" class="form-control" placeholder="Username / NIP">
  </div>
  <div class="form-group">
    <label for="">Nama Lengkap</label>
    <input type="text" name="namalengkap" class="form-control" placeholder="Nama Lengkap">
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
  <div class="form-group">
    <label for="">Password</label>
    <div class="input-group">
      <input type="password" name="pass" placeholder="Minimal 6 Karakter"  class="form-control" >
      <span class="input-group-addon">
        <i class="fa fa-key text-blue"></i>
      </span>
    </div>
  </div>
  <div class="form-group">
    <label for="">Level</label>
    <select class="form-control" name="level">
      <?php KolomUser() ?>
    </select>
  </div>
  <div class="form-group">
    <label for="">Status</label>
    <select class="form-control" name="status">
      <?php KolomStatus() ?>
    </select>
  </div>
</form>
<script>
//$(".tanggalx").val("00");
</script>
