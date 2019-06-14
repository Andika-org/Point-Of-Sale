<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
 <link href="<?php echo base_url()?>assets/untukcssfoto/layout2.css" rel="stylesheet" type="text/css" media="all">
 <link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap-3.3.7-dist-1/bootstrap-3.3.7-dist/css/bootstrap.min.css">
   <link href="<?php echo base_url()?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
   
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
 <style>
 .table{
	font-family:sans-serif;
	color:#444;
	border-collapse:collapse;
	width:100%;
	border:1px solid #f2f5f7;
}
.table tr th{
	background:#008080;
	color:#fff;
	font-weight:normal;
		text-align:center;
	
}
.table, th, td{
	padding:8px 20px;
	text-align:;
}
.table, tr, td{
	padding:8px 20px;
	text-align:;
}
.table tr:nth-child(even){
	background-color:;
}
 </style>
 

  <script type="text/javascript">

function tambahdata(hakaksespurchase) {
	 if(hakaksespurchase == "Kepala Penjualan"){
		 $("#aksesinformation").modal("show");
	 }
	 else if(hakaksespurchase == "Kepala Gudang"){
		if (confirm("Are you sure continue to stok opname ?")) {
     
				window.location.href="<?php echo base_url('Stokopname/inputstokopname')?>";
    
    } else {
        alert(" not process");
    } 
	
 }
    
}

function hapusdata(id,hakaksesdelete) {
	 if(hakaksesdelete == "Kepala Penjualan"){
		 $("#aksesinformation").modal("show");
	 }
	 else if(hakaksesdelete == "Kepala Gudang"){
		if (confirm("Are you sure delete this data ?")) {
     
				window.location.href="<?php echo base_url('Stokopname/hapusstokopname/')?>"+id+"";
    
    } else {
        alert(" not process");
    } 
	
 }
    
}


function normalisasi(id,hakaksesedit) {
	 if(hakaksesedit == "Kepala Penjualan"){
		 $("#aksesinformation").modal("show");
	 }
	 else if(hakaksesedit == "Kepala Gudang"){
		if (confirm("Are you sure normalisasi this data ?")) {
     
				window.location.href="<?php echo base_url('Stokopname/normalisasi/')?>"+id+"";
    
    } else {
        alert(" not process");
    } 
	
 }
    
}
</script>
<!-- buat message akses -->	
<div class="modal fade" id="aksesinformation" role="dialog" >
    <div class="modal-dialog">
    
	<div class="modal-body " style="height:;">
		<!--<div class="alert alert-warning">-->
		<div class="alert alert-warning">
			<span class="close" data-dismiss="modal">&times;</span>
			<b>Warning !</b> You do not have access
		</div>
	</div>
		
	 </div>
</div>
<!-- sampe sini -->

</head>
<body >


<div class="col-xs-12">
<div class="col-xs-11 pull-right" style="padding-left:120px;"> 
	<h2 style="color:brown" align="center"><b>Data Stokopname</b></h2>
	<legend>
	</legend>

<table id="cetak" class="table" >

	<!--<<form method="post">
	<input type="text" class="form-control" name="batas" id="textboxnya">
	<!--<input type="submit" class="btn btn-warning glyphicon glyphicon-plus" value="1" id="textboxnya"> 
	</form>
	--> 
	<form action="<?php print site_url();?>/Stokopname/caristokopname" method="POST">
		<div class="navbar-header">
			<span onclick="tambahdata('<?php echo $this->session->userdata['Hak_Akses'] ?>')" class="btn btn-primary glyphicon glyphicon-plus"><b> New</b>  
			<!--<div class="btn btn-primary glyphicon glyphicon-refresh" onclick="window.location.reload();"><b></b></div>--> 
		</div>
		
		<br>
		<br>
		<br>
		<div class="navbar-header col-md-4">
            <div class="input-group date form_date col-md-11" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd" >
                    <input required class="form-control" type="text" name="Tanggal_Awal" placeholder="Tanggal Awal" readonly="readonly" id="tgl1" onchange="ajaxname();">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove" ></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar" ></span></span>
            </div>
		</div>
		
		<div class="navbar-header">
		<b style="margin:0px 20px 0px 2px;">Sampai</b>
		</div>
		
		<div class="navbar-header col-md-4">
		<div class="input-group date form_date col-md-11" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input required class="form-control" type="text" name="Tanggal_Akhir" placeholder="Tanggal Akhir" readonly="readonly" id="tgl2" onchange="ajaxname2();">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
		</div>		
			<div class="navbar-header"  >
			&nbsp <input type="submit" style="margin:0px 0px 0px -8px; height:34px;" class="btn btn-info " value="Search">
			</div>
	</form>
	
	<input type="hidden" name="tanggalpertama" style="background-color:#FFFFAA;" class='form-control' id="hasiltgl1" readonly="readonly">
	<input type="hidden" name="tanggalkedua" style="background-color:#FFFFAA;" class='form-control' id="hasiltgl2" readonly="readonly">
	
	<br>
	<br>
	<br>
	<form action="<?php print site_url();?>/Stokopname/index2" method=POST>
	<div class="navbar-header">
		<select name="batas" style="height:25px; margin:0px 0px 0px 0px" >
			<option value="1000">Page</option>
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
		</div>
	</form>
		<table class="table table-bordered table responsive">
			
		<tr bgcolor="#66CCFF">
			<th align="center"><b>No.</b></th>
			<th align="center"><b>Pegawai</b></th>
			<th align="center"><b>Tanggal Stokopname</b></th>
			<th align="center"><b>Normalisasi</b></th>
			<th align="center"><b>Tools</b></th>
		</tr>
		
		<?php 
		$no = $this->uri->segment('3') + 1;
		foreach($datatable as $baris){
			
		?>
		
		<tr>
		<td align="center" style="padding-top:10px;"><?php echo $no; ?></td>
		<td align="center" style="padding-top:10px;"><?php echo $baris->Nama; ?>
			
		</td>
		<td align="center" style="padding-top:10px;"><?php echo date('d F Y',strtotime($baris->Tanggal_Stokopname)); ?></td>
		<td align="center" style="padding-top:10px;"><?php $nr = $baris->Normalisasi;
			if($nr == "Belum"){
				echo "Not Yet";
			}else if($nr == "Finish"){
				echo $nr;
			}?></td>
		<td align="center" style="padding-top:4px;">
			<?php $normal = $baris->Normalisasi; 
			if($normal == "Belum"){?>
			<span onclick="normalisasi('<?php echo $baris->Id_Stokopname ?>','<?php echo $this->session->userdata['Hak_Akses'] ?>')" title="Normalisasi Barang" class="btn btn-success btn-sm glyphicon glyphicon-retweet" align="right"></span>
			<?php }else if($normal == "Finish"){?>
			<span onclick="hapusdata('<?php echo $baris->Id_Stokopname ?>','<?php echo $this->session->userdata['Hak_Akses'] ?>')" title="Remove" class="btn btn-danger btn-sm glyphicon glyphicon-trash" align="right"></span>
			<a href="<?php echo base_url('Stokopname/cetakreport/'.$baris->Id_Stokopname); ?>"><span title="Report" class="btn btn-primary btn-sm glyphicon glyphicon-print" align="right"></span></a>
			<?php } ?>
			
		</td>
		</tr>
		
		<?php
		$no++;
		}
		?>


<table class="table">	
	<tr>
		<th>
Copyright &copy 2018 | Page rendered in <strong>{elapsed_time}</strong> seconds
		</th>
	</tr>
</table>
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