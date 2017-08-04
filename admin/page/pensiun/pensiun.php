<?php
cekLevel('pensiun');
echo JudulHalaman(['Pensiun','Menampilkan data pensiun pegawai']); // Judul Halaman - Deskripsi
$JudulKolom = array('NIP','Nama','Tanggal Pensiun','Keterangan','Pilihan'); // semua kolom di tbl

// query kan table

$sql   = "  SELECT c.*, p.id_pegawai, p.nip, p.nama,r.status_riwayat FROM tbl_pensiun c LEFT JOIN tbl_pegawai p ON c.id_pegawai = p.id_pegawai";
$sql   .= " LEFT JOIN tbl_riwayat r ON p.id_pegawai = r.id_pegawai GROUP BY c.id_pensiun";
// $sql   = " SELECT * FROM tbl_pensiun";
$pensiun = $koneksi->query($sql);

?>
<div class="content-header">
  <div class="box box-primary">
    <div class="box-header with-border">
      <!-- Tombol Tambah Data -->
      <a href="#TambahModal" data-toggle="modal" data-halaman="pensiun">
        <button class="btn btn-l btn-primary"><span><i class="fa fa-plus"></i></span> Tambah pensiun</button>
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
          <?php while ($r=$pensiun->fetch_object()) { ?>
            <tr >
              <td><?php echo $r->nip ?></td>
              <td><?php echo $r->nama ?></td>
              <td><?php echo UbahTanggalKeBulan($r->tanggal_pensiun) ?></td>
              <td><?php echo $r->keterangan ?></td>
              <td><?php echo $r->status ?></td>
              <td><a href="#TambahModal" class="TombolEdit" data-toggle="modal" data-primarykey="id_pensiun" data-halaman="pensiun" data-idnya="<?php  echo $r->id_pensiun ?>" >
                   <button class="btn btn-sm btn-success" ><i class="fa fa-edit"></i></button></a>
                  <a href="#HapusModal" class="TombolHapus" data-toggle="modal" data-halaman="pensiun" data-idnya="<?php  echo $r->id_pensiun ?>">
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
