
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
	<h2 style="color:brown" align="center"><b>Report Lunas Hutang</b></h2>
	<legend>
	</legend>
	<a class="btn btn-danger glyphicon glyphicon-chevron-left" href="<?php echo base_url().'Hutang/listhutangreport';?>"> Back</a>
	
	<a  class="pull-right" href="<?php //echo base_url().'index.php/DeliveryOrder/langsungcetak/';?>">
	<span onclick="printContent('print')" class="btn btn-primary glyphicon glyphicon-print" style="margin-left:-150px;">
			
	</span>
	</a>
	<a  class="pull-right" href="<?php echo base_url('Hutang/datacetakhutangreportexcel/'.$customer['Id_Hutang']); ?>">
		
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
				<td style="padding-left:6px;" colspan="2"><b>REPORT LUNAS HUTANG</b></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2"></td>
				<td style="padding-left:6px;"></td>
				<td style="text-align:left;padding-left:6px;"></td>
			</tr>
			<tr>
				<td style="padding-left:6px;"colspan="2"></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2">Tanggal Hutang</td>
				<td style="padding-left:6px;">:</td>
				<td style="text-align:left;padding-left:6px;"><?php echo date('d/m/Y',strtotime($customer['Tanggal_Hutang'])); ?></td>
			</tr>
			<tr>
				<td style="padding-left:6px;" colspan="2"><b><?php echo strtoupper($toko['Nama_Toko']); ?></b></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2">Tanggal Jatuh Tempo</td>
				<td style="padding-left:6px;">:</td>
				<td style="text-align:left;padding-left:6px;"><?php echo date('d/m/Y',strtotime($customer['Tanggal_Tempo_Hutang'])); ?></td>
			</tr>	
			<tr>
				<td style="padding-left:6px;" colspan="2"><?php echo $toko['Alamat_Toko'].' Rt. '.$toko['Rt'].' Rw. '.$toko['Rw']; ?>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2">Tanggal Lunas</td>
				<td style="padding-left:6px;">:</td>
				<td style="text-align:left;padding-left:6px;"><?php echo date('d/m/Y',strtotime($customer['Tanggal_Selesai_Hutang'])); ?></td>
			</tr>
			<tr>
				<td style="padding-left:6px;" colspan="2"><?php echo ' Des. '.$toko['Desa']; ?>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2">Total Hutang</td>
				<td style="padding-left:6px;">:</td>
				<td style="text-align:left;padding-left:6px;"><?php $total = substr($customer['Total_Hutang'],1);
																	echo 'Rp. '.number_format($total,0,",",".");?></td>
			</tr>
			<tr>
				<td style="padding-left:6px;" colspan="2"><?php echo 'Kec. '.$toko['Kecamatan'].' Kab. '.$toko['Kabupaten'].' '.$toko['Kode_Pos'];?></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2">Terbayar</td>
				<td style="padding-left:6px;">:</td>
				<td style="text-align:left;padding-left:6px;"><?php echo 'Rp. '.number_format($terbayar['totalbayar'],0,",","."); ?></td>
			</tr>
			<tr>
				<td style="padding-left:6px;" colspan="2"><?php echo 'Telp : '.$toko['Telp'].' Fax : '.$toko['Fax']; ?></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2" style="vertical-align:top;">Kembali</td>
				<td style="padding-left:6px;">:</td>
				<td style="text-align:left;padding-left:6px;"><?php  echo 'Rp. '.number_format($customer['Total_Hutang']+$terbayar['totalbayar'],0,",","."); ?></td>
			</tr>
			<tr>
				<td style="padding-left:6px;" colspan="2"><?php echo $toko['Email_Toko']; ?></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2" style="vertical-align:top;">Status</td>
				<td style="vertical-align:top;padding-left:6px">:</td>
				<td style="text-align:left;padding-left:6px;"><?php echo $customer['Status'];?></td>
			</tr>
			<tr>
				<td style="padding-left:6px;" colspan="5">&nbsp;</td>
			</tr>
			<tr>
				<td style="padding-left:6px;" colspan="2"><b>CUSTOMER <?php echo strtoUpper($customer["Nama_Customer"]); ?></b></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2" style="vertical-align:top;"></td>
				<td style="padding-left:6px;"></td>
				<td style="text-align:left;padding-left:6px;"></td>
			</tr>
			<tr>
				<td style="padding-left:6px;text-align:left;vertical-align:top;" colspan="2"><?php echo $customer["Alamat"]; ?></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;vertical-align:top;" colspan="2" style="vertical-align:top;"></td>
				<td style="padding-left:6px;vertical-align:top;"></td>
				<td style="text-align:left;padding-left:6px;vertical-align:top;"></td>
			</tr>
			<tr>
				<td style="padding-left:6px;" colspan="2">Telp. <?php echo $customer["Telepon"]; ?></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2" style="vertical-align:top;"></td>
				<td style="padding-left:6px;"></td>
				<td style="text-align:left;padding-left:6px;"></td>
			</tr>
			<tr>
				<td style="padding-left:6px;" colspan="2">Email : <?php echo $customer["Email"]; ?></td>
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
		<th style="border:1px solid #000;"></b>Tanggal Pembayaran</b></th>
		<th style="border:1px solid #000;"><b>Tunai</b></th>
		<th style="border:1px solid #000;"><b>Sisa Hutang</b></th>
		<th style="border:1px solid #000;"><b>Jenis Pembayaran</b></th>
	</tr>
	<?php 
		$no = 1;
		foreach ($detailhutang as $det){ ?>

	<tr style="border:1px solid #000;">
		<td align="center" style="border:1px solid #000;"><?php echo $no; ?></td>
		<td align="center" style="border:1px solid #000;"><?php echo date("d F Y",strtotime($det->Tanggal_Bayar)); ?></td>
		<td align="" style="border:1px solid #000;padding-left:10px;"><?php echo 'Rp. '.number_format($det->Bayar_Total,0,",",".");?></td>
		<td align="" style="border:1px solid #000;padding-left:10px;"><?php $t = substr($det->Sisa_Total,1);
																	echo 'Rp. '.number_format($t,0,",",".");?></td>
		<td align="center" style="border:1px solid #000;"><?php echo $det->Jenis_Bayar; ?></td>
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
		<td colspan="2"><center><b>PEGAWAI</b></center></td>
		<td colspan="2"><center><b>CUSTOMER<b></center></td>
		
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
		<td colspan="2"><center><b>( <?php echo $this->session->userdata["Username"]; ?> )</b></center></td>
		<td colspan="2"><center><b>( <?php echo $customer["Nama_Customer"]; ?> )</b></center></td>
	</tr>
	</table>
	
	</div>
</div>
</div>

</html>
