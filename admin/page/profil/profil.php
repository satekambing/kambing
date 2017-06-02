<?php
echo JudulHalaman(['Profil','Menampilkan profil web']); // Judul Halaman - Deskripsi
$sql    = " SELECT * FROM tbl_profil";
$profil = $koneksi->query($sql);
$r      = $profil->fetch_object();
?>
<div class="content-header">
  <div class="pesan-form">

  </div>
  <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Visi Misi</a></li>
        <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Tugas Pokok</a></li>
        <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Fungsi</a></li>
        <!-- <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li> -->
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
          <form method="POST" class="form formEditor" id="formvisi_misi">
            <textarea name="visi_misi" class="EditorMCE" id="textvisi_misi" rows="15" cols="80">
              <?php echo ($r->visi_misi??'')?>
            </textarea>
            <br />
          </form>
            <button name="submitbtn" class="btn btn-primary btnEditor" data-halaman="profil" data-kolom="visi_misi" >Simpan</button>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2">
            <form method="POST" class="form formEditor" id="formtugas_pokok">
              <textarea name="tugas_pokok" class="EditorMCE" id="texttugas_pokok" rows="100" cols="80">
                <?php echo ($r->tugas_pokok??'')?>
              </textarea>
              <br />
            </form>
              <button name="submitbtn" class="btn btn-primary btnEditor" data-halaman="profil" data-kolom="tugas_pokok" >Simpan</button>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_3">
            <form method="POST" class="form formEditor" id="formfungsi">
              <textarea name="fungsi" class="EditorMCE" id="textfungsi" rows="22" cols="80">
                <?php echo ($r->fungsi??'')?>
              </textarea>
              <br />
            </form>
              <button name="submitbtn" class="btn btn-primary btnEditor" data-halaman="profil" data-kolom="fungsi" >Simpan</button>
        </div>
        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div>
</div>
