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
        <?php DropDown(['Nikah','Belum Nikah']) ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="" class="col-sm-3"></label>
    <div class="col-sm-9">
      <button  class="btn btn-primary simpan-tab" data-halaman="biodata" data-form="datakeluarga" >
        Simpan Data Keluarga
      </button>
    </div>
  </div>
</form>
<table class="table">
<tr>
  <th>Nama</th>
  <th>Tempat - Tgl Lahir</th>
  <th>Pekerjaan</th>
  <th>Status</th>
</tr>
<tr>
  <td>1</td>
  <td>2</td>
  <td>3</td>
  <td>4</td>

</tr>
</table>
