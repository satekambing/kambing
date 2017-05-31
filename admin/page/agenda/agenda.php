<?php
cekLevel('agenda');
echo JudulHalaman(['Data Agenda Pegawai','Menampilkan Daftar Agenda Kegiatan ']);
$JudulKolom = array('Tanggal','Nama Kegiatan','Keterangan','Status','Pilihan');

// query kan table
$sql   = " SELECT * FROM tbl_agenda";
$agenda = $koneksi->query($sql);
// die(var_dump($pegawai));
?>
<div class="content-header">
  <div class="box box-primary">
    <div class="box-header with-border">
      <!-- Tombol Tambah Data -->
      <a href="#TambahModal" data-toggle="modal" data-halaman="agenda">
        <button class="btn btn-l btn-primary"><span><i class="fa fa-plus"></i></span> Tambah Agenda</button>
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
          <?php while ($r=$agenda->fetch_object()) { ?>
            <tr >
              <td><?php echo UbahTanggalKeBulan($r->tanggal_agenda) ?></td>
              <td><?php echo $r->judul ?></td>
              <td><?php echo $r->isi ?></td>
              <td><?php echo $r->status ?></td>
              <td><a href="#TambahModal" class="TombolEdit" data-toggle="modal" data-primarykey="id_agenda" data-halaman="agenda" data-idnya="<?php  echo $r->id_agenda ?>" >
                   <button class="btn btn-sm btn-success" ><i class="fa fa-edit"></i></button></a>
                  <a href="#HapusModal" class="TombolHapus" data-toggle="modal" data-halaman="agenda" data-idnya="<?php  echo $r->id_agenda ?>">
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
