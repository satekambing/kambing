<?php
echo JudulHalaman(['Data User','Menampilkan Daftar User Pegawai ']);
$JudulKolom = array('Username','Nama Lengkap','Email','Level','Status','Pilihan');

// query kan table
$sql   = " SELECT * FROM tbl_user";
$User = $koneksi->query($sql);
// die(var_dump($pegawai));
?>
<div class="content-header">
  <div class="box box-primary">
    <div class="box-header with-border">
      <!-- Tombol Tambah Data -->
      <a href="#TambahDialog" data-toggle="modal" data-halaman="User">
        <button class="btn btn-l btn-primary"><span><i class="fa fa-plus"></i></span> Tambah User </button>
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
          <?php while ($r=$User->fetch_object()) { ?>
            <tr >
              <td><?php echo $r->username ?></td>
              <td><?php echo $r->namalengkap ?></td>
              <td><?php echo $r->email ?></td>
              <td><?php echo $r->level ?></td>
              <td><?php echo UbahStatus($r->status) ?></td>
              <td><a href="#UbahDialog" class="TombolEdit" data-toggle="modal" data-primarykey="id_pegawai" data-halaman="User" data-idnya=<?php  echo $r->id_pegawai ?> >
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
<?php AwalModalDialog('Tambah User','TambahDialog') ?>

<!-- Akhir -->
