<?php 
class Model_AlamatToko extends CI_Model{
	

public function listdatatoko(){
		$q = $this->db->query("select * from alamat_toko");
		return  $q->result();
	}
public function listnew(){
		$q = $this->db->query("select * from alamat_toko");
		return  $q->row_array();
	}
public function datatokoarray($id){
		$q = $this->db->query("select * from alamat_toko");
		return  $q->row_array();
	}
public function simpanalamattoko(){
	$file = $this->upload->data(); 
	
	$data = array(       
	'Id_Toko'=>$this->input->post('Id_Toko'),
	'Nama_Toko'=>$this->input->post('Nama_Toko'),
	'Alamat_Toko'=>$this->input->post('Alamat_Toko'),
	'Rt'=>$this->input->post('Rt'),
	'Rw'=>$this->input->post('Rw'),
	'Desa'=>$this->input->post('Desa'),
	'Kecamatan'=>$this->input->post('Kecamatan'),
	'Kabupaten'=>$this->input->post('Kabupaten'),
	'Kode_Pos'=>$this->input->post('Kode_Pos'),
	'Telp'=>$this->input->post('Telp'),
	'Fax'=>$this->input->post('Fax'),
	'Deskripsi_Toko'=>$this->input->post('Deskripsi_Toko'),
	'Email_Toko'=>$this->input->post('Email_Toko'),
	'Foto_Toko'=>$file['file_name']
	
	);
	$this->db->insert('alamat_toko',$data);
	redirect(base_url('AlamatToko/index'));
	}
		
public function ambil_data_editalamattoko($kodenya){ 
		$this->db->where('Id_Toko',$kodenya);
	$sql=$this->db->get('alamat_toko');
	if($sql->num_rows()>0){
			return $sql->row_array(); 
		}
	}
public function updatealamattoko(){
	$file = $this->upload->data();
	
	$ubah = $this->input->post('Editfile');
	
	if($ubah == "Yes"){
		unlink ('gambartoko/'.$this->input->post('Foto_Toko_Lama'));
		
		$data = array(  
	'Nama_Toko'=>$this->input->post('Nama_Toko'),
	'Alamat_Toko'=>$this->input->post('Alamat_Toko'),
	'Rt'=>$this->input->post('Rt'),
	'Rw'=>$this->input->post('Rw'),
	'Desa'=>$this->input->post('Desa'),
	'Kecamatan'=>$this->input->post('Kecamatan'),
	'Kabupaten'=>$this->input->post('Kabupaten'),
	'Kode_Pos'=>$this->input->post('Kode_Pos'),
	'Telp'=>$this->input->post('Telp'),
	'Fax'=>$this->input->post('Fax'),
	'Deskripsi_Toko'=>$this->input->post('Deskripsi_Toko'),
	'Email_Toko'=>$this->input->post('Email_Toko'),
	'Foto_Toko'=>$file['file_name']
	
	);
	
	$this->db->where('Id_Toko',$this->input->post('Id_Toko'));
	$this->db->update('alamat_toko',$data);
	
	redirect(base_url("AlamatToko/index")); 
	}else if($ubah == "No"){
		
			$data = array(  
	'Nama_Toko'=>$this->input->post('Nama_Toko'),
	'Alamat_Toko'=>$this->input->post('Alamat_Toko'),
	'Rt'=>$this->input->post('Rt'),
	'Rw'=>$this->input->post('Rw'),
	'Desa'=>$this->input->post('Desa'),
	'Kecamatan'=>$this->input->post('Kecamatan'),
	'Kabupaten'=>$this->input->post('Kabupaten'),
	'Kode_Pos'=>$this->input->post('Kode_Pos'),
	'Telp'=>$this->input->post('Telp'),
	'Fax'=>$this->input->post('Fax'),
	'Deskripsi_Toko'=>$this->input->post('Deskripsi_Toko'),
	'Email_Toko'=>$this->input->post('Email_Toko'),
	'Foto_Toko'=>$this->input->post('Foto_Toko_Lama')
	
	);
	
	$this->db->where('Id_Toko',$this->input->post('Id_Toko'));
	$this->db->update('alamat_toko',$data);
	redirect(base_url("AlamatToko/index")); 
	}
	
	
	}
public function hapus($where){
$this->db->where('Id_Toko',$where);
$this->db->delete('alamat_toko');
return true;
}
//bahan baku admin sampe sini

}
?>