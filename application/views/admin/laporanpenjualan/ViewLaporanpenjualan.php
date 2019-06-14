
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
 <link href="<?php echo base_url()?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<body>

<div class="col-xs-12">
<div class="col-xs-11 pull-right" style="padding-left:120px;"> 
	<h2 style="color:brown" align="center"><b>Laporan Penjualan</b></h2>
	<legend>
	</legend>
	
	
	<a href="#"  class="pull-right">
	<span onclick="printContent('print')" class="btn btn-primary glyphicon glyphicon-print" style="margin-left:-150px;">
			
	</span>
	</a>
	
	<a  class="pull-right" href="<?php echo base_url('LaporanPenjualan/cetakexcelreportpenjualan/'.date("Y-m-d",strtotime($tglawal))."/".date("Y-m-d",strtotime($tglakhir)))?>">
		
			<img width="30px" style="margin-left:-80px;margin-top:5px;" height="30px" src="<?php echo base_url('assets/icon/excel.png'); ?>">
	
	</a>

	
	<form action="<?php print site_url();?>/LaporanPenjualan/lihatreportpenjualan" method="POST">

		<div class="navbar-header col-md-4">
            <div class="input-group date form_date col-md-11" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd" >
                    <input required class="form-control" value="<?php 
					if($tglawal > 0){
						echo date("d F Y",strtotime($tglawal));
					}else { echo "";
						}?>" type="text" name="Tanggal_Awal" placeholder="Tanggal Awal" readonly="readonly" id="tgl1" onchange="ajaxname();">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove" ></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar" ></span></span>
            </div>
		</div>
		
		<div class="navbar-header">
		<b style="margin:0px 20px 0px 2px;">Sampai</b>
		</div>
		
		<div class="navbar-header col-md-4">
		<div class="input-group date form_date col-md-11" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input required class="form-control" type="text" value="<?php 
					if($tglakhir > 0){
						echo date("d F Y",strtotime($tglakhir));
					}else { echo "";
						}?>" name="Tanggal_Akhir" placeholder="Tanggal Akhir" readonly="readonly" id="tgl2" onchange="ajaxname2();">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
		</div>		
			<div class="navbar-header"  >
			&nbsp <input type="submit" style="margin:0px 0px 0px -8px; height:34px;" class="btn btn-info " value="Search">
			</div>
			
	</form>
	<br>
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
		<?php if($tglawal && $tglakhir > 0){?>
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
		<?php }else{}?>
	<?php 
		echo $detailpenjualan;
		?>
	</table>
	
	</div>
</div>
</div>

</html>
<!--Untuk Date Picker-->
<script type="text/javascript" src="<?php echo base_url()?>assets/bootstrap-3.3.7-dist-1/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
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