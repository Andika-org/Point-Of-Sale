<?php 
class Model_Laporanpenjualan extends CI_Model{
	
public function datatbpenjualan($tglawal,$tglakhir){	
		$query = $this->db->query ("select * from tb_penjualan where Tanggal_Penjualan BETWEEN '$tglawal' AND '$tglakhir' order by Tanggal_Penjualan ASC");	
		return  $query->result();
} 
public function listtbpenjualandetail($nota){	
		$query = $this->db->query ("select * from tb_penjualandetail where Nota = '$nota' ");	
		return  $query->result();
} 
public function hitungitem($notajual){	
		$query = $this->db->query ("SELECT count('Nota') as TotalItem from tb_penjualandetail WHERE Nota = '$notajual' ");	
		return  $query->result();
} 
public function datatoko(){	
		$query = $this->db->query ("select * from alamat_toko");	
		return  $query->row_array();
}
public function sumtotal($tglawal,$tglakhir){	
		$query = $this->db->query ("select SUM(Total_Pembelian) as ttlbeli from tb_penjualan where Tanggal_Penjualan BETWEEN '$tglawal' AND '$tglakhir'");	
		return  $query->row_array();
}
/////////// batas baru /////////////////

public function getrowstokopname(){	
		$query = $this->db->get ('tb_stokopname');	
		return  $query->num_rows();
} 
public function listdatastokopname($limit,$offset){
		$q = $this->db->query("select tb_stokopname.Normalisasi,tb_stokopname.Id_Stokopname,tb_stokopname.Tanggal_Stokopname, tb_user.Username
		from tb_stokopname join tb_user
		on tb_stokopname.Kode_User = tb_user.Kode_User
		order by tb_stokopname.Tanggal_Stokopname DESC LIMIT $offset,$limit");
		return  $q->result();
	}
public function listdatastokopnameheader($id){
		$q = $this->db->query("select tb_stokopname.Normalisasi, tb_stokopname.Id_Stokopname,tb_stokopname.Tanggal_Stokopname, tb_user.Nama
		from tb_stokopname join tb_user
		on tb_stokopname.Kode_User = tb_user.Kode_User
		where tb_stokopname.Id_Stokopname = '$id'");
		return  $q->row_array();
	}	
		
public function listdatastokopnamedetailgroup($id){
		$q = $this->db->query("select * from tb_stokopnamedetail
		where Id_Stokopname = '$id' group by Kode_Bahan_Baku
		order by Nama_Barang ASC");
		return  $q->result();
	}	
public function listdatastokopnamedetail($id){
		$q = $this->db->query("select * from tb_stokopnamedetail
		where Id_Stokopname = '$id'");
		return  $q->result();
	}
public function listdatastokopnamedetailbarang($kdbhnbku,$id){
		$q = $this->db->query("select * from tb_stokopnamedetail
		where Id_Stokopname = '$id' and Kode_Bahan_Baku = '$kdbhnbku'");
		return  $q->result();
	}
public function entries(){	
		$query = $this->db->query ("SELECT COUNT(Id_Stokopname) AS entri from tb_stokopname");	
		return  $query->result();
} 	
public function idstokopnamedetail(){
	$this->db->order_by('Id_Detail','DESC');
	$q = $this->db->get('tb_stokopnamedetail',1);
		
		$kodeakhir;
		$kodejadi;
		$bel = "SD";
		date_default_timezone_set("Asia/Jakarta");
		$date = date("dmy");
		if(!empty($q->result())){
			foreach($q->result() as $ka){
				$kodeakhir = $ka->Id_Detail;
			}
			$no = substr($kodeakhir,8,9);
				$intno = (int)$no;
				$next = $intno+1;
				
				//buat nol
				$nol = '';
				$Pintno = strlen($next);
				for($i = 1; $i <= 9-$Pintno; $i++){
					$nol = $nol.'0';
				}
				$kodejadi = $bel.$date.$nol.$next;
		}
		else{
			$kodejadi = $bel.$date.'000000001';
		}
		return $kodejadi;
		
		
	}
public function idstokopname(){
	$this->db->order_by('Id_Stokopname','DESC');
	$q = $this->db->get('tb_stokopname',1);
		
		$kodeakhir;
		$kodejadi;
		$bel = "SO";
		
		if(!empty($q->result())){
			foreach($q->result() as $ka){
				$kodeakhir = $ka->Id_Stokopname;
			}
			$no = substr($kodeakhir,2,5);
				$intno = (int)$no;
				$next = $intno+1;
				
				//buat nol
				$nol = '';
				$Pintno = strlen($next);
				for($i = 1; $i <= 5-$Pintno; $i++){
					$nol = $nol.'0';
				}
				$kodejadi = $bel.$nol.$next;
		}
		else{
			$kodejadi = $bel.'00001';
		}
		return $kodejadi;
		
		
	}
public function getdataautocomplete($keyword){
		$this->db->like('Kode_Bahan_Baku',$keyword);
		$this->db->or_like('Nama_Barang',$keyword);
		$sql = $this->db->get('tb_bahan_baku');
		return $sql;	
	}
public function delkosong($id){
$this->db->where('Id_Stokopname',$id);
$this->db->where('Nama_Satuan'," ");
$this->db->delete('tb_stokopnamedetail');
return true;
}
public function delkosongbantu($id){
$this->db->where('Id_Stokopname',$id);
$this->db->where('Nama_Satuan'," ");
$this->db->delete('tb_stokopnamedetailbantu');
return true;
}
public function getallrow(){
	$kduser = $this->session->userdata("Kode_User");
	
		$this->db->select('SELECT Kode_Bahan_Baku');
		$this->db->where('Kode_User',$kduser);
		return $this->db->count_all_results('tb_stokopnamedetailbantu');
	}
public function listdetailsoqtycoba($kdbhnbku){
	$kduser = $this->session->userdata("Kode_User");
		$q = $this->db->query("select * from tb_stokopnamedetailbantu where Kode_User = '$kduser' and Kode_Bahan_Baku ='$kdbhnbku' ");
		return  $q->result();
	}
public function listdetailsogroup(){
	$kduser = $this->session->userdata("Kode_User");
		$q = $this->db->query("select * from tb_stokopnamedetailbantu where Kode_User = '$kduser' group by Kode_Bahan_Baku");
		return  $q->result();
	}
public function listdetailsoqty(){
	$kduser = $this->session->userdata("Kode_User");
		$q = $this->db->query("select * from tb_stokopnamedetailbantu where Kode_User = '$kduser' ");
		return  $q->result();
	}
public function idso(){
	$kduser = $this->session->userdata("Kode_User");
		$q = $this->db->query("select * from tb_stokopnamedetailbantu where Kode_User = '$kduser'  ");
		return  $q->row_array();
	}
public function simpanheaderstokopname($id){
	date_default_timezone_set("Asia/Jakarta");
	$date = date("Y-m-d H:i:s");
	$kduser = $this->session->userdata("Kode_User");
	$data = array(       
	'Id_Stokopname'=>$id,
	'Tanggal_Stokopname'=>$date,
	'Kode_User'=>$kduser,
	'Normalisasi'=>"Belum"
	);
	$this->db->insert('tb_stokopname',$data);
	}
public function delbantu($id){
$this->db->where('Id_Stokopname',$id);
$this->db->delete('tb_stokopnamedetailbantu');
return true;
}
public function delstokopname($id){
$this->db->where('Id_Stokopname',$id);
$this->db->delete('tb_stokopname');
return true;
}
public function delstokopnamedetail($id){
$this->db->where('Id_Stokopname',$id);
$this->db->delete('tb_stokopnamedetail');
return true;
}
public function searchingdatastokopname(){
		$tglawal = date('Y-m-d', strtotime($this->input->post('Tanggal_Awal')));
		$tglakhir = date('Y-m-d', strtotime($this->input->post('Tanggal_Akhir')));
		
		$b = $this->db->query("select tb_stokopname.Normalisasi, tb_stokopname.Id_Stokopname,tb_stokopname.Tanggal_Stokopname, tb_user.Username
		from tb_stokopname join tb_user
		on tb_stokopname.Kode_User = tb_user.Kode_User
		where tb_stokopname.Tanggal_Stokopname BETWEEN '$tglawal' AND '$tglakhir'
		Order By tb_stokopname.Tanggal_Stokopname Desc ");
		
		return  $b->result();
	}


public function countnormalisasibelum($id){
		$q = $this->db->query("select count(Normalisasi) as normal from tb_stokopnamedetail WHERE Id_Stokopname='$id' and Normalisasi ='Belum' ");
		return  $q->row_array();
	}
public function datadetailnormalisasi($iddetail){	
		$query = $this->db->query ("select * from tb_stokopnamedetail where Id_Detail='$iddetail'");	
		return  $query->row_array();
}
public function updatebahanbakulv1($kdbhnbku,$stk){
	$data = array(       
	'Lv1'=>$stk
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbku);
	$this->db->update('tb_bahan_baku',$data);
}
public function updatebahanbakulv2($kdbhnbku,$stk){
	$data = array(       
	'Isi_Lv2'=>$stk
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbku);
	$this->db->update('tb_bahan_baku',$data);
}
public function updatebahanbakulv3($kdbhnbku,$stk){
	$data = array(       
	'Isi_Lv3'=>$stk
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbku);
	$this->db->update('tb_bahan_baku',$data);
}
public function updatebahanbakulv4($kdbhnbku,$stk){
	$data = array(       
	'Isi_Lv4'=>$stk
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbku);
	$this->db->update('tb_bahan_baku',$data);
}
public function updatefinishdetail($iddetail){
	$data = array(       
	'Normalisasi'=>"Finish"
	);
	$this->db->where('Id_Detail',$iddetail);
	$this->db->update('tb_stokopnamedetail',$data);
}
public function updateheaderfinish($id){
	$data = array(       
	'Normalisasi'=>"Finish"
	);
	$this->db->where('Id_Stokopname',$id);
	$this->db->update('tb_stokopname',$data);
}
///////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////
}
?>