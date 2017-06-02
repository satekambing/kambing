<?php
echo JudulHalaman(['Profil','Menampilkan profil web']); // Judul Halaman - Deskripsi
$sql    = " SELECT * FROM tbl_profil";
$profil = $koneksi->query($sql);
$r      = $profil->fetch_object();
?>
<div class="content-header">
  <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Visi Misi</a></li>
        <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Tugas Pokok</a></li>
        <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Fungsi</a></li>
        <!-- <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li> -->
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
          <?php  ?>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2">
          bagian tugas pokok
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_3">
          bagian fungsi
        </div>
        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div>
</div>
