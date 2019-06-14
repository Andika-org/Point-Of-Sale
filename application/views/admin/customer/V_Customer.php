<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
 <link href="<?php echo base_url()?>assets/untukcssfoto/layout2.css" rel="stylesheet" type="text/css" media="all">   
<link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap-3.3.7-dist-1/bootstrap-3.3.7-dist/css/bootstrap.min.css">
     <link href="<?php echo base_url()?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
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


    function add_customer()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#myModal').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }

    function edit_customer(id)
    {
		 // $('#myModal').modal('show');
		//alert('helo');
      save_method = 'update';
     $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo base_url('Customer/ajaxedit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('#Id_Customer').val(data.Id_Customer);
            $('#Nama_Customer').val(data.Nama_Customer);
			$('#Tempat').val(data.Tempat);
            $('#Alamat').val(data.Alamat);
            $('#Telepon').val(data.Telepon);
			$('#Email').val(data.Email);
			$('#Agama').val(data.Agama);
			$('#No_Identitas').val(data.No_Identitas);
			$('#Foto_Identitas').val(data.Foto_Identitas);
			$('#Tanggal_Registrasi').val(data.Tanggal_Registrasi);
			$('#Tanggal_Lahir').val(data.Tanggal_Lahir);


            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Book'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }
	
	 function detail_customer(id)
    {
		 // $('#myModal').modal('show');
		//alert('helo');
      save_method = 'update';
     $('#formdetail')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo base_url('Customer/ajaxedit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('#Nama_Customer').val(data.Nama_Customer);
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
 <script>
$(document).ready(function(){

$(document).on('click','.detailcustomer',function(){
				$(this).parent().parent().next().find('.datadetailcustomer').toggle();
				
			});
///////////////////////
});

</script>
 <script>
$(document).ready(function(){

	$("#ubahfile").click(function(){
		$("#fileedit").slideDown();
	})
	$("#tidakubahfile").click(function(){
		$("#fileedit").slideUp();
	})
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
	background-color:;
}
 </style>

</head>
<body>
<div class="col-xs-12">
<div class="col-xs-11 pull-right" style="padding-left:120px;"> 
	<h2 style="color:brown" align="center"><b>Data Customer</b></h2>
	<legend>
	</legend>
<table>
<tr>
	<td>
		<div class="navbar-header">
			<div class="btn btn-primary glyphicon glyphicon-plus" onclick="add_customer()"><b> New</b></div>  
			<!--<div class="btn btn-primary glyphicon glyphicon-refresh" onclick="window.location.reload();"><b></b></div> --> 
		</div>
	</td>
</tr>
<tr>
<td style="align:left;">
<div class="navbar-header">
	<form action="<?php print site_url();?>/Customer/index2" method=POST>
		<select name="batas" style="height:25px; margin:0px 0px 0px 0px" >
			<option value="200">Page</option>
			<option value="1">5</option>
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
	<form action="<?php print site_url();?>/Customer/caricustomer" method=POST>

		<div class="input-group">
		<input required name="caridatacustomer" style="margin:0px 0px 0px 0px; width:250px;" type="text" class='form-control' placeholder="Search Data...."/>
		<button class="btn btn-primary btn-bg glyphicon glyphicon-search" style="border-radius:0px 5px 5px 0px; margin-top:-1px; padding-top:6px;padding-left:8px;"></button>
		
		</div>
	</form>
	</td>
</tr>
</table>

<div class="col-xs-12">

		<table id="table" class="table">
			
		<tr bgcolor="#66CCFF">
			<th align="center" colspan="2"><b>Nama Customer</b></th>
			<th align="center"><b>Tanggal Registrasi</b></th>
			<th align="center"><b>Telepon</b></th>
			<th align="center"><b>Email</b></th>
			<th align="center"><b>Tools</b></th>
		</tr>
		
		<?php 
		$no = $this->uri->segment('3') + 1;
		foreach($datatable as $baris){
			
		?>
		
		<tr>
		<td align="center" style="padding-top:10px;"><span class="glyphicon glyphicon-triangle-bottom detailcustomer text-primary" title="Detail Information" style="cursor:pointer; color:;"> </span></td>
		<td align="left" style="padding-top:10px;">
		<?php echo $baris->Nama_Customer; ?>
		<!--
			<a href="javascript:void(0)" title="Detail" onclick="detail_customer(<?php echo ""."'".$baris->Id_Customer."'"."";?>)">
			<span class="glyphicon glyphicon-open-file"></span>
			
			<?php echo $baris->Nama_Customer; ?></a>
				-->
		</td>
		<td align="center" style="padding-top:10px;"><?php echo date("d F Y ",strtotime($baris->Tanggal_Registrasi)); ?></td>
		<td align="center" style="padding-top:10px;"><?php echo $baris->Telepon; ?></td>
		<td align="center" style="padding-top:10px;"><?php echo $baris->Email; ?></td>
		<td align="center" style="padding-top:10px;">
		<a class="btn btn-sm btn-success" href="javascript:void(0)" title="Edit" onclick="edit_customer(<?php echo ""."'".$baris->Id_Customer."'"."";?>)"><i class="glyphicon glyphicon-edit"></i></a>
		<a onclick="return confirm('Hapus Data <?php echo $baris->Nama_Customer; ?> ?')" href="<?php echo base_url('index.php/Customer/hapuscustomer/'.$baris->Id_Customer); ?>"><span class="btn btn-danger btn-sm glyphicon glyphicon-trash" align="right"></span></a>
		</td>
		</tr>
		
		<tr >
			<td colspan="6" style="display:none;" class="datadetailcustomer">
				<div class="col-xs-12">
		<div class="Compose-Message">               
			<div class="panel panel-default" style="margin-bottom:0px;" >
				<div class="panel-heading" style="border:1px solid #008080;margin-bottom:-4px;background:#008080;">
                       
				<b style="color:white;">Detail Information</b>
				</div>
		<div class="panel-body" style="border:1px solid #008080">
				<table class="table" style="margin-bottom:0px;background-color:white;">
				
					<tr>
						<td>Nama Customer</td>
						<td>:</td>
						<td><?php echo $baris->Nama_Customer; ?></td>
					</tr>
					<tr>
						<td>Tanggal Registrasi</td>
						<td>:</td>
						<td><?php echo date("d F Y ",strtotime($baris->Tanggal_Registrasi)); ?></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td>:</td>
						<td><?php echo $baris->Jenis_Kelamin; ?></td>
					</tr>
					<tr>
						<td style="width:200px;" >Tempat, Tanggallahir</td>
						<td>:</td>
						<td><?php echo $baris->Tempat.', '.date("d F Y",strtotime($baris->Tanggal_Lahir)); ?></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td><?php echo $baris->Alamat; ?></td>
					</tr>
					<tr>
						<td>Telepon</td>
						<td>:</td>
						<td><?php echo $baris->Telepon; ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td>:</td>
						<td><?php echo $baris->Email; ?></td>
					</tr>
					<tr>
						<td>Agama</td>
						<td>:</td>
						<td><?php echo $baris->Agama; ?></td>
					</tr>
					<tr>
						<td>Kewarganegaraan</td>
						<td>:</td>
						<td><?php echo $baris->Kewarganegaraan; ?></td>
					</tr>
					<tr>
						<td>Nomor Identitas</td>
						<td>:</td>
						<td><?php echo $baris->No_Identitas; ?></td>
					</tr>
					<tr>
						<td>Jenis Identitas</td>
						<td>:</td>
						<td><?php echo $baris->Jenis_Identitas; ?></td>
					</tr>
					<tr>
						<td>Identitas</td>
						<td>:</td>
						<td><img width="300" height="300" <?php echo img('identitascustomer/'.$baris->Foto_Identitas);?></td>
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
<!-- untuk Tambah Supplier-->		
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
	  
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 style="color:brown"><b>Tambah Data Customer</b></h2>
        </div>
<div class="modal-body">
          <form class="form-signin" method="POST" action="<?php echo base_url();?>Customer/tambahcustomer/" enctype="multipart/form-data">
	<table class="table table-bordered table responsive">
		<tr>
			<td>Nama Customer</td>
			<td>
				<input required type="text" name="Nama_Customer" class="form-control" placeholder="Nama Customer"></td>
		</tr>
		<tr>
			<td>Tanggal Registrasi</td>
			<td>
				<div class="navbar-header">
				
					<div class="input-group date form_date " data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd" >
							<input required class="form-control" type="text" name="Tanggal_Registrasi" placeholder="Tanggal Registrasi" readonly="readonly">
							<span class="input-group-addon"><span class="glyphicon glyphicon-remove" ></span></span>
							<span class="input-group-addon"><span class="glyphicon glyphicon-calendar" ></span></span>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>
				<input type="radio" value="Laki-Laki" name="Jenis_Kelamin" required> Laki-Laki <input required type="radio" value="Perempuan" name="Jenis_Kelamin"> Perempuan</td>
		</tr>
		<tr>
			<td>Tempat</td>
			<td>
				<input type="text" required placeholder="Tempat" name="Tempat" class="form form-control">
			
				
			</td>
		</tr>
		<tr>
			<td>Tanggallahir</td>
			<td>
				<div class="navbar-header">
				
					<div class="input-group date form_date " data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd" >
							<input required class="form-control" type="text" name="Tanggal_Lahir" placeholder="Tanggal Lahir" readonly="readonly">
							<span class="input-group-addon"><span class="glyphicon glyphicon-remove" ></span></span>
							<span class="input-group-addon"><span class="glyphicon glyphicon-calendar" ></span></span>
					</div>
				</div>
			</td>
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
				<input type="text" name="Email" class="form-control" placeholder="Email"></td>
		</tr>
		<tr>
			<td>Agama</td>
			<td>
				<input required type="text" name="Agama" class="form-control" placeholder="Agama"></td>
		</tr>
		<tr>
			<td>Kewarganegaraan</td>
			<td>
				<input type="radio" value="WNI" name="Kewarganegaraan" required> WNI <input type="radio" value="WNA" name="Kewarganegaraan" required> WNA</td>
		</tr>
		<tr>
			<td>Nomor Identitas</td>
			<td>
				<input required type="text" name="No_Identitas" class="form-control" placeholder="Nomor Identitas"></td>
		</tr>
		<tr>
			<td>Jenis Identitas</td>
			<td>
				<input type="radio" value="KTM" name="Jenis_Identitas" required> KTM <input type="radio" value="KTP" name="Jenis_Identitas" required> KTP
				<br>
				<input type="radio" value="KTA" name="Jenis_Identitas" required> KTA <input type="radio" value="SIM" name="Jenis_Identitas" required> SIM
			
				<input type="radio" value="Lainnya" name="Jenis_Identitas" required> Lainnya
				</td>
		</tr>
		<tr>
			<td>Identitas</td>
			<td>
				<input type="file" name="Foto_Identitas" required></td>
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
       <h2 style="color:brown"><b>Edit Data Customer</b></h2>
      </div>
      <div class="modal-body form">
        <form class="form-horizontal" id="form" method="POST" action="<?php echo base_url();?>Customer/editcustomer/" enctype="multipart/form-data">
          <input type="hidden" value="" name="book_id"/>
          <div class="form-body">
          <table class="table table-bordered table responsive">
		<tr>
			<td>Nama Customer</td>
			<td><input required type="hidden" name="Id_Customer" id="Id_Customer" class="form-control" placeholder="Nama Customer">
				<input required type="text" name="Nama_Customer" id="Nama_Customer" class="form-control" placeholder="Nama Customer"></td>
		</tr>
		<tr>
			<td>Tanggal Registrasi</td>
			<td>
				<div class="navbar-header">
				
					<div class="input-group date form_date " data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd" >
							<input id="Tanggal_Registrasi" required class="form-control" type="text" name="Tanggal_Registrasi" placeholder="Tanggal Registrasi" readonly="readonly">
							<span class="input-group-addon"><span class="glyphicon glyphicon-remove" ></span></span>
							<span class="input-group-addon"><span class="glyphicon glyphicon-calendar" ></span></span>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>
				<input type="radio" value="Laki-Laki" name="Jenis_Kelamin" required> Laki-Laki <input required type="radio" value="Perempuan" name="Jenis_Kelamin"> Perempuan</td>
		</tr>
		<tr>
			<td>Tempat</td>
			<td>
				<input type="text" required placeholder="Tempat" name="Tempat" id="Tempat" class="form form-control">
			
				
			</td>
		</tr>
		<tr>
			<td>Tanggallahir</td>
			<td>
				<div class="navbar-header">
				
					<div class="input-group date form_date " data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd" >
							<input id="Tanggal_Lahir" required class="form-control" type="text" name="Tanggal_Lahir" placeholder="Tanggal Lahir" readonly="readonly">
							<span class="input-group-addon"><span class="glyphicon glyphicon-remove" ></span></span>
							<span class="input-group-addon"><span class="glyphicon glyphicon-calendar" ></span></span>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>
				<textarea required type="text" name="Alamat" id="Alamat" class="form-control"></textarea></td>
		</tr>
		<tr>
			<td>Telepon</td>
			<td>
				<input required type="text" name="Telepon" id="Telepon" class="form-control" placeholder="Telepon"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td>
				<input required type="text" name="Email" id="Email" class="form-control" placeholder="Email"></td>
		</tr>
		<tr>
			<td>Agama</td>
			<td>
				<input required type="text" name="Agama" id="Agama" class="form-control" placeholder="Agama"></td>
		</tr>
		<tr>
			<td>Kewarganegaraan</td>
			<td>
				<input type="radio" value="WNI" name="Kewarganegaraan" required> WNI <input type="radio" value="WNA" name="Kewarganegaraan" required> WNA</td>
		</tr>
		<tr>
			<td>Nomor Identitas</td>
			<td>
				<input required type="text" id="No_Identitas" name="No_Identitas" class="form-control" placeholder="Nomor Identitas"></td>
		</tr>
		<tr>
			<td>Jenis Identitas</td>
			<td>
				<input type="radio" value="KTM" name="Jenis_Identitas" required> KTM <input type="radio" value="KTP" name="Jenis_Identitas" required> KTP
				<br>
				<input type="radio" value="KTA" name="Jenis_Identitas" required> KTA <input type="radio" value="SIM" name="Jenis_Identitas" required> SIM 
				<input type="radio" value="Lainnya" name="Jenis_Identitas" required> Lainnya
				</td>
		</tr>
		<tr >
			<td>Ubah File</td>
			<td><input type="radio" value="Yes" name="Ubah_File" id="ubahfile" required> Yes <input type="radio" value="No" id="tidakubahfile" name="Ubah_File" required> No
		
				<input type="hidden" name="Foto_Lama" id="Foto_Identitas" required>
				<br>
				<br>
				<input type="file" name="Foto_Identitas" style="display:none;" id="fileedit">
			</td>
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
       <h2 style="color:brown"><b>Detail Data Customer</b></h2>
      </div>
      <div class="modal-body form">
        <form class="form-horizontal" id="formdetail" method="POST" action="<?php echo base_url();?>Supplier/editsupplier/" enctype="multipart/form-data">
          <input type="hidden" value="" name="book_id"/>
          <div class="form-body">
          <table class="table table-bordered table responsive">
		
			
		<tr>
			<td>Nama Supplier</td>
			<td>
				<input required type="text" readonly="readonly" id="Nama_Customer" class="form-control"></td>
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

<!--Untuk Date Picker-->
<script type="text/javascript" src="<?php echo base_url()?>assets/bootstrap-3.3.7-dist-1/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
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
	