<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
 <link href="<?php echo base_url()?>assets/untukcssfoto/layout2.css" rel="stylesheet" type="text/css" media="all">   
<link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap-3.3.7-dist-1/bootstrap-3.3.7-dist/css/bootstrap.min.css">
  
 </head>
<script type='text/javascript' src='<?php echo base_url();?>assets/untukmoney/jqueryMaskmoney.min.js'></script>
  <script type="text/javascript">
	$(document).ready(function(){
		$('#angka1').maskMoney({prefix:'Rp. ',thousands:'.',decimal:',',precision:0});
		
	})
  </script>
<script type="text/javascript">
function kompresharga(){
	var a = document.getElementById('angka1').value;
		document.getElementById('hasilbiaya').value = a.split('.').join('').substr(3);
}

</script>
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
<a href="<?php echo base_url('ReturPembelian/index');?>" class="btn btn-danger glyphicon glyphicon-chevron-left"> Back</a>
<br>
<br>
<legend>
</legend>
	<form class="form-signin" method="POST" action="<?php echo base_url();?>ReturPembelian/editheaderreturpembelian/" enctype="multipart/form-data">
	<table>
		<tr>
			<td>
				<h3 style="width:300px">Retur Barang</h3>
				</td>
			<td  align="right">
	
			<div class="input-group col-md-10" style="width:300px" >
				No. Retur : <div class="input-group"> <input type="text" name="No_Retur" class="form-control" value="<?php echo $header['No_Retur']; ?>" readonly="readonly">
				<span class="input-group-addon"><span class="glyphicon glyphicon-barcode"></span></span>
				</div>
			</div>
			</td>
			<td align="left">
				<div class="input-group col-md-10" style="width:300px">
						Tanggal Retur
						<div class="input-group">
								<input class="form-control" type="hidden" name="Tanggal_Retur" value="<?php echo date('Y-m-d H:i:s',strtotime($header['Tanggal_Retur']));?>" readonly="readonly">
								<input class="form-control" type="text" value="<?php echo date('d F Y',strtotime($header['Tanggal_Retur']));?>" readonly="readonly">
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
						</div>
				</div>
			
			</td>
		</tr>
		
	</table>
	
	<table class="table" style="display:;" id="dataretur">
		<tr style="background:#DDDDDD;">
			<td style="width:80px;">Kp. Gudang</td>
			<td >
				<input type="hidden" name="Kode_User" class="form-control" value="<?php echo $header['Kode_User']; ?>" readonly="readonly">
				<input type="text" class="form-control" value="<?php echo $header['Nama']; ?>" readonly="readonly">
			</td>
			<td style="vertical-align:bottom;">
				Keterangan : 
			</td>
			
		</tr>
		
		<tr style="background:#DDDDDD;">
			<td style="width:80px;">Supplier</td>
			<td style="width:300px;">
				<select required name="Kode_Supplier" class="form form-control">
					<option value="<?php echo $header['Kode_Supplier'];?>"><?php echo $header['Nama_Supplier'].' - '.$header['Deskripsi']; ?></option>
					<?php foreach($supplier as $sp){?>
					<option value="<?php echo $sp->Kode_Supplier; ?>"><?php echo $sp->Nama_Supplier.' - '.$sp->Deskripsi; ?></option>
					<?php } ?>
				</select>
					
			</td>
			<td rowspan="4" style="vertical-align:top;">
				<textarea required style="width:100%;height:135px;" name="Keterangan" class="form form-fontrol"><?php echo $header['Keterangan'];?></textarea>
			</td>
			
		</tr>
		<tr style="background:#DDDDDD;">
			<td style="width:100px;">Biaya Retur</td>
			<td>
				<input type="hidden" name="Biaya_Retur" id="hasilbiaya" value="<?php echo $header['Biaya_Retur'];?>" class="form-control">
			
				<input type="text" id="angka1" onkeyup="kompresharga();" value="<?php echo 'Rp. '.number_format($header['Biaya_Retur'],0,",",".");?>" class="form-control">
			</td>
			
		</tr>
		<tr style="background:#DDDDDD;">
			<td style="width:100px;">Status</td>
			<td>
				<input type="text" name="Status" readonly="readonly" value="<?php echo $header["Status"]; ?>" class="form-control">
			</td>
			
		</tr>
		<tr style="background:#DDDDDD;">
			<td></td>
			<td colspan="2">
			<button class="glyphicon glyphicon-edit btn btn-success form-controldouble pull-right"> <b>Update</b></button>
			</td>
		</tr>
		
	</table>
	</form>
	<table style="margin-top:-10px;" id="table" class="table table-bordered table responsive">
			
		<tr>
			<th style="align:center;"><b>No.</b></th>
			<th align="center"><b>Kode Barang</b></th>
			<th align="center"><b>Nama Barang</b></th>
			<th align="center"><b>Qty</b></th>
			<th align="center"><b>Status</b></th>
		</tr>
		
		<?php 
		$no = 1;
		foreach($detail as $baris){
		?>
	<tr>
		<td align="center" ><?php echo $no; ?></td>
		<td align="center" ><?php echo $baris->Kode_Bahan_Baku; ?></td>
		<td align="center" ><?php echo $baris->Nama_Barang; ?></td>
		<td align="left" ><?php echo $baris->Qty.' '.$baris->Nama_Satuan; ?></td>
		<td align="center" >Retur</td>
	</tr>
	<?php
		$no++;
		}
		?>
	</table>
<legend>
</legend>

</div>
</div>

  <!-- Bootstrap modal -->
  
  </body>
</html>

	