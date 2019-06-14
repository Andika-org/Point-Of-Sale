
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
	

 <?php

$f = date("d/m/Y",strtotime($tglawal));
$g = date("d/m/Y",strtotime($tglakhir));

header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/x-msexcel");
header ("Content-Disposition: attachment; filename=REKAPPENJUALAN_$f-$g.xls");

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
		<table class="">
			<tr>
				<td style="padding-left:6px;" colspan="2"><b>REPORT PENJUALAN</b></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2"></td>
				<td style="padding-left:6px;"></td>
				<td style="text-align:left;padding-left:6px;"></td>
			</tr>
			<tr>
				<td style="padding-left:6px;"colspan="2">&nbsp;</td>
				<td style="padding-left:6px;">&nbsp;</td>
				<td style="padding-left:6px;" colspan="2">&nbsp;</td>
				<td style="padding-left:6px;">&nbsp;</td>
				<td style="text-align:left;padding-left:6px;">&nbsp;</td>
			</tr>
			<tr>
				<td style="padding-left:6px;" colspan="2"><b><?php echo strtoupper($toko['Nama_Toko']); ?></b></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2"><b>Periode</b></td>
				<td style="padding-left:6px;" colspan="2"><b>: <?php echo $tglawal." Sampai ".$tglakhir; ?></b></td>
			</tr>	
			<tr>
				<td style="padding-left:6px;" colspan="2"><?php echo $toko['Alamat_Toko'].' Rt. '.$toko['Rt'].' Rw. '.$toko['Rw']; ?>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2"><b>Grand Total</b></td>
				<td style="padding-left:6px;" colspan="2"><b>: <?php echo 'Rp. '.number_format($grandtotal['ttlbeli'],0,",","."); ?></b></td>
			</tr>
			<tr>
				<td style="padding-left:6px;" colspan="2"><?php echo ' Des. '.$toko['Desa']; ?>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2"></td>
				<td style="padding-left:6px;"></td>
				<td style="text-align:left;padding-left:6px;"></td>
			</tr>
			<tr>
				<td style="padding-left:6px;" colspan="2"><?php echo 'Kec. '.$toko['Kecamatan'].' Kab. '.$toko['Kabupaten'].' '.$toko['Kode_Pos'];?></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2"></td>
				<td style="padding-left:6px;"></td>
				<td style="text-align:left;padding-left:6px;"></td>
			</tr>
			<tr>
				<td style="padding-left:6px;" colspan="2"><?php echo 'Telp : '.$toko['Telp'].' Fax : '.$toko['Fax']; ?></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2" style="vertical-align:top;"></td>
				<td style="padding-left:6px;"></td>
				<td style="text-align:left;padding-left:6px;"></td>
			</tr>
			<tr>
				<td style="padding-left:6px;" colspan="2"><?php echo $toko['Email_Toko']; ?></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2" style="vertical-align:top;"></td>
				<td style="vertical-align:top;padding-left:6px"></td>
				<td style="text-align:left;padding-left:6px;"></td>
			</tr>
			
		</table>
		
		<br>
		
		<table class="" style="margin-top:0px;">
	<tr style="border:1px solid #000;background-color:#DDDDDD;">
		<th style="border:1px solid #000;"></b>No</b></th>
		<th style="border:1px solid #000;"></b>Nota</b></th>
		<th style="border:1px solid #000;"><b>Tanggal Penjualan</b></th>
		<th style="border:1px solid #000;"><b>Discount</b></th>
		<th style="border:1px solid #000;"><b>PPN</b></th>
		<th style="border:1px solid #000;"><b>Total Penjualan</b></th>
		<th style="border:1px solid #000;"><b>Total Item</b></th>
		<th style="border:1px solid #000;"><b>Kode Barang</b></th>
		<th style="border:1px solid #000;"><b>Nama Barang</b></th>
		<th style="border:1px solid #000;"><b>Qty</b></th>
		<th style="border:1px solid #000;"><b>Harga Jual</b></th>
	</tr>
	<?php 
		echo $detailpenjualan;
		?>
	</table>
	
	</div>
</div>
</div>

</html>
