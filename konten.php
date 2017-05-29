<?php
$p = $_GET['p'] ?? '';
if(empty($_GET['p'])){
	/**
		* Kalau url tidak di isi alias kosong.. alihkan ke default pagenya
		* DEFAULT_PAGE :  ada di pengaturan config
	**/
	include('page/'.DEFAULT_PAGE);
}
else {
	/**
	 * ROOT : default dari url webnya...
	 * S : Slash '\' karna kalau di tulis langsung \ error
	 * Jadinya $file isinya http://alamatweb/page/namafilesesuaiurl.php
	**/
	$file = ROOT.S.page.S.$p.'.php';

	if(!file_exists($file)){
		/**
		 * Kalau halaman tidak ditemukan.. tampilkan pesan not found
		**/
		include("page/404.php");
	}
}

?>
