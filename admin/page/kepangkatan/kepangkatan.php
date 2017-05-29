<?php
echo JudulHalaman(['Data Kepangkatan Pegawai','Menampilkan Daftar Kepangkatan Pegawai ']);
$JudulKolom = array('NIP','Nama Pegawai','Jenis Kenaikan','No. SK','Tanggal SK','TMT');

// query kan table
$sql   = " SELECT * FROM tbl_pegawai p INNER JOIN tbl_kepangkatan k ON p.id_pegawai = k.id_pegawai ";
$pegawai = $koneksi->query($sql);
// die(var_dump($pegawai));
?>
<div class="content-header">
  <div class="box box-primary">
    <div class="box-header with-border">
      <!-- Tombol Tambah Data -->
      <a href="#TambahDialog" data-toggle="modal" data-halaman="kepangkatan">
        <button class="btn btn-l btn-primary"><span><i class="fa fa-plus"></i></span> Tambah Pangkat Pegawai</button>
      </a>
      <div class="box-tools">
        <div class="" id="aku">

        </div>
      </div>
    </div>
    <div class="box-body">
      <!-- table-condensed -->
      <table class="table table-striped ">
        <thead>
          <tr>
            <?php KolomTable($JudulKolom) ?>
          </tr>
        </thead>
        <tbody>
          <?php while ($r=$pegawai->fetch_object()) { ?>
            <tr >
              <td><?php echo $r->nip ?></td>
              <td><?php echo $r->nama ?></td>
              <td><?php echo $r->jenis_kenaikan ?></td>
              <td><?php echo $r->no_sk ?></td>
              <td><?php echo $r->tanggal_sk ?></td>
              <td><?php echo $r->tmt ?></td>
              <td><a href="#UbahDialog" class="TombolEdit" data-toggle="modal" data-primarykey="id_pegawai" data-halaman="biodata" data-idnya=<?php  echo $r->id_pegawai ?> >
                  <button class="btn btn-sm btn-success" ><i class="fa fa-edit"></i></button></a>
                  <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <div class="box-header">

    </div>
  </div>
</div>
<!-- KUMPULAN MODAL DIALOGNYA -->
<?php //AwalModalDialog('Ubah Data Pegawai','UbahDialog') ?>
<?php AwalModalDialog('Tambah Kepangkatan','TambahDialog') ?>

<!-- Akhir -->
