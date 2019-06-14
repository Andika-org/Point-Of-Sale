<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
	<script src="<?php echo base_url()?>assets/js/bootstrap-datetimepicker.js"></script> 
	<link href="<?php echo base_url()?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
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
<br>
<a href="<?php echo base_url('AlamatToko/index');?>" class="btn btn-danger glyphicon glyphicon-chevron-left"> Back</a>	
<br>
<br>
	<legend>
	</legend>

<div class="col-xs-12" style="margin-top:0px;">
		<div class="Compose-Message">               
			<div class="panel panel-default" style="margin-bottom:0px;" >
				<div class="panel-heading" style="border:1px solid #DDDDDD;margin-bottom:-4px;background:#DDDDDD;">
                       
				<b>Detail Alamat <?php echo $lihat['Nama_Toko']; ?></b>
				</div>
		<div class="panel-body" style="border:1px solid #DDDDDD">
                        
		<table class="table" style="margin-bottom:0px;background-color:white;">
			<tr>
			<td>
				Nama Toko
			</td>
			<td>:</td>
			<td><?php echo $lihat['Nama_Toko']; ?></td>
			</tr>
			<tr>
				<td>
					Alamat Toko
				</td>
				<td>:</td>
				<td><?php echo $lihat['Alamat_Toko'].' Rt. '.$lihat['Rt'].' Rw. '.$lihat['Rw'].' Desa '.$lihat['Desa']; ?>
				</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td>kec. <?php echo $lihat['Kecamatan'].' Kab. '.$lihat['Kabupaten'];?></td>
			</tr>
			<tr>
				<td>
					kode Pos
				</td>
				<td>:</td>
				<td><?php echo $lihat['Kode_Pos']; ?></td>
			</tr>
			<tr>
				<td>
					Telepon
				</td>
				<td>:</td>
				<td><?php echo $lihat['Telp']; ?></td>
			</tr>
			<tr>
				<td>
					Fax
				</td>
				<td>:</td>
				<td><?php echo $lihat['Fax']; ?></td>
			</tr>
			<tr>
				<td>
					Deskripsi Toko
				</td>
				<td>:</td>
				<td><?php echo $lihat['Deskripsi_Toko']; ?></td>
			</tr>
			<tr>
				<td>
					Email Toko
				</td>
				<td>:</td>
				<td><?php echo $lihat['Email_Toko']; ?></td>
			</tr>
		</table>

		</div>
		</div>
	</div>
	</div>
</div>
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
<?php
	if(validation_errors()){
	echo '<script>alert("Harap Lengkapi Data Terlebih Dahulu..!!");</script>'; 
	}
?>
</html>