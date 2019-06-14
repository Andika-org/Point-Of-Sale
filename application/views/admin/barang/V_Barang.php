<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
 <link href="<?php echo base_url()?>assets/untukcssfoto/layout2.css" rel="stylesheet" type="text/css" media="all">   
<link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap-3.3.7-dist-1/bootstrap-3.3.7-dist/css/bootstrap.min.css">
  
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
                serviceUrl: site+'/Barang/cariautobahanbaku',
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
					
					////////////////// Isi Default /////////////////////////
					$('#Isidefault_Lv2').val(''+suggestion.Lv2);
					$('#Isidefault_Lv3').val(''+suggestion.Lv3);
					$('#Isidefault_Lv4').val(''+suggestion.Lv4);
					
					$('#qtydefault_Lv2').val(''+suggestion.Lv2);
					$('#qtydefault_Lv3').val(''+suggestion.Lv3);
					$('#qtydefault_Lv4').val(''+suggestion.Lv4);
					///////////////////////////////////////////
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
	
	<!-- scrip togle -->
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
			
////////// default isi ///////////
var qtydefault2 = document.getElementById("Isidefault_Lv2").value;
var qtydefault3 = document.getElementById("Isidefault_Lv3").value;
var qtydefault4 = document.getElementById("Isidefault_Lv4").value;

document.getElementById("qtydefault_Lv2").value = qtydefault2;
document.getElementById("qtydefault_Lv3").value = qtydefault3;
document.getElementById("qtydefault_Lv4").value = qtydefault4;
//////////////////////////////////			
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
			
			document.getElementById("Isidefault_Lv2").value = "";
			document.getElementById("Isidefault_Lv3").value = "";
			document.getElementById("Isidefault_Lv4").value = "";
			
			document.getElementById("qtydefault_Lv2").value = "";
			document.getElementById("qtydefault_Lv3").value = "";
			document.getElementById("qtydefault_Lv4").value = "";
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
			
			document.getElementById("Isidefault_Lv2").value = "";
			document.getElementById("Isidefault_Lv3").value = "";
			document.getElementById("Isidefault_Lv4").value = "";
			
			document.getElementById("qtydefault_Lv2").value = "";
			document.getElementById("qtydefault_Lv3").value = "";
			document.getElementById("qtydefault_Lv4").value = "";
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
			
			document.getElementById("qtydefault_Lv3").value = "";
			document.getElementById("qtydefault_Lv4").value = "";
			
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
			
			document.getElementById("qtydefault_Lv2").value = "";
			document.getElementById("qtydefault_Lv4").value = "";
			
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
			
			document.getElementById("qtydefault_Lv2").value = "";
			document.getElementById("qtydefault_Lv3").value = "";
			
			$("#isilv4").slideDown();
			document.getElementById("isilv4").value = isilv4;
	});
	
		
	
 });
 </script>

  <script src="<?php echo base_url('assestsdatatable/bootstrap/js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assestsdatatable/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assestsdatatable/datatables/js/dataTables.bootstrap.js')?>"></script>
  <script type="text/javascript">
  $(document).ready( function () {
      $('#table_id').DataTable();
  } );
    var save_method; 
    var table;
	var id;


    function add_barang()
    {
      save_method = 'add';
      $('#myModal').modal('show'); 
    }


  </script>
  
  <script type='text/javascript' src='<?php echo base_url();?>assets/untukmoney/jqueryMaskmoney.min.js'></script>
  <script type="text/javascript">
	$(document).ready(function(){
		$('#angka1').maskMoney({prefix:'Rp. ',thousands:'.',decimal:',',precision:0});	
	})
  </script>
<script type="text/javascript">
function kompresharga(){
	var a = document.getElementById('angka1').value;
		document.getElementById('hasilhargajual').value = a.split('.').join('').substr(3);
}
</script>
<script type="text/javascript">
function satuan(){
	var a = document.getElementById('Nama_Satuan').value;
		document.getElementById('qty').value = a;
}
function pcs(){
	var a = document.getElementById('PCS').value;
		document.getElementById('qty').value = a;
}
</script>
<script type="text/javascript">
  $(document).ready( function () {
      $('#scan').click(function(){
		  $("#codebarcode").slideDown();
	  });
	  
	  
      $('#tidak').click(function(){
		  $("#codebarcode").slideUp();
	  });
  } );
  </script>
  <script>
$(document).ready(function(){

$(document).on('click','.detail',function(){
				$(this).parent().parent().next().find('.datadetail').toggle();
				
			});
///////////////////////
});

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
	<h2 style="color:brown" align="center"><b>Data Barang</b></h2>
	<legend>
	</legend>

<table>
<tr>
	<td>
		<div class="navbar-header">
			<div class="btn btn-primary glyphicon glyphicon-plus" onclick="add_barang()"><b> New</b></div>  
		</div>
	</td>
</tr>
<tr>
<td style="align:left;">
<div class="navbar-header">
	<form action="<?php print site_url();?>/Barang/index2" method=POST>
		<select name="batas" style="height:25px; margin:0px 0px 0px 0px" >
			<option value="200">Page</option>
			<option value="5">5</option>
			<option value="10">10</option>
			<option value="25">25</option>
			<option value="50">50</option>
			<option value="75">75</option>
			<option value="100">100</option>
			<option value="150">150</option>
			<option value="200">200</option>
			<option value="500">Max Page</option>
		</select>
		<input type="submit" class="btn btn-success btn-bg " value="OK">
	</form>
	</div>
</td>
	<td>
	<form action="<?php print site_url();?>/Barang/caribarang" method=POST>

		<div class="input-group">
		<input required name="caridatasupplier" style="margin:0px 0px 0px 0px; width:250px;" type="text" class='form-control' placeholder="Search Data...."/>
		<button class="btn btn-primary btn-bg glyphicon glyphicon-search" style="border-radius:0px 5px 5px 0px; margin-top:-1px; padding-top:6px;padding-left:8px;"></button>
		
		</div>
	</form>
	</td>
</tr>
</table>
		<table id="table" class="table">
			
		<tr bgcolor="#66CCFF">
			<th align="center"><b>Kode Barang</b></th>
			<th align="center"><b>Nama Barang</b></th>
			<th align="center"><b>Isi</b></th>
			<th align="center"><b>Harga Jual</b></th>
			<th align="center"><b>Scan Barcode</b></th>
			<th align="center"><b>Tanggal Update</b></th>
			<th align="center"><b>Tools</b></th>
		</tr>
		
		<?php 
		$no = $this->uri->segment('3') + 1;
		foreach($datatable as $baris){
			
		?>
		
		<tr>
		<td align="center" style="padding-top:10px;"><span style="padding-top:3px;cursor:pointer;" class="detail text-primary pull-left glyphicon glyphicon-triangle-bottom"></span><?php echo $baris->Kode_Bahan_Baku; ?>
				
		</td>
		<td align="center" style="padding-top:10px;"><?php echo $baris->Nama_Barang; ?></td>
		<td align="center" style="padding-top:10px;"><?php echo $baris->Isi.'  '.$baris->Nama_Satuan; ?></td>
		<td align="center" style="padding-top:10px;"><?php echo 'Rp. '.number_format($baris->Harga_Jual,0,",","."); ?></td>
		<td align="center" style="padding-top:10px;"><?php echo $baris->Scan; ?></td>
		<td align="center" style="padding-top:10px;"><?php echo date('Y-m-d',strtotime($baris->Tanggal_Update)); ?></td>
		<td align="center" style="padding-top:10px;">
		<a onclick="return confirm('Hapus Data Ke <?php echo $no; ?> ?')" href="<?php echo base_url('index.php/Barang/hapusbarang/'.$baris->Id); ?>"><span class="btn btn-danger btn-sm glyphicon glyphicon-trash" align="right"> Delete</span></a>
		</td>
		</tr>
		
		<tr>
			<td colspan="9" style="display:none;" class="datadetail">
				
		
	<div class="col-xs-12">
		<div class="Compose-Message">               
			<div class="panel panel-default" style="margin-bottom:0px;" >
				<div class="panel-heading" style="border:1px solid #008080;margin-bottom:-4px;background:#008080;">
                       
				<b style="color:white;">Detail Information Barang Jual</b>
				</div>
		<div class="panel-body" style="border:1px solid #008080">
				<table class="table">
					<tr>
						<td style="width:150px;">Kode Barang</td>
						<td style="width:5px;">:</td>
						<td><a href="<?php echo base_url('Control/lihatdetailbahanbaku/'.$baris->Kode_Bahan_Baku); ?>"><span class="glyphicon glyphicon-list-alt"> <b><?php echo $baris->Kode_Bahan_Baku; ?></b></span></a></td>
					</tr>
					<tr>
						<td>Nama Barang</td>
						<td>:</td>
						<td>
						<b><?php echo $baris->Nama_Barang; ?></b>
						<br>
						<br>
						<img width="200" height="200" <?php echo img('fotobahanbaku/'.$baris->Foto_Barang);?>
						</td>
					</tr>
					<tr>
						<td>Isi</td>
						<td>:</td>
						<td><?php echo $baris->Isi." ".$baris->Nama_Satuan; ?></td>
					</tr>
					<tr>
						<td>Harga Jual</td>
						<td>:</td>
						<td><?php echo 'Rp. '.number_format($baris->Harga_Jual,0,",","."); ?></td>
					</tr>
					<tr>
						<td>Scan Barcode</td>
						<td>:</td>
						<td><?php echo $baris->Scan; ?></td>
					</tr>
					
					<?php if($baris->Scan == "Scan"){?>
					<tr>
						<td>Code Barcode</td>
						<td>:</td>
						<td><span class="glyphicon glyphicon-barcode text-primary"> <b><?php echo $baris->Code_Barcode; ?></b></span></td>
					</tr>
					<?php }else{}?>
					
					<tr>
						<td>Nama Gudang</td>
						<td>:</td>
						<td><?php echo $baris->Nama_Gudang; ?></td>
					</tr>
					<tr>
						<td>Tanggal Update</td>
						<td>:</td>
						<td><?php echo date("d F Y H:i:s",strtotime($baris->Tanggal_Update)); ?></td>
					</tr>
				</table>
				
		</div>
		</div>
	</div>
	</div>
				
			</td>
		</tr>
		<?php
				$no++;
		}
		?>
</table>
	
<table id="table" class="table">
	<tr>
		<th>
Copyright &copy 2018 | Page rendered in <strong>{elapsed_time}</strong> seconds
		</th>
	</tr>
</table>

<center>
<h5 class="pull-left">
	<?php foreach($ent as $t){
		
	$b = $this->uri->segment('3') + 1;
		
		if($t->entri==null){
			$tt='0';
		}
		else{
			$tt=$t->entri;
		}
		
			echo 'Showing '.$totbaris.' on data to '.$b.' of '.$tt.' entries'; 
		}?>
	</h5>
	<br>
<br>
<div class="pull-left">
<?php echo $this->pagination->create_links();?>
</div>
</center>

</div>
</div>
<div class="container">
<!-- untuk Tambah Bahan Baku-->		
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" >
	  
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style="color:brown"><b>Tambah Data Barang</b></h3>
        </div>
		<div class="modal-body">
	<form class="form-signin" method="POST" action="<?php echo base_url();?>Barang/tambahbarang/" enctype="multipart/form-data">	
	<table class="table">

	<input type="hidden" class="form form-control" id="nms1">
	<input type="hidden" class="form form-control" id="nms2">
	<input type="hidden" class="form form-control" id="nms3">
	<input type="hidden" class="form form-control" id="nms4">
	
	<input type="hidden" class="form form-control" id="Isidefault_Lv2">
	<input type="hidden" class="form form-control" id="Isidefault_Lv3">
	<input type="hidden" class="form form-control" id="Isidefault_Lv4">
	<br>
	<input type="hidden" name="Isi_Default2" class="form form-control" id="qtydefault_Lv2">	
	<input type="hidden" name="Isi_Default3" class="form form-control" id="qtydefault_Lv3">	
	<input type="hidden" name="Isi_Default4" class="form form-control" id="qtydefault_Lv4">	
		<tr>
			<td style="width:80px;">Barang</td>
			<td>
			
			<input required type="hidden" name="Kode_Bahan_Baku" class='form-control' id="Kode_Bahan_Baku" placeholder="Barang" required>

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
		<tr>
			<td>Harga Jual</td>
			<td>
				<input required type="hidden" class="form form-control" id="hasilhargajual" name="Harga_Jual">
				<input required style="width:220px" type="text" class="form form-control" id="angka1" onkeyup="kompresharga();">
			</td>
		</tr>
		
		<tr>
			<td>Barcode</td>
			<td>
				<input required type="radio" id="scan" value="Scan" name="Scanbarcode"> Scan Barcode
				<br>
				<input required type="radio" id="tidak" value="Tidak" name="Scanbarcode"> Tidak
			</td>
		</tr>
		<tr style="display:none;" id="codebarcode">
			<td>Code Barcode</td>
			<td>
				<input style="width:220px" type="text" name="Code_Barcode" class="form form-control">
			</td>
		</tr>
		<tr>
			<td>Gudang</td>
			<td>
				<select required name="Kode_Gudang" style="width:270px" class="form form-control">
					<option></option>
						<?php foreach($gudang as $g){ ?>
					<option value="<?php echo $g->Kode_Gudang; ?>"><?php echo $g->Nama_Gudang; ?></option>
							
						<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><button style="margin-right:20px;width:40%;" class="glyphicon glyphicon-floppy-disk btn btn-primary pull-left"> Save</button>
				<button style="width:40%" type="reset" class="glyphicon glyphicon-remove btn btn-danger pull-left reset"> Reset</button>
			</td>
		</tr>
	</table>
	</form>
        </div>
		
	 </div>
	  </div>
 </div>
 </div>
  </body>
</html>

	