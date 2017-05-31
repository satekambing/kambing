<?php
cekLevel('user');
echo JudulHalaman(['User','Menampilkan Data User']); // Judul Halaman - Deskripsi
$JudulKolom = array('Username','Nama Lengkap','Email','Level','Pilihan'); // semua kolom di tbl

// query kan table
$sql   = "SELECT * FROM tbl_user ORDER BY level";
$user = $koneksi->query($sql);

?>
<div class="content-header">
  <div class="box box-primary">
    <div class="box-header with-border">
      <!-- Tombol Tambah Data -->
      <a href="#TambahModal" data-toggle="modal" data-halaman="user">
        <button class="btn btn-l btn-primary"><span><i class="fa fa-plus"></i></span> Tambah User</button>
      </a>
      <div class="pull-right col-xs-6">
        <?php //PencarianLanjutan(['tanggal']) ?>
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
          <?php while ($r=$user->fetch_object()) { ?>
            <tr >
              <td><?php echo $r->username ?></td>
              <td><?php echo $r->namalengkap ?></td>
              <td><?php echo $r->email ?></td>
              <td><label class="label label-<?php echo levelUser($r->level)[2] ?>"><?php echo levelUser($r->level)[0] ?></label></td>
              <td><a href="#TambahModal" class="TombolEdit" data-toggle="modal" data-primarykey="id_user" data-halaman="user" data-idnya="<?php  echo $r->id_user ?>" >
                   <button class="btn btn-sm btn-success" ><i class="fa fa-edit"></i></button></a>
                  <a href="#HapusModal" class="TombolHapus" data-toggle="modal" data-halaman="user" data-idnya="<?php  echo $r->id_user ?>">
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
