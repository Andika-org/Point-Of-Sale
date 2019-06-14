<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
	<script src="<?php echo base_url()?>assets/js/bootstrap-datetimepicker.js"></script> 
	<link href="<?php echo base_url()?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<style>
 #table{
	font-family:sans-serif;
	color:#444;
	border-collapse:collapse;
	width:100%;
	border:1px solid #f2f5f7;
}
#table tr th{
	background:#35A9DB;
	color:#fff;
	font-weight:normal;
		text-align:center;
	
}
#table, th, td{
	padding:8px 20px;
	text-align:;
}
#table, tr, td{
	padding:8px 20px;
	text-align:;
}
#table tr:nth-child(even){
	background-color:#DDDDDD;
}
 </style>
  <!-- CSS -->
	 
 <link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap-3.3.7-dist-1/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/autocomplete2/css/chosen.css')?>"/>
    <style type="text/css">
        .chzn-container-single .chzn-search input{
            width: 100%;
        }
    </style>

    <!-- Fav icon -->
    

    <!-- JS -->
   <!-- <script type="text/javascript" src="<?php echo base_url('assets/autocomplete2/js/jquery.js')?>"></script>
    -->
	<script type="text/javascript" src="<?php echo base_url('assets/autocomplete2/js/chosen.jquery.js');?>"></script>
    <script type="text/javascript">
        $(function(){
            $('.chzn-select').chosen();
            $('.chzn-select-deselect').chosen({allow_single_deselect:true});
        });

    </script>
	<script type="text/javascript">			
		function sumdisc(){
			var a = document.getElementById('total').value;
			var b = document.getElementById('disc').value;
			var c = document.getElementById('total2').value;
			var d = document.getElementById('ppn').value;
			
			var result = parseInt(c) - (parseInt(c) * parseInt(b)/100);
			
			if(!isNaN(result)){
			 document.getElementById('total').value = result;
				
			}else{
				document.getElementById('total').value = c;
			}
		}
		
		function sumppn(){
			var a = document.getElementById('total').value;
			var b = document.getElementById('ppn').value;
			var c = document.getElementById('total2').value;
			var d = document.getElementById('disc').value;
			
			var result = parseInt(c) - (parseInt(c) * parseInt(d)/100) + (parseInt(a) * parseInt(b)/100);
			//var result = parseInt(a) + parseInt(b);
			//var resultback = parseInt(c) - parseInt(d);
			var resultback = parseInt(c) - (parseInt(c) * parseInt(d)/100)
			if(!isNaN(result)){
			 document.getElementById('total').value = result;
				
			}else{
				document.getElementById('total').value = resultback;
			}
		}
		
	</script>
</head>
<body>

<div class="col-xs-12">
<div class="col-xs-11 pull-right" style="padding-left:120px;"> 
<br>
	<br><br>
	<br>
	<form class="form-signin" method="POST" action="<?php echo base_url();?>Pembelian/konfirmasipembelian/" enctype="multipart/form-data">

	<table id="table" class="table">
		<tr>
			<td>
	<h3 style="width:300px">Konfirmasi Pembelian</h3>
	</td>
	<td  align="right">
	<div class="input-group col-md-10" style="width:300px">
		No. Nota : <div class="input-group"> <input type="text" name="No_Faktur" class="form-control" value="<?php echo $fak; ?>" readonly="readonly">
		<span class="input-group-addon"><span class="glyphicon glyphicon-barcode"></span></span>
	</div>
	</div>
	</td>
	<td align="left">
	<div class="input-group col-md-10" style="width:300px" >
            Tanggal Pembelian :
			<div class="input-group" >
                    <input class="form-control" type="text" name="Tanggal_Pembelian" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('d F Y');?>" readonly="readonly">
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
	</div>
	
	</td>
	</tr>
	<tr>
		<td align="left">
			User :
				<div class="input-group col-md-8" style="width:300px">
			<input type="hidden" name="Kode_User" class="form-control" value="<?php echo $this->session->userdata['Kode_User']; ?>">
			<input type="text" class="form-control" value="<?php echo $this->session->userdata['Username']; ?>" readonly="readonly">
				</div>
				
			Nama Supplier : 
				<div class="input-group col-md-8" style="width:300px">
			<select required class="form-control chzn-select" name="Kode_Supplier" required>
            			<option></option>
						<?php 
						foreach ($sp as $sup) {
						?>
            			<option value="<?php echo $sup->Kode_Supplier; ?>"><?php echo $sup->Nama_Supplier.' - '.$sup->Deskripsi; ?></option>
            			
						<?php
						}
						?>
      				</select>
			</div>
		</td>
		
		<td align="right">
		
		<p style="margin-top:80px;align:right;" ><b><h5>Total Pembelian : </h5></b></p> 
		</td>
		<td>
		
			<?php foreach ($tot as $tt){?>
			<input type="hidden" id="total2" name="Total_Pembelian_Sebelumnya" class="form-control" style="margin-top:70px; background-color:#FFFFAA;" value="<?php echo $tt->Total;?>" readonly="readonly">
			<input type="text" required id="total" name="Total_Pembelian"  class="form-control total" style="margin-top:70px; background-color:#FFFFAA;" value="<?php echo $tt->Total;?>" readonly="readonly">
			<?php } ?>
		</td>	
	</tr>
	<tr>
	<td>
	</td>
	<td>
	</td>
	<td>
	</td>
	</tr>
	</table>
	
<table class="table" style="margin-top:-20px;">
		
		<tr>
			<td>Discount</td>
			<td>
				<div class="input-group">
					<input type="text" required id="disc" onkeyup="sumdisc();" name="Discount" class="form form-control" style="width:60px;border-right:none;" value="0" required>
					<input type="text" readonly="readonly" value="%" class="form form-control" style="border-left:none;width:40px;border-radius:0px 5px 5px 0px; margin-top:0px; padding-top:6px;padding-left:8px;">
				</div>
			</td>
		</tr>
		<tr>
			<td>PPN</td>
			<td>
				<div class="input-group">
					<input type="text" required name="Ppn" id="ppn" onkeyup="sumppn();" class="form form-control" style="width:60px;border-right:none;" value="0" required>
					<input type="text" readonly="readonly" value="%" class="form form-control" style="border-left:none;width:40px;border-radius:0px 5px 5px 0px; margin-top:0px; padding-top:6px;padding-left:8px;">
				</div>
			</td>
		</tr>
		<tr>
			<td>Jenis Pembayaran</td>
			<td>
				<input required type="radio" name="Jenis_Pembayaran" value="Cek"><b>&nbsp Cek</b>
				<!--<input required type="radio" name="Jenis_Pembayaran" value="Kredit"><b>&nbsp Kredit</b>-->
				<input required type="radio" name="Jenis_Pembayaran" value="Tunai"><b>&nbsp Tunai</b>
				<br>
				<input required type="radio" name="Jenis_Pembayaran" value="Transfer"><b>&nbsp Transfer</b>
				<input required type="radio" name="Jenis_Pembayaran" value="Via Transfer"><b>&nbsp Via Transfer</b>
			</td>
		</tr>
		
		<tr>
			<td>Nomor Rekening</td>
			<td>
			<input type="text" name="Nomor_Rekening" value="-" class="form form-control" style="width:300px" placeholder="Nomor Rekening" required>
			
			</td>
		</tr>
		<tr>
			<td>Tanggal Jatuh Tempo</td>
			<td>
				<div class="navbar-header" style="width:300px">
				<div class="input-group date form_date col-md-12" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" type="text" name="Tanggal_Jatuh_Tempo" placeholder="Tanggal Jatuh Tempo" readonly="readonly">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
				
			</div>
		</tr>
		<tr>
			<td>Bukti Pembayaran</td>
			<td>
				<input type="file" style="width:300px" name="Bukti_Pembayaran" class="form-control" class="input-medium">
				<small style="color:green;">** Upload Bukti Pembayaran Bila Diperlukan, Jenis File Tidak Lebih Dari 2 Mb</small>
			</td>
		</tr>
		<!--<tr>
			<td>Status Pembelian</td>
			<td>
				<input type="radio" name="Status_Pembelian" value="Belum Selesai"><b>&nbsp Belum Selesai</b>
				<input type="radio" name="Status_Pembelian" value="Sedang Proses"><b>&nbsp Sedang Proses</b>
				<input type="radio" name="Status_Pembelian" value="Selesai"><b>&nbsp Selesai</b>
				<br>
				<small style="color:green;">** Pilih Status Pada Proses Pembelian</small>
			</td>
		</tr>
		-->
	</table>
	<legend>
	</legend>
	<center>
	  <input type="submit" onclick="return confirm('Anda Yakin Ingin Menyimpan Data Ini..??')" name="submit" value="Save" class="btn btn-success">
            <input type="reset" name="reset" value="Reset" class="btn btn-warning">
			<a href="<?php echo base_url('index.php/pembelian/tambahpembelianbahanbaku')?>" class='btn btn-danger btn-sm'>Back</a>
			
	</center>	
	</form>
	</div>
</div>
</div>
</div>
<!--Untuk Date Picker-->
<script type="text/javascript" src="bootstrap-3.3.7-dist-1/bootstrap-3.3.7-dist/jquery/jquery-1.8.2.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="bootstrap-3.3.7-dist-1/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
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
</body>
<?php
	if(validation_errors()){
	echo '<script>alert("Harap Melakukan Pembelian Barang Terlebih Dahulu..!!");</script>'; 
	}
?>
</html>