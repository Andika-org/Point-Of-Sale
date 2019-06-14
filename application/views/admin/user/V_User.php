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


    function add_user()
    {
      save_method = 'add';
     // $('#form')[0].reset(); // reset form on modals
      $('#myModal').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }

	
	 function detail_user(id)
    {
		 // $('#myModal').modal('show');
		//alert('helo');
      save_method = 'update';
     $('#formdetail')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo base_url('User/ajaxedit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {	
			$('#No_Identitas').val(data.No_Identitas);
			$('#Nama').val(data.Nama);
            $('#Username').val(data.Username);
            $('#Pass').val(data.Pass);
            $('#Hak_Akses').val(data.Hak_Akses);
			$('#Jenis_Kelamin').val(data.Jenis_Kelamin);
			$('#Phone').val(data.Phone);
			$('#Contact').val(data.Contact);


            $('#modal_formdetail').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Book'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }

	///
	 function detail_supplier(idsupplier)
    {
		 // $('#myModal').modal('show');
		//alert('helo');
      save_method = 'update';
     $('#formdetailsupplier')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo base_url('User/ajaxeditsupplier/')?>/" + idsupplier,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {	
			$('#Kode_Supplier').val(data.Kode_Supplier);
			$('#Nama_Supplier').val(data.Nama_Supplier);
            $('#Deskripsi').val(data.Deskripsi);
            $('#Alamat').val(data.Alamat);
            $('#Telepon').val(data.Telepon);
			$('#Email').val(data.Email);


            $('#modal_formdetailsupplier').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Book'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }
  </script>
<script type="text/javascript">
  $(document).ready( function () {
	   $('#admin').click(function(){
		   $('#datasupplier').slideUp();
	  });
	   $('#kepalagudang').click(function(){
		   $('#datasupplier').slideUp();
	  });
	   $('#kasir').click(function(){
		   $('#datasupplier').slideUp();
	  });
	    $('#kepalapenjualan').click(function(){
		   $('#datasupplier').slideUp();
	  });
	   $('#pemiliktoko').click(function(){
		   $('#datasupplier').slideUp();
	  });
	   $('#accountant').click(function(){
		   $('#datasupplier').slideUp();
	  });
      $('#supplier').click(function(){
		   $('#datasupplier').slideDown();
	  });
	  
	  
  } );
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
	<h2 style="color:brown" align="center"><b>Data User</b></h2>
	<legend>
	</legend>
	

<table>
<tr>
	<td>
		<div class="navbar-header">
			<div class="btn btn-primary glyphicon glyphicon-plus" onclick="add_user()"><b> New</b></div>  
			<!--<div class="btn btn-primary glyphicon glyphicon-refresh" onclick="window.location.reload();"><b></b></div> --> 
		</div>
	</td>
</tr>
<tr>
<td style="align:left;">
<div class="navbar-header">
	<form action="<?php print site_url();?>/User/index2" method=POST>
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
	<form action="<?php print site_url();?>/User/cariuser" method=POST>

		<div class="input-group">
		<input required name="caridatauser" style="margin:0px 0px 0px 0px; width:250px;" type="text" class='form-control' placeholder="Search Data...."/>
		<button class="btn btn-primary btn-bg glyphicon glyphicon-search" style="border-radius:0px 5px 5px 0px; margin-top:-1px; padding-top:6px;padding-left:8px;"></button>
		
		</div>
	</form>
	</td>
</tr>
</table>
<div class="col-xs-8">
		<table id="table" class="table">
			
		<tr bgcolor="#66CCFF">
			<th align="center"><b>No.</b></th>
			<th align="center"><b>Nomor Identitas</b></th>
			<th align="center"><b>Nama</b></th>
			<th align="center"><b>Hak Akses</b></th>
			<th align="center"><b>Tools</b></th>
		</tr>
		
		<?php 
		$no = $this->uri->segment('3') + 1;
		foreach($datatable as $baris){
			
		?>
		
		<tr>
		<td align="center" style="padding-top:10px;"><?php echo $no; ?></td>
		
		<td align="left" style="padding-top:10px;">
			<a href="javascript:void(0)" title="Detail" onclick="detail_user(<?php echo ""."'".$baris->Kode_User."'"."";?>)">
			<span class="glyphicon glyphicon-open-file"></span> <?php echo $baris->No_Identitas; ?></a>
				
		</td>
		
		<td align="center" style="padding-top:10px;"><?php echo $baris->Nama; ?></td>
		<td align="center" style="padding-top:10px;">
		<?php $hakakses = $baris->Hak_Akses;
				if($hakakses == "Supplier"){
		?>
		<a href="javascript:void(0)" title="Detail Supplier" onclick="detail_supplier(<?php echo ""."'".$baris->Kode_Supplier."'"."";?>)">
		<span class="glyphicon glyphicon-search"></span> <?php echo $baris->Hak_Akses; ?></a>
				
				<?php
				}else{ 
				echo $baris->Hak_Akses;
				}?>
		
		</td>
		<td align="center" style="padding-top:10px;">
		<a  href="<?php echo base_url('index.php/User/hapususer/'.$baris->Kode_User); ?>"><span class="btn btn-danger btn-sm glyphicon glyphicon-trash" align="right"> Delete</span></a>
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
<!-- untuk Tambah Supplier-->		
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
	  
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 style="color:brown"><b>Tambah Data User</b></h2>
        </div>
<div class="modal-body">
          <form class="form-signin" method="POST" action="<?php echo base_url();?>User/tambahuser/" enctype="multipart/form-data">
	<table class="table table-bordered table responsive">
		<tr>
			<td>Nomor Identitas</td>
			<td>
				<input required type="text" name="No_Identitas" class="form-control" placeholder="Nomor Identitas"></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>
				<input required type="text" name="Nama" class="form-control" placeholder="Nama"></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>
				<input required type="radio" value="Laki - Laki" name="Jenis_Kelamin"> Laki - Laki
				&nbsp;
				<input required type="radio" value="Perempuan" name="Jenis_Kelamin"> Perempuan
				
			</td>
		</tr>
		<tr>
			<td>Username</td>
			<td>
				<input required type="text" name="Username" class="form-control" placeholder="Username"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td>
				<input required type="text" required type="text" name="Pass" placeholder="Password" class="form-control"></td>
		</tr>
		
		<tr>
			<td>Hak Akses</td>
			<td>
				<input required type="radio" id="pemiliktoko" value="Pemilik Toko" name="Hak_Akses"> Pemilik Toko
				&nbsp;
				<input required type="radio" id="kepalagudang" value="Kepala Gudang" name="Hak_Akses"> Kepala Gudang
				&nbsp;
				<input required type="radio" id="kepalapenjualan" value="Kepala Penjualan" name="Hak_Akses"> Kepala Penjualan
				<br>
				<input required type="radio" id="admin" value="Admin" name="Hak_Akses"> Admin
				&nbsp;
				<input required type="radio" id="kasir" value="Kasir" name="Hak_Akses"> Kasir
				&nbsp;
				<input required type="radio" id="accountant" value="Accountant" name="Hak_Akses"> Accountant
				&nbsp;
				<input required type="radio" id="supplier" value="Supplier" name="Hak_Akses"> Supplier
				
			</td>
		</tr>
		<tr style="display:none;" id="datasupplier">
			<td>Supplier</td>
			<td>
				<select name="Kode_Supplier" class="form form-control">
					<option></option>
					<?php foreach($datasupplier as $dtsup){ ?>
					<option value="<?php echo $dtsup->Kode_Supplier; ?>"><?php echo $dtsup->Nama_Supplier; ?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Telepon</td>
			<td>
				<input required type="text" maxlength="30" required type="text" name="Phone" placeholder="Telepon" class="form-control"></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>
				<textarea required maxlength="200" name="Contact" placeholder="Contact Person" class="form form-control"></textarea></td>
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
  
  <!-- Bootstrap modal detail -->
  <div class="modal fade" id="modal_formdetail" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <h2 style="color:brown"><b>Detail Data User</b></h2>
      </div>
      <div class="modal-body form">
        <form class="form-horizontal" id="formdetail" method="POST" action="<?php echo base_url();?>Supplier/editsupplier/" enctype="multipart/form-data">
          <input type="hidden" value="" name="book_id"/>
          <div class="form-body">
          <table class="table table-bordered table responsive">
		
		<tr>
			<td>Nomor Identitas</td>
			<td>
				<input readonly="readonly" style="background:white;" required type="text" id="No_Identitas" class="form-control" placeholder="Nomor Identitas"></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>
				<input readonly="readonly" style="background:white;" required type="text" id="Nama" class="form-control" placeholder="Nama"></td>
		</tr>	
		<tr>
			<td>Username</td>
			<td>
				<input required type="text" readonly="readonly" style="background:white;"  id="Username" class="form-control"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td>
				<input required type="text" readonly="readonly" style="background:white;"  id="Pass" class="form-control"></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>
				<input required type="text" readonly="readonly" style="background:white;"  id="Jenis_Kelamin" class="form-control"></td>
		</tr>
		<tr>
			<td>Hak Akses</td>
			<td>
				<input required type="text" readonly="readonly" style="background:white;"  id="Hak_Akses" class="form-control"></td>
		</tr>
		<tr>
			<td>Telepon</td>
			<td>
				<input required type="text" readonly="readonly" style="background:white;"  maxlength="30" required type="text" id="Phone" placeholder="Telepon" class="form-control"></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>
				<textarea required maxlength="200" readonly="readonly" style="background:white;" id="Contact" placeholder="Contact Person" class="form form-control"></textarea></td>
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
  
  <!-- Bootstrap modal detail -->
  <div class="modal fade" id="modal_formdetailsupplier" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <h2 style="color:brown"><b>Detail Data Supplier</b></h2>
      </div>
      <div class="modal-body form">
        <form class="form-horizontal" id="formdetailsupplier" method="POST" action="<?php echo base_url();?>Supplier/editsupplier/" enctype="multipart/form-data">
         
          <div class="form-body">
          <table class="table table-bordered table responsive">
		
		<tr>
			<td>Nama Supplier</td>
			<td>
				<input readonly="readonly" style="background:white;" required type="text" id="Nama_Supplier" class="form-control" placeholder="Nomor Identitas"></td>
		</tr>
		<tr>
			<td>Deskripsi</td>
			<td>
				<input readonly="readonly" style="background:white;" required type="text" id="Deskripsi" class="form-control" placeholder="Nama"></td>
		</tr>	
		<tr>
			<td>Alamat</td>
			<td>
				<textarea readonly="readonly" style="background:white;"  id="Alamat" class="form-control"></textarea></td>
		</tr>
		<tr>
			<td>Telepon</td>
			<td>
				<input required type="text" readonly="readonly" style="background:white;"  id="Telepon" class="form-control"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td>
				<input required type="text" readonly="readonly" style="background:white;"  id="Email" class="form-control"></td>
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

	