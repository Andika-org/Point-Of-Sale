<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
	<script src="<?php echo base_url()?>assets/js/bootstrap-datetimepicker.js"></script> 
	<link href="<?php echo base_url()?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<style>
 #table{
	font-family:sans-serif;
	color:#444;
	border-collapse:collapse;
	width:100%;
	border:1px solid #f2f5f7;
}
#table tr th{
	background:#008080;
	color:#fff;
	font-weight:normal;
		text-align:center;
	
}
#table, th, td{
	padding:8px 20px;
	text-align:;
}
#table, tr, td{
	padding:8px 20px;
	text-align:;
}
#table tr:nth-child(even){
	background-color:#DDDDDD;
}
 </style>
 
</head>
<body>

<div class="col-xs-12">
<div class="col-xs-11 pull-right" style="padding-left:120px;"> 
<br>
<a href="<?php echo base_url('Pembelian/index');?>" class="btn btn-danger glyphicon glyphicon-chevron-left"> Back</a>
<br>
<br>
	<legend>
	</legend>
	<table id="table" style="border:none;">
		<tr>
			<td>
	<h3 style="width:300px;">Nota Order Pembelian Barang Supplier </h3>
	</td>
	<td  align="right">
	<div class="input-group col-md-10" style="width:300px" >
		No. Nota : <div class="input-group"> <input type="text" name="No_Faktur" class="form-control" value="<?php echo $baris['No_Faktur']; ?>" readonly="readonly">
		<span class="input-group-addon"><span class="glyphicon glyphicon-barcode"></span></span>
	</div>
	</div>
	</td>
	<td align="left">
	<div class="input-group col-md-10" style="width:300px">
            Tanggal Pembelian :
			<div class="input-group" >
                    <input class="form-control" type="text" name="Tanggal_Pembelian" value="<?php echo date('d F Y', strtotime($baris['Tanggal_Pembelian']));?>" readonly="readonly">
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
	</div>
	
	</td>
	</tr>
	<tr>
		<td align="left">
		Pegawai :
				<div class="input-group col-md-8" >
			<input type="text" class="form-control" value="<?php echo $uss['Nama']; ?>" readonly="readonly">
				</div>
				
		Supplier : 
				<div class="input-group col-md-12" >
			<input type="text" name="Kode_User" class="form-control" value="<?php echo $ss['Nama_Supplier'].' - '.$ss['Deskripsi']; ?>" readonly="readonly">
			</div>
		</td>
		
		<td align="right">
		
		<p style="margin-top:80px;align:right;" ><b><h5>Total Pembelian : </h5></b></p> 
		</td>
		<td>
		
			<input type="hidden" name="Total_Pembelian" class="form-control" style="margin-top:70px; background-color:#FFFFAA;" value="<?php echo $baris['Total_Pembelian'];?>" readonly="readonly">
			<input type="text" class="form-control" style="margin-top:70px; background-color:#FFFFAA;" value="<?php echo 'Rp. '.number_format($baris['Total_Pembelian'],0,",",".");?>" readonly="readonly"> 
		</td>	
	</tr>
	<tr>
	<td>
	</td>
	<td>
	</td>
	<td>
	</td>
	</tr>
	</table>

<table class="table-bordered table responsive" style="margin-top:-20px;">
		<tr>
			<td style="width:300px;">Discount</td>
			<td>
			<?php echo $baris['Discount'].' %'; ?>
			</td>
		</tr>
		<tr>
			<td>PPN</td>
			<td>
			<?php echo $baris['Ppn'].' %'; ?>
			</td>
		</tr>
		<tr>
			<td>Jenis Pembayaran</td>
			<td>
			<?php echo $baris['Jenis_Pembayaran']; ?>
			</td>
		</tr>
		<tr>
			<td>Nominal Bayar</td>
			<td>
			<?php echo 'Rp. '.number_format($baris['Nominal'],0,",","."); ?>
			</td>
		</tr>
		<tr>
			<td>Kembali</td>
			<td>
			<?php echo 'Rp. '.number_format($baris['Kembali'],0,",","."); ?>
			</td>
		</tr>
		
		<?php
			if($baris['Jenis_Pembayaran']=="Transfer"){
		?>
		
		<tr>
			<td>Nama Bank</td>
			<td>
			<?php echo $baris['Nama_Bank'];?>
			</td>
		</tr>
		<tr>
			<td>Nomor Rekening</td>
			<td>
			<?php echo $baris['Nomor_Rekening'];?>
			</td>
		</tr>
		<tr>
			<td>Atas Nama</td>
			<td>
			<?php echo $baris['Atas_Nama'];?>
			</td>
		</tr>
		
			<?php }else{}?>
		
		<tr>
			<td>Tanggal Jatuh Tempo</td>
			<td>
				<?php $t = $baris['Tanggal_Jatuh_Tempo'];
					if($t=='0000-00-00'){
						echo '-';
					}else {
						echo date('d F Y',strtotime($baris['Tanggal_Jatuh_Tempo']));
					}
					?>
			</div>
		</tr>
		<tr>
			<td>Status Pembelian</td>
			<td>
			<?php echo $baris['Status_Pembelian'];?>
			</td>
		</tr>
		<tr>
			<td>Foto Bukti Pembayaran</td>
			<td>
				<img width="300" height="180" <?php echo img('fotobuktipembayaran/'.$baris['Bukti_Pembayaran']);?><br><br>
			</td>
		</tr>
		<!--
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
		-->
	</table>
	<legend>
	</legend>
	<table id="table" class="table-bordered table responsive" style="margin-top:20px;">
	<tr>
		<th><b>No.</b></th>
		<th><b>Kode Barang</b></th>
		<th><b>Nama Barang</b></th>
		<th><b>Qty</b></th>
		<th><b>Harga Beli</b></th>
		<th><b>Subtotal</b></th>
	</tr>
	<?php 
		$no = $this->uri->segment('3') + 1;
		foreach($fak as $a){
		?>
	<tr>
		<td align="center" ><?php echo $no; ?></td>
		<td align="center" ><?php echo $a->Kode_Bahan_Baku; ?></td>
		<td align="center" ><?php echo $a->Nama_Barang; ?></td>
		<td align="center" ><?php echo $a->Qty.' '.$a->Nama_Satuan; ?></td>
		<td align="left" ><?php echo 'Rp. '.number_format($a->Harga_Beli,0,",","."); ?></td>
		<td align="left" ><?php $sub = $a->Qty * $a->Harga_Beli; 
								echo 'Rp. '.number_format($sub,0,",",".");?></td>

	</tr>
	<?php
	$no++;
		}
		?>
	<tr>
		<th colspan="5"><b><center>Total<center></b></th>
		<th><b><?php echo 'Rp. '.number_format($baris['Total_Pembelian_Sebelumnya'],0,",","."); ?></b></th>
	</tr>
	</table>
	<legend>
	</legend>
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
	if(validation_errors()){
	echo '<script>alert("Harap Lengkapi Data Terlebih Dahulu..!!");</script>'; 
	}
?>
</html>