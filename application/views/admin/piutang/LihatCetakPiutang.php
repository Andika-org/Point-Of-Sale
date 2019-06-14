
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
	

 <script type="text/javascript">
		function printContent(el){
			var a = document.body.innerHTML;
			var b = document.getElementById(el).innerHTML;
			document.body.innerHTML = b;
			window.print();
			document.body.innerHTML = a;
		}
	</script>
	
</head>
<body>

<div class="col-xs-12" style="padding-top:15px;padding-bottom:15px;">
<div class="col-xs-11 pull-right" style="padding-left:120px;"> 
	<h2 style="color:brown" align="center"><b>Report Piutang</b></h2>
	<legend>
	</legend>
	<!-- <a class="btn btn-danger glyphicon glyphicon-chevron-left" href="<?php echo base_url().'Hutang/index';?>"> Back</a> -->
	
	<a  class="pull-right" href="<?php //echo base_url().'index.php/DeliveryOrder/langsungcetak/';?>">
	<span onclick="printContent('print')" class="btn btn-primary glyphicon glyphicon-print" style="margin-left:-150px;">
			
	</span>
	</a>
	<a  class="pull-right" href="<?php echo base_url('Hutang/reportpiutangexcel/'.$header['Id_Hutang']); ?>">
		
			<img width="30px" style="margin-left:-80px;margin-top:5px;" height="30px" src="<?php echo base_url('assets/icon/excel.png'); ?>">
	
	</a>
	<br>
	<br>
	<legend></legend>
	<div id="print" style="margin-top:20px;">
	<style>
 table{
	 border-collapse: collapse;
	 width: 100%;
	 margin: 0 auto;
 }
 table th{
	 border: 0px solid #000;
	 padding: 0px;
	 font-weight: bold;
	 text-align: center;
 }
 table td{
	 border: 0px solid #000;
	 padding: 0px;
	 vertical-align: top;
 }
 </style>
		<table class="">
			<tr>
				<td style="padding-left:6px;" colspan="2"><b>REPORT PIUTANG</b></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2"></td>
				<td style="padding-left:6px;"></td>
				<td style="text-align:left;padding-left:6px;"></td>
			</tr>
			<tr>
				<td style="padding-left:6px;"colspan="2"></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2">Nota</td>
				<td style="padding-left:6px;"><center>:</center></td>
				<td style="text-align:left;padding-left:6px;"><?php echo $header["Nota"]; ?></td>
			</tr>
			<tr>
				<td style="padding-left:6px;" colspan="2"><b><?php echo strtoupper($toko['Nama_Toko']); ?></b></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2">Tanggal Hutang</td>
				<td style="padding-left:6px;"><center>:</center></td>
				<td style="text-align:left;padding-left:6px;"><?php echo date('d/m/Y',strtotime($header["Tanggal_Hutang"])); ?></td>
			</tr>	
			<tr>
				<td style="padding-left:6px;" colspan="2"><?php echo $toko['Alamat_Toko'].' Rt. '.$toko['Rt'].' Rw. '.$toko['Rw']; ?>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2">Tanggal Tempo Hutang</td>
				<td style="padding-left:6px;"><center>:</center></td>
				<td style="text-align:left;padding-left:6px;"><?php echo date('d/m/Y',strtotime($header["Tanggal_Tempo_Hutang"])); ?></td>
			</tr>
			<tr>
				<td style="padding-left:6px;" colspan="2"><?php echo ' Des. '.$toko['Desa']; ?>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2">Tanggal Selesai Hutang</td>
				<td style="padding-left:6px;"><center>:</center></td>
				<td style="text-align:left;padding-left:6px;"><?php 
				if($header["Tanggal_Selesai_Hutang"] == NULL){
					echo " - ";
				}else{
				echo date('d/m/Y',strtotime($header["Tanggal_Selesai_Hutang"])); }?></td>
			</tr>
			<tr>
				<td style="padding-left:6px;" colspan="2"><?php echo 'Kec. '.$toko['Kecamatan'].' Kab. '.$toko['Kabupaten'].' '.$toko['Kode_Pos'];?>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2">Total Hutang</td>
				<td style="padding-left:6px;"><center>:</center></td>
				<td style="text-align:left;padding-left:6px;"><?php echo 'Rp. '.number_format(substr($header['Total_Hutang'],1),0,",","."); ?></td>
			</tr>
			<tr>
				<td style="padding-left:6px;" colspan="2"><?php echo 'Telp : '.$toko['Telp'].' Fax : '.$toko['Fax']; ?></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2">Bunga</td>
				<td style="padding-left:6px;"><center>:</center></td>
				<td style="text-align:left;padding-left:6px;"><?php  echo $header["Bunga"]." %"; ?></td>
			</tr>
			<tr>
				<td style="padding-left:6px;" colspan="2"><?php echo $toko['Email_Toko']; ?></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2">Nominal Bunga</td>
				<td style="padding-left:6px;"><center>:</center></td>
				<td style="text-align:left;padding-left:6px;"><?php echo 'Rp. '.number_format($header['Nominal_Bunga'],0,",",".");?></td>
			</tr>
			<tr>
				<td style="padding-left:6px;" colspan="2"></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2">Status Piutang</td>
				<td style="padding-left:6px;"><center>:</center></td>
				<td style="text-align:left;padding-left:6px;" colspan="3"><?php 
															date_default_timezone_set("Asia/Jakarta");
															$tglskrng = date("Y-m-d H:i:s");
															$tgltmp = date('Y-m-d H:i:s',strtotime($header['Tanggal_Tempo_Hutang']));
															
															
															
														
															if($tgltmp < $tglskrng){
																
															$tgltempo = date('d-m-Y',strtotime($header['Tanggal_Tempo_Hutang']));
															
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
				<td style="padding-left:6px;" colspan="5">&nbsp;</td>
			</tr>
			<tr>
				<td style="padding-left:6px;" colspan="2"><b>CUSTOMER <?php echo strtoUpper($header["Nama_Customer"]); ?></b></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2" style="vertical-align:top;"></td>
				<td style="padding-left:6px;"></td>
				<td style="text-align:left;padding-left:6px;"></td>
			</tr>
			<tr>
				<td style="padding-left:6px;text-align:left;vertical-align:top;" colspan="2"><?php echo $header["Alamat"]; ?></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;vertical-align:top;" colspan="2" style="vertical-align:top;"></td>
				<td style="padding-left:6px;vertical-align:top;"></td>
				<td style="text-align:left;padding-left:6px;vertical-align:top;"></td>
			</tr>
			<tr>
				<td style="padding-left:6px;" colspan="2">Telp. <?php echo $header["Telepon"]; ?></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2" style="vertical-align:top;"></td>
				<td style="padding-left:6px;"></td>
				<td style="text-align:left;padding-left:6px;"></td>
			</tr>
			<tr>
				<td style="padding-left:6px;" colspan="2">Email : <?php echo $header["Email"]; ?></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2" style="vertical-align:top;"></td>
				<td style="padding-left:6px;"></td>
				<td style="text-align:left;padding-left:6px;"></td>
			</tr>
		</table>
		
		<br>
		
		<table class="" style="margin-top:0px;">
	<tr style="border:1px solid #000;background-color:#DDDDDD;">
		<th style="border:1px solid #000;"><b>No</b></th>
		<th style="border:1px solid #000;"></b>Pegawai</b></th>
		<th style="border:1px solid #000;"><b>Total Piutang</b></th>
		<th style="border:1px solid #000;"><b>Bayar</b></th>
		<th style="border:1px solid #000;"><b>Sisa Piutang</b></th>
		<th style="border:1px solid #000;"><b>Kembali</b></th>
		<th style="border:1px solid #000;"><b>Jenis Bayar</b></th>
		<th style="border:1px solid #000;"><b>Keterangan</b></th>
		<th style="border:1px solid #000;"><b>Tanggal Bayar</b></th>
	</tr>
	<?php 
		$no = 1;
		foreach ($detail as $det){ ?>

	<tr style="border:1px solid #000;">
		<td align="center" style="border:1px solid #000;"><?php echo $no; ?></td>
		<td align="center" style="border:1px solid #000;"><?php echo $det->Nama; ?></td>
		<td align="" style="border:1px solid #000;padding-left:10px;"><?php echo 'Rp. '.number_format($det->Nominal_Piutang,0,",",".");?></td>
		<td align="" style="border:1px solid #000;padding-left:10px;"><?php echo 'Rp. '.number_format($det->Bayar_Piutang,0,",",".");?></td>
		<td align="" style="border:1px solid #000;padding-left:10px;"><?php echo 'Rp. '.number_format($det->Sisa_Piutang,0,",",".");?></td>
		<td align="" style="border:1px solid #000;padding-left:10px;"><?php echo 'Rp. '.number_format($det->Kembali,0,",",".");?></td>
		<td align="center" style="border:1px solid #000;"><?php echo $det->Jenis_Bayar; ?></td>
		<td align="center" style="border:1px solid #000;"><?php echo $det->Keterangan; ?></td>
		<td align="center" style="border:1px solid #000;"><?php echo date("d F Y",strtotime($det->Tanggal_Bayar_Piutang)); ?></td>
	</tr>
	<?php
	$no++;
		}
		?>
	
	<tr>
		<td>&nbsp;<!--<b>NO. PO</b>--></td>
		<td><!--: po--></td>
		<td></td>
		<td></td>
		<td></td>
		
	</tr>
	<tr>
		<td>&nbsp;<!--<b>NOTE</b>--></td>
		<td><!--: note--></td>
		<td></td>
		<td></td>
		<td></td>
		
	</tr>
	
	<tr>
		<td colspan="4"><center><b>PEGAWAI</b></center></td>
		<td colspan="4"><center><b>CUSTOMER<b></center></td>
		
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td colspan="4"><center><b>( <?php echo $this->session->userdata["Username"]; ?> )</b></center></td>
		<td colspan="4"><center><b>( <?php echo $header["Nama_Customer"]; ?> )</b></center></td>
	</tr>
	</table>
	
	</div>
</div>
</div>

</html>
