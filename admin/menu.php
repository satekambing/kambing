<?php if(!isset($_SESSION['user']) OR $_SESSION['user'] == ''){echo die("Belum Login"); } ?>
<section class="sidebar">
  <br />
  <div class="user-panel sidebar-menu">
    <?php  $rowuser = getDataUser($_SESSION['user']); ?>
    <div class="pull-left image">
      <img src="<?php echo $rowuser['foto']?>" height="200px" width="100px" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">

      <p><?php echo $rowuser['namalengkap']; ?></p>
      <small><?php echo levelUser($rowuser['level'])[0]; ?></small>
    </div>
  </div>
  <ul class="sidebar-menu">
    <?php if($_SESSION['level'] == 4){ ?>
      <li class="header">Menu</li>
      <li><a href="#"><i class="fa fa-dashboard text-red"></i> <span>Dashboard</span></a></li>
    <?php } ?>
    <?php if(cekMenu(MENU_HALAMANDEPAN)){ ?>
      <li class="header">Halaman Depan</li>
      <li class="berita"><a href="?p=berita"><i class="fa fa-newspaper-o text-faded"></i> <span>Berita</span></a></li>
      <li class="profil"><a href="?p=profil"><i class="fa fa-address-book text-faded"></i> <span>Profil</span></a></li>
      <li class="galery"><a href="?p=galery"><i class="fa fa-file-photo-o text-faded"></i> <span>Galery</span></a></li>
      <li class="agenda"><a href="?p=agenda"><i class="fa fa-calendar-check-o text-faded"></i> <span>Agenda</span></a></li>
    <?php } ?>
    <?php if(cekMenu(MENU_KEPEGAWAIAN)){ ?>
      <li class="kepegawaian header">Kepegawaian</li>
      <li class="biodata"><a href="?p=biodata"><i class="fa fa-user text-faded"></i> <span>Biodata</span><span class="pull-right-container"><small class="label pull-right bg-yellow">Belum 1</small></span></a></li>
      <?php if($_SESSION['level'] == 1){ ?>
      <li class="pegawai"><a href="?p=pegawai"><i class="fa fa-user text-faded"></i> <span>Pegawai</span><span class="pull-right-container"><small class="label pull-right bg-red">Belum Lengkap</small></span></a></li>
      <?php } ?>
      <li class="kepangkatan"> <a href="?p=kepangkatan"><i class="fa fa-file text-faded"></i> <span>Kenaikan Pangkat</span></a></li>
      <li class="cuti"><a href="?p=cuti"><i class="fa fa-calendar text-faded"></i> <span>Cuti</span></a></li>
      <li class="gaji"><a href="?p=gaji"><i class="fa fa-home text-faded"></i> <span>Kenaikan Gaji</span></a></li>
      <li class="diklat"><a href="?p=diklat"><i class="fa fa-book text-faded"></i> <span>Diklat </span></a></li>
      <li class="pensiun"><a href="?p=pensiun"><i class="fa fa-circle-o text-faded"></i> <span>Pensiun</span></a></li>
    <?php } ?>
    <li class="header">Pengaturan</li>
    <li class="user"><a href="?p=user"><i class="fa fa-user text-faded"></i><span>User</span></a></li>
    <li><a href="logout.php"><i class="fa fa-sign-out text-faded"></i><span>Keluar</span></a></li>

  </ul>
</section>
