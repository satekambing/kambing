<?php
require_once("../../../config/config.php");
require_once("../../../config/koneksi.php");
// $term = $_GET['term'];
// $pegawai = $koneksi->query("SELECT * FROM tbl_pegawai WHERE nama LIKE '%".$term."%' ");
// while($x = $pegawai->fetch_object()){
//     $row['value'] = $x->nama;
//     $row['id']    = $x->id_pegawai;
//     $row_set[] = $row;
// }
// echo json_encode($row_set);
// $data = array(1=>"satu","dua","tiga","tiga lima","tiga enam");
//
// echo json_encode($data);
$q = $_GET['q'];

//$query = $koneksi->query("select nip as id, CONCAT_WS (' - ', nip, nama) as text from tbl_pegawai where nip like '%".$q."%'");
$query = $koneksi->query("select nip as id, CONCAT_WS (' - ', nip, nama) as text from tbl_pegawai where nip like '%".$q."%'");
$num = $query->num_rows;
if($num > 0){
	while($data = $query->fetch_assoc()){
    $tmp[]    = $data;

    // $tmp['id']    = $data->id;
    // $tmp['term']  = $data->nama;
	}
} else $tmp = array();

echo json_encode($tmp);

?>
