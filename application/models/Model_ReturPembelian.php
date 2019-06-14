<?php 
class Model_ReturPembelian extends CI_Model{
	
public function getrowsreturpembelian(){	
		$query = $this->db->get ('tb_returpembelian');	
		return  $query->num_rows();
} 	
public function listdatareturpembelian($limit,$offset){
		$q = $this->db->query("select tb_returpembelian.No_Retur, tb_returpembelian.Status, tb_returpembelian.Keterangan, tb_supplier.Nama_Supplier, 
		tb_supplier.Deskripsi,tb_returpembelian.Tanggal_Retur, 
		tb_returpembelian.Status, tb_returpembelian.Biaya_Retur
from tb_returpembelian join tb_supplier
on tb_returpembelian.Kode_Supplier = tb_supplier.Kode_Supplier
ORDER BY tb_returpembelian.Tanggal_Retur Desc LIMIT $offset,$limit");
		return  $q->result();
	}
public function noretur(){
	$this->db->order_by('No_Retur','DESC');
	$q = $this->db->get('tb_reportreturpembelian',1);
		
		$kodeakhir;
		$kodejadi;
		date_default_timezone_set('Asia/Jakarta');
		$date = date('dmy');
		$kar = "R";
		$bgr = "BGR";
		
		if(!empty($q->result())){
			foreach($q->result() as $ka){
				$kodeakhir = $ka->No_Retur;
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
				$kodejadi = $kar.$date.$bgr.$nol.$next;
		}
		else{
			$kodejadi = $kar.$date.$bgr.'00001';
		}
		return $kodejadi;
	}
public function iddetail(){
	$this->db->order_by('Id_Detail','DESC');
	$q = $this->db->get('tb_reportdetailreturpembelian',1);
		
		$kodeakhir;
		$kodejadi;
		//date_default_timezone_set('Asia/Jakarta');
		//$date = date('dmy');
		$kar = "DET";
		//$bgr = "BGR";
		
		if(!empty($q->result())){
			foreach($q->result() as $ka){
				$kodeakhir = $ka->Id_Detail;
			}
			$no = substr($kodeakhir,3,5);
				$intno = (int)$no;
				$next = $intno+1;
				
				//buat nol
				$nol = '';
				$Pintno = strlen($next);
				for($i = 1; $i <= 5-$Pintno; $i++){
					$nol = $nol.'0';
				}
				$kodejadi = $kar.$nol.$next;
		}
		else{
			$kodejadi = $kar.'00001';
		}
		return $kodejadi;
	}
public function detailbantureturpembelian(){	
	$user = $this->session->userdata['Kode_User'];
		$query = $this->db->query ("select tb_bantudetailreturpembelian.Id_Detail,tb_bantudetailreturpembelian.No_Retur, tb_bantudetailreturpembelian.Kode_Bahan_Baku, tb_bantudetailreturpembelian.Qty, tb_bahan_baku.Nama_Barang,tb_bantudetailreturpembelian.Nama_Satuan
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
	$lv1 = $this->input->post("QtyLv1");
	$lv2 = $this->input->post("QtyLv2");
	$lv3 = $this->input->post("QtyLv3");
	$lv4 = $this->input->post("QtyLv4");
	
	$name1 = $this->input->post("nmlv1");
	$name2 = $this->input->post("nmlv2");
	$name3 = $this->input->post("nmlv3");
	$name4 = $this->input->post("nmlv4");
	
	
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
	}else if($lv2){
		$qty = $lv2;
	}else if($lv3){
		$qty = $lv3;
	}else if($lv4){
		$qty = $lv4;
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
	
	$data = array(       
	'Id_Detail'=>$this->input->post('Id_Detail'),
	'No_Retur'=>$this->input->post('No_Retur'),
	'Kode_Bahan_Baku'=>$this->input->post('Kode_Bahan_Baku'),
	'Qty'=>$qty,
	'Level'=>$level,
	'Nama_Satuan'=>$nmsatuan,
	'Kode_User'=>$this->input->post('Kode_User')
	);
	$this->db->insert('tb_bantudetailreturpembelian',$data);
	$this->db->insert('tb_reportdetailreturpembelian',$data);
	$this->db->insert('tb_detailreturpembelian',$data);
	
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
	$this->db->where('Id_Detail',$where);
	$this->db->delete('tb_bantudetailreturpembelian');
	return true;
	}	
public function hapusdetailbantusetelahselesairetur($where){
	$this->db->where('No_Retur',$where);
	$this->db->delete('tb_bantudetailreturpembelian');
	return true;
	}
public function hapusdetailretur($where){
	$this->db->where('Id_Detail',$where);
	$this->db->delete('tb_detailreturpembelian');
	return true;
	}	

public function hapusdetailreport($where){
	$this->db->where('Id_Detail',$where);
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

		$b = $this->db->query("select tb_returpembelian.No_Retur, tb_supplier.Nama_Supplier, 
		tb_supplier.Deskripsi,tb_returpembelian.Tanggal_Retur, 
		tb_returpembelian.Status, tb_returpembelian.Biaya_Retur
		from tb_returpembelian join tb_supplier
		on tb_returpembelian.Kode_Supplier = tb_supplier.Kode_Supplier
		where tb_returpembelian.No_Retur like '%$cari%' or tb_supplier.Nama_Supplier Like '%$cari%' 
		or tb_supplier.Deskripsi Like '%$cari%' or tb_returpembelian.Tanggal_Retur Like '%$cari%' 
		or tb_returpembelian.Status Like '%$cari%' or tb_returpembelian.Biaya_Retur Like '%$cari%'
		ORDER BY tb_returpembelian.Tanggal_Retur Desc");
		
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
		$query = $this->db->query ("SELECT COUNT(No_Retur) AS entri from tb_returpembelian");	
		return  $query->result();
} 	
public function datatoko(){	
		$query = $this->db->query ("select * from alamat_toko");	
		return  $query->row_array();
}
public function sumdetail($noretur){	
		$query = $this->db->query ("select COUNT('No_Retur') as countretur from tb_detailreturpembelian where No_Retur='$noretur'");	
		return  $query->row_array();
}
public function ambi_data_returpembelianheader($noretur){
		$q = $this->db->query("select tb_returpembelian.No_Retur, tb_supplier.Nama_Supplier, tb_supplier.Telepon,tb_supplier.Alamat,tb_supplier.Email, 
		tb_supplier.Deskripsi,tb_returpembelian.Tanggal_Retur, 
		tb_returpembelian.Status, tb_returpembelian.Biaya_Retur, tb_returpembelian.Keterangan, tb_user.Nama, tb_user.Username, tb_returpembelian.Kode_User, tb_returpembelian.Kode_Supplier
from tb_returpembelian join tb_supplier
on tb_returpembelian.Kode_Supplier = tb_supplier.Kode_Supplier
join tb_user on tb_returpembelian.Kode_User = tb_user.Kode_User
where tb_returpembelian.No_Retur = '$noretur'");
		return  $q->row_array();
	}
public function ambi_data_detailreturpembelianheader($noretur){	
		$query = $this->db->query ("select tb_detailreturpembelian.Id_Detail, tb_detailreturpembelian.No_Retur, tb_detailreturpembelian.Kode_Bahan_Baku, tb_detailreturpembelian.Qty, tb_bahan_baku.Nama_Barang, tb_detailreturpembelian.Nama_Satuan 
				from tb_detailreturpembelian join tb_bahan_baku 
				on tb_detailreturpembelian.Kode_Bahan_Baku = tb_bahan_baku.Kode_Bahan_Baku 
				where tb_detailreturpembelian.No_Retur = '$noretur' ");	
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
public function updateheaderreportreturpembelian(){
	
	$data = array(  
	'Kode_User'=>$this->input->post('Kode_User'),
	'Kode_Supplier'=>$this->input->post('Kode_Supplier'),
	'Tanggal_Retur'=>$this->input->post('Tanggal_Retur'),

	'Keterangan'=>$this->input->post('Keterangan'),
	'Biaya_Retur'=>$this->input->post('Biaya_Retur'),
	'Status'=>$this->input->post('Status')
	);
	
	$this->db->where('No_Retur',$this->input->post('No_Retur'));
	$this->db->update('tb_reportreturpembelian',$data);
	
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
	'Status'=>'Selesai',
	
	);
	
	$this->db->where('No_Retur',$id);
	$this->db->update('tb_reportreturpembelian',$data);
	
	}
	
public function hapus($where){
$this->db->where('Kode_Supplier',$where);
$this->db->delete('tb_supplier');
return true;
}
//////////////// proses retur bahan baku kurangin stok ////////////////
 public function databahanbaku($kdbhnbaku){
	 $data = $this->db->query("SELECT * from tb_bahan_baku where Kode_Bahan_Baku = '$kdbhnbaku'");
	 return $data->row_array();
 }
/////////// lv1 //////////
public function hapuslv1($kdbhnbaku,$hapuslv1){
	$data = array(       
	'Lv1'=>$hapuslv1
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
/////////// lv2 //////////
public function hapuslv2lebihdari($kdbhnbaku,$sisalv1,$hasillv2){
	$data = array(       
	'Lv1'=>$sisalv1,
	'Isi_Lv2'=>$hasillv2
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
public function hapuslv2kurangdari($kdbhnbaku,$sisalv1kurangdari,$hasillv2kurangdari){
	$data = array(       
	'Lv1'=>$sisalv1kurangdari,
	'Isi_Lv2'=>$hasillv2kurangdari
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
public function hapuslv2samadengan($kdbhnbaku,$sisalv1samadengan,$hasillv2samadengan){
	$data = array(       
	'Lv1'=>$sisalv1samadengan,
	'Isi_Lv2'=>$hasillv2samadengan
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
/////////// lv3 //////////
public function hapuslv3lebihdari($kdbhnbaku,$hasillv1lebihdari,$hasillv2lebihdari,$hasillv3lebihdari){
	$data = array(       
	'Lv1'=>$hasillv1lebihdari,
	'Isi_Lv2'=>$hasillv2lebihdari,
	'Isi_Lv3'=>$hasillv3lebihdari
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
public function hapuslv3kurangdari($kdbhnbaku,$hasillv1kurangdariuntuk3,$hasillv2kurangdariuntuk3,$hasillv3kurangdariuntuk3){
	$data = array(       
	'Lv1'=>$hasillv1kurangdariuntuk3,
	'Isi_Lv2'=>$hasillv2kurangdariuntuk3,
	'Isi_Lv3'=>$hasillv3kurangdariuntuk3
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
public function hapuslv3samadengan($kdbhnbaku,$hasillv1samadenganuntuk3,$hasillv2samadenganuntuk3,$hasillv3samadenganuntuk3){
	$data = array(       
	'Lv1'=>$hasillv1samadenganuntuk3,
	'Isi_Lv2'=>$hasillv2samadenganuntuk3,
	'Isi_Lv3'=>$hasillv3samadenganuntuk3
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
/////////// lv4 //////////
public function hapuslv4lebihdari($kdbhnbaku,$lv1lebihdariuntuk4,$lv2lebihdariuntuk4,$lv3lebihdariuntuk4,$lv4lebihdariuntuk4){
	$data = array(       
	'Lv1'=>$lv1lebihdariuntuk4,
	'Isi_Lv2'=>$lv2lebihdariuntuk4,
	'Isi_Lv3'=>$lv3lebihdariuntuk4,
	'Isi_Lv4'=>$lv4lebihdariuntuk4
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
public function hapuslv4kurangdari($kdbhnbaku,$lv1kurangdariuntuk4,$lv2kurangdariuntuk4,$lv3kurangdariuntuk4,$lv4kurangdariuntuk4){
	$data = array(       
	'Lv1'=>$lv1kurangdariuntuk4,
	'Isi_Lv2'=>$lv2kurangdariuntuk4,
	'Isi_Lv3'=>$lv3kurangdariuntuk4,
	'Isi_Lv4'=>$lv4kurangdariuntuk4
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
public function hapuslv4samadengan($kdbhnbaku,$lv1samadenganuntuk4,$lv2samadenganuntuk4,$lv3samadenganuntuk4,$lv4samadenganuntuk4){
	$data = array(       
	'Lv1'=>$lv1samadenganuntuk4,
	'Isi_Lv2'=>$lv2samadenganuntuk4,
	'Isi_Lv3'=>$lv3samadenganuntuk4,
	'Isi_Lv4'=>$lv4samadenganuntuk4
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
//////////////// proses hapus detail retur bahan baku kurangin stok ////////////////
public function databhnbkutbbantudetailretur($id){
	 $data = $this->db->query("SELECT * from tb_bantudetailreturpembelian where Id_Detail = '$id'");
	 return $data->row_array();
 }
public function databhnbkutbdetailretur($id){
	 $data = $this->db->query("SELECT * from tb_detailreturpembelian where Id_Detail = '$id'");
	 return $data->row_array();
 }
///////// Lv1 //////////
public function updatelv1($kdbhnbaku,$tambahlv1){
	$data = array(       
	'Lv1'=>$tambahlv1
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
//// Level 2 ////
public function updatelv2($kdbhnbaku,$hasillv1,$hasiltambahisilv2){
	$data = array(       
	'Lv1'=>$hasillv1,
	'Isi_Lv2'=>$hasiltambahisilv2
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
public function updatelv2kurangdari($kdbhnbaku,$hasillv1kurangdari,$hasiltambahisilv2kurangdari){
	$data = array(       
	'Lv1'=>$hasillv1kurangdari,
	'Isi_Lv2'=>$hasiltambahisilv2kurangdari
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
public function updatelv2samadengan($kdbhnbaku,$hasillv1samadengan,$hasiltambahisilv2samadengan){
	$data = array(       
	'Lv1'=>$hasillv1samadengan,
	'Isi_Lv2'=>$hasiltambahisilv2samadengan
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
//// Level 3 ////
public function updatelv3($kdbhnbaku,$hasilsisalv1,$hasillv2,$hasiltambahisilv3){
	$data = array(       
	'Lv1'=>$hasilsisalv1,
	'Isi_Lv2'=>$hasillv2,
	'Isi_Lv3'=>$hasiltambahisilv3,
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
public function updatelv3kurangdari($kdbhnbaku,$hasilsisalv1kurangdari,$hasillv2kurangdari,$hasiltambahisilv3kurangdari){
	$data = array(       
	'Lv1'=>$hasilsisalv1kurangdari,
	'Isi_Lv2'=>$hasillv2kurangdari,
	'Isi_Lv3'=>$hasiltambahisilv3kurangdari,
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
public function updatelv3samadengan($kdbhnbaku,$hasilsisalv1samadengan,$hasillv2samadengan,$hasiltambahisilv3samadengan){
	$data = array(       
	'Lv1'=>$hasilsisalv1samadengan,
	'Isi_Lv2'=>$hasillv2samadengan,
	'Isi_Lv3'=>$hasiltambahisilv3samadengan,
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
//// Level 4 ////
public function updatelv4($kdbhnbaku,$hasilsisalv1untuk4,$hasilsisalv2,$hasillv3,$hasiltambahisilv4){
	$data = array(       
	'Lv1'=>$hasilsisalv1untuk4,
	'Isi_Lv2'=>$hasilsisalv2,
	'Isi_Lv3'=>$hasillv3,
	'Isi_Lv4'=>$hasiltambahisilv4,
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
public function updatelv4kurangdari($kdbhnbaku,$hasilsisalv1untuk4kurangdari,$hasilsisalv2kurangdari,$hasillv3kurangdari,$hasiltambahisilv4kurangdari){
	$data = array(       
	'Lv1'=>$hasilsisalv1untuk4kurangdari,
	'Isi_Lv2'=>$hasilsisalv2kurangdari,
	'Isi_Lv3'=>$hasillv3kurangdari,
	'Isi_Lv4'=>$hasiltambahisilv4kurangdari,
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
public function updatelv4samadengan($kdbhnbaku,$hasilsisalv1untuk4samadengan,$hasilsisalv2samadengan,$hasillv3samadengan,$hasiltambahisilv4samadengan){
	$data = array(       
	'Lv1'=>$hasilsisalv1untuk4samadengan,
	'Isi_Lv2'=>$hasilsisalv2samadengan,
	'Isi_Lv3'=>$hasillv3samadengan,
	'Isi_Lv4'=>$hasiltambahisilv4samadengan,
	);
	$this->db->where('Kode_Bahan_Baku',$kdbhnbaku);
	$this->db->update('tb_bahan_baku',$data);
}
////////////////bahan baku admin sampe sini////////////////////////////

}
?>