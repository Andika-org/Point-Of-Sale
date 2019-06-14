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
<script type="text/javascript">
function ajaxname(){
	var a = document.getElementById('tgl1').value;
		document.getElementById('hasiltgl1').value = a;
}

function ajaxname2(){
	var a = document.getElementById('tgl2').value;
		document.getElementById('hasiltgl2').value = a;
}

</script>
<script type="text/javascript">
//function sum(){
$(document).ready(function(){
	$("#textboxnya").click(function(){
		$.ajax({
			type: "POST",
			url: base_url + "pembelian/index",
			data:{
				textbox: $("#textboxnya").val()
			},
			dataType: "text",
			cache: false,
			success: 
				function(data){
					alert(data);
				}
				return false;
		});
	});
});
//}
</script>
<script>
$(document).ready(function(){

$(document).on('click','.statuspembelian',function(){
				$(this).parent().parent().next().next().find('.datapaymentstatus').css({"display":"none"});
				$(this).parent().parent().next().find('.datastatuspembelian').toggle();
			});

///////////////////////			
$(document).on('click','.statusselesai',function(){
				$(this).parent().parent().next().find('.datastatuspembelian').toggle();
				//$(this).parent().parent().next().find('.datadeliverystatus').css({"display":"none"});
				//$(this).parent().parent().next().next().find('.datapaymentstatus').toggle();
				
			});
///////////////////////
});

</script>
<script>
$(document).ready(function(){
$("#clicktanggal").click(function(){
	$("#tanggal").toggle();
	$("#caribiasa").toggle();
	$("#tomboltanggal").toggle();
	$("#tomboldata").toggle();
})

$("#clicksearch").click(function(){
	$("#tanggal").toggle();
	$("#caribiasa").toggle();
	$("#tomboltanggal").toggle();
	$("#tomboldata").toggle();
})

});
</script>
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
 
</head>
<body >


<div class="col-xs-12">
<div class="col-xs-11 pull-right" style="padding-left:120px;"> 
	<h2 style="color:brown" align="center"><b>Data Order Barang Supplier</b></h2>
	<legend>
	</legend>

<table id="cetak" class="table" >

	<!--<<form method="post">
	<input type="text" class="form-control" name="batas" id="textboxnya">
	<!--<input type="submit" class="btn btn-warning glyphicon glyphicon-plus" value="1" id="textboxnya"> 
	</form>
	--> 
	<form action="<?php print site_url();?>/OrderSupplier/carinota" method="POST">
	<?php $hakakses = $this->session->userdata["Hak_Akses"];
				if($hakakses == "Supplier"){}else{?>
		<div class="navbar-header pull-left">
			<a href="<?php echo base_url();?>OrderSupplier/tambahpembelianbahanbaku" class="btn btn-primary glyphicon glyphicon-shopping-cart"><b> New</b></a>  
			<!--<div class="btn btn-primary glyphicon glyphicon-refresh" onclick="window.location.reload();"><b></b></div>--> 
		</div>
				<?php } ?>
		
		<div id="tanggal" style="display:none;">
		
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
		</div>
	</form>
	
	<input type="hidden" name="tanggalpertama" style="background-color:#FFFFAA;" class='form-control' id="hasiltgl1" readonly="readonly">
	<input type="hidden" name="tanggalkedua" style="background-color:#FFFFAA;" class='form-control' id="hasiltgl2" readonly="readonly">
	
	<br>
	<br>
	<br>
	<form action="<?php print site_url();?>/OrderSupplier/index2" method=POST>
	<div class="navbar-header pull-left">
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
	
		<div id="tomboltanggal" style="margin-left:50px;" class="navbar-header pull-left">
			<span id="clicktanggal" class="btn btn-primary glyphicon glyphicon-calendar"><b> Search By Tanggal</b></span>  
		</div>
		<div id="tomboldata" style="margin-left:50px;display:none;" class="navbar-header pull-left">
			<span id="clicksearch" class="btn btn-primary glyphicon glyphicon-search"><b> Search By All</b></span>  
		</div>
		
	<form action="<?php print site_url();?>/OrderSupplier/caripembelian" method=POST>

		<div id="caribiasa" class="input-group pull-right" style="padding-left:10px;">
		<input required name="cariall" style="margin:0px 0px 0px 0px; width:250px;" type="text" class='form-control' placeholder="Search Data...."/>
		<button class="btn btn-primary btn-bg glyphicon glyphicon-search" style="border-radius:0px 5px 5px 0px; margin-top:-1px; padding-top:6px;padding-left:8px;"></button>
		
		</div>
	</form>
	
		<table class="table table-bordered table responsive">
			
		<tr bgcolor="#66CCFF">
			<th align="center"><b>No.</b></th>
			<th align="center"><b>Nomor Nota</b></th>
			<th align="center"><b>Tanggal Pembelian</b></th>
			<th align="center"><b>Total Pembelian</b></th>
			<th align="center"><b>Supplier</b></th>
			<th align="center"><b>Status</b></th>
			<th align="center"><b>Tools</b></th>
		</tr>
		
		<?php 
		$no = $this->uri->segment('3') + 1;
		foreach($datatable as $baris){
			
		?>
		
		<tr>
		<td align="center" style="padding-top:10px;"><?php echo $no; ?></td>
		<td align="left" style="padding-top:4px;"><a onclick="return confirm('Silahkan Cek Nota Dengan Nomor Faktur <?php echo $baris->No_Faktur; ?> ')" href="<?php echo base_url('OrderSupplier/ceknota/'.$baris->No_Faktur); ?>"><span class="btn btn-link btn-sm glyphicon glyphicon-barcode" align="right"> <?php echo $baris->No_Faktur; ?></span></a>
			
		</td>
		<td align="center" style="padding-top:10px;"><?php echo date('d F Y',strtotime($baris->Tanggal_Pembelian)); ?></td>
		<td align="left" style="padding-top:10px;"><?php echo 'Rp. '.number_format($baris->Total_Pembelian,0,",","."); ?></td>
		<td align="left" style="padding-top:10px;"><?php /*
															$st = $baris->Status_Pembelian;
															if($st=='Sedang Proses'){
															?>
															<!--<span class="btn btn-link btn-sm glyphicon glyphicon-tags" align="right">-->
															<span class="btn btn-link btn-sm glyphicon glyphicon-exclamation-sign" align="right"><a href="<?php echo base_url('Pembelian/editstatus/'.$baris->No_Faktur); ?>">
															</span>
															<?php
																$status = "<b style='color:orange;' >" .$baris->Status_Pembelian ."</b></a>";
																}
																
															else if($st=='Selesai'){
																$status = "<b style='color:green;'>" .$baris->Status_Pembelian ."</b>";
																}
														echo $status; */
														
														echo $baris->Nama_Supplier;?></td>
		<td>
			
			<?php $hakakses = $this->session->userdata["Hak_Akses"];
				if($hakakses == "Supplier"){?>
				
			<?php $status = $baris->Status_Pembelian;
			if($status=='Selesai'){ ?>
			<b style="color:green;">Selesai </b><span style="padding-top:4px;color:black;cursor:pointer;" class="statuspembelian pull-right glyphicon glyphicon-triangle-bottom"></span>
			<?php }else if($status=='Pending'){ ?>
			<b style="color:orange;">Pending </b><span style="padding-top:4px;color:black;cursor:pointer;" class="statuspembelian pull-right glyphicon glyphicon-triangle-bottom"></span>
			<?php }else if($status=='Proses'){?>
			<b style="color:blue;">Proses </b><span style="padding-top:4px;color:black;cursor:pointer;" class="statuspembelian pull-right glyphicon glyphicon-triangle-bottom"></span>
			<?php } ?>
			
				<?php }else{?>
				
			<?php $status = $baris->Status_Pembelian;
			if($status=='Selesai'){ ?>
			<b style="color:green;">Selesai </b>
			<?php }else if($status=='Pending'){ ?>
			<b style="color:orange;">Pending </b>
			<?php }else if($status=='Proses'){?>
			<b style="color:blue;">Proses </b>
			<?php } ?>
			
				<?php }?>
		</td>
		
		<td align="center" style="padding-top:4px;">
			<?php $hakakses = $this->session->userdata['Hak_Akses'];
				if($hakakses == 'Supplier'){
			?>
			<a href="<?php echo base_url('OrderSupplier/editnota/'.$baris->No_Faktur); ?>"><span title="Set Payment" class="btn btn-success btn-sm glyphicon glyphicon-usd" align="right"></span></a>
			<a href="<?php echo base_url('OrderSupplier/cetaknota/'.$baris->No_Faktur); ?>"><span title="Print Preview" class="btn btn-primary btn-sm glyphicon glyphicon-print" align="right"></span></a>
				<?php }else{
					$status = $baris->Status_Pembelian;
					if($status == "Pending"){
					?>
		
			<a href="<?php echo base_url('OrderSupplier/editnota/'.$baris->No_Faktur); ?>"><span  title="Edit" class="btn btn-success btn-sm glyphicon glyphicon-edit" align="right"></span></a>
			<a href="<?php echo base_url('OrderSupplier/viewhapuspembelian/'.$baris->No_Faktur); ?>"><span  title="Delete" class="btn btn-danger btn-sm glyphicon glyphicon-trash" align="right"></span></a>
			<a href="<?php echo base_url('OrderSupplier/cetaknota/'.$baris->No_Faktur); ?>"><span  title="Print Preview" class="btn btn-primary btn-sm glyphicon glyphicon-print" align="right"></span></a>
					<?php }else{?>
			<a href="<?php echo base_url('OrderSupplier/cetaknota/'.$baris->No_Faktur); ?>"><span  title="Print Preview" class="btn btn-primary btn-sm glyphicon glyphicon-print" align="right"></span></a>
					<?php } ?>			
				<?php } ?>
		</td>
		
		</tr>
		<tr>
			<td colspan="7" class="datastatuspembelian" style="display:none;">
				<form method="post" action="<?php echo base_url('OrderSupplier/statuspembelian'); ?>">
					<input type="hidden" name="No_Faktur" value="<?php echo $baris->No_Faktur; ?>">
						<b>Status Pembelian</b>
						<br>
						<br>
						<input type="radio" name="Status_Pembelian" value="Pending" <?php if ($baris->Status_Pembelian == 'Pending') echo 'checked'; ?> > Pending &nbsp;
						<input type="radio" name="Status_Pembelian" value="Proses" <?php if ($baris->Status_Pembelian == 'Proses') echo 'checked'; ?>> Proses &nbsp;
						<input type="radio" name="Status_Pembelian" value="Selesai" <?php if ($baris->Status_Pembelian == 'Selesai') echo 'checked'; ?>> Selesai &nbsp;
					
						<button style="color:green;background:white;border:none;" class="btn btn-primary glyphicon glyphicon-floppy-saved"></button>
						
					</form>	
			</td>
		</tr>
		<?php
		$no++;
		}
		?>
</table>
<table class="table">	
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