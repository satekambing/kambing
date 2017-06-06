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

      <div class="box box-info" id="kotak-status">
        <?php include("page/biodata/kotak_status.php"); ?>
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
