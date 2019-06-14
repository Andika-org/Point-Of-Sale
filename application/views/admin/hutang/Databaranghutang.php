<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
 <link href="<?php echo base_url()?>assets/untukcssfoto/layout2.css" rel="stylesheet" type="text/css" media="all">   
<link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap-3.3.7-dist-1/bootstrap-3.3.7-dist/css/bootstrap.min.css">
     <link href="<?php echo base_url()?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
   
 </head>

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
<a href="<?php echo base_url('Hutang/index');?>" class="btn btn-danger glyphicon glyphicon-chevron-left"> Back</a>
<br>
<br>
<legend>
</legend>


	
	
	<a  class="pull-right" href="<?php echo base_url('Hutang/listcetakbaranghutang/'.$nota."/".$customer["Id_Hutang"]);?>">
	<span class="btn btn-primary glyphicon glyphicon-print" style="margin-right:40px;">
			
	</span>
	</a>
	
	<table id="table" style="border:none;">
		<tr>
			<td>
				<h3 style="width:300px">Data Barang Hutang</h3>
			</td>
			<td  align="right" colspan="2">
	
				<div class="input-group col-md-10" style="width:300px" >
					No. Nota : <div class="input-group"> <input type="text" name="Nota" class="form-control" value="<?php echo $nota; ?>" readonly="readonly">
					<span class="input-group-addon"><span class="glyphicon glyphicon-barcode"></span></span>
				</div>
				</div>
	
			</td>
			<td align="left">
				<div class="input-group col-md-10" style="width:300px">
					Tanggal Hutang :
					<div class="input-group">
						<input class="form-control" type="hidden" name="Tanggal_Hutang" value="<?php echo $datapenjualan['Tanggal_Penjualan'];?>" readonly="readonly">
						
						<input class="form-control" type="text" value="<?php echo date('d F Y',strtotime($datapenjualan['Tanggal_Penjualan']));?>" readonly="readonly">
						<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
					</div>
				</div>
	
			</td>
		</tr>
		<tr>
			<td align="left">
				Kasir :
				<div class="input-group col-md-8" style="width:300px">
					<input class="form-control" type="hidden" name="Kode_User" value="<?php echo $datapenjualan["Kode_User"];?>" readonly="readonly">
					<input type="text" class="form-control" value="<?php echo $datapenjualan['Nama']; ?>" readonly="readonly">
				</div>
			</td>
			
			<td align="right">
			
			</td>
			
			<td align="right">
				<p style="margin-top:30px;align:right;" ><b><h5>Total Pembelian : </h5></b></p> 
			</td>
			
			<td>
			<input type="text" id="total" class="form-control" style="margin-top:20px; width:300px; background-color:#FFFFAA;" value="<?php echo 'Rp. '.number_format($tot["Total"],0,",",".");?>" readonly="readonly"> 
			
			</td>			
		</tr>
		<tr>
			<td>
		
			</td>
		</tr>
	</table>
	
	<div class="col-xs-6">
		<div class="Compose-Message">               
			<div class="panel panel-default" style="margin-bottom:0px;" >
				<div class="panel-heading" style="border:1px solid #DDDDDD;margin-bottom:-4px;background:#DDDDDD;">
                       
				<b>Input Data Customer</b>
					
				</div>
		<div class="panel-body" style="border:1px solid #DDDDDD">
                        
		<table class="table" style="margin-bottom:112px;background-color:white;">
			<tr>
				<td style="border-top:1px solid white;">Nama Customer</td>
				<td style="border-top:1px solid white;">
				<input name="Id_Hutang" type="hidden" value="<?php echo $customer["Id_Hutang"]; ?>" required class="form form-control">
					
					<input name="Id_Customer" type="hidden" value="<?php echo $customer["Id_Customer"]; ?>" required class="form form-control">
					<input type="text" readonly="readonly" value="<?php echo $customer["Nama_Customer"]; ?>" required class="form form-control">
				</td>
			</tr>
			
			<tr>
				<td style="border-top:1px solid white;">Tanggal Tempo</td>
				<td style="border-top:1px solid white;">
						<div class="input-group col-md-12">
							<input required class="form-control" value="<?php echo date("d F Y",strtotime($customer["Tanggal_Tempo_Hutang"])); ?>" type="text" name="Tanggal_Tempo_Hutang"  readonly="readonly">
							<span class="input-group-addon"><span class="glyphicon glyphicon-remove" ></span></span>
							<span class="input-group-addon"><span class="glyphicon glyphicon-calendar" ></span></span>
						
					</div>
				</td>
			</tr>
			<tr >
				<td style="border-top:1px solid white;">Alamat</td>
				<td style="border-top:1px solid white;">
					<textarea readonly="readonly" class="form form-control"><?php echo $customer["Alamat"]; ?></textarea>
				</td>
			</tr>
			<tr>
				<td style="border-top:1px solid white;">Telepon</td>
				<td style="border-top:1px solid white;">
					<input id="Telepon" readonly="readonly" value="<?php echo $customer["Telepon"]; ?>" type="text" required class="form form-control">
				</td>
			</tr>
			<tr>
				<td style="border-top:1px solid white;">Email</td>
				<td style="border-top:1px solid white;">
					<input id="Email" readonly="readonly" value="<?php echo $customer["Email"]; ?>" type="text" required class="form form-control">
				</td>
			</tr>
			
		</table>

		</div>
		</div>
	</div>
	</div>
	
	<div class="col-xs-6">
		<div class="Compose-Message">               
			<div class="panel panel-default" style="margin-bottom:0px;" >
				<div class="panel-heading" style="border:1px solid #DDDDDD;margin-bottom:-4px;background:#DDDDDD;">
                       
				<b>Data Pembayaran</b>
				</div>
		<div class="panel-body" style="border:1px solid #DDDDDD">
                        
		<table class="table" style="margin-bottom:0px;background-color:white;">
			<tr>
				<td style="border-top:1px solid white;">Discount</td>
				<td style="border-top:1px solid white;">
					<input type="text" class="form-control" value="<?php echo $datapenjualan["Discount"]." %"; ?>" readonly="readonly">
				</td>
			</tr>
			<tr >
				<td style="border-top:1px solid white;">PPN</td>
				<td style="border-top:1px solid white;">
					<input type="text" class="form-control" value="<?php echo $datapenjualan["Ppn"]." %"; ?>" readonly="readonly">
				
				</td>
			</tr>
			<tr>
				<td style="border-top:1px solid white;">Total Amount</td>
				<td style="border-top:1px solid white;">
						<input type="text" class="form-control" value="<?php echo 'Rp. '.number_format($datapenjualan["Total_Pembelian"],0,",",".");?>" readonly="readonly">
				</td>
			</tr>
			<tr>
				<td style="border-top:1px solid white;">Tunai</td>
				<td style="border-top:1px solid white;">
					<input type="text" class="form-control" value="<?php echo 'Rp. '.number_format($datapenjualan["Bayar"],0,",",".");?>" readonly="readonly">
				</td>
			</tr>
			<tr>
				<td style="border-top:1px solid white;">Total Hutang</td>
				<td style="border-top:1px solid white;">
				
				<input type="hidden" name="Total_Hutang" class="form-control" value="<?php echo $customer["Hutang"];?>" readonly="readonly">
				<input type="text" class="form-control" value="<?php echo 'Rp. '.number_format(substr($customer["Hutang"],1),0,",",".");?>" readonly="readonly">
				</td>
			</tr>
			<tr>
				<td style="border-top:1px solid white;">Terbayar</td>
				<td style="border-top:1px solid white;">
				
				<input type="hidden" name="Total_Hutang" class="form-control" value="<?php echo $customer["Hutang"]-$customer["Total_Hutang"];?>" readonly="readonly">
				<input type="text" class="form-control" value="<?php echo 'Rp. '.number_format(substr($customer["Hutang"]-$customer["Total_Hutang"],1),0,",",".");?>" readonly="readonly">
				</td>
			</tr>
			<tr>
				<td style="border-top:1px solid white;">Sisa Hutang</td>
				<td style="border-top:1px solid white;">
				
				<input type="hidden" name="Total_Hutang" class="form-control" value="<?php echo $customer["Total_Hutang"];?>" readonly="readonly">
				<input type="text" class="form-control" value="<?php echo 'Rp. '.number_format(substr($customer["Total_Hutang"],1),0,",",".");?>" readonly="readonly">
				</td>
			</tr>
			<tr>
				<td style="border-top:1px solid white;">Status</td>
				<td style="border-top:1px solid white;">
					<input name="Status" type="text" readonly="readonly" value="<?php echo $customer["Status"]; ?>" required class="form form-control">
				</td>
			</tr>
		</table>

		</div>
		</div>
	</div>
	</div>
	<!-- bkkgibo -->
	<div class="col-xs-12" style="margin-top:20px;">
	<table id="table" class="table table-bordered table responsive">
		
		<tr>
			<th style="align:center;"><b>No.</b></th>
			<th align="center"><b>Kode Barang</b></th>
			<th align="center"><b>Nama Barang</b></th>
			<th align="center"><b>Qty</b></th>
			<th align="center"><b>Harga Jual</b></th>
			<th align="center"><b>Subtotal</b></th>
		</tr>
		
		<?php 
		$no = $this->uri->segment('3') + 1;
		foreach($baranghutang as $baris){
		?>
	<tr>
		<td align="center" ><?php echo $no; ?></td>
		<td align="center" ><?php echo $baris->Kode_Bahan_Baku; ?></td>
		<td align="center" ><?php echo $baris->Nama_Barang; ?></td>
		<td align="center" ><?php echo $baris->Qty.' '.$baris->Nama_Satuan; ?></td>
		<td align="left" ><?php echo 'Rp. '.number_format($baris->Harga_Jual,0,",","."); ?></td>
		<td align="left" ><?php $sub = $baris->Qty * $baris->Harga_Jual; 
								echo 'Rp. '.number_format($sub,0,",",".");?></td>
	</tr>
	<?php
		$no++;
		}
		?>
		<tr>
			<th colspan="5" align="center"><b >Total</b></th>
			<th colspan="2"><b class="pull-left">
			<?php echo 'Rp. '.number_format($tot["Total"],0,",",".");?></b>
			</th>
		</tr>
	</table>
<legend>
</legend>
		
</div>
</div>

 <!--Untuk Date Picker-->
<script type="text/javascript" src="<?php echo base_url()?>assets/bootstrap-3.3.7-dist-1/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
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
</html>

	