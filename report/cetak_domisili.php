<?php
	include "../inc/koneksi.php";
	
	if (isset ($_POST['btnCetak'])){
	$id = $_POST['id_pend'];
	}
	$tanggal = date("m/y");
	$tgl = date("d/m/y");
?>


<!DOCTYPE html>
<html lang="en">

<body>
	<center>

		<h2>Rukun Tetangga RT 005 RW 006</h2>
		<h3>Kel. Sasak Panjang Kec. Tajur Halang Kab. Bogor Jawa Barat kode </h3>
		<p>__________________________________________________________________________________________</p>
		<?php
			$sql_tampil = "select * from tb_pdd
			where id_pend ='$id'";
			
			$query_tampil = mysqli_query($koneksi, $sql_tampil);
			$no=1;
			while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
		?>
	</center>

	<center>
		<h4>
			<u>SURAT KETARANGAN DOMISILI</u>
		</h4>
		<h4>No Surat :
			<?php echo $data['id_pend']; ?>/Ket.Domisili/
			<?php echo $tanggal; ?>
		</h4>
	</center>
	<p>Yang bertandatangan dibawah ini Ketua RT 005 RW 006 , Kelurahan Sasak Panjang, Kecamatan Tajurhalang, Kabupaten Bogor, dengan ini menerangkan bahawa :</P>
	<table>
		<tbody>
			<tr>
				<td>NIK</td>
				<td>:</td>
				<td>
					<?php echo $data['nik']; ?>
				</td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td>
					<?php echo $data['nama']; ?>
				</td>
			</tr>
			<tr>
				<td>TTL</td>
				<td>:</td>
				<td>
					<?php echo $data['tempat_lh']; ?>/
					<?php echo $data['tgl_lh']; ?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<p>Adalah benar-benar warga Komplek Inkopad RT005 RW006, Kelurahan Sasak Panjang, Kecamatan Tajurhalang, Kabupaten Bogor, Jawa Barat</P>
	<p>Demikian Surat ini dibuat, agar dapat digunakan sebagai mana mestinya.</P>
	<br>
	<br>
	<br>
	<br>
	<br>
	<p align="right">
		Bogor,
		<?php echo $tgl; ?>
		<br> Ketua RT 005
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>(         Sunaryo          )
	</p>


	<script>
		window.print();
	</script>

</body>

</html>