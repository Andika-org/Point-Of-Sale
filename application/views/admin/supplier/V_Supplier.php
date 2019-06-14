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


    function add_supplier()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#myModal').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }

    function edit_supplier(id)
    {
		 // $('#myModal').modal('show');
		//alert('helo');
      save_method = 'update';
     $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo base_url('Supplier/ajaxedit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="Kode_Supplier"]').val(data.Kode_Supplier);
            $('[name="Nama_Supplier"]').val(data.Nama_Supplier);
            $('[name="Deskripsi"]').val(data.Deskripsi);
            $('[name="Alamat"]').val(data.Alamat);
            $('[name="Telepon"]').val(data.Telepon);
			$('[name="Email"]').val(data.Email);


            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Book'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }
	
	 function detail_supplier(id)
    {
		 // $('#myModal').modal('show');
		//alert('helo');
      save_method = 'update';
     $('#formdetail')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo base_url('Supplier/ajaxedit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('#Nama_Supplier').val(data.Nama_Supplier);
            $('#Deskripsi').val(data.Deskripsi);
            $('#Alamat').val(data.Alamat);
            $('#Telepon').val(data.Telepon);
			$('#Email').val(data.Email);


            $('#modal_formdetail').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Book'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
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
	<h2 style="color:brown" align="center"><b>Data Supplier</b></h2>
	<legend>
	</legend>
	

<table>
<tr>
	<td>
		<div class="navbar-header">
			<div class="btn btn-primary glyphicon glyphicon-plus" onclick="add_supplier()"><b> New</b></div>  
			<!--<div class="btn btn-primary glyphicon glyphicon-refresh" onclick="window.location.reload();"><b></b></div> --> 
		</div>
	</td>
</tr>
<tr>
<td style="align:left;">
<div class="navbar-header">
	<form action="<?php print site_url();?>/Supplier/index2" method=POST>
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
	<form action="<?php print site_url();?>/Supplier/carisupplier" method=POST>

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
			<th align="center"><b>No.</b></th>
			<th align="center"><b>Nama Supplier</b></th>
			<th align="center"><b>Deskripsi Supplier</b></th>
			<th align="center"><b>Telepon</b></th>
			<th align="center"><b>Email</b></th>
			<th align="center"><b>Tools</b></th>
		</tr>
		
		<?php 
		$no = $this->uri->segment('3') + 1;
		foreach($datatable as $baris){
			
		?>
		
		<tr>
		<td align="center" style="padding-top:10px;"><?php echo $no; ?></td>
		<td align="left" style="padding-top:10px;">
			<a href="javascript:void(0)" title="Detail" onclick="detail_supplier(<?php echo ""."'".$baris->Kode_Supplier."'"."";?>)">
			<span class="glyphicon glyphicon-open-file"></span>
			<?php echo $baris->Nama_Supplier; ?>
			</a>
				
		</td>
		<td align="center" style="padding-top:10px;"><?php echo $baris->Deskripsi; ?></td>
		<td align="center" style="padding-top:10px;"><?php echo $baris->Telepon; ?></td>
		<td align="center" style="padding-top:10px;"><?php echo $baris->Email; ?></td>
		<td align="center" style="padding-top:10px;">
		<a class="btn btn-sm btn-success" href="javascript:void(0)" title="Edit" onclick="edit_supplier(<?php echo ""."'".$baris->Kode_Supplier."'"."";?>)"><i class="glyphicon glyphicon-edit"></i></a>
		<a title="Delete" onclick="return confirm('Hapus Data Dengan Kode Supplier <?php echo $baris->Kode_Supplier; ?> ?')" href="<?php echo base_url('index.php/Supplier/hapussupplier?Kode_Supplier='.$baris->Kode_Supplier); ?>"><span class="btn btn-danger btn-sm glyphicon glyphicon-trash" align="right"></span></a>
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
<!-- untuk Tambah Supplier-->		
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
	  
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 style="color:brown"><b>Tambah Data Supplier</b></h2>
        </div>
<div class="modal-body">
          <form class="form-signin" method="POST" action="<?php echo base_url();?>Supplier/tambahsupplier/" enctype="multipart/form-data">
	<table class="table table-bordered table responsive">
	
			<input required type="hidden" name="Kode_Supplier" class="form-control" value="<?php echo $sup;?>" readonly="readonly">
			<!--<div id="tooltip" data-title="dfdsfd" style="align:right;"><span style="color:blue;"class="glyphicon glyphicon-question-sign"></div></span>
			-->
		<tr>
			<td>Nama Supplier</td>
			<td>
				<input required type="text" name="Nama_Supplier" class="form-control" placeholder="Nama Supplier"></td>
		</tr>
		<tr>
			<td>Deskripsi Supplier</td>
			<td>
				<textarea required type="text" name="Deskripsi" class="form-control"></textarea></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>
				<textarea required type="text" name="Alamat" class="form-control"></textarea></td>
		</tr>
		<tr>
			<td>Telepon</td>
			<td>
				<input required type="text" name="Telepon" class="form-control" placeholder="Telepon"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td>
				<input required type="text" name="Email" class="form-control" placeholder="Email"></td>
		</tr>
		   
	</table>
	<legend></legend>
	<center>
	  <input type="submit" onclick="return confirm('Anda Yakin Ingin Menyimpan Data Ini..??')" name="submit" value="Save" class="btn btn-success">
            <input type="reset" name="reset" value="Reset" class="btn btn-warning">
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
       <h2 style="color:brown"><b>Edit Data Supplier</b></h2>
      </div>
      <div class="modal-body form">
        <form class="form-horizontal" id="form" method="POST" action="<?php echo base_url();?>Supplier/editsupplier/" enctype="multipart/form-data">
          <input type="hidden" value="" name="book_id"/>
          <div class="form-body">
          <table class="table table-bordered table responsive">
		
			<input required type="hidden" name="Kode_Supplier" class="form-control" readonly="readonly">
			<!--<div id="tooltip" data-title="dfdsfd" style="align:right;"><span style="color:blue;"class="glyphicon glyphicon-question-sign"></div></span>
			-->
		<tr>
			<td>Nama Supplier</td>
			<td>
				<input required type="text" name="Nama_Supplier" class="form-control" placeholder="Nama Supplier"></td>
		</tr>
		<tr>
			<td>Deskripsi Supplier</td>
			<td>
				<textarea required type="text" name="Deskripsi" class="form-control"></textarea></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>
				<textarea required type="text" name="Alamat" class="form-control"></textarea></td>
		</tr>
		<tr>
			<td>Telepon</td>
			<td>
				<input required type="text" name="Telepon" class="form-control" placeholder="Telepon"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td>
				<input required type="text" name="Email" class="form-control" placeholder="Email"></td>
		</tr>
		
          
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
  
  <!-- Bootstrap modal detail -->
  <div class="modal fade" id="modal_formdetail" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <h2 style="color:brown"><b>Detail Data Supplier</b></h2>
      </div>
      <div class="modal-body form">
        <form class="form-horizontal" id="formdetail" method="POST" action="<?php echo base_url();?>Supplier/editsupplier/" enctype="multipart/form-data">
          <input type="hidden" value="" name="book_id"/>
          <div class="form-body">
          <table class="table table-bordered table responsive">
		
			
		<tr>
			<td>Nama Supplier</td>
			<td>
				<input required type="text" readonly="readonly" id="Nama_Supplier" class="form-control"></td>
		</tr>
		<tr>
			<td>Deskripsi Supplier</td>
			<td>
				<textarea required type="text" readonly="readonly" id="Deskripsi" class="form-control"></textarea></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>
				<textarea required type="text" readonly="readonly" id="Alamat" class="form-control"></textarea></td>
		</tr>
		<tr>
			<td>Telepon</td>
			<td>
				<input required type="text" readonly="readonly" id="Telepon" class="form-control" placeholder="Telepon"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td>
				<input required type="text" readonly="readonly" id="Email" class="form-control" placeholder="Email"></td>
		</tr>
		
          
	</table>

          </div>
		 
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

	