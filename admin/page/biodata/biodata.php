<?php
cekLevel('biodata');
echo JudulHalaman(['BIODATA','Menampilkan Biodata Pegawai']); // Judul Halaman - Deskripsi
$sql    = " SELECT * FROM tbl_pegawai WHERE nip='".$_SESSION['user']."'";
$profil = $koneksi->query($sql);
$r      = $profil->fetch_object();

// $profil->close();
require("../config/fungsi_basic.php");
if ($_SESSION['level'] == 4){
  require_once("../config/fungsi_admindata.php");
  // kalau level user itu pegawai maka nip = nip saat login
  $nip    = CariPegawai($_SESSION['user']); // mencari id_pegawai berdasarkan nip
}
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
            <li class="active"><a href="#detail" data-toggle="tab" aria-expanded="true">Biodata</a></li>
            <li class=""><a href="#datakeluarga" data-toggle="tab" aria-expanded="false">Data Keluarga</a></li>
            <li class=""><a href="#datapendidikan" data-toggle="tab" aria-expanded="false">Riwayat Pendidikan</a></li>
            <!-- <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li> -->
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="detail" >
              <?php include("page/biodata/biodata_detail.php") ?>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="datakeluarga">
              <?php include("page/biodata/biodata_datakeluarga.php") ?>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="datapendidikan">
              <?php include("page/biodata/biodata_datapendidikan.php") ?>
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
    </div>
  </div>

</div>
