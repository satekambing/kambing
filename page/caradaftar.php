<?php
echo judulhalaman("calon","Cara Mendaftar",1);
$query    = mysql_query("SELECT * FROM cara_pendaftaran");
$data     = mysql_fetch_array($query);

$f        = $data['keterangan'];
?>
<p><?php echo $f ?></p>
<br /><hr />
