<?php
echo judulhalaman("unduhan","Unduhan",1);
// Query Input data
$sql 	= mysql_query("SELECT * FROM unduhan")or die(mysql_error());
$no =1;
?>
<table class=table width=100%>
	<th>#</th>
	<th>Keterangan</th>
	<th>Link Unduhan</th>
<?php
while($data = mysql_fetch_array($sql)){
	?>
		<tr>
			<td><?php echo $no ?></td>
			<td><?php echo $data['nama_unduhan']?></td>
			<td><a href="files/<?php echo $data['link']?>" ><?php echo $data['link'] ?> </a></td>
		</tr>
	<?php
	$no++;
}
?>
</table>
