<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title> <?php $nmtoko = $this->session->userdata["Nama_Toko"];
				if($nmtoko){
					echo $nmtoko;
				}else{?>
			Point Of Sale
					<?php }?>
					</title>
			
			<link rel="shortcut icon" href="<?php echo base_url();?>gambartoko/<?php 
			$fttoko = $this->session->userdata["Foto_Toko"];
					if($fttoko){
						echo $fttoko; 
					}else{
						echo "toko3.jpg";
					}
			?>" 
					
	
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap-3.3.7-dist-1/bootstrap-3.3.7-dist/css/bootstrap.min.css">
   <!-- Theme style -->
    <link href="<?php echo base_url()?>assets/menuadmin/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url()?>assets/menuadmin/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />



<script language="JavaScript">
function tampilkanjam()
{
var waktu = new Date();
var jam = waktu.getHours();
var menit = waktu.getMinutes();
var detik = waktu.getSeconds();
var teksjam = new String();

if ( menit <= 9 )
menit = "0" + menit;
if ( detik <= 9 )
detik = "0" + detik;

teksjam = jam + " : " + menit + " : " + detik;
tempatjam.innerHTML = teksjam;
setTimeout ("tampilkanjam()",1000);
}
window.onload = tampilkanjam
</script>
</head>

<body>


	  
  </head>
  <body class="skin-blue" >
    <div class="wrapper" >
      
      <header class="main-header" style="position:fixed;width:100%">
        <!-- Logo -->
		
        <a href="<?php echo base_url("Control/hakadmin"); ?>" class="logo"> 
			<marqueee behavior="alternate">
			
			<img src="<?php echo base_url()?>gambartoko/<?php 
			$fttoko = $this->session->userdata["Foto_Toko"];
					if($fttoko){
							echo $fttoko;
					}else{
							echo "toko4.png";
						}?>" style="width:40px;height:40px;" class="img-circle" alt="User Image" />
			
			<?php $nmtoko = $this->session->userdata["Nama_Toko"];
				if($nmtoko){
					echo "<b>".$nmtoko."</b>";
				}else{?>
			<b>Point Of Sale</b>
					<?php }?>
			</marquee></a>
		
		<!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
		  
		
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
             
              <!-- Notifications: style can be found in dropdown.less -->
              
              <!-- Tasks: style can be found in dropdown.less -->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" id="userlogout">
            
                  <span class="glyphicon glyphicon-user"> <b><?php echo ' '.$this->session->userdata['Username'].' ' ?></b>&nbsp <span class="glyphicon glyphicon-chevron-down pull-right"></span></span>
                </a>
                <ul class="dropdown-menu" id="user">
                  <!-- User image -->
                  <li class="user-header">
					<?php $jk = $this->session->userdata["Jenis_Kelamin"];
						if($jk == "Laki - Laki"){?>
                     <img src="<?php echo base_url()?>assets/images/avatar5.png" class="img-circle" alt="User Image" />
						<?php } else if($jk == "Perempuan"){?>
					 <img src="<?php echo base_url()?>assets/images/avatar3.png" class="img-circle" alt="User Image" />
						<?php }?>	
					<p>
                     <?php echo ' '.$this->session->userdata["Username"].' - '.$this->session->userdata["Hak_Akses"];?>
					 
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat" id="cancellogout">Close</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url();?>Control" class="btn btn-default btn-flat">Log out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar" style="position:fixed;overflow:auto;">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
				<?php $jk = $this->session->userdata["Jenis_Kelamin"];
						if($jk == "Laki - Laki"){?>
                     <img src="<?php echo base_url()?>assets/images/avatar5.png" class="img-circle" alt="User Image" />
						<?php } else if($jk == "Perempuan"){?>
					 <img src="<?php echo base_url()?>assets/images/avatar3.png" class="img-circle" alt="User Image" />
						<?php }?>
			</div>
            <div class="pull-left info">
		
              <p><?php echo ' '.$this->session->userdata['Username'] ?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
		  <center>
			<ul class="sidebar-menu">
				<li>
					<b style="color:white;padding-left:12px;"><?php echo date('d F Y '); ?>
					
					<b id="tempatjam" style="color:white;padding-left:5px;"></b>
					</b>
				</li> 
			</ul>
</center>			
		  <br>
		<!--
		  <form action="#" method="get" class="sidebar-form">
           
			<div class="input-group">
              <input type="text" name="q" class="form-control jam"/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
		  
		  -->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
		  <?php $hakakses = $this->session->userdata["Hak_Akses"];
		  
		  if($hakakses == "Admin"){?>
          <ul class="sidebar-menu">
        
			<li class="header "><span class="glyphicon glyphicon-folder-open"> DATA</span></li>
			 
            <li>
				<a href="#" id="datatable">
					<i class="fa fa-files-o"></i>
						<span>Data Master</span>
						<span class="glyphicon glyphicon-chevron-down pull-right"></span>
				</a>
				<ul class="treeview-menu" id="filedatatable">
					<li><a href="<?php echo base_url();?>AlamatToko"><i class="icon-tag glyphicon text-warning glyphicon-pushpin"></i> Alamat Toko</a></li>
					<li><a href="<?php echo base_url();?>SatuanBahanBaku/index"><i class="icon-tag text-warning glyphicon glyphicon-pushpin"></i> Satuan Barang</a></li>
					<li><a href="<?php echo base_url();?>Gudang/index"><i class="icon-tag glyphicon text-warning glyphicon-pushpin"></i> Gudang</a></li>
					<li><a href="<?php echo base_url();?>Control/databahanbaku"><i class="icon-tag text-warning glyphicon glyphicon-pushpin"></i> Barang</a></li>
					<li><a href="<?php echo base_url();?>Supplier"><i class="icon-tag text-warning glyphicon glyphicon-pushpin"></i> Supplier</a></li>
					<!--<li><a href="<?php echo base_url();?>karyawan"><i class="icon-tag"></i>Table Karyawan</a></li>-->
					<li><a href="<?php echo base_url();?>Barang"><i class="icon-tag text-warning glyphicon glyphicon-pushpin"></i> Barang Jual</a></li>
					<li><a href="<?php echo base_url();?>Customer"><i class="icon-tag text-warning glyphicon glyphicon-pushpin"></i> Customer</a></li>
				</ul>
            </li>
			
			<li class="header"><span class="glyphicon glyphicon-shopping-cart"> TRANSAKSI TOKO</span></li>
			
			<li>
				<a href="#" id="transaksi">
					<i class="fa fa-files-o"></i>
					<span>Transaksi</span>
					<span class="glyphicon glyphicon-chevron-down pull-right"></span>
				</a>
				<ul class="treeview-menu" id="filetransaksi">
					<li><a href="<?php echo base_url();?>Pembelian"><i class="icon-tag text-warning glyphicon glyphicon-pushpin"></i>Order Barang Supplier</a></li>
					<li><a href="<?php echo base_url();?>Penjualan"><i class="icon-tag text-warning glyphicon glyphicon-pushpin"></i>Penjualan Barang</a></li>
				</ul>
            </li>
			
			<li class="header"><span class="glyphicon glyphicon-barcode"> HUTANG PIUTANG</SPAN></li>
			<li>
				<a href="#" id="hutang">
					<i class="fa fa-files-o"></i>
					<span>Hutang</span>
					<span class="glyphicon glyphicon-chevron-down pull-right"></span>
				</a>
				<ul class="treeview-menu" id="filehutang">
					<li><a href="<?php echo base_url();?>Hutang"><i class="icon-tag text-warning glyphicon glyphicon-pushpin"></i>Hutang Piutang</a></li>
					<li><a href="<?php echo base_url();?>Hutang/listhutangreport"><i class="icon-tag text-warning glyphicon glyphicon-pushpin"></i>Report Lunas Hutang</a></li>
				</ul>
            </li>
			
            <li class="header"><span class="glyphicon glyphicon-tasks"> RETUR</span></li>
			<li>
				<a href="#" id="retur">
					<i class="fa fa-files-o"></i>
					<span>Retur Barang</span>
					<span class="glyphicon glyphicon-chevron-down pull-right"></span>
				</a>
				<ul class="treeview-menu" id="fileretur">
					<li><a href="<?php echo base_url();?>ReturPembelian"><i class="icon-tag text-warning glyphicon glyphicon-pushpin"></i>Retur Barang</a></li>
					<li><a href="<?php echo base_url();?>ReportReturPembelian"><i class="icon-tag text-warning glyphicon glyphicon-pushpin"></i>Report Retur Barang</a></li>
				</ul>
            </li>
			
			<li class="header"><span class="glyphicon glyphicon-list-alt"> STOK OPNAME</span></li>
			<li>
				<a href="#" id="stokopname">
					<i class="fa fa-files-o"></i>
					<span>Stok Opname</span>
					<span class="glyphicon glyphicon-chevron-down pull-right"></span>
				</a>
				<ul class="treeview-menu" id="filestokopname">
					<li><a href="<?php echo base_url();?>Stokopname"><i class="fa fa-circle-o text-warning glyphicon glyphicon-pushpin"></i> Stok Opname</a></li>
				</ul>
            </li>
		
			<li class="header"><span class="glyphicon glyphicon-stats"> LAPORAN</span></li>
			<li>
				<a href="#" id="laporanpenjualan">
					<i class="fa fa-files-o"></i>
					<span>Laporan Penjualan</span>
					<span class="glyphicon glyphicon-chevron-down pull-right"></span>
				</a>
				<ul class="treeview-menu" id="filelaporanpenjualan">
					<li><a href="<?php echo base_url();?>LaporanPenjualan"><i class="fa fa-circle-o text-warning glyphicon glyphicon-pushpin"></i> Rekap Penjualan</a></li>
				</ul>
            </li>
			
			<li class="header"><span class="glyphicon glyphicon-user"> USER</span></li>
			<li>
				<a href="#" id="datauser">
					<i class="fa fa-files-o"></i>
					<span>Data User</span>
					<span class="glyphicon glyphicon-chevron-down pull-right"></span>
				</a>
				<ul class="treeview-menu" id="fileuser">
					<li><a href="<?php echo base_url();?>User"><i class="fa fa-circle-o text-warning glyphicon glyphicon-pushpin"></i> User</a></li>
				</ul>
            </li>
			
            <li class="header"></li>
			
            <!--
            <li><a href="<?php echo base_url();?>cbarcode"><i class="fa fa-circle-o text-warning"></i> barcode</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-info"></i> Information</a></li>
         -->
		</ul>
		 
		  <?php }
		  // akses Pemilik Toko
		  else if($hakakses == "Pemilik Toko"){?>
		 
		<ul class="sidebar-menu">
			<li class="header"><span class="glyphicon glyphicon-stats"> LAPORAN</span></li>
			<li>
				<a href="#" id="laporanpenjualan">
					<i class="fa fa-files-o"></i>
					<span>Laporan Penjualan</span>
					<span class="glyphicon glyphicon-chevron-down pull-right"></span>
				</a>
				<ul class="treeview-menu" id="filelaporanpenjualan">
					<li><a href="<?php echo base_url();?>LaporanPenjualan"><i class="fa fa-circle-o text-warning glyphicon glyphicon-pushpin"></i> Rekap Penjualan</a></li>
				</ul>
            </li>
			
			<li class="header"><span class="glyphicon glyphicon-user"> USER</span></li>
			<li>
				<a href="#" id="datauser">
					<i class="fa fa-files-o"></i>
					<span>Data User</span>
					<span class="glyphicon glyphicon-chevron-down pull-right"></span>
				</a>
				<ul class="treeview-menu" id="fileuser">
					<li><a href="<?php echo base_url();?>User"><i class="fa fa-circle-o text-warning glyphicon glyphicon-pushpin"></i> User</a></li>
				</ul>
            </li>
            <li class="header"></li>
	
		</ul>
		 
		  <?php }
		   else if($hakakses == "Kepala Gudang"){?>
		 
		<ul class="sidebar-menu">
			<li class="header "><span class="glyphicon glyphicon-folder-open"> DATA</span></li>
			 
            <li>
				<a href="#" id="datatable">
					<i class="fa fa-files-o"></i>
						<span>Data Master</span>
						<span class="glyphicon glyphicon-chevron-down pull-right"></span>
				</a>
				<ul class="treeview-menu" id="filedatatable">
					<li><a href="<?php echo base_url();?>AlamatToko"><i class="icon-tag glyphicon text-warning glyphicon-pushpin"></i> Alamat Toko</a></li>
					<li><a href="<?php echo base_url();?>SatuanBahanBaku/index"><i class="icon-tag text-warning glyphicon glyphicon-pushpin"></i> Satuan Barang</a></li>
					<li><a href="<?php echo base_url();?>Gudang/index"><i class="icon-tag glyphicon text-warning glyphicon-pushpin"></i> Gudang</a></li>
					<li><a href="<?php echo base_url();?>Control/databahanbaku"><i class="icon-tag text-warning glyphicon glyphicon-pushpin"></i> Barang</a></li>
					<li><a href="<?php echo base_url();?>Supplier"><i class="icon-tag text-warning glyphicon glyphicon-pushpin"></i> Supplier</a></li>
					<!--<li><a href="<?php echo base_url();?>karyawan"><i class="icon-tag"></i>Table Karyawan</a></li>-->
					<!--<li><a href="<?php echo base_url();?>Barang"><i class="icon-tag text-warning glyphicon glyphicon-pushpin"></i> Barang Jual</a></li>-->
					<!--<li><a href="<?php echo base_url();?>Customer"><i class="icon-tag text-warning glyphicon glyphicon-pushpin"></i> Customer</a></li>-->
				</ul>
            </li>
			
			<li class="header"><span class="glyphicon glyphicon-shopping-cart"> TRANSAKSI TOKO</span></li>
			
			<li>
				<a href="#" id="transaksi">
					<i class="fa fa-files-o"></i>
					<span>Transaksi</span>
					<span class="glyphicon glyphicon-chevron-down pull-right"></span>
				</a>
				<ul class="treeview-menu" id="filetransaksi">
					<li><a href="<?php echo base_url();?>Pembelian"><i class="icon-tag text-warning glyphicon glyphicon-pushpin"></i>Order Barang Supplier</a></li>
					<!--<li><a href="<?php echo base_url();?>Penjualan"><i class="icon-tag text-warning glyphicon glyphicon-pushpin"></i>Penjualan Barang</a></li>-->
				</ul>
            </li>
			
            <li class="header"><span class="glyphicon glyphicon-tasks"> RETUR</span></li>
			<li>
				<a href="#" id="retur">
					<i class="fa fa-files-o"></i>
					<span>Retur Barang</span>
					<span class="glyphicon glyphicon-chevron-down pull-right"></span>
				</a>
				<ul class="treeview-menu" id="fileretur">
					<li><a href="<?php echo base_url();?>ReturPembelian"><i class="icon-tag text-warning glyphicon glyphicon-pushpin"></i>Retur Barang</a></li>
					<li><a href="<?php echo base_url();?>ReportReturPembelian"><i class="icon-tag text-warning glyphicon glyphicon-pushpin"></i>Report Retur Barang</a></li>
				</ul>
            </li>
			
			<li class="header"><span class="glyphicon glyphicon-list-alt"> STOK OPNAME</span></li>
			<li>
				<a href="#" id="stokopname">
					<i class="fa fa-files-o"></i>
					<span>Stok Opname</span>
					<span class="glyphicon glyphicon-chevron-down pull-right"></span>
				</a>
				<ul class="treeview-menu" id="filestokopname">
					<li><a href="<?php echo base_url();?>Stokopname"><i class="fa fa-circle-o text-warning glyphicon glyphicon-pushpin"></i> Stok Opname</a></li>
				</ul>
            </li>
		
			<li class="header"><span class="glyphicon glyphicon-user"> USER</span></li>
			<li>
				<a href="#" id="datauser">
					<i class="fa fa-files-o"></i>
					<span>Data User</span>
					<span class="glyphicon glyphicon-chevron-down pull-right"></span>
				</a>
				<ul class="treeview-menu" id="fileuser">
					<li><a href="<?php echo base_url();?>User"><i class="fa fa-circle-o text-warning glyphicon glyphicon-pushpin"></i> User</a></li>
				</ul>
            </li>
            <li class="header"></li>
	
		</ul>
		 
		  <?php }
		 else if($hakakses == "Kepala Penjualan"){?>
		 <ul class="sidebar-menu">
		<li class="header "><span class="glyphicon glyphicon-folder-open"> DATA</span></li>
			 
            <li>
				<a href="#" id="datatable">
					<i class="fa fa-files-o"></i>
						<span>Data Master</span>
						<span class="glyphicon glyphicon-chevron-down pull-right"></span>
				</a>
				<ul class="treeview-menu" id="filedatatable">
					<li><a href="<?php echo base_url();?>AlamatToko"><i class="icon-tag glyphicon text-warning glyphicon-pushpin"></i> Alamat Toko</a></li>
					<li><a href="<?php echo base_url();?>SatuanBahanBaku/index"><i class="icon-tag text-warning glyphicon glyphicon-pushpin"></i> Satuan Barang</a></li>
					<li><a href="<?php echo base_url();?>Gudang/index"><i class="icon-tag glyphicon text-warning glyphicon-pushpin"></i> Gudang</a></li>
					<li><a href="<?php echo base_url();?>Control/databahanbaku"><i class="icon-tag text-warning glyphicon glyphicon-pushpin"></i> Barang</a></li>
					<li><a href="<?php echo base_url();?>Supplier"><i class="icon-tag text-warning glyphicon glyphicon-pushpin"></i> Supplier</a></li>
					<!--<li><a href="<?php echo base_url();?>karyawan"><i class="icon-tag"></i>Table Karyawan</a></li>-->
					<li><a href="<?php echo base_url();?>Barang"><i class="icon-tag text-warning glyphicon glyphicon-pushpin"></i> Barang Jual</a></li>
					<li><a href="<?php echo base_url();?>Customer"><i class="icon-tag text-warning glyphicon glyphicon-pushpin"></i> Customer</a></li>
				</ul>
            </li>
			
			<li class="header"><span class="glyphicon glyphicon-shopping-cart"> TRANSAKSI TOKO</span></li>
			
			<li>
				<a href="#" id="transaksi">
					<i class="fa fa-files-o"></i>
					<span>Transaksi</span>
					<span class="glyphicon glyphicon-chevron-down pull-right"></span>
				</a>
				<ul class="treeview-menu" id="filetransaksi">
					<!--<li><a href="<?php echo base_url();?>Pembelian"><i class="icon-tag text-warning glyphicon glyphicon-pushpin"></i>Order Barang Supplier</a></li>-->
					<li><a href="<?php echo base_url();?>Penjualan"><i class="icon-tag text-warning glyphicon glyphicon-pushpin"></i>Penjualan Barang</a></li>
				</ul>
            </li>
			
			<li class="header"><span class="glyphicon glyphicon-barcode"> HUTANG PIUTANG</SPAN></li>
			<li>
				<a href="#" id="hutang">
					<i class="fa fa-files-o"></i>
					<span>Hutang</span>
					<span class="glyphicon glyphicon-chevron-down pull-right"></span>
				</a>
				<ul class="treeview-menu" id="filehutang">
					<li><a href="<?php echo base_url();?>Hutang"><i class="icon-tag text-warning glyphicon glyphicon-pushpin"></i>Hutang Piutang</a></li>
					<li><a href="<?php echo base_url();?>Hutang/listhutangreport"><i class="icon-tag text-warning glyphicon glyphicon-pushpin"></i>Report Lunas Hutang</a></li>
				</ul>
            </li>
			
			<li class="header"><span class="glyphicon glyphicon-list-alt"> STOK OPNAME</span></li>
			<li>
				<a href="#" id="stokopname">
					<i class="fa fa-files-o"></i>
					<span>Stok Opname</span>
					<span class="glyphicon glyphicon-chevron-down pull-right"></span>
				</a>
				<ul class="treeview-menu" id="filestokopname">
					<li><a href="<?php echo base_url();?>Stokopname"><i class="fa fa-circle-o text-warning glyphicon glyphicon-pushpin"></i> Stok Opname</a></li>
				</ul>
            </li>
		
			<li class="header"><span class="glyphicon glyphicon-user"> USER</span></li>
			<li>
				<a href="#" id="datauser">
					<i class="fa fa-files-o"></i>
					<span>Data User</span>
					<span class="glyphicon glyphicon-chevron-down pull-right"></span>
				</a>
				<ul class="treeview-menu" id="fileuser">
					<li><a href="<?php echo base_url();?>User"><i class="fa fa-circle-o text-warning glyphicon glyphicon-pushpin"></i> User</a></li>
				</ul>
            </li>
			
            <li class="header"></li>
			
		</ul>
		 <?php }
		 // Kasir
		  else if($hakakses == "Kasir"){?>
		<ul class="sidebar-menu">
        
			<li class="header"><span class="glyphicon glyphicon-shopping-cart"> TRANSAKSI TOKO</span></li>
			
			<li>
				<a href="#" id="transaksi">
					<i class="fa fa-files-o"></i>
					<span>Transaksi</span>
					<span class="glyphicon glyphicon-chevron-down pull-right"></span>
				</a>
				<ul class="treeview-menu" id="filetransaksi">
					<!--<li><a href="<?php echo base_url();?>Pembelian"><i class="icon-tag text-warning glyphicon glyphicon-pushpin"></i>Order Barang Supplier</a></li>-->
					<li><a href="<?php echo base_url();?>Penjualan"><i class="icon-tag text-warning glyphicon glyphicon-pushpin"></i>Penjualan Barang</a></li>
				</ul>
            </li>
			
			<li class="header"><span class="glyphicon glyphicon-barcode"> HUTANG PIUTANG</SPAN></li>
			<li>
				<a href="#" id="hutang">
					<i class="fa fa-files-o"></i>
					<span>Hutang</span>
					<span class="glyphicon glyphicon-chevron-down pull-right"></span>
				</a>
				<ul class="treeview-menu" id="filehutang">
					<li><a href="<?php echo base_url();?>Hutang"><i class="icon-tag text-warning glyphicon glyphicon-pushpin"></i>Hutang Piutang</a></li>
					<li><a href="<?php echo base_url();?>Hutang/listhutangreport"><i class="icon-tag text-warning glyphicon glyphicon-pushpin"></i>Report Lunas Hutang</a></li>
				</ul>
            </li>
			
            <li class="header"></li>
			
            <!--
            <li><a href="<?php echo base_url();?>cbarcode"><i class="fa fa-circle-o text-warning"></i> barcode</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-info"></i> Information</a></li>
         -->
		</ul>
		  <?php }
		  // Accountant
		  else if($hakakses == "Accountant"){?>
		<ul class="sidebar-menu">
			
			<li class="header"><span class="glyphicon glyphicon-shopping-cart"> TRANSAKSI TOKO</span></li>
			
			<li>
				<a href="#" id="transaksi">
					<i class="fa fa-files-o"></i>
					<span>Transaksi</span>
					<span class="glyphicon glyphicon-chevron-down pull-right"></span>
				</a>
				<ul class="treeview-menu" id="filetransaksi">
					<li><a href="<?php echo base_url();?>Pembelian"><i class="icon-tag text-warning glyphicon glyphicon-pushpin"></i>Order Barang Supplier</a></li>
					<li><a href="<?php echo base_url();?>Penjualan"><i class="icon-tag text-warning glyphicon glyphicon-pushpin"></i>Penjualan Barang</a></li>
				</ul>
            </li>
			
			<li class="header"><span class="glyphicon glyphicon-barcode"> HUTANG PIUTANG</SPAN></li>
			<li>
				<a href="#" id="hutang">
					<i class="fa fa-files-o"></i>
					<span>Hutang</span>
					<span class="glyphicon glyphicon-chevron-down pull-right"></span>
				</a>
				<ul class="treeview-menu" id="filehutang">
					<li><a href="<?php echo base_url();?>Hutang"><i class="icon-tag text-warning glyphicon glyphicon-pushpin"></i>Hutang Piutang</a></li>
					<li><a href="<?php echo base_url();?>Hutang/listhutangreport"><i class="icon-tag text-warning glyphicon glyphicon-pushpin"></i>Report Lunas Hutang</a></li>
				</ul>
            </li>
			
            <li class="header"><span class="glyphicon glyphicon-tasks"> RETUR</span></li>
			<li>
				<a href="#" id="retur">
					<i class="fa fa-files-o"></i>
					<span>Retur Barang</span>
					<span class="glyphicon glyphicon-chevron-down pull-right"></span>
				</a>
				<ul class="treeview-menu" id="fileretur">
					<li><a href="<?php echo base_url();?>ReturPembelian"><i class="icon-tag text-warning glyphicon glyphicon-pushpin"></i>Retur Barang</a></li>
					<li><a href="<?php echo base_url();?>ReportReturPembelian"><i class="icon-tag text-warning glyphicon glyphicon-pushpin"></i>Report Retur Barang</a></li>
				</ul>
            </li>
		
			<li class="header"><span class="glyphicon glyphicon-stats"> LAPORAN</span></li>
			<li>
				<a href="#" id="laporanpenjualan">
					<i class="fa fa-files-o"></i>
					<span>Laporan Penjualan</span>
					<span class="glyphicon glyphicon-chevron-down pull-right"></span>
				</a>
				<ul class="treeview-menu" id="filelaporanpenjualan">
					<li><a href="<?php echo base_url();?>LaporanPenjualan"><i class="fa fa-circle-o text-warning glyphicon glyphicon-pushpin"></i> Rekap Penjualan</a></li>
				</ul>
            </li>
			
            <li class="header"></li>
			
            <!--
            <li><a href="<?php echo base_url();?>cbarcode"><i class="fa fa-circle-o text-warning"></i> barcode</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-info"></i> Information</a></li>
         -->
		</ul> 
		  <?php }
		  // Accountant
		  else if($hakakses == "Supplier"){?>
		<ul class="sidebar-menu">
			<li class="header"><span class="glyphicon glyphicon-shopping-cart"> TRANSAKSI</span></li>
			
			<li>
				<a href="#" id="transaksi">
					<i class="fa fa-files-o"></i>
					<span>Transaksi Supplier</span>
					<span class="glyphicon glyphicon-chevron-down pull-right"></span>
				</a>
				<ul class="treeview-menu" id="filetransaksi">
					<li><a href="<?php echo base_url();?>OrderSupplier"><i class="icon-tag text-warning glyphicon glyphicon-pushpin"></i>Order Barang Supplier</a></li>
				</ul>
            </li>
            <li class="header"></li>
	
		</ul>
		  <?php }
		  ?>
        </section>
        <!-- /.sidebar -->
      </aside>
	  
    </div>
	<div style="padding-top:50px;"> 
	
	
	<!-- ./wrapper -->
  <!-- jQuery 2.1.3 -->
    <script src="<?php echo base_url()?>assets/menuadmin/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url()?>assets/menuadmin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
    <!-- AdminLTE App -->
    <script src="<?php echo base_url()?>assets/menuadmin/dist/js/app.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <!-- jvectormap -->
    <!-- ChartJS 1.0.1 -->
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url()?>assets/menuadmin/dist/js/demo.js" type="text/javascript"></script>
	<script>
$(document).ready(function(){

    $("#datatable").click(function(){
        $("#filedatatable").slideToggle();

    });
//////////////////////////////////
 $("#hutang").click(function(){
        $("#filehutang").slideToggle();

    });
//////////////////////////////////
 $("#laporanpenjualan").click(function(){
        $("#filelaporanpenjualan").slideToggle();

    });
//////////////////////////////////
 $("#transaksi").click(function(){
        $("#filetransaksi").slideToggle();

    });
//////////////////////////////////
 $("#retur").click(function(){
        $("#fileretur").slideToggle();

    });
//////////////////////////////////
 $("#stokopname").click(function(){
        $("#filestokopname").slideToggle();

    });
//////////////////////////////////
 $("#datauser").click(function(){
        $("#fileuser").slideToggle();

    })

/////////////////////////////////////   
 $("#userlogout").click(function(){
        $("#user").slideDown();

    });
   $("#cancellogout").click(function(){
        $("#user").slideUp();
   });
////////////////////////////////////
});
</script>
  </body>
</html>