function cek_login($table,$where){
return $this->db->get_where($table,$where);
}

public function listdatabahanbaku(){
		$q = $this->db->query("select Kode_Bahan_Baku, Kode_Gudang, Nama_Barang, Foto_Barang, Stok, Satuan, Warna, Harga_Beli
		from tb_bahan_baku Order By Nama_Barang Asc");
		return  $q->result();
	}
public function searchingdatabahanbaku(){
		$cari = $this->input->post('caridatabahanbaku');

		$b = $this->db->query("select Kode_Bahan_Baku, Kode_Gudang, Nama_Barang, Foto_Barang, Stok, Satuan, Warna, Harga_Beli
		from tb_bahan_baku where Kode_Bahan_Baku like '%$cari%' or Kode_Gudang Like '%$cari%' or Nama_Barang Like '%$cari%'
		or Foto_Barang Like '%$cari%' or Stok Like '%$cari%' or Satuan Like '%$cari%' or Warna Like '%$cari%' or Harga_Beli Like '%$cari%'");
		
		return  $b->result();
	}
public function simpanbahanbaku(){
	$data = array(       
	'Kode_Bahan_Baku'=>$this->input->post('Kode_Bahan_Baku'),
	'Nama_Barang'=>$this->input->post('Nama_Barang')
	
	);
	$this->db->insert('tb_bahan_baku',$data);
	redirect(base_url('Control/databahanbaku'));
	}
public function ambil_data_editbahanbaku($kodenya){ 
		$this->db->where('Kode_Bahan_Baku',$kodenya);
	$sql=$this->db->get('tb_bahan_baku');
	if($sql->num_rows()>0){
			return $sql->row_array(); 
		}
	}
public function updatebahanbaku(){
	
	$data = array(  
	'Kode_Gudang'=>$this->input->post('Kode_Gudang'),
	'Nama_Barang'=>$this->input->post('Nama_Barang')
	
	);
	
	$this->db->where('Kode_Bahan_Baku',$this->input->post('Kode_Bahan_Baku'));
	$this->db->update('tb_bahan_baku',$data);
	}
public function hapusbarangbahanbaku($where){
$this->db->where('Kode_Bahan_Baku',$where);
$this->db->delete('tb_bahan_baku');
return true;
}

public function getrowbahanbaku(){	
		$query = $this->db->get ('tb_bahan_baku');	
		return  $query->num_rows();
}
	