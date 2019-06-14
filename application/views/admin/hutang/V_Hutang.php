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

$(document).on('click','.detailinfo',function(){
				$(this).parent().parent().next().find('.datadetailinfo').toggle();
				
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
	<h2 style="color:brown" align="center"><b>Data Hutang Pembelian Barang</b></h2>
	<legend>
	</legend>

<table>

<tr>
<td style="align:left;">
<div class="navbar-header input-group">
	<form action="<?php print site_url();?>/Hutang/index2" method=POST>
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
	<form action="<?php print site_url();?>/Hutang/caridatahutang" method=POST>
		<div class="input-group">
		<input required name="cari" style="margin:0px 0px 0px 0px; width:250px;" type="text" class='form-control' placeholder="Search Data...."/>
		<button class="btn btn-primary btn-bg glyphicon glyphicon-search" style="border-radius:0px 5px 5px 0px; margin-top:-1px; padding-top:6px;padding-left:8px;"></button>
		</div>
	</form>
	</td>
</tr>
</table>

		<table class="table">
			
		<tr bgcolor="#66CCFF">
			<th align="center"></th>
			<th align="center"><b>Customer</b></th>
			<th align="center"><b>Tanggal Hutang</b></th>
			<th align="center"><b>Tanggal Tempo</b></th>
			<th align="center"><b>Total Hutang</b></th>
			<th align="center"><b>Sisa Hutang</b></th>
			<!--<th align="center"><b>Status</b></th>-->
			<th align="center"><b>Payment</b></th>
			<th align="center"><b>Piutang</b></th>
			<!--<th align="center"></th>-->
			<th align="center"><b>Tools</b></th>
		</tr>
		
		<?php 
		$no = $this->uri->segment('3') + 1;
		foreach($datatable as $baris){
		?>
		
		<tr>
		<td align="center" style="padding-top:15px;"><span title='Detail Piutang' style='color:blue;cursor:pointer;' class='pull-right glyphicon glyphicon-triangle-bottom detailinfo'></span>
		</td>
		<td align="center" style="padding-top:14px;"><?php echo $baris->Nama_Customer; ?></td>
		<td align="center" style="padding-top:14px;"><?php echo date('Y-m-d',strtotime($baris->Tanggal_Hutang)); ?></td>
		<td align="center" style="padding-top:14px;"><?php 
		date_default_timezone_set("Asia/Jakarta");
		$tglskrng = date("Y-m-d H:i:s");
		$tgltmp = date('Y-m-d H:i:s',strtotime($baris->Tanggal_Tempo_Hutang));
		if($tgltmp < $tglskrng){
			echo "<p class='text-danger'>".date('Y-m-d',strtotime($tgltmp))."</p>";
		}else if($tgltmp > $tglskrng){
			echo "<p class=''>".date('Y-m-d',strtotime($tgltmp))."</p>";
		}
		 ?></td>
		<td align="center" style="padding-top:14px;"><?php $total = substr($baris->Hutang,1);
														echo 'Rp. '.number_format($total,0,",","."); ?></td>
		<td align="center" style="padding-top:14px;"><?php $total = substr($baris->Total_Hutang,1);
														echo 'Rp. '.number_format($total,0,",","."); ?></td>												
		<!--<td align="center" style="padding-top:14px;"><?php echo $baris->Status; ?></td>-->
		<td align="center">
		<!-- tes -->
		<?php
		date_default_timezone_set("Asia/Jakarta");
		$tglskrng = date("Y-m-d H:i:s");
		$tgltmp = date('Y-m-d H:i:s',strtotime($baris->Tanggal_Tempo_Hutang));
		$hasiltgltmp = date("m") - date('m',strtotime($baris->Tanggal_Tempo_Hutang));
		
		if($tgltmp < $tglskrng){
			if($baris->Tanggal_Update_Piutang == "0000-00-00 00:00:00"){
					if($baris->Total_Piutang == "0"){ ?>
						<a href="#" title="Selesaikan Proses Piutang Dahulu"><span style="color:green;" class="btn btn-default btn-sm glyphicon glyphicon-usd text-danger" align="right"> <span style="color:;" class="glyphicon glyphicon-exclamation-sign text-danger" align="right"></span></span></a>
				<?php }else if($baris->Total_Piutang < "0"){?>
						<a href="#" title="Selesaikan Proses Piutang Dahulu"><span style="color:green;" class="btn btn-default btn-sm glyphicon glyphicon-usd text-danger" align="right"> <span style="color:;" class="glyphicon glyphicon-exclamation-sign text-danger" align="right"></span></span></a>
				<?php }else if($baris->Total_Piutang > "0"){ ?>
						<a href="#" title="Selesaikan Proses Piutang Dahulu"><span style="color:green;" class="btn btn-default btn-sm glyphicon glyphicon-usd text-danger" align="right"> <span style="color:;" class="glyphicon glyphicon-exclamation-sign text-danger" align="right"></span></span></a>
				<?php }
			}else if($baris->Tanggal_Update_Piutang > "0000-00-00 00:00:00"){
					if($baris->Total_Piutang == "0"){ ?>
						<a href="<?php echo base_url('Hutang/inputpembayaranhutang/'.$baris->Id_Hutang); ?>" title="Input Bayar Hutang" ><span style="color:green;" class="btn btn-default btn-sm glyphicon glyphicon-usd" align="right"> <span style="color:green;" class="glyphicon glyphicon-ok-circle text-danger" align="right"></span></span></a>
				<?php }else if($baris->Total_Piutang < "0"){?>
						<a href="<?php echo base_url('Hutang/inputpembayaranhutang/'.$baris->Id_Hutang); ?>" title="Input Bayar Hutang" ><span style="color:green;" class="btn btn-default btn-sm glyphicon glyphicon-usd" align="right"> <span style="color:green;" class="glyphicon glyphicon-ok-circle text-danger" align="right"></span></span></a>
				<?php }else if($baris->Total_Piutang > "0"){ ?>
						<a href="#" title="Selesaikan Proses Piutang Dahulu"><span style="color:green;" class="btn btn-default btn-sm glyphicon glyphicon-usd text-danger" align="right"> <span style="color:;" class="glyphicon glyphicon-exclamation-sign text-danger" align="right"></span></span></a>
				<?php }
			}
				
		}else if($tgltmp > $tglskrng){ ?>
			<a href="<?php echo base_url('Hutang/inputpembayaranhutang/'.$baris->Id_Hutang); ?>" title="Input Bayar Hutang" ><span style="color:green;" class="btn btn-default btn-sm glyphicon glyphicon-usd" align="right"> <span style="color:green;" class="glyphicon glyphicon-ok-circle text-danger" align="right"></span></span></a>
		<?php	
		}
		?>
		
		
		
		</td>
		
		
		<td align="center" style="padding-top:8px;"><?php 
		date_default_timezone_set("Asia/Jakarta");
		$tglskrng = date("Y-m-d H:i:s");
		$tgltmp = date('Y-m-d H:i:s',strtotime($baris->Tanggal_Tempo_Hutang));
		$hasiltgltmp = date("m") - date('m',strtotime($baris->Tanggal_Tempo_Hutang));
		
		if($tgltmp < $tglskrng){
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			$tgltempo = date('d-m-Y',strtotime($baris->Tanggal_Tempo_Hutang));
			$tgl = explode("-",$tgltempo);
															$cek_jmlhr1 = cal_days_in_month(CAL_GREGORIAN,$tgl['1'],$tgl['2']);
															$cek_jmlhr2 = cal_days_in_month(CAL_GREGORIAN,date('m'),date('Y'));
															$sshari = $cek_jmlhr1 - $tgl['0'];
															$ssbln = 12 - $tgl['1']-1;
															$hari = 0;
															$bulan = 0;
															$tahun = 0;
															
															if($sshari + date('d') >= $cek_jmlhr2){
																$bulan = 1;
																$hari = $sshari + date('d') - $cek_jmlhr2;
															}else{
																$hari = $sshari + date('d');
															}
																
															if($ssbln + date('m') + $bulan >=12){
																$bulan = ($ssbln + date('m') + $bulan) - 12;
																$tahun = date('Y') - $tgl['2'];
															}else{
																$bulan = ($ssbln + date('m') + $bulan);
																$tahun = (date('Y') - $tgl['2'])-1;
															}
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			if($baris->Tanggal_Update_Piutang == "0000-00-00 00:00:00"){
				$total = $baris->Nominal_Bunga * $bulan;
				echo "<a href='".base_url()."/Hutang/updatenominalpiutang/".$baris->Id_Hutang."/".$total."' ><span title='Update Total Piutang' style='color:green;' class='btn btn-default btn-sm glyphicon glyphicon-credit-card'>  <span title='Update Total Piutang' style='color:;' class='glyphicon glyphicon-exclamation-sign text-danger'> </span></a>";
			}else{
				
				$jmlbulantunggakan = date("m") - date("m",strtotime($baris->Tanggal_Update_Piutang));
				$jmlh = $baris->Nominal_Bunga * $jmlbulantunggakan;
				if($jmlbulantunggakan > 0){
					echo "<a href='".base_url()."/Hutang/updatenominalpiutang/".$baris->Id_Hutang."/".$jmlh."' ><span title='Update Total Piutang' style='color:green;' class='btn btn-default btn-sm glyphicon glyphicon-credit-card'> <span title='Update Total Piutang' style='color:;' class='glyphicon glyphicon-exclamation-sign text-danger'> </span></a>";
				}else if($jmlbulantunggakan == 0){
					echo "<a href='#' ><span title='Update Nominal Piutang Berhasil' style='color:green;' class='btn btn-default btn-sm glyphicon glyphicon-credit-card'> <span title='Update Total Piutang' style='color:green;' class='glyphicon glyphicon-ok-circle'> </span></a>";
				}else if($jmlbulantunggakan < 0){
					echo "<a href='#' ><span title='Update Nominal Piutang Berhasil' style='color:green;' class='btn btn-default btn-sm glyphicon glyphicon-credit-card'> <span title='Update Total Piutang' style='color:green;' class='glyphicon glyphicon-ok-circle'> </span></a>";
				}
			}
															
															
		}else if($tgltmp > $tglskrng){
				echo "<a href='#' ><span title='Tidak Menunggak Hutang' style='color:green;' class='btn btn-default btn-sm glyphicon glyphicon-credit-card'> <span title='Tidak Menunggak Hutang' style='color:green;' class='glyphicon glyphicon-minus-sign'> </span></a>";
		}
		
		?></td>	
		<td align="center" >
		<a onclick="return confirm('Data Barang Hutang <?php echo $baris->Nama_Customer; ?>')"class="btn btn-sm btn-default" style="color:blue;" href="<?php echo base_url('Hutang/listbaranghutang/'.$baris->Nota."/".$baris->Id_Hutang); ?>"><i class="glyphicon glyphicon-shopping-cart"></i></a>
		<a onclick="return confirm('Edit Data Hutang <?php echo $baris->Nama_Customer; ?>')"class="btn btn-sm btn-success" href="<?php echo base_url('Hutang/edithutang/'.$baris->Nota."/".$baris->Id_Hutang); ?>"><i class="glyphicon glyphicon-edit"></i></a>
		<a href="<?php echo base_url('Hutang/datacetakhutang/'.$baris->Id_Hutang); ?>"><span class="btn btn-primary btn-sm glyphicon glyphicon-print" align="right"></span></a>
		
		
		
		</td>
		</tr>
		
		<tr>
			<td colspan="10" style="display:none;" class="datadetailinfo">
							<div class="col-xs-12">
								<div class="Compose-Message">               
									<div class="panel panel-default" style="margin-bottom:0px;" >
										<div class="panel-heading" style="border:1px solid #008080;margin-bottom:-4px;background:#008080;">
											   
										<b style="color:white;">Detail Information Hutang Piutang</b>
										</div>
											<div class="panel-body" style="border:1px solid #008080">
												<table>
													<tr>
														<td class="pull-left">Nota</td>
														<td>:</td>
														<td class="pull-left">
														<?php
														date_default_timezone_set("Asia/Jakarta");
													$tglskrng = date("Y-m-d H:i:s");
													$tgltmp = date('Y-m-d H:i:s',strtotime($baris->Tanggal_Tempo_Hutang));
													if($tgltmp < $tglskrng){
														echo "<a href='".base_url('Hutang/reportpiutang/'.$baris->Id_Hutang)."' title='Report Detail Piutang' style='margin-left:-10px;'> <span style='color:;' class='btn btn-link btn-sm glyphicon glyphicon-new-window'> ".$baris->Nota."</span></a>";
														}else if($tgltmp > $tglskrng){
														echo $baris->Nota;
													}
													?>
														
														</td>
													</tr>
													<tr>
														<td class="pull-left">Customer</td>
														<td>:</td>
														<td class="pull-left"><?php echo $baris->Nama_Customer; ?></td>
													</tr>
													<tr>
														<td class="pull-left">Tanggal Tempo</td>
														<td>:</td>
														<td class="pull-left"><?php date_default_timezone_set("Asia/Jakarta");
															$tglskrng = date("Y-m-d H:i:s");
															$tgltmp = date('Y-m-d H:i:s',strtotime($baris->Tanggal_Tempo_Hutang));
															if($tgltmp < $tglskrng){
																echo "<p class='text-danger'>".date('d F Y',strtotime($tgltmp))."</p>";
															}else if($tgltmp > $tglskrng){
																echo date('d F Y',strtotime($tgltmp));
															} ?></td>
													</tr>
													<tr>
														<td class="pull-left">Tanggal Update Piutang</td>
														<td>:</td>
														<td class="pull-left"><?php 
														if($baris->Tanggal_Update_Piutang == "0000-00-00 00:00:00"){
															echo " - ";
														}else{
															echo date('d F Y',strtotime($baris->Tanggal_Update_Piutang));
														}
														?></td>
													</tr>
													<tr>
														<td class="pull-left">Bunga</td>
														<td>:</td>
														<td class="pull-left"><?php echo $baris->Bunga." % Dari Total Hutang"; ?></td>
													</tr>
													<tr>
														<td class="pull-left">Nominal Bunga</td>
														<td>:</td>
														<td class="pull-left"><?php echo 'Rp. '.number_format($baris->Nominal_Bunga,0,",","."); ?></td>
													</tr>
													
													<tr>
														<td class="pull-left">Status Piutang</td>
														<td>:</td>
														<td class="pull-left"><?php 
															date_default_timezone_set("Asia/Jakarta");
															$tglskrng = date("Y-m-d H:i:s");
															$tgltmp = date('Y-m-d H:i:s',strtotime($baris->Tanggal_Tempo_Hutang));
															
															
															
														
															if($tgltmp < $tglskrng){
																
															$tgltempo = date('d-m-Y',strtotime($baris->Tanggal_Tempo_Hutang));
															
															$tgl = explode("-",$tgltempo);
															$cek_jmlhr1 = cal_days_in_month(CAL_GREGORIAN,$tgl['1'],$tgl['2']);
															$cek_jmlhr2 = cal_days_in_month(CAL_GREGORIAN,date('m'),date('Y'));
															$sshari = $cek_jmlhr1 - $tgl['0'];
															$ssbln = 12 - $tgl['1']-1;
															$hari = 0;
															$bulan = 0;
															$tahun = 0;
															
															if($sshari + date('d') >= $cek_jmlhr2){
																$bulan = 1;
																$hari = $sshari + date('d') - $cek_jmlhr2;
															}else{
																$hari = $sshari + date('d');
															}
																
															if($ssbln + date('m') + $bulan >=12){
																$bulan = ($ssbln + date('m') + $bulan) - 12;
																$tahun = date('Y') - $tgl['2'];
															}else{
																$bulan = ($ssbln + date('m') + $bulan);
																$tahun = (date('Y') - $tgl['2'])-1;
															}
															
															echo "Menunggak Hutang Selama ".$tahun." Tahun ".$bulan." Bulan ".$hari." Hari";
															
															}else if($tgltmp > $tglskrng){
																echo " - ";
															}
														?></td>
													</tr>
													
													<tr>
														<td class="pull-left">Total Tunggakan</td>
														<td>:</td>
														<td class="pull-left"><?php echo 'Rp. '.number_format($baris->Total_Piutang,0,",","."); ?></td>
													</tr>
												<?php if($baris->Total_Piutang > 0){?>
												<form class="form-signin" method="POST" action="<?php echo base_url();?>Hutang/bayarpiutang/<?php echo $baris->Id_Hutang; ?>" enctype="multipart/form-data">

													<tr>
														<td class="" style="background:#008080;color:white;"  colspan="3"><b>Input Piutang</b>
														<a href="<?php echo base_url("Hutang/reportpiutang/".$baris->Id_Hutang); ?>" class="pull-right"> <span style="color:white;" class="btn btn-link btn-sm glyphicon glyphicon-new-window"> Detail</span></a>
														<input readonly="readonly" type="hidden" name="Id_Hutang" class="form form-control" value="<?php echo $baris->Id_Hutang; ?>">
															
														</td>
														
													</tr>
													<tr>
														<td class="pull-left">Pegawai</td>
														<td>:</td>
														<td class="pull-left">
														<input readonly="readonly" type="hidden" class="form form-control" name="Kode_User" value="<?php echo $this->session->userdata["Kode_User"];?>">
														<input readonly="readonly" type="text" style="background:white;" class="form form-control" value="<?php echo $this->session->userdata["Username"];?>"> 
														</td>
													</tr>
													<tr>
														<td class="pull-left">Total Tunggakan</td>
														<td>:</td>
														<td class="pull-left">
															<input readonly="readonly" type="hidden" name="Nominal_Piutang" class="form form-control" value="<?php echo $baris->Total_Piutang; ?>">
															<input readonly="readonly" type="text" style="background:white;" class="form form-control" value="<?php echo 'Rp. '.number_format($baris->Total_Piutang,0,",","."); ?>">
														</td>
													</tr>
													<tr>
														<td class="pull-left">Bayar Tunggakan</td>
														<td>:</td>
														<td class="pull-left">
														<div class="input-group">
															<input type="text" readonly="readonly" required class="form form-control" style="border-right:none;width:50px;border-radius:5px 0px 0px 5px; padding-top:6px;padding-left:8px;" value="Rp. " required>
															<input type="text" name="Bayar_Piutang" required class="form form-control" style="margin-left:-10px;width:130px;border-left:none;" >
														</div>
														</td>
													</tr>
													<tr>
														<td class="pull-left">Jenis Bayar</td>
														<td>:</td>
														<td>
														<select class="form form-control" name="Jenis_Bayar">
															<option value="Tunai">Tunai</option>
															<option value="Transfer">Transfer</option>
															<option value="Via Transfer">Via Transfer</option>
															<option value="Cek">Cek</option>
															<option value="BRI">Debit BRI</option>
															<option value="BCA">Debit BCA</option>
															<option value="BTN">Debit BTN</option>
															<option value="MANDIRI">Debit MANDIRI</option>
															<option value="CIMB Niaga">Debit CIMB Niaga</option>
														</select>
														</td>
													</tr>
													<tr>
														<td class="pull-left">Keterangan</td>
														<td>:</td>
														<td>
															<input type="text" maxlength="100" class="form form-control" name="Keterangan">
														</td>
													</tr>
													<tr>
														<td></td>
														<td></td>
														<td>
															<button type="submit" class="btn btn-primary glyphicon glyphicon-floppy-disk form form-control" style="width:40%;"> Save</button>
															<button type="reset" class="btn btn-danger glyphicon glyphicon-remove form form-control" style="width:40%;"> Reset</button>
														</td>
													</tr>
													
													</form>
												<?php }else{}?>
												</table>												
											</div>
										</div>
									</div>
								</div>
			</td>
		</tr>
		<?php
		$no++;
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

	