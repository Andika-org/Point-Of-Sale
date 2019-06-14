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


  <script type="text/javascript">

 function tes(id,hakakses) {
	 if(hakakses == "Kepala Gudang"){
		 $("#aksesinformation").modal("show");
	 }else{
		if (confirm("Are you sure continue to payment ?")) {
        $.ajax({
            url: "<?php echo base_url('SatuanBahanBaku/hapus/')?>" + id,
            //type: 'post',
            data: id,
            success: function () {
				window.location.href="<?php echo base_url('Pembelian/editnota/')?>"+id+"";
            },
            error: function () {
                alert('ajax failure');
            }
        });
    } else {
        alert(id + " not process");
    } 
	
 }
    
}

function tambahdata(hakaksespurchase) {
	 if(hakaksespurchase == "Accountant"){
		 $("#aksesinformation").modal("show");
	 }
	 else if(hakaksespurchase == "Kepala Penjualan"){
		 $("#aksesinformation").modal("show");
	 }
	 else if(hakaksespurchase == "Kasir"){
		if (confirm("Are you sure continue to purchase ?")) {
     
				window.location.href="<?php echo base_url('Penjualan/inputpembelian')?>";
    
    } else {
        alert(" not process");
    } 
	
 }
    
}


function deletedata(id,hakaksesdelete) {
	 if(hakaksesdelete == "Accountant"){
		 $("#aksesinformation").modal("show");
	 }
	 else if(hakaksesdelete == "Kepala Penjualan"){
		 $("#aksesinformation").modal("show");
	 }
	 else if(hakaksesdelete == "Kasir"){
		if (confirm("Are you sure delete to purchase ?")) {
     
				window.location.href="<?php echo base_url('Penjualan/viewhapuspenjualan/')?>"+id+"";
    
    } else {
        alert(" not process");
    } 
	
 }
    
}

function editdata(id,hakaksesedit) {
	 if(hakaksesedit == "Accountant"){
		 $("#aksesinformation").modal("show");
	 }
	 else if(hakaksesedit == "Kepala Penjualan"){
		 $("#aksesinformation").modal("show");
	 }
	 else if(hakaksesedit == "Kasir"){
		if (confirm("Are you sure update to purchase ?")) {
     
				window.location.href="<?php echo base_url('Penjualan/vieweditpenjualan/')?>"+id+"";
    
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
	<h2 style="color:brown" align="center"><b>Data Pembelian Barang</b></h2>
	<legend>
	</legend>

<table id="cetak" class="table" >

	<!--<<form method="post">
	<input type="text" class="form-control" name="batas" id="textboxnya">
	<!--<input type="submit" class="btn btn-warning glyphicon glyphicon-plus" value="1" id="textboxnya"> 
	</form>
	--> 
	<form action="<?php print site_url();?>/Penjualan/carinota" method="POST">
		<div class="navbar-header">
			<span onclick="tambahdata('<?php echo $this->session->userdata['Hak_Akses'] ?>')" class="btn btn-primary glyphicon glyphicon-shopping-cart"><b> New</b></span>  
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
	<form action="<?php print site_url();?>/Penjualan/index2" method=POST>
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
			<th align="center"><b>Nota</b></th>
			<th align="center"><b>Pegawai</b></th>
			<th align="center"><b>Tanggal Penjualan</b></th>
			<th align="center"><b>Discount</b></th>
			<th align="center"><b>Ppn</b></th>
			<th align="center"><b>Total Pembelian</b></th>
			<th align="center"><b>Status</b></th>
			<th align="center"><b>Tools</b></th>
		</tr>
		
		<?php 
		$no = $this->uri->segment('3') + 1;
		foreach($datatable as $baris){
			
		?>
		
		<tr>
		<td align="center" style="padding-top:10px;"><?php echo $no; ?></td>
		<td align="left" style="padding-top:10px;"><?php echo $baris->Nota; ?>
		<td align="center" style="padding-top:10px;"><?php echo $baris->Nama; ?>
		</td>
		<td align="center" style="padding-top:10px;"><?php echo date('d F Y',strtotime($baris->Tanggal_Penjualan)); ?></td>
		<td align="left" style="padding-top:10px;"><?php echo $baris->Discount." %"; ?>
		<td align="left" style="padding-top:10px;"><?php echo $baris->Ppn." %"; ?>
		<td align="left" style="padding-top:10px;"><?php echo 'Rp. '.number_format($baris->Total_Pembelian,0,",","."); ?></td>
		<td align="left" style="padding-top:10px;"><?php echo $baris->Status; ?>
		
		
		<td align="center" style="padding-top:4px;">
		<?php $sts = $baris->Status;
			if($sts == "Lunas"){
			?>
			
			
			<a href="<?php echo base_url("Hutang/datacetakhutangreportpadamenupenjualan/".$baris->Nota); ?>"><span style="color:blue;"  title="View Lunas Hutang" class="btn btn-default btn-sm glyphicon glyphicon-eye-open"></span></a>
			<span onclick="deletedata('<?php echo $baris->Nota ?>','<?php echo $this->session->userdata['Hak_Akses'] ?>')" title="Delete Nota" class="btn btn-danger btn-sm glyphicon glyphicon-trash" align="right"></span>
			<a onclick="return confirm('View Nota Dengan Nomor Nota <?php echo $baris->Nota; ?> ')" href="<?php echo base_url('Penjualan/notapenjualan/'.$baris->Nota); ?>"><span  title="Cetak Nota" class="btn btn-primary btn-sm glyphicon glyphicon-print" align="right"></span></a>
			<?php
			}else if($sts == "Hutang"){
				?>
			<a href="<?php echo base_url("Hutang/datacetakhutangketikaklikdimenupenjualan/".$baris->Nota); ?>"><span style="color:blue;"  title="View Hutang" class="btn btn-default btn-sm glyphicon glyphicon-eye-open"></span></a>
			<span onclick="deletedata('<?php echo $baris->Nota ?>','<?php echo $this->session->userdata['Hak_Akses'] ?>')" title="Delete Nota" class="btn btn-danger btn-sm glyphicon glyphicon-trash" align="right"></span>
			<a onclick="return confirm('View Nota Dengan Nomor Nota <?php echo $baris->Nota; ?> ')" href="<?php echo base_url('Penjualan/notapenjualan/'.$baris->Nota); ?>"><span  title="Cetak Nota" class="btn btn-primary btn-sm glyphicon glyphicon-print" align="right"></span></a>
			<?php
			}else if($sts == "Bayar"){?>
			<span onclick="editdata('<?php echo $baris->Nota ?>','<?php echo $this->session->userdata['Hak_Akses'] ?>')" title="Edit Nota" class="btn btn-success btn-sm glyphicon glyphicon-edit" align="right"></span>
			<span onclick="deletedata('<?php echo $baris->Nota ?>','<?php echo $this->session->userdata['Hak_Akses'] ?>')" title="Delete Nota" class="btn btn-danger btn-sm glyphicon glyphicon-trash" align="right"></span>
			<a onclick="return confirm('View Nota Dengan Nomor Nota <?php echo $baris->Nota; ?> ')" href="<?php echo base_url('Penjualan/notapenjualan/'.$baris->Nota); ?>"><span  title="Cetak Nota" class="btn btn-primary btn-sm glyphicon glyphicon-print" align="right"></span></a>
			<?php }?>
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