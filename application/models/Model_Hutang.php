<?php 
class Model_Hutang extends CI_Model{

public function getrowhutang(){	
		$query = $this->db->get ('tb_hutang');	
		return  $query->num_rows();
} 
public function listdatahutang($limit,$offset){
	
		$q = $this->db->query("select tb_hutang.Id_Hutang, tb_hutang.Hutang, tb_hutang.Nota, tb_customer.Id_Customer,
		tb_customer.Nama_Customer, tb_user.Username, tb_hutang.Nominal_Bunga,tb_hutang.Bunga,tb_hutang.Total_Piutang,tb_hutang.Tanggal_Update_Piutang,
		tb_hutang.Tanggal_Hutang, tb_hutang.Tanggal_Tempo_Hutang, tb_hutang.Total_Hutang, tb_hutang.Status
		from tb_hutang join tb_customer
		on tb_hutang.Id_Customer = tb_customer.Id_Customer 
		join tb_user
		on tb_hutang.Kode_User = tb_user.Kode_User
		Order By tb_hutang.Tanggal_Hutang DESC LIMIT $offset,$limit");
		return  $q->result();
	}
public function searchingdatahutang(){
	$cari = $this->input->post("cari");
	
		$q = $this->db->query("select tb_hutang.Id_Hutang, tb_hutang.Hutang, tb_hutang.Nota, tb_customer.Id_Customer,
		tb_customer.Nama_Customer, tb_user.Username, tb_hutang.Nominal_Bunga,tb_hutang.Bunga,tb_hutang.Total_Piutang,tb_hutang.Tanggal_Update_Piutang,
		tb_hutang.Tanggal_Hutang, tb_hutang.Tanggal_Tempo_Hutang, tb_hutang.Total_Hutang, tb_hutang.Status
		from tb_hutang join tb_customer
		on tb_hutang.Id_Customer = tb_customer.Id_Customer 
		join tb_user
		on tb_hutang.Kode_User = tb_user.Kode_User
		where tb_hutang.Id_Hutang like '%$cari%' or tb_hutang.Hutang like '%$cari%' or tb_hutang.Nota like '%$cari%' or tb_customer.Id_Customer like '%$cari%' or
		tb_customer.Nama_Customer like '%$cari%' or tb_user.Username like '%$cari%' or tb_hutang.Nominal_Bunga like '%$cari%' or tb_hutang.Bunga like '%$cari%' or
		tb_hutang.Total_Piutang like '%$cari%' or tb_hutang.Tanggal_Update_Piutang like '%$cari%' or
		tb_hutang.Tanggal_Hutang like '%$cari%' or tb_hutang.Tanggal_Tempo_Hutang like '%$cari%' or tb_hutang.Total_Hutang like '%$cari%' or tb_hutang.Status like '%$cari%'
		");
		return  $q->result();
	}
public function datapenjualan($nota){
	
		$q = $this->db->query("select tb_penjualan.Bayar,tb_penjualan.Sisa,tb_penjualan.Nota, tb_user.Kode_User,tb_user.Nama, tb_user.Username, tb_penjualan.Tanggal_Penjualan, tb_penjualan.Discount, tb_penjualan.Ppn, tb_penjualan.Total_Pembelian, tb_penjualan.Status
		from tb_penjualan join tb_user
		on tb_penjualan.Kode_User = tb_user.Kode_User
		where tb_penjualan.NOta = '$nota'");
		return  $q->row_array();
	}
public function databaranghutang($nota){
		$q = $this->db->query("select * from tb_penjualandetail WHERE Nota ='$nota' Order By Id_Nota Asc");
		return  $q->result();
	}
public function totalbelihutang($nota){
		$q = $this->db->query("select SUM(Qty * Harga_Jual) as Total
		from tb_penjualandetail where Nota = '$nota'");
		return  $q->row_array();
	}
public function getdataautocomplete($keyword){
		$this->db->like('Nama_Customer',$keyword);
		$sql = $this->db->get('tb_customer');
		return $sql;
	}
public function idhutang(){
	$this->db->order_by('Id_Hutang','DESC');
	$q = $this->db->get('tb_hutangreport',1);
		
		$kodeakhir;
		$kodejadi;
		date_default_timezone_set('Asia/Jakarta');
		$date = date('my');
		$bel = "BGR";
		
		if(!empty($q->result())){
			foreach($q->result() as $ka){
				$kodeakhir = $ka->Id_Hutang;
			}
			$no = substr($kodeakhir,10,12);
				$intno = (int)$no;
				$next = $intno+1;
				
				//buat nol
				$nol = '';
				$Pintno = strlen($next);
				for($i = 1; $i <= 12-$Pintno; $i++){
					$nol = $nol.'0';
				}
				$kodejadi = 'HUT'.$date.$bel.$nol.$next;
		}
		else{
			$kodejadi = 'HUT'.$date.$bel.'000000000001';
		}
		return $kodejadi;
		
		
	}
	public function idpiutang(){
	$this->db->order_by('Id_Piutang','DESC');
	$q = $this->db->get('tb_hutang_piutang',1);
		
		$kodeakhir;
		$kodejadi;
		date_default_timezone_set('Asia/Jakarta');
		$date = date('my');
		$bel = "HUT";
		
		if(!empty($q->result())){
			foreach($q->result() as $ka){
				$kodeakhir = $ka->Id_Piutang;
			}
			$no = substr($kodeakhir,10,12);
				$intno = (int)$no;
				$next = $intno+1;
				
				//buat nol
				$nol = '';
				$Pintno = strlen($next);
				for($i = 1; $i <= 12-$Pintno; $i++){
					$nol = $nol.'0';
				}
				$kodejadi = 'PHT'.$date.$bel.$nol.$next;
		}
		else{
			$kodejadi = 'PHT'.$date.$bel.'000000000001';
		}
		return $kodejadi;
		
		
	}
public function simpantbhutang($idhutang){
	$tgltempohutang = date('Y-m-d H:i:s',strtotime($this->input->post('Tanggal_Tempo_Hutang')));
	
	$data = array(       
	'Id_Hutang' =>$idhutang,
	'Nota' =>$this->input->post('Nota'),
	'Id_Customer' =>$this->input->post('Id_Customer'),
	'Kode_User' => $this->input->post('Kode_User'),
	'Tanggal_Hutang' => $this->input->post('Tanggal_Hutang'),
	'Tanggal_Tempo_Hutang' =>$tgltempohutang,
	'Hutang' =>$this->input->post('Total_Hutang'),
	'Total_Hutang' =>$this->input->post('Total_Hutang'),
	'Status' =>$this->input->post('Status'),
	'Nominal_Bunga' =>$this->input->post('Nominal_Bunga'),
	'Bunga' =>$this->input->post('Bunga')
	);
	$this->db->insert('tb_hutang',$data);
	}
public function simpantbhutangreport($idhutang){
	$tgltempohutang = date('Y-m-d H:i:s',strtotime($this->input->post('Tanggal_Tempo_Hutang')));
	
	$data = array(       
	'Id_Hutang' =>$idhutang,
	'Nota' =>$this->input->post('Nota'),
	'Id_Customer' =>$this->input->post('Id_Customer'),
	'Kode_User' => $this->input->post('Kode_User'),
	'Tanggal_Hutang' => $this->input->post('Tanggal_Hutang'),
	'Tanggal_Tempo_Hutang' =>$tgltempohutang,
	'Total_Hutang' =>$this->input->post('Total_Hutang'),
	'Status' =>$this->input->post('Status'),
	'Nominal_Bunga' =>$this->input->post('Nominal_Bunga'),
	'Bunga' =>$this->input->post('Bunga')
	);
	$this->db->insert('tb_hutangreport',$data);
	}
public function entries(){	
		$query = $this->db->query ("SELECT COUNT(Id_Hutang) AS entri from tb_hutang");	
		return  $query->result();
} 
public function datacustomer($idhutang){
		$q = $this->db->query("select tb_hutang.Id_Hutang, tb_hutang.Hutang, tb_hutang.Nota, tb_hutang.Id_Customer, tb_hutang.Tanggal_Hutang, tb_hutang.Tanggal_Tempo_Hutang, tb_hutang.Total_Hutang, tb_hutang.Status,
		tb_hutang.Bunga, tb_hutang.Nominal_Bunga, tb_customer.Nama_Customer,
		tb_customer.Alamat, tb_customer.Telepon, tb_customer.Email
		from tb_hutang join tb_customer
		on tb_hutang.Id_Customer = tb_customer.Id_Customer
		WHERE tb_hutang.Id_Hutang ='$idhutang'");
		return  $q->row_array();
	}
public function simpanedittbhutang(){
	$tgltempohutang = date('Y-m-d H:i:s',strtotime($this->input->post('Tanggal_Tempo_Hutang')));
	
	$data = array(       
	'Nota' =>$this->input->post('Nota'),
	'Id_Customer' =>$this->input->post('Id_Customer'),
	'Kode_User' => $this->input->post('Kode_User'),
	'Tanggal_Hutang' => $this->input->post('Tanggal_Hutang'),
	'Tanggal_Tempo_Hutang' =>$tgltempohutang,
	//'Total_Hutang' =>$this->input->post('Total_Hutang'),
	//'Total_Hutang' =>$this->input->post('Total_Hutang'),
	'Bunga' =>$this->input->post('Bunga'),
	'Nominal_Bunga' =>$this->input->post('Nominal_Bunga'),
	'Status' =>$this->input->post('Status'),
	);
	$this->db->where('Id_Hutang',$this->input->post("Id_Hutang"));
	$this->db->update('tb_hutang',$data);
	}
public function simpanedittbhutangreport(){
	$tgltempohutang = date('Y-m-d H:i:s',strtotime($this->input->post('Tanggal_Tempo_Hutang')));
	
	$data = array(       
	'Nota' =>$this->input->post('Nota'),
	'Id_Customer' =>$this->input->post('Id_Customer'),
	'Kode_User' => $this->input->post('Kode_User'),
	'Tanggal_Hutang' => $this->input->post('Tanggal_Hutang'),
	'Tanggal_Tempo_Hutang' =>$tgltempohutang,
	//'Total_Hutang' =>$this->input->post('Total_Hutang'),
	'Bunga' =>$this->input->post('Bunga'),
	'Nominal_Bunga' =>$this->input->post('Nominal_Bunga'),
	'Status' =>$this->input->post('Status'),
	);
	$this->db->where('Id_Hutang',$this->input->post("Id_Hutang"));
	$this->db->update('tb_hutangreport',$data);
	}
////////////////////// bayar hutang //////////////////////////
public function datasisahutang($idhutang){
		$q = $this->db->query("select * from tb_hutang
		WHERE Id_Hutang ='$idhutang'");
		return  $q->row_array();
	}
public function databayarhutang($idhutang){
		$q = $this->db->query("select tb_hutangdetail.Id_Detail, tb_hutangdetail.Id_Hutang, tb_hutangdetail.Tanggal_Bayar, tb_hutangdetail.Jenis_Bayar,
		tb_hutangdetail.Bayar_Total, tb_hutangdetail.Sisa_Total, tb_hutangdetail.Status, tb_user.Username
		from tb_hutangdetail join tb_user 
		on tb_hutangdetail.Kode_User = tb_user.Kode_User
		WHERE tb_hutangdetail.Id_Hutang ='$idhutang' Order By tb_hutangdetail.Tanggal_Bayar Desc");
		return  $q->result();
	}
public function idhutangdetail(){
	$this->db->order_by('Id_Detail','DESC');
	$q = $this->db->get('tb_hutangreportdetail',1);
		
		$kodeakhir;
		$kodejadi;
		date_default_timezone_set('Asia/Jakarta');
		$date = date('my');
		$bel = "BGR";
		
		if(!empty($q->result())){
			foreach($q->result() as $ka){
				$kodeakhir = $ka->Id_Detail;
			}
			$no = substr($kodeakhir,10,12);
				$intno = (int)$no;
				$next = $intno+1;
				
				//buat nol
				$nol = '';
				$Pintno = strlen($next);
				for($i = 1; $i <= 12-$Pintno; $i++){
					$nol = $nol.'0';
				}
				$kodejadi = 'DHT'.$date.$bel.$nol.$next;
		}
		else{
			$kodejadi = 'DHT'.$date.$bel.'000000000001';
		}
		return $kodejadi;
		
		
	}
public function simpanhutangdetail($iddetailbayarhutang){
	date_default_timezone_set("Asia/Jakarta");
	$date = date("Y-m-d H:i:s");
	$totalhutang = $this->input->post('Sisa_Total');
	
	if($totalhutang==0){
		$status = "Lunas";
	}else if($totalhutang > 1){
		$status = "Lunas";
	}else if($totalhutang < 0){
		$status = "Hutang";
	}
	
	$data = array(       
	'Id_Detail' =>$iddetailbayarhutang,
	'Id_Hutang' =>$this->input->post('Id_Hutang'),
	'Kode_User' => $this->input->post('Kode_User'),
	'Tanggal_Bayar' => $date,
	'Jenis_Bayar' =>$this->input->post('Jenis_Bayar'),
	'Bayar_Total' =>$this->input->post('Bayar_Total'),
	'Sisa_Total' =>$this->input->post('Sisa_Total'),
	'Status' =>$status,
	);
	$this->db->insert('tb_hutangdetail',$data);
	}
public function simpanhutangdetailreport($iddetailbayarhutang){
	date_default_timezone_set("Asia/Jakarta");
	$date = date("Y-m-d H:i:s");
	$totalhutang = $this->input->post('Sisa_Total');
	
	if($totalhutang==0){
		$status = "Lunas";
	}else if($totalhutang > 1){
		$status = "Lunas";
	}else if($totalhutang < 0){
		$status = "Hutang";
	}
	
	$data = array(       
	'Id_Detail' =>$iddetailbayarhutang,
	'Id_Hutang' =>$this->input->post('Id_Hutang'),
	'Kode_User' => $this->input->post('Kode_User'),
	'Tanggal_Bayar' => $date,
	'Jenis_Bayar' =>$this->input->post('Jenis_Bayar'),
	'Bayar_Total' =>$this->input->post('Bayar_Total'),
	'Sisa_Total' =>$this->input->post('Sisa_Total'),
	'Status' =>$status,
	);
	$this->db->insert('tb_hutangreportdetail',$data);
	}
public function ubahselesaitbhutangreport($idhutang,$bayartotal){
	date_default_timezone_set("Asia/Jakarta");
	$date = date("Y-m-d H:i:s");
	
	$data = array(       
	'Tanggal_Selesai_Hutang' =>$date,
	'Bayar_Total' =>$bayartotal,
	'Sisa_Bayar' => $this->input->post('Sisa_Total'),
	'Status' =>"Lunas",
	);
	$this->db->where('Id_Hutang',$idhutang);
	$this->db->update('tb_hutangreport',$data);
	}
public function hapushutangdetailketikalunas($idhutang){
$this->db->where('Id_Hutang',$idhutang);
$this->db->delete('tb_hutangdetail');
return true;
}

public function hapushutangketikalunas($idhutang){
$this->db->where('Id_Hutang',$idhutang);
$this->db->delete('tb_hutang');
return true;
}
public function updatestatuspenjualan($nota,$ubahbayarpenjualan,$ubahsisapenjualan){
	
	$data = array(       
	'Bayar' =>$ubahbayarpenjualan,
	'Sisa' =>$ubahsisapenjualan,
	'Status' =>"Lunas",
	);
	$this->db->where('Nota',$nota);
	$this->db->update('tb_penjualan',$data);
	}
public function ubahtotalhutang($idhutang){
	$data = array(       
	'Total_Hutang' => $this->input->post('Sisa_Total'),
	);
	$this->db->where('Id_Hutang',$idhutang);
	$this->db->update('tb_hutang',$data);
	}
///////////////////////// Report Hutang ///////////////////////////////////
public function datacustomerhutang($idhutang){
		$q = $this->db->query("select tb_hutang.Id_Hutang, tb_hutang.Hutang, tb_hutang.Nota, tb_user.Username, tb_hutang.Tanggal_Hutang, tb_hutang.Tanggal_Tempo_Hutang, tb_hutang.Total_Hutang, 
		tb_hutang.Total_Hutang, tb_hutang.Status,
		tb_customer.Nama_Customer, tb_customer.Alamat, tb_customer.Telepon, tb_customer.Email
		from tb_hutang join tb_user
		on tb_hutang.Kode_User = tb_user.Kode_User 
		join tb_customer
		on tb_hutang.Id_Customer = tb_customer.Id_Customer
		WHERE tb_hutang.Id_Hutang ='$idhutang'");
		return  $q->row_array();
	}
	/*
public function databayarhutang($idhutang){
		$q = $this->db->query("select tb_hutangdetail.Id_Detail, tb_hutangdetail.Id_Hutang, tb_hutangdetail.Tanggal_Bayar, tb_hutangdetail.Jenis_Bayar,
		tb_hutangdetail.Bayar_Total, tb_hutangdetail.Sisa_Total, tb_hutangdetail.Status, tb_user.Username
		from tb_hutangdetail join tb_user 
		on tb_hutangdetail.Kode_User = tb_user.Kode_User
		WHERE tb_hutangdetail.Id_Hutang ='$idhutang' Order By tb_hutangdetail.Tanggal_Bayar Desc");
		return  $q->result();
	}
	*/
public function datanotapenjualanbynota($nota){	
		$query = $this->db->query ("SELECT * from tb_penjualan where Nota='$nota' ");	
		return  $query->row_array();
} 
public function hutangterbayarbelumlunas($idhutang){	
		$query = $this->db->query ("SELECT sum(Bayar_Total) as totalbayar from tb_hutangdetail where Id_Hutang = '$idhutang'");	
		return  $query->row_array();
} 
////////////////////////// report hutang lunas////////////////////////////
public function getrowhutangreport(){	
		$query = $this->db->get ('tb_hutangreport');	
		return  $query->num_rows();
} 
public function listdatahutangreport($limit,$offset){
	
		$q = $this->db->query("select tb_hutangreport.Id_Hutang, tb_hutangreport.Bayar_Total, tb_hutangreport.Tanggal_Selesai_Hutang, tb_hutangreport.Nota, tb_customer.Id_Customer, tb_customer.Nama_Customer, tb_user.Username,
		tb_hutangreport.Tanggal_Hutang, tb_hutangreport.Tanggal_Tempo_Hutang, tb_hutangreport.Total_Hutang, tb_hutangreport.Status
		from tb_hutangreport join tb_customer
		on tb_hutangreport.Id_Customer = tb_customer.Id_Customer 
		join tb_user
		on tb_hutangreport.Kode_User = tb_user.Kode_User
		Order By tb_hutangreport.Tanggal_Hutang DESC LIMIT $offset,$limit");
		return  $q->result();
	}
public function searchingdatahutangreport(){
	$cari = $this->input->post("cari");
	
		$q = $this->db->query("select tb_hutangreport.Bayar_Total, tb_hutangreport.Tanggal_Selesai_Hutang, tb_hutangreport.Id_Hutang, tb_hutangreport.Nota, tb_customer.Id_Customer, tb_customer.Nama_Customer, tb_user.Username,
		tb_hutangreport.Tanggal_Hutang, tb_hutangreport.Tanggal_Tempo_Hutang, tb_hutangreport.Total_Hutang, tb_hutangreport.Status
		from tb_hutangreport join tb_customer
		on tb_hutangreport.Id_Customer = tb_customer.Id_Customer 
		join tb_user
		on tb_hutangreport.Kode_User = tb_user.Kode_User
		where tb_hutangreport.Bayar_Total like '%$cari%' or tb_hutangreport.Tanggal_Selesai_Hutang like '%$cari%' or
		tb_hutangreport.Id_Hutang like '%$cari%' or tb_hutangreport.Nota like '%$cari%'
		or tb_customer.Id_Customer like '%$cari%' or tb_customer.Nama_Customer like '%$cari%'
		or tb_user.Username like '%$cari%' or tb_hutangreport.Tanggal_Hutang like '%$cari%'
		or tb_hutangreport.Tanggal_Tempo_Hutang like '%$cari%' or tb_hutangreport.Total_Hutang like '%$cari%' 
		or tb_hutangreport.Status like '%$cari%' ");
		return  $q->result();
	}
public function entriesreport(){	
		$query = $this->db->query ("SELECT COUNT(Id_Hutang) AS entri from tb_hutangreport");	
		return  $query->result();
} 
public function datacustomerreport($idhutang){
		$q = $this->db->query("select tb_hutangreport.Id_Hutang, tb_hutangreport.Nota, tb_user.Username, tb_hutangreport.Tanggal_Hutang, tb_hutangreport.Tanggal_Tempo_Hutang, tb_hutangreport.Tanggal_Selesai_Hutang, tb_hutangreport.Total_Hutang, 
		tb_hutangreport.Total_Hutang, tb_hutangreport.Status,
		tb_customer.Nama_Customer, tb_customer.Alamat, tb_customer.Telepon, tb_customer.Email
		from tb_hutangreport join tb_user
		on tb_hutangreport.Kode_User = tb_user.Kode_User 
		join tb_customer
		on tb_hutangreport.Id_Customer = tb_customer.Id_Customer
		WHERE tb_hutangreport.Id_Hutang ='$idhutang'");
		return  $q->row_array();
	}
public function alamattoko(){	
		$query = $this->db->query ("SELECT * from alamat_toko");	
		return  $query->row_array();
} 
public function databayarhutangreport($idhutang){
		$q = $this->db->query("select tb_hutangreportdetail.Id_Detail, tb_hutangreportdetail.Id_Hutang, tb_hutangreportdetail.Tanggal_Bayar, tb_hutangreportdetail.Jenis_Bayar,
		tb_hutangreportdetail.Bayar_Total, tb_hutangreportdetail.Sisa_Total, tb_hutangreportdetail.Status, tb_user.Username
		from tb_hutangreportdetail join tb_user 
		on tb_hutangreportdetail.Kode_User = tb_user.Kode_User
		WHERE tb_hutangreportdetail.Id_Hutang ='$idhutang' Order By tb_hutangreportdetail.Tanggal_Bayar Desc");
		return  $q->result();
	}
public function hutangterbayar($idhutang){	
		$query = $this->db->query ("SELECT sum(Bayar_Total) as totalbayar from tb_hutangreportdetail where Id_Hutang = '$idhutang'");	
		return  $query->row_array();
} 
public function hapushutangreport($idhutang){
$this->db->where('Id_Hutang',$idhutang);
$this->db->delete('tb_hutangreport');
return true;
}
public function hapushutangreportdetail($idhutang){
$this->db->where('Id_Hutang',$idhutang);
$this->db->delete('tb_hutangreportdetail');
return true;
}
public function hapustbpiutangsetelahlunas($idhutang){
$this->db->where('Id_Hutang',$idhutang);
$this->db->delete('tb_hutang_piutang');
return true;
}
public function cariidhutang($nota){	
		$query = $this->db->query ("SELECT Id_Hutang from tb_hutangreport where Nota='$nota'");	
		return  $query->row_array();
}
//////////// bayar piutag ////////////////
public function simpanpiutang($idpiutang){
	date_default_timezone_set("Asia/Jakarta");
	$tglbayar = date('Y-m-d H:i:s');
	
	$bayar = $this->input->post('Bayar_Piutang');
	$nominal = $this->input->post('Nominal_Piutang');
	
	if($nominal == $bayar){
		$hasilsisa = $bayar - $nominal;
	}else if($nominal < $bayar){
		$hasilsisa = 0;
	}else if($nominal > $bayar){
		$hasilsisa = $nominal - $bayar;
	}
	
	if($nominal == $bayar){
		$kembali = 0;
	}else if($nominal < $bayar){
		$kembali = $bayar - $nominal;
	}else if($nominal > $bayar){
		$kembali = 0;
	}
	
	$data = array(       
	'Id_Piutang' =>$idpiutang,
	'Id_Hutang' =>$this->input->post('Id_Hutang'),
	'Kode_User' =>$this->input->post('Kode_User'),
	'Nominal_Piutang' =>$this->input->post('Nominal_Piutang'),
	'Bayar_Piutang' =>$this->input->post('Bayar_Piutang'),
	'Jenis_Bayar' =>$this->input->post('Jenis_Bayar'),
	'Sisa_Piutang' =>$hasilsisa,
	'Kembali' =>$kembali,
	'Keterangan' =>$this->input->post('Keterangan'),
	'Tanggal_Bayar_Piutang' =>$tglbayar
	);
	$this->db->insert('tb_hutang_piutang',$data);
	} 
public function updatenominaltotalpiutang($idhutang){
	
	$bayar = $this->input->post('Bayar_Piutang');
	$nominal = $this->input->post('Nominal_Piutang');
	
	if($nominal == $bayar){
		$totalpiutang = $bayar - $nominal;
	}else if($nominal < $bayar){
		$totalpiutang = 0;
	}else if($nominal > $bayar){
		$totalpiutang = $nominal - $bayar;
	}
	
	$data = array(       
	'Total_Piutang' => $totalpiutang,
	);
	$this->db->where('Id_Hutang',$idhutang);
	$this->db->update('tb_hutang',$data);
	}
public function updatenominaltotalpiutangtbreport($idhutang){
	
	$bayar = $this->input->post('Bayar_Piutang');
	$nominal = $this->input->post('Nominal_Piutang');
	
	if($nominal == $bayar){
		$totalpiutang = $bayar - $nominal;
	}else if($nominal < $bayar){
		$totalpiutang = 0;
	}else if($nominal > $bayar){
		$totalpiutang = $nominal - $bayar;
	}
	
	$data = array(       
	'Total_Piutang' => $totalpiutang,
	);
	$this->db->where('Id_Hutang',$idhutang);
	$this->db->update('tb_hutangreport',$data);
	}
public function datatotalpiutang($idhutang){	
		$query = $this->db->query ("SELECT * from tb_hutang where Id_Hutang = '$idhutang'");	
		return  $query->row_array();
} 
public function updatetotalpiutangtbhutang($idhutang,$total){
	date_default_timezone_set("Asia/Jakarta");
	$tglupdate = date("Y-m-d H:i:s");
	
	$data = array(       
	'Total_Piutang' => $total,
	'Tanggal_Update_Piutang' => $tglupdate
	);
	$this->db->where('Id_Hutang',$idhutang);
	$this->db->update('tb_hutang',$data);
	}
public function updatetotalpiutangtbhutangreport($idhutang,$total){
	date_default_timezone_set("Asia/Jakarta");
	$tglupdate = date("Y-m-d H:i:s");
	
	$data = array(       
	'Total_Piutang' => $total,
	'Tanggal_Update_Piutang' => $tglupdate
	);
	$this->db->where('Id_Hutang',$idhutang);
	$this->db->update('tb_hutangreport',$data);
	}
public function dataheaderreportpiutang($idhutang){	
		$query = $this->db->query ("SELECT tb_hutangreport.Id_Hutang, tb_hutangreport.Nota, tb_hutangreport.Tanggal_Hutang, tb_hutangreport.Tanggal_Tempo_Hutang,
		tb_hutangreport.Total_Hutang, tb_hutangreport.Tanggal_Selesai_Hutang, tb_hutangreport.Bunga, tb_hutangreport.Nominal_Bunga, 
		tb_customer.Nama_Customer, tb_customer.Alamat, tb_customer.Telepon, tb_customer.Email
		from tb_hutangreport join tb_customer
		on tb_hutangreport.Id_Customer = tb_customer.Id_Customer
		where tb_hutangreport.Id_Hutang = '$idhutang' ");	
		return  $query->row_array();
} 
public function datapiutang($idhutang){	
		$query = $this->db->query ("SELECT tb_hutang_piutang.Id_Piutang,tb_hutang_piutang.Id_Hutang, tb_hutang_piutang.Nominal_Piutang,
		tb_hutang_piutang.Bayar_Piutang, tb_hutang_piutang.Jenis_Bayar, tb_hutang_piutang.Sisa_Piutang, tb_hutang_piutang.Kembali,
		tb_hutang_piutang.Keterangan, tb_hutang_piutang.Tanggal_Bayar_Piutang, tb_user.Username,tb_user.Nama
		from tb_hutang_piutang join tb_user
		on tb_hutang_piutang.Kode_User = tb_user.Kode_User
		where tb_hutang_piutang.Id_Hutang = '$idhutang' order by tb_hutang_piutang.Tanggal_Bayar_Piutang DESC");	
		return  $query->result();
} 
///////////////////////////////////// batas baru///////////////////////////////////////////////////////////////////////////////////

}
?>