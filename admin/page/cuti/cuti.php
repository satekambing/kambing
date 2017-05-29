<?php
echo JudulHalaman(['Data Cuti Pegawai','Menampilkan Daftar Cuti Pegawai ']);
$JudulKolom = array('NIP','Nama Pegawai','Tanggal Mulai - Akhir','Jenis Cuti','Keterangan');

// query kan table
$sql   = " SELECT * FROM tbl_pegawai p INNER JOIN tbl_cuti c ON p.id_pegawai = c.id_pegawai ";
$pegawai = $koneksi->query($sql);
// die(var_dump($pegawai));
?>
<div class="content-header">
  <div class="box box-primary">
    <div class="box-header with-border">
      <!-- Tombol Tambah Data -->
      <a href="#TambahDialog" data-toggle="modal" data-halaman="cuti">
        <button class="btn btn-l btn-primary"><span><i class="fa fa-plus"></i></span> Tambah Data Cuti Pegawai</button>
      </a>
      <div class="box-tools">
        <div class="" id="aku">
          <input type="text" name="" id="a" value=""><button id="zzz" type="btn btn-info" name="button">anu</button>
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
              <td><?php echo $r->tanggal_mulai.' s/d '.$r->tanggal_selesai ?></td>
              <td><?php echo $r->jenis_cuti ?></td>
              <td><?php echo $r->keterangan ?></td>
              <td><a href="#UbahDialog" class="TombolEdit" data-toggle="modal" data-primarykey="id_cuti" data-halaman="cuti" data-idnya=<?php  echo $r->id_pegawai ?> >
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
<?php AwalModalDialog('Ubah Data Cuti','UbahDialog') ?>
<?php AwalModalDialog('Tambah Data Cuti','TambahDialog') ?>

<!-- Akhir -->
