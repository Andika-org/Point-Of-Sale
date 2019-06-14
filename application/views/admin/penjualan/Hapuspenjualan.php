<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
 <link href="<?php echo base_url()?>assets/untukcssfoto/layout2.css" rel="stylesheet" type="text/css" media="all">   
<link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap-3.3.7-dist-1/bootstrap-3.3.7-dist/css/bootstrap.min.css">
  
 </head>

 <script type="text/javascript">
$(document).ready(function(){
$("#payment").click(function(){
		$("#pembayaran").toggle();
		$("#all").toggle();
    });
  })
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
<a href="<?php echo base_url('Penjualan/index');?>" class="btn btn-danger glyphicon glyphicon-chevron-left"> Back</a>
<br>
<br>
<legend>
</legend>
	
	<table id="table" style="border:none;">
		<tr>
			<td>
				<h3 style="width:300px">Delete Transaksi Pembelian</h3>
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
					Tanggal Pembelian
					<div class="input-group">
						<input class="form-control" type="text" value="<?php echo date('d F Y',strtotime($header['Tanggal_Penjualan']));?>" readonly="readonly">
						<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
					</div>
				</div>
	
			</td>
		</tr>
		<tr>
			<td align="left">
				Kasir :
				<div class="input-group col-md-8" style="width:300px">
					<input type="text" class="form-control" value="<?php echo $header['Username']; ?>" readonly="readonly">
				</div>
			</td>
			
			<td align="right">
			
			</td>
			
			<td align="right">
				<p style="margin-top:30px;align:right;" ><b><h5>Total Pembelian : </h5></b></p> 
			</td>
			
			<td>
				<input type="text" name="Total_Pembelian" id="total" class="form-control" style="margin-top:20px; width:300px; background-color:#FFFFAA;" value="<?php echo 'Rp. '.number_format($tot["Total"],0,",",".");?>" readonly="readonly"> 
			
			</td>			
		</tr>
		<tr>
			<td>
		
			</td>
		</tr>
	</table>
	
	<div id="pembayaran" class="col-xs-6">
		<div class="Compose-Message">               
			<div class="panel panel-default">
				<div class="panel-heading" style="border:1px solid #DDDDDD;background:#DDDDDD;">
                       
				<b>Pembayaran</b>
								
				</div>
		<div class="panel-body" style="padding-top:10px;border:1px solid #DDDDDD">
        
		<table class="table" style="margin-bottom:-10px;background-color:white;">
			<tr>
			<td style="border-top:1px solid white;">Discount</td>
			<td style="border-top:1px solid white;">
				<div class="input-group">
					<input type="text" readonly="readonly" required class="form form-control" style="width:60px;border-right:none;" value="<?php echo $header["Discount"]; ?>" required>
					<input type="text" readonly="readonly" value="%" class="form form-control" style="border-left:none;width:40px;border-radius:0px 5px 5px 0px; margin-top:0px; padding-top:6px;padding-left:8px;">
				</div>
			</td>
			
		</tr>
		<tr>
			<td style="border-top:1px solid white;">PPN</td>
			<td style="border-top:1px solid white;">
				<div class="input-group">
					<input type="text" readonly="readonly" required name="Ppn" id="ppn" onkeyup="sumppn();" class="form form-control" style="width:60px;border-right:none;" value="<?php echo $header["Ppn"]; ?>" required>
					<input type="text" readonly="readonly" value="%" class="form form-control" style="border-left:none;width:40px;border-radius:0px 5px 5px 0px; margin-top:0px; padding-top:6px;padding-left:8px;">
				</div>
			</td>
		</tr>
			<?php if($header["Status_Update"] == "Ya"){?>
			<tr >
				<td style="border-top:1px solid white;">Total Bayar</td>
				<td style="border-top:1px solid white;">
					<input type="text" readonly="readonly" value="Total Sudah Di Akumulasikan" required class="form form-control" >
				
				</td>
			</tr>
			<?php }else{}?>
			<tr >
				<td style="border-top:1px solid white;">Tunai</td>
				<td style="border-top:1px solid white;">
					<input type="text" readonly="readonly" value="<?php echo 'Rp. '.number_format($header["Bayar"],0,",",".");?>" required class="form form-control" >
				
				</td>
			</tr>
			<tr >
				<td style="border-top:1px solid white;">Sisa</td>
				<td style="border-top:1px solid white;">
				<input type="text" readonly="readonly" value="<?php echo 'Rp. '.number_format($header["Sisa"],0,",",".");?>" required class="form form-control" >
				
				</td>
			</tr>
			
		</table>
		
		</div>
		</div>
	</div>
	</div>
	<div class="col-xs-6">
	<div class="Compose-Message">               
			<div class="panel panel-default" style="margin-bottom:-10px;" >
	<div class="panel-heading" style="border:1px solid #DDDDDD;margin-bottom:-4px;background:#DDDDDD;">
		<b>Information Purchase</b>
				</div>
		<!--<div class="panel-body" style="border:1px solid #DDDDDD;height:468px;">-->
        <div class="panel-body" style="border:1px solid #DDDDDD;">                

		<?php if($tot["Total"]==0){?>
			<center><a href="<?php echo base_url("Penjualan/cleanuppenjualan/".$header["Nota"]);?>" class="btn btn-primary"><b>Clean Up</b></a><center>
			<?php }else{ ?>
			<center><a href="#" class="btn btn-primary"><b>Please Clean Your Purchase</b></a><center>
			<?php } ?>

		</div>
		</div>
	</div>
	</div>
	<!-- bkkgibo -->
	
	<table id="table" class="table table-bordered table responsive">
		
		<tr>
			<th style="align:center;"><b>No.</b></th>
			<th align="center"><b>Kode Barang</b></th>
			<th align="center"><b>Nama Barang</b></th>
			<th align="center"><b>Qty</b></th>
			<th align="center"><b>Harga Jual</b></th>
			<th align="center"><b>Subtotal</b></th>
			<th align="center"><b>Tools</b></th>
		</tr>
		
		<?php 
		$no = $this->uri->segment('3') + 1;
		foreach($datatable as $baris){
		?>
	<tr>
		<td align="center" ><?php echo $no; ?></td>
		<td align="center" ><?php echo $baris->Kode_Bahan_Baku; ?></td>
		<td align="center" ><?php echo $baris->Nama_Barang; ?></td>
		<td align="center" ><?php echo $baris->Qty.' '.$baris->Nama_Satuan; ?></td>
		<td align="left" ><?php echo 'Rp. '.number_format($baris->Harga_Jual,0,",","."); ?></td>
		<td align="left" ><?php $sub = $baris->Qty * $baris->Harga_Jual; 
								echo 'Rp. '.number_format($sub,0,",",".");?></td>
		<td align="center" >
		<a href="<?php echo base_url('Penjualan/hapuspenjualan/'.$baris->Id_Nota."/".$header["Nota"]); ?>"><span class="btn btn-danger btn-sm glyphicon glyphicon-trash" align="right"> Delete</span></a>
		</td>
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
  
  </body>
</html>

	