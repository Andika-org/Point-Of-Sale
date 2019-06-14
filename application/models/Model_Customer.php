<?php 
class Model_Customer extends CI_Model{

public function getrowcustomer(){	
		$query = $this->db->get ('tb_customer');	
		return  $query->num_rows();
} 	
public function listdatacustomer($limit,$offset){
		$q = $this->db->query("select *
		from tb_customer Order By Nama_Customer Asc LIMIT $offset,$limit");
		return  $q->result();
	}
public function kodecustomer(){
	$this->db->order_by('Id_Customer','DESC');
	$q = $this->db->get('tb_customer',1);
		
		$kodeakhir;
		$kodejadi;
		
		if(!empty($q->result())){
			foreach($q->result() as $ka){
				$kodeakhir = $ka->Id_Customer;
			}
			$no = substr($kodeakhir,3,5);
				$intno = (int)$no;
				$next = $intno+1;
				
				//buat nol
				$nol = '';
				$Pintno = strlen($next);
				for($i = 1; $i <= 5-$Pintno; $i++){
					$nol = $nol.'0';
				}
				$kodejadi = 'CUS'.$nol.$next;
		}
		else{
			$kodejadi = 'CUS'.'00001';
		}
		return $kodejadi;
}
			
	
public function searchingdatacustomer(){
		$cari = $this->input->post('caridatacustomer');

		$b = $this->db->query("select *
		from tb_customer where Id_Customer like '%$cari%' or Nama_Customer Like '%$cari%' or Alamat Like '%$cari%'
		or Telepon Like '%$cari%' or Email Like '%$cari%'");
		
		return  $b->result();
	}
public function simpancustomer($id){
	$file = $this->upload->data(); 
	
	$tgllahir = date("Y-m-d",strtotime($this->input->post('Tanggal_Lahir')));
	$tglregis = date("Y-m-d H:i:s",strtotime($this->input->post('Tanggal_Registrasi')));
	
	$data = array(       
	'Id_Customer'=>$id,
	'Nama_Customer'=>$this->input->post('Nama_Customer'),
	'Jenis_Kelamin'=>$this->input->post('Jenis_Kelamin'),
	'Tempat'=>$this->input->post('Tempat'),
	'Tanggal_Lahir'=>$tgllahir,
	'Alamat'=>$this->input->post('Alamat'),
	'Telepon'=>$this->input->post('Telepon'),
	'Email'=>$this->input->post('Email'),
	'Agama'=>$this->input->post('Agama'),
	'Kewarganegaraan'=>$this->input->post('Kewarganegaraan'),
	'Tanggal_Registrasi'=>$tglregis,
	'No_Identitas'=>$this->input->post('No_Identitas'),
	'Jenis_Identitas'=>$this->input->post('Jenis_Identitas'),
	'Foto_Identitas'=>$file['file_name']
	
	);
	$this->db->insert('tb_customer',$data);
	redirect(base_url('Customer/index'));
	}
	
public function entries(){	
		$query = $this->db->query ("SELECT COUNT(Id_Customer) AS entri from tb_customer");	
		return  $query->result();
} 	


public function ambil_data_editcustomer($kodenya){ 
		$this->db->where('Id_Customer',$kodenya);
	$sql=$this->db->get('tb_customer');
	if($sql->num_rows()>0){
			return $sql->row_array(); 
		}
	}
public function updatecustomer(){
	$file = $this->upload->data();
	
	$tgllahir = date("Y-m-d",strtotime($this->input->post('Tanggal_Lahir')));
	$tglregis = date("Y-m-d H:i:s",strtotime($this->input->post('Tanggal_Registrasi')));
	
	$ubah = $this->input->post('Ubah_File');
	
	if($ubah == "Yes"){
		unlink ('identitascustomer/'.$this->input->post('Foto_Lama'));
		$data = array(     
			'Nama_Customer'=>$this->input->post('Nama_Customer'),
			'Jenis_Kelamin'=>$this->input->post('Jenis_Kelamin'),
			'Tempat'=>$this->input->post('Tempat'),
			'Tanggal_Lahir'=>$tgllahir,
			'Alamat'=>$this->input->post('Alamat'),
			'Telepon'=>$this->input->post('Telepon'),
			'Email'=>$this->input->post('Email'),
			'Agama'=>$this->input->post('Agama'),
			'Kewarganegaraan'=>$this->input->post('Kewarganegaraan'),
			'Tanggal_Registrasi'=>$tglregis,
			'No_Identitas'=>$this->input->post('No_Identitas'),
			'Jenis_Identitas'=>$this->input->post('Jenis_Identitas'),
			'Foto_Identitas'=>$file['file_name']
	
			);
		$this->db->where('Id_Customer',$this->input->post('Id_Customer'));
		$this->db->update('tb_customer',$data);
	
		redirect(base_url("Customer/index")); 
	}else if($ubah == "No"){
		$data = array(    
			'Nama_Customer'=>$this->input->post('Nama_Customer'),
			'Jenis_Kelamin'=>$this->input->post('Jenis_Kelamin'),
			'Tempat'=>$this->input->post('Tempat'),
			'Tanggal_Lahir'=>$tgllahir,
			'Alamat'=>$this->input->post('Alamat'),
			'Telepon'=>$this->input->post('Telepon'),
			'Email'=>$this->input->post('Email'),
			'Agama'=>$this->input->post('Agama'),
			'Kewarganegaraan'=>$this->input->post('Kewarganegaraan'),
			'Tanggal_Registrasi'=>$tglregis,
			'No_Identitas'=>$this->input->post('No_Identitas'),
			'Jenis_Identitas'=>$this->input->post('Jenis_Identitas'),
			'Foto_Identitas'=>$this->input->post('Foto_Lama')
	
			);
		$this->db->where('Id_Customer',$this->input->post('Id_Customer'));
		$this->db->update('tb_customer',$data);
	
		redirect(base_url("Customer/index")); 
	}
	
	}
public function carifotoidentitas($id){	
		$query = $this->db->query ("select * from tb_customer where Id_Customer = '$id' ");	
		return  $query->row_array();
} 	

public function hapus($where){
$this->db->where('Id_Customer',$where);
$this->db->delete('tb_customer');
return true;
}
//bahan baku admin sampe sini

}
?>