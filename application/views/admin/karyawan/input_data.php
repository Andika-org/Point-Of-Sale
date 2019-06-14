<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<div class="col-xs-12">
<div class="col-xs-11 pull-right" style="padding-left:120px;"> 
	<h2>Input Data Karyawan</h2>
	<?php
		echo form_open_multipart('karyawan/input');
	?>
	<table class="table table-bordered table-respomsive">
		<tr>
			<td>Kode Karyawan</td>
			<td><input required type="text" name="kode" class="form-control" value="<?php echo $kd_kar;?>" readonly></td>
		</tr>
		<tr>
			<td>Nama Karyawan</td>
			<td><input required type="text" name="nama" class="form-control"></td>
		</tr>
		<tr>
			<td>Tanggal Lahir</td>
			<td><input required type="date" name=tgl class="form-control"></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><textarea required name="alamat" class="form-control"></textarea></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>
				<select name="jk" class="form-control" required >
					<option value="L">Laki-laki</option>
					<option value="P">Perempuan</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Telepon</td>
			<td><input required type="text" name="tlp" class="form-control"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input required type="text" name="email" class="form-control"></td>
		</tr>
		<tr>
			<td>Bagian</td>
			<td>
				<select name="bagian" class="form-control" required >
					<option value="produksi">Produksi</option>
					<option value="admin">Admin</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Jabatan</td>
			<td>
				<select name="jabatan" class="form-control" required >
					<option value="helper">Helper</option>
					<option value="admin">Admin</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Gapok</td>
			<td><input required type="text" name="gapok" class="form-control"></td>
		</tr>
		<tr>
			<td>Foto</td>
			<td><input required class="form-control" type="file" name="gambar" required></td>
		</tr>
		<tr>
			<td><button name="submit" class="btn btn-primary btn sm">Simpan</button></td>
			<td><?php echo anchor('karyawan','Batal',array('class'=>'btn btn-danger btn sm'))?></td>
		</tr>
	</table>
</div>