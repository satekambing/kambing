<?php
if (isset($_GET['id_prodi']) && $_GET['id_prodi'] >= 0){
	include("../config/koneksi.php");
	$prodi	= (int)$_GET['id_prodi'];

	$query		= mysql_query("SELECT * FROM prodi WHERE id_prodi =".$prodi." ") or die (mysql_error());
	$data		= mysql_fetch_array($query);
	echo "
			<div class='post'>".
		 	 "<div class='isi_detail ratakirikanan'>".$data['matakuliah']."
		 <div class='clear'></div>
		 </div>";
};
?>
