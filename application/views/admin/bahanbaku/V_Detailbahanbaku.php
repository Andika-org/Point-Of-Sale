<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
 <link href="<?php echo base_url()?>assets/untukcssfoto/layout2.css" rel="stylesheet" type="text/css" media="all">   
<link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap-3.3.7-dist-1/bootstrap-3.3.7-dist/css/bootstrap.min.css">
  
 </head>

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

 <style type="text/css">
	#tooltip{
		//color: #1f8b8a;
		//border-bottom: thin dashed #1d7b77;
		position: relative;
		cursor: pointer;
		line-height: 2.5;
	}
	#tooltip:before,
	#tooltip:after{
		display: block;
		position: absolute;
		visibility: hidden;
		opacity: 0;
		transition: opacity .2s;
		line-height: 1.3;
	}
	#tooltip:before{
		width: 190px;
		padding: 10px;
		box-sizing: border-box;
		bottom: 25px;
		font-size: .9em;
		text-align: center;
		margin-left: 0px;
		background: #00AFAF;
		content: attr(data-title);
		color: #fff;
	}
	#tooltip:after{
		content: "";
		border-top: 7px solid #00AFAF;
		border-left: 7px solid transparent;
		border-right: 7px solid transparent;
		bottom: 18px;
		margin-left: 10px;
	}
	#tooltip:hover:before,
	#tooltip:hover:after{
		visibility: visible;
		opacity: 1;
		margin-bottom: 0px;
	}
</style>

</head>
<body>		
<div class="container">

<div class="col-xs-12 pull-left" style="padding-left:200px;"> 
<br>
<a href="<?php echo base_url('Barang');?>" class="btn btn-danger glyphicon glyphicon-chevron-left"> Back</a>
<br>
<br>
<legend>
</legend><!--
<h2 style="color:brown" class="" align="center"><b>Detail Bahan Baku</b></h2>
-->
	<div class="col-xs-12" style="margin-top:0px;">
		<div class="Compose-Message">               
			<div class="panel panel-default" style="margin-bottom:0px;" >
				<div class="panel-heading" style="border:1px solid #DDDDDD;margin-bottom:-4px;background:#DDDDDD;">
                       
				<b>Detail Barang</b>
				</div>
		<div class="panel-body" style="border:1px solid #DDDDDD">
                        
		<table class="table" style="margin-bottom:0px;background-color:white;">
			<tr>
				<td>Kode Barang</td>
				<td>
					<?php echo $baris['Kode_Bahan_Baku']?>
				</td>
			</tr>
			<tr >
				<td>Gudang</td>
				<td>
					<?php echo $baris['Nama_Gudang']?>
				</td>
			</tr>
			<tr>
				<td>Nama Barang</td>
				<td>
					<?php echo $baris['Nama_Barang']?>
				</td>
			</tr>
			<tr>
				<td>Foto Barang</td>
				<td>
					<figure class="member-photo2">
						<img width="200" height="200" <?php echo img('fotobahanbaku/'.$baris['Foto_Barang']);?>
					</figure>
				</td>
			</tr>
			<tr>
				<td>Stok</td>
				<td>
					<?php 
		$nmlv1 = $baris["Name_Lv1"];
		
		if($nmlv1){
			$stok1 = $baris["Lv1"].' '.$nmlv1;
		}else{
			$stok1 = " ";
		}
		
		echo $stok1;
				?>
				</td>
			</tr>
			<!--<tr>
				<td>Stok</td>
				<td>
					<?php /*
		$nmlv1 = $baris["Name_Lv1"];
		$nmlv2 = $baris["Name_Lv2"];
		$nmlv3 = $baris["Name_Lv3"];
		$nmlv4 = $baris["Name_Lv4"];
		
		if($nmlv1){
			$stok1 = $baris["Lv1"].' '.$nmlv1;
		}else{
			$stok1 = " ";
		}
		if($nmlv2){
			$stok2 = $baris["Isi_Lv2"].' '.$nmlv2;
		}else{
			$stok2 = " ";
		}
		if($nmlv3){
			$stok3 = $baris["Isi_Lv3"].' '.$nmlv3;
		}else{
			$stok3 = " ";
		}
		if($nmlv4){
			$stok4 = $baris["Isi_Lv4"].' '.$nmlv4;
		}else{
			$stok4 = " ";
		}
		
		echo $stok1.'<br>'.$stok2.'<br>'.$stok3.'<br>'.$stok4;
				*/?>
				</td>
			</tr>
			-->
		<tr>
						<td>Isi Default</td>
						<td>
							<?php
								$nmlv1 = $baris["Name_Lv1"];
								$nmlv2 = $baris["Name_Lv2"];
								$nmlv3 = $baris["Name_Lv3"];
								$nmlv4 = $baris["Name_Lv4"];
								
								
								if($nmlv1){
									$stok1 = $baris['Isi_Lv1'].' '.$nmlv1;
								}else{
									$stok1 = " ";
								}
								if($nmlv2){
									$stok2 = '1 '.$nmlv1.' Isi '.$baris['Lv2'].' '.$nmlv2;
								}else{
									$stok2 = " ";
								}
								if($nmlv3){
									$stok3 = '1 '.$nmlv2.' Isi '.$baris['Lv3'].' '.$nmlv3;
								}else{
									$stok3 = " ";
								}
								if($nmlv4){
									$stok4 = '1 '.$nmlv3.' Isi '.$baris['Lv4'].' '.$nmlv4;
								}else{
									$stok4 = " ";
								}
								echo $stok1.'<br>'.$stok2.'<br>'.$stok3.'<br>'.$stok4;
							?>
						</td>
					</tr>
			<tr>
				<td>Status</td>
				<td>
					<?php
					$sts = $baris["Lv1"];
						if($sts > 5){
							echo "<b style='color:green;'>Stok Tersedia </b>";
						}else if($sts >= 5){
							echo "<b style='color:orange;'>Tambah Stok </b>";
						}else if($sts >= 1){
							echo "<b style='color:orange;'>Tambah Stok </b>";
						}else if($sts < 1){
							echo "<b style='color:red;'>Stok Tidak Tersedia </b>";
						}
					?>
				</td>
			</tr>
			
		</table>

		</div>
		</div>
	</div>
	</div>
</div>
</div>

  </body>
</html>

	