
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
 <link href="<?php echo base_url()?>assets/untukcssfoto/layout2.css" rel="stylesheet" type="text/css" media="all">   
<link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap-3.3.7-dist-1/bootstrap-3.3.7-dist/css/bootstrap.min.css">
  
 </head>

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


    function add_bahanbaku()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#myModal').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }

    function edit_bahanbaku(id)
    {
		 // $('#myModal').modal('show');
		//alert('helo');
      save_method = 'update';
     $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo base_url('Control/ajaxedit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="Kode_Bahan_Baku"]').val(data.Kode_Bahan_Baku);
            $('[name="Kode_Gudang"]').val(data.Kode_Gudang);
            $('[name="Nama_Barang"]').val(data.Nama_Barang);
            $('[name="Gambar_Lama"]').val(data.Foto_Barang);
			$('[name="Stok"]').val(data.Stok);
			$('[name="Satuan2"]').val(data.Satuan);
			$('[name="Isi"]').val(data.Isi);
			$('[name="Harga_Beli"]').val(data.Harga_Beli);
			$('[name="Harga_Jual"]').val(data.Harga_Jual);
			/////////////////////////////////////////
			$('#angka3').val(data.Harga_Beli);
			$('#angka4').val(data.Harga_Jual);


            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Book'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }
  </script>
  <script>
$(document).ready(function(){
// untuk satuan //
 $("#padat").click(function(){
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
    });
$("#berat").click(function(){
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
    });
$("#cair").click(function(){
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
    });
/////////////////
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
    
});
</script>
 <style type="text/css">
* {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

.item {
  border-radius:2%;
}
.item img {
  max-width: 100%;
  
  -moz-transition: all 0.3s;
  -webkit-transition: all 0.3s;
  transition: all 0.3s;
}
.item:hover img {
  -moz-transform: scale(1.4);
  -webkit-transform: scale(1.4);
  transform: scale(1.4);
}
</style>
<!-- sampe sini-->
 
  <script>
//jquery image
jQuery(document).ready(function(){
    jQuery('img').fadeTo('fast', 1);
        jQuery('img').hover(function() {
        jQuery(this).fadeTo('fast', 0.9); 
        }, function() { 
jQuery(this).fadeTo('fast', 1); 
    }); 
});
</script>
<script type='text/javascript' src='<?php echo base_url();?>assets/untukmoney/jqueryMaskmoney.min.js'></script>
  <script type="text/javascript">
	$(document).ready(function(){
		$('#angka11').maskMoney();
		$('#angka111').maskMoney({prefix:'US$'});
		$('#angka1').maskMoney({prefix:'Rp. ',thousands:'.',decimal:',',precision:0});
		$('#angka2').maskMoney({prefix:'Rp. ',thousands:'.',decimal:',',precision:0});
		$('#angka3').maskMoney({thousands:'.',decimal:',',precision:0});
		$('#angka4').maskMoney({thousands:'.',decimal:',',precision:0});
		
	})
  </script>
 

<script type="text/javascript">
$(document).ready(function(){   

    $("#refresh").click(function()
    {       
     $.ajax({
         type: "POST",
         url: base_url + "localhost/portofolioardi/index.php/Control/databahanbaku", 
        // data: {textbox: $("#textbox").val()},
        // dataType: "text",  
         cache:false,
        // success: 
              //function(data){
              //  alert(data);  //as a debugging message.
              //}

     return false;
 });
 });
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
<script type="text/javascript">
/*function ajaxnamenya(){
	$(document).ready(function(){
		var a = document.getElementById('angka3').value;
		document.getElementById('hasilnya').value = a;
			//$("#angka3").click(function(){
				//document.getElementById('hasilnya').maskMoney({thousands:'',decimal:'',precision:0}).value = a;
			//)}
	})
}
*/
$(document).ready(function(){

	/*
	var a = document.getElementById('satuan1').value;
	var b = document.getElementById('satuan2').value;
	var c = document.getElementById('satuan3').value;
	var d = document.getElementById('satuan4').value;
	var e = document.getElementById('satuan5').value;
	var f = document.getElementById('satuan6').value;
	///////////////////////////////////////////////////////////////
	var g = document.getElementById('satuan1edit').value;
	var h = document.getElementById('satuan2edit').value;
	var i = document.getElementById('satuan3edit').value;
	var j = document.getElementById('satuan4edit').value;
	var k = document.getElementById('satuan5edit').value;
	var l = document.getElementById('satuan6edit').value;
	*/
	///////////////////////////////////////////////////////////////

	///////////////////////////////////////////////////////////////
	$("#satuan1").click(function(){
		$("#hasilsatuan").val('/'+a);
	});
	$("#satuan2").click(function(){
		$("#hasilsatuan").val('/'+b);
	});
	$("#satuan3").click(function(){
		$("#hasilsatuan").val('/'+c);
	});
	$("#satuan4").click(function(){
		$("#hasilsatuan").val('/'+d);
	});
	$("#satuan5").click(function(){
		$("#hasilsatuan").val('/'+e);
	});
	$("#satuan6").click(function(){
		$("#hasilsatuan").val('/'+f);
	});
	//////////////////////////////////////////////////////////////
	$("#satuan1edit").click(function(){
		$("#hasilsatuanedit").val('/'+g);
	});
	$("#satuan2edit").click(function(){
		$("#hasilsatuanedit").val('/'+h);
	});
	$("#satuan3edit").click(function(){
		$("#hasilsatuanedit").val('/'+i);
	});
	$("#satuan4edit").click(function(){
		$("#hasilsatuanedit").val('/'+j);
	});
	$("#satuan5edit").click(function(){
		$("#hasilsatuanedit").val('/'+k);
	});
	$("#satuan6edit").click(function(){
		$("#hasilsatuanedit").val('/'+l);
	});
	//////////////////////////////////////////////////////////////
})
</script>
<script type="text/javascript">
function kompresharga(){
	var a = document.getElementById('angka1').value;
		document.getElementById('hasilhargabeli').value = a.split('.').join('').substr(3);
	var b = document.getElementById('angka2').value;
		document.getElementById('hasilhargajual').value = b.split('.').join('').substr(3);
	var c = document.getElementById('angka3').value;
		document.getElementById('hasilhargaeditbeli').value = c.split('.').join('');
}
function kompreshargaedit(){
	var d = document.getElementById('angka4').value;
		document.getElementById('hasilhargaeditjual').value = d.split('.').join('');
}
</script>
<script type="text/javascript">
$(document).ready(function(){
					//alert('oke');
				$('.satuan').focusout(function(){
						//($(this).parent().parent().find('#harga').val());
					//$('#total').val($('#total').val() + $(this).parent().parent().find('#harga').val() * $(this).val());
						//alert('out');
						//var a = $('#total').val();
						//var b = $(this).parent().parent().find('#harga').val();
						var c = $(this).val();

						//var a = a + b * c;
						document.getElementById('isisatuan').value=c;
				});
			});
</script>
<script type="text/javascript">

$(document).ready(function(){
	$("#clickconversi1").click(function(){
		$("#conversi2").slideDown();
	})
	
	$("#clickconversi2").click(function(){
		$("#conversi3").slideDown();
	})
	
	$("#clickconversi3").click(function(){
		$("#conversi4").slideDown();
	})
		
			
	$("#reset").click(function(){
		$("#conversi4").slideUp();
		$("#conversi3").slideUp();
		$("#conversi2").slideUp();
	})		
});
</script>	

  <script>
$(document).ready(function(){

$(document).on('click','.detail',function(){
				$(this).parent().parent().next().find('.datadetail').toggle();
				
			});
///////////////////////
});

</script>
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
			<div class="btn btn-primary glyphicon glyphicon-plus" onclick="add_bahanbaku()"><b> New</b></div>  
			<!--<input type="button" class="btn btn-alert glyphicon glyphicon-plus" value="refresh" id="refresh">-->
			<!--<div class="btn btn-primary glyphicon glyphicon-refresh" onclick="window.location.reload();"><b></b></div> --> 
		</div>
	</td>
</tr>
<tr>
<td style="align:left;">
<div class="navbar-header input-group">
	<form action="<?php print site_url();?>/Control/databahanbaku2" method=POST>
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
	<form action="<?php print site_url();?>/Control/caribahanbaku" method=POST>
		<div class="input-group pull-right">
		<input required name="caridatabahanbaku" style="margin:0px 0px 0px 0px; width:250px;" type="text" class='form-control' placeholder="Search Data...."/>
		<button class="btn btn-primary btn-bg glyphicon glyphicon-search" style="border-radius:0px 5px 5px 0px; margin-top:-1px; padding-top:6px;padding-left:8px;"></button>
		</div>
	</form>
	</td>
</tr>
</table>

<div class="col-xs-12">
		<table id="table" class="table">
			
		<tr bgcolor="#66CCFF">
			<th align="center" colspan="2"><b>Kode Barang</b></th>
			<th align="center"><b>Nama Barang</b></th>
			<th align="center"><b>Nama Gudang</b></th>
			<th align="center"><b>Status</b></th>
			<th align="center"><b>Tools</b></th>
		</tr>
		
		<?php 
		$no = $this->uri->segment('3') + 1;
		foreach($datatable as $baris){
			
		?>
		
		<tr>
		<td align="center" style="padding-top:15px;"><span style="padding-top:3px;cursor:pointer;" class="detail text-primary pull-left glyphicon glyphicon-triangle-bottom"></span></td>
		<td align="left" style="padding-top:15px;">
		<?php echo $baris->Kode_Bahan_Baku; ?>
		</td>
		
		<td align="left" style="padding-top:14px;"><?php echo $baris->Nama_Barang; ?></td>
		<td align="center" class="" style="padding-top:14px;"><?php echo $baris->Nama_Gudang; ?></td>
		
		<td align="center"><?php
		$lv1 = $baris->Lv1;
		
			if($lv1 > 5){
				echo "<b style='color:green;'>Stok Tersedia</b>";
				}else if($lv1 >= 5){
				echo "<b style='color:orange;'>Tambah Stok</b>";
				}else if($lv1 >= 1){
				echo "<b style='color:orange;'>Tambah Stok</b>";
				}else if($lv1 < 1){
				echo "<b style='color:red;'>Stok Tidak Tersedia</b>";
				}
						
		?></td>
		<td align="center" >
		<!--<a class="btn btn-sm btn-success" href="javascript:void(0)" title="Edit" onclick="edit_bahanbaku(<?php echo ""."'".$baris->Kode_Bahan_Baku."'"."";?>)"><i class="glyphicon glyphicon-edit"></i></a>
		-->
		<a onclick="return confirm('Hapus Data Dengan Kode Bahan Baku <?php echo $baris->Kode_Bahan_Baku; ?> ?')" href="<?php echo base_url('Control/hapusbahanbaku?Kode_Bahan_Baku='.$baris->Kode_Bahan_Baku); ?>"><span class="btn btn-danger btn-sm glyphicon glyphicon-trash" align="right"> Delete</span></a>
		</td>
		</tr>
		
		<tr>
			<td colspan="6" style="display:none;" class="datadetail">
				
		
	<div class="col-xs-12">
		<div class="Compose-Message">               
			<div class="panel panel-default" style="margin-bottom:0px;" >
				<div class="panel-heading" style="border:1px solid #008080;margin-bottom:-4px;background:#008080;">
                       
				<b style="color:white;">Detail Information Barang</b>
				</div>
		<div class="panel-body" style="border:1px solid #008080">
				<table class="table">
					<tr>
						<td style="width:150px;">Kode Barang</td>
						<td style="width:5px;">:</td>
						<td>
						<!--
						<a href="<?php echo base_url('Control/lihatdetailbahanbaku/'.$baris->Kode_Bahan_Baku); ?>"><span class="glyphicon glyphicon-list-alt"> <?php echo $baris->Kode_Bahan_Baku; ?></span></a>
						-->
						<b><?php echo $baris->Kode_Bahan_Baku; ?></b>
						</td>
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
						<td>Nama Gudang</td>
						<td>:</td>
						<td><?php echo $baris->Nama_Gudang; ?></td>
					</tr>
					<tr>
						<td>Stok</td>
						<td>:</td>
						<td>
							<?php
								$nmlv1 = $baris->Name_Lv1;
								//$nmlv2 = $baris->Name_Lv2;
								//$nmlv3 = $baris->Name_Lv3;
								//$nmlv4 = $baris->Name_Lv4;
								
								
								if($nmlv1){
									$stok1 = $baris->Lv1.' '.$nmlv1;
								}else{
									$stok1 = " ";
								}
								
								echo $stok1;
							?>
						</td>
					</tr>
					<!--
					<tr>
						<td>Stok</td>
						<td>:</td>
						<td>
							<?php/*
								$nmlv1 = $baris->Name_Lv1;
								$nmlv2 = $baris->Name_Lv2;
								$nmlv3 = $baris->Name_Lv3;
								$nmlv4 = $baris->Name_Lv4;
								
								
								if($nmlv1){
									$stok1 = $baris->Lv1.' '.$nmlv1;
								}else{
									$stok1 = " ";
								}
								if($nmlv2){
									$stok2 = $baris->Isi_Lv2.' '.$nmlv2;
								}else{
									$stok2 = " ";
								}
								if($nmlv3){
									$stok3 = $baris->Isi_Lv3.' '.$nmlv3;
								}else{
									$stok3 = " ";
								}
								if($nmlv4){
									$stok4 = $baris->Isi_Lv4.' '.$nmlv4;
								}else{
									$stok4 = " ";
								}
								echo $stok1.'<br>'.$stok2.'<br>'.$stok3.'<br>'.$stok4;
							*/?>
						</td>
					</tr>
					-->
					<tr>
						<td>Isi Default</td>
						<td>:</td>
						<td>
							<?php
								$nmlv1 = $baris->Name_Lv1;
								$nmlv2 = $baris->Name_Lv2;
								$nmlv3 = $baris->Name_Lv3;
								$nmlv4 = $baris->Name_Lv4;
								
								
								if($nmlv1){
									$stok1 = $baris->Isi_Lv1.' '.$nmlv1;
								}else{
									$stok1 = " ";
								}
								if($nmlv2){
									$stok2 = '1 '.$nmlv1.' Isi '.$baris->Lv2.' '.$nmlv2;
								}else{
									$stok2 = " ";
								}
								if($nmlv3){
									$stok3 = '1 '.$nmlv2.' Isi '.$baris->Lv3.' '.$nmlv3;
								}else{
									$stok3 = " ";
								}
								if($nmlv4){
									$stok4 = '1 '.$nmlv3.' Isi '.$baris->Lv4.' '.$nmlv4;
								}else{
									$stok4 = " ";
								}
								echo $stok1.'<br>'.$stok2.'<br>'.$stok3.'<br>'.$stok4;
							?>
						</td>
					</tr>
					<tr>
						<td>Status</td>
						<td>:</td>
						<td>
							<?php
								$lv1 = $baris->Lv1;
								
									if($lv1 > 5){
										echo "<b style='color:green;'>Stok Tersedia</b>";
										}else if($lv1 >= 5){
										echo "<b style='color:orange;'>Tambah Stok</b>";
										}else if($lv1 >= 1){
										echo "<b style='color:orange;'>Tambah Stok</b>";
										}else if($lv1 < 1){
										echo "<b style='color:red;'>Stok Tidak Tersedia</b>";
										}
												
								?>
						</td>
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
</div>
<div class="container">
<!-- untuk Tambah Bahan Baku-->		
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
	  
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 style="color:brown"><b>Tambah Data Barang</b></h2>
        </div>
<div class="modal-body">
    <form class="form-signin" method="POST" action="<?php echo base_url();?>Control/tambahbahanbaku/" enctype="multipart/form-data">
	<table class="table table-bordered table responsive">
		<tr>
			<td class="col-lg-4" style="padding-left:1px;"><p class="pull-left">&nbsp &nbsp Kode Barang</p></td>
			<td colspan="2">
			<input required type="text" name="Kode_Bahan_Baku" class="form-control">
			<!--<div id="tooltip" data-title="dfdsfd" style="align:right;"><span style="color:blue;"class="glyphicon glyphicon-question-sign"></div></span>
			-->
			</td>
		</tr>
		<tr>
			<td><p class="pull-left">&nbsp Gudang</p></td>
			<td colspan="2">
				<select class="form-control" name="Kode_Gudang" required>
            			<option></option>
						<?php 
						foreach ($gdng as $gudang) {
						?>
            			<option value="<?php echo $gudang->Kode_Gudang; ?>"><?php echo $gudang->Nama_Gudang; ?>
						</option>
            			
						<?php
						}
						?>
      				</select>
				</td>
		</tr>
		<tr>
			<td><p class="pull-left">&nbsp Nama Barang</p></td>
			<td colspan="2">
				<input required type="text" name="Nama_Barang" class="form-control"></td>
		</tr>
		<tr>
			<td><p class="pull-left">&nbsp Foto Barang</p></td>
			<td colspan="2">
				<input required type="file" name="Foto_Barang" class="form-control" class="input-medium">
			</td>
		</tr>
		
		<!-- lv -->
		<tr style="background:#DDDDDD">
			<td colspan="" align="center"><b>Conversion Unit</b></td>
			<td colspan="2" align="center"><b>Default Unit</b></td>
		</tr>
		<tr id="conversi1">
			<td><p class="pull-left">&nbsp Conversion </p></td>
			<td style="border-right:none;">
				<div class="input-group">
				<input type="text" style="width:35%" name="Lv1" placeholder="Qty Default" class="form-control">
					<select style="width:55%;margin-left:20px;" class="form-control" name="Name_Lv1">
            			<option></option>
						<?php 
						foreach ($satuan as $listsatuan) {
						?>
            			<option><?php echo $listsatuan->Satuan_Bahan_baku ?>
						</option>
            			
						<?php
						}
						?>
      				</select>
				</div>
				
			</td>
			<td style="border-left:none;"><span title="Conversion" id="clickconversi1"class="pull-right btn btn-default glyphicon glyphicon-arrow-down"></span>
			</td>
		</tr>
		<tr style="display:none;" id="conversi2">
			<td><p class="pull-left">&nbsp Conversion</p></td>
			<td style="border-right:none;">
				<div class="input-group">
				<input type="text" style="width:35%" name="Lv2" placeholder="Qty Default" class="form-control">
					<select style="width:55%;margin-left:20px;" class="form-control" name="Name_Lv2">
            			<option></option>
						<?php 
						foreach ($satuan as $listsatuan) {
						?>
            			<option><?php echo $listsatuan->Satuan_Bahan_baku ?>
						</option>
            			
						<?php
						}
						?>
      				</select>
				</div>
			</td>
			<td style="border-left:none;">
				<span title="Conversion" id="clickconversi2" class="btn btn-default glyphicon glyphicon-arrow-down"></span>
			</td>
		</tr>
		<tr style="display:none;" id="conversi3">
			<td><p class="pull-left">&nbsp Conversion</p></td>
			<td style="border-right:none;">
				<div class="input-group">
				<input type="text" style="width:35%" name="Lv3" placeholder="Qty Default" class="form-control">
					<select style="width:55%;margin-left:20px;" class="form-control" name="Name_Lv3">
            			<option></option>
						<?php 
						foreach ($satuan as $listsatuan) {
						?>
            			<option><?php echo $listsatuan->Satuan_Bahan_baku ?>
						</option>
            			
						<?php
						}
						?>
      				</select>
				</div>
			</td>
			<td style="border-left:none;">
				<span title="Conversion" id="clickconversi3" class="btn btn-default glyphicon glyphicon-arrow-down"></span>
			</td>
		</tr>
		<tr style="display:none;" id="conversi4">
			<td><p class="pull-left">&nbsp Conversion</p></td>
			<td style="border-right:none;">
				<div class="input-group">
				<input type="text" style="width:35%" name="Lv4" placeholder="Qty Default" class="form-control">
					<select style="width:55%;margin-left:20px;" class="form-control" name="Name_Lv4">
            			<option></option>
						<?php 
						foreach ($satuan as $listsatuan) {
						?>
            			<option><?php echo $listsatuan->Satuan_Bahan_baku ?>
						</option>
            			
						<?php
						}
						?>
      				</select>
				</div>
			</td>
			<td style="border-left:none;">
				<span title="No Conversion" class="btn btn-default glyphicon glyphicon-minus"></span>
			</td>
		</tr>
		<!--
		<tr>
			<td><p class="pull-left">&nbsp Level 5</p></td>
			<td>
				<div class="input-group">
				<input type="text" style="width:40%" name="Lv5" placeholder="Qty Default" class="form-control">
					<select style="width:50%;margin-left:20px;" class="form-control" name="Name_Lv5">
            			<option></option>
						<?php 
						foreach ($satuan as $listsatuan) {
						?>
            			<option><?php echo $listsatuan->Satuan_Bahan_baku ?>
						</option>
            			
						<?php
						}
						?>
      				</select>
				</div>
			</td>
		</tr>
		-->
		<!-- lv -->
      
	</table>
	<legend></legend>
	<center>
			<input type="submit" onclick="return confirm('Anda Yakin Ingin Menyimpan Data Ini..??')" value="Save" class="btn btn-success">
            <input type="reset" id="reset" name="reset" value="Reset" class="btn btn-warning">
			<input type="button" class="btn btn-danger" data-dismiss="modal" value="Close">
	</center>
	</form>
        </div>
		
	 </div>
	  </div>
 </div>
 </div>
  <!-- Bootstrap modal -->



  <!-- Bootstrap modal edit -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <h2 style="color:brown"><b>Edit Data Bahan Baku</b></h2>
      </div>
      <div class="modal-body form">
        <form class="form-horizontal" id="form" method="POST" action="<?php echo base_url();?>Control/editbahanbakubarang/" enctype="multipart/form-data">
          <input type="hidden" value="" name="book_id"/>
          <div class="form-body">
          <table class="table table-bordered table responsive">
		<tr>
			<td><p class="pull-left">&nbsp Kode Bahan Baku</p></td>
			<td>
		
			<input required readonly="readonly" type="text" name="Kode_Bahan_Baku" class="form-control  placeholder="Kode Bahan Baku">
		</td>
		</tr>
		<tr>
			<td><p class="pull-left">&nbsp Gudang</p></td>
			<td>
				<select class="form-control" name="Kode_Gudang" required>
            			<option value="">Nama Gudang
						<?php 
						foreach ($gdng as $gudang) {
						?>
            			<option value="<?php echo $gudang->Kode_Gudang; ?>"><?php echo $gudang->Nama_Gudang; ?></option>
            			
						<?php
						}
						?>
      				</select>
			</td>
		</tr>
		<tr>
			<td><p class="pull-left">&nbsp Nama Barang</p></td>
			<td>
				<input required type="text" name="Nama_Barang" class="form-control" placeholder="Nama Barang"></td>
		</tr>
		<tr>
			<td><p class="pull-left">&nbsp Foto Bahan Baku</p></td>
			<td>
				<input required type="radio" id="ubahfile" name="Ubah_Gambar" value="Ubah"><b>&nbsp Edit File</b> 
				<input required type="radio" id="tidakubah" name="Ubah_Gambar" value="Tidak"><b>&nbsp No Edit File</b>
				
				<input type="hidden" name="Gambar_Lama" class="form-control">
				
				<div id="file" style="display:none;">
				<input type="file" name="Foto_Barang" class="form-control input-medium">
				<br>
				<small style="color:green;" class="pull-left">** Jenis File Tidak Lebih Dari 2 Mb</small>
				</div>
				
			</td>
		</tr>
		<tr>
			<td><p class="pull-left">&nbsp Stok</p></td>
			<td>
				<input required type="text" name="Stok" style="width:250px;" class="form-control" placeholder="Stok Barang"></td>
		</tr>
		<tr>
			<td><p class="pull-left">&nbsp Satuan</p></td>
			<td>
				<?php foreach($satuan as $sat){ ?>
				<input required class="pull-left" type="radio" name="Satuan" value="<?php echo $sat->Id_Satuan; ?>"><b class="pull-left">&nbsp <?php echo $sat->Satuan_Bahan_baku; ?></b>
				<br>
				<?php } ?>
			</td>
		</tr>
		<tr>
			<td><p class="pull-left">&nbsp Isi / Satuan</p></td>
			<td>
				<input required type="text" name="Isi" style="width:250px;"  class="form-control" placeholder="Isi">
				<!--<input type="text" style="width:80px;border-left:none;" value="Pcs" readonly="readonly" class="form-control"> -->
			
				</td>
		</tr>
		<tr>
			<td><p class="pull-left">&nbsp Harga Beli</p></td>
			<td><input type="hidden" name="Harga_Beli" id="hasilhargaeditbeli">
			<div class="input-group">
				<input type="text" readonly="readonly" style="width:50px;border-right:0px;" class='form-control' placeholder="Rp. "/>
				<input required type="text" onkeyup="kompresharga()"  class="form-control" id="angka3" style="border-radius:0px 5px 5px 0px; margin-top:0px; padding-top:6px;padding-left:8px;width:200px;border-left:0px;">
			</div>
				
				</td>
		</tr>
		<!--<tr>
			<td><p class="pull-left">&nbsp Harga Jual</p></td>
			<td>
				<input type="hidden" name="Harga_Jual" id="hasilhargaeditjual">
				<div class="input-group">
				<input type="text" readonly="readonly" style="width:50px;border-right:0px;" class='form-control' placeholder="Rp. "/>
				<input required type="text" onkeyup="kompreshargaedit()"  class="form-control" id="angka4" style="border-radius:0px 5px 5px 0px; margin-top:0px; padding-top:6px;padding-left:8px;width:200px;border-left:0px;">
			</div>
				</td>
		</tr>
		-->
          
	</table>

          </div>
		  <center>
		    <input type="submit" onclick="return confirm('Anda Yakin Ingin Update Data Ini..??')" value="Update" class="btn btn-success">
            <input type="reset" value="Reset" class="btn btn-warning">
			 <input type="button" class="btn btn-danger" data-dismiss="modal" value="Close">
        </center>
		</form>
          </div>
          <div class="modal-footer">
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->
  </body>
</html>

	