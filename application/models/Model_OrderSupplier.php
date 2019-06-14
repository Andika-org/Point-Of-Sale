<?php 
class Model_OrderSupplier extends CI_Model{

public function getrowheaderpembelian(){	// by supplier
		$kodesupplier = $this->session->userdata["Kode_Supplier"];
		$query = $this->db->query("select * from tb_header_pembelian_bahanbaku where Kode_Supplier = '$kodesupplier' ");	
		return  $query->num_rows();
} 
public function listdatapembelianbahanbaku($limit,$offset){
	$kodesupplier = $this->session->userdata["Kode_Supplier"];
	
		$q = $this->db->query("select tb_header_pembelian_bahanbaku.No_Faktur, tb_header_pembelian_bahanbaku.Tanggal_Pembelian, tb_header_pembelian_bahanbaku.Total_Pembelian, tb_supplier.Kode_Supplier, tb_supplier.Nama_Supplier, tb_supplier.Deskripsi, tb_header_pembelian_bahanbaku.Status_Pembelian
		from tb_header_pembelian_bahanbaku join tb_supplier
		on tb_header_pembelian_bahanbaku.Kode_Supplier = tb_supplier.Kode_Supplier
		where tb_header_pembelian_bahanbaku.Kode_Supplier = '$kodesupplier' 
		Order By tb_header_pembelian_bahanbaku.Tanggal_Pembelian DESC LIMIT $offset,$limit");
		return  $q->result();
	}	
public function entries(){	
	$kodesupplier = $this->session->userdata["Kode_Supplier"];
	
		$query = $this->db->query ("SELECT COUNT(No_Faktur) AS entri from tb_header_pembelian_bahanbaku where Kode_Supplier = '$kodesupplier' ");	
		return  $query->result();
} 


public function updatenota(){
	$file = $this->upload->data(); 
	$ub = $this->input->post('Ubah_Gambar');
	
	if($ub=='Edit'){
		

	unlink ('fotobuktipembayaran/' .$this->input->post('Gambar_Lama'));
	$tglbeli = date('Y-m-d H:i:s', strtotime($this->input->post('Tanggal_Pembelian')));
	$tgltempo = $this->input->post('Tanggal_Jatuh_Tempo');
	
	if($tgltempo){
		$tgltp = date('Y-m-d', strtotime($this->input->post('Tanggal_Jatuh_Tempo')));
	}
	else if($tgltempo==''){
		$tgltp = '0000-00-00';
	}
	
	$data = array(       
	'Kode_User'=>$this->input->post('Kode_User'),
	'Kode_Supplier'=>$this->input->post('Kode_Supplier'),
	'Tanggal_Pembelian'=>$tglbeli,
	'Discount'=>$this->input->post('Discount'),
	'Ppn'=>$this->input->post('Ppn'),
	'Jenis_Pembayaran'=>$this->input->post('Jenis_Pembayaran'),
	'Tanggal_Jatuh_Tempo'=>$tgltp,
	'Nomor_Rekening'=>$this->input->post('Nomor_Rekening'),
	'Total_Pembelian'=>$this->input->post('Total_Pembelian'),
	'Total_Pembelian_Sebelumnya'=>$this->input->post('Total_Pembelian_Sebelumnya'),
	'Bukti_Pembayaran' 	=> $file['file_name'],
	
	'Nama_Bank'=>$this->input->post('Nama_Bank'),
	'Nominal'=>$this->input->post('Nominal'),
	'Kembali'=>$this->input->post('Kembali'),
	'Atas_Nama'=>$this->input->post('Atas_Nama'),
	
	'Status_Pembelian'=>$this->input->post('Status_Pembelian')
	);
	
	$this->db->where('No_Faktur',$this->input->post('No_Faktur'));
	$this->db->update('tb_header_pembelian_bahanbaku',$data);
	}
	///////////////////////////////////////////////////////////////////////
	else{
	$tglbeli = date('Y-m-d H:i:s', strtotime($this->input->post('Tanggal_Pembelian')));
	$tgltempo = $this->input->post('Tanggal_Jatuh_Tempo');
	
	if($tgltempo){
		$tgltp = date('Y-m-d', strtotime($this->input->post('Tanggal_Jatuh_Tempo')));
	}
	else if($tgltempo==''){
		$tgltp = '0000-00-00';
	}
	
	$data = array(       
	'Kode_User'=>$this->input->post('Kode_User'),
	'Kode_Supplier'=>$this->input->post('Kode_Supplier'),
	'Tanggal_Pembelian'=>$tglbeli,
	'Discount'=>$this->input->post('Discount'),
	'Ppn'=>$this->input->post('Ppn'),
	'Jenis_Pembayaran'=>$this->input->post('Jenis_Pembayaran'),
	'Tanggal_Jatuh_Tempo'=>$tgltp,
	'Nomor_Rekening'=>$this->input->post('Nomor_Rekening'),
	'Total_Pembelian'=>$this->input->post('Total_Pembelian'),
	'Total_Pembelian_Sebelumnya'=>$this->input->post('Total_Pembelian_Sebelumnya'),
	'Bukti_Pembayaran' 	=>$this->input->post('Gambar_Lama'),
	
	'Nama_Bank'=>$this->input->post('Nama_Bank'),
	'Nominal'=>$this->input->post('Nominal'),
	'Kembali'=>$this->input->post('Kembali'),
	'Atas_Nama'=>$this->input->post('Atas_Nama'),
	
	'Status_Pembelian'=>$this->input->post('Status_Pembelian')
	);
	
	$this->db->where('No_Faktur',$this->input->post('No_Faktur'));
	$this->db->update('tb_header_pembelian_bahanbaku',$data);
	}
	redirect(base_url("OrderSupplier/index")); 
	}
public function datasupplier(){
		$q = $this->db->query("select Kode_Supplier, Nama_Supplier, Deskripsi
		from tb_supplier Order By Kode_Supplier Asc");
		return  $q->result();
	}
	
public function ambil_data_headerpembelian($kodenya){ 
		$this->db->where('No_Faktur',$kodenya);
	$sql=$this->db->get('tb_header_pembelian_bahanbaku');
	if($sql->num_rows()>0){
			return $sql->row_array(); 
		}
	}
public function notsupplier($y){
		$q = $this->db->query("select Kode_Supplier, Nama_Supplier, Deskripsi
		from tb_supplier where Kode_Supplier='$y'");
		return  $q->row_array();
	}
	
public function notuser($user){
		$q = $this->db->query("select Kode_User, Username, Nama
		from tb_user where Kode_User='$user'");
		return  $q->row_array();
	}
public function updatestatus(){
	$data = array(       
	'Status_Pembelian'=>$this->input->post('Status_Pembelian')
	);
	$this->db->where('No_Faktur',$kode = $this->input->post('No_Faktur'));
	$this->db->update('tb_header_pembelian_bahanbaku',$data);
}
public function searchingdatanota(){
		$kodesupplier = $this->session->userdata["Kode_Supplier"];
	
		$tglawal = date('Y-m-d', strtotime($this->input->post('Tanggal_Awal')));
		$tglakhir = date('Y-m-d', strtotime($this->input->post('Tanggal_Akhir')));
		
		$b = $this->db->query("select tb_header_pembelian_bahanbaku.No_Faktur, tb_header_pembelian_bahanbaku.Tanggal_Pembelian, 
tb_header_pembelian_bahanbaku.Total_Pembelian, 
tb_supplier.Kode_Supplier, tb_supplier.Nama_Supplier, 
tb_supplier.Deskripsi, tb_header_pembelian_bahanbaku.Status_Pembelian 
from tb_header_pembelian_bahanbaku join tb_supplier 
on tb_header_pembelian_bahanbaku.Kode_Supplier = tb_supplier.Kode_Supplier 
where tb_header_pembelian_bahanbaku.Kode_Supplier = '$kodesupplier' 
and tb_header_pembelian_bahanbaku.Tanggal_Pembelian BETWEEN '$tglawal' AND '$tglakhir' 
Order By tb_header_pembelian_bahanbaku.Tanggal_Pembelian Asc ");
		
		return  $b->result();
	}

public function searchingdataall(){
	$kodesupplier = $this->session->userdata["Kode_Supplier"];
		$cari = $this->input->post('cariall');

		$b = $this->db->query("select tb_header_pembelian_bahanbaku.No_Faktur, tb_header_pembelian_bahanbaku.Tanggal_Pembelian, tb_header_pembelian_bahanbaku.Total_Pembelian, tb_supplier.Kode_Supplier, tb_supplier.Nama_Supplier, tb_supplier.Deskripsi, tb_header_pembelian_bahanbaku.Status_Pembelian
		from tb_header_pembelian_bahanbaku join tb_supplier
		on tb_header_pembelian_bahanbaku.Kode_Supplier = tb_supplier.Kode_Supplier
		where 
		tb_header_pembelian_bahanbaku.No_Faktur like '%$cari%' or 
		tb_header_pembelian_bahanbaku.Total_Pembelian like '%$cari%' or 
		tb_supplier.Nama_Supplier like '%$cari%' or 
		tb_header_pembelian_bahanbaku.Status_Pembelian like '%$cari%'
		and tb_header_pembelian_bahanbaku.Kode_Supplier ='$kodesupplier'");
		
		return  $b->result();
	}
public function listdatadetailbahanbaku2($faktur){
	
		$q = $this->db->query("select Kode_Bahan_Baku, Nama_Barang, Qty, Nama_Satuan, Harga_Beli 
		from tb_detail_pembelian WHERE No_Faktur ='$faktur' Order By No_Faktur Asc");
		return  $q->result();
	}
public function datatoko(){	
		$query = $this->db->query ("select * from alamat_toko");	
		return  $query->row_array();
}
//////////////////// batas supplier ////////////////

}
?>