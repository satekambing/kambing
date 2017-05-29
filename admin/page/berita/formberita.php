<?php require_once("../../../config/fungsi_basic.php") ?>
<div class="pesan-form" >
</div>
<form class="form" role="form" method="post" name="berita" enctype="multipart/form-data">
  <div class="form-group">
    <label for="">Tanggal Post</label>
    <div class="input-group date">
      <input type="text"name="tanggal_post" placeholder="YYYY-DD-MM" class="tanggalx form-control"  >
      <span class="input-group-addon text-blue"><i class="fa fa-calendar"></i></span>
    </div>
  </div>
  <div class="form-group">
    <label for="">Judul</label>
    <input type="text" name="judul" class="form-control" placeholder="Judul Berita">
  </div>
  <div class="form-group">
    <label for="">Isi Berita</label>
    <textarea name="isi" class="form-control" rows="8" cols="80"></textarea>
  </div>
  <div class="form-group">
    <label for="">Kategori</label>
    <input type="text" name="kategori" class="form-control" placeholder="Kategori">
  </div>
  <div class="form-group">
    <label for="">Sumber</label>
    <input type="text" name="sumber" class="form-control" placeholder="contoh : http://google.com">
  </div>
  <div class="form-group">
    <label for="">Gambar</label>
    <input type="file" name="gambar" class="form-control">
  </div>
</form>
<script>
//$(".tanggalx").val("00");
</script>
