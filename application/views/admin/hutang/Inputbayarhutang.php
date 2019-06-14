<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
 <link href="<?php echo base_url()?>assets/untukcssfoto/layout2.css" rel="stylesheet" type="text/css" media="all">   
<link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap-3.3.7-dist-1/bootstrap-3.3.7-dist/css/bootstrap.min.css">
     <link href="<?php echo base_url()?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
   
 </head>
<script type="text/javascript">			
		function hitungbayar(){
			
			var a = document.getElementById('totalhutang').value;
			var b = document.getElementById('tunai').value;
			var c = document.getElementById('sisa').value;
			
			var result = parseInt(a) + parseInt(b);
			
			if(!isNaN(result)){
			 document.getElementById('sisa').value = result;
				
			}else{
				document.getElementById('sisa').value = " ";
			}
			
			if(parseInt(c) > 0){
				document.getElementById('status').value = 'Lunas';
			}else{
				document.getElementById('status').value = 'Hutang';
			}
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
<a href="<?php echo base_url('Hutang/index');?>" class="btn btn-danger glyphicon glyphicon-chevron-left"> Back</a>
<br>
<br>
<legend>
</legend>

	<table id="table" style="border:none;">
		<tr>
			<td>
				<h3 style="width:300px">Pembayaran Hutang</h3>
			</td>
			<td  align="right" colspan="2">
	
				
	
			</td>
			<td align="left">
				<div class="input-group col-md-10" style="width:300px">
					
					
				</div>
	
			</td>
		</tr>
		<tr>
			<td align="left">
				Pegawai :
				<div class="input-group col-md-8" style="width:300px">
					<input type="text" class="form-control" value="<?php echo $this->session->userdata['Username']; ?>" readonly="readonly">
				</div>
			</td>
			
			<td align="right">
			
			</td>
			
			<td align="right">
				<p style="margin-top:30px;align:right;" ><b><h5>Tanggal Pembayaran : </h5></b></p> 
			</td>
			
			<td>
					<div class="input-group col-md-10" style="margin-top:20px;width:300px">
					<div class="input-group">
						
						<input class="form-control" type="text" value="<?php date_default_timezone_set("Asia/Jakarta");
						echo date("d F Y");?>" readonly="readonly">
						<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
					</div>
					</div>
			</td>			
		</tr>
		<tr>
			<td>
		
			</td>
		</tr>
	</table>
	
	<form class="form-signin" method="POST" action="<?php echo base_url();?>Hutang/inputpembayaranhutang/<?php echo $datasisahutang["Id_Hutang"]."/".$datasisahutang["Nota"]; ?>" enctype="multipart/form-data">

	<input class="form-control" type="hidden" name="Kode_User" value="<?php echo $this->session->userdata["Kode_User"];?>" readonly="readonly">
	<input type="hidden" name="Id_Hutang" value="<?php echo $datasisahutang["Id_Hutang"]; ?>">			
	
	<div class="col-xs-6">
		<div class="Compose-Message">               
			<div class="panel panel-default" style="margin-bottom:0px;" >
				<div class="panel-heading" style="border:1px solid #DDDDDD;margin-bottom:-4px;background:#DDDDDD;">
                       
				<b>Input Pembayaran</b>
					<button type="submit" title="Simpan Hutang" style="width:;" class="pull-right btn-link glyphicon glyphicon-floppy-disk"></button>
				</div>
		<div class="panel-body" style="border:1px solid #DDDDDD">
         <table class="table" style="margin-bottom:35px;background-color:white;">
			<tr>
				<td style="border-top:1px solid white;">Tunai</td>
				<td style="border-top:1px solid white;">
					<div class="input-group">
						<input type="text" readonly="readonly" required class="form form-control" style="border-right:none;width:50px;border-radius:5px 0px 0px 5px; padding-top:6px;padding-left:8px;" value="Rp. " required>
						<input type="text" onkeyup="hitungbayar();" id="tunai" name="Bayar_Total" required class="form form-control" style="margin-left:-10px;width:150px;border-left:none;" >
					</div>
				</td>
			</tr>
			<tr>
				<td style="border-top:1px solid white;">Total Hutang</td>
				<td style="border-top:1px solid white;">
				<div class="input-group">
					<input type="hidden" readonly="readonly" id="totalhutang" value="<?php echo $datasisahutang["Total_Hutang"]; ?>" name="Total_Hutang" required class="form form-control" style="margin-left:-10px;width:150px;border-left:none;background-color:white;" >
					<input type="text" readonly="readonly" required class="form form-control" style="border-right:none;width:50px;border-radius:5px 0px 0px 5px; padding-top:6px;padding-left:8px;" value="Rp. " required>
					<input type="text" readonly="readonly" value="<?php echo substr($datasisahutang["Total_Hutang"],1); ?>" required class="form form-control" style="margin-left:-10px;width:150px;border-left:none;background-color:white;" >
				
				</div>
				</td>
			</tr>
			<tr>
				<td style="border-top:1px solid white;">Sisa</td>
				<td style="border-top:1px solid white;">
				<div class="input-group">
					
					<input type="text" readonly="readonly" required class="form form-control" style="border-right:none;width:50px;border-radius:5px 0px 0px 5px; padding-top:6px;padding-left:8px;" value="Rp. " required>
					<input type="text" readonly="readonly" id="sisa" name="Sisa_Total" required class="form form-control" style="margin-left:-10px;width:150px;border-left:none;background-color:white;" >
				
				</div>
				</td>
			</tr>
			<tr>
				<td style="border-top:1px solid white;">Jenis Pembayaran</td>
				<td style="border-top:1px solid white;">
					<input required type="radio" name="Jenis_Bayar" value="Cek"><b>&nbsp Cek</b>
					<input required type="radio" name="Jenis_Bayar" value="Tunai"><b>&nbsp Tunai</b>
					<br>
					<input required type="radio" name="Jenis_Bayar" value="Transfer"><b>&nbsp Transfer</b>
					<input required type="radio" name="Jenis_Bayar" value="Via Transfer"><b>&nbsp Via Transfer</b>
				</td>
			</tr>
			<tr>
				<td style="border-top:1px solid white;">Status</td>
				<td style="border-top:1px solid white;">
					<input id="status" readonly="readonly" value="<?php echo $datasisahutang["Status"]; ?>" type="text" required class="form form-control">
				</td>
			</tr>
		</table>
		</div>
		</div>
	</div>
	</div>
	</form>
	
	<div class="col-xs-6">
		<div class="Compose-Message">               
			<div class="panel panel-default" style="margin-bottom:0px;" >
				<div class="panel-heading" style="border:1px solid #DDDDDD;margin-bottom:-4px;background:#DDDDDD;">
                       
				<b>Data Customer</b>
				</div>
		<div class="panel-body" style="border:1px solid #DDDDDD">
                        
		<table class="table" style="margin-bottom:8px;background-color:white;">
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
						<div class="input-group col-md-12" >
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
	<!-- bkkgibo -->
	<div class="col-xs-12" style="margin-top:20px;">
	<table id="table" class="table table-bordered table responsive">
		
		<tr>
			<th style="align:center;"><b>No.</b></th>
			<th align="center"><b>Pegawai</b></th>
			<th align="center"><b>Tanggal Bayar</b></th>
			<th align="center"><b>Bayar</b></th>
			<th align="center"><b>Sisa</b></th>
			<th align="center"><b>Jenis Pembayaran</b></th>
			<th align="center"><b>Status</b></th>
		</tr>
		
		<?php 
		$no = $this->uri->segment('3') + 1;
		foreach($databayar as $baris){
		?>
	<tr>
		<td align="center" ><?php echo $no; ?></td>
		<td align="center" ><?php echo $baris->Username; ?></td>
		<td align="center" ><?php echo date("d F Y",strtotime($baris->Tanggal_Bayar)); ?></td>
		<td align="" ><?php echo 'Rp. '.number_format($baris->Bayar_Total,0,",","."); ?></td>
		<td align="" ><?php $tot = substr($baris->Sisa_Total,1);
		echo 'Rp. '.number_format($tot,0,",","."); ?></td>
		<td align="center" ><?php echo $baris->Jenis_Bayar; ?></td>
		<td align="center" ><?php echo $baris->Status; ?></td>
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

	