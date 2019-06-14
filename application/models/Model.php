<?php 
class Model extends CI_Model{
	//cek login
function cek_login($table,$where){
return $this->db->get_where($table,$where);
}
//bahan baku
public function getrowbahanbaku(){	
		$query = $this->db->get ('tb_bahan_baku');	
		return  $query->num_rows();
} 	
/*
tb_bahan_baku.Palet, tb_bahan_baku.Isi_Dus, tb_bahan_baku.Isi_Box, tb_bahan_baku.Isi_Pcs, 
		tb_bahan_baku.Kg, tb_bahan_baku.Isi_SKg, tb_bahan_baku.Isi_SpKg, 
		tb_bahan_baku.L, tb_bahan_baku.Isi_SL, tb_bahan_baku.Isi_SpL
*/
public function datauser($usr,$pss){
		$q = $this->db->query("select * from tb_user where Username = '$usr' and Pass = '$pss' ");
		return  $q->row_array();
	}
public function datatoko(){
		$q = $this->db->query("select * from alamat_toko ");
		return  $q->row_array();
	}
public function listdatabahanbaku($limit,$offset){
		$q = $this->db->query("select tb_bahan_baku.Kode_Bahan_Baku, tb_gudang.Nama_Gudang, tb_bahan_baku.Nama_Barang,
		tb_bahan_baku.Lv1,tb_bahan_baku.Name_Lv1,tb_bahan_baku.Isi_Lv2,tb_bahan_baku.Name_Lv2,tb_bahan_baku.Isi_Lv3,tb_bahan_baku.Name_Lv3,
		tb_bahan_baku.Isi_Lv4,
		tb_bahan_baku.Isi_Lv1,tb_bahan_baku.Lv2,tb_bahan_baku.Lv3,tb_bahan_baku.Lv4,
		tb_bahan_baku.Name_Lv4,tb_bahan_baku.Foto_Barang
		from tb_bahan_baku join tb_gudang 
		on tb_bahan_baku.Kode_Gudang = tb_gudang.Kode_Gudang 
		Order By Nama_Barang Asc LIMIT $offset,$limit");
		return  $q->result();
	}
public function searchingdatabahanbaku(){
		$cari = $this->input->post('caridatabahanbaku');

		$b = $this->db->query("select tb_bahan_baku.Kode_Bahan_Baku, tb_gudang.Nama_Gudang, tb_bahan_baku.Nama_Barang,
		tb_bahan_baku.Foto_Barang,tb_bahan_baku.Lv1,tb_bahan_baku.Name_Lv1,tb_bahan_baku.Isi_Lv2,tb_bahan_baku.Name_Lv2,tb_bahan_baku.Isi_Lv3,tb_bahan_baku.Name_Lv3,tb_bahan_baku.Isi_Lv4,tb_bahan_baku.Name_Lv4
		
		from tb_bahan_baku join tb_gudang 
		on tb_bahan_baku.Kode_Gudang = tb_gudang.Kode_Gudang 
		
		where tb_bahan_baku.Kode_Bahan_Baku Like '%$cari%' or tb_gudang.Nama_Gudang Like '%$cari%' or tb_bahan_baku.Nama_Barang
		Like '%$cari%' or tb_bahan_baku.Lv1 Like '%$cari%' or tb_bahan_baku.Name_Lv1 Like '%$cari%' or tb_bahan_baku.Isi_Lv2 Like '%$cari%' or tb_bahan_baku.Name_Lv2 Like '%$cari%' or tb_bahan_baku.Isi_Lv3 Like '%$cari%' or
		tb_bahan_baku.Name_Lv3 Like '%$cari%' or tb_bahan_baku.Isi_Lv4 Like '%$cari%' or tb_bahan_baku.Name_Lv4 Like '%$cari%'
		");
		
		return  $b->result();
	}
public function gudang(){	
		$query = $this->db->query ("SELECT Kode_Gudang, Nama_Gudang FROM tb_gudang Order By Kode_Gudang Asc");	
		return  $query->result();
} 	
public function listsatuan(){	
		$query = $this->db->query ("SELECT Id_Satuan, Satuan_Bahan_baku FROM tb_satuan_bahan_baku Order By Satuan_Bahan_baku Asc");	
		return  $query->result();
} 
public function carisatuan($idsatuan){	
	$this->db->where('Id_Satuan',$idsatuan);
	$sql=$this->db->get('tb_satuan_bahan_baku');
	if($sql->num_rows()>0){
			return $sql->row_array(); 
		}
			
} 
public function simpanbahanbaku(){
	$file = $this->upload->data(); 
	
	$data = array(       
	'Kode_Bahan_Baku'=>$this->input->post('Kode_Bahan_Baku'),
	'Kode_Gudang'=>$this->input->post('Kode_Gudang'),
	'Nama_Barang'=>$this->input->post('Nama_Barang'),
	//'Type_Barang'=>$this->input->post('Type_Barang'),
	'Foto_Barang' 	=>$file['file_name'],
	'Lv1'=>$this->input->post('Lv1'),
	'Isi_Lv1'=>$this->input->post('Lv1'),
	'Name_Lv1'=>$this->input->post('Name_Lv1'),
	'Lv2'=>$this->input->post('Lv2'),
	'Isi_Lv2'=>$this->input->post('Lv2'),
	'Name_Lv2'=>$this->input->post('Name_Lv2'),
	'Lv3'=>$this->input->post('Lv3'),
	'Isi_Lv3'=>$this->input->post('Lv3'),
	'Name_Lv3'=>$this->input->post('Name_Lv3'),
	'Lv4'=>$this->input->post('Lv4'),
	'Isi_Lv4'=>$this->input->post('Lv4'),
	'Name_Lv4'=>$this->input->post('Name_Lv4'),
	
	//'Lv5'=>$this->input->post('Lv5'),
	//'Isi_Lv5'=>$this->input->post('Lv5'),
	//'Name_Lv5'=>$this->input->post('Name_Lv5'),
	/*
	'Palet'=>$this->input->post('Palet'),
	'Dus'=>$this->input->post('Dus'),
	'Isi_Dus'=>$this->input->post('Dus'),
	'Box'=>$this->input->post('Box'),
	'Isi_Box'=>$this->input->post('Box'),
	'Pcs'=>$this->input->post('Pcs'),
	'Isi_Pcs'=>$this->input->post('Pcs'),
	
	'Kg'=>$this->input->post('Kg'),
	'SKg'=>$this->input->post('SKg'),
	'Isi_Skg'=>$this->input->post('SKg'),
	'SpKg'=>$this->input->post('SpKg'),
	'Isi_SpKg'=>$this->input->post('SpKg'),
	
	'L'=>$this->input->post('L'),
	'SL'=>$this->input->post('SL'),
	'Isi_SL'=>$this->input->post('SL'),
	'SpL'=>$this->input->post('SpL'),
	'Isi_SpL'=>$this->input->post('SpL'),
	*/
	
	
	
	
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
public function list_detail_bahanbaku($kodenya){ 
	$sql=$this->db->query("select tb_bahan_baku.Kode_Bahan_Baku, tb_gudang.Nama_Gudang, tb_bahan_baku.Nama_Barang,
		tb_bahan_baku.Foto_Barang, tb_bahan_baku.Lv1,tb_bahan_baku.Name_Lv1,tb_bahan_baku.Isi_Lv2,tb_bahan_baku.Name_Lv2,tb_bahan_baku.Isi_Lv3,tb_bahan_baku.Name_Lv3,
		tb_bahan_baku.Isi_Lv4,tb_bahan_baku.Name_Lv4,
		tb_bahan_baku.Isi_Lv1,tb_bahan_baku.Lv2,tb_bahan_baku.Lv3,tb_bahan_baku.Lv4
		from tb_bahan_baku join tb_gudang 
		on tb_bahan_baku.Kode_Gudang = tb_gudang.Kode_Gudang 
		
		where tb_bahan_baku.Kode_Bahan_Baku = '$kodenya'");
	if($sql->num_rows()>0){
			return $sql->row_array(); 
		}
	}
public function updatebahanbaku($satuan){
	$file = $this->upload->data();
$ub = $this->input->post('Ubah_Gambar');
	if($ub=='Ubah'){	
	unlink ('fotobahanbaku/'.$this->input->post('Gambar_Lama'));
	$data = array(  
	'Kode_Gudang'=>$this->input->post('Kode_Gudang'),
	'Nama_Barang'=>$this->input->post('Nama_Barang'),
	'Stok'=>$this->input->post('Stok'),
	'Isi'=>$this->input->post('Isi'),
	'Sisa_Isi'=>$this->input->post('Isi'),
	'Satuan'=>$this->input->post('Satuan'),
	'Nama_Satuan'=>$satuan,
	'Harga_Beli'=>$this->input->post('Harga_Beli'),
	'Foto_Barang'=>$file['file_name']
	
	//'Harga_Jual'=>$this->input->post('Harga_Jual')
	
	);
	
	$this->db->where('Kode_Bahan_Baku',$this->input->post('Kode_Bahan_Baku'));
	$this->db->update('tb_bahan_baku',$data);
	}
	
	else{
	$data = array(      
	'Kode_Gudang'=>$this->input->post('Kode_Gudang'),
	'Nama_Barang'=>$this->input->post('Nama_Barang'),
	'Stok'=>$this->input->post('Stok'),
	'Isi'=>$this->input->post('Isi'),
	'Sisa_Isi'=>$this->input->post('Isi'),
	'Satuan'=>$this->input->post('Satuan'),
	'Nama_Satuan'=>$satuan,
	'Harga_Beli'=>$this->input->post('Harga_Beli'),
	'Foto_Barang'=>$this->input->post('Gambar_Lama')
	);
	
	$this->db->where('Kode_Bahan_Baku',$this->input->post('Kode_Bahan_Baku'));
	$this->db->update('tb_bahan_baku',$data);	
	}
	redirect(base_url("Control/databahanbaku")); 
	}
public function hapusbarangbahanbaku($where){
$this->db->where('Kode_Bahan_Baku',$where);
$this->db->delete('tb_bahan_baku');
return true;
}

public function entries(){	
		$query = $this->db->query ("SELECT COUNT(Kode_Bahan_Baku) AS entri from tb_bahan_baku");	
		return  $query->result();
} 	

//bahan baku admin sampe sini

}
?>