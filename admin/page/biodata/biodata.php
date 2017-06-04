<?php
cekLevel('biodata');
echo JudulHalaman(['BIODATA','Menampilkan Biodata Pegawai']); // Judul Halaman - Deskripsi

// $profil->close();
require("../config/fungsi_basic.php");

?>
<div class="content-header">
  <div class="pesan-form">
  </div>
  <div class="row">
    <div class="col-md-3">
      <div class="box box-primary">
        <div class="box-body box-profile">
          <img class=" img-responsive" src="<?php echo $rowuser['foto']?>" alt="Foto Profil">

          <!-- <h3 class="profile-username text-center"><?php //echo $rowuser['namalengkap']?></h3>

          <p class="text-muted text-center"><?php //echo levelUser($rowuser['level'])[0]; ?></p> -->

          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
              <b>Tanggal Akun Aktif</b> <a class="pull-right">20 Mei 2017</a>
            </li>
            <li class="list-group-item">
              <b>Status Kelengkapan Data</b>

            </li>
          </ul>


        </div>
        <!-- /.box-body -->
      </div>

      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Aktifitas Terakhir</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <div class="progress progress-sm active">
                  <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                    <span class="sr-only">20% Complete</span>
                  </div>
                </div>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Malibu, California</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <!-- /.box-body -->
          </div>
    </div>
    <div class="col-md-9">
      <div class="nav-tabs-custom">

          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_biodata" data-toggle="tab" aria-expanded="true" data-halaman="biodata" data-form="biodata_detail">Biodata</a></li>
            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false" data-halaman="biodata">Data Keluarga</a></li>
            <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Riwayat Pendidikan</a></li>
            <!-- <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li> -->
          </ul>
          <div class="tab-content">
            <div class="tab-pane active tab_awal" id="tab_biodata" >

            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2">
                <form method="POST" class="form-horizontal">

                  <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Nama Anggota Keluarga </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="" value="<?php //echo ($)?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Tempat - Tanggal Lahir </label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="" value="<?php //echo ($)?>">
                  </div>
                </div>
                  <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Pekerjaan </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="" value="<?php //echo ($)?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-3 control-label"> Status </label>
                    <div class="col-sm-9">
                      <select class="form-control" name="">
                        <?php DropDown(['Nikah','Belum Nikah']) ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-3"></label>
                    <div class="col-sm-9">
                      <input type="submit" class="btn btn-primary" name="buttonsave" value="Simpan Data Keluarga">
                    </div>
                  </div>
                </form>
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
  </div>

</div>
