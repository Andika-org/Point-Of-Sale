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
 <script>
$(document).ready(function(){

    $("#ubahfile").click(function(){
        $("#file").slideDown();
        $("#tidakubah").prop('disabled', false);
        $("#ubahfile").prop('disabled', false);
        //$("#nama").prop('disabled', false);
        //$("#tambah").prop('disabled', false); //TO DISABLED 

    });
   $("#tidakubah").click(function(){
        $("#file").slideUp();
        $("#tidakubah").prop('disabled', false);
		$("#ubahfile").prop('disabled', false);
        //$("#nama").prop('disabled', true);

   });
   
    $("#bayar").click(function(){
        document.getElementById("bayar").value="";
        document.getElementById("kembali").value="";

   });
    
});
</script>
 <script>
var toggled = true;
function toggle(){
	if(!toggled){
		toggled = true;
		document.getElementById("test").style.display = "none";
		document.getElementById("test2").style.display = "none";
		//document.getElementById("test3").style.display = "none";
		return;
	}
	if(toggled){
		toggled = false;
		document.getElementById("test").style.display = "block";
		document.getElementById("test2").style.display = "block";
		
		//document.getElementById("test3").style.display = "block";
		return;
	}
}


</script>
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
    <!--<script type="text/javascript" src="<?php echo base_url('assets/autocomplete2/js/jquery.js')?>"></script>
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
			var a = document.getElementById('total1').value;
			var b = document.getElementById('total2').value;
			var c = document.getElementById('disc').value;
			var d = document.getElementById('ppn').value;
			
			var kembalimula = document.getElementById('kembaliawal').value;
			var bayar = document.getElementById('bayarsupplier').value;
			
			var result = parseInt(a) - (parseInt(a) * parseInt(c)/100);
			var hitungkembali = parseInt(bayar) - (parseInt(a) - (parseInt(a) * parseInt(c)/100));
			
			if(!isNaN(result)){
				document.getElementById('total2').value = result;
				document.getElementById('kembalisupplier').value = hitungkembali;
			}else{
				document.getElementById('total2').value = c;
				document.getElementById('kembalisupplier').value = kembalimula;
			}
		}
	
				
		function sumppn(){
			var a = document.getElementById('total1').value;
			var b = document.getElementById('total2').value;
			var c = document.getElementById('disc').value;
			var d = document.getElementById('ppn').value;
			
			var kembalimula = document.getElementById('kembaliawal').value;
			var bayar = document.getElementById('bayarsupplier').value;
			
			var result = parseInt(a) - (parseInt(a) * parseInt(c)/100) + (parseInt(b) * parseInt(d)/100);
			var hitungkembali = parseInt(bayar) - (parseInt(a) - (parseInt(a) * parseInt(c)/100) + (parseInt(b) * parseInt(d)/100));
			var resultback = parseInt(c) - parseInt(d);
			
			if(!isNaN(result)){
			 document.getElementById('total2').value = result;
			document.getElementById('kembalisupplier').value = hitungkembali;	
			}else{
				document.getElementById('total2').value = resultback;
				document.getElementById('kembalisupplier').value = kembalimula;
			}
		}
		function sumbayar(){
			var a = document.getElementById('total2').value;
			var b = document.getElementById('bayar').value;
			
			var result = parseInt(b) - parseInt(a);
			
			if(!isNaN(result)){
			 document.getElementById('kembali').value = result;
				
			}else{
				
				document.getElementById('kembali').value = "0";
			}
		}
	</script>
	<script type="text/javascript">

    function tomboltunai()
    {
     $('#namabank').slideUp();
	 $('#rekening').slideUp();
	 $('#atasnama').slideUp();
	 
	 document.getElementById('bayar').value = "";
	 document.getElementById('kembali').value = "";
	 document.getElementById('namabank').value = "";
	 document.getElementById('rekening').value = "";
	 document.getElementById('atasnama').value = "";
    }
	
	function tomboltransfer()
    {
     $('#namabank').slideDown();
	 $('#rekening').slideDown();
	 $('#atasnama').slideDown();
	 
	 document.getElementById('bayar').value = "";
	 document.getElementById('kembali').value = "";
    }
</script>
</head>
<body>
<div class="col-xs-12">
<div class="col-xs-11 pull-right" style="padding-left:120px;">
<br>
<a href="<?php echo base_url('OrderSupplier/index');?>" class="btn btn-danger glyphicon glyphicon-chevron-left"> Back</a>

<br>
<br>
<?php $hakakses = $this->session->userdata["Hak_Akses"];
	if($hakakses == "Supplier"){
?>
<!-- akses supplier -->
<form class="form-signin" method="POST" action="<?php echo base_url();?>OrderSupplier/editnota/" enctype="multipart/form-data">

	<table id="table" class="table" style="border:none;">
		<tr>
			<td>
	<h3>Update Konfirmasi Pembelian</h3>
	</td>
	<td  align="right">
	<div class="input-group col-md-10" style="width:300px">
		No. Nota : <div class="input-group"><input type="text" name="No_Faktur" class="form-control" value="<?php echo $baris['No_Faktur']; ?>" readonly="readonly">
	<span class="input-group-addon"><span class="glyphicon glyphicon-barcode"></span></span>
	</div>
	</div>
	</td>
	<td align="left">
	<div class="input-group col-md-10" style="width:300px">
            Tanggal Pembelian :
			<div class="input-group" >
                    <input class="form-control" type="hidden" name="Tanggal_Pembelian" value="<?php echo date('d F Y H:i:s',strtotime($baris['Tanggal_Pembelian']));?>">
                   <input class="form-control" type="text" placeholder="Tanggal Pembelian" value="<?php echo date('d F Y',strtotime($baris['Tanggal_Pembelian']));?>" readonly="readonly">
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
	</div>
	
	</td>
	</tr>
	<tr>
		<td align="left">
			Pegawai :
				<div class="input-group col-md-8" >
			<input type="hidden" name="Kode_User" class="form-control" value="<?php echo $baris['Kode_User']; ?>">
			<input type="text" class="form-control" value="<?php echo $uss['Nama']; ?>" readonly="readonly">
				</div>
				
			Nama Supplier : 
			<?php $haksuplier = $this->session->userdata["Hak_Akses"];
				if($haksuplier == "Supplier"){
			?>
			<div class="input-group col-md-8" style="width:300px;">
			<select class="form-control chzn-select" name="Kode_Supplier" required>
            			<option value="<?php echo $baris['Kode_Supplier'];?>"><?php echo $ss['Nama_Supplier'].' - '.$ss['Deskripsi'];?>
			</select>
			</div>
			
				<?php }else{?>
			<div class="input-group col-md-8" style="width:300px;">
			<select class="form-control chzn-select" name="Kode_Supplier" required>
            			<option value="<?php echo $baris['Kode_Supplier'];?>"><?php echo $ss['Nama_Supplier'].' - '.$ss['Deskripsi'];?>
						<?php 
						foreach ($sp as $sup) {
						?>
            			<option value="<?php echo $sup->Kode_Supplier; ?>"><?php echo $sup->Nama_Supplier .' - '. $sup->Deskripsi; ?></option>
            			
						<?php
						}
						?>
      				</select>
			</div>
				<?php } ?>
		</td>
		
		<td align="right">
		
		<p style="margin-top:80px;align:right; width:300px;" ><b><h5>Total Pembelian : </h5></b></p> 
		</td>
		<td>
		<input type="text" id="total2" Name="Total_Pembelian" class="form-control" style="margin-top:70px; background-color:#FFFFAA;" value="<?php echo $baris['Total_Pembelian'];?>" readonly="readonly"> 
		<!--<input type="text" class="form-control" style="margin-top:70px; background-color:#FFFFAA;" value="<?php echo 'Rp. '.number_format($baris['Total_Pembelian'],0,",",".");?>" readonly="readonly"> 
		-->
		</td>	
	</tr>

	</table>
		<div class="Compose-Message">               
			<div class="panel panel-default" style="margin-bottom:-10px;" >
	<div class="panel-heading" style="border:1px solid #DDDDDD;margin-bottom:-4px;background:#DDDDDD;">
		<b>Information</b>
		
		<button type="submit" title="Proses Update" class="glyphicon glyphicon-edit btn btn-link pull-right" style="margin-top:-10px;"> Update</button>
				</div>
		<!--<div class="panel-body" style="border:1px solid #DDDDDD;height:468px;">-->
        <div class="panel-body" style="border:1px solid #DDDDDD;">                

		<table class="table table-bordered table responsive" style="margin-top:0px;">
		<tr>
			<td>Total Sebelumnya</td>
			<td>
				<input type="text" id="total1" Name="Total_Pembelian_Sebelumnya" class="form-control" style="width:300px;background-color:#FFFFAA;" value="<?php echo $baris['Total_Pembelian_Sebelumnya'];?>" readonly="readonly"> 
			</td>
		</tr>
		<?php $hakakses = $this->session->userdata['Hak_Akses'];
				if($hakakses == 'Supplier'){
			?>
		<tr>
			<td>Discount</td>
			<td>
				<div class="input-group">
					<input type="text" required id="disc" onkeyup="sumdisc();" name="Discount" class="form form-control" style="width:60px;border-right:none;" value="<?php echo $baris['Discount'];?>" required>
					<input type="text" readonly="readonly" value="%" class="form form-control" style="border-left:none;width:40px;border-radius:0px 5px 5px 0px; margin-top:0px; padding-top:6px;padding-left:8px;">
				<b style="color:green;" >&nbsp; Set Discount</b>
				</div>
			</td>
		</tr>
		<tr>
			<td>PPN</td>
			<td>
				<div class="input-group">
					<input type="text" required name="Ppn" id="ppn" onkeyup="sumppn();" class="form form-control" style="width:60px;border-right:none;" value="<?php echo $baris['Ppn'];?>" required>
					<input type="text" readonly="readonly" value="%" class="form form-control" style="border-left:none;width:40px;border-radius:0px 5px 5px 0px; margin-top:0px; padding-top:6px;padding-left:8px;">
				<b style="color:green;" >&nbsp; Set PPN</b>
				</div>
			</td>
		</tr>
				<?php }else{}?>
		<tr>
			<td>Tanggal Jatuh Tempo</td>
			<td>
				<div class="navbar-header" style="width:300px">
				<div class="input-group col-md-12">
                    <input class="form-control" type="text" style="background:white;" name="Tanggal_Jatuh_Tempo" value="<?php $t = $baris['Tanggal_Jatuh_Tempo'];
					if($t=='0000-00-00'){
						echo '';
					}else {
						echo date('d F Y',strtotime($baris['Tanggal_Jatuh_Tempo']));
					}
					?>" readonly="readonly">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
			</div>
		</tr>
		<tr>
			<td>Pembayaran</td>
			<td>
				<input readonly="readonly" type="text" name="Jenis_Pembayaran" class="form form-control" style="background:white;width:195px;" value="<?php echo $baris["Jenis_Pembayaran"];?>">
			</td>
		</tr>
		<tr>
			<td>Nominal Bayar</td>
			<td>
				<div class="input-group">
					<input type="text" readonly="readonly" value="Rp. " class="form form-control" style="border-right:none;width:45px;border-radius:5px 0px 0px 5px; margin-top:0px; padding-top:6px;padding-left:8px;">
					<input type="text" readonly="readonly" id="bayarsupplier" value="<?php echo $baris["Nominal"]; ?>" name="Nominal" required class="form form-control" style="background:white;width:150px;border-left:none;" required>
				</div>
			</td>
		</tr>
		<tr>
			<td>Kembali</td>
			<td>
				<div class="input-group">
					<input type="hidden" id="kembaliawal" value="<?php echo $baris["Kembali"]; ?>" readonly="readonly" required class="form form-control" style="background:white;width:150px;border-left:none;background:white;" required>
				
					<input type="text" readonly="readonly" value="Rp. " class="form form-control" style="border-right:none;width:45px;border-radius:5px 0px 0px 5px; margin-top:0px; padding-top:6px;padding-left:8px;">
					<input type="text" id="kembalisupplier" value="<?php echo $baris["Kembali"]; ?>" name="Kembali" readonly="readonly" required class="form form-control" style="background:white;width:150px;border-left:none;background:white;" required>
				
				</div>
			</td>
		</tr>
		
		<?php if($baris["Jenis_Pembayaran"] == "Transfer"){ ?>
		<tr id="namabank" style="display:;">
			<td>Nama Bank</td>
			<td>
				<input type="text" readonly="readonly" style="background:white;width:195px;" name="Nama_Bank" value="<?php echo $baris["Nama_Bank"]; ?>" class="form form-control">
			</td>
		</tr>
		<tr id="rekening" style="display:;">
			<td>Rekening</td>
			<td>
			<input type="text" readonly="readonly" style="background:white;width:195px;" name="Nomor_Rekening" value="<?php echo $baris["Nomor_Rekening"]; ?>" class="form form-control" placeholder="Nomor Rekening">
			
			</td>
		</tr>
		<tr id="atasnama" style="display:;">
			<td>Atas Nama</td>
			<td>
			<input type="text" readonly="readonly" style="background:white;width:195px;" name="Atas_Nama" class="form form-control" value="<?php echo $baris["Atas_Nama"]; ?>">
			
			</td>
		</tr>
		<?php }else{}?>
		
		<tr>
			<td>Foto Bukti Pembayaran</td>
			<td>
				<img width="300" height="180" <?php echo img('fotobuktipembayaran/'.$baris['Bukti_Pembayaran']);?><br><br>
				<input type="hidden" name="Gambar_Lama" style="width:300px" value = "<?php echo $baris['Bukti_Pembayaran']; ?>" class="form-control" class="input-medium" placeholder="Tidak Ada File"  readonly="readonly">
			</td>
		</tr>
		
				
		
		<tr>
			<td>Status Pembelian</td>
			<td>
			<input required type="hidden" name="Ubah_Gambar" value="Tidak">
			
			<input required readonly="readonly" name="Status_Pembelian" type="text" style="width:300px" class="form-control" value="<?php echo $baris['Status_Pembelian'];?>">
			</td>
		</tr>
		
	</table>
		</div>
		</div>
	</div>
	</div>

	</form>
	
<!-- sampe sini -->
	<?php }else{?>
	
	<form class="form-signin" method="POST" action="<?php echo base_url();?>OrderSupplier/editnota/" enctype="multipart/form-data">

	<table id="table" class="table" style="border:none;">
		<tr>
			<td>
	<h3>Update Konfirmasi Pembelian</h3>
	</td>
	<td  align="right">
	<div class="input-group col-md-10" style="width:300px">
		No. Nota : <div class="input-group"><input type="text" name="No_Faktur" class="form-control" value="<?php echo $baris['No_Faktur']; ?>" readonly="readonly">
	<span class="input-group-addon"><span class="glyphicon glyphicon-barcode"></span></span>
	</div>
	</div>
	</td>
	<td align="left">
	<div class="input-group col-md-10" style="width:300px">
            Tanggal Pembelian :
			<div class="input-group" >
                    <input class="form-control" type="hidden" name="Tanggal_Pembelian" value="<?php echo date('d F Y H:i:s',strtotime($baris['Tanggal_Pembelian']));?>">
                   <input class="form-control" type="text" placeholder="Tanggal Pembelian" value="<?php echo date('d F Y',strtotime($baris['Tanggal_Pembelian']));?>" readonly="readonly">
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
	</div>
	
	</td>
	</tr>
	<tr>
		<td align="left">
			User :
				<div class="input-group col-md-8" >
			<input type="hidden" name="Kode_User" class="form-control" value="<?php echo $baris['Kode_User']; ?>">
			<input type="text" class="form-control" value="<?php echo $uss['Username']; ?>" readonly="readonly">
				</div>
				
			Nama Supplier : 
			<div class="input-group col-md-8" style="width:300px;">
			<select class="form-control chzn-select" name="Kode_Supplier" required>
            			<option value="<?php echo $baris['Kode_Supplier'];?>"><?php echo $ss['Nama_Supplier'].' - '.$ss['Deskripsi'];?>
						<?php 
						foreach ($sp as $sup) {
						?>
            			<option value="<?php echo $sup->Kode_Supplier; ?>"><?php echo $sup->Nama_Supplier .' - '. $sup->Deskripsi; ?></option>
            			
						<?php
						}
						?>
      				</select>
			</div>
			
		</td>
		
		<td align="right">
		
		<p style="margin-top:80px;align:right; width:300px;" ><b><h5>Total Pembelian : </h5></b></p> 
		</td>
		<td>
		<input type="text" id="total2" Name="Total_Pembelian" class="form-control" style="margin-top:70px; background-color:#FFFFAA;" value="<?php echo $baris['Total_Pembelian'];?>" readonly="readonly"> 
		<!--<input type="text" class="form-control" style="margin-top:70px; background-color:#FFFFAA;" value="<?php echo 'Rp. '.number_format($baris['Total_Pembelian'],0,",",".");?>" readonly="readonly"> 
		-->
		</td>	
	</tr>

	</table>
		<div class="Compose-Message">               
			<div class="panel panel-default" style="margin-bottom:-10px;" >
	<div class="panel-heading" style="border:1px solid #DDDDDD;margin-bottom:-4px;background:#DDDDDD;">
		<b>Information</b>
		
		<button type="submit" title="Proses Update" class="glyphicon glyphicon-edit btn btn-link pull-right" style="margin-top:-10px;"> Update</button>
				</div>
		<!--<div class="panel-body" style="border:1px solid #DDDDDD;height:468px;">-->
        <div class="panel-body" style="border:1px solid #DDDDDD;">                

		<table class="table table-bordered table responsive" style="margin-top:0px;">
		<tr>
			<td>Total Sebelumnya</td>
			<td>
				<input type="text" id="total1" Name="Total_Pembelian_Sebelumnya" class="form-control" style="width:300px;background-color:#FFFFAA;" value="<?php echo $baris['Total_Pembelian_Sebelumnya'];?>" readonly="readonly"> 
			</td>
		</tr>
		<?php $hakakses = $this->session->userdata['Hak_Akses'];
				if($hakakses == 'Supplier'){
			?>
		<tr>
			<td>Discount</td>
			<td>
				<div class="input-group">
					<input type="text" required id="disc" onkeyup="sumdisc();" name="Discount" class="form form-control" style="width:60px;border-right:none;" value="<?php echo $baris['Discount'];?>" required>
					<input type="text" readonly="readonly" value="%" class="form form-control" style="border-left:none;width:40px;border-radius:0px 5px 5px 0px; margin-top:0px; padding-top:6px;padding-left:8px;">
				</div>
			</td>
		</tr>
		<tr>
			<td>PPN</td>
			<td>
				<div class="input-group">
					<input type="text" required name="Ppn" id="ppn" onkeyup="sumppn();" class="form form-control" style="width:60px;border-right:none;" value="<?php echo $baris['Ppn'];?>" required>
					<input type="text" readonly="readonly" value="%" class="form form-control" style="border-left:none;width:40px;border-radius:0px 5px 5px 0px; margin-top:0px; padding-top:6px;padding-left:8px;">
				</div>
			</td>
		</tr>
				<?php }else{}?>
		<tr>
			<td>Tanggal Jatuh Tempo</td>
			<td>
				<div class="navbar-header" style="width:300px">
				<div class="input-group date form_date col-md-12" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" type="text" style="background:white;" name="Tanggal_Jatuh_Tempo" value="<?php $t = $baris['Tanggal_Jatuh_Tempo'];
					if($t=='0000-00-00'){
						echo '';
					}else {
						echo date('d F Y',strtotime($baris['Tanggal_Jatuh_Tempo']));
					}
					?>" readonly="readonly">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
			</div>
		</tr>
		<tr>
			<td>Pembayaran</td>
			<td>
				<input required type="radio" id="tunai" onclick="tomboltunai();" name="Jenis_Pembayaran" value="Tunai"><b>&nbsp Tunai</b>
				
				<input required type="radio" id="transfer" onclick="tomboltransfer();" name="Jenis_Pembayaran" value="Transfer"><b>&nbsp Transfer</b>
			</td>
		</tr>
		<tr>
			<td>Nominal Bayar</td>
			<td>
				<div class="input-group">
					<input type="text" readonly="readonly" value="Rp. " class="form form-control" style="border-right:none;width:45px;border-radius:5px 0px 0px 5px; margin-top:0px; padding-top:6px;padding-left:8px;">
					<input type="text" value="<?php echo $baris["Nominal"]; ?>" id="bayar" name="Nominal" onkeyup="sumbayar();" required class="form form-control" style="width:150px;border-left:none;" required>
				</div>
			</td>
		</tr>
		<tr>
			<td>Kembali</td>
			<td>
				<div class="input-group">
					<input type="text" readonly="readonly" value="Rp. " class="form form-control" style="border-right:none;width:45px;border-radius:5px 0px 0px 5px; margin-top:0px; padding-top:6px;padding-left:8px;">
					<input type="text" value="<?php echo $baris["Kembali"]; ?>" id="kembali" name="Kembali" value="0" readonly="readonly" required class="form form-control" style="width:150px;border-left:none;background:white;" required>
				</div>
			</td>
		</tr>
		
		<tr id="namabank" style="display:none;">
			<td>Nama Bank</td>
			<td>
				<select class="form-control" name="Nama_Bank">
					<option></option>
					<option value="BRI">BRI</option>
					<option value="BCA">BCA</option>
					<option value="BTN">BTN</option>
					<option value="MANDIRI">MANDIRI</option>
					<option value="CIMB Niaga">CIMB Niaga</option>
				</select>
			</td>
		</tr>
		<tr id="rekening" style="display:none;">
			<td>Rekening</td>
			<td>
			<input type="text" name="Nomor_Rekening" value="-" class="form form-control" placeholder="Nomor Rekening">
			
			</td>
		</tr>
		<tr id="atasnama" style="display:none;">
			<td>Atas Nama</td>
			<td>
			<input type="text" name="Atas_Nama" class="form form-control" placeholder="Atas Nama">
			
			</td>
		</tr>
		
		<tr>
			<td>Foto Bukti Pembayaran Sebelumnya</td>
			<td>
				<img width="300" height="180" <?php echo img('fotobuktipembayaran/'.$baris['Bukti_Pembayaran']);?><br><br>
				<input type="hidden" name="Gambar_Lama" style="width:300px" value = "<?php echo $baris['Bukti_Pembayaran']; ?>" class="form-control" class="input-medium" placeholder="Tidak Ada File"  readonly="readonly">
			</td>
		</tr>
		<tr>
			<td>Bukti Pembayaran</td>
			<td>
				<input required type="radio" id="ubahfile" name="Ubah_Gambar" value="Edit"><b>&nbsp Edit File</b>
				<input required type="radio" id="tidakubah" name="Ubah_Gambar" value="Tidak"><b>&nbsp No Edit File</b>
				<br>
				<div id="file" style="display:none;">
				<input type="file" style="width:300px" name="Bukti_Pembayaran" class="form-control" class="input-medium">
				<small style="color:green;">** Jenis File Tidak Lebih Dari 2 Mb</small>
				</div>
			</td>
		</tr>
		<tr>
			<td>Status Pembelian</td>
			<td>
			<input required readonly="readonly" name="Status_Pembelian" type="text" style="width:300px" class="form-control" value="<?php echo $baris['Status_Pembelian'];?>">
			</td>
		</tr>
		
	</table>
		</div>
		</div>
	</div>
	</div>

	</form>
	<?php } ?>
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
	echo '<script>alert("Harap Lengkapi Data Terlebih Dahulu..!!");</script>'; 
	}
?>
</html>