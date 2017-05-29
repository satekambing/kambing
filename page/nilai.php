<?php
echo judulhalaman("nilai","Info Nilai Mahasiswa",1);
?>
<table class="table" width=50%>
		<td width=20%><label>NIM</label></td>
		<td>: <input type="text" id="nim" size=30 placeholder="Masukkan NIM Mahasiswa" /></td>
</table><br />
<div id="tablenilai">
</div>
<script>
	$(document).ready(function(){
		$("#nim").change(function(){
			var nim = $("#nim").val();
			alert("page/detailnilai.php?nim=" + encodeURIComponent(nim) );
			$("#tablenilai").load("page/detailnilai.php?nim=" + encodeURIComponent(nim));
		});
		return false;
	})
</script>
