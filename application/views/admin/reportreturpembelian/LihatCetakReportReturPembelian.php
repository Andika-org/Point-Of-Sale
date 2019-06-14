
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

<div class="col-xs-12">
<div class="col-xs-11 pull-right" style="padding-left:120px;"> 
	<h2 style="color:brown" align="center"><b>Report Retur Barang</b></h2>
	<legend>
	</legend>
	<a class="btn btn-danger glyphicon glyphicon-chevron-left" href="<?php echo base_url().'ReportReturPembelian/index';?>"> Back</a>
	
	<a  class="pull-right" href="<?php //echo base_url().'index.php/DeliveryOrder/langsungcetak/';?>">
	<span onclick="printContent('print')" class="btn btn-primary glyphicon glyphicon-print" style="margin-left:-150px;">
			
	</span>
	</a>
	<a  class="pull-right" href="<?php echo base_url('ReportReturPembelian/cetaknotaexcel/'.$header['No_Retur']); ?>">
		
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
				<td style="padding-left:6px;" colspan="2"><b>REPORT RETUR BARANG</b></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2">No. Retur</td>
				<td style="padding-left:6px;">:</td>
				<td style="text-align:left;padding-left:6px;"><?php echo $header['No_Retur']; ?></td>
			</tr>
			<tr>
				<td style="padding-left:6px;"colspan="2"></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2">Tanggal Retur</td>
				<td style="padding-left:6px;">:</td>
				<td style="text-align:left;padding-left:6px;"><?php echo date('d/m/Y',strtotime($header['Tanggal_Retur'])); ?></td>
			</tr>
			<tr>
				<td style="padding-left:6px;" colspan="2"><b><?php echo strtoupper($toko['Nama_Toko']); ?></b></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2">Tanggal Selesai Retur</td>
				<td style="padding-left:6px;">:</td>
				<td style="text-align:left;padding-left:6px;"><?php echo date('d/m/Y',strtotime($header['Tanggal_SelesaiRetur'])); ?></td>
			</tr>	
			<tr>
				<td style="padding-left:6px;" colspan="2"><?php echo $toko['Alamat_Toko'].' Rt. '.$toko['Rt'].' Rw. '.$toko['Rw']; ?>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2">Pegawai</td>
				<td style="padding-left:6px;">:</td>
				<td style="text-align:left;padding-left:6px;"><?php echo $header['Nama']; ?></td>
			</tr>
			<tr>
				<td style="padding-left:6px;" colspan="2"><?php echo ' Des. '.$toko['Desa']; ?>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2">Kontak Person</td>
				<td style="padding-left:6px;">:</td>
				<td style="text-align:left;padding-left:6px;"><?php echo $header['Nama_Supplier']; ?></td>
			</tr>
			<tr>
				<td style="padding-left:6px;" colspan="2"><?php echo 'Kec. '.$toko['Kecamatan'].' Kab. '.$toko['Kabupaten'].' '.$toko['Kode_Pos'];?></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2">Telephone</td>
				<td style="padding-left:6px;">:</td>
				<td style="text-align:left;padding-left:6px;"><?php echo $header['Telepon']; ?></td>
			</tr>
			<tr>
				<td style="padding-left:6px;" colspan="2"><?php echo 'Telp : '.$toko['Telp'].' Fax : '.$toko['Fax']; ?></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2">Deskripsi</td>
				<td style="padding-left:6px;">:</td>
				<td style="text-align:left;padding-left:6px;"><?php echo $header['Deskripsi']; ?></td>
			</tr>
			<tr>
				<td style="padding-left:6px;" colspan="2"><?php echo $toko['Email_Toko']; ?></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2" style="vertical-align:top;">Alamat</td>
				<td style="vertical-align:top;padding-left:6px">:</td>
				<td style="text-align:left;padding-left:6px;"><?php echo $header['Alamat']; ?></td>
			</tr>
			<tr>
				<td style="padding-left:6px;" colspan="2"></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2" style="vertical-align:top;">Biaya retur</td>
				<td style="vertical-align:top;padding-left:6px">:</td>
				<td style="text-align:left;padding-left:6px;"><?php echo 'Rp. '.number_format($header['Biaya_Retur'],0,",",".");?></td>
			</tr>
			<tr>
				<td style="padding-left:6px;" colspan="5"><b>Keterangan :</b></td>
			</tr>
			<tr>
				<td colspan="5" style="vertical-align:top;padding-left:6px;"><?php echo $header['Keterangan']; ?></td>
		
			</tr>
		</table>
		
		<br>
		
		<table class="" style="margin-top:0px;">
	<tr style="border:1px solid #000;background-color:#DDDDDD;">
		<th style="border:1px solid #000;"><b>No</b></th>
		<th style="border:1px solid #000;"></b>Kode Barang</b></th>
		<th style="border:1px solid #000;"><b>Nama Barang</b></th>
		<th style="border:1px solid #000;"><b>Qty</b></th>
		<th style="border:1px solid #000;"><b>Status</b></th>
	</tr>
	<?php 
		$no = 1;
		foreach ($detail as $det){ ?>

	<tr style="border:1px solid #000;">
		<td align="center" style="border:1px solid #000;"><?php echo $no; ?></td>
		<td align="center" style="border:1px solid #000;"><?php echo $det->Kode_Bahan_Baku; ?></td>
		<td align="center" style="border:1px solid #000;"><?php echo $det->Nama_Barang; ?></td>
		<td align="center" style="border:1px solid #000;"><?php echo $det->Qty.' '.$det->Nama_Satuan; ?></td>
		<td align="center" style="border:1px solid #000;">Selesai</td>
	</tr>
	<?php
	$no++;
		}
		?>
	</table>
	
	</div>
</div>
</div>

</html>
