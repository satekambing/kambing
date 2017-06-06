<form method="POST" class="form-horizontal" id="form_datakeluarga">
  <input type="hidden" name="tambah" value="keluarga">
  <div class="form-group">
    <label for="" class="col-sm-3 control-label">Nama</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="nama" value="" placeholder="Nama Anggota Keluarga">
    </div>
  </div>
  <div class="form-group ">
        <label for="" class="col-sm-3 control-label">Tempat - Tanggal Lahir </label>
        <div class="col-sm-4">
          <input type="text" name="tempat_lahir"  class="form-control" placeholder="Kota Lahir"  >
        </div>

        <div class="input-group col-sm-3">
          <input type="text" name="tanggal_lahir" placeholder="YYYY-DD-MM"  class="tanggalx form-control" >
          <span class="input-group-addon text-blue"><i class="fa fa-calendar"></i></span>
        </div>
  </div>
  <div class="form-group">
    <label for="" class="col-sm-3 control-label">Pekerjaan </label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="pekerjaan" placeholder="Pekerjaan">
    </div>
  </div>
  <div class="form-group">
    <label for="" class="col-sm-3 control-label"> Status </label>
    <div class="col-sm-9">
      <select class="form-control" name="status">
        <?php DropDown([1=>'Nikah','Belum Nikah']) ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="" class="col-sm-3"></label>
    <div class="col-sm-9">
      <button  class="btn btn-primary simpan-tab" data-halaman="biodata" data-form="datakeluarga" >
        Simpan Data Keluarga
      </button>
      <input type="reset" class="btn btn-info"  value="Reset">
    </div>
  </div>
</form>
<?php
$skeluarga  = "SELECT * FROM tbl_keluarga WHERE id_pegawai=$nip";
$qkeluarga  = $koneksi->query($skeluarga);
if ($qkeluarga->num_rows > 0){ // kalau data keluarga ditemukan
   $no=0;
?>
  <table class="table" id="table_datakeluarga">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Tempat - Tgl Lahir</th>
        <th>Pekerjaan</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php  while($r=$qkeluarga->fetch_object()){ $no++?>
      <tr>
        <td><?php echo $no ?>.</td>
        <td><?php echo $r->nama ?></td>
        <td><?php echo $r->tempat_lahir.' - '.$r->tanggal_lahir ?></td>
        <td><?php echo $r->pekerjaan ?></td>
        <td>
          <span class="label label-info"><?php echo ($r->status == 1)?'Nikah':'Belum Nikah' ?></span>
        </td>
        <td>
          <a href="#HapusModal" class="TombolHapus" data-toggle="modal" data-halaman="biodata" data-table="keluarga" data-idnya="<?php  echo $r->id_keluarga ?>">
           <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
  </table>
  <?php AwalModalDialog('HapusModal') ?>
<?php } ?>
