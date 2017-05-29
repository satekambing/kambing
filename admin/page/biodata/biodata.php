<?php
echo JudulHalaman(['Data Pegawai','Menampilkan Data Pegawai']);
$JudulKolom = array('NIP','Nama Pegawai','Jenis Kelamin','Tempat, Tanggal Lahir','Agama','Pilihan');

// query kan table
$sql   = " SELECT * FROM tbl_pegawai ";
$pegawai = $koneksi->query($sql);
// die(var_dump($pegawai));
?>
<div class="content-header">
  <div class="box box-primary">
    <div class="box-header with-border">
      <!-- Tombol Tambah Data -->
      <a href="#TambahDialog" data-toggle="modal" data-halaman="biodata">
        <button class="btn  btn-primary"><span><i class="fa fa-plus"></i></span> Tambah Data Pegawai</button>
      </a>
      <div class="box-tools">
        <div class="" id="aku">
          xxx
        </div>
          <!-- Pencarian -->
          <!-- <div class="input-group " style="width: 200px">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Cari Data Pegawai">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-info"><i class="fa fa-search"></i></button>
                  </div>
          </div> -->
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
              <td><?php echo $r->jenis_kelamin ?></td>
              <td><?php echo $r->tempat_lahir.', '.$r->tanggal_lahir ?></td>
              <td><?php echo $r->agama ?></td>
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
<?php AwalModalDialog('Tambah Data Pegawai','TambahDialog') ?>

<!-- Akhir -->
