<?php
cekLevel('kepangkatan');
echo JudulHalaman(['Kepangkatan','Menampilkan data kepangkatan pegawai']); // Judul Halaman - Deskripsi
$JudulKolom = array('NIP','Nama','Jenis Kenaikan','No SK','Tgl SK','TMT','Pilihan'); // semua kolom di tbl

// query kan table

$sql   = "  SELECT c.*, p.id_pegawai,p.nip,p.nama FROM tbl_kepangkatan c LEFT JOIN tbl_pegawai p ON c.id_pegawai = p.id_pegawai";

// $sql   = " SELECT * FROM tbl_";
$kepangkatan = $koneksi->query($sql);

?>
<div class="content-header">
  <div class="box box-primary">
    <div class="box-header with-border">
      <!-- Tombol Tambah Data -->
      <a href="#TambahModal" data-toggle="modal" data-halaman="kepangkatan">
        <button class="btn btn-l btn-primary"><span><i class="fa fa-plus"></i></span> Tambah kepangkatan</button>
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
          <?php while ($r=$kepangkatan->fetch_object()) { ?>
            <tr >

              <td><?php echo $r->nip ?></td>
              <td><?php echo $r->nama ?></td>
              <td><?php echo $r->jenis_kenaikan ?></td>
              <td><?php echo $r->no_sk ?></td>
              <td><?php echo UbahTanggalKeBulan($r->tanggal_sk) ?></td>
              <td><?php echo UbahTanggalKeBulan($r->tmt) ?></td>
              <td><a href="#TambahModal" class="TombolEdit" data-toggle="modal" data-primarykey="id_kepangkatan" data-halaman="kepangkatan" data-idnya="<?php  echo $r->id_kepangkatan ?>" >
                   <button class="btn btn-sm btn-success" ><i class="fa fa-edit"></i></button></a>
                  <a href="#HapusModal" class="TombolHapus" data-toggle="modal" data-halaman="kepangkatan" data-idnya="<?php  echo $r->id_kepangkatan ?>">
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
