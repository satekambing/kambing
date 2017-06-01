<?php
cekLevel('cuti');
echo JudulHalaman(['Cuti','Menampilkan data Cuti Pegawai']); // Judul Halaman - Deskripsi
$JudulKolom = array('NIP','Nama','Jenis','No Surat','Tgl Surat','Tgl Mulai - Selesai','Keterangan','Pilihan'); // semua kolom di tbl

// query kan table - left -> semua yg tampil di kiri akan di tampilkan
$sql   = " SELECT * FROM tbl_cuti c LEFT JOIN tbl_pegawai p ON c.id_pegawai = p.id_pegawai";
$cuti = $koneksi->query($sql);

?>
<div class="content-header">
  <div class="box box-primary">
    <div class="box-header with-border">
      <!-- Tombol Tambah Data -->
      <a href="#TambahModal" data-toggle="modal" data-halaman="cuti">
        <button class="btn btn-l btn-primary"><span><i class="fa fa-plus"></i></span> Tambah Cuti</button>
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
          <?php while ($r=$cuti->fetch_object()) { ?>
            <tr >
              <td><?php echo $r->nip ?></td>
              <td><?php echo $r->nama ?></td>
              <td><?php echo $r->jenis_cuti ?></td>
              <td><?php echo $r->no_surat ?></td>
              <td><?php echo UbahTanggalKeBulan($r->tanggal_surat) ?></td>
              <td><?php echo UbahTanggalKeBulan($r->tanggal_mulai).' s/d '.UbahTanggalKeBulan($r->tanggal_selesai) ?></td>
              <td><?php echo $r->keterangan ?></td>

              <td><a href="#TambahModal" class="TombolEdit" data-toggle="modal" data-primarykey="id_cuti" data-halaman="cuti" data-idnya="<?php  echo $r->id_cuti ?>" >
                   <button class="btn btn-sm btn-success" ><i class="fa fa-edit"></i></button></a>
                  <a href="#HapusModal" class="TombolHapus" data-toggle="modal" data-halaman="cuti" data-idnya="<?php  echo $r->id_cuti ?>">
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
