<?php
echo JudulHalaman(['User','Menampilkan Data User']);

// mengambil semua data user
$sql  = "SELECT * FROM unit WHERE u_nama != ''  ORDER BY u_kode DESC LIMIT 0,10";
$user = $koneksi->query($sql);
// echo $user->num_rows;
// die();
?>
<div class="content-header">
<div class="box">
  <div class="box-header">

    <div class="box-tools">
      <div class="input-group input-group-sm" style="width: 50%;">
        <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
        <div class="input-group-btn">
        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
        </div>
      </div>
    </div>

  </div>
  <div class="box-body">
  <table class="table table-striped table-hover">
    <thead>
      <tr class="table-warning">
        <th>Namax</th>
        <th>Kelas</th>
        <th>Oke</th>
        <th>Pilihan</th>
      </tr>
    </thead>
    <tbody>
    <!-- Isi table -->
    <?php while ($baris = $user->fetch_object()) { ?>
      <tr>
        <td><?php echo $baris->u_nama ?></td>
        <td><?php echo $baris->u_nopol ?></td>
        <td><?php echo $baris->u_norangka ?></td>
        <td align=center>
            <button class="btn btn-primary btn-sm ">Ubah</button>
            <button class="btn btn-danger btn-sm">Hapus</button>
        </td>
      </tr>
     <?php } ?>

    </tbody>
  </table>
  </div>
  <div class="box-footer">
    <div class="text justify-content-front">
      asdsa
    </div>
    <nav aria-label="Page Navigation">
      <ul class="pagination pagination-sm justify-content-end">
        <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1">Prev</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul>
    </nav>
  </div>
</div>
</div>
<?php $user->close() ?>
