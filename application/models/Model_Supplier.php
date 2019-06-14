<?php 
class Model_Supplier extends CI_Model{
	//cek login
function cek_login($table,$where){
return $this->db->get_where($table,$where);
}
//bahan baku
public function getrowsupplier(){	
		$query = $this->db->get ('tb_supplier');	
		return  $query->num_rows();
} 	
public function listdatasupplier($limit,$offset){
		$q = $this->db->query("select Kode_Supplier, Nama_Supplier, Deskripsi, Alamat, Telepon, Email
		from tb_supplier Order By Nama_Supplier Asc LIMIT $offset,$limit");
		return  $q->result();
	}
public function kodesupplier(){
	$this->db->order_by('Kode_Supplier','DESC');
	$q = $this->db->get('tb_supplier',1);
		
		$kodeakhir;
		$kodejadi;
		$date = date('Ym');
		if(!empty($q->result())){
			foreach($q->result() as $ka){
				$kodeakhir = $ka->Kode_Supplier;
			}
			$no = substr($kodeakhir,9,5);
				$intno = (int)$no;
				$next = $intno+1;
				
				//buat nol
				$nol = '';
				$Pintno = strlen($next);
				for($i = 1; $i <= 5-$Pintno; $i++){
					$nol = $nol.'0';
				}
				$kodejadi = 'SUP'.$date.$nol.$next;
		}
		else{
			$kodejadi = 'SUP'.$date.'00001';
		}
		return $kodejadi;
}
			
	
public function searchingdatasupplier(){
		$cari = $this->input->post('caridatasupplier');

		$b = $this->db->query("select Kode_Supplier, Nama_Supplier, Deskripsi, Alamat, Telepon, Email
		from tb_supplier where Kode_Supplier like '%$cari%' or Nama_Supplier Like '%$cari%' or Deskripsi Like '%$cari%' or Alamat Like '%$cari%'
		or Telepon Like '%$cari%' or Email Like '%$cari%'");
		
		return  $b->result();
	}
public function simpansupplier(){

	$data = array(       
	'Kode_Supplier'=>$this->input->post('Kode_Supplier'),
	'Nama_Supplier'=>$this->input->post('Nama_Supplier'),
	'Deskripsi'=>$this->input->post('Deskripsi'),
	'Alamat'=>$this->input->post('Alamat'),
	'Telepon'=>$this->input->post('Telepon'),
	'Email'=>$this->input->post('Email')
	
	);
	$this->db->insert('tb_supplier',$data);
	redirect(base_url('Supplier/index'));
	}
	
public function entries(){	
		$query = $this->db->query ("SELECT COUNT(Kode_Supplier) AS entri from tb_supplier");	
		return  $query->result();
} 	


public function ambil_data_editsupplier($kodenya){ 
		$this->db->where('Kode_Supplier',$kodenya);
	$sql=$this->db->get('tb_supplier');
	if($sql->num_rows()>0){
			return $sql->row_array(); 
		}
	}
public function updatebahanbaku(){
	
	$data = array(  
	'Nama_Supplier'=>$this->input->post('Nama_Supplier'),
	'Deskripsi'=>$this->input->post('Deskripsi'),
	'Alamat'=>$this->input->post('Alamat'),
	'Telepon'=>$this->input->post('Telepon'),
	'Email'=>$this->input->post('Email')
	
	);
	
	$this->db->where('Kode_Supplier',$this->input->post('Kode_Supplier'));
	$this->db->update('tb_supplier',$data);
	
	redirect(base_url("Supplier/index")); 
	}
public function hapus($where){
$this->db->where('Kode_Supplier',$where);
$this->db->delete('tb_supplier');
return true;
}
//bahan baku admin sampe sini

}
?>