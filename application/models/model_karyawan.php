<?php
class model_karyawan extends CI_Model{
	function tampil_data(){
		return $this->db->query("select * from tb_karyawan");
	}

	function getKar(){
		$this->db->select('RIGHT(tb_karyawan.Kode_Karyawan,4) as kode', FALSE);
		  $this->db->order_by('Kode_Karyawan','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('tb_karyawan');      //cek dulu apakah ada sudah ada kode di tabel.    
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
		  $kodejadi = "KAR".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}

	function input($data){
		$this->db->insert('tb_karyawan',$data);
	}

	function pageKaryawan($number,$offset){
		//$this->db->query("select * from dsfdsg LIMIT $offset, $limit");
		return $query = $this->db->get('tb_karyawan',$number,$offset)->result();
	}
	function jumlah_data(){
		return $this->db->get('tb_karyawan')->num_rows();
	}

	function get_one($id){
		$param = array('Kode_Karyawan' => $id);
		return $this->db->get_where('tb_karyawan',$param);
	}

	function edit($data,$kode){
		$this->db->where('Kode_Karyawan', $kode);
		$this->db->update('tb_karyawan',$data);
	}
}