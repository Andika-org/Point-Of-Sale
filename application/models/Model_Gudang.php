<?php 
class Model_Gudang extends CI_Model{
	//cek login
function cek_login($table,$where){
return $this->db->get_where($table,$where);
}
//bahan baku
public function getrowGudang(){	
		$query = $this->db->get ('tb_gudang');	
		return  $query->num_rows();
} 	
public function listgudang($limit,$offset){
		$q = $this->db->query("select Kode_Gudang, Nama_Gudang
		from tb_gudang Order By Nama_Gudang Asc LIMIT $offset,$limit");
		return  $q->result();
	}
public function kodegudang(){
		$q = $this->db->query("SELECT MAX(RIGHT(Kode_Gudang,2)) as idmax FROM tb_gudang");
		$kd = "";
		
		if($q->num_rows()>0){ //jika data ada
			foreach($q->result() as $k){
				$tmp = ((int)$k->idmax)+1;
				$kd = sprintf('0'.$tmp);
			}
		} else { //jika data kosong di set kode awal
			$kd = "01";
		}
		date_default_timezone_set('Asia/Jakarta');
		
		$kar = "GD";
		$kodejadi = $kar.$kd;
		return $kodejadi;
	}
	
public function searchingdatagudang(){
		$cari = $this->input->post('caridatagudang');

		$b = $this->db->query("select Kode_Gudang, Nama_Gudang
		from tb_gudang where Nama_Gudang like '%$cari%'");
		
		return  $b->result();
	}
public function entries(){	
		$query = $this->db->query ("SELECT COUNT(Kode_Gudang) AS entri from tb_gudang");	
		return  $query->result();
} 	


public function ambil_data_editsatuanbahanbaku($kodenya){ 
		$this->db->where('Id_Satuan',$kodenya);
	$sql=$this->db->get('tb_satuan_bahan_baku');
	if($sql->num_rows()>0){
			return $sql->row_array(); 
		}
	}
public function updatebahanbaku(){
	
	$data = array(  
	'Satuan_Bahan_Baku'=>$this->input->post('Satuan_Bahan_Baku')
	);
	
	$this->db->where('Id_Satuan',$this->input->post('Id_Satuan'));
	$this->db->update('tb_satuan_bahan_baku',$data);
	
	redirect(base_url("SatuanBahanBaku/index")); 
	}
public function hapus($where){
$this->db->where('Kode_Gudang',$where);
$this->db->delete('tb_gudang');
return true;
}
//bahan baku admin sampe sini

}
?>