<?php 
class Model_Barang extends CI_Model{
//bahan baku
public function getrowsbarang(){	
		$query = $this->db->get ('tb_barang');	
		return  $query->num_rows();
} 	
public function listdatabarang($limit,$offset){
		$q = $this->db->query("select tb_barang.Id, tb_barang.Code_Barcode, tb_barang.Scan, tb_barang.Kode_Bahan_Baku, 
		tb_gudang.Nama_Gudang, tb_barang.Nama_Barang,tb_barang.Isi,tb_barang.Nama_Satuan,tb_barang.Harga_Jual,tb_barang.Tanggal_Update,
		tb_bahan_baku.Foto_Barang
		from tb_barang join tb_gudang
		on tb_barang.Kode_Gudang = tb_gudang.Kode_Gudang
		join tb_bahan_baku
		on tb_barang.Kode_Bahan_Baku = tb_bahan_baku.Kode_Bahan_Baku
		Order By tb_barang.Nama_Barang Asc LIMIT $offset,$limit");
		return  $q->result();
	}
public function kodebarang(){
	$this->db->order_by('Id','DESC');
	$q = $this->db->get('tb_barang',1);
		
		$kodeakhir;
		$kodejadi;
		$kt='JL';
		date_default_timezone_set('Asia/Jakarta');
		$date = date('dmy');
		if(!empty($q->result())){
			foreach($q->result() as $ka){
				$kodeakhir = $ka->Id;
			}
			$no = substr($kodeakhir,10,5);
				$intno = (int)$no;
				$next = $intno+1;
				
				//buat nol
				$nol = '';
				$Pintno = strlen($next);
				for($i = 1; $i <= 5-$Pintno; $i++){
					$nol = $nol.'0';
				}
				$kodejadi = 'BR'.$date.$kt.$nol.$next;
		}
		else{
			$kodejadi = 'BR'.$date.$kt.'00001';
		}
		return $kodejadi;
}
			
	
public function searchingdatabarang(){
		$cari = $this->input->post('caridatasupplier');

		$b = $this->db->query("select tb_barang.Id, tb_bahan_baku.Foto_Barang, tb_barang.Code_Barcode, tb_barang.Scan, tb_barang.Kode_Bahan_Baku, tb_gudang.Nama_Gudang, tb_barang.Nama_Barang,tb_barang.Isi,tb_barang.Nama_Satuan,tb_barang.Harga_Jual,tb_barang.Tanggal_Update
		from tb_barang join tb_gudang
		on tb_barang.Kode_Gudang = tb_gudang.Kode_Gudang
		join tb_bahan_baku 
		on tb_barang.Kode_Bahan_Baku = tb_bahan_baku.Kode_Bahan_Baku
		where tb_barang.Id like '%$cari%'  or tb_barang.Code_Barcode like '%$cari%'  or tb_barang.Scan like '%$cari%'  or tb_barang.Tanggal_Update Like '%$cari%' or tb_barang.Kode_Bahan_Baku Like '%$cari%' or tb_gudang.Nama_Gudang Like '%$cari%' or tb_barang.Nama_Barang Like '%$cari%' or tb_barang.Isi Like '%$cari%' or tb_barang.Nama_Satuan Like '%$cari%' or tb_barang.Harga_Jual Like '%$cari%'");
		
		return  $b->result();
	}
public function simpanbarang($id){
	$lv1 = $this->input->post("QtyLv1");
	$lv2 = $this->input->post("QtyLv2");
	$lv3 = $this->input->post("QtyLv3");
	$lv4 = $this->input->post("QtyLv4");
	
	$name1 = $this->input->post("nmlv1");
	$name2 = $this->input->post("nmlv2");
	$name3 = $this->input->post("nmlv3");
	$name4 = $this->input->post("nmlv4");
	
	$isidefault2 = $this->input->post("Isi_Default2");
	$isidefault3 = $this->input->post("Isi_Default3");
	$isidefault4 = $this->input->post("Isi_Default4");
	
	
	if($lv1){
		$level = "Lv1";
	}else if($lv2){
		$level = "Lv2";
	}else if($lv3){
		$level = "Lv3";
	}else if($lv4){
		$level = "Lv4";
	}
	
	if($lv1){
		$qty = $lv1;
		$qtydefault = "";
	}else if($lv2){
		$qty = $lv2;
		$qtydefault = $isidefault2;
	}else if($lv3){
		$qty = $lv3;
		$qtydefault = $isidefault3;
	}else if($lv4){
		$qty = $lv4;
		$qtydefault = $isidefault4;
	}
	
	
	if($name1){
		$nmsatuan = $name1;
	}else if($name2){
		$nmsatuan = $name2;
	}else if($name3){
		$nmsatuan = $name3;
	}else if($name4){
		$nmsatuan = $name4;
	}
	
	if($lv1){
		$qty = $lv1;
		$qtydefault = "";
	}else if($lv2){
		$qty = $lv2;
		$qtydefault = $isidefault2;
	}else if($lv3){
		$qty = $lv3;
		$qtydefault = $isidefault3;
	}else if($lv4){
		$qty = $lv4;
		$qtydefault = $isidefault4;
	}

	date_default_timezone_set('Asia/Jakarta');
	$date = date('Y-m-d H:i:s');
	
	$data = array(       
	'Id'=>$this->input->post('Kode_Bahan_Baku').$this->input->post('Scanbarcode').$level,
	'Kode_Bahan_Baku'=>$this->input->post('Kode_Bahan_Baku'),
	'Kode_Gudang'=>$this->input->post('Kode_Gudang'),
	'Nama_Barang'=>$this->input->post('Nama_Barang'),
	'Isi'=>$qty,
	'Isi_Default'=>$qtydefault,
	'Level'=>$level,
	'Nama_Satuan'=>$nmsatuan,
	'Harga_Jual'=>$this->input->post('Harga_Jual'),
	'Scan'=>$this->input->post('Scanbarcode'),
	'Code_Barcode'=>$this->input->post('Code_Barcode'),
	'Tanggal_Update'=>$date
	
	);
	$this->db->insert('tb_barang',$data);
	
	}
public function databarang($idbarang){	
		$query = $this->db->query ("SELECT * from tb_barang where Id='$idbarang'");	
		return  $query->row_array();
}	
public function entries(){	
		$query = $this->db->query ("SELECT COUNT(Id) AS entri from tb_barang");	
		return  $query->result();
} 	
public function gudang(){	
		$query = $this->db->query ("SELECT * from tb_gudang");	
		return  $query->result();
}

public function ambil_data_editbarang($kodenya){ 
		$this->db->where('Id',$kodenya);
	$sql=$this->db->get('tb_barang');
	if($sql->num_rows()>0){
			return $sql->row_array(); 
		}
	}
	
public function updatebarang(){
	date_default_timezone_set('Asia/Jakarta');
	$date = ('Y-m-d H:i:s');
	$data = array(  
	'Kode_Bahan_Baku'=>$this->input->post('Kode_Bahan_Baku'),
	'Kode_Gudang'=>$this->input->post('Kode_Gudang'),
	'Nama_Barang'=>$this->input->post('Nama_Barang'),
	'Isi'=>$this->input->post('Isi'),
	'Nama_Satuan'=>$this->input->post('Nama_Satuan'),
	'Harga_Jual'=>$this->input->post('Harga_Jual'),
	'Tanggal_Update'=>$date
	
	);
	
	$this->db->where('Id',$this->input->post('Id'));
	$this->db->update('tb_barang',$data);
	
	redirect(base_url("Barang/index")); 
	}
	
public function hapus($where){
$this->db->where('Id',$where);
$this->db->delete('tb_barang');
return true;
}
//bahan baku admin sampe sini
public function getdataautocomplete($keyword){
	
		$this->db->like('Kode_Bahan_Baku',$keyword);
		$this->db->or_like('Nama_Barang',$keyword);
		$sql = $this->db->get('tb_bahan_baku');
		
		return $sql;
		
	}
}
?>