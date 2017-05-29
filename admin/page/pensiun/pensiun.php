<?php
echo JudulHalaman(['Data Pensiun Pegawai','Menampilkan Daftar Pensiun Pegawai ']);
$JudulKolom = array('NIP','Nama Pegawai','Tanggal Mulai Pensiun','Keterangan');

// query kan table
$sql   = " SELECT * FROM tbl_pegawai p INNER JOIN tbl_pensiun pn ON p.id_pegawai = pn.id_pegawai ";
$pensiun = $koneksi->query($sql);
// die(var_dump($pegawai));
?>
<div class="content-header">
  <div class="box box-primary">
    <div class="box-header with-border">
      <!-- Tombol Tambah Data -->
      <a href="#TambahDialog" data-toggle="modal" data-halaman="Pensiun">
        <button class="btn btn-l btn-primary"><span><i class="fa fa-plus"></i></span> Tambah Pensiun Pegawai</button>
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
          <?php while ($r=$pensiun->fetch_object()) { ?>
            <tr >
              <td><?php echo $r->nip ?></td>
              <td><?php echo $r->nama ?></td>
              <td><?php echo $r->tanggal_pensiun ?></td>
              <td><?php echo $r->keterangan ?></td>
              <td><a href="#UbahDialog" class="TombolEdit" data-toggle="modal" data-primarykey="id_pegawai" data-halaman="pensiun" data-idnya=<?php  echo $r->id_pegawai ?> >
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
<?php AwalModalDialog('Tambah Pensiun','TambahDialog') ?>

<!-- Akhir -->
