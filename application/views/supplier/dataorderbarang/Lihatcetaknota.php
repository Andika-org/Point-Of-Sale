
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
	<h2 style="color:brown" align="center"><b>Nota Order Pembelian Barang Supplier</b></h2>
	<legend>
	</legend>
	<a class="btn btn-danger glyphicon glyphicon-chevron-left" href="<?php echo base_url().'OrderSupplier/index';?>"> Back</a>
	
	<a  class="pull-right" href="<?php //echo base_url().'index.php/DeliveryOrder/langsungcetak/';?>">
	<span onclick="printContent('print')" class="btn btn-primary glyphicon glyphicon-print" style="margin-left:-150px;">
			
	</span>
	</a>
	<a  class="pull-right" href="<?php echo base_url('OrderSupplier/cetaknotaexcel/'.$faktur); ?>">
		
			<img width="30px" style="margin-left:-80px;margin-top:5px;" height="30px" src="<?php echo base_url('assets/icon/excel.png'); ?>">
	
	</a>
	
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
<style>
	@media print{
		input.noPrint{display:none}
	}
	@page{
		size:auto;
		margin:0mm;
	}
</style>
	<table class="" style="border:1px solid black;">
		<tr>
			<!--<td style="background-color:#DDDDDD;padding-left:6px;border-bottom:1px solid #000;border-top:1px solid #000;"><img width="50px" height="50px" src="<?php echo base_url("fotobahanbaku/100118061154.png")?>"></td>-->
			<td colspan="6" style="background-color:#DDDDDD;padding-left:6px;border-bottom:1px solid #000;border-top:1px solid #000;"><h2>Nota Order Pembelian Barang Supplier</h2></td>
		</tr>
		<tr>
			<td style="padding-left:6px;border-right:1px solid black;border-top:0px solid #000;"><b>Alamat :</b></td>
			<td style="padding-left:6px;border-top:0px solid #000;">No. Nota</td>
			<td style="padding-left:6px;border-top:0px solid #000;"><center>:</center></td>
			<td style="padding-left:6px;border-top:0px solid #000;"><b><?php echo $baris['No_Faktur']; ?></b></td>
			<td style="padding-left:6px;border-top:0px solid #000;"></td>
			<td style="padding-left:6px;border-top:0px solid #000;"></td>
		</tr>
		<tr>
			<td style="padding-left:6px;border-right:1px solid black;border-top:0px solid #000;"><?php echo $toko['Alamat_Toko'].' Rt. '.$toko['Rt'].' Rw. '.$toko['Rw']; ?></td>
			<td style="padding-left:6px;border-top:0px solid #000;">Tanggal Pembelian</td>
			<td style="padding-left:6px;border-top:0px solid #000;"><center>:</center></td>
			<td align="left" style="padding-left:6px;border-top:0px solid #000;"><?php echo date('d/m/Y', strtotime($baris['Tanggal_Pembelian']));?></td>
			<td style="padding-left:6px;border-top:0px solid #000;"></td>
			<td style="padding-left:6px;border-top:0px solid #000;"></td>
		</tr>
		<tr>
			<td style="padding-left:6px;border-right:1px solid black;border-top:0px solid #000;"><?php echo 'Des. '.$toko['Desa']; ?></td>
			<td style="padding-left:6px;border-top:0px solid #000;">Pegawai</td>
			<td style="padding-left:6px;border-top:0px solid #000;"><center>:</center></td>
			<td style="padding-left:6px;border-top:0px solid #000;"><?php echo $uss['Nama'];?></td>
			<td style="padding-left:6px;border-top:0px solid #000;"></td>
			<td style="padding-left:6px;border-top:0px solid #000;"></td>
		</tr>
		<tr>
			<td style="padding-left:6px;border-right:1px solid black;border-top:0px solid #000;"><?php echo 'Kec. '.$toko['Kecamatan'].' Kab. '.$toko['Kabupaten'].' '.$toko['Kode_Pos']; ?></td>
			<td style="padding-left:6px;border-top:0px solid #000;">Supplier</td>
			<td style="padding-left:6px;border-top:0px solid #000;"><center>:</center></td>
			<td style="padding-left:6px;border-top:0px solid #000;"><?php echo $ss['Nama_Supplier'];?></td>
			<td style="padding-left:6px;border-top:0px solid #000;"></td>
			<td style="padding-left:6px;border-top:0px solid #000;"></td>
		</tr>
		<tr>
			<td style="padding-left:6px;border-right:1px solid black;border-top:0px solid #000;"><?php echo 'Telp. '.$toko['Telp'].' Fax. '.$toko['Fax']; ?></td>
			<td style="padding-left:6px;border-top:0px solid #000;">Deskripsi</td>
			<td style="padding-left:6px;border-top:0px solid #000;"><center>:</center></td>
			<td style="padding-left:6px;border-top:0px solid #000;"><?php echo $ss['Deskripsi']; ?></td>
			<td style="padding-left:6px;border-top:0px solid #000;"></td>
			<td style="padding-left:6px;border-top:0px solid #000;"></td>
		</tr>
		<tr>
			<td style="padding-left:6px;border-right:1px solid black;border-top:0px solid #000;"><?php echo $toko['Email_Toko']; ?></td>
			<td style="padding-left:6px;background-color:#DDDDDD;border-top:1px solid #000;"><b>Total Pembelian</b></td>
			<td style="padding-left:6px;background-color:#DDDDDD;border-top:1px solid #000;"><b><center>:</center></b></td>
			<td style="padding-left:6px;background-color:#DDDDDD;border-top:1px solid #000;"><b> <?php echo 'Rp. '.number_format($baris['Total_Pembelian'],0,",",".");?></b></td>
			<td style="padding-left:6px;background-color:#DDDDDD;border-top:1px solid #000;"></td>
			<td style="padding-left:6px;background-color:#DDDDDD;border-top:1px solid #000;"></td>
		
		</tr>
		<tr>
			<td colspan="6" style="background-color:#DDDDDD;padding-left:6px;border-right:0px solid black;border-top:1px solid #000;"><b>Jumlah Terbilang : </b></td>

		</tr>
		<tr>
			<td colspan="6" style="background-color:#DDDDDD;padding-left:6px;border-right:0px solid black;border-top:0px solid #000;"><?php echo $terbilang.' rupiah'; ?></td>
		</tr>
	</table>
	
	<table class="" style="margin-top:0px;">
		
		<tr>
			<td style="width:200px;padding-left:6px;border-left:1px solid #000;border-bottom:1px solid #000;border-right:0px solid #000;">Discount</td>
			<td class="pullleft" style="padding-left:6px;border-bottom:1px solid #000;border-right:1px solid #000;"colspan="5">
			: <?php echo $baris['Discount'].' %';?>
			</td>
		</tr>
		
		<tr>
			<td style="padding-left:6px;border-left:1px solid #000;border-bottom:1px solid #000;border-right:0px solid #000;">Ppn</td>
			<td style="padding-left:6px;border-bottom:1px solid #000;">
			: <?php echo $baris['Ppn'].' %';?>
			</td>
			
			<td style="padding-left:6px;border-bottom:1px solid #000;">
			
			</td>
		
			<td style="padding-left:6px;border-bottom:1px solid #000;">
			
			</td>
		
		<td style="padding-left:6px;border-bottom:1px solid #000;">
		</td>
		
		<td style="padding-left:6px;border-bottom:1px solid #000;border-right:1px solid #000;">
		</td>
		
		</tr>
		
		<tr>
			<td style="padding-left:6px;border-left:1px solid #000;border-bottom:1px solid #000;border-right:0px solid #000;">Jenis Pembayaran</td>
			<td style="padding-left:6px;border-bottom:1px solid #000;">
			: <?php echo $baris['Jenis_Pembayaran']; ?>
			</td>
			
			<td style="padding-left:6px;border-bottom:1px solid #000;">
			
			</td>
		
			<td style="padding-left:6px;border-bottom:1px solid #000;">
			
			</td>
		
		<td style="padding-left:6px;border-bottom:1px solid #000;">
		</td>
		
		<td style="padding-left:6px;border-bottom:1px solid #000;border-right:1px solid #000;">
		</td>
		
		</tr>
		<tr>
			<td style="padding-left:6px;border-left:1px solid #000;border-bottom:1px solid #000;border-right:0px solid #000;">Nominal Bayar</td>
			<td style="padding-left:6px;border-bottom:1px solid #000;">
			: <?php echo 'Rp. '.number_format($baris['Nominal'],0,",",".");?>
			</td>
			<td style="padding-left:6px;border-bottom:1px solid #000;">
		</td>
		
		<td style="padding-left:6px;border-bottom:1px solid #000;">
		</td>
		
		<td style="padding-left:6px;border-bottom:1px solid #000;">
		</td>
		
		<td style="padding-left:6px;border-bottom:1px solid #000;border-right:1px solid #000;">
		</td>
		
		</tr>
		<tr>
			<td style="padding-left:6px;border-left:1px solid #000;border-bottom:1px solid #000;border-right:0px solid #000;">Kembali</td>
			<td style="padding-left:6px;border-bottom:1px solid #000;">
			: <?php echo 'Rp. '.number_format($baris['Kembali'],0,",",".");?>
			</td>
			<td style="padding-left:6px;border-bottom:1px solid #000;">
		</td>
		
		<td style="padding-left:6px;border-bottom:1px solid #000;">
		</td>
		
		<td style="padding-left:6px;border-bottom:1px solid #000;">
		</td>
		
		<td style="padding-left:6px;border-bottom:1px solid #000;border-right:1px solid #000;">
		</td>
		
		</tr>
		<?php
			if($baris['Jenis_Pembayaran'] == "Transfer"){
		?>
		<tr>
			<td style="padding-left:6px;border-left:1px solid #000;border-bottom:1px solid #000;border-right:0px solid #000;">Nama Bank</td>
			<td style="padding-left:6px;border-bottom:1px solid #000;">
			: <?php echo $baris['Nama_Bank'];?>
			</td>
			<td style="padding-left:6px;border-bottom:1px solid #000;">
		</td>
		
		<td style="padding-left:6px;border-bottom:1px solid #000;">
		</td>
		
		<td style="padding-left:6px;border-bottom:1px solid #000;">
		</td>
		
		<td style="padding-left:6px;border-bottom:1px solid #000;border-right:1px solid #000;">
		</td>
		
		</tr>
		<tr>
			<td style="padding-left:6px;border-left:1px solid #000;border-bottom:1px solid #000;border-right:0px solid #000;">Nomor Rekening</td>
			<td style="padding-left:6px;border-bottom:1px solid #000;">
			: <?php echo $baris['Nomor_Rekening'];?>
			</td>
			<td style="padding-left:6px;border-bottom:1px solid #000;">
		</td>
		
		<td style="padding-left:6px;border-bottom:1px solid #000;">
		</td>
		
		<td style="padding-left:6px;border-bottom:1px solid #000;">
		</td>
		
		<td style="padding-left:6px;border-bottom:1px solid #000;border-right:1px solid #000;">
		</td>
		
		</tr>
		<tr>
			<td style="padding-left:6px;border-left:1px solid #000;border-bottom:1px solid #000;border-right:0px solid #000;">Atas Nama</td>
			<td style="padding-left:6px;border-bottom:1px solid #000;">
			: <?php echo $baris['Atas_Nama'];?>
			</td>
			<td style="padding-left:6px;border-bottom:1px solid #000;">
		</td>
		
		<td style="padding-left:6px;border-bottom:1px solid #000;">
		</td>
		
		<td style="padding-left:6px;border-bottom:1px solid #000;">
		</td>
		
		<td style="padding-left:6px;border-bottom:1px solid #000;border-right:1px solid #000;">
		</td>
		
		</tr>
			<?php }else{} ?>
		
		<tr>
			<td style="padding-left:6px;border-left:1px solid #000;border-bottom:1px solid #000;border-right:0px solid #000;">Tanggal Jatuh Tempo</td>
			<td style="padding-left:6px;border-bottom:1px solid #000;">
			: <?php $t = $baris['Tanggal_Jatuh_Tempo'];
					if($t=='0000-00-00'){
						echo '-';
					}else {
						echo date('d F Y',strtotime($baris['Tanggal_Jatuh_Tempo']));
					}
					?>
				</td>
			<td style="padding-left:6px;border-bottom:1px solid #000;">
		</td>
		
		<td style="padding-left:6px;border-bottom:1px solid #000;">
		</td>
		
		<td style="padding-left:6px;border-bottom:1px solid #000;">
		</td>
		
		<td style="padding-left:6px;border-bottom:1px solid #000;border-right:1px solid #000;">
		</td>
		
		</tr>
		<tr>
			<td style="padding-left:6px;border-left:1px solid #000;border-bottom:1px solid #000;border-right:0px solid #000;">Status Pembelian</td>
			<td style="padding-left:6px;border-bottom:1px solid #000;">
			: <?php echo $baris['Status_Pembelian'];?>
			</td>
			<td style="padding-left:6px;border-bottom:1px solid #000;">
		</td>
		
		<td style="padding-left:6px;border-bottom:1px solid #000;">
		</td>
		
		<td style="padding-left:6px;border-bottom:1px solid #000;">
		</td>
		
		<td style="padding-left:6px;border-bottom:1px solid #000;border-right:1px solid #000;">
		</td>
		
		</tr>
	</table>
	
	<table class="" style="margin-top:20px;">
	<tr style="border:1px solid #000;">
		<th style="border:1px solid #000;background-color:#DDDDDD;align:center;"><b>No.</b></th>
		<th style="border:1px solid #000;background-color:#DDDDDD;align:center;"></b>Kode Barang</b></th>
		<th style="border:1px solid #000;background-color:#DDDDDD;align:center;"><b>Nama Barang</b></th>
		<th style="border:1px solid #000;background-color:#DDDDDD;align:center;"><b>Qty</b></th>
		<th style="border:1px solid #000;background-color:#DDDDDD;"><b>Harga Beli</b></th>
		<th style="border:1px solid #000;background-color:#DDDDDD;align:center;"><b>Subtotal</b></th>
	</tr>
	<?php 
		$no = $this->uri->segment('3') + 1;
		foreach($fak as $a){
		?>
	<tr style="border:1px solid #000;">
		<td align="center" style="border:1px solid #000;"><?php echo $no; ?></td>
		<td align="center" style="border:1px solid #000;"><?php echo $a->Kode_Bahan_Baku; ?></td>
		<td align="center" style="border:1px solid #000;"><?php echo $a->Nama_Barang; ?></td>
		<td align="center" style="border:1px solid #000;"><?php echo $a->Qty.' '.$a->Nama_Satuan; ?></td>
		<td align="left" style="padding-left:5px;border:1px solid #000;"><?php echo 'Rp. '.number_format($a->Harga_Beli,0,",","."); ?></td>
		<td align="left" style="padding-left:5px;border:1px solid #000;"><?php $sub = $a->Qty * $a->Harga_Beli; 
								echo 'Rp. '.number_format($sub,0,",",".");?></td>

	</tr>
	<?php
	$no++;
		}
		?>
	<tr>
		<th colspan="5" style="border:1px solid #000;background-color:#DDDDDD;align:center;"><b><center>Total</center></b></th>
		<th style="border:1px solid #000;background-color:#DDDDDD;align:center;"><b><center><?php echo 'Rp. '.number_format($baris['Total_Pembelian_Sebelumnya'],0,",",".");?></b></center></th>
	</tr>
	</table>
	
	</div>
</div>
</div>
</div>

</html>
