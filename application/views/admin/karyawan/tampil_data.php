<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<div class="col-xs-12">
<div class="col-xs-11 pull-right" style="padding-left:120px;"> 
	<h2>Data Karyawan</h2>
	<?php
		echo anchor('karyawan/input','Tambah Data',array('class'=>'btn btn-success btn sm'));
		echo "<br><br>";
	?>
	<table class="table table-bordered table-responsive">
		<tr>
			<th>No</th>
			<th>Nama Karyawan</th>
			<th>Tanggal Lahir</th>
			<th>Alamat</th>
			<th>Jenis Kelamin</th>
			<th>Telepon</th>
			<th>Email</th>
			<th>Bagian</th>
			<th>Jabatan</th>
			<th>Gaji Pokok</th>
			<th>Foto</th>
			<th colspan="2">Aksi</th>
		</tr>
		<?php
			$no = 1;
			foreach ($record as $a) { ?>
				<tr>
					<td><?php echo $no;?></td>
					<td><?php echo $a->Nama_Karyawan; ?></td>
					<td><?php echo $a->Tanggal_Lahir; ?></td>
					<td><?php echo $a->Alamat; ?></td>
					<td><?php echo $a->Jenis_Kelamin; ?></td>
					<td><?php echo $a->Telepon; ?></td>
					<td><?php echo $a->Email; ?></td>
					<td><?php echo $a->Bagian; ?></td>
					<td><?php echo $a->Jabatan; ?></td>
					<td><?php echo $a->Gaji_Pokok; ?></td>
					<td><img src="<?php echo base_url()?>fotokaryawan/resize/<?=$a->Foto_Karyawan; ?>"</td>
					<td>
						<?php 
							echo anchor('karyawan/edit/'.$a->Kode_Karyawan,'
							Edit',array('class'=>'btn btn-warning btn sm')); 
						?>
					</td>
					<td>
						<?php 
							echo anchor('karyawan/hapus/'.$a->Kode_Karyawan,'Hapus'
							,array('class'=>'btn btn-danger btn sm', 'onclick'=>"return confirmDialog();")); 
						?>
					</td>
				</tr>
		
		<?php
		$no++;	
			}
		?>
	</table>
	<?php 
		//panggil fungsi pagination
		echo $this->pagination->create_links();
	?>
	<script>
		function confirmDialog() {
	 		return confirm('Apakah anda yakin akan menghapus data ini?')
		}
	</script>
</div>