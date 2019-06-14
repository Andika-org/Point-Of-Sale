<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<div class="col-xs-12">
<div class="col-xs-11 pull-right" style="padding-left:120px;"> 
	<h2>Edit Data Karyawan</h2>
	<?php
		echo form_open_multipart('karyawan/edit');
	?>
	<table class="table table-bordered table-respomsive">
	<!-- ambil path foto sebelumnya -->
	<input type="hidden" name="path"  value="<?php echo $record['Foto_Karyawan'];?>">

		<tr>
			<td>Kode Karyawan</td>
			<td><input required type="text" name="kode" class="form-control" value="<?php echo $record['Kode_Karyawan'];?>" readonly></td>
		</tr>
		<tr>
			<td>Nama Karyawan</td>
			<td><input required type="text" name="nama" class="form-control" value="<?php echo $record['Nama_Karyawan'];?>"></td>
		</tr>
		<tr>
			<td>Tanggal Lahir</td>
			<td><input required type="date" name=tgl class="form-control" value="<?php echo $record['Tanggal_Lahir'];?>"></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><textarea required name="alamat" class="form-control"><?php echo $record['Alamat'];?></textarea></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>
				<select name="jk" class="form-control" required >
					<?php
						if($record['Jenis_Kelamin'] == "L"){
							echo "
							<option value='L'selected>Laki-laki</option>
							<option value='P' >Perempuan</option>
							";
						}else{
							echo "
							<option value='L'>Laki-laki</option>
							<option value='P' selected >Perempuan</option>
							";
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Telepon</td>
			<td><input required type="text" name="tlp" class="form-control" value="<?php echo $record['Telepon'];?>"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input required type="text" name="email" class="form-control" value="<?php echo $record['Email'];?>"></td>
		</tr>
		<tr>
			<td>Bagian</td>
			<td>
				<select name="bagian" class="form-control" required >
				<?php
					if($record['Bagian'] == "produksi"){
						echo "
							<option value='produksi' selected>Produksi</option>
							<option value='admin' >Admin</option>
						";
					}else{
						echo "
							<option value='produksi'>Produksi</option>
							<option value='admin' selected>Admin</option>
						";
					}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Jabatan</td>
			<td>
				<select name="jabatan" class="form-control" required >
				<?php
					if($record['Jabatan'] == "helper"){
						echo "
						<option value='helper' selected>Helper</option>
						<option value='admin'>Admin</option>
						";
					}else{
						echo "
						<option value='helper'>Helper</option>
						<option value='admin' selected>Admin</option>
						";
					}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Gapok</td>
			<td><input required type="text" name="gapok" class="form-control" value="<?php echo $record['Gaji_Pokok'];?>"></td>
		</tr>
		<tr>
			<td>Foto</td>
			<td>
				<input type="checkbox" value="ya" name="ya"> Ganti Foto?
				<input class="form-control" type="file" name="gambar" value="<?php echo $record['Foto_Karyawan'];?>">
			</td>
		</tr>
		<tr>
			<td><button name="submit" class="btn btn-primary btn sm">Simpan</button></td>
			<td><?php echo anchor('karyawan','Batal',array('class'=>'btn btn-danger btn sm'))?></td>
		</tr>
	</table>
</div>