<!DOCTYPE html>
<html>
<head>
<script src="<?php echo base_url()?>assets/bootstrap-3.3.7-dist-1/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-3.1.1.min.js"></script>
</head>
<body>
<div class="col-xs-12">
<div class="col-xs-11 pull-right" style="padding-left:120px;"> 
	<h2>Edit Barang Master</h2>
	<?php
		echo form_open_multipart('barang_master/edit_header');
	?>

	<table class="table table-bordered table-responsive">
	<input type="hidden" name="path"  value="<?php echo $record['Foto'];?>">
		<tr>
			<td>Kode Barang</td>
			<td><input type="text" name="kode" class="form-control" value="<?php echo $record['Kode_Barang'];?>" readonly></td>
		</tr>
		<tr>
			<td>Nama Barang</td>
			<td><input type="text" name="nama" class="form-control" value="<?php echo $record['Nama_Barang'];?>"></td>
		</tr>
		<tr>
			<td>Harga Barang</td>
			<td><input type="text" name="harga" class="form-control" value="<?php echo $record['Harga'];?>"></td>
		</tr>
		<tr>
			<td>Foto</td>
			<td>
			<input type="checkbox" value="ya" name="ya"> Ganti Foto?
			<input type="file" name="gambar" class="form-control" value="<?php echo $record['Foto']; ?>">
			</td>
		</tr>
		<tr>
			<td><button name="submit" class="btn btn-primary">Simpan</button></td>
			<td><?php echo anchor('barang_master','Batal',array('class'=>'btn btn-danger btn sm'))?></td>
		</tr>
	</table>
</div>
</body>
</html>