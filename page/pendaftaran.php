<?php
echo judulhalaman("calon","Laporan Calon Mahasiswa",2,"laporan");
session_start();
//session_destroy();
$nama 					= "";
$jenis_kelamin 	= "";
$alamat 				= "";
$agama 					= "";
$kota 					= "";
$provinsi 			= "";
$kab 						= "";
$kodepos 				= "";

if (isset($_SESSION['id_pendaftaran'])){
		$sqlx 	= "id_pendaftaran";
		$sid 		= $_SESSION['id_pendaftaran'];
}
else{
		$sqlx 	= "id_session";
		$sid 		= session_id().'22';
}
$queryp = mysql_query("SELECT * FROM Pendaftaran WHERE $sqlx = '$sid' ");
if (mysql_num_rows($queryp) >= 1){
	$datap = mysql_fetch_array($queryp);
	// query riwayat Pendidikan

	$queryr = mysql_query("SELECT * FROM pendaftaran_riwayat WHERE id_pendaftaran = '$datap[id_pendaftaran]' ");

	if (mysql_num_rows($queryr) >= 1){
		$datar = mysql_fetch_array($queryr);
	}

}
?>
<!-- Block Pendaftaran-->
<table width=100% class=table id="p_pendaftaran">
	<form method="post" id="form_pendaftaran" title="riwayattambah">
		<input type="hidden" name="formnya" value="pendaftaran" id="kete" />
		<input type="hidden" name="keteranganya" value="<?php echo $sqlx?>" />
		<tr>
			<td width=20%><label>Program Studi</label></td><td width=80%>: <select name=prodi><?php echo daftarProdi(isset($datap['prodi'])?$datap['prodi']:0) ?></select></td>
		</tr>
		<tr>
				<td ><label>Kelas Program</label></td><td >:
				<select name=kelas>
					<option value=REGULER>REGULER</option>
					<option value=START-BPKP>START-BPKP</option>
				</select></td>
		</tr>
		<tr><td> &nbsp </td></tr>
		<tr>
			<td ><label>Nama</label></td><td >: <input type="text" name="nama" placeholder="Nama Pendaftar"  value="<?php echo (isset($datap['nama'])?$datap['nama']:'') ?>" required  />  </td>
		</tr>
		<tr>
				<td ><label>Jenis Kelamin</label></td><td >:
				<select name=jk>
					<option value=L>Laki - Laki</option>
					<option value=P>Perempuan</option>
				</select></td>
		</tr>
		<tr>
			<td>Alamat<label></label></td><td>: <input type="text" name="alamat" placeholder="Alamat tempat tinggal " size=50 value="<?php echo (isset($datap['alamat'])?$datap['alamat']:'') ?>" required   />  </td>
		</tr>
		<tr>
			<td><label>Kota</label></td><td>: <input type="text" name="kota" placeholder="Kota" value="<?php echo (isset($datap['kota'])?$datap['kota']:'') ?>"kota	 required   />  </td>
		</tr>
		<tr>
			<td><label>Provinsi</label></td><td>: <input type="text" name="provinsi" placeholder="Provinsi" value="<?php echo (isset($datap['provinsi'])?$datap['provinsi']:'') ?>" required   />  </td>
		</tr>
		<tr>
			<td><label>Kabupaten</label></td><td>: <input type="text" name="kab" placeholder="kabupaten" value="<?php echo (isset($datap['kab'])?$datap['kab']:'') ?>" required   />  </td>
		</tr>
		<tr>
			<td><label>Kode Pos</label></td><td>: <input type="text" name="kodepos" size=7 placeholder="Kode Pos" value="<?php echo (isset($datap['kodepos'])?$datap['kodepos']:'') ?>"  required   />  </td>
		</tr>
		<tr>
			<td>No Telp<label></label></td><td>: <input type="text" name="notelp" size=15 placeholder="No. Telp" value="<?php echo (isset($datap['notelp'])?$datap['notelp']:'') ?>"  required   />  </td>
		</tr>
		<tr>
			<td>Email<label></label></td><td>: <input type="email" name="email" size=15 placeholder="Alamat Email" value="<?php echo (isset($datap['email'])?$datap['email']:'') ?>" required  />  </td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td>Sumber Biaya</td>
			<td> :
				<select name=sumberbiaya>
					<option value="Instansi">Instansi</option>
					<option value="Pribadi">Pribadi</option>
					<option value="Beasiswa">Beasiswa</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Pengalaman Kerja</td>
			<td> :
				<select name=pengalamankerja>
					<option value="Bekerja">Bekerja</option>
					<option value="Belum Bekerja">Belum Bekerja</option>
					<option value="Pernah Bekerja">Pernah Bekerja</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Status</td>
			<td> :
				<select name=status>
					<option value="Belum Menikah">Belum Menikah</option>
					<option value="Menikah">Menikah</option>
				</select>
			</td>
		</tr>
		<tr>
				<td ><label>Agama</label></td><td >:
				<select name=agama>
					<option value="Budha">Budha</option>
					<option value="Hindu">Hindu</option>
					<option value="Islam">Islam</option>
					<option value="Katolik">Katolik</option>
					<option value="Kristen">Kristen</option>
				</select></td>
		</tr>
		<tr>
			<td>Tempat / Tanggal Lahir</td>
			<td>: <input type="text" name="tempatlahir" size=15 placeholder="Tempat Lahir" value="<?php echo (isset($datap['tempatlahir'])?$datap['tempatlahir']:'') ?>" />, <input type="text" class=tanggal size=7 name=tanggallahir placeholder="YYYY-MM-DD" VALUE="<?php echo (isset($datap['tanggallahir'])?$datap['tanggallahir']:'') ?>" /></td>
		</tr>
		<tr>
			<td>&nbsp </td>
			<td> &nbsp <input type="submit" value="Simpan" /></td>
		</tr>
	</form>
</table>
<!-- Block Tambah Riwayat-->
<table width=100% class=table id="p_riwayattambah">
	<form method="post" id="form_riwayat" title="<?php echo ($sqlx == "id_session"?"notifikasi":"cetakpendaftaran") ?>">
		<input type="hidden" name="formnya" value="riwayat" />
		<input type="hidden" name="keteranganya" value="<?php echo $sqlx?>" />
	<tr>
		<td width=20%>Strata Pendidikan</td>
		<td width=80%> :
			<select name=strata>
				<option value="S1">S1</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>Universitas</td>
		<td>: <input type="text" name="universitas" placeholder="Nama Universitas" size=30  value="<?php echo (isset($datar['universitas'])?$datar['universitas']:'') ?>" required  /></td>
	</tr>
	<tr>
		<td>Fakultas</td>
		<td>: <input type="text" name="fakultas" placeholder="Nama Fakultas"  value="<?php echo (isset($datar['fakultas'])?$datar['fakultas']:'') ?>" size=30  required  /></td>
	</tr>
	<tr>
		<td>Jurusan</td>
		<td>: <input type="text" name="jurusan" placeholder="Nama Jurusan"  size=30  value="<?php echo (isset($datar['jurusan'])?$datar['jurusan']:'') ?>" required   /></td>
	</tr>
	<tr>
		<td>Tahun Kelulusan</td>
		<td>: <input type="text" name="tahunlulus" placeholder="YYYY" size=4  required  value="<?php echo (isset($datar['tahunlulus'])?$datar['tahunlulus']:'') ?>"  /></td>
	</tr>
	<tr>
		<td>IPK</td>
		<td>: <input type="text" name="ipk" placeholder="IPk" size=3   required  value="<?php echo (isset($datar['ipk'])?$datar['ipk']:'') ?>" /></td>
	</tr>
	<tr>
		<td>Gelar Akademik</td>
		<td>: <input type="text" name="gelar" placeholder="Gelar"   required  value="<?php echo (isset($datar['gelar'])?$datar['gelar']:'') ?>" /></td>
	</tr>

	<tr>
		<td></td>
		<td>&nbsp <input type="submit" value="Simpan" /></td>
	</tr>
	</form>
</table>

	<div class="cetakpendaftaran" id="p_cetakpendaftaran">
	</div>

	<div class="riwayat_ambil" id="p_riwayat">
	</div>

	<div class="notifikasi" id="p_notifikasi">
	</div>
<script>
	$(document).ready(function(){
		Bersih();
		tombolAktif("pendaftaran");

		$(".t_riwayattambah").click(function(){
			Bersih();
			tombolAktif("riwayattambah");
		});
		$(".t_cetakpendaftaran").click(function(){
			Bersih();
			tombolAktif("cetakpendaftaran");
			$(".cetakpendaftaran").load("page/pendaftaran_cetak.php?");
		});

		$(".t_pendaftaran").click(function(){
			Bersih();
			tombolAktif("pendaftaran");
		});
		$(".t_notifikasi").click(function(){
			Bersih();
			tombolAktif("notifikasi");
			$(".notifikasi").load("page/pendaftaran_notifikasi.php");
		});
		// Simpan Simpan
		$("#form_pendaftaran,#form_riwayat").submit(function(){
			Bersih();
			var menuaktif 	= $(this).attr("title");
			tombolAktif(menuaktif);
			$.ajax({
				type	: "POST",
				url		: "page/pendaftaran_simpan.php",
				data 	: $(this).serialize(),
				success : function(data){
					alert(data);
				}
			});
			return false;
		});


	});
</script>
