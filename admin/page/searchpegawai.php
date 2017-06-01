<?php
require_once("../../config/config.php");
require_once("../../config/koneksi.php");

$q = $_GET['q'];

//$query = $koneksi->query("select nip as id, CONCAT_WS (' - ', nip, nama) as text from tbl_pegawai where nip like '%".$q."%'");
$query = $koneksi->query("select nip as id, CONCAT_WS (' - ', nip, nama) as text from tbl_pegawai where nip like '%".$q."%'");
$num = $query->num_rows;
if($num > 0){
	while($data = $query->fetch_assoc()){
    $tmp[]    = $data;


	}
} else $tmp = array();

echo json_encode($tmp);

?>
