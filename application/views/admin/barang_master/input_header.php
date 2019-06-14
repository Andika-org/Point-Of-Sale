<!DOCTYPE html>
<html>
<head>
<script src="<?php echo base_url()?>assets/bootstrap-3.3.7-dist-1/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
$(document).ready( function () {

	$("#append").click( function() {
	    /*$(".group").append('<div class="controls"><br>'
	        +'<select name="bahan_baku" class="form-control">
	        </select>'
	        +'<input type="text" name="stict"class="form-control" placeholder="Jumlah Stict"><br>'
	        +'<a href="#" class="remove_this btn btn-danger">remove</a><br><br></div>');*/
	        $.ajax({
		        type: 'POST',
		        url: 'http://localhost:84/pabrikbordir/index.php/barang_master/ambil_bahan',
		        success: function(x){
		        	$(".group").append('<div class="controls"><br>'
			        +'<select name="bahan_baku" class="form-control">'+x+'</select>'
			        +'<input type="text" name="stict"class="form-control" placeholder="Jumlah Stict"><br>'
			        +'</div>');}
		    });
	        return false;
	    });
    
	$('.remove_this').live('click', function() {
	    $(this).parent().remove();
	    return false;
	});
});
</script>
</head>
<body>
<div class="col-xs-12">
<div class="col-xs-11 pull-right" style="padding-left:120px;"> 
	<h2>Tambah Data Barang</h2>
	<?php
		echo form_open_multipart('barang_master/input_header');
		//echo form_open('barang_master/tambah_detail');
	?>

	<table class="table table-bordered table-responsive">
		<tr>
			<td>Kode Barang</td>
			<td><input type="text" name="kode" class="form-control" value="<?php echo $kd_brg;?>" readonly></td>
		</tr>
		<tr>
			<td>Nama Barang</td>
			<td><input type="text" name="nama" class="form-control"></td>
		</tr>
		<tr>
			<td>Harga Barang</td>
			<td><input type="text" name="harga" class="form-control"></td>
		</tr>
		<tr>
			<td>Foto</td>
			<td><input type="file" name="gambar" class="form-control"></td>
		</tr>
		<tr>
			<td>Bahan Baku</td>
			<td>	
				
				<div class="group">
					<div id="div1">
						<select name="bahan_baku" class="form-control" id="bahan_baku">
						<?php
						foreach($kd_bhn_baku as $k){
							echo "
							<option value='$k->Kode_Bahan_Baku'>$k->Nama_Barang</option>
							";
							}
						?>
						</select>
						<br>
						<input type="text" name="stict" class="form-control" placeholder="Jumlah Stict">
					</div>
				</div>
				<br>
				<div class="controls">
					<button name="tambah" class="btn btn-info btn sm" onclick="document.location.reload(true)">Tambah</button>
				</div>
				<br>
				
			</td>
		</tr>
		<tr>
			<td><button name="submit" class="btn btn-primary">Simpan</button></td>
			<td><?php echo anchor('barang_master','Batal',array('class'=>'btn btn-danger btn sm'))?></td>
		</tr>
	</table>
</div>

<div class="container">
	<table class = "table table-bordered table-responsive">
		<tr>
			<th>No</th>
			<th>Kode Bahan Baku</th>
			<th>Nama Bahan Baku</th>
			<th>Jumlah Stitch</th>
			<th>Aksi</th>
		</tr>
		<?php
		$no = 1;
		if(!empty($bhn_baku)){
			foreach ($bhn_baku as $a) {?>
			<tr>
				<td><?php echo $no;?></td>
				<td><?php echo $a->Kode_Bahan_Baku;?></td>
				<td><?php echo $a->Nama_Barang;?></td>
				<td><?php echo $a->Jml_Stik;?></td>
				<td>
					<?php 
						echo anchor('barang_master/hapus_detail_header/'.$a->Id_Barang,'
						Hapus',array('class'=>'btn btn-danger btn sm','onclick'=>"return confirmDialog();")); 
					?>
				</td>
			</tr>
		<?php
			$no++;
			}
		}
		?>
	</table>
</div>
</body>
</html>
<script>
	function confirmDialog() {
		return confirm('Apakah anda yakin akan menghapus data ini?')
	}
</script>