<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
	<script src="<?php echo base_url()?>assets/js/bootstrap-datetimepicker.js"></script> 
	<link href="<?php echo base_url()?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<style>
 .table{
	font-family:sans-serif;
	color:#444;
	border-collapse:collapse;
	width:100%;
	border:1px solid #f2f5f7;
}
.table tr th{
	background:#35A9DB;
	color:#fff;
	font-weight:normal;
		text-align:center;
	
}
.table, th, td{
	padding:8px 20px;
	text-align:;
}
.table, tr, td{
	padding:8px 20px;
	text-align:;
}
.table tr:nth-child(even){
	background-color:#DDDDDD;
}
 </style>
 
</head>
<body>

<div class="container">
	<legend>
	</legend>
	<table class="table">
		<tr>
			<td>
	<h3>Retur Pembelian</h3>
	</td>
	<td  align="right">
	<div class="input-group col-md-10" >
		No. Nota : <div class="input-group"> <input type="text" name="No_Faktur" class="form-control" value="<?php echo $baris['No_Faktur']; ?>" readonly="readonly">
		<span class="input-group-addon"><span class="glyphicon glyphicon-barcode"></span></span>
	</div>
	</div>
	</td>
	<td align="left">
	<div class="input-group col-md-10" >
            Tanggal Pembelian :
			<div class="input-group" >
                    <input class="form-control" type="text" name="Tanggal_Pembelian" value="<?php echo date('d F Y H:i:s', strtotime($baris['Tanggal_Pembelian']));?>" readonly="readonly">
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
	</div>
	
	</td>
	</tr>
	<tr>
		<td align="left">
		User :
				<div class="input-group col-md-8" >
			<input type="text" class="form-control" value="<?php echo $uss['Username']; ?>" readonly="readonly">
				</div>
				
		Supplier : 
				<div class="input-group col-md-8" >
			<input type="text" name="Kode_User" class="form-control" value="<?php echo $baris['Kode_Supplier'].' - '.$ss['Nama_Supplier']; ?>" readonly="readonly">
			</div>
		</td>

		
	
		<td align="right">
		
		<p style="margin-top:0px;align:right;" ><b><h5><u>Total Awal Pembelian : </h5></b></p> 
		<p style="margin-top:20px;align:right;" ><b><h5><u>Total Retur : </h5></b></p> 
		<p style="margin-top:20px;align:right;" ><b><h5><u>Jumlah : </h5></b></p> 
		</td>
		<td>
		
			<input type="hidden" name="Total_Pembelian" class="form-control" style="margin-top:70px; background-color:#FFFFAA;" value="<?php echo $baris['Total_Pembelian'];?>" readonly="readonly">
			<input type="text" class="form-control" style="margin-top:0px; background-color:#FFFFAA;" value="<?php echo 'Rp. '.number_format($baris['Total_Pembelian'],0,",",".");?>" readonly="readonly"> 
			
			<input type="hidden" name="Total_Pembelian" class="form-control" style="margin-top:70px; background-color:#FFFFAA;" value="<?php echo $baris['Total_Pembelian'];?>" readonly="readonly">
			<input type="text" class="form-control" style="margin-top:0px; background-color:#FFFFAA;" value="<?php //echo 'Rp. '.number_format($baris['Total_Pembelian'],0,",",".");?>" readonly="readonly"> 
		
			<input type="hidden" name="Total_Pembelian" class="form-control" style="margin-top:70px; background-color:#FFFFAA;" value="<?php echo $baris['Total_Pembelian'];?>" readonly="readonly">
			<input type="text" class="form-control" style="margin-top:0px; background-color:#FFFFAA;" value="<?php //echo 'Rp. '.number_format($baris['Total_Pembelian'],0,",",".");?>" readonly="readonly"> 
			
		</td>	
	</tr>
	<tr>
	<td></td>
	<td></td>
	<td></td>
	</tr>
	
	<tr>
	<td>
	Catatan Retur :
	<br>
	<textarea class="form-control" style="margin-top:0px;margin-left:0px;align:;"></textarea>
	</td>
	<td></td>
	<td></td>
	</tr>
	</table>

<table class="table table-bordered table responsive" style="margin-top:-20px;">
		<tr>
			<td>Jenis Pembayaran</td>
			<td>
			: <?php echo $baris['Jenis_Pembayaran']; ?>
			</td>
		</tr>
		
		<tr>
			<td>Nomor Rekening</td>
			<td>
			: <?php echo $baris['Nomor_Rekening'];?>
			</td>
		</tr>
		<tr>
			<td>Tanggal Jatuh Tempo</td>
			<td>
				: <?php $t = $baris['Tanggal_Jatuh_Tempo'];
					if($t=='0000-00-00'){
						echo '-';
					}else {
						echo date('d F Y',strtotime($baris['Tanggal_Jatuh_Tempo']));
					}
					?>
			</div>
		</tr>
		<tr>
			<td>Foto Bukti Pembayaran</td>
			<td>
				<img width="300" height="180" <?php echo img($baris['Bukti_Pembayaran']);?><br><br>
			</td>
		</tr>
		<tr>
			<td>Status Pembelian</td>
			<td>
			: <?php $st = $baris['Status_Pembelian'];
						if($st=='Belum Selesai'){
							$status = "<b style='color:red;'>" .$baris['Status_Pembelian'] ."</b>";
						}else if($st=='Sedang Proses'){
							$status = "<b style='color:orange;'>" .$baris['Status_Pembelian'] ."</b>";
							}
						else if($st=='Selesai'){
							$status = "<b style='color:green;'>" .$baris['Status_Pembelian'] ."</b>";
							}
					echo $status; ?>
			</td>
		</tr>
		<tr>
			<td>Status Retur</td>
			<td>
			: <?php echo $baris['Status_Retur'];
						/*if($rt=='-'){
							$status = $baris['Status_Retur'];
						}else if($rt=='Retur'){
							$status = "<b style='color:black;'>" .$baris['Status_Retur'] ."</b>";
							}
					echo $status;
*/					?>
			</td>
		</tr>
	</table>
	
	<table class="table table-bordered table responsive" style="margin-top:20px;">
	<tr>
		<th><b>No.</b></th>
		<th></b>Kode Bahan Baku</b></th>
		<th><b>Nama Barang</b></th>
		<th><b>Qty</b></th>
		<th><b>Harga Beli</b></th>
		<th><b>Subtotal</b></th>
		<th><b>Tools</b></th>
	</tr>
	<?php 
		$no = $this->uri->segment('3') + 1;
		foreach($fak as $baris){
		?>
	<tr>
		<td align="center" ><?php echo $no; ?></td>
		<td align="center" ><?php echo $baris->Kode_Bahan_Baku; ?></td>
		<td align="center" ><?php echo $baris->Nama_Barang; ?></td>
		<td align="center" ><?php echo $baris->Qty; ?></td>
		<td align="left" ><?php echo 'Rp. '.number_format($baris->Harga_Beli,0,",","."); ?></td>
		<td align="left" ><?php $sub = $baris->Qty * $baris->Harga_Beli; 
								echo 'Rp. '.number_format($sub,0,",",".");?></td>
		<td align="center" >
			<a onclick="return confirm('Silahkan Edit Data Barang Pembelian Dengan Kode Barang <?php echo $baris->Kode_Bahan_Baku; ?> ')" href="<?php echo base_url('index.php/pembelian/editretur/'.$baris->Kode_Bahan_Baku); ?>"><span class="btn btn-success btn-sm glyphicon glyphicon-pencil" align="right"></span></a>
			<a onclick="return confirm('Hapus Data Barang Pembelian Dengan Kode Barang <?php echo $baris->Kode_Bahan_Baku; ?> ?')" href="<?php echo base_url('index.php/pembelian/hapusretur?Kode_Bahan_Baku='.$baris->Kode_Bahan_Baku); ?>"><span class="btn btn-danger btn-sm glyphicon glyphicon-trash" align="right"></span></a>
		</td>

	</tr>
	<?php
	$no++;
		}
		?>
	</table>
	<table class="table table-bordered table responsive" style="margin-top:-20px;">
	<tr>
		<th></th>
	</tr>
	</table>
	<center>
	<a class='btn btn-info btn-sm' href="<?php echo base_url().'index.php/pembelian/index';?>">Lihat Data Pembelian</a>
	</center>
<br>
<br>	
	</div>
</div>
</div>
</div>
<!--Untuk Date Picker-->
<script type="text/javascript" src="bootstrap-3.3.7-dist-1/bootstrap-3.3.7-dist/jquery/jquery-1.8.2.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="bootstrap-3.3.7-dist-1/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
	$('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });
</script>
</body>
<?php
	//if(validation_errors()){
	//echo '<script>alert("Harap Lengkapi Data Terlebih Dahulu..!!");</script>'; 
	//}
?>
</html>