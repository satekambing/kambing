<?php
/**
  * Keterangan : Fungsi untuk menangani tampilan di halaman admin aja
  * Fungsi : Mempersingkat kode bootstrap yang panjang sekali broh :v
**/
function JudulHalaman(array $data) :string{
  $data = "<section class=content-header>
           <h1>".
              $data[0] // Judul Halaman
              ."<small>".$data[1]."</small>". // deskripsi halaman
           "</h1>
           </section>";
           return $data;
}
function angkaKeBulan(int $angka){
  if($angka > 12){ return 'Tanggal Tidak Valid';}
  $bulan = array(1=>'Jan','Feb','Maret','April','Mei','Juni','Juli','Agust','Sept','Okt','Nov','Des');
  return $bulan[$angka];
}
function PesanPeringatan(array $pesan){
  $data =  "<section class=content-header>
              <div class='callout callout-".$pesan['jenis']."'>
                <h4>".$pesan['judul']."</h4>
                <p>
                ".$pesan['isipesan']."
                </p>
              </div>
            </section>";
  return $data;
}
function PesanPeringatanModal(array $pesan){
  $data =  "<section class=content-header>
              <div class='callout callout-".$pesan['jenis']."'>
                <h4>".$pesan['judul']."</h4>
                <p>
                ".$pesan['isipesan']."
                </p>
              </div>
            </section></div></div>
            <div class='modal-footer'>
            <button type='button' class='btn btn-warning pull-right' data-dismiss='modal'>Tutup</button>
            </div>
            ";
  return $data;
}
function KolomTable(array $kolom){
  foreach ($kolom as $d) {
    echo "<th>".$d."</th>";
  }
}
function AwalModalDialog($id,$warna='faded'){
  ?>
      <div class='modal modal-<?php echo $warna ?> fade' id="<?php echo $id?>" role='dialog'>
        <div class='modal-dialog' role="document">

          <div class='modal-content'>
            <div class="isi-datamodal">
              <!-- Disinilah kode modal dialog di tampilkan.. begitulah akhirnya :( -->
            </div>
          </div><!-- end of content-model -->

        </div>
      </div>
  <?php
  }
function UbahStatus($status){
  return ($status == 1 ? 'Aktif':'Tidak Aktif');
}
function UbahTanggalKeView($tanggal){
  if ($tanggal == ""){
    return "";
  }
  $tanggal = explode("-",$tanggal);
  $tanggal = str_replace(" ","",$tanggal);
  $tanggal = $tanggal[2].' / '.$tanggal[1].' / '.$tanggal[0];

  return $tanggal;
}
function UbahTanggalKeBulan($tanggal){
  if ($tanggal == ""){
    return "";
  }
  $tanggal = explode("-",$tanggal);
  $tanggal = str_replace(" ","",$tanggal);
  // return angkaKeBulan(1);
  $bulan   = angkaKeBulan($tanggal[1]);
  $tanggal = $tanggal[2].' '.$bulan.' '.$tanggal[0];

  return $tanggal;
}
function PencarianLanjutan(array $data){
  ?>
  <!-- <form class="" action="index.html" method="post">
    <div class="input-group">
      <div class="isi_pencarian">
        <input type="text" class="form-control" name="" value="" placeholder="Pencarian">
        <input type="text" class="form-control" name="" value="" placeholder="Pencarian">

      </div>
      <span class="input-group-btn">
          <button type="button" class="btn btn-primary btn-flat">Send</button>
        </span>
    </div>
  </form> -->
  <?php
}












?>
