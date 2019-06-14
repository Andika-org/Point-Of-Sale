<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
 <link href="<?php echo base_url()?>assets/untukcssfoto/layout2.css" rel="stylesheet" type="text/css" media="all">   
<link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap-3.3.7-dist-1/bootstrap-3.3.7-dist/css/bootstrap.min.css">
  	<script src="<?php echo base_url()?>assets/js/bootstrap-datetimepicker.js"></script> 
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
<a href="<?php echo base_url('Pembelian/index');?>" class="btn btn-danger glyphicon glyphicon-chevron-left"> Back</a>
<br>
<br>
<legend>
</legend>
	<form class="form-signin" method="POST" action="<?php echo base_url();?>Pembelian/konfirmasi/" enctype="multipart/form-data">
	<table id="table" style="border:none;">
		<tr>
	<td>
	<h3 style="width:300px">Hapus Order</h3>
	</td>
	<td  align="right">
	
	<div class="input-group col-md-10" style="width:300px" >
		No. Nota : <div class="input-group"> <input type="text" name="No_Faktur" class="form-control" value="<?php echo $header["No_Faktur"]; ?>" readonly="readonly">
		<span class="input-group-addon"><span class="glyphicon glyphicon-barcode"></span></span>
	</div>
	</div>
	</td>
	<td align="left">
	<div class="input-group col-md-10" style="width:300px">
            Tanggal Pembelian
			<div class="input-group">
                    <input class="form-control" type="text" name="Tanggal_Pembelian" value="<?php echo date("d F Y",strtotime($header["Tanggal_Pembelian"]));?>" readonly="readonly">
                   
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
	</div>
	
	</td>
	</tr>
	<tr>
		<td align="left">
		Kepala Gudang :
				<div class="input-group col-md-8" style="width:300px">
			<input type="text" class="form-control" value="<?php echo $header['Username']; ?>" readonly="readonly">
				</div>
		</td>
		
		<td align="right">
			<p style="margin-top:0px;align:right;" ><b><h5>Total Pembelian : </h5></b></p> 
		</td>
		<td>
			<input type="text" name="Total_Pembelian" class="form-control" style="margin-top:0px; width:300px; background-color:#FFFFAA;" value="<?php echo 'Rp. '.number_format($header["Total_Pembelian"],0,",",".");?>" readonly="readonly"> 
		</td>	
	</tr>
	<tr>
	<td>
	
	</td>
	</tr>
	</table>
		<!--
			<a href="<?php echo base_url('Pembelian/konfirmasipembelian')?>" style="padding-top:-40px;" class="btn btn-primary glyphicon glyphicon-list-alt pull-right"> <b>Konfirmasi Pembelian</b></a>
		-->

	</form>
		
<div id="all">
<!--
	<div class="col-xs-6">
		<div class="Compose-Message">               
			<div class="panel panel-default" style="margin-bottom:-10px;" >
	<div class="panel-heading" style="border:1px solid #DDDDDD;margin-bottom:-4px;background:#DDDDDD;">
		<b>Information Purchase</b>
				</div>
		
        <div class="panel-body" style="border:1px solid #DDDDDD;">                

		<?php $total = $sumtotal["Total"];
			if($total == ""){?>
			<center><a href="<?php echo base_url("Pembelian/hapusnota/".$header["No_Faktur"]);?>" class="btn btn-primary"><b>Clean Up</b></a><center>
			<?php }else{ ?>
			<center><a href="#" class="btn btn-primary"><b>Please Clean Your Purchase</b></a><center>
			<?php } ?>

		</div>
		</div>
	</div>
	</div>
	-->
	<!-- 
	<div class="col-xs-6">
		<div class="Compose-Message">               
			<div class="panel panel-default">
			
				<div class="panel-heading" style="border:1px solid #DDDDDD;margin-bottom:0px;background:#DDDDDD;">
                       
				<b>Konfirmasi Pembelian</b>
				
				</div>
		<div class="panel-body" style="padding-top:10px;border:1px solid #DDDDDD">
       
	<table class="">
		<tr>
			<td>Amount</td>
			<td>
			<input type="text" required id="total" name="Total_Pembelian"  class="form-control total" style="margin-top:0px; background-color:#FFFFAA;" value="<?php echo 'Rp. '.number_format($header["Total_Pembelian"],0,",",".");?>" readonly="readonly">
			</td>
		</tr>
		<tr>
			<td>Discount</td>
			<td>
				<div class="input-group">
					<input type="text" readonly="readonly" required id="disc" onkeyup="sumdisc();" name="Discount" class="form form-control" style="width:60px;border-right:none;" value="<?php echo $header["Discount"]; ?>" required>
					<input type="text" readonly="readonly" value="%" class="form form-control" style="border-left:none;width:40px;border-radius:0px 5px 5px 0px; margin-top:0px; padding-top:6px;padding-left:8px;">
				</div>
			</td>
		</tr>
		<tr>
			<td>PPN</td>
			<td>
				<div class="input-group">
					<input type="text" readonly="readonly" required name="Ppn" id="ppn" onkeyup="sumppn();" class="form form-control" style="width:60px;border-right:none;" value="<?php echo $header["Ppn"]; ?>" required>
					<input type="text" readonly="readonly" value="%" class="form form-control" style="border-left:none;width:40px;border-radius:0px 5px 5px 0px; margin-top:0px; padding-top:6px;padding-left:8px;">
				</div>
			</td>
		</tr>
		<tr>
			<td>Supplier</td>
			<td>
				<input type="text" readonly="readonly" name="Nomor_Rekening" value="<?php echo $header["Nama_Supplier"]; ?>" class="form form-control" placeholder="Nomor Rekening" required>
			</td>
		</tr>
		<tr>
			<td>Pembayaran</td>
			<td>
					<input type="text" readonly="readonly" name="Nomor_Rekening" value="<?php echo $header["Jenis_Pembayaran"]; ?>" class="form form-control" placeholder="Nomor Rekening" required>
			
				</td>
		</tr>
		
		<tr>
			<td>Rekening</td>
			<td>
			<input type="text" readonly="readonly" name="Nomor_Rekening" value="<?php echo $header["Nomor_Rekening"]; ?>" class="form form-control" placeholder="Nomor Rekening" required>
			
			</td>
		</tr>
		<tr>
			<td>Tanggal</td>
			<td>
				<div class="navbar-header" style="width:300px">
				<div class="input-group date col-md-12">
                    <input class="form-control" type="text" name="Tanggal_Jatuh_Tempo" value="<?php $tempo = $header["Tanggal_Jatuh_Tempo"];
					if($tempo == "0000-00-00"){
						echo "-";
					}else{
						echo $tempo;
					}?>" readonly="readonly">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
				
			</div>
		</tr>
	</table>
	
		</div>
		</div>
	</div>
	</div>
	-->
	</div>
		
		
	
	<table id="table" class="table table-bordered table responsive">
			
		<tr>
			<th style="align:center;"><b>No.</b></th>
			<th align="center"><b>Kode Barang</b></th>
			<th align="center"><b>Nama Barang</b></th>
			<th align="center"><b>Qty</b></th>
			<th align="center"><b>Harga Beli</b></th>
			<th align="center"><b>Subtotal</b></th>
			<th align="center"><b>Tools</b></th>
		</tr>
		<tr>
	
		<?php $total = $sumtotal["Total"];
			if($total == ""){?>
			<td align="center" colspan="7" style="background:white;">
			<a style="width:200px;" href="<?php echo base_url("Pembelian/hapusnota/".$header["No_Faktur"]);?>" class="btn btn-primary"><b>Clean Up</b></a><center>
			</td>
			<?php }else{ ?>
			
			<?php 
				$no = $this->uri->segment('3') + 1;
				foreach($datatable as $baris){
			?>
			<tr>
				<td align="center" ><?php echo $no; ?></td>
				<td align="center" ><?php echo $baris->Kode_Bahan_Baku; ?></td>
				<td align="center" ><?php echo $baris->Nama_Barang; ?></td>
				<td align="center" ><?php echo $baris->Qty.' '.$baris->Nama_Satuan; ?></td>
				<td align="left" ><?php echo 'Rp. '.number_format($baris->Harga_Beli,0,",","."); ?></td>
				<td align="left" ><?php $sub = $baris->Qty * $baris->Harga_Beli; 
										echo 'Rp. '.number_format($sub,0,",",".");?></td>
				<td align="center" >
				<a onclick="return confirm('Hapus Data Pada Rows Ini..?')" href="<?php echo base_url('Pembelian/hapuspembeliandetail/'.$baris->Id_Transaksi."/".$header["No_Faktur"]); ?>"><span class="btn btn-danger btn-sm glyphicon glyphicon-trash" align="right"> Delete</span></a>
				</td>
		
			<?php $no++;
		}
		} ?>

		</tr>
		
	<tr>
			<th align="center" colspan="5"><b>Total</b></th>
			<th align="center" colspan="2"><b><?php  echo 'Rp. '.number_format($sumtotal["Total"],0,",",".");  ?></b></th>
		</tr>
	</table>
<legend>
</legend>

</div>
</div>
<!--
<div class="container">

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
 
      <div class="modal-content">
	  
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Input Data Pembelian</h3>
        </div>
	<div class="modal-body">
        <form style="display:block;" id="test" class="form-signin" method="POST" action="<?php echo base_url();?>Pembelian/tambahpembelianbahanbaku/" enctype="multipart/form-data">
	
	<table class="table table-bordered table responsive">
	<input type="hidden" name="Id_Transaksi" value="<?php echo $tr; ?>" >
	<input type="hidden" name="No_Faktur" value="<?php echo $fak; ?>" >
	<input type="hidden" name="Kode_User" value="<?php echo $this->session->userdata['Kode_User']; ?>" >
		<tr>
			<td>Bahan Baku</td>
			<td>
			<input required type="hidden" name="Kode_Bahan_Baku" class='form-control' id="Kode_Bahan_Baku" placeholder="Bahan Baku" required>
			<input required type="text" name="Nama_Barang" class='autocompletebarang form-control Nama_Barang'  placeholder="Bahan Baku" required>
			</td>
		</tr>
		<tr>
			<td>Qty</td>
			<td>
			<div class="input-group">
		<input required name="Qty" style="border-right:none;margin:0px 0px 0px 0px; width:100px;" type="text" class='form-control' placeholder="Qty" id="Qty" onkeyup="sum();"/>
		<input type="text" readonly="readonly" name="Nama_Satuan" id="Nama_Satuan" class="form form-control" style="border-left:none;width:200px;border-radius:0px 5px 5px 0px; margin-top:0px; padding-top:6px;padding-left:8px;">
		</div>
		
			<input required type="text" name="Qty" class='form-control' placeholder="Qty" id="Qty" onkeyup="sum();" required>
		
			</td>
		</tr>
		<tr>
			<td>Satuan</td>
			<td>
			<input required type="text" class='form-control' id="Satuan" readonly="readonly" required>
			</td>
		</tr>
		
		<tr>
			<td>Harga Beli</td>
			<td>
			<input required type="text" name="Harga_Beli" style="background-color:#FFFFAA;" class='form-control' id="Harga_Beli" readonly="readonly" required>
			</td>
		</tr>
		<tr>
			<td>Total Harga</td>
			<td> 
			<input required type="text" style="background-color:#FFFFAA;" class='form-control' id="Total_Harga" readonly="readonly" required>
			</td>
		</tr>
	</table>
	<div class="modal-footer">
			<input type="submit" onclick="return confirm('Anda Yakin Ingin Menyimpan Data Ini..??')" class="btn btn-success" value="Save">
			<input type="reset" class="btn btn-warning" value="Clear">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
	</form>
        </div>
		
        </div>
		
	 </div>
	  </div>
 </div>
 -->
  <!-- Bootstrap modal -->
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
</html>

	