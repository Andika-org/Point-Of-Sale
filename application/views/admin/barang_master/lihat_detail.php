<script src="<?php echo base_url()?>assets/bootstrap-3.3.7-dist-1/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
	$("#batal").prop('disabled', true);
	$("#cancel").prop('disabled', true);
	$("#nama").prop('disabled', true);
	
    $("#tambah").click(function(){
        $("#input_detail").slideDown();
        $("#tambah").prop('disabled', true); //TO DISABLED 
        $("#batal").prop('disabled', false);
    });
    $("#batal").click(function(){
        $("#input_detail").slideUp();
        $("#tambah").prop('disabled', false); //TO DISABLED 

    });
    $("#btnubah").click(function(){
        $("#ubah").slideDown();
        $("#cancel").prop('disabled', false);
        $("#btnubah").prop('disabled', true);
        $("#nama").prop('disabled', false);
        //$("#tambah").prop('disabled', false); //TO DISABLED 

    });
    $("#cancel").click(function(){
        $("#ubah").slideUp();
        //$("#tambah").prop('disabled', false); //TO DISABLED 
        $("#cancel").prop('disabled', true);
        $("#btnubah").prop('disabled', false);
        $("#nama").prop('disabled', true);

    });
    
});
</script>

<div class="col-xs-12">
<div class="col-xs-11 pull-right" style="padding-left:120px;"> 
	<?php
		//echo form_open('barang_master/edit_detail');
		//echo form_open('barang_master/tambah_detail');
	?>
	<div class="col-xs-12">
		<table class="table table-bordered table-responsive">
		<h2>Detail Barang</h2>
			<tr>
				<td>Kode Barang</td>
				<td><input type="text" name="kode" class="form-control" value="<?php echo $record['Kode_Barang'];?>" readonly></td>
			</tr>
			<tr>
				
				<td>Nama Barang</td>
				<td><input type="text" id="nama" name="nama" class="form-control" value="<?php echo $record['Nama_Barang'];?>">
				</td>
			</tr>
			<tr>
				<td>Foto Barang</td>
				<td><img  src="<?=base_url()?>fotobarang/resize/<?php echo $record['Foto'];?>"></td>
			</tr>
			
			<tr>
				<td></td>
				<td>
				<button id="btnubah" class="btn btn-warning btn sm">Ubah</button>
				<button id="cancel" value="reset" class="btn btn-danger btn-sm">Batal</button>
				<?php
					/*echo anchor('barang_master/edit_header/'.$record['Kode_Barang'],'
					Ubah',array('class'=>'btn btn-warning btn sm'));*/ 
				?>
				</td>
			</tr>
		</table>
		<form action="<?php echo base_url(). 'index.php/barang_master/edit_header'; ?>" method="post" enctype="multipart/form-data">
			<table class ="table table-responsive table-bordered" id="ubah" style="display:none;">
				<div>
						<input type="hidden" name="kode" class="form-control" value="<?php echo $record['Kode_Barang'];?>" readonly>
						<input type="hidden" name="nama" class="form-control" value="<?php echo $record['Nama_Barang'];?>">
						<input type="hidden" name="path" value="<?php echo $record['Foto'];?>">
					<tr>
						<td>Harga Barang</td>
						<td><input type="text" name="harga" class="form-control" value="<?php echo $record['Harga'];?>"></td>
					</tr>
					<tr>
						<td>Foto</td>
						<td>
						<input type="checkbox" value="ya" name="ya"> Ganti Foto?
						<input type="file" name="foto" class="form-control">
						</td>
					</tr>
					<tr>
						<td><button name="submit" class="btn btn-primary">Simpan</button></td>
						<td></td>
					</tr>
				</div>
			</table>
		</form>
		<form action="<?php echo base_url(). 'barang_master/edit_detail'; ?>" method="post">
			<div id="input_detail" style="display:none;">
			<table class="table table-bordered table-responsive">
				<tr>
					<td>Bahan Baku</td>
					<td>	
						<div class="group">
							<input type="hidden" name="kode" class="form-control" value="<?php echo $record['Kode_Barang'];?>" readonly>
							<select name="bahan_baku" class="form-control" id="bahan_baku">
							<?php
							foreach($kd_bhn_baku as $k){
							echo "<option value='$k->Kode_Bahan_Baku'>$k->Nama_Barang</option>";
							}
							?>
							</select>
							<br>
							<input type="text" name="stict" class="form-control" placeholder="Jumlah Stict" required>
						</div>
						<br>
						<div class="controls">
							<button name="add" class="btn btn-info btn sm">Tambah</button>
							
						</div>
						<br>	
					</td>
				</tr>
			</table>
		</div>
		</form>
		<div class="col-xm-12">
			<table class="table table-bordered table-responsive">
				<input type="hidden" name="kode" class="form-control" value="<?php echo $record['Kode_Barang'];?>" readonly>
				<h3>Bahan Baku</h3>
				<tr>
					<th>Bahan Baku</th>
					<th>Jumlah Stict</th>
					<th>Aksi</th>
				</tr>
				<?php foreach ($detail as $a) {?>
				<tr>
					<td><?php echo $a->Nama_Bahan_Baku;?></td>
					<td><?php echo $a->Jml_Stik;?></td>
					<td>
						<?php 
							echo anchor('barang_master/hapus_detail/'.$a->Id_Barang,'
							Hapus',array('class'=>'btn btn-danger btn sm','name'=>'oke',
							'onclick'=>"return confirmDialog();"));
						?>
					</td>
				</tr>
				<?php
				}
				/*echo anchor('barang_master/input_detail','Tambah Detail','class' array('class'=>'btn btn-success btn sm'));
				echo "<br><br>";*/
				?>
				<div class="controls">
					<button id="tambah" class="btn btn-success btn sm">Tambah Detail</button>
					<button id="batal" class="btn btn-default btn md">Batal</button>
				</div>
				<br><br>
			</table>
		</div>
	</div>
</div>
<script>
	function confirmDialog() {
		return confirm('Apakah anda yakin akan menghapus data ini?')
	}
</script>
