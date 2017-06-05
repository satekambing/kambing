<form method="POST" class="form-horizontal" id="form_datapendidikan">
  <input type="hidden" name="tambah" value="pendidikan">
  <div class="form-group">
    <label for="" class="col-sm-3 control-label">Pedidikan</label>
    <div class="col-sm-9">
      <select class="form-control" name="tingkat_pendidikan">
        <?php DropDown(TINGKAT_PENDIDIKAN,'S1') ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="" class="col-sm-3 control-label">Jurusan </label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="jurusan" placeholder="Nama Jurusan - Ketik dengan lengkap">
    </div>
  </div>
  <div class="form-group">
    <label for="" class="col-sm-3 control-label">Nama Sekolah / Universitas</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="sekolah" placeholder="sekolah">
    </div>
  </div>
  <div class="form-group ">
    <label for="" class="col-sm-3 control-label">Tanggal Lulus</label>
    <div class="col-sm-9">
      <input type="text" name="tanggal_lulus" placeholder="YYYY-DD-MM"  class="tanggalx form-control" >
    </div>
  </div>

  <div class="form-group">
    <label for="" class="col-sm-3"></label>
    <div class="col-sm-9">
      <button  class="btn btn-primary simpan-tab" data-halaman="biodata" data-form="datapendidikan" >
        Simpan Data pendidikan
      </button>
      <input type="reset" class="btn btn-info"  value="Reset">
    </div>
  </div>

</form>
<?php
$spendidikan  = "SELECT * FROM tbl_pendidikan WHERE id_pegawai=$nip";
$qpendidikan  = $koneksi->query($spendidikan);
if ($qpendidikan->num_rows > 0){ // kalau data pendidikan ditemukan
   $no=0;
?>
  <table class="table" id="table_datapendidikan">
    <thead>
      <tr>
        <th>No</th>
        <th>Tingkat Pendidikan</th>
        <th>Jurusan</th>
        <th>Sekolah</th>
        <th>Tgl Lulus</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php  while($r=$qpendidikan->fetch_object()){ $no++?>
      <tr>
        <td><?php echo $no ?>.</td>
        <td><?php echo $r->tingkat_pendidikan ?></td>
        <td><?php echo $r->jurusan ?></td>
        <td><?php echo $r->sekolah ?></td>
        <td><?php echo $r->tanggal_lulus ?></td>
        <td>
          <a href="#HapusModal2" class="TombolHapus" data-toggle="modal" data-halaman="biodata" data-table="pendidikan" data-idnya="<?php  echo $r->id_pendidikan ?>">
           <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
  </table>
  <?php AwalModalDialog('HapusModal2') ?>
<?php } ?>
