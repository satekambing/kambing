<?php
ini_set('session.use_cookies', '0');
require_once("config/config.php");
require_once("config/koneksi.php");
require_once("config/fungsi_basic.php");
?>
<!DOCTYPE html>
<html lang="id">
<head>
	<title>FRAMEWORK - KUsih </title>
	<!-- Meta -->
	<meta charset="UTF-08">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- <link rel="Shortcut Icon" href="resources/images/ico.ico" /> -->

	<link rel="stylesheet" type="text/css" href="resources/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="resources/css/font-awesome.min.css" />


</head>
<body>

	<nav class="navbar sticky-top navbar-toggleable-sm navbar-inverse bg-inverse py-0 ">
		<div class="container">
			<button class="navbar-toggler navbar-toggler-right btn-sm" type="button" data-toggle="collapse" data-target="#NavbarMenu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a class="navbar-brand" href="#">
				SIMPEG
			</a>
			<div class="collapse navbar-collapse" id="NavbarMenu">
				<ul class="navbar-nav">
					<li class="nav-item active"><a class="nav-link" href="#">Beranda</a></li>
					<li class="nav-item"><a class="nav-link" href="#">Profil</a></li>
					<li class="nav-item"><a class="nav-link" href="#">Berita</a></li>
					<li class="nav-item"><a class="nav-link" href="#">Galery</a></li>
					<li class="nav-item"><a class="nav-link" href="#">Agenda</a></li>
					<!-- untuk user terdaftar -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" id="MenuInformasi" data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">Kepegawaian</a>
						<div class="dropdown-menu" aria-labelledby="MenuInformasi">
							<a class="dropdown-item" href="#">Biodata</a>
							<a class="dropdown-item" href="#">Kenaikan Pangkat Pegawai</a>
							<a class="dropdown-item" href="#">Cuti Pegawai</a>
							<a class="dropdown-item" href="#">Daftar Kenaikan Gaji Berkala</a>
							<a class="dropdown-item" href="#">Diklat Pegawai</a>
							<a class="dropdown-item" href="#">Pensiun Pegawai</a>
						</div>
					</li>

				</ul>
			</div>
			<div class="" id="navbarkanan">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<!-- <form class="my-auto w-100">
						 <input class="form-control mr-sm-2" type="text" placeholder="Search">
					 	</form> -->

					</li>
					<li class="nav-item">
						<a class="nav-link" href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#"><i class="fa fa-user-circle" aria-hidden="true"></i></a>
					</li>
					<li class="nav-item-dropdown">
						<a class="nav-link dropdown-toggle" id="MenuIconKanan" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
						</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="MenuIconKanan">
                <a class="dropdown-item" href="">User</a>
                <a class="dropdown-item" href="">Login</a>
            </div>
					</li>

				</ul>
			</div>
		</div>
	</nav>

	<!--  -->


<div class="container-fluid bg-danger h-230" style="min-height: 230px; ">

</div>
<div class="container">
	<hr>
		<div class="container">
		<div class="row">
			<div class="col-md-9  ml-100">
				<main>
					<!-- <ol class="breadcrumb">
						<li class="breadcrumb-item "><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Berita</li>
					</ol> -->
					<h1>Berita</h1>
					<?php
					for ($i=0; $i < 500; $i++) {
						# code...
						echo $i." sate";
					}
					?>
				</main>
			</div>
			<div class="col-md-3 ">
				<aside>

					<div class="card text-center">
					  <div class="card-header">
					    <ul class="nav nav-pills card-header-pills">
					      <li class="nav-item">
					        <a class="nav-link active" href="#">Active</a>
					      </li>
					      <li class="nav-item">
					        <a class="nav-link" href="#">Link</a>
					      </li>
					      <li class="nav-item">
					        <a class="nav-link disabled" href="#">Disabled</a>
					      </li>
					    </ul>
					  </div>
					  <div class="card-block">
					    <h4 class="card-title">Special title treatment</h4>
					    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
					    <a href="#" class="btn btn-primary">Go somewhere</a>
					  </div>
					</div>

				</aside>
			</div>
		</div>
		<div class="clear"></div>

	</div>
	<hr>

</div>
<footer class="container-fluid bg-inverse " style="height: 100px; ">
	<div class="container">
		<p>Desain ini di persembahkan oleh sate kambing.</p>
	</div>
</footer>
<!-- JS Taruh disini aja -->

	<script src="resources/js/jquery-3.2.1.min.js" type="text/javascript"></script>
  <script src="resources/js/jquery-ui.min.js" type="text/javascript"></script>
	<script src="resources/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>
