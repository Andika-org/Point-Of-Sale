
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
	

 <?php

$f = $header['Nota'];

header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/x-msexcel");
header ("Content-Disposition: attachment; filename=$f.xls");

?>

		<table>
			<tr>
				<td colspan="3"><center><h4><?php  echo $toko["Nama_Toko"]; ?></h4><center></td>
			</tr>
			<tr>
				<td colspan="3">
				<center><small>
				<?php  echo $toko["Alamat_Toko"]; ?>
				</small></center>
				</td>
			</tr>
			<tr>
				<td colspan="3"><center><small><?php  echo $toko["Desa"].", ".$toko["Kecamatan"]." - ".$toko["Kabupaten"]; ?></small></center></td>
			</tr>
			<tr>
				<td colspan="3" style="border-top:1px dashed black"><center><small><?php echo $header["Nota"];?></small></center></td>
			</tr>
			<tr>
				<td colspan="3" style="border-bottom:1px dashed black;"><center><small><?php echo date("d-m-Y H:i:s",strtotime($header["Tanggal_Penjualan"]))." ".$header["Nama"];?></small></center></td>
			</tr>
			<?php foreach($detail as $baris){?>
			<tr>
				<td colspan="3">
				<small><?php echo $baris->Kode_Bahan_Baku." - ".$baris->Nama_Barang;?></small>
				</td>
			</tr>
			<tr style="solid black;">
				<td colspan="3">
				<small>&nbsp; &nbsp; <?php echo $baris->Qty." ".$baris->Nama_Satuan." x ".'Rp. '.number_format($baris->Harga_Jual,0,",",".")." = ".'Rp. '.number_format($baris->Qty*$baris->Harga_Jual,0,",",".");?>
				</small></td>
			</tr>
			<?php } ?>
			<tr>
				<td style="border-top:1px dashed black;width:30%;">
				<small>Discount</small>
				</td>
				<td style="border-top:1px dashed black"><small>:</small></td>
				<td style="border-top:1px dashed black;text-align:left;"><small><?php echo $header["Discount"]." %"; ?></small>
				</td>
			</tr>
			<tr>
				<td>
				<small>PPN</small>
				</td>
				<td><small>:</small></td>
				<td style="text-align:left;"><small><?php echo $header["Ppn"]." %"; ?></small>
				</td>
			</tr>
			<?php $statusupdate = $header["Status_Update"];
						if($statusupdate == "None"){?>
			<tr>
				<td>
				<small>Bayar</small>
				</td>
				<td><small>:</small></td>
				<td><small><?php echo 'Rp. '.number_format($header["Total_Pembelian"],0,",","."); ?></small>
				</td>
			</tr>
			<tr>
				<td>
				<small>Tunai</small>
				</td>
				<td><small>:</small></td>
				<td><small><?php echo 'Rp. '.number_format($header["Bayar"],0,",","."); ?></small>
				</td>
			</tr>
			<tr>
				 <?php $st = $header["Status"];
					if($st == "Hutang"){?>
						<td><small> Hutang</small></td>
						<td><small>:</small></td>
						<td><small><?php echo 'Rp. '.number_format($header["Total_Pembelian"]-$header["Bayar"],0,",","."); ?></small></td>
						
				<?php }else if($st == "Lunas"){ ?>
						<td><small> Hutang</small></td>
						<td><small>:</small></td>
						<td><small><?php echo 'Rp. '.number_format($header["Total_Pembelian"]-$header["Bayar"],0,",","."); ?></small></td>
				
				<?php }else if($st == "Bayar"){?>
						<td><small>Kembali</small></td>
						<td><small>:</small></td>
						 <td><small><?php echo 'Rp. '.number_format($header["Sisa"],0,",","."); ?>
						</small></td>
						
					<?php }?>
			</tr>
			
						<?php } else{ ?>
			
			<tr>
				<td>
				<small>Total Bayar</small>
				</td>
				<td><small>:</small></td>
				<td><small><?php echo 'Rp. '.number_format($header["Total_Pembelian"],0,",","."); ?></small>
				</td>
			</tr>
			<tr>
				<td>
				<small>Total Tunai</small>
				</td>
				<td><small>:</small></td>
				<td><small><?php echo 'Rp. '.number_format($header["Bayar"],0,",","."); ?></small>
				</td>
			</tr>
			<tr>
				 <?php $st = $header["Status"];
					if($st == "Hutang"){?>
						<td><small> Hutang</small></td>
						<td><small>:</small></td>
						<td><small><?php echo 'Rp. '.number_format($header["Total_Pembelian"]-$header["Bayar"],0,",","."); ?></small></td>
						
				<?php }else if($st == "Lunas"){ ?>
						<td><small> Hutang</small></td>
						<td><small>:</small></td>
						<td><small><?php echo 'Rp. '.number_format($header["Total_Pembelian"]-$header["Bayar"],0,",","."); ?></small></td>
				
				<?php }else if($st == "Bayar"){?>
						<td><small>Total Kembali</small></td>
						<td><small>:</small></td>
						 <td><small><?php echo 'Rp. '.number_format($header["Sisa"],0,",","."); ?>
						</small></td>
						
					<?php }?>
			</tr>
			
						<?php } ?>
						
			<tr>
				<td colspan="3" style="border-top:1px dashed black;">
				<small><?php echo $item["item"]." item"; ?></small>
				</td>
			</tr>
			<tr>
				<td colspan="3">
				<small><center>** TERIMAKASIH **
				<br>
				** BELANJA DEKAT DAN MURAH **
				</small></center>
				</td>
			</tr>
		</table>

</html>
