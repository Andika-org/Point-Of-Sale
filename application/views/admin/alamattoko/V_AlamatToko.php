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

    function edit_toko(id)
    {
		 // $('#myModal').modal('show');
		//alert('helo');
      save_method = 'update';
     $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo base_url('AlamatToko/ajaxedit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="Id_Toko"]').val(data.Id_Toko);
            $('[name="Nama_Toko"]').val(data.Nama_Toko);
            $('[name="Alamat_Toko"]').val(data.Alamat_Toko);
            $('[name="Rt"]').val(data.Rt);
            $('[name="Rw"]').val(data.Rw);
			$('[name="Desa"]').val(data.Desa);
			$('[name="Kecamatan"]').val(data.Kecamatan);
			$('[name="Kabupaten"]').val(data.Kabupaten);
			$('[name="Kode_Pos"]').val(data.Kode_Pos);
			$('[name="Telp"]').val(data.Telp);
			$('[name="Fax"]').val(data.Fax);
			$('[name="Deskripsi_Toko"]').val(data.Deskripsi_Toko);
			$('[name="Email_Toko"]').val(data.Email_Toko);
			$('[name="Foto_Toko_Lama"]').val(data.Foto_Toko);


            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Book'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }
	
	 function detail_alamat(id)
    {
		 // $('#myModal').modal('show');
		//alert('helo');
      save_method = 'update';
     $('#formdetail')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo base_url('AlamatToko/ajaxedit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="Id_Toko2"]').val(data.Id_Toko);
            $('[name="Nama_Toko2"]').val(data.Nama_Toko);
            $('[name="Alamat_Toko2"]').val(data.Alamat_Toko);
            $('[name="Rt2"]').val(data.Rt);
            $('[name="Rw2"]').val(data.Rw);
			$('[name="Desa2"]').val(data.Desa);
			$('[name="Kecamatan2"]').val(data.Kecamatan);
			$('[name="Kabupaten2"]').val(data.Kabupaten);
			$('[name="Kode_Pos2"]').val(data.Kode_Pos);
			$('[name="Telp2"]').val(data.Telp);
			$('[name="Fax2"]').val(data.Fax);
			$('[name="Deskripsi_Toko2"]').val(data.Deskripsi_Toko);
			$('[name="Email_Toko2"]').val(data.Email_Toko);


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
 <script type="text/javascript">
  $(document).ready( function () {
      $('#no').click(function(){
		  $('#upload').slideUp();
	  });
	  
	   $('#yes').click(function(){
		  $('#upload').slideDown();
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
	background-color:;
}
 </style>

</head>
<body>
<div class="col-xs-12">
<div class="col-xs-11 pull-right" style="padding-left:120px;"> 
	<h2 style="color:brown" align="center"><b>Alamat Toko</b></h2>
	<legend>
	</legend>
	

<table>
<tr>
	<td>
	<?php $ne = $new['Id_Toko'];
			if($ne==1){
	?><div class="navbar-header">
			<div title="Can't Input" class="btn btn-danger glyphicon glyphicon-remove"></div>  
		</div>
			<?php }else{?>
		<div class="navbar-header">
			<div title="Input Address" class="btn btn-primary glyphicon glyphicon-plus" onclick="add_supplier()"><b> New</b></div>  
		</div>
			<?php } ?>
	</td>
</tr>
</table>
		<table id="table" class="table">
			
		<tr bgcolor="#66CCFF">
			<th align="center" colspan="2"><b>Nama Toko</b></th>
			<th align="center"><b>Deskripsi Toko</b></th>
			<th align="center"><b>Telp</b></th>
			<th align="center"><b>Email</b></th>
			<th align="center"><b>Tools</b></th>
		</tr>
		
		<?php 
		$no = $this->uri->segment('3') + 1;
		foreach($datatable as $baris){
			
		?>
		
		<tr>
		<td align="center" style="padding-top:10px;"><span style="padding-top:3px;cursor:pointer;" class="detail text-primary pull-left glyphicon glyphicon-triangle-bottom"></span></td>
		<td align="center" style="padding-top:10px;"><?php echo $baris->Nama_Toko; ?>	
		</td>
		<td align="center" style="padding-top:10px;"><?php echo $baris->Deskripsi_Toko; ?></td>
		<td align="center" style="padding-top:10px;"><?php echo $baris->Telp; ?></td>
		<td align="center" style="padding-top:10px;"><?php echo $baris->Email_Toko; ?></td>
		<td align="center" style="padding-top:10px;">
		<a class="btn btn-sm btn-success" href="javascript:void(0)" onclick="edit_toko(<?php echo $baris->Id_Toko;?>)"><i class="glyphicon glyphicon-edit"></i></a>
		<a onclick="return confirm('Hapus Data Toko <?php echo $baris->Nama_Toko; ?> ?')" href="<?php echo base_url('index.php/AlamatToko/hapustoko/'.$baris->Id_Toko); ?>"><span class="btn btn-danger btn-sm glyphicon glyphicon-trash" align="right"></span></a>
		</td>
		</tr>
		
		<tr>
			<td colspan="6" style="display:none;" class="datadetail">
				
		
	<div class="col-xs-12">
		<div class="Compose-Message">               
			<div class="panel panel-default" style="margin-bottom:0px;" >
				<div class="panel-heading" style="border:1px solid #008080;margin-bottom:-4px;background:#008080;">
                       
				<b style="color:white;">Detail Information Alamat <?php echo $baris->Nama_Toko; ?></b>
				</div>
		<div class="panel-body" style="border:1px solid #008080">
				<table class="table" style="margin-bottom:0px;background-color:white;">
			<tr>
			<td style="width:150px;">
				Nama Toko
			</td>
			<td style="width:1px;">:</td>
			<td><b><?php echo $baris->Nama_Toko; ?></b>
			<br>
			<br>
						<img width="200" height="200" <?php echo img('gambartoko/'.$baris->Foto_Toko);?></td>
			</tr>
			<tr>
				<td>
					Alamat Toko
				</td>
				<td>:</td>
				<td><?php echo $baris->Alamat_Toko.' Rt. '.$baris->Rt.' Rw. '.$baris->Rw.' Desa '.$baris->Desa; ?></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td>kec. <?php echo $baris->Kecamatan.' Kab. '.$baris->Kabupaten;?></td>
			</tr>
			<tr>
				<td>
					kode Pos
				</td>
				<td>:</td>
				<td><?php echo $baris->Kode_Pos; ?></td>
			</tr>
			<tr>
				<td>
					Telepon
				</td>
				<td>:</td>
				<td><?php echo $baris->Telp; ?></td>
			</tr>
			<tr>
				<td>
					Fax
				</td>
				<td>:</td>
				<td><?php echo $baris->Fax; ?></td>
			</tr>
			<tr>
				<td>
					Deskripsi Toko
				</td>
				<td>:</td>
				<td><?php echo $baris->Deskripsi_Toko; ?></td>
			</tr>
			<tr>
				<td>
					Email Toko
				</td>
				<td>:</td>
				<td><?php echo $baris->Email_Toko; ?></td>
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
          <h2 style="color:brown"><b>Tambah Data Toko</b></h2>
        </div>
<div class="modal-body">
          <form class="form-signin" method="POST" action="<?php echo base_url();?>AlamatToko/tambahtoko/" enctype="multipart/form-data">
	<table class="table table-bordered table responsive">
	
			<input required type="hidden" name="Id_Toko" class="form-control" value="1" readonly="readonly">
			<!--<div id="tooltip" data-title="dfdsfd" style="align:right;"><span style="color:blue;"class="glyphicon glyphicon-question-sign"></div></span>
			-->
		<tr>
			<td>Nama Toko</td>
			<td>
				<input required type="text" maxlength="15" name="Nama_Toko" class="form-control" placeholder="Nama Toko"></td>
		</tr>
		<tr>
			<td>Alamat Toko</td>
			<td>
				<textarea required type="text" name="Alamat_Toko" class="form-control"></textarea></td>
		</tr>
		<tr>
			<td>Rt / Rw</td>
			<td><div class="input-group">
				<input required type="text" style="width:80px;margin-right:8px;" name="Rt" class="form-control" placeholder="Rt">
				<input required type="text" style="width:80px;" name="Rw" class="form-control" placeholder="Rw">
				
				</div>
			</td>
		</tr>
		<tr>
			<td>Desa</td>
			<td>
				<input required type="text" name="Desa" class="form-control" placeholder="Desa">
			</td>
		</tr>
		<tr>
			<td>Kecamatan</td>
			<td>
				<input required type="text" name="Kecamatan" class="form-control" placeholder="Kecamatan">
				
			
			</td>
		</tr>
		<tr>
			<td>Kabupaten</td>
			<td>
				<input required type="text" name="Kabupaten" class="form-control" placeholder="Kabupaten">
				
			</td>
		</tr>
		<tr>
			<td>Kode Pos</td>
			<td>
				<input required type="text" name="Kode_Pos" style="width:180px;" class="form-control" placeholder="Kode Pos">
				</td>
		</tr>
		<tr>
			<td>Telepon</td>
			<td>
				<input required type="text" name="Telp" style="width:180px;" class="form-control" placeholder="Telepon">
				</td>
		</tr>
		<tr>
			<td>Fax</td>
			<td>
				<input required type="text" name="Fax" style="width:180px;" class="form-control" placeholder="Fax">
				</td>
		</tr>
		<tr>
			<td>Gambar Toko</td>
			<td>
				<input required type="file" name="Foto_Toko" class="form-control" class="input-medium">
				</td>
		</tr>
		<tr>
			<td>Deskripsi Toko</td>
			<td>
				<textarea required name="Deskripsi_Toko" class="form-control"></textarea></td>
		</tr> 
		<tr>
			<td>Email Toko</td>
			<td>
				<input required type="text" name="Email_Toko" class="form-control" placeholder="Email Toko"></td>
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
       <h2 style="color:brown"><b>Edit Data Toko</b></h2>
      </div>
      <div class="modal-body form">
        <form class="form-horizontal" id="form" method="POST" action="<?php echo base_url();?>AlamatToko/editalamattoko" enctype="multipart/form-data">
         
          <div class="form-body">
          <table class="table table-bordered table responsive">
	
			<input required type="hidden" name="Id_Toko" class="form-control" value="1" readonly="readonly">
			<input required type="hidden" name="Foto_Toko_Lama" class="form-control">
			<!--<div id="tooltip" data-title="dfdsfd" style="align:right;"><span style="color:blue;"class="glyphicon glyphicon-question-sign"></div></span>
			-->
		<tr>
			<td>Nama Toko</td>
			<td>
				<input required type="text" name="Nama_Toko" class="form-control" placeholder="Nama Toko"></td>
		</tr>
		<tr>
			<td>Alamat Toko</td>
			<td>
				<textarea required type="text" name="Alamat_Toko" class="form-control"></textarea></td>
		</tr>
		<tr>
			<td>Rt / Rw</td>
			<td><div class="input-group">
				<input required type="text" style="width:80px;margin-right:8px;" name="Rt" class="form-control" placeholder="Rt">
				<input required type="text" style="width:80px;" name="Rw" class="form-control" placeholder="Rw">
				
				</div>
			</td>
		</tr>
		<tr>
			<td>Desa</td>
			<td>
				<input required type="text" name="Desa" class="form-control" placeholder="Desa">
			</td>
		</tr>
		<tr>
			<td>Kecamatan</td>
			<td>
				<input required type="text" name="Kecamatan" class="form-control" placeholder="Kecamatan">
				
			
			</td>
		</tr>
		<tr>
			<td>Kabupaten</td>
			<td>
				<input required type="text" name="Kabupaten" class="form-control" placeholder="Kabupaten">
				
			</td>
		</tr>
		<tr>
			<td>Kode Pos</td>
			<td>
				<input required type="text" name="Kode_Pos" style="width:180px;" class="form-control" placeholder="Kode Pos">
				</td>
		</tr>
		<tr>
			<td>Telepon</td>
			<td>
				<input required type="text" name="Telp" style="width:180px;" class="form-control" placeholder="Telepon">
				</td>
		</tr>
		<tr>
			<td>Fax</td>
			<td>
				<input required type="text" name="Fax" style="width:180px;" class="form-control" placeholder="Fax">
				</td>
		</tr>
		<tr>
			<td>Edit File</td>
			<td>
				<input required type="radio" name="Editfile" value="No" id="no"> <b>No</b>
				<input required type="radio" name="Editfile" value="Yes" id="yes"> <b>Yes</b>
				
				<div id="upload" style="display:none;">
				<br>
				<input type="file" name="Foto_Toko" class="form-control" class="input-medium">
				</div>
				</td>
		</tr>
		<tr>
			<td>Deskripsi Toko</td>
			<td>
				<textarea required name="Deskripsi_Toko" class="form-control"></textarea></td>
		</tr> 
		<tr>
			<td>Email Toko</td>
			<td>
				<input required type="text" name="Email_Toko" class="form-control" placeholder="Email Toko"></td>
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
         
          <div class="form-body">
          <table class="table table-bordered table responsive">
	
			<input required type="hidden" name="Id_Toko2" class="form-control" value="1" readonly="readonly">
			<!--<div id="tooltip" data-title="dfdsfd" style="align:right;"><span style="color:blue;"class="glyphicon glyphicon-question-sign"></div></span>
			-->
		<tr>
			<td>Nama Toko</td>
			<td>
				<input required type="text" name="Nama_Toko2" class="form-control" placeholder="Nama Toko"></td>
		</tr>
		<tr>
			<td>Alamat Toko</td>
			<td>
				<textarea required type="text" name="Alamat_Toko2" class="form-control"></textarea></td>
		</tr>
		<tr>
			<td>Rt / Rw</td>
			<td><div class="input-group">
				<input required type="text" style="width:80px;margin-right:8px;" name="Rt2" class="form-control" placeholder="Rt">
				<input required type="text" style="width:80px;" name="Rw2" class="form-control" placeholder="Rw">
				
				</div>
			</td>
		</tr>
		<tr>
			<td>Desa</td>
			<td>
				<input required type="text" name="Desa2" class="form-control" placeholder="Desa">
			</td>
		</tr>
		<tr>
			<td>Kecamatan</td>
			<td>
				<input required type="text" name="Kecamatan2" class="form-control" placeholder="Kecamatan">
				
			
			</td>
		</tr>
		<tr>
			<td>Kabupaten</td>
			<td>
				<input required type="text" name="Kabupaten2" class="form-control" placeholder="Kabupaten">
				
			</td>
		</tr>
		<tr>
			<td>Kode Pos</td>
			<td>
				<input required type="text" name="Kode_Pos2" style="width:180px;" class="form-control" placeholder="Kode Pos">
				</td>
		</tr>
		<tr>
			<td>Telepon</td>
			<td>
				<input required type="text" name="Telp2" style="width:180px;" class="form-control" placeholder="Telepon">
				</td>
		</tr>
		<tr>
			<td>Fax</td>
			<td>
				<input required type="text" name="Fax2" style="width:180px;" class="form-control" placeholder="Fax">
				</td>
		</tr>
		<tr>
			<td>Deskripsi Toko</td>
			<td>
				<textarea required name="Deskripsi_Toko2" class="form-control"></textarea></td>
		</tr> 
		<tr>
			<td>Email Toko</td>
			<td>
				<input required type="text" name="Email_Toko2" class="form-control" placeholder="Email Toko"></td>
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

	