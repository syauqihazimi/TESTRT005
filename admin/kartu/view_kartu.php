<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from tb_kk where id_kk ='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);

        $karkel=$data_cek['id_kk'];
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-user"></i> Detail Kartu Penduduk</h3>
		</h3>
		<div class="card-tools">
		</div>
	</div>
	<div class="card-body p-0">
		<table class="table">
			<tbody>
				<tr>
					<td style="width: 150px">
						<b>Nomor Kartu Keluarga</b>
					</td>
					<td>:
						<?php echo $data_cek['no_kk']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b>Nama Kepala Keluarga</b>
					</td>
					<td>:
						<?php echo $data_cek['kepala']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b>Alamat</b>
					</td>
					<td>:
						<?php echo $data_cek['alamat']; ?>
						<?php echo $data_cek['rt']; ?>
						<?php echo $data_cek['rw']; ?>
						<?php echo $data_cek['desa']; ?>
						<?php echo $data_cek['kec']; ?>
						<?php echo $data_cek['kab']; ?>
						<?php echo $data_cek['prov']; ?>
					</td>
				</tr>
			</tbody>
		</table>
		<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>NIK</th>
								<th>Nama</th>
								<th>Jekel</th>
								<th>Hub Keluarga</th>
							</tr>
						</thead>
						<tbody>
			<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT p.nik, p.nama, p.jekel, a.hubungan, a.id_anggota 
			  from tb_pdd p inner join tb_anggota a on p.id_pend=a.id_pend where status='Ada' and id_kk=$karkel");
              while ($data= $sql->fetch_assoc()) {
            ?>

							<tr>
								<td>
									<?php echo $data['nik']; ?>
								</td>
								<td>
									<?php echo $data['nama']; ?>
								</td>
								<td>
									<?php echo $data['jekel']; ?>
								</td>
								<td>
									<?php echo $data['hubungan']; ?>
								</td>
							</tr>

							<?php
              }
            ?>
						</tbody>
						</tfoot>
					</table>
				</div>
			</div>
		<div class="card-footer">
			<a href="?page=data-kartu" class="btn btn-warning">Kembali</a>
		</div>
	</div>
</div>