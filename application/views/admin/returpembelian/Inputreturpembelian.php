<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
 <link href="<?php echo base_url()?>assets/untukcssfoto/layout2.css" rel="stylesheet" type="text/css" media="all">   
<link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap-3.3.7-dist-1/bootstrap-3.3.7-dist/css/bootstrap.min.css">
  
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
                serviceUrl: site+'/ReturPembelian/cariautobahanbaku',
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
	<!-- scrip togle -->
	
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


    function add_retur()
    {
      save_method = 'add';
      //$('#form')[0].reset(); // reset form on modals
      $('#myModal').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
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
				document.getElementById('hasilbiaya').value = a.split('.').join('').substr(3);
		}

	</script>

	<script type="text/javascript">
	function sum(){
		var a = document.getElementById('Qty').value;
		var b = document.getElementById('Stok2').value;
		var result = parseInt(b) - parseInt(a);
		
		if(!isNaN(result)){
		 document.getElementById('Stok').value = result;
			
		}else{
			document.getElementById('Stok').value = b;
		}
	}

	</script>
<script>
$(document).ready(function(){
$("#selesai").click(function(){
	$("#dataretur").toggle();
})
})
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
<a href="<?php echo base_url('ReturPembelian/index');?>" class="btn btn-danger glyphicon glyphicon-chevron-left"> Back</a>
<br>
<br>
<legend>
</legend>
	<form class="form-signin" method="POST" action="<?php echo base_url();?>ReturPembelian/tambahreturpembelian/" enctype="multipart/form-data">
	
	<table>
		<tr>
			<td>
				<h3 style="width:300px">Retur Barang</h3>
				</td>
			<td  align="right">
	
			<div class="input-group col-md-10" style="width:300px" >
				No. Retur : <div class="input-group"> <input type="text" name="No_Retur" class="form-control" value="<?php echo $noretur; ?>" readonly="readonly">
				<span class="input-group-addon"><span class="glyphicon glyphicon-barcode"></span></span>
				</div>
			</div>
			</td>
			<td align="left">
				<div class="input-group col-md-10" style="width:300px">
						Tanggal Retur
						<div class="input-group">
								<input class="form-control" type="text" name="Tanggal_Retur" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('d F Y');?>" readonly="readonly">
							   
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
						</div>
				</div>
			
			</td>
		</tr>
		
	</table>
	
	<table class="table" style="display:;" id="dataretur">
		<tr style="background:#DDDDDD;">
			<td style="width:80px;">KP. Gudang</td>
			<td >
				<input type="hidden" name="Kode_User" class="form-control" value="<?php echo $this->session->userdata['Kode_User']; ?>">
				<input type="text" class="form-control" value="<?php echo $this->session->userdata['Username']; ?>" readonly="readonly">
			</td>
			<td style="vertical-align:bottom;">
				Keterangan : 
			</td>
			
		</tr>
		<tr style="background:#DDDDDD;">
			<td style="width:80px;">Supplier</td>
			<td style="width:300px;">
				<select required name="Kode_Supplier" class="form form-control">
					<option></option>
					<?php foreach($supplier as $sp){?>
					<option value="<?php echo $sp->Kode_Supplier; ?>"><?php echo $sp->Nama_Supplier.' - '.$sp->Deskripsi; ?></option>
					<?php } ?>
				</select>
			</td>
			<td rowspan="4" style="vertical-align:top;">
				<textarea required name="Keterangan" style="width:100%;height:135px;" class="form form-fontrol"></textarea>
			</td>
			
		</tr>
		<tr style="background:#DDDDDD;">
			<td style="width:100px;">Biaya Retur</td>
			<td>
				<input required type="hidden" value="0" id="hasilbiaya" name="Biaya_Retur" class="form-control">
				<input type="text" onkeyup="kompresharga();" value="0" id="angka1" class="form-control">
			</td>
			
		</tr>
		<tr style="background:#DDDDDD;">
			<td style="width:100px;">Status</td>
			<td>
				<input type="text" name="Status" value="Retur" readonly="readonly" class="form-control">
			</td>
			
		</tr>
		<tr style="background:#DDDDDD;">
			<td></td>
			<td colspan="2">
			<button class="glyphicon glyphicon-floppy-disk btn btn-primary pull-right"> <b>Save</b></button>
			
			<span style="margin-right:20px;" onclick="add_retur()" class="btn btn-success glyphicon glyphicon-plus pull-right"> Retur</span>
			</td>
		</tr>
	</table>
	</form>
	
	<!-- Modal -->
	<div class="container">
<!-- untuk Tambah Bahan Baku-->		
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
	  
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style="color:brown"><b>Tambah Retur</b></h3>
        </div>
<div class="modal-body">

	<form class="form-signin" method="POST" action="<?php echo base_url();?>ReturPembelian/tambahreturpembeliandetail/" enctype="multipart/form-data">
	<table>
	<input type="hidden" name="No_Retur" class="form-control" value="<?php echo $noretur; ?>" readonly="readonly">
	<input type="hidden" name="Id_Detail" class="form-control" value="<?php echo $iddetail; ?>" readonly="readonly">
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
	</table>
	
	<legend></legend>
	<center>
			<input type="submit" value="Save" class="btn btn-success">
            <input type="reset" name="reset" value="Reset" class="btn btn-warning reset">
			<input type="button" class="btn btn-danger" data-dismiss="modal" value="Close">
	</center>
	</form>
        </div>
		
	 </div>
	  </div>
 </div>
 </div>
	<!-- Modal -->
	
	
	
	<table style="margin-top:0px;" id="table" class="table table-bordered table responsive">
			
		<tr>
			<th style="align:center;"><b>No.</b></th>
			<th align="center"><b>Kode Barang</b></th>
			<th align="center"><b>Nama Barang</b></th>
			<th align="center"><b>Qty</b></th>
			<th align="center"><b>Status</b></th>
			<th align="center"><b>Tools</b></th>
		</tr>
		
		<?php 
		$no = 1;
		foreach($datadetailbantu as $baris){
		?>
	<tr>
		<td align="center" ><?php echo $no; ?></td>
		<td align="center" ><?php echo $baris->Kode_Bahan_Baku; ?></td>
		<td align="center" ><?php echo $baris->Nama_Barang; ?></td>
		<td align="left" ><?php echo $baris->Qty.' '.$baris->Nama_Satuan; ?></td>
		<td align="center" >Retur</td>
		<td align="center" >
		<a onclick="return confirm('Hapus Data Ini..?')" href="<?php echo base_url('ReturPembelian/hapusdetailreturpembelian/'.$baris->Id_Detail); ?>"><span class="btn btn-danger btn-sm glyphicon glyphicon-trash" align="right"> Delete</span></a>
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

  <!-- Bootstrap modal -->
  
  </body>
</html>

	