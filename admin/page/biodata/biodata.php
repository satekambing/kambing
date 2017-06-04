<?php
cekLevel('biodata');
echo JudulHalaman(['BIODATA','Menampilkan Biodata Pegawai']); // Judul Halaman - Deskripsi
$sql    = " SELECT * FROM tbl_pegawai WHERE nip='".$_SESSION['user']."'";
$profil = $koneksi->query($sql);
$r      = $profil->fetch_object();
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

      <!-- zz -->
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
            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Biodata</a></li>
            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Data Keluarga</a></li>
            <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Riwayat Pendidikan</a></li>
            <!-- <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li> -->
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab_1" >
              <form class="form" action="" method="post">

                <div class="form-group">
                  <label for="">NIP</label>
                  <input type="text" name="nip"  class="form-control" placeholder="Nomor Induk Pegawai" autofocus value="<?php echo ($r->nip ?? '') ?>"  >
                </div>
                <div class="form-group">
                  <label for="">Nama Lengkap</label>
                  <input type="text" name="nama"  class="form-control" placeholder="Nama Lengkap" value="<?php echo ($r->nama ?? '') ?>"  >
                </div>
                <div class="form-group">
                  <label for="">Jenis Kelamin</label>
                  <div class="radio">

                    <label>
                      <input type="radio" name="jenis_kelamin" id="jenis_kelaminl" value="L" checked="">
                      Laki - Laki
                    </label> &nbsp
                    <label class="radio-inline">
                      <input type="radio" name="jenis_kelamin" id="jenis_kelaminp" value="P" >
                      Perempuan
                    </label>
                  </div>

                </div>
                <div class="form-group ">

                  <div class="row">
                    <div class="col-sm-5">
                      <label for="">Tempat </label>
                      <input type="text" name="tempat_lahir"  class="form-control" placeholder="Tempat Lahir" value="<?php echo ($r->tempat_lahir ?? '') ?>"  >
                    </div>
                    <div class="col-sm-7">
                      <label for="">Tanggal Lahir</label>

                    <div class="input-group date">
                      <input type="text" name="tanggal_lahir" placeholder="YYYY-DD-MM" value="<?php echo UbahTanggalKeView($r->tanggal_lahir??'') ?>"  class="tanggalx form-control" >
                      <span class="input-group-addon text-blue"><i class="fa fa-calendar"></i></span>
                    </div>
                  </div>
                </div>
              </div>

                <div class="form-group">
                  <label for="">Agama</label>
                  <select class="form-control" name="agama">
                    <?php KolomAgama($r->agama ?? '') ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">No Telp</label>
                  <input type="text" name="no_telp"  class="form-control" placeholder="No Telp" value="<?php echo ($r->no_telp ?? '') ?>"  >
                </div>
                <div class="form-group">
                  <label for="">Email</label>
                  <input type="email" name="email"  class="form-control" placeholder="Contoh test@gmail.com" value="<?php echo ($r->email ?? '') ?>"  >
                </div>
                <div class="form-group">
                  <label for="">Foto</label>
                  <input type="file" name="gambar" class="form-control">
                  <?php if(isset($r->foto_profil) && (!$r->foto_profil == "")){ ?>
                    <input type="hidden" name="gambar2" value="<?php echo $r->foto_profil ?>">
                    <div class="pull-right">
                      <p class="text-warning">* Kosongkan File Jika Tidak ingin mengganti</p>
                    </div>
                      <img class="img-thumbnail " src="../files/foto_pegawai/<?php echo $r->foto_profil ?>" width="150px" alt="">
                  <?php } ?>
                </div>

              </form>
                <button name="submitbtn" class="btn btn-primary btnEditor" data-halaman="profil" data-kolom="visi_misi" >Simpan</button>
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
                      <input type="submit" name="buttonsave" value="Simpan">
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
