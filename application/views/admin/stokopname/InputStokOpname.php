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
                serviceUrl: site+'/Stokopname/cariautobahanbaku',
                // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
                onSelect: function (suggestion) {
					$('#Kode_Bahan_Baku').val(''+suggestion.Kode_Bahan_Baku); 
                    $('.Nama_Barang').val(''+suggestion.Nama_Barang); 
					
					$('#Name_Lv1').val(''+suggestion.Name_Lv1); 
					$('#Name_Lv2').val(''+suggestion.Name_Lv2); 
					$('#Name_Lv3').val(''+suggestion.Name_Lv3); 
					$('#Name_Lv4').val(''+suggestion.Name_Lv4);
					//$('#Name_Lv5').val(''+suggestion.Name_Lv5);
					
					$('#Isi_Lv1').val(''+suggestion.Lv1);
					$('#Isi_Lv2').val(''+suggestion.Isi_Lv2);
					$('#Isi_Lv3').val(''+suggestion.Isi_Lv3);
					$('#Isi_Lv4').val(''+suggestion.Isi_Lv4);
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

<script type="text/javascript">
function sumlv1(){
	var a = document.getElementById('Isi_Lv1').value;
	var b = document.getElementById('stoknyatalv1').value;
	var result = parseInt(b) - parseInt(a);
	
	if(!isNaN(result)){
	 document.getElementById('hasillv1').value = result;
		
	}else{
		document.getElementById('hasillv1').value = '';
	}
}

function sumlv2(){
	var a = document.getElementById('Isi_Lv2').value;
	var b = document.getElementById('stoknyatalv2').value;
	var result = parseInt(b) - parseInt(a);
	
	if(!isNaN(result)){
	 document.getElementById('hasillv2').value = result;
		
	}else{
		document.getElementById('hasillv2').value = '';
	}
}

function sumlv3(){
	var a = document.getElementById('Isi_Lv3').value;
	var b = document.getElementById('stoknyatalv3').value;
	var result = parseInt(b) - parseInt(a);
	
	if(!isNaN(result)){
	 document.getElementById('hasillv3').value = result;
		
	}else{
		document.getElementById('hasillv3').value = '';
	}
}

function sumlv4(){
	var a = document.getElementById('Isi_Lv4').value;
	var b = document.getElementById('stoknyatalv4').value;
	var result = parseInt(b) - parseInt(a);
	
	if(!isNaN(result)){
	 document.getElementById('hasillv4').value = result;
		
	}else{
		document.getElementById('hasillv4').value = '';
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
			//document.getElementById("Qty1").value = "";
			//document.getElementById("Qty2").value = "";
			//document.getElementById("Qty3").value = "";
			//document.getElementById("Qty4").value = "";
$("#headertable").slideDown();
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
			
			$("#headertable").slideUp();
			$("#isilv2").slideUp();
			$("#isilv3").slideUp();
			$("#isilv4").slideUp();
			//$("#isilv5").slideUp();
			
			document.getElementById("nmbarang").value = "";
			document.getElementById("Isi_Lv1").value = "";
			document.getElementById("Isi_Lv2").value = "";
			document.getElementById("Isi_Lv3").value = "";
			document.getElementById("Isi_Lv4").value = "";
			
			document.getElementById("stoknyatalv1").value = "";
			document.getElementById("stoknyatalv2").value = "";
			document.getElementById("stoknyatalv3").value = "";
			document.getElementById("stoknyatalv4").value = "";
			
			document.getElementById("keteranganlv1").value = "";
			document.getElementById("keteranganlv2").value = "";
			document.getElementById("keteranganlv3").value = "";
			document.getElementById("keteranganlv4").value = "";
			
			document.getElementById("hasillv1").value = "";
			document.getElementById("hasillv2").value = "";
			document.getElementById("hasillv3").value = "";
			document.getElementById("hasillv4").value = "";
	});
	
	
	/*
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
	background-color:white;
}
 </style>
 


</head>
<body>
<div class="col-xs-12">
<div class="col-xs-11 pull-right" style="padding-left:120px;"> 
<br>
<a href="<?php echo base_url('Stokopname/index');?>" class="btn btn-danger glyphicon glyphicon-chevron-left"> Back</a>
<!--
<h2 style="color:brown" align="center"><b>Input Stok Opname</b></h2>
-->
<br>
<br>
<legend>
</legend>	
<div id="all">
		<div class="Compose-Message">               
			<div class="panel panel-default" style="margin-bottom:-10px;" >
	<div class="panel-heading" style="border:1px solid #DDDDDD;margin-bottom:-4px;background:#DDDDDD;">
    <form style="display:block;" id="test" class="form-signin" method="POST" action="<?php echo base_url();?>Stokopname/inputstokopname/" enctype="multipart/form-data">
	                  
				<b>Input Barang Stok Opname</b>
					<a href="<?php echo base_url("Stokopname/simpanheader/".$idstok["Id_Stokopname"]); ?>" style="margin-top:-8px;" title="Finish" class="pull-right btn btn-link glyphicon glyphicon-floppy-saved"> Finish ]</a>
					<button type="submit" title="Add List Stok Opname" style="margin-top:-8px;" class="pull-right btn btn-link glyphicon glyphicon-saved"> Save ]</button>
				</div>
		<!--<div class="panel-body" style="border:1px solid #DDDDDD;height:468px;">-->
        <div class="panel-body" style="border:1px solid #DDDDDD;">                

	<table>
	<input type="hidden" name="Kode_User" value="<?php echo $this->session->userdata['Kode_User']; ?>" >
	
	<input type="hidden" class="form form-control" id="nms1">
	<input type="hidden" class="form form-control" id="nms2">
	<input type="hidden" class="form form-control" id="nms3">
	<input type="hidden" class="form form-control" id="nms4">
		
		<tr>
			<td style="width:80px;">Barang</td>
			<td colspan="">
			
			<input required type="hidden" name="Kode_Bahan_Baku" class='form-control' id="Kode_Bahan_Baku" placeholder="Bahan Baku" required>

			<div class="input-group">
				<input required type="text" style="width:220px" id="nmbarang" name="Nama_Barang" class='autocompletebarang form form-control Nama_Barang'  placeholder="Barang" required>
				<span id="caritype" style="margin-left:10px;" class="btn btn-primary btn-sm glyphicon glyphicon-ok"></span>
			</div>
			</td>
		</tr>
		<!-- satuan -->
	<table>
	<br>
	<table id="table" class="table">
	<tr style="display:none;" id="headertable">
		<th style="background:#DDDDDD;color:black"><center>Nama Satuan</center></th>
		<th style="background:#DDDDDD;color:black"><center>Stok</center></th>
		<th style="background:#DDDDDD;color:black"><center>Stok Nyata</center></th>
		<th style="background:#DDDDDD;color:black"><center>Selisih</center></th>
		<th style="background:#DDDDDD;color:black"><center>Keterangan</center></th>
	</tr>
		<tr id="lv1" style="display:none;">
			<td>
			<input type="hidden" readonly="readonly" name="level[]" value="Lv1" style="width:100px;" class="form-control">
			<center><input type="text" name="namasatuan[]" readonly="readonly" id="Name_Lv1" style="background:white;width:150px;border:1px solid white;" class="form-control"></center></td>
			<td>
				<center><input type="text" readonly="readonly" id="Isi_Lv1" name="isistok[]" style="width:100px;" class="form-control"></center>
			</td>
			<td>
				<center><input type="text" onkeyup="sumlv1();" id="stoknyatalv1" name="stoknyata[]" style="width:100px;" class="form-control"></center>
			</td>
			<td>
				<center><input type="text" readonly="readonly" id="hasillv1" name="selisih[]" style="width:100px;" class="form-control"></center>
			</td>
			<td>
				<center><input type="text" id="keteranganlv1" name="keterangan[]" style="width:220px;" class="form-control"></center>
			</td>
		</tr>
		<!--
		<tr id="lv2" style="display:none;">
			<td>
			<input type="hidden" readonly="readonly" name="level[]" value="Lv2" style="width:100px;" class="form-control">
			<center><input type="text" name="namasatuan[]" readonly="readonly" id="Name_Lv2" style="background:white;width:150px;border:1px solid white;" class="form-control"></td>
			<td>
				<center><input type="text" readonly="readonly" id="Isi_Lv2" name="isistok[]" style="width:100px;" class="form-control">
			</td>
			<td>
				<center><input type="text" onkeyup="sumlv2();" id="stoknyatalv2" name="stoknyata[]" style="width:100px;" class="form-control">
			</td>
			<td>
				<center><input type="text" readonly="readonly" id="hasillv2" name="selisih[]" style="width:100px;" class="form-control">
			</td>
			<td>
				<center><input type="text" id="keteranganlv2" name="keterangan[]" style="width:220px;" class="form-control">
			</td>
		</tr>
		<tr id="lv3" style="display:none;">
			<td>
			<input type="hidden" readonly="readonly" name="level[]" value="Lv3" style="width:100px;" class="form-control">
			<center><input type="text" name="namasatuan[]" readonly="readonly" id="Name_Lv3" style="background:white;width:150px;border:1px solid white;" class="form-control"></td>
			<td>
				<center><input type="text" readonly="readonly" id="Isi_Lv3" name="isistok[]" style="width:100px;" class="form-control">
			</td>
			<td>
				<center><input type="text" onkeyup="sumlv3();" id="stoknyatalv3" name="stoknyata[]" style="width:100px;" class="form-control">
			</td>
			<td>
				<center><input type="text" readonly="readonly" id="hasillv3" name="selisih[]" style="width:100px;" class="form-control">
			</td>
			<td>
				<center><input type="text" id="keteranganlv3" name="keterangan[]" style="width:220px;" class="form-control">
			</td>
		</tr>
		<tr id="lv4" style="display:none;">
			<td>
			<input type="hidden" readonly="readonly" name="level[]" value="Lv4" style="width:100px;" class="form-control">
			<center><input type="text" name="namasatuan[]" readonly="readonly" id="Name_Lv4" style="background:white;width:150px;border:1px solid white;" class="form-control"></td>
			<td>
				<center><input type="text" readonly="readonly" id="Isi_Lv4" name="isistok[]" style="width:100px;" class="form-control">
			</td>
			<td>
				<center><input type="text" onkeyup="sumlv4();" id="stoknyatalv4" name="stoknyata[]"  style="width:100px;" class="form-control">
			</td>
			<td>
				<center><input type="text" readonly="readonly" id="hasillv4" name="selisih[]" style="width:100px;" class="form-control">
			</td>
			<td>
				<center><input type="text" id="keteranganlv4" name="keterangan[]" style="width:220px;" class="form-control">
			</td>
		</tr>
		
		-->
	</table>
	</form>
		

		</div>
		</div>
	</div>
	</div>
	<!-- bkkgibo -->
	<br>
	<br>

	<table id="table" class="table table-bordered table responsive">
			
		<tr>
			<th style="align:center;"><b>No.</b></th>
			<th align="center"><b>Kode Barang</b></th>
			<th align="center"><b>Nama Barang</b></th>
			<th align="center"><b>Stok</b></th>
			<th align="center"><b>Stok Nyata</b></th>
			<th align="center"><b>Selisih</b></th>
			<th align="center"><b>Keterangan</b></th>
		</tr>
		
		<?php 
		echo $test;
		?>
	
	</table>
<legend>
</legend>

</div>
</div>

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

	