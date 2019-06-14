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
                
				<b>Normalisasi Barang</b>
					<?php $cnmr = $countnormalisasi["normal"];
					if($cnmr == "0"){?>
					<a href="<?php echo base_url("Stokopname/updatenormalisasiheader/".$header["Id_Stokopname"]); ?>" title="Finish" style="margin-top:-8px;" class="pull-right btn btn-link glyphicon glyphicon-floppy-saved"> Finish ]</a>	
					<?php }else{?>
					<span title="Not Yet" class="pull-right btn btn-link glyphicon glyphicon-floppy-remove" style="margin-top:-8px;"> Not Yet ]</span>	
					<?php } ?>
				</div>
		<!--<div class="panel-body" style="border:1px solid #DDDDDD;height:468px;">-->
        <div class="panel-body" style="border:1px solid #DDDDDD;">                

	<table id="table" class="table table-bordered table responsive">
			
		<tr>
			<th style="align:center;"><b>No.</b></th>
			<th align="center"><b>Kode Barang</b></th>
			<th align="center"><b>Nama Barang</b></th>
			<th align="center"><b>Stok</b></th>
			<th align="center"><b>Stok Nyata</b></th>
			<th align="center"><b>Selisih</b></th>
			<th align="center"><b>Keterangan</b></th>
			<th align="center"><b>Tools</b></th>
		</tr>
		
		<?php 
		echo $detailnormalisasi;
		?>
		
	</table>
		

		</div>
		</div>
	</div>
	</div>
	<!-- bkkgibo -->
	<br>
	<br>

	
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

	