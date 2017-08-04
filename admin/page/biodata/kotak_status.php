<div class="box-header with-border">
  <h3 class="box-title">Aktifitas Pengajuan Terakhir</h3>
</div>
<!-- /.box-header -->
<div class="box-body">
  <ol class="status-box">
    <?php

      $sql2      = "SELECT * FROM tbl_riwayat WHERE id_pegawai=$nip";
      $sql2     .= " ORDER BY id_riwayat DESC LIMIT 0,10";

      $qriwayat  = $koneksi->query($sql2);
      while($r=$qriwayat->fetch_array()){
        echo "<li ><b>".$r['id_riwayat'].". </b> ".UbahTanggalJamKeTanggal($r['tanggal'])." - ".getNamaTableView($r['halaman'])." - <label class='label label-".StatusLabel($r['status'])['warna']."'>".StatusLabel($r['status'])['label']."</label></li>";
       } ?>
  </ol>
  <hr>
</div>
