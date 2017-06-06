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
function UbahTanggalJam($tanggal){
  if ($tanggal == ""){
    return "";
  }
  $tanggal = explode(" ",$tanggal);
  $tanggal_aja = UbahTanggalKeBulan($tanggal[0]);
  $tanggal_jam = $tanggal[1];
  return $tanggal_jam.' - '.$tanggal_aja;
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
function getDataUser($user){
  $koneksi	= new mysqli(SERVER, USER, PASS, DBNAME);
  $sql      = "SELECT namalengkap,level FROM tbl_user WHERE username='$user'";
  $userx    = $koneksi->query($sql);
  $r        = $userx->fetch_object();
  $userx->close();

  $sql      = "SELECT foto_profil FROM tbl_pegawai WHERE nip='$user'";
  // echo $sql;
  $peg      = $koneksi->query($sql);
  $f        = $peg->fetch_object();
  // echo die($peg->num_rows);
  if($peg->num_rows > 0 ){
    // kalau user juga ada di data pegawai + gak ada fotonya, set default fotonya jadi none..
    $foto   = $f->foto_profil;
    if ($f->foto_profil == ""){
      $foto   = "none.jpg";
    }
  }else{
    $foto   = "none.jpg"; // kebetulan gambarnya png
  }
  $foto     = "../files/foto_pegawai/".$foto;
  $peg->close();
  return array(
      'namalengkap'=>$r->namalengkap,
      'level'=>$r->level,
      'foto'=>$foto
  );
}










?>
