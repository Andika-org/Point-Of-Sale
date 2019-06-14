<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
 <link href="<?php echo base_url()?>assets/untukcssfoto/layout2.css" rel="stylesheet" type="text/css" media="all">   
<link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap-3.3.7-dist-1/bootstrap-3.3.7-dist/css/bootstrap.min.css">
  	<script src="<?php echo base_url()?>assets/js/bootstrap-datetimepicker.js"></script> 
	<link href="<?php echo base_url()?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

 </head>

<!-- untuk auto complete-->
  <script type='text/javascript' src='<?php echo base_url();?>assets/autocomplete/js/jquery.autocomplete.js'></script>

    <!-- Memanggil file .css untuk style saat data dicari dalam filed -->
    <link href='<?php echo base_url();?>assets/autocomplete/js/jquery.autocomplete.css' rel='stylesheet' />

    <!-- Memanggil file .css autocomplete_ci/assets/css/default.css -->
    <script type='text/javascript'>
        var site = "<?php echo site_url();?>";
        $(function(){
            $('.autocompletebarang').autocomplete({
                // serviceUrl berisi URL ke controller/fungsi yang menangani request kita
                serviceUrl: site+'/Pembelian/cariautobahanbakupembelian',
                // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
                onSelect: function (suggestion) {
					$('#Kode_Bahan_Baku').val(''+suggestion.Kode_Bahan_Baku); 
                    $('.Nama_Barang').val(''+suggestion.Nama_Barang); 
					
					$('#Name_Lv1').val(''+suggestion.Name_Lv1); 
					$('#Name_Lv2').val(''+suggestion.Name_Lv2); 
					$('#Name_Lv3').val(''+suggestion.Name_Lv3); 
					$('#Name_Lv4').val(''+suggestion.Name_Lv4);
					//$('#Name_Lv5').val(''+suggestion.Name_Lv5);
					
					$('#Isi_Lv2').val('Isi Tidak Lebih Dari '+suggestion.Lv2+' '+suggestion.Name_Lv2);
					$('#Isi_Lv3').val('Isi Tidak Lebih Dari '+suggestion.Lv3+' '+suggestion.Name_Lv3);
					$('#Isi_Lv4').val('Isi Tidak Lebih Dari '+suggestion.Lv4+' '+suggestion.Name_Lv4);
					//$('#Isi_Lv5').val('Isi Tidak Lebih Dari '+suggestion.Lv5+' '+suggestion.Name_Lv5);

					$('#nms1').val(''+suggestion.Name_Lv1); 
					$('#nms2').val(''+suggestion.Name_Lv2); 
					$('#nms3').val(''+suggestion.Name_Lv3); 
					$('#nms4').val(''+suggestion.Name_Lv4); 
					
					//$('#Type_Barang').val(''+suggestion.Type_Barang); 
					//$('#Harga_Beli').val(''+suggestion.Harga_Beli); 
					//$('#Nama_Satuan').val(''+suggestion.Nama_Satuan); 
					//$('#Satuan').val(''+suggestion.Satuan); 
                }
            });
        });
    </script>
	
	<!-- sampe sini auto completenya-->

  <script src="<?php echo base_url('assestsdatatable/bootstrap/js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assestsdatatable/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assestsdatatable/datatables/js/dataTables.bootstrap.js')?>"></script>
  <script type="text/javascript">
  $(document).ready( function () {
      $('#table_id').DataTable();
  } );
    var save_method; //for save method string
    var table;
	var id;


    function add_pembelian()
    {
      save_method = 'add';
     // $('#form')[0].reset(); // reset form on modals
      $('#myModal').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }
	
	 function add_konfirmasi()
    {
      save_method = 'add';
     // $('#form')[0].reset(); // reset form on modals
      $('#konfirmasi').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }


  </script>

<script type="text/javascript">
function sum(){
	var a = document.getElementById('Qty').value;
	var b = document.getElementById('Harga_Beli').value;
	var result = parseInt(a) * parseInt(b);
	
	if(!isNaN(result)){
	 document.getElementById('Total_Harga').value = result;
		
	}else{
		document.getElementById('Total_Harga').value = '';
	}
}
</script>

<!--<script>
var toggled = false;
function toggle(){
	if(!toggled){
		toggled = true;
		document.getElementById("test").style.display = "block";
		document.getElementById("test2").style.display = "none";
		//document.getElementById("test3").style.display = "none";
		return;
	}
	if(toggled){
		toggled = false;
		document.getElementById("test").style.display = "none";
		document.getElementById("test2").style.display = "none";
		//document.getElementById("test3").style.display = "block";
		return;
	}
}

var toggled2 = false;
function toggle2(){
	if(!toggled2){
		toggled2 = true;
		document.getElementById("test2").style.display = "block";
		document.getElementById("test").style.display = "none";
		//document.getElementById("test3").style.display = "none";
		return;
	}
	if(toggled2){
		toggled2 = false;
		document.getElementById("test2").style.display = "none";
		document.getElementById("test").style.display = "none";
		//document.getElementById("test3").style.display = "block";
		return;
	}
}

</script>
-->
 <script>
$(document).ready(function(){

 $("#caritype").click(function(){
var a = document.getElementById("nms1").value;
var b = document.getElementById("nms2").value;
var c = document.getElementById("nms3").value;
var d = document.getElementById("nms4").value;
//var e = document.getElementById("Name_Lv5").value;
			document.getElementById("Qty1").value = "";
			document.getElementById("Qty2").value = "";
			document.getElementById("Qty3").value = "";
			document.getElementById("Qty4").value = "";
$("#isilv2").slideUp();
$("#isilv3").slideUp();
$("#isilv4").slideUp();
$("#isilv5").slideUp();

	if (a){
				$("#lv1").slideDown();
				
				document.getElementById("Name_Lv1").value= a;
			}	
	if (b){
				$("#lv1").slideDown();
				$("#lv2").slideDown();
				
				document.getElementById("Name_Lv1").value= a;
				document.getElementById("Name_Lv2").value= b;
			}
	if (c){
				$("#lv1").slideDown();
				$("#lv2").slideDown();
				$("#lv3").slideDown();
				
				document.getElementById("Name_Lv1").value= a;
				document.getElementById("Name_Lv2").value= b;
				document.getElementById("Name_Lv3").value= c;
			}
	if (d){
				$("#lv1").slideDown();
				$("#lv2").slideDown();
				$("#lv3").slideDown();
				$("#lv4").slideDown();
				
				document.getElementById("Name_Lv1").value= a;
				document.getElementById("Name_Lv2").value= b;
				document.getElementById("Name_Lv3").value= c;
				document.getElementById("Name_Lv4").value= d;
			}
	
	/*if (e){
				$("#lv1").slideDown();
				$("#lv2").slideDown();
				$("#lv3").slideDown();
				$("#lv4").slideDown();
				$("#lv5").slideDown();
				
				document.getElementById("Name_Lv1").value= a;
				document.getElementById("Name_Lv2").value= b;
				document.getElementById("Name_Lv3").value= c;
				document.getElementById("Name_Lv4").value= d;
				document.getElementById("Name_Lv5").value= e;
			}
*/
	
/*
	var a = document.getElementById("Type_Barang").value;
	 if (a == 'Padat'){
			$("#palet").slideDown();
			$("#dus").slideDown();
			$("#box").slideDown();
			$("#pcs").slideDown();
			
			$("#kg").slideUp();
			$("#skg").slideUp();
			$("#spkg").slideUp();
			
			$("#l").slideUp();
			$("#sl").slideUp();
			$("#spl").slideUp();
		}
	else if (a == 'Berat'){
			$("#palet").slideUp();
			$("#dus").slideUp();
			$("#box").slideUp();
			$("#pcs").slideUp();
			
			$("#kg").slideDown();
			$("#skg").slideDown();
			$("#spkg").slideDown();
			
			$("#l").slideUp();
			$("#sl").slideUp();
			$("#spl").slideUp();
		}
	else if (a == 'Cair'){
			$("#palet").slideUp();
			$("#dus").slideUp();
			$("#box").slideUp();
			$("#pcs").slideUp();
			
			$("#kg").slideUp();
			$("#skg").slideUp();
			$("#spkg").slideUp();
			
			$("#l").slideDown();
			$("#sl").slideDown();
			$("#spl").slideDown();
		}
		*/
    });
$(".reset").click(function(){
			$("#lv1").slideUp();
			$("#lv2").slideUp();
			$("#lv3").slideUp();
			$("#lv4").slideUp();
			//$("#lv5").slideUp();
			
			$("#isilv2").slideUp();
			$("#isilv3").slideUp();
			$("#isilv4").slideUp();
			//$("#isilv5").slideUp();
			
			document.getElementById("nmbarang").value = "";
			document.getElementById("Qty1").value = "";
			document.getElementById("Qty2").value = "";
			document.getElementById("Qty3").value = "";
			document.getElementById("Qty4").value = "";
	});
	
$(".Nama_Barang").click(function(){
			$("#lv1").slideUp();
			$("#lv2").slideUp();
			$("#lv3").slideUp();
			$("#lv4").slideUp();
			//$("#lv5").slideUp();
			
			$("#isilv2").slideUp();
			$("#isilv3").slideUp();
			$("#isilv4").slideUp();
			//$("#isilv5").slideUp();
			
			document.getElementById("nmbarang").value = "";
			document.getElementById("Qty1").value = "";
			document.getElementById("Qty2").value = "";
			document.getElementById("Qty3").value = "";
			document.getElementById("Qty4").value = "";
	});
	/*$(".Nama_Barang").click(function(){
			$("#palet").slideUp();
			$("#dus").slideUp();
			$("#box").slideUp();
			$("#pcs").slideUp();
			
			$("#kg").slideUp();
			$("#skg").slideUp();
			$("#spkg").slideUp();
			
			$("#l").slideUp();
			$("#sl").slideUp();
			$("#spl").slideUp();
	});
	*/
	
	
	$("#lv1").click(function(){
			//$("#palet").slideUp();
			$("#lv2").slideUp();
			$("#lv3").slideUp();
			$("#lv4").slideUp();
			
			document.getElementById("Name_Lv2").value = '';
			document.getElementById("Name_Lv3").value = '';
			document.getElementById("Name_Lv4").value = '';
			
			document.getElementById("Qty2").value = "";
			document.getElementById("Qty3").value = "";
			document.getElementById("Qty4").value = "";
			//$("#lv5").slideUp();
			
	});
	
	var isilv2 = document.getElementById("isilv2").value;
	$("#lv2").click(function(){
		
			//$("#palet").slideUp();
			$("#lv1").slideUp();
			$("#lv3").slideUp();
			$("#lv4").slideUp();
			//$("#lv5").slideUp();
			
			
			document.getElementById("Name_Lv1").value = '';
			document.getElementById("Name_Lv3").value = '';
			document.getElementById("Name_Lv4").value = '';
			
			document.getElementById("Qty1").value = "";
			document.getElementById("Qty3").value = "";
			document.getElementById("Qty4").value = "";
			
			$("#isilv2").slideDown();
			document.getElementById("isilv2").value = isilv2;
	});
	
	var isilv3 = document.getElementById("isilv3").value;
	$("#lv3").click(function(){
			//$("#palet").slideUp();
			$("#lv1").slideUp();
			$("#lv2").slideUp();
			$("#lv4").slideUp();
			//$("#lv5").slideUp();
			
			
			document.getElementById("Name_Lv1").value = '';
			document.getElementById("Name_Lv2").value = '';
			document.getElementById("Name_Lv4").value = '';
			
			document.getElementById("Qty1").value = "";
			document.getElementById("Qty2").value = "";
			document.getElementById("Qty4").value = "";
			
			$("#isilv3").slideDown();
			document.getElementById("isilv3").value = isilv3;
	});
	
	var isilv4 = document.getElementById("isilv4").value;
	$("#lv4").click(function(){
			//$("#palet").slideUp();
			$("#lv1").slideUp();
			$("#lv2").slideUp();
			$("#lv3").slideUp();
			//$("#lv5").slideUp();
			
			
			document.getElementById("Name_Lv1").value = '';
			document.getElementById("Name_Lv2").value = '';
			document.getElementById("Name_Lv3").value = '';
			
			document.getElementById("Qty1").value = "";
			document.getElementById("Qty2").value = "";
			document.getElementById("Qty3").value = "";
			
			$("#isilv4").slideDown();
			document.getElementById("isilv4").value = isilv4;
	});
	
	/*
	var isilv5 = document.getElementById("isilv5").value;
	$("#lv5").click(function(){
			//$("#palet").slideUp();
			$("#lv1").slideUp();
			$("#lv2").slideUp();
			$("#lv3").slideUp();
			$("#lv4").slideUp();
			
			$("#isilv5").slideDown();
			document.getElementById("isilv5").value = isilv5;
	});
	*/
	/*
	
/////////////////////////
	$("#palet").click(function(){
			//$("#palet").slideUp();
			$("#dus").slideUp();
			$("#box").slideUp();
			$("#pcs").slideUp();
			
			$("#kg").slideUp();
			$("#skg").slideUp();
			$("#spkg").slideUp();
			
			$("#l").slideUp();
			$("#sl").slideUp();
			$("#spl").slideUp();
	});
	$("#dus").click(function(){
			$("#palet").slideUp();
			//$("#dus").slideUp();
			$("#box").slideUp();
			$("#pcs").slideUp();
			
			$("#kg").slideUp();
			$("#skg").slideUp();
			$("#spkg").slideUp();
			
			$("#l").slideUp();
			$("#sl").slideUp();
			$("#spl").slideUp();
	});
	$("#box").click(function(){
			$("#palet").slideUp();
			$("#dus").slideUp();
			//$("#box").slideUp();
			$("#pcs").slideUp();
			
			$("#kg").slideUp();
			$("#skg").slideUp();
			$("#spkg").slideUp();
			
			$("#l").slideUp();
			$("#sl").slideUp();
			$("#spl").slideUp();
	});
	$("#pcs").click(function(){
			$("#palet").slideUp();
			$("#dus").slideUp();
			$("#box").slideUp();
			//$("#pcs").slideUp();
			
			$("#kg").slideUp();
			$("#skg").slideUp();
			$("#spkg").slideUp();
			
			$("#l").slideUp();
			$("#sl").slideUp();
			$("#spl").slideUp();
	});
	$("#kg").click(function(){
			$("#palet").slideUp();
			$("#dus").slideUp();
			$("#box").slideUp();
			$("#pcs").slideUp();
			
			//$("#kg").slideUp();
			$("#skg").slideUp();
			$("#spkg").slideUp();
			
			$("#l").slideUp();
			$("#sl").slideUp();
			$("#spl").slideUp();
	});
	$("#skg").click(function(){
			$("#palet").slideUp();
			$("#dus").slideUp();
			$("#box").slideUp();
			$("#pcs").slideUp();
			
			$("#kg").slideUp();
			//$("#skg").slideUp();
			$("#spkg").slideUp();
			
			$("#l").slideUp();
			$("#sl").slideUp();
			$("#spl").slideUp();
	});
	$("#spkg").click(function(){
			$("#palet").slideUp();
			//$("#dus").slideUp();
			$("#box").slideUp();
			$("#pcs").slideUp();
			
			$("#kg").slideUp();
			$("#skg").slideUp();
			//$("#spkg").slideUp();
			
			$("#l").slideUp();
			$("#sl").slideUp();
			$("#spl").slideUp();
	});
	$("#l").click(function(){
			$("#palet").slideUp();
			//$("#dus").slideUp();
			$("#box").slideUp();
			$("#pcs").slideUp();
			
			$("#kg").slideUp();
			$("#skg").slideUp();
			$("#spkg").slideUp();
			
			//$("#l").slideUp();
			$("#sl").slideUp();
			$("#spl").slideUp();
	});
	$("#sl").click(function(){
			$("#palet").slideUp();
			//$("#dus").slideUp();
			$("#box").slideUp();
			$("#pcs").slideUp();
			
			$("#kg").slideUp();
			$("#skg").slideUp();
			$("#spkg").slideUp();
			
			$("#l").slideUp();
			//$("#sl").slideUp();
			$("#spl").slideUp();
	});
	$("#spl").click(function(){
			$("#palet").slideUp();
			//$("#dus").slideUp();
			$("#box").slideUp();
			$("#pcs").slideUp();
			
			$("#kg").slideUp();
			$("#skg").slideUp();
			$("#spkg").slideUp();
			
			$("#l").slideUp();
			$("#sl").slideUp();
			//$("#spl").slideUp();
	});
/////////////////////////
*/
/////////////////
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
		
		
		function sumbayar(){
			var a = document.getElementById('total').value;
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
	 document.getElementById('namabank').value = "";
	 document.getElementById('rekening').value = "";
	 document.getElementById('atasnama').value = "";
	 
     $('#namabank').slideUp();
	 $('#rekening').slideUp();
	 $('#atasnama').slideUp();
	 
	 
    }
	
	function tomboltransfer()
    {
     $('#namabank').slideDown();
	 $('#rekening').slideDown();
	 $('#atasnama').slideDown();
    }
</script>
<style>
 #table{
	font-family:sans-serif;
	color:#444;
	border-collapse:collapse;
	width:100%;
	border:1px solid #f2f5f7;
}
#table tr th{
	background:#008080;
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
 


</head>
<body>
<div class="col-xs-12">
<div class="col-xs-11 pull-right" style="padding-left:120px;"> 
<br>
<a href="<?php echo base_url('Pembelian/index');?>" class="btn btn-danger glyphicon glyphicon-chevron-left"> Back</a>
<br>
<br>
<legend>
</legend>
	<form class="form-signin" method="POST" action="<?php echo base_url();?>Pembelian/konfirmasi/" enctype="multipart/form-data">
	<table id="table" style="border:none;">
		<tr>
			<td>
	<h3 style="width:300px">Order Barang Supplier</h3>
	</td>
	<td  align="right">
	
	<div class="input-group col-md-10" style="width:300px" >
		No. Nota : <div class="input-group"> <input type="text" name="No_Faktur" class="form-control" value="<?php echo $fak; ?>" readonly="readonly">
		<span class="input-group-addon"><span class="glyphicon glyphicon-barcode"></span></span>
	</div>
	</div>
	</td>
	<td align="left">
	<div class="input-group col-md-10" style="width:300px">
            Tanggal Pembelian
			<div class="input-group">
                    <input class="form-control" type="text" name="Tanggal_Pembelian" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('d F Y');?>" readonly="readonly">
                   
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
	</div>
	
	</td>
	</tr>
	<tr>
		<td align="left">
		Kepala Gudang :
				<div class="input-group col-md-8" style="width:300px">
			<input type="hidden" name="Kode_User" class="form-control" value="<?php echo $this->session->userdata['Kode_User']; ?>">
			<input type="text" class="form-control" value="<?php echo $this->session->userdata['Username']; ?>" readonly="readonly">
				</div>
		</td>
		
		<td align="right">
			<p style="margin-top:0px;align:right;" ><b><h5>Total Pembelian : </h5></b></p> 
		</td>
		<td>
		
			<?php foreach ($tot as $tt){?>
			<input type="text" name="Total_Pembelian" class="form-control" style="margin-top:20px; width:300px; background-color:#FFFFAA;" value="<?php echo $tt->Total; }?>" readonly="readonly"> 
		</td>	
	</tr>
	<tr>
	<td>
	
	</td>
	</tr>
	</table>
		<!--
			<a href="<?php echo base_url('Pembelian/konfirmasipembelian')?>" style="padding-top:-40px;" class="btn btn-primary glyphicon glyphicon-list-alt pull-right"> <b>Konfirmasi Pembelian</b></a>
		-->

	</form>
		
<div id="all">
	<div class="col-xs-6">
		<div class="Compose-Message">               
			<div class="panel panel-default" style="margin-bottom:10px;" >
	<div class="panel-heading" style="border:1px solid #DDDDDD;margin-bottom:-4px;background:#DDDDDD;">
    <form style="display:block;" id="test" class="form-signin" method="POST" action="<?php echo base_url();?>Pembelian/tambahpembelianbahanbaku/" enctype="multipart/form-data">
	                  
				<b>Tambah Barang</b>
					<button type="reset" title="Reset" class="pull-right btn-link glyphicon glyphicon-remove reset"></button>	
					<button type="submit" title="Buy" style="width:;" class="pull-right btn-link glyphicon glyphicon-shopping-cart"></button>
				</div>
		<!--<div class="panel-body" style="border:1px solid #DDDDDD;height:468px;">-->
        <div class="panel-body" style="border:1px solid #DDDDDD;">                

	<table>
	<input type="hidden" name="Id_Transaksi" value="<?php echo $tr; ?>" >
	<input type="hidden" name="No_Faktur" value="<?php echo $fak; ?>" >
	<input type="hidden" name="Kode_User" value="<?php echo $this->session->userdata['Kode_User']; ?>" >
	
	<input type="hidden" class="form form-control" id="nms1">
	<input type="hidden" class="form form-control" id="nms2">
	<input type="hidden" class="form form-control" id="nms3">
	<input type="hidden" class="form form-control" id="nms4">
		
		<tr>
			<td style="width:80px;">Barang</td>
			<td>
			
			<input required type="hidden" name="Kode_Bahan_Baku" class='form-control' id="Kode_Bahan_Baku" placeholder="Bahan Baku" required>

			<div class="input-group">
				<input required type="text" style="width:220px" id="nmbarang" name="Nama_Barang" class='autocompletebarang form form-control Nama_Barang'  placeholder="Barang" required>
				<span id="caritype" style="margin-left:10px;" class="btn btn-primary btn-sm glyphicon glyphicon-ok"></span>
			</div>
			</td>
		</tr>
		<!-- satuan -->
		<tr id="lv1" style="display:none;">
			<td><input type="text" name="nmlv1" readonly="readonly" id="Name_Lv1" style="background:white;width:150px;border:1px solid white;" class="form-control"></td>
			<td>
				<input type="text" id="Qty1" name="QtyLv1" style="width:220px;" class="form-control">
			</td>
		</tr>
		<tr id="lv2" style="display:none;">
			<td><input type="text" name="nmlv2" readonly="readonly" id="Name_Lv2" style="background:white;width:150px;border:1px solid white;" class="form-control"></td>
			<td>
				<input type="text" id="Qty2" name="QtyLv2" style="width:220px;" class="form-control">
			</td>
		</tr>
		<tr id="isilv2" style="display:none;">
			<td></td>
			<td>
				<input type="text" readonly="readonly" id="Isi_Lv2" style="width:220px;background:white;border:1px solid white;" class="form-control">
			</td>
		</tr>
		<tr id="lv3" style="display:none;">
			<td><input type="text" name="nmlv3" readonly="readonly" id="Name_Lv3" style="background:white;width:150px;border:1px solid white;" class="form-control"></td>
			<td>
				<input type="text" id="Qty3" name="QtyLv3" style="width:220px;" class="form-control">
			</td>
		</tr>
		<tr id="isilv3" style="display:none;">
			<td></td>
			<td>
				<input readonly="readonly" type="text" id="Isi_Lv3" style="width:220px;background:white;border:1px solid white;" class="form-control">
			</td>
		</tr>
		<tr id="lv4" style="display:none;">
			<td><input type="text" name="nmlv4" readonly="readonly" id="Name_Lv4" style="background:white;width:150px;border:1px solid white;" class="form-control"></td>
			<td>
				<input type="text" id="Qty4" name="QtyLv4" style="width:220px;" class="form-control">
			</td>
		</tr>
		<tr id="isilv4" style="display:none;">
			<td></td>
			<td>
				<input type="text" readonly="readonly" id="Isi_Lv4" style="width:220px;background:white;border:1px solid white;" class="form-control">
			</td>
		</tr>
		<!--
		<tr id="lv5" style="display:none;">
			<td><input type="text" readonly="readonly" id="Name_Lv5" style="background:white;width:150px;border:1px solid white;" class="form-control"></td>
			<td>
				<input type="text" name="QtyLv5" style="width:220px;" class="form-control">
			</td>
		</tr>
		<tr id="isilv5" style="display:none;">
			<td></td>
			<td>
				<input type="text" readonly="readonly" id="Isi_Lv5" style="width:220px;background:white;border:1px solid white;" class="form-control">
			</td>
		</tr>
		-->
		<!-- satuan -->
		
		<tr>
			<td>Harga</td>
			<td>
				<div class="input-group">
					<input type="text" readonly="readonly" value="Rp. " class="form form-control" style="border-right:none;width:50px;border-radius:5px 0px 0px 5px; margin-top:0px; padding-top:6px;padding-left:8px;">
					<input type="text" name="Harga_Beli" required class="form form-control" style="width:170px;border-left:none;">
				</div>
			</td>
		</tr>
	</table>
	</form>
		

		</div>
		</div>
	</div>
	</div>
	<!-- supplier -->
	<div class="col-xs-6">
		<div class="Compose-Message">               
			<div class="panel panel-default">
		 <form class="form-signin" method="POST" action="<?php echo base_url();?>Pembelian/konfirmasipembelian/" enctype="multipart/form-data">
				
				<div class="panel-heading" style="border:1px solid #DDDDDD;margin-bottom:0px;background:#DDDDDD;">
                       
				<b>Supplier</b>
					<button type="reset" title="Reset" class="pull-right btn-link glyphicon glyphicon-remove reset"></button>	
					<button type="submit" title="Save Data Purchase" style="width:;" class="pull-right btn-link glyphicon glyphicon-floppy-disk"></button>
				</div>
		<div class="panel-body" style="padding-top:10px;border:1px solid #DDDDDD">
       
		<input type="hidden" name="No_Faktur" class="form-control" value="<?php echo $fak; ?>" readonly="readonly">
		<input type="hidden" name="Kode_User" class="form-control" value="<?php echo $this->session->userdata['Kode_User']; ?>">
			
	
	<table class="">
		<tr style="display:none;">
			<td>Amount</td>
			<td>
				<?php foreach ($tot as $tt){?>
				<input type="hidden" id="total2" name="Total_Pembelian_Sebelumnya" class="form-control" value="<?php echo $tt->Total;?>" readonly="readonly">
				<input type="text" id="total" name="Total_Pembelian"  class="form-control total" style="margin-top:0px; background-color:#FFFFAA;" value="<?php echo $tt->Total;?>" readonly="readonly">
				<?php } ?>
			</td>
		</tr>
		<?php $hakakses = $this->session->userdata['Hak_Akses'];
				if($hakakses == 'Supplier'){
			?>
		<tr style="display:none;">
			<td>Discount</td>
			<td>
				<div class="input-group">
					<input type="text"  id="disc" onkeyup="sumdisc();" name="Discount" class="form form-control" style="width:60px;border-right:none;" value="0" >
					<input type="text" readonly="readonly" value="%" class="form form-control" style="border-left:none;width:40px;border-radius:0px 5px 5px 0px; margin-top:0px; padding-top:6px;padding-left:8px;">
				</div>
			</td>
		</tr>
		<tr style="display:none;">
			<td>PPN</td>
			<td>
				<div class="input-group">
					<input type="text"  name="Ppn" id="ppn" onkeyup="sumppn();" class="form form-control" style="width:60px;border-right:none;" value="0" >
					<input type="text" readonly="readonly" value="%" class="form form-control" style="border-left:none;width:40px;border-radius:0px 5px 5px 0px; margin-top:0px; padding-top:6px;padding-left:8px;">
				</div>
			</td>
		</tr>
				<?php } else{} ?>
			
					<input type="hidden" name="Discount" class="form form-control" style="width:60px;border-right:none;" value="0" >
					
					<input type="hidden"  name="Ppn" class="form form-control" style="width:60px;border-right:none;" value="0" >
					
		<tr>
			<td>Supplier</td>
			<td>
				<select required class="form-control" name="Kode_Supplier" required>
            			<option></option>
						<?php 
						foreach ($sp as $sup) {
						?>
            			<option value="<?php echo $sup->Kode_Supplier; ?>"><?php echo $sup->Nama_Supplier.' - '.$sup->Deskripsi; ?></option>
            			
						<?php
						}
						?>
      				</select>
			</td>
		</tr>
		<tr style="display:none;">
			<td>Tanggal</td>
			<td>
				<div class="navbar-header" style="width:300px">
				<div class="input-group date form_date col-md-12" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" type="text" name="Tanggal_Jatuh_Tempo" placeholder="Tanggal Jatuh Tempo" readonly="readonly">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
				
			</div>
		</tr>
		
		<tr style="display:none;">
			<td>Pembayaran</td>
			<td>
				<input  type="radio" id="tunai" onclick="tomboltunai();" name="Jenis_Pembayaran" value="Tunai"><b>&nbsp Tunai</b>
				
				<input  type="radio" id="transfer" onclick="tomboltransfer();" name="Jenis_Pembayaran" value="Transfer"><b>&nbsp Transfer</b>
			</td>
		</tr>
		<tr style="display:none;">
			<td>Nominal Bayar</td>
			<td>
				<div class="input-group">
					<input type="text" readonly="readonly" value="Rp. " class="form form-control" style="border-right:none;width:45px;border-radius:5px 0px 0px 5px; margin-top:0px; padding-top:6px;padding-left:8px;">
					<input type="text" id="bayar" name="Nominal" onkeyup="sumbayar();" class="form form-control" style="width:150px;border-left:none;" >
				</div>
			</td>
		</tr>
		<tr style="display:none;">
			<td>Kembali</td>
			<td>
				<div class="input-group">
					<input type="text" readonly="readonly" value="Rp. " class="form form-control" style="border-right:none;width:45px;border-radius:5px 0px 0px 5px; margin-top:0px; padding-top:6px;padding-left:8px;">
					<input type="text" id="kembali" name="Kembali" value="0" readonly="readonly" class="form form-control" style="width:150px;border-left:none;background:white;">
				</div>
			</td>
		</tr>
		<tr style="display:none;">
			<td>Bukti Pembayaran</td>
			<td>
				<input type="file" style="width:300px" name="Bukti_Pembayaran" class="form-control" class="input-medium">
				<small style="color:green;">** Jenis File Tidak Lebih Dari 2 Mb</small>
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
		
		
		
	</table>
	</form>
		</div>
		</div>
	</div>
	</div>
	<!-- sampe sini -->
	<!-- bkkgibo -->
	<!--<div class="col-xs-6">
		<div class="Compose-Message">               
			<div class="panel panel-default">
		 <form class="form-signin" method="POST" action="<?php echo base_url();?>Pembelian/konfirmasipembelian/" enctype="multipart/form-data">
				
				<div class="panel-heading" style="border:1px solid #DDDDDD;margin-bottom:0px;background:#DDDDDD;">
                       
				<b>Konfirmasi Pembelian</b>
					<button type="reset" title="Reset" class="pull-right btn-link glyphicon glyphicon-remove reset"></button>	
					<button type="submit" title="Save Data Purchase" style="width:;" class="pull-right btn-link glyphicon glyphicon-floppy-disk"></button>
				</div>
		<div class="panel-body" style="padding-top:10px;border:1px solid #DDDDDD">
       
		<input type="hidden" name="No_Faktur" class="form-control" value="<?php echo $fak; ?>" readonly="readonly">
		<input type="hidden" name="Kode_User" class="form-control" value="<?php echo $this->session->userdata['Kode_User']; ?>">
			
	
	<table class="">
		<tr>
			<td>Amount</td>
			<td>
				<?php foreach ($tot as $tt){?>
				<input type="hidden" id="total2" name="Total_Pembelian_Sebelumnya" class="form-control" value="<?php echo $tt->Total;?>" readonly="readonly">
				<input type="text" required id="total" name="Total_Pembelian"  class="form-control total" style="margin-top:0px; background-color:#FFFFAA;" value="<?php echo $tt->Total;?>" readonly="readonly">
				<?php } ?>
			</td>
		</tr>
		<?php $hakakses = $this->session->userdata['Hak_Akses'];
				if($hakakses == 'Supplier'){
			?>
		<tr>
			<td>Discount</td>
			<td>
				<div class="input-group">
					<input type="text"  id="disc" onkeyup="sumdisc();" name="Discount" class="form form-control" style="width:60px;border-right:none;" value="0" >
					<input type="text" readonly="readonly" value="%" class="form form-control" style="border-left:none;width:40px;border-radius:0px 5px 5px 0px; margin-top:0px; padding-top:6px;padding-left:8px;">
				</div>
			</td>
		</tr>
		<tr>
			<td>PPN</td>
			<td>
				<div class="input-group">
					<input type="text"  name="Ppn" id="ppn" onkeyup="sumppn();" class="form form-control" style="width:60px;border-right:none;" value="0" >
					<input type="text" readonly="readonly" value="%" class="form form-control" style="border-left:none;width:40px;border-radius:0px 5px 5px 0px; margin-top:0px; padding-top:6px;padding-left:8px;">
				</div>
			</td>
		</tr>
				<?php } else{} ?>
			
					<input type="hidden" name="Discount" class="form form-control" style="width:60px;border-right:none;" value="0" >
					
					<input type="hidden"  name="Ppn" class="form form-control" style="width:60px;border-right:none;" value="0" >
					
		<tr>
			<td>Supplier</td>
			<td>
				<select required class="form-control" name="Kode_Supplier" required>
            			<option></option>
						<?php 
						foreach ($sp as $sup) {
						?>
            			<option value="<?php echo $sup->Kode_Supplier; ?>"><?php echo $sup->Nama_Supplier.' - '.$sup->Deskripsi; ?></option>
            			
						<?php
						}
						?>
      				</select>
			</td>
		</tr>
		<tr>
			<td>Tanggal</td>
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
					<input type="text" id="bayar" name="Nominal" onkeyup="sumbayar();" required class="form form-control" style="width:150px;border-left:none;" required>
				</div>
			</td>
		</tr>
		<tr>
			<td>Kembali</td>
			<td>
				<div class="input-group">
					<input type="text" readonly="readonly" value="Rp. " class="form form-control" style="border-right:none;width:45px;border-radius:5px 0px 0px 5px; margin-top:0px; padding-top:6px;padding-left:8px;">
					<input type="text" id="kembali" name="Kembali" value="0" readonly="readonly" required class="form form-control" style="width:150px;border-left:none;background:white;" required>
				</div>
			</td>
		</tr>
		<tr>
			<td>Bukti Pembayaran</td>
			<td>
				<input type="file" style="width:300px" name="Bukti_Pembayaran" class="form-control" class="input-medium">
				<small style="color:green;">** Jenis File Tidak Lebih Dari 2 Mb</small>
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
		
		
		
	</table>
	</form>
		</div>
		</div>
	</div>
	</div>
	-->
	<table id="table" class="table table-bordered table responsive">
			
		<tr>
			<th style="align:center;"><b>No.</b></th>
			<th align="center"><b>Kode Barang</b></th>
			<th align="center"><b>Nama Barang</b></th>
			<th align="center"><b>Qty</b></th>
			<th align="center"><b>Harga Beli</b></th>
			<th align="center"><b>Subtotal</b></th>
			<th align="center"><b>Tools</b></th>
		</tr>
		
		<?php 
		$no = $this->uri->segment('3') + 1;
		foreach($datatable as $baris){
		?>
	<tr>
		<td align="center" ><?php echo $no; ?></td>
		<td align="center" ><?php echo $baris->Kode_Bahan_Baku; ?></td>
		<td align="center" ><?php echo $baris->Nama_Barang; ?></td>
		<td align="center" ><?php echo $baris->Qty.' '.$baris->Nama_Satuan; ?></td>
		<td align="left" ><?php echo 'Rp. '.number_format($baris->Harga_Beli,0,",","."); ?></td>
		<td align="left" ><?php $sub = $baris->Qty * $baris->Harga_Beli; 
								echo 'Rp. '.number_format($sub,0,",",".");?></td>
		<td align="center" >
		<a onclick="return confirm('Hapus Data Pada Rows Ini..?')" href="<?php echo base_url('Pembelian/hapuspembelian/'.$baris->Id_Transaksi); ?>"><span class="btn btn-danger btn-sm glyphicon glyphicon-trash" align="right"> Delete</span></a>
		</td>
	</tr>
	<?php
		$no++;
		}
		?>
	</table>
<legend>
</legend>

</div>
</div>
<!--
<div class="container">

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
 
      <div class="modal-content">
	  
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Input Data Pembelian</h3>
        </div>
	<div class="modal-body">
        <form style="display:block;" id="test" class="form-signin" method="POST" action="<?php echo base_url();?>Pembelian/tambahpembelianbahanbaku/" enctype="multipart/form-data">
	
	<table class="table table-bordered table responsive">
	<input type="hidden" name="Id_Transaksi" value="<?php echo $tr; ?>" >
	<input type="hidden" name="No_Faktur" value="<?php echo $fak; ?>" >
	<input type="hidden" name="Kode_User" value="<?php echo $this->session->userdata['Kode_User']; ?>" >
		<tr>
			<td>Bahan Baku</td>
			<td>
			<input required type="hidden" name="Kode_Bahan_Baku" class='form-control' id="Kode_Bahan_Baku" placeholder="Bahan Baku" required>
			<input required type="text" name="Nama_Barang" class='autocompletebarang form-control Nama_Barang'  placeholder="Bahan Baku" required>
			</td>
		</tr>
		<tr>
			<td>Qty</td>
			<td>
			<div class="input-group">
		<input required name="Qty" style="border-right:none;margin:0px 0px 0px 0px; width:100px;" type="text" class='form-control' placeholder="Qty" id="Qty" onkeyup="sum();"/>
		<input type="text" readonly="readonly" name="Nama_Satuan" id="Nama_Satuan" class="form form-control" style="border-left:none;width:200px;border-radius:0px 5px 5px 0px; margin-top:0px; padding-top:6px;padding-left:8px;">
		</div>
		
			<input required type="text" name="Qty" class='form-control' placeholder="Qty" id="Qty" onkeyup="sum();" required>
		
			</td>
		</tr>
		<tr>
			<td>Satuan</td>
			<td>
			<input required type="text" class='form-control' id="Satuan" readonly="readonly" required>
			</td>
		</tr>
		
		<tr>
			<td>Harga Beli</td>
			<td>
			<input required type="text" name="Harga_Beli" style="background-color:#FFFFAA;" class='form-control' id="Harga_Beli" readonly="readonly" required>
			</td>
		</tr>
		<tr>
			<td>Total Harga</td>
			<td> 
			<input required type="text" style="background-color:#FFFFAA;" class='form-control' id="Total_Harga" readonly="readonly" required>
			</td>
		</tr>
	</table>
	<div class="modal-footer">
			<input type="submit" onclick="return confirm('Anda Yakin Ingin Menyimpan Data Ini..??')" class="btn btn-success" value="Save">
			<input type="reset" class="btn btn-warning" value="Clear">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
	</form>
        </div>
		
        </div>
		
	 </div>
	  </div>
 </div>
 -->
  <!-- Bootstrap modal -->
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
</html>

	