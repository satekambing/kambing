<?php
cekLevel('master');
echo JudulHalaman(['','']); // Judul Halaman - Deskripsi
$JudulKolom = array('','Pilihan'); // semua kolom di tbl

// query kan table

//$sql   = "  SELECT c.*, p. FROM tbl_ c LEFT JOIN tbl_ p ON c.id_pegawai = p.id_pegawai";

$sql   = " SELECT * FROM tbl_";
$master = $koneksi->query($sql);

?>
<div class="content-header">
  <div class="box box-primary">
    <div class="box-header with-border">
      <!-- Tombol Tambah Data -->
      <a href="#TambahModal" data-toggle="modal" data-halaman="master">
        <button class="btn btn-l btn-primary"><span><i class="fa fa-plus"></i></span> Tambah master</button>
      </a>
      <div class="pull-right col-xs-6">
        <?php PencarianLanjutan(['tanggal']) ?>
      </div>

    </div>
    <div class="box-body">
      <!-- table-condensed -->
      <table class="table table-striped " id="contoh">
        <thead>
          <tr>
            <?php KolomTable($JudulKolom) ?>
          </tr>
        </thead>
        <tbody>
          <?php while ($r=$master->fetch_object()) { ?>
            <tr >
              <td><?php echo UbahTanggalKeBulan($r->tanggal_master) ?></td>
              <td><?php echo $r-> ?></td>
              <td><a href="#TambahModal" class="TombolEdit" data-toggle="modal" data-primarykey="id_master" data-halaman="master" data-idnya="<?php  echo $r->id_master ?>" >
                   <button class="btn btn-sm btn-success" ><i class="fa fa-edit"></i></button></a>
                  <a href="#HapusModal" class="TombolHapus" data-toggle="modal" data-halaman="master" data-idnya="<?php  echo $r->id_master ?>">
                   <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>

    </div>
  </div>
</div>
<?php AwalModalDialog('TambahModal') ?>
<?php AwalModalDialog('HapusModal') ?>


<!-- Akhir -->
