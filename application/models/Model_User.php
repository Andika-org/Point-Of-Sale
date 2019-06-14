<?php 
class Model_User extends CI_Model{
	//cek login
function cek_login($table,$where){
return $this->db->get_where($table,$where);
}
//bahan baku
public function getrowuser(){	
		$query = $this->db->get ('tb_user');	
		return  $query->num_rows();
} 	
public function listdatauser($limit,$offset){
		$q = $this->db->query("select * from tb_user Order By Username Asc LIMIT $offset,$limit");
		return  $q->result();
	}
public function kodeuser(){
	$this->db->order_by('Kode_User','DESC');
	$q = $this->db->get('tb_user',1);
		
		$kodeakhir;
		$kodejadi;
		$date = date('Ym');
		if(!empty($q->result())){
			foreach($q->result() as $ka){
				$kodeakhir = $ka->Kode_User;
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
				$kodejadi = 'USR'.$date.$nol.$next;
		}
		else{
			$kodejadi = 'USR'.$date.'00001';
		}
		return $kodejadi;
}
			
	
public function searchingdatauser(){
		$cari = $this->input->post('caridatauser');

		$b = $this->db->query("select Kode_User,Hak_Akses,No_Identitas,Nama, Kode_Supplier
		from tb_user where Hak_Akses like '%$cari%' or No_Identitas like '%$cari%' or Nama Like '%$cari%' ");
		
		return  $b->result();
	}
public function simpanuser($kodeuser){

	$data = array(       
	'Kode_User'=>$kodeuser,
	'No_Identitas'=>$this->input->post('No_Identitas'),
	'Nama'=>$this->input->post('Nama'),
	'Username'=>$this->input->post('Username'),
	'Pass'=>$this->input->post('Pass'),
	'Hak_Akses'=>$this->input->post('Hak_Akses'),
	'Jenis_Kelamin'=>$this->input->post('Jenis_Kelamin'),
	'Phone'=>$this->input->post('Phone'),
	'Contact'=>$this->input->post('Contact'),
	'Kode_Supplier'=>$this->input->post('Kode_Supplier')
	
	);
	$this->db->insert('tb_user',$data);
	}
	
public function entries(){	
		$query = $this->db->query ("SELECT COUNT(Kode_User) AS entri from tb_user");	
		return  $query->result();
} 	
public function supplier(){	
		$query = $this->db->query ("SELECT * from tb_supplier order by Nama_Supplier ASC");	
		return  $query->result();
} 
public function ambil_data_edituser($kodenya){ 
		$this->db->where('Kode_User',$kodenya);
	$sql=$this->db->get('tb_user');
	if($sql->num_rows()>0){
			return $sql->row_array(); 
		}
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
$this->db->where('Kode_User',$where);
$this->db->delete('tb_user');
return true;
}
//bahan baku admin sampe sini

}
?>