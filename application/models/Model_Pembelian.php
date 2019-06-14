<?php 
class Model_Pembelian extends CI_Model{

public function getrowheaderpembelian(){	
		$query = $this->db->get ('tb_header_pembelian_bahanbaku');	
		return  $query->num_rows();
} 	
public function getdataautocomplete($keyword){
	/*$q = $this->db->query("select Kode_Bahan_Baku, Nama_Barang, Harga_Beli, tb_satuan_bahan_baku.Satuan_Bahan_Baku
							from tb_bahan_baku join tb_satuan_bahan_baku
							on tb_bahan_baku.Satuan = tb_satuan_bahan_baku.Id_Satuan
							where tb_bahan_baku.Kode_Bahan_Baku like '%$keyword%' or tb_bahan_baku.Nama_Barang like '%$keyword%'");
		*/
		$this->db->like('Kode_Bahan_Baku',$keyword);
		$this->db->or_like('Nama_Barang',$keyword);
		$sql = $this->db->get('tb_bahan_baku');
		//$sql = $this->db->query('select * from tb_bahan_baku');
		return $sql;
		//db->from('cookville_items')->like('namaproduk',$keyword)->get();	
	}
public function listdatapembelianbahanbaku($limit,$offset){
		$q = $this->db->query("select tb_header_pembelian_bahanbaku.No_Faktur, tb_header_pembelian_bahanbaku.Tanggal_Pembelian, tb_header_pembelian_bahanbaku.Total_Pembelian, tb_supplier.Kode_Supplier, tb_supplier.Nama_Supplier, tb_supplier.Deskripsi, tb_header_pembelian_bahanbaku.Status_Pembelian
		from tb_header_pembelian_bahanbaku join tb_supplier
		on tb_header_pembelian_bahanbaku.Kode_Supplier = tb_supplier.Kode_Supplier
		Order By tb_header_pembelian_bahanbaku.Tanggal_Pembelian DESC LIMIT $offset,$limit");
		return  $q->result();
	}
	
public function searchingdatanota(){
		$tglawal = date('Y-m-d', strtotime($this->input->post('Tanggal_Awal')));
		$tglakhir = date('Y-m-d', strtotime($this->input->post('Tanggal_Akhir')));
		
		$b = $this->db->query("select tb_header_pembelian_bahanbaku.No_Faktur, tb_header_pembelian_bahanbaku.Tanggal_Pembelian, tb_header_pembelian_bahanbaku.Total_Pembelian, tb_supplier.Kode_Supplier, tb_supplier.Nama_Supplier, tb_supplier.Deskripsi, tb_header_pembelian_bahanbaku.Status_Pembelian
		from tb_header_pembelian_bahanbaku join tb_supplier
		on tb_header_pembelian_bahanbaku.Kode_Supplier = tb_supplier.Kode_Supplier
		where tb_header_pembelian_bahanbaku.Tanggal_Pembelian BETWEEN '$tglawal' AND '$tglakhir'
		Order By tb_header_pembelian_bahanbaku.Tanggal_Pembelian Asc ");
		
		return  $b->result();
	}
public function searchingdataall(){
		$cari = $this->input->post('cariall');

		$b = $this->db->query("select tb_header_pembelian_bahanbaku.No_Faktur, tb_header_pembelian_bahanbaku.Tanggal_Pembelian, tb_header_pembelian_bahanbaku.Total_Pembelian, tb_supplier.Kode_Supplier, tb_supplier.Nama_Supplier, tb_supplier.Deskripsi, tb_header_pembelian_bahanbaku.Status_Pembelian
		from tb_header_pembelian_bahanbaku join tb_supplier
		on tb_header_pembelian_bahanbaku.Kode_Supplier = tb_supplier.Kode_Supplier
		where tb_header_pembelian_bahanbaku.No_Faktur like '%$cari%' or tb_header_pembelian_bahanbaku.Total_Pembelian like '%$cari%' or tb_supplier.Nama_Supplier like '%$cari%' or tb_header_pembelian_bahanbaku.Status_Pembelian like '%$cari%'");
		
		return  $b->result();
	}
public function simpanpembeliantbbantu(){
	$lv1 = $this->input->post("QtyLv1");
	$lv2 = $this->input->post("QtyLv2");
	$lv3 = $this->input->post("QtyLv3");
	$lv4 = $this->input->post("QtyLv4");
	
	$name1 = $this->input->post("nmlv1");
	$name2 = $this->input->post("nmlv2");
	$name3 = $this->input->post("nmlv3");
	$name4 = $this->input->post("nmlv4");
	
	
	if($lv1){
		$level = "Lv1";
	}else if($lv2){
		$level = "Lv2";
	}else if($lv3){
		$level = "Lv3";
	}else if($lv4){
		$level = "Lv4";
	}
	
	if($lv1){
		$qty = $lv1;
	}else if($lv2){
		$qty = $lv2;
	}else if($lv3){
		$qty = $lv3;
	}else if($lv4){
		$qty = $lv4;
	}
	
	
	if($name1){
		$nmsatuan = $name1;
	}else if($name2){
		$nmsatuan = $name2;
	}else if($name3){
		$nmsatuan = $name3;
	}else if($name4){
		$nmsatuan = $name4;
	}

	$data = array(       
	'Id_Transaksi'=>$this->input->post('Id_Transaksi'),
	
	'Kode_Bahan_Baku'=>$this->input->post('Kode_Bahan_Baku'),
	'Nama_Barang'=>$this->input->post('Nama_Barang'),
	'Qty' => $qty,
	'Nama_Satuan' => $nmsatuan,
	'Level' => $level,
	'Harga_Beli'=>$this->input->post('Harga_Beli'),
	'Kode_User'=>$this->input->post('Kode_User'),
	
	
	);
	$this->db->insert('tb_bantu_pembelian',$data);
	}
public function  simpanpembelianbahanbaku(){
	$lv1 = $this->input->post("QtyLv1");
	$lv2 = $this->input->post("QtyLv2");
	$lv3 = $this->input->post("QtyLv3");
	$lv4 = $this->input->post("QtyLv4");
	
	$name1 = $this->input->post("nmlv1");
	$name2 = $this->input->post("nmlv2");
	$name3 = $this->input->post("nmlv3");
	$name4 = $this->input->post("nmlv4");
	
	
	if($lv1){
		$level = "Lv1";
	}else if($lv2){
		$level = "Lv2";
	}else if($lv3){
		$level = "Lv3";
	}else if($lv4){
		$level = "Lv4";
	}
	
	if($lv1){
		$qty = $lv1;
	}else if($lv2){
		$qty = $lv2;
	}else if($lv3){
		$qty = $lv3;
	}else if($lv4){
		$qty = $lv4;
	}
	
	if($name1){
		$nmsatuan = $name1;
	}else if($name2){
		$nmsatuan = $name2;
	}else if($name3){
		$nmsatuan = $name3;
	}else if($name4){
		$nmsatuan = $name4;
	}
	
	$data = array(       
	'Id_Transaksi'=>$this->input->post('Id_Transaksi'),
	'No_Faktur'=>$this->input->post('No_Faktur'),
	'Kode_User'=>$this->input->post('Kode_User'),
	'Kode_Bahan_Baku'=>$this->input->post('Kode_Bahan_Baku'),
	'Nama_Barang'=>$this->input->post('Nama_Barang'),
	'Qty' 	=> $qty,
	'Level' 	=> $level,
	'Nama_Satuan' 	=> $nmsatuan,
	'Harga_Beli'=>$this->input->post('Harga_Beli'),
	
	);
	$this->db->insert('tb_detail_pembelian',$data);
	}
	
public function ambil_data_headerpembelian($kodenya){ 
		$this->db->where('No_Faktur',$kodenya);
	$sql=$this->db->get('tb_header_pembelian_bahanbaku');
	if($sql->num_rows()>0){
			return $sql->row_array(); 
		}
	}
public function updatenota(){
	$file = $this->upload->data(); 
	$ub = $this->input->post('Ubah_Gambar');
	
	if($ub=='Edit'){
		

	unlink ('fotobuktipembayaran/' .$this->input->post('Gambar_Lama'));
	$tglbeli = date('Y-m-d H:i:s', strtotime($this->input->post('Tanggal_Pembelian')));
	$tgltempo = $this->input->post('Tanggal_Jatuh_Tempo');
	
	if($tgltempo){
		$tgltp = date('Y-m-d', strtotime($this->input->post('Tanggal_Jatuh_Tempo')));
	}
	else if($tgltempo==''){
		$tgltp = '0000-00-00';
	}
	
	$data = array(       
	'Kode_User'=>$this->input->post('Kode_User'),
	'Kode_Supplier'=>$this->input->post('Kode_Supplier'),
	'Tanggal_Pembelian'=>$tglbeli,
	'Discount'=>$this->input->post('Discount'),
	'Ppn'=>$this->input->post('Ppn'),
	'Jenis_Pembayaran'=>$this->input->post('Jenis_Pembayaran'),
	'Tanggal_Jatuh_Tempo'=>$tgltp,
	'Nomor_Rekening'=>$this->input->post('Nomor_Rekening'),
	'Total_Pembelian'=>$this->input->post('Total_Pembelian'),
	'Total_Pembelian_Sebelumnya'=>$this->input->post('Total_Pembelian_Sebelumnya'),
	'Bukti_Pembayaran' 	=> $file['file_name'],
	
	'Nama_Bank'=>$this->input->post('Nama_Bank'),
	'Nominal'=>$this->input->post('Nominal'),
	'Kembali'=>$this->input->post('Kembali'),
	'Atas_Nama'=>$this->input->post('Atas_Nama'),
	
	'Status_Pembelian'=>$this->input->post('Status_Pembelian')
	);
	
	$this->db->where('No_Faktur',$this->input->post('No_Faktur'));
	$this->db->update('tb_header_pembelian_bahanbaku',$data);
	}
	///////////////////////////////////////////////////////////////////////
	else{
	$tglbeli = date('Y-m-d H:i:s', strtotime($this->input->post('Tanggal_Pembelian')));
	$tgltempo = $this->input->post('Tanggal_Jatuh_Tempo');
	
	if($tgltempo){
		$tgltp = date('Y-m-d', strtotime($this->input->post('Tanggal_Jatuh_Tempo')));
	}
	else if($tgltempo==''){
		$tgltp = '0000-00-00';
	}
	
	$data = array(       
	'Kode_User'=>$this->input->post('Kode_User'),
	'Kode_Supplier'=>$this->input->post('Kode_Supplier'),
	'Tanggal_Pembelian'=>$tglbeli,
	'Discount'=>$this->input->post('Discount'),
	'Ppn'=>$this->input->post('Ppn'),
	'Jenis_Pembayaran'=>$this->input->post('Jenis_Pembayaran'),
	'Tanggal_Jatuh_Tempo'=>$tgltp,
	'Nomor_Rekening'=>$this->input->post('Nomor_Rekening'),
	'Total_Pembelian'=>$this->input->post('Total_Pembelian'),
	'Total_Pembelian_Sebelumnya'=>$this->input->post('Total_Pembelian_Sebelumnya'),
	'Bukti_Pembayaran' 	=>$this->input->post('Gambar_Lama'),
	
	'Nama_Bank'=>$this->input->post('Nama_Bank'),
	'Nominal'=>$this->input->post('Nominal'),
	'Kembali'=>$this->input->post('Kembali'),
	'Atas_Nama'=>$this->input->post('Atas_Nama'),
	
	'Status_Pembelian'=>$this->input->post('Status_Pembelian')
	);
	
	$this->db->where('No_Faktur',$this->input->post('No_Faktur'));
	$this->db->update('tb_header_pembelian_bahanbaku',$data);
	}
	redirect(base_url("Pembelian/index")); 
	}
public function updatestatus(){
	$data = array(       
	'Status_Pembelian'=>$this->input->post('Status_Pembelian')
	);
	$this->db->where('No_Faktur',$kode = $this->input->post('No_Faktur'));
	$this->db->update('tb_header_pembelian_bahanbaku',$data);
}
public function hapuspembelian($where){
$this->db->where('Id_Transaksi',$where);
$this->db->delete('tb_detail_pembelian');
return true;
}

public function hapusbantupembelian($where){
$this->db->where('Id_Transaksi',$where);
$this->db->delete('tb_bantu_pembelian');
return true;
}

public function hapustbbantupembelian(){
$user = $this->session->userdata['Kode_User'];
$this->db->where('Kode_User',$user);
$this->db->delete('tb_bantu_pembelian');
return true;
}

public function simpanheaderpembelian(){
	$file = $this->upload->data(); 
	
	date_default_timezone_set('Asia/Jakarta');
	
	$tglbeli = date('Y-m-d H:i:s');
	
	$tgltempo = $this->input->post('Tanggal_Jatuh_Tempo');
	
	if($tgltempo){
		$tgltp = date('Y-m-d', strtotime($this->input->post('Tanggal_Jatuh_Tempo')));
	}else{
		$tgltp = '0000-00-00';
	}
	
	$s = 'Pending';
	
	
	$data = array(       
	'No_Faktur'=>$this->input->post('No_Faktur'),
	'Kode_User'=>$this->input->post('Kode_User'),
	'Kode_Supplier'=>$this->input->post('Kode_Supplier'),
	'Tanggal_Pembelian'=>$tglbeli,
	'Discount'=>$this->input->post('Discount'),
	'Ppn'=>$this->input->post('Ppn'),
	'Jenis_Pembayaran'=>$this->input->post('Jenis_Pembayaran'),
	'Tanggal_Jatuh_Tempo'=>$tgltp,
	
	'Nama_Bank'=>$this->input->post('Nama_Bank'),
	'Nominal'=>$this->input->post('Nominal'),
	'Kembali'=>$this->input->post('Kembali'),
	'Atas_Nama'=>$this->input->post('Atas_Nama'),
	
	'Nomor_Rekening'=>$this->input->post('Nomor_Rekening'),
	'Total_Pembelian'=>$this->input->post('Total_Pembelian'),
	'Total_Pembelian_Sebelumnya'=>$this->input->post('Total_Pembelian_Sebelumnya'),
	'Bukti_Pembayaran' 	=>$file['file_name'],
	'Status_Pembelian'=>$s
	);
	$this->db->insert('tb_header_pembelian_bahanbaku',$data);
	}
	
public function faktur(){
	$this->db->order_by('No_Faktur','DESC');
	$q = $this->db->get('tb_header_pembelian_bahanbaku',1);
		
		$kodeakhir;
		$kodejadi;
		date_default_timezone_set('Asia/Jakarta');
		$date = date('dmy');
		$bel = "BGR";
		
		if(!empty($q->result())){
			foreach($q->result() as $ka){
				$kodeakhir = $ka->No_Faktur;
			}
			$no = substr($kodeakhir,12,5);
				$intno = (int)$no;
				$next = $intno+1;
				
				//buat nol
				$nol = '';
				$Pintno = strlen($next);
				for($i = 1; $i <= 5-$Pintno; $i++){
					$nol = $nol.'0';
				}
				$kodejadi = 'INV'.$date.$bel.$nol.$next;
		}
		else{
			$kodejadi = 'INV'.$date.$bel.'00001';
		}
		return $kodejadi;
		
		
	}
	
public function trans(){
	
	$this->db->order_by('Id_Transaksi','DESC');
	$q = $this->db->get('tb_detail_pembelian',1);
		
		$kodeakhir;
		$kodejadi;
		date_default_timezone_set('Asia/Jakarta');
		$kar = "TRN";
		$bel = "BGR";//karakter depan kodenya
		$date = date('dmy');
		
		if(!empty($q->result())){
			foreach($q->result() as $ka){
				$kodeakhir = $ka->Id_Transaksi;
			}
			$no = substr($kodeakhir,12,5);
				$intno = (int)$no;
				$next = $intno+1;
				
				//buat nol
				$nol = '';
				$Pintno = strlen($next);
				for($i = 1; $i <= 5-$Pintno; $i++){
					$nol = $nol.'0';
				}
				$kodejadi = $kar.$date.$bel.$nol.$next;
		}
		else{
			$kodejadi = $kar.$date.$bel.'00001';
		}
		return $kodejadi;
	}
public function datasupplier(){
		$q = $this->db->query("select Kode_Supplier, Nama_Supplier, Deskripsi
		from tb_supplier Order By Kode_Supplier Asc");
		return  $q->result();
	}
public function notsupplier($y){
		$q = $this->db->query("select Kode_Supplier, Nama_Supplier, Deskripsi
		from tb_supplier where Kode_Supplier='$y'");
		return  $q->row_array();
	}
	
	public function notuser($user){
		$q = $this->db->query("select Kode_User, Username,Nama
		from tb_user where Kode_User='$user'");
		return  $q->row_array();
	}
	
public function totalbeli(){
	$user = $this->session->userdata['Kode_User'];
		$q = $this->db->query("select SUM(Qty * Harga_Beli) as Total
		from tb_bantu_pembelian where Kode_User = '$user'");
		return  $q->result();
	}

public function qty(){
	$user = $this->session->userdata['Username'];
		$q = $this->db->query("select *
		from tb_detail_pembelian where Username = '$user'");
		//return  $q->result();
		return  $q->num_rows();
	}
		
public function listdatadetailbahanbaku(){
	$user = $this->session->userdata['Kode_User'];
		$q = $this->db->query("select Id_Transaksi, Kode_Bahan_Baku, Nama_Barang, Qty, Nama_Satuan, Harga_Beli 
		from tb_bantu_pembelian WHERE Kode_User ='$user' Order By Kode_Bahan_Baku Asc");
		return  $q->result();
	}
public function listdatadetailbahanbaku2($faktur){
	
		$q = $this->db->query("select Kode_Bahan_Baku, Nama_Barang, Qty, Nama_Satuan, Harga_Beli 
		from tb_detail_pembelian WHERE No_Faktur ='$faktur' Order By No_Faktur Asc");
		return  $q->result();
	}
	
public function totalsemuapembelian(){
		$q = $this->db->query("select SUM(Total_Pembelian) AS ttlall
		from tb_header_pembelian_bahanbaku");
		return  $q->result();
	}

public function totalperbulan(){
	$tglawal = date('Y-m-d', strtotime($this->input->post('Tanggal_Awal')));
	$tglakhir = date('Y-m-d', strtotime($this->input->post('Tanggal_Akhir')));
		
		$q = $this->db->query("select SUM(Total_Pembelian) AS ttlbl
		from tb_header_pembelian_bahanbaku where Tanggal_Pembelian BETWEEN '$tglawal' AND '$tglakhir' ");
		return  $q->result();
	}
public function hapusheaderbeli($where){
$this->db->where('No_Faktur',$where);
$this->db->delete('tb_header_pembelian_bahanbaku');
return true;
}
public function entries(){	
		$query = $this->db->query ("SELECT COUNT(No_Faktur) AS entri from tb_header_pembelian_bahanbaku");	
		return  $query->result();
} 	
public function datatoko(){	
		$query = $this->db->query ("select * from alamat_toko");	
		return  $query->row_array();
}
///////////////////////////////hitungan beli///////////////////////////////////////////

public function databahanbaku($kdbhnbaku){
		$q = $this->db->query("select * from tb_bahan_baku where kode_Bahan_Baku = '$kdbhnbaku'");
		return  $q->row_array();
	}
public function updatelv1($kdbhnbaku,$tambahlv1){
	$data = array(       
	'Lv1'=>$tambahlv1
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
//// Level 2 ////
public function updatelv2($kdbhnbaku,$hasillv1,$hasiltambahisilv2){
	$data = array(       
	'Lv1'=>$hasillv1,
	'Isi_Lv2'=>$hasiltambahisilv2
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
public function updatelv2kurangdari($kdbhnbaku,$hasillv1kurangdari,$hasiltambahisilv2kurangdari){
	$data = array(       
	'Lv1'=>$hasillv1kurangdari,
	'Isi_Lv2'=>$hasiltambahisilv2kurangdari
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
public function updatelv2samadengan($kdbhnbaku,$hasillv1samadengan,$hasiltambahisilv2samadengan){
	$data = array(       
	'Lv1'=>$hasillv1samadengan,
	'Isi_Lv2'=>$hasiltambahisilv2samadengan
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
//////////////////

//// Level 3 ////
public function updatelv3($kdbhnbaku,$hasilsisalv1,$hasillv2,$hasiltambahisilv3){
	$data = array(       
	'Lv1'=>$hasilsisalv1,
	'Isi_Lv2'=>$hasillv2,
	'Isi_Lv3'=>$hasiltambahisilv3,
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
public function updatelv3kurangdari($kdbhnbaku,$hasilsisalv1kurangdari,$hasillv2kurangdari,$hasiltambahisilv3kurangdari){
	$data = array(       
	'Lv1'=>$hasilsisalv1kurangdari,
	'Isi_Lv2'=>$hasillv2kurangdari,
	'Isi_Lv3'=>$hasiltambahisilv3kurangdari,
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
public function updatelv3samadengan($kdbhnbaku,$hasilsisalv1samadengan,$hasillv2samadengan,$hasiltambahisilv3samadengan){
	$data = array(       
	'Lv1'=>$hasilsisalv1samadengan,
	'Isi_Lv2'=>$hasillv2samadengan,
	'Isi_Lv3'=>$hasiltambahisilv3samadengan,
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
//////////////////
//// Level 4 ////
public function updatelv4($kdbhnbaku,$hasilsisalv1untuk4,$hasilsisalv2,$hasillv3,$hasiltambahisilv4){
	$data = array(       
	'Lv1'=>$hasilsisalv1untuk4,
	'Isi_Lv2'=>$hasilsisalv2,
	'Isi_Lv3'=>$hasillv3,
	'Isi_Lv4'=>$hasiltambahisilv4,
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
public function updatelv4kurangdari($kdbhnbaku,$hasilsisalv1untuk4kurangdari,$hasilsisalv2kurangdari,$hasillv3kurangdari,$hasiltambahisilv4kurangdari){
	$data = array(       
	'Lv1'=>$hasilsisalv1untuk4kurangdari,
	'Isi_Lv2'=>$hasilsisalv2kurangdari,
	'Isi_Lv3'=>$hasillv3kurangdari,
	'Isi_Lv4'=>$hasiltambahisilv4kurangdari,
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
public function updatelv4samadengan($kdbhnbaku,$hasilsisalv1untuk4samadengan,$hasilsisalv2samadengan,$hasillv3samadengan,$hasiltambahisilv4samadengan){
	$data = array(       
	'Lv1'=>$hasilsisalv1untuk4samadengan,
	'Isi_Lv2'=>$hasilsisalv2samadengan,
	'Isi_Lv3'=>$hasillv3samadengan,
	'Isi_Lv4'=>$hasiltambahisilv4samadengan,
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
////////////Hapus pembelian/////////////
public function bhnbakutbbantupembelian($id){
	$data = $this->db->query("Select * from tb_bantu_pembelian where Id_Transaksi = '$id' ");
	return $data->row_array();
}
/////////// lv1 //////////
public function hapuslv1($kdbhnbaku,$hapuslv1){
	$data = array(       
	'Lv1'=>$hapuslv1
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
/////////// lv2 //////////
public function hapuslv2lebihdari($kdbhnbaku,$sisalv1,$hasillv2){
	$data = array(       
	'Lv1'=>$sisalv1,
	'Isi_Lv2'=>$hasillv2
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
public function hapuslv2kurangdari($kdbhnbaku,$sisalv1kurangdari,$hasillv2kurangdari){
	$data = array(       
	'Lv1'=>$sisalv1kurangdari,
	'Isi_Lv2'=>$hasillv2kurangdari
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
public function hapuslv2samadengan($kdbhnbaku,$sisalv1samadengan,$hasillv2samadengan){
	$data = array(       
	'Lv1'=>$sisalv1samadengan,
	'Isi_Lv2'=>$hasillv2samadengan
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
/////////// lv3 //////////
public function hapuslv3lebihdari($kdbhnbaku,$hasillv1lebihdari,$hasillv2lebihdari,$hasillv3lebihdari){
	$data = array(       
	'Lv1'=>$hasillv1lebihdari,
	'Isi_Lv2'=>$hasillv2lebihdari,
	'Isi_Lv3'=>$hasillv3lebihdari
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
public function hapuslv3kurangdari($kdbhnbaku,$hasillv1kurangdariuntuk3,$hasillv2kurangdariuntuk3,$hasillv3kurangdariuntuk3){
	$data = array(       
	'Lv1'=>$hasillv1kurangdariuntuk3,
	'Isi_Lv2'=>$hasillv2kurangdariuntuk3,
	'Isi_Lv3'=>$hasillv3kurangdariuntuk3
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
public function hapuslv3samadengan($kdbhnbaku,$hasillv1samadenganuntuk3,$hasillv2samadenganuntuk3,$hasillv3samadenganuntuk3){
	$data = array(       
	'Lv1'=>$hasillv1samadenganuntuk3,
	'Isi_Lv2'=>$hasillv2samadenganuntuk3,
	'Isi_Lv3'=>$hasillv3samadenganuntuk3
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
/////////// lv4 //////////
public function hapuslv4lebihdari($kdbhnbaku,$lv1lebihdariuntuk4,$lv2lebihdariuntuk4,$lv3lebihdariuntuk4,$lv4lebihdariuntuk4){
	$data = array(       
	'Lv1'=>$lv1lebihdariuntuk4,
	'Isi_Lv2'=>$lv2lebihdariuntuk4,
	'Isi_Lv3'=>$lv3lebihdariuntuk4,
	'Isi_Lv4'=>$lv4lebihdariuntuk4
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
public function hapuslv4kurangdari($kdbhnbaku,$lv1kurangdariuntuk4,$lv2kurangdariuntuk4,$lv3kurangdariuntuk4,$lv4kurangdariuntuk4){
	$data = array(       
	'Lv1'=>$lv1kurangdariuntuk4,
	'Isi_Lv2'=>$lv2kurangdariuntuk4,
	'Isi_Lv3'=>$lv3kurangdariuntuk4,
	'Isi_Lv4'=>$lv4kurangdariuntuk4
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
public function hapuslv4samadengan($kdbhnbaku,$lv1samadenganuntuk4,$lv2samadenganuntuk4,$lv3samadenganuntuk4,$lv4samadenganuntuk4){
	$data = array(       
	'Lv1'=>$lv1samadenganuntuk4,
	'Isi_Lv2'=>$lv2samadenganuntuk4,
	'Isi_Lv3'=>$lv3samadenganuntuk4,
	'Isi_Lv4'=>$lv4samadenganuntuk4
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
////////////////////////////////////// delete bahan baku ///////////////////////////////////////
public function dataheaderpembelian($faktur){
		$q = $this->db->query("select tb_header_pembelian_bahanbaku.No_Faktur, tb_header_pembelian_bahanbaku.Tanggal_Pembelian, 
		tb_header_pembelian_bahanbaku.Total_Pembelian, tb_header_pembelian_bahanbaku.Discount,
		tb_header_pembelian_bahanbaku.Nomor_Rekening,tb_header_pembelian_bahanbaku.Ppn,tb_header_pembelian_bahanbaku.Jenis_Pembayaran,tb_header_pembelian_bahanbaku.Tanggal_Jatuh_Tempo,
		tb_supplier.Kode_Supplier, tb_user.Username,
		tb_supplier.Nama_Supplier, tb_supplier.Deskripsi, tb_header_pembelian_bahanbaku.Status_Pembelian
		from tb_header_pembelian_bahanbaku join tb_supplier
		on tb_header_pembelian_bahanbaku.Kode_Supplier = tb_supplier.Kode_Supplier
		join tb_user on tb_header_pembelian_bahanbaku.Kode_User = tb_user.Kode_User
		where No_Faktur = '$faktur' ");
		return  $q->row_array();
	}
public function totalbelihapus($faktur){
		$q = $this->db->query("select SUM(Qty * Harga_Beli) as Total
		from tb_detail_pembelian where No_Faktur = '$faktur'");
		return  $q->row_array();
}
public function listdetailpembelian($faktur){
		$q = $this->db->query("select * from tb_detail_pembelian where No_Faktur = '$faktur'");
		return  $q->result();
}
public function bhnbakutbdetailpembelian($id){
	$data = $this->db->query("Select * from tb_detail_pembelian where Id_Transaksi = '$id' ");
	return $data->row_array();
}
////////////////////////////////////// delete bahan baku ///////////////////////////////////////
/*
public function updatepalet($kdbhnbaku,$stok){
	$data = array(       
	'Palet'=>$stok,
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
//////////////Dus//////////////
public function kurangisidus($kdbhnbaku,$stkpalet,$sisadiambil){
	$data = array(       
	'Palet'=>$stkpalet,
	'Isi_Dus'=>$sisadiambil,
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
public function kurangsisaisidus($kdbhnbaku,$stkpalet1,$sisadiambil1){
	$data = array(       
	'Palet'=>$stkpalet1,
	'Isi_Dus'=>$sisadiambil1,
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
public function kurangisidussisa($kdbhnbaku,$sisadiambil2){
	$data = array(       
	'Isi_Dus'=>$sisadiambil2,
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
public function kurangisidusketikasama($kdbhnbaku,$stkpalet3,$sisadiambil3){
	$data = array(       
	'Palet'=>$stkpalet3,
	'Isi_Dus'=>$sisadiambil3,
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
//////////////Dus//////////////
//////////////Box//////////////
public function kurangisidus($kdbhnbaku,$stkdus,$sisaditambah){
	$data = array(       
	'Isi_Dus'=>$stkdus,
	'Isi_Box'=>$sisaditambah,
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
public function kurangsisaisidus($kdbhnbaku,$stkpalet1,$sisadiambil1){
	$data = array(       
	'Palet'=>$stkpalet1,
	'Isi_Dus'=>$sisadiambil1,
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
public function kurangisidussisa($kdbhnbaku,$sisadiambil2){
	$data = array(       
	'Isi_Dus'=>$sisadiambil2,
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
public function kurangisidusketikasama($kdbhnbaku,$stkpalet3,$sisadiambil3){
	$data = array(       
	'Palet'=>$stkpalet3,
	'Isi_Dus'=>$sisadiambil3,
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
//////////////Box//////////////
*/
//////////////////////////////////////////////////////////////////////////
}
?>