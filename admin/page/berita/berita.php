<?php
echo JudulHalaman(['Data Berita','Menampilkan Daftar Berita ']);
$JudulKolom = array('Tanggal Post','Judul','Isi','Kategori','Pilihan');

// query kan table
$sql   = " SELECT * FROM tbl_berita";
$berita = $koneksi->query($sql);
// die(var_dump($pegawai));
?>
<div class="content-header">
  <div class="box box-primary">
    <div class="box-header with-border">
      <!-- Tombol Tambah Data -->
      <a href="#TambahDialog" data-toggle="modal" data-halaman="berita">
        <button class="btn btn-l btn-primary"><span><i class="fa fa-plus"></i></span> Tambah Berita</button>
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
          <?php while ($r=$berita->fetch_object()) { ?>
            <tr >
              <td><?php echo $r->tanggal_post ?></td>
              <td><?php echo $r->judul ?></td>
              <td><?php echo $r->isi ?></td>
              <td><?php echo $r->kategori ?></td>
              <td><a href="#UbahDialog" class="TombolEdit" data-toggle="modal" data-primarykey="id_pegawai" data-halaman="berita" data-idnya=<?php  echo $r->id_pegawai ?> >
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
<?php AwalModalDialog('Tambah berita','TambahDialog') ?>

<!-- Akhir -->
