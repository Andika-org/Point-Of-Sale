<?php
class model_barang extends CI_Model{
	function tampil_data(){
		return $this->db->query("select Kode_Barang,Nama_Barang from tb_barang_master");
	}

	function getKdBrg(){
		$this->db->select('RIGHT(tb_barang_master.Kode_Barang,4) as kode', FALSE);
		$this->db->order_by('Kode_Barang','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('tb_barang_master');      //cek dulu apakah ada sudah ada kode di tabel.    
		if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		$data = $query->row();      
		$kode = intval($data->kode) + 1;   
		}
		else {      
		   //jika kode belum ada      
		$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "BRG".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;    
	}

	function getKdBhnBaku(){
		return $this->db->get('tb_bahan_baku');
	}

	function input_header($data){
		$this->db->insert('tb_barang_master',$data);
	}
	function insert_detail($data){
		$this->db->insert('tb_barang_detail',$data);
	}
	function get_one($id){
		$param = array('Kode_Barang' => $id);
		return $this->db->get_where('v_barang',$param);
	}
	function tampil_detail($id){

		return $this->db->query("select * from v_barang where Kode_Barang='$id'");
	}
	function get_one_header($kode){
		$param = array('Kode_Barang' => $kode);
		return $this->db->get_where('tb_barang_master',$param);
	}
	function edit_header($data,$kode){
		$this->db->where('Kode_Barang', $kode);
		$this->db->update('tb_barang_master',$data);
	}
	function get_bahan_baku(){
		return $this->db->get('tb_bahan_baku');
	}
	function getBahanBaku($kd_barang){
		return $this->db->query("
			select 
				tb_barang_detail.Id_Barang, 
				tb_barang_detail.Kode_Bahan_Baku,
				tb_bahan_baku.Nama_Barang,
				tb_barang_detail.Jml_Stik
			from tb_barang_detail
				inner join tb_bahan_baku on 
				tb_barang_detail.Kode_Bahan_Baku = 
				tb_bahan_baku.Kode_Bahan_Baku
			WHERE tb_barang_detail.Kode_Barang='$kd_barang'");
	}
	function ambil_data_akhir(){
		return $this->db->query("select Kode_Barang
						FROM tb_barang_detail
						ORDER BY Kode_Barang
						DESC LIMIT 1");
		
	}
	function edit_detail($data){
		$this->db->insert('tb_barang_detail',$data);
	}
	function hasil_cari($key){
		$this->db->like('Nama_Barang',$key);
		$query = $this->db->get('tb_barang_master');
		return $query->result();
	}
	function pageBarangMaster($number,$offset){
		//$this->db->query("select * from dsfdsg LIMIT $offset, $limit");
		return $query = $this->db->get('tb_barang_master',$number,$offset)->result();
	}
	function jumlah_data(){
		return $this->db->get('tb_barang_master')->num_rows();
	}
}