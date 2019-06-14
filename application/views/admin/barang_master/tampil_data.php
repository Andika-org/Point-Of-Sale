<link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap-3.3.7-dist-1/bootstrap-3.3.7-dist/css/bootstrap.min.css">
<script src="<?php echo base_url()?>assets/bootstrap-3.3.7-dist-1/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

<div class="col-xs-12">
<div class="col-xs-11 pull-right" style="padding-left:120px;"> 
	<h2>Data Master Barang</h2>
	<?php
		echo anchor('barang_master/input_header','Tambah Data',array('class'=>'btn btn-success btn sm'));
		echo "<br><br>";
	?>
	<form action="<?php echo base_url().'barang_master/cari';?>" method="post">
		<input type="text" name="cari" placeholder="Sort By Name"> <button name="btncari" class="btn btn-primary btn sm">Cari!</button>
		<br><br>
	</form>
	<table class="table table-bordered table-responsive">
		<tr>
			<th>No</th>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>Aksi</th>
		</tr>
		<?php
			$no = 1;
			foreach ($record as $a) {?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $a->Kode_Barang;?></td>
				<td><?php echo $a->Nama_Barang;?></td>
				<td>
					<?php 
						echo anchor('barang_master/lihat_detail/'.$a->Kode_Barang,'
						Detail',array('class'=>'btn btn-danger btn sm')); 
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
</div>