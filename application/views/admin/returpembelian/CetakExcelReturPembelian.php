
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
	

 <?php

$f = $header['No_Retur'];

header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/x-msexcel");
header ("Content-Disposition: attachment; filename=RETUR_$f.xls");


?>

	
	
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
		<table class="table table-hover">
			<tr>
				<td colspan="2"><b>RETUR BARANG</b></td>
				<td></td>
				<td colspan="2">No. Retur</td>
				<td>:</td>
				<td style="text-align:left;"><?php echo $header['No_Retur']; ?></td>
			</tr>
			<tr>
				<td colspan="2"></td>
				<td></td>
				<td colspan="2">Tanggal Retur</td>
				<td>:</td>
				<td style="text-align:left;"><?php echo date('d/m/Y',strtotime($header['Tanggal_Retur'])); ?></td>
			</tr>
			<tr>
				<td colspan="2"><b><?php echo strtoupper($toko['Nama_Toko']); ?></b></td>
				<td></td>
				<td colspan="2">Kepala Gudang</td>
				<td>:</td>
				<td style="text-align:left;"><?php echo $header['Nama']; ?></td>
			</tr>	
			<tr>
				<td colspan="2"><?php echo $toko['Alamat_Toko'].' Rt. '.$toko['Rt'].' Rw. '.$toko['Rw']; ?>
				<td></td>
				<td colspan="2">Kontak Person</td>
				<td>:</td>
				<td style="text-align:left;"><?php echo $header['Nama_Supplier']; ?></td>
			</tr>
			<tr>
				<td colspan="2"><?php echo ' Des. '.$toko['Desa']; ?>
				<td></td>
				<td colspan="2">Telephone</td>
				<td>:</td>
				<td style="text-align:left;"><?php echo $header['Telepon']; ?></td>
			</tr>
			<tr>
				<td colspan="2"><?php echo 'Kec. '.$toko['Kecamatan'].' Kab. '.$toko['Kabupaten'].' '.$toko['Kode_Pos'];?></td>
				<td></td>
				<td colspan="2">Deskripsi</td>
				<td>:</td>
				<td style="text-align:left;"><?php echo $header['Deskripsi']; ?></td>
			</tr>
			<tr>
				<td colspan="2"><?php echo 'Telp : '.$toko['Telp'].' Fax : '.$toko['Fax']; ?></td>
				<td></td>
				<td colspan="2" style="vertical-align:top;">Alamat</td>
				<td>:</td>
				<td style="text-align:left;"><?php echo $header['Alamat']; ?></td>
			</tr>
			<tr>
				<td colspan="2"><?php echo $toko['Email_Toko']; ?></td>
				<td></td>
				<td colspan="2" style="vertical-align:top;">Biaya retur</td>
				<td style="vertical-align:top;">:</td>
				<td style="text-align:left;"><?php echo 'Rp. '.number_format($header['Biaya_Retur'],0,",",".");?></td>
			</tr>
			<tr>
				<td colspan="5">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="5"><b>Keterangan :</b></td>
			</tr>
			<tr>
				<td colspan="5" style="vertical-align:top;"><?php echo $header['Keterangan']; ?></td>
			</tr>
		</table>
		
		<br>
		
		<table class="table table-bordered table responsive" style="margin-top:0px;">
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
		<td align="center" style="border:1px solid #000;">Retur</td>
	</tr>
	<?php
	$no++;
		}
		?>
	
	<tr>
		<td><!--<b>NO. PO</b>--></td>
		<td><!--: po--></td>
		<td></td>
		<td></td>
		<td></td>
		
	</tr>
	<tr>
		<td><!--<b>NOTE</b>--></td>
		<td><!--: note--></td>
		<td></td>
		<td></td>
		<td></td>
		
	</tr>
	
	<tr>
		<td colspan="2"><center><b>DIKIRIM OLEH</b></center></td>
		<td colspan="2"><center><b>DITERIMA OLEH</b></center></td>
		
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td colspan="2"><center><b>(..............................)</b></center></td>
		<td colspan="2"><center><b>(..............................)</b></center></td>
	</tr>
	</table>
	
	</div>
</div>
</div>

</html>
