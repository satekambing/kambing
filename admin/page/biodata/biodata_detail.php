<form class="form-horizontal" method="post" id="form_datadetailbiodata" enctype="multipart/form-data">
  <input type="hidden" name="ubah" value="<?php echo $_SESSION['user'] ?>">
  <div class="form-group">
    <label for="" class="col-sm-3 control-label">NIP</label>
    <div class="col-sm-9">
      <input type="text" name="nip"  class="form-control" placeholder="Nomor Induk Pegawai" autofocus value="<?php echo ($r->nip ?? '') ?>"  >
    </div>
  </div>

  <div class="form-group">
    <label for="" class="col-sm-3 control-label">Nama Lengkap</label>
      <div class="col-sm-9">
        <input type="text" name="nama"  class="form-control" placeholder="Nama Lengkap" value="<?php echo ($r->nama ?? '') ?>"  >
      </div>
  </div>
  <div class="form-group">
    <label for="" class="col-sm-3 control-label">Jenis Kelamin</label>
    <div class="radio col-sm-3">
      <label>
        <input type="radio" name="jenis_kelamin" id="jenis_kelaminl" value="L" checked="">
        Laki - Laki
      </label> &nbsp
      <label class="radio-inline">
        <input type="radio" name="jenis_kelamin" id="jenis_kelaminp" value="P" >
        Perempuan
      </label>
    </div>

  </div>

  <div class="form-group ">
        <label for="" class="col-sm-3 control-label">Tempat - Tanggal Lahir </label>
        <div class="col-sm-4">
          <input type="text" name="tempat_lahir"  class="form-control" placeholder="Tempat Lahir" value="<?php echo ($r->tempat_lahir ?? '') ?>"  >
        </div>

        <div class="input-group col-sm-4">
          <input type="text" name="tanggal_lahir" placeholder="YYYY-DD-MM" value="<?php echo UbahTanggalKeView($r->tanggal_lahir??'') ?>"  class="tanggalx form-control" >
          <span class="input-group-addon text-blue"><i class="fa fa-calendar"></i></span>
        </div>
</div>
  <div class="form-group">
    <label for="" class="col-sm-3 control-label">Agama</label>
    <div class="col-sm-9">
      <select class="form-control" name="agama">
        <?php KolomAgama($r->agama ?? '') ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="" class="col-sm-3 control-label">No Telp</label>
    <div class="col-sm-9">
      <input type="text" name="no_telp"  class="form-control" placeholder="No Telp" value="<?php echo ($r->no_telp ?? '') ?>"  >
    </div>
  </div>

  <div class="form-group">
    <label for="" class="col-sm-3 control-label">Email</label>
    <div class="col-sm-9">
      <input type="email" name="email"  class="form-control" placeholder="Contoh test@gmail.com" value="<?php echo ($r->email ?? '') ?>"  >
    </div>
  </div>
  <div class="form-group">
    <label for="" class="col-sm-3 control-label">Foto</label>
    <div class="col-sm-9">
    <input type="file" name="gambar" class="form-control">
    <?php if(isset($r->foto_profil) && (!$r->foto_profil == "")){ ?>
      <input type="hidden" name="gambar2" value="<?php echo $r->foto_profil ?>">
      <div class="pull-right">
        <p class="text-danger">NB : Foto sebelumnya ada - Kosongkan File Jika Tidak ingin mengganti</p>
      </div>

    <?php } ?>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-3"></div>
    <div class="col-sm-9">
      <button  class="btn btn-primary simpan-tab" data-halaman="biodata" data-form="datadetailbiodata" data-status="Ubah">
        Simpan Biodata
      </button>
    </div>
  </div>
</form>
<div class="satex">

</div>
