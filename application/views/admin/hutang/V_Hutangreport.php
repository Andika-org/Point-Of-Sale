<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
 <link href="<?php echo base_url()?>assets/untukcssfoto/layout2.css" rel="stylesheet" type="text/css" media="all">   
<link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap-3.3.7-dist-1/bootstrap-3.3.7-dist/css/bootstrap.min.css">
  
 </head>

  <script src="<?php echo base_url('assestsdatatable/bootstrap/js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assestsdatatable/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assestsdatatable/datatables/js/dataTables.bootstrap.js')?>"></script>
  
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
	
}
#table, th, td{
	padding:8px 20px;
	text-align:center;
}
#table tr:nth-child(even){
	background-color:;
}
 </style>
<script>
$(document).ready(function(){

$(document).on('click','.statusretur',function(){
				$(this).parent().parent().next().next().find('.datapaymentstatus').css({"display":"none"});
				$(this).parent().parent().next().find('.datastatusretur').toggle();
			});

///////////////////////			
$(document).on('click','.statusselesai',function(){
				$(this).parent().parent().next().find('.datastatuspembelian').toggle();
				//$(this).parent().parent().next().find('.datadeliverystatus').css({"display":"none"});
				//$(this).parent().parent().next().next().find('.datapaymentstatus').toggle();
				
			});
///////////////////////
});

</script>
<style>
 .table{
	font-family:sans-serif;
	color:#444;
	border-collapse:collapse;
	width:100%;
	border:1px solid #f2f5f7;
}
.table tr th{
	background:#008080;
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
	background-color:;
}
 </style>
</head>
<body>

<div class="col-xs-12">
<div class="col-xs-11 pull-right" style="padding-left:120px;"> 
	<h2 style="color:brown" align="center"><b>Data Report Lunas Hutang Pembelian Barang</b></h2>
	<legend>
	</legend>

<table>

<tr>
<td style="align:left;">
<div class="navbar-header input-group">
	<form action="<?php print site_url();?>/Hutang/listhutangreport2" method=POST>
		<select name="batas" style="height:25px; margin:0px 0px 0px 0px" >
			<option value="200">Page</option>
			<option value="5">5</option>
			<option value="10">10</option>
			<option value="25">25</option>
			<option value="50">50</option>
			<option value="75">75</option>
			<option value="100">100</option>
			<option value="150">150</option>
			<option value="200">200</option>
			<option value="500">Max Page</option>
		</select>
		<input type="submit" class="btn btn-success btn-bg " value="OK">
	</form>

		</div>
</td>
	<td>
	<form action="<?php print site_url();?>/Hutang/caridatahutangreport" method=POST>
		<div class="input-group">
		<input required name="cari" style="margin:0px 0px 0px 0px; width:250px;" type="text" class='form-control' placeholder="Search Data...."/>
		<button class="btn btn-primary btn-bg glyphicon glyphicon-search" style="border-radius:0px 5px 5px 0px; margin-top:-1px; padding-top:6px;padding-left:8px;"></button>
		</div>
	</form>
	</td>
</tr>
</table>

		<table id="table" class="table">
			
		<tr bgcolor="#66CCFF">
			<th align="center"><b>No.</b></th>
			<th align="center"><b>Customer</b></th>
			<th align="center"><b>Tanggal Hutang</b></th>
			<th align="center"><b>Tanggal Tempo</b></th>
			<th align="center"><b>Tanggal Selesai</b></th>
			<th align="center"><b>Total Hutang</b></th>
			<th align="center"><b>Status</b></th>
			<th align="center"><b>Tools</b></th>
		</tr>
		
		<?php 
		$no = $this->uri->segment('3') + 1;
		foreach($datatable as $baris){
			$selesai = $baris->Tanggal_Selesai_Hutang;
			if($selesai == NULL){}else{
		?>
		
		<tr>
		<td align="center" style="padding-top:15px;"><?php echo $no; ?></td>
		
		<td align="center" style="padding-top:14px;"><?php echo $baris->Nama_Customer; ?></td>
		<td align="center" style="padding-top:14px;"><?php echo date('Y-m-d',strtotime($baris->Tanggal_Hutang)); ?></td>
		<td align="center" style="padding-top:14px;"><?php echo date('Y-m-d',strtotime($baris->Tanggal_Tempo_Hutang)); ?></td>
		<td align="center" style="padding-top:14px;"><?php 
		$tgltmpo = date('Y-m-d',strtotime($baris->Tanggal_Tempo_Hutang));
		$tgllunas = date('Y-m-d',strtotime($baris->Tanggal_Selesai_Hutang));
		if($tgllunas > $tgltmpo){
			echo "<p style='color:red;' class='pull-left'>".date('Y-m-d',strtotime($tgllunas))."</p> <a href='".base_url('Hutang/reportpiutang/'.$baris->Id_Hutang)."' title='Laporan Piutang' class='pull-right' style='margin-top:-7px;' ><span style='color:green;' class='btn btn-default btn-sm glyphicon glyphicon-credit-card'> <span title='' style='color:red;' class='glyphicon glyphicon-exclamation-sign'> </span></a></p>";
		}else{
			echo "<p class='pull-left'>".date('Y-m-d',strtotime($tgllunas))."</p> <a href='#' class='pull-right' style='margin-top:-7px;' title='Tidak Menunggak Hutang' ><span style='color:green;' class='btn btn-default btn-sm glyphicon glyphicon-credit-card'> <span title='' style='color:green;' class='glyphicon glyphicon-ok-circle'> </span></a>";
		}
		 ?></td>
		
		<td align="center" style="padding-top:14px;"><?php $tot = substr($baris->Total_Hutang,1);
														echo 'Rp. '.number_format($tot,0,",","."); ?></td>
		<td align="center" style="padding-top:14px;"><?php echo $baris->Status; ?></td>
		<td align="center" >
		<a onclick="return confirm('Data Barang <?php echo $baris->Nama_Customer; ?>')"class="btn btn-sm btn-default" style="color:blue;" href="<?php echo base_url('Hutang/listbaranglunashutang/'.$baris->Nota."/".$baris->Id_Hutang); ?>"><i class="glyphicon glyphicon-shopping-cart"></i></a>
		<a onclick="return confirm('Hapus Data <?php echo $baris->Nama_Customer; ?> ?')" href="<?php echo base_url('Hutang/hapusreporthutang/'.$baris->Id_Hutang); ?>"><span class="btn btn-danger btn-sm glyphicon glyphicon-trash" align="right"></span></a>
		<a href="<?php echo base_url('Hutang/datacetakhutangreport/'.$baris->Id_Hutang); ?>"><span class="btn btn-primary btn-sm glyphicon glyphicon-print" align="right"></span></a>
		
		
		
		</td>
		</tr>
		
		<?php
		$no++;
		}
		}
		?>
		
</table>
		
<table id="table" class="table">
	<tr>
		<th>
Copyright &copy 2018 | Page rendered in <strong>{elapsed_time}</strong> seconds
		</th>
	</tr>
</table>
<center>
<h5 class="pull-left">
	<?php foreach($ent as $t){
		
	$b = $this->uri->segment('3') + 1;
		
		if($t->entri==null){
			$tt='0';
		}
		else{
			$tt=$t->entri;
		}
		
			echo 'Showing '.$totbaris.' on data to '.$b.' of '.$tt.' entries'; 
		}?>
	</h5>
	<br>
<br>
<div class="pull-left">
<?php echo $this->pagination->create_links();?>
</div>
</center>
</div>
</div>
  </body>
</html>

	