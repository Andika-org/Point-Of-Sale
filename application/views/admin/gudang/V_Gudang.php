<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
 <link href="<?php echo base_url()?>assets/untukcssfoto/layout2.css" rel="stylesheet" type="text/css" media="all">   
<link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap-3.3.7-dist-1/bootstrap-3.3.7-dist/css/bootstrap.min.css">
  
 </head>
<script type="text/javascript"> 
	$(document).ready( function () { 

	$("#addlist").click( function() {

	   $("#list").append('<div class="form-group" id="datalist">'
				+'<input required type="text" class="form form-control" name="Nama_Gudang[]">'
				
			
				+'</div>');

	        return false;
			
	    });	
			$('#remove').click( function() {
	    $('#datalist').remove();
	    return false;
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


    function add_gudang()
    {
      save_method = 'add';
    //  $('#form')[0].reset(); // reset form on modals
      $('#myModal').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }

   /* function edit_satuanbahanbaku(id)
    {
		 // $('#myModal').modal('show');
		//alert('helo');
      save_method = 'update';
     $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo base_url('SatuanBahanBaku/ajaxedit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="Id_Satuan"]').val(data.Id_Satuan);
            $('[name="Satuan_Bahan_Baku"]').val(data.Satuan_Bahan_Baku);

            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Book'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }
	*/
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
	
}
#table, th, td{
	padding:8px 20px;
	text-align:center;
}
#table tr:nth-child(even){
	background-color:#DDDDDD;
}
 </style>

</head>
<body>

<div class="col-xs-12">
<div class="col-xs-11 pull-right" style="padding-left:120px;"> 
	<h2 style="color:brown" align="center"><b>Data Gudang</b></h2>
	<legend>
	</legend>

<table>
<tr>
	<td>
		<div class="navbar-header">
			<div class="btn btn-primary glyphicon glyphicon-plus" onclick="add_gudang()"><b> New</b></div>  
			<!--<input type="button" class="btn btn-alert glyphicon glyphicon-plus" value="refresh" id="refresh">-->
			<!--<div class="btn btn-primary glyphicon glyphicon-refresh" onclick="window.location.reload();"><b></b></div> --> 
		</div>
	</td>
</tr>
<tr>
<td style="align:left;">
<div class="navbar-header input-group">
	<form action="<?php print site_url();?>/Gudang/index" method=POST>
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
	<form action="<?php print site_url();?>/Gudang/carigudang" method=POST>
		<div class="input-group">
		<input required name="caridatagudang" style="margin:0px 0px 0px 0px; width:250px;" type="text" class='form-control' placeholder="Search Data...."/>
		<button class="btn btn-primary btn-bg glyphicon glyphicon-search" style="border-radius:0px 5px 5px 0px; margin-top:-1px; padding-top:6px;padding-left:8px;"></button>
		</div>
	</form>
	</td>
</tr>
</table>
<div class="col-xs-6">
		<table id="table" class="table">
			
		<tr bgcolor="#66CCFF">
			
			<th align="center"><b>Nama Gudang</b></th>
			<th align="center"><b>Tools</b></th>
		</tr>
		
		<?php 
		
		foreach($datatable as $baris){	
		?>
		
		<tr>
		<td align="center" style="padding-top:15px;" ><?php echo $baris->Nama_Gudang;?></td>
		<td align="center" >
		<a onclick="return confirm('Hapus Data <?php echo $baris->Nama_Gudang; ?> ?')" href="<?php echo base_url('Gudang/hapus/'.$baris->Kode_Gudang); ?>"><span class="btn btn-danger btn-sm glyphicon glyphicon-trash" align="right"> Delete</span></a>
		</td>
		</tr>
		<?php
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
  <div class="modal fade" id="myModal" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" >
	  
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style="color:brown"><b>Tambah Data Gudang</b></h3>
        </div>
<div class="modal-body " style="height:600px;">
	
         <form class="form-signin" method="POST" action="<?php echo base_url();?>Gudang/tambahgudang/" enctype="multipart/form-data">
				
			<div id="list" class="col-xs-6" style="background-color:white;">
			
			</div>
			<div class="col-xs-6">
				<div class="form-group">
					<input type="button" value="Add Gudang" id="addlist" class="form-control btn btn-primary">
				</div>
				<div class="form-group">
					<input type="reset" value="Reset" id="remove" class="form-control btn btn-warning">
				</div>
				<div class="form-group">
					<input type="submit" onclick="return confirm('Anda Yakin Ingin Menyimpan Data Ini..??')" name="submit" value="Save" class="btn btn-success form-control">
				</div>
			</div>	
	
		</form>
        </div>
		
	 </div>
	  </div>
 </div>
 </div>
  <!-- Bootstrap modal -->

  </body>
</html>

	