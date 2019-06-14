<?php 
class Model_ReportReturPembelian extends CI_Model{
	
public function getrowsreportreturpembelian(){	
		$query = $this->db->query ("select * from tb_reportreturpembelian WHERE Tanggal_SelesaiRetur !='NULL'");	
		
		return $query->num_rows();
		
} 	
public function listdatareturpembelian($limit,$offset){
		$q = $this->db->query("select tb_reportreturpembelian.No_Retur, tb_reportreturpembelian.Status, tb_reportreturpembelian.Keterangan, tb_supplier.Nama_Supplier, 
		tb_supplier.Deskripsi,tb_reportreturpembelian.Tanggal_Retur,tb_reportreturpembelian.Tanggal_SelesaiRetur, tb_reportreturpembelian.Biaya_Retur
		from tb_reportreturpembelian join tb_supplier
		on tb_reportreturpembelian.Kode_Supplier = tb_supplier.Kode_Supplier
		ORDER BY tb_reportreturpembelian.Tanggal_SelesaiRetur Desc LIMIT $offset,$limit");
		return  $q->result();
	}
public function noretur(){
		$q = $this->db->query("SELECT MAX(RIGHT(No_Retur,2)) as idmax FROM tb_reportreturpembelian");
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
		$date = date('dmy');
		$kar = "R";
		$bgr = "BGR";
		$kodejadi = $kar.$date.$bgr.$kd;
		return $kodejadi;
	}
public function detailbantureturpembelian(){	
	$user = $this->session->userdata['Kode_User'];
		$query = $this->db->query ("select tb_bantudetailreturpembelian.No_Retur, tb_bantudetailreturpembelian.Kode_Bahan_Baku, tb_bantudetailreturpembelian.Qty, tb_bahan_baku.Nama_Barang, tb_bahan_baku.Nama_Satuan 
				from tb_bantudetailreturpembelian join tb_bahan_baku 
				on tb_bantudetailreturpembelian.Kode_Bahan_Baku = tb_bahan_baku.Kode_Bahan_Baku 
				where tb_bantudetailreturpembelian.Kode_User = '$user' ");	
		return  $query->result();
}	
public function datasupplier(){
		$query = $this->db->query("select Kode_Supplier, Nama_Supplier, Deskripsi
		from tb_supplier");
		
		return  $query->result();
	}
public function getdataautocomplete($keyword){
	
		$this->db->like('Kode_Bahan_Baku',$keyword);
		$this->db->or_like('Nama_Barang',$keyword);
		$sql = $this->db->get('tb_bahan_baku');
		
		return $sql;
		
	}
	
public function simpanreturpembeliandetail(){

	$data = array(       
	'No_Retur'=>$this->input->post('No_Retur'),
	'Kode_Bahan_Baku'=>$this->input->post('Kode_Bahan_Baku'),
	'Qty'=>$this->input->post('Qty'),
	'Kode_User'=>$this->input->post('Kode_User'),
	);
	$this->db->insert('tb_bantudetailreturpembelian',$data);
	$this->db->insert('tb_detailreturpembelian',$data);
	$this->db->insert('tb_reportdetailreturpembelian',$data);
	
	}
public function simpanreturpembelian(){
	date_default_timezone_set('Asia/Jakarta');
	$date = date('Y-m-d H:i:s');
	
	$data = array(       
	'No_Retur'=>$this->input->post('No_Retur'),
	'Kode_User'=>$this->input->post('Kode_User'),
	'Kode_Supplier'=>$this->input->post('Kode_Supplier'),
	'Tanggal_Retur'=>$date,
	'Keterangan'=>$this->input->post('Keterangan'),
	'Biaya_Retur'=>$this->input->post('Biaya_Retur'),
	'Status'=>$this->input->post('Status')
	);
	$this->db->insert('tb_returpembelian',$data);
	$this->db->insert('tb_reportreturpembelian',$data);
	
	}
	
public function hapusdetailbantu($where){
	$this->db->where('Kode_Bahan_Baku',$where);
	$this->db->delete('tb_bantudetailreturpembelian');
	return true;
	}	
public function hapusdetailbantusetelahselesairetur($where){
	$this->db->where('No_Retur',$where);
	$this->db->delete('tb_bantudetailreturpembelian');
	return true;
	}
public function hapusdetailretur($where){
	$this->db->where('Kode_Bahan_Baku',$where);
	$this->db->delete('tb_detailreturpembelian');
	return true;
	}	

public function hapusdetailreport($where){
	$this->db->where('Kode_Bahan_Baku',$where);
	$this->db->delete('tb_reportdetailreturpembelian');
	return true;
	}
//////////////////////////////////////////////////////////////
public function hapustbreturpembelian($where){
	$this->db->where('No_Retur',$where);
	$this->db->delete('tb_returpembelian');
	return true;
	}
public function hapustbdetailreturpembelian($where){
	$this->db->where('No_Retur',$where);
	$this->db->delete('tb_detailreturpembelian');
	return true;
	}
public function hapustbreportdetailreturpembelian($where){
	$this->db->where('No_Retur',$where);
	$this->db->delete('tb_reportdetailreturpembelian');
	return true;
	}	
public function hapustbreportreturpembelian($where){
	$this->db->where('No_Retur',$where);
	$this->db->delete('tb_reportreturpembelian');
	return true;
	}
///////////////////////////////////////////////////////////////
public function searchingdata(){
		$cari = $this->input->post('cari');

		$b = $this->db->query("select tb_reportreturpembelian.No_Retur, tb_supplier.Nama_Supplier, 
		tb_supplier.Deskripsi,tb_reportreturpembelian.Tanggal_Retur, tb_reportreturpembelian.Tanggal_SelesaiRetur,
		tb_reportreturpembelian.Status, tb_reportreturpembelian.Biaya_Retur
		from tb_reportreturpembelian join tb_supplier
		on tb_reportreturpembelian.Kode_Supplier = tb_supplier.Kode_Supplier
		where tb_reportreturpembelian.No_Retur like '%$cari%' or tb_supplier.Nama_Supplier Like '%$cari%' 
		or tb_supplier.Deskripsi Like '%$cari%' or tb_reportreturpembelian.Tanggal_Retur Like '%$cari%' or tb_reportreturpembelian.Tanggal_SelesaiRetur Like '%$cari%' 
		or tb_reportreturpembelian.Status Like '%$cari%' or tb_reportreturpembelian.Biaya_Retur Like '%$cari%'
		ORDER BY tb_reportreturpembelian.Tanggal_Retur Desc");
		
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
		$query = $this->db->query ("SELECT COUNT(No_Retur) AS entri from tb_reportreturpembelian where Tanggal_SelesaiRetur !='NULL'");	
		return  $query->result();
} 	

public function datatoko(){	
		$query = $this->db->query ("select * from alamat_toko");	
		return  $query->row_array();
}
public function ambi_data_reportreturpembelianheader($noretur){
		$q = $this->db->query("select tb_reportreturpembelian.No_Retur, tb_supplier.Nama_Supplier, tb_supplier.Telepon,tb_supplier.Alamat,tb_supplier.Email, 
		tb_supplier.Deskripsi,tb_reportreturpembelian.Tanggal_Retur,tb_reportreturpembelian.Tanggal_SelesaiRetur, 
		tb_reportreturpembelian.Status, tb_reportreturpembelian.Biaya_Retur, tb_reportreturpembelian.Keterangan, tb_user.Nama, tb_user.Username, tb_reportreturpembelian.Kode_User, tb_reportreturpembelian.Kode_Supplier
from tb_reportreturpembelian join tb_supplier
on tb_reportreturpembelian.Kode_Supplier = tb_supplier.Kode_Supplier
join tb_user on tb_reportreturpembelian.Kode_User = tb_user.Kode_User
where tb_reportreturpembelian.No_Retur = '$noretur'");
		return  $q->row_array();
	}
public function ambi_data_detailreportreturpembelianheader($noretur){	
		$query = $this->db->query ("select tb_reportdetailreturpembelian.No_Retur, tb_reportdetailreturpembelian.Kode_Bahan_Baku, tb_reportdetailreturpembelian.Qty, tb_bahan_baku.Nama_Barang, tb_reportdetailreturpembelian.Nama_Satuan 
				from tb_reportdetailreturpembelian join tb_bahan_baku 
				on tb_reportdetailreturpembelian.Kode_Bahan_Baku = tb_bahan_baku.Kode_Bahan_Baku 
				where tb_reportdetailreturpembelian.No_Retur = '$noretur' ");	
		return  $query->result();
}	
public function updateheaderreturpembelian(){
	
	$data = array(  
	'Kode_User'=>$this->input->post('Kode_User'),
	'Kode_Supplier'=>$this->input->post('Kode_Supplier'),
	'Tanggal_Retur'=>$this->input->post('Tanggal_Retur'),
	'Keterangan'=>$this->input->post('Keterangan'),
	'Biaya_Retur'=>$this->input->post('Biaya_Retur'),
	'Status'=>$this->input->post('Status')
	);
	
	$this->db->where('No_Retur',$this->input->post('No_Retur'));
	$this->db->update('tb_returpembelian',$data);
	
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
	
public function edittanggalselesai($id){
	date_default_timezone_set('Asia/Jakarta');
	$date = date('Y-m-d H:i:s');
	$data = array(  
	'Tanggal_SelesaiRetur'=>$date,
	
	);
	
	$this->db->where('No_Retur',$id);
	$this->db->update('tb_reportreturpembelian',$data);
	
	}
	
public function hapus($where){
$this->db->where('Kode_Supplier',$where);
$this->db->delete('tb_supplier');
return true;
}
//bahan baku admin sampe sini

}
?>