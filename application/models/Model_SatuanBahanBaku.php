<?php 
class Model_SatuanBahanBaku extends CI_Model{
	//cek login
function cek_login($table,$where){
return $this->db->get_where($table,$where);
}
//bahan baku
public function getrowsatuanbahanbaku(){	
		$query = $this->db->get ('tb_satuan_bahan_baku');	
		return  $query->num_rows();
} 	
public function listsatuanbahanbaku($limit,$offset){
		$q = $this->db->query("select Id_Satuan, Satuan_Bahan_Baku
		from tb_satuan_bahan_baku Order By Satuan_Bahan_Baku Asc LIMIT $offset,$limit");
		return  $q->result();
	}
public function kodesatuanbahanbaku(){
		$q = $this->db->query("SELECT MAX(RIGHT(Id_Satuan,2)) as idmax FROM tb_satuan_bahan_baku");
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
		
		$kar = "ST";
		$kodejadi = $kar.$kd;
		return $kodejadi;
	}
	
public function searchingdatasatuanbahanbaku(){
		$cari = $this->input->post('caridatasatuanbahanbaku');

		$b = $this->db->query("select Id_Satuan, Satuan_Bahan_Baku
		from tb_satuan_bahan_baku where Satuan_Bahan_Baku like '%$cari%'");
		
		return  $b->result();
	}
public function entries(){	
		$query = $this->db->query ("SELECT COUNT(Id_Satuan) AS entri from tb_satuan_bahan_baku");	
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
$this->db->where('Id_Satuan',$where);
$this->db->delete('tb_satuan_bahan_baku');
return true;
}
//bahan baku admin sampe sini

}
?>