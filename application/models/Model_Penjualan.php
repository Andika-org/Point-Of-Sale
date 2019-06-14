<?php 
class Model_Penjualan extends CI_Model{

public function getrowheaderpenjualan(){	
		$query = $this->db->get ('tb_penjualan');	
		return  $query->num_rows();
} 	
public function getdataautocomplete($keyword){
	$sql = $this->db->query("select Kode_Bahan_Baku,Level,Harga_Jual,Isi_Default,Nama_Barang,Isi,
	Nama_Satuan from tb_barang where Scan ='Tidak' and Nama_Barang like '%$keyword%' 
	or Isi like '%$keyword%' or Nama_Satuan like '%$keyword%'");
		//$this->db->like('Kode_Bahan_Baku',$keyword);
		//$this->db->or_like('Nama_Barang',$keyword);

		//$this->db->like('Kode_Bahan_Baku',$keyword);
		//$this->db->like('Nama_Barang',$keyword);
		//$this->db->or_like('Isi',$keyword);
		//$this->db->or_like('Nama_Satuan',$keyword);
		//$this->db->or_like('Scan','Tidak');
		//$sql = $this->db->get('tb_barang');
		
		return $sql;
	}

public function listdatapenjualan($limit,$offset){
	
		$q = $this->db->query("select tb_penjualan.Nota, tb_user.Username,tb_user.Nama, tb_penjualan.Tanggal_Penjualan, tb_penjualan.Discount, tb_penjualan.Ppn, tb_penjualan.Total_Pembelian, tb_penjualan.Status
		from tb_penjualan join tb_user
		on tb_penjualan.Kode_User = tb_user.Kode_User
		Order By tb_penjualan.Tanggal_Penjualan DESC LIMIT $offset,$limit");
		return  $q->result();
	}

public function searchingdatanotapenjualan(){
		$tglawal = date('Y-m-d', strtotime($this->input->post('Tanggal_Awal')));
		$tglakhir = date('Y-m-d', strtotime($this->input->post('Tanggal_Akhir')));
		
		$b = $this->db->query("select tb_penjualan.Nota, tb_user.Nama, tb_user.Username, tb_penjualan.Tanggal_Penjualan, tb_penjualan.Discount, tb_penjualan.Ppn, tb_penjualan.Total_Pembelian, tb_penjualan.Status
		from tb_penjualan join tb_user
		on tb_penjualan.Kode_User = tb_user.Kode_User
		where tb_penjualan.Tanggal_Penjualan BETWEEN '$tglawal' AND '$tglakhir'
		Order By tb_penjualan.Tanggal_Penjualan Desc ");
		
		return  $b->result();
	}
	
public function nota(){
	$this->db->order_by('Nota','DESC');
	$q = $this->db->get('tb_penjualan',1);
		
		$kodeakhir;
		$kodejadi;
		date_default_timezone_set('Asia/Jakarta');
		$date = date('my');
		$bel = "BGR";
		
		if(!empty($q->result())){
			foreach($q->result() as $ka){
				$kodeakhir = $ka->Nota;
			}
			$no = substr($kodeakhir,10,12);
				$intno = (int)$no;
				$next = $intno+1;
				
				//buat nol
				$nol = '';
				$Pintno = strlen($next);
				for($i = 1; $i <= 12-$Pintno; $i++){
					$nol = $nol.'0';
				}
				$kodejadi = 'NOT'.$date.$bel.$nol.$next;
		}
		else{
			$kodejadi = 'NOT'.$date.$bel.'000000000001';
		}
		return $kodejadi;
		
		
	}
	
public function iddetailnota(){
	
	$this->db->order_by('Id_Nota','DESC');
	$q = $this->db->get('tb_penjualandetail',1);
		
		$kodeakhir;
		$kodejadi;
		date_default_timezone_set('Asia/Jakarta');
		$kar = "DNT";
		$bel = "BGR";//karakter depan kodenya
		$date = date('my');
		
		if(!empty($q->result())){
			foreach($q->result() as $ka){
				$kodeakhir = $ka->Id_Nota;
			}
			$no = substr($kodeakhir,10,12);
				$intno = (int)$no;
				$next = $intno+1;
				
				//buat nol
				$nol = '';
				$Pintno = strlen($next);
				for($i = 1; $i <= 12-$Pintno; $i++){
					$nol = $nol.'0';
				}
				$kodejadi = $kar.$date.$bel.$nol.$next;
		}
		else{
			$kodejadi = $kar.$date.$bel.'000000000001';
		}
		return $kodejadi;
	}
	
public function totalbeli(){
	$user = $this->session->userdata['Kode_User'];
		$q = $this->db->query("select SUM(Qty * Harga_Jual) as Total
		from tb_penjualanbantu where Kode_User = '$user'");
		return  $q->result();
	}

		
public function listdatadetailjual(){
	$user = $this->session->userdata['Kode_User'];
		$q = $this->db->query("select * from tb_penjualanbantu WHERE Kode_User ='$user' Order By Id_Nota Asc");
		return  $q->result();
	}
	
public function entries(){	
		$query = $this->db->query ("SELECT COUNT(Nota) AS entri from tb_penjualan");	
		return  $query->result();
} 	

//////////////simpan detail/////////////////////////
public function simpantbpenjualanbantu(){
			
	$data = array(       
	'Id_Nota' =>$this->input->post('Id_Nota'),
	'Nota' =>$this->input->post('Nota'),
	'Kode_User' =>$this->input->post('Kode_User'),
	'Kode_Bahan_Baku' => $this->input->post('Kode_Bahan_Baku'),
	'Nama_Barang' => $this->input->post('Nama_Barang'),
	'Nama_Satuan' =>$this->input->post('Nama_Satuan'),
	'Qty' =>$this->input->post('Qty'),
	'Level' =>$this->input->post('Level'),
	'Harga_Jual' =>$this->input->post('Harga_Jual'),
	
	
	);
	$this->db->insert('tb_penjualanbantu',$data);
	}
	
public function simpantbpenjualandetail(){
			
	$data = array(       
	'Id_Nota' =>$this->input->post('Id_Nota'),
	'Nota' =>$this->input->post('Nota'),
	'Kode_User' =>$this->input->post('Kode_User'),
	'Kode_Bahan_Baku' => $this->input->post('Kode_Bahan_Baku'),
	'Nama_Barang' => $this->input->post('Nama_Barang'),
	'Nama_Satuan' =>$this->input->post('Nama_Satuan'),
	'Qty' =>$this->input->post('Qty'),
	'Level' =>$this->input->post('Level'),
	'Harga_Jual' =>$this->input->post('Harga_Jual'),
	
	
	);
	$this->db->insert('tb_penjualandetail',$data);
	}
public function simpantbpenjualanbantuscan($nmbarang,$nmsatuan,$level,$hrgjual,$kdbhnbaku){
			
	$data = array(       
	'Id_Nota' =>$this->input->post('Id_Nota'),
	'Nota' =>$this->input->post('Nota'),
	'Kode_User' =>$this->input->post('Kode_User'),
	'Kode_Bahan_Baku' => $kdbhnbaku,
	'Nama_Barang' => $nmbarang,
	'Nama_Satuan' =>$nmsatuan,
	'Qty' =>$this->input->post('Qty'),
	'Level' =>$level,
	'Harga_Jual' =>$hrgjual,
	
	
	);
	$this->db->insert('tb_penjualanbantu',$data);
	}
	
public function simpantbpenjualandetailscan($nmbarang,$nmsatuan,$level,$hrgjual,$kdbhnbaku){
			
	$data = array(       
	'Id_Nota' =>$this->input->post('Id_Nota'),
	'Nota' =>$this->input->post('Nota'),
	'Kode_User' =>$this->input->post('Kode_User'),
	'Kode_Bahan_Baku' => $kdbhnbaku,
	'Nama_Barang' => $nmbarang,
	'Nama_Satuan' =>$nmsatuan,
	'Qty' =>$this->input->post('Qty'),
	'Level' =>$level,
	'Harga_Jual' =>$hrgjual,
	
	
	);
	$this->db->insert('tb_penjualandetail',$data);
	}
//////////////////////////////////////////////////////////////////

//////////////////////////////delete detail////////////////////////////////////
public function hapustbpenjualanbantu($where){
$this->db->where('Id_Nota',$where);
$this->db->delete('tb_penjualanbantu');
return true;
}
public function hapuspenjualantbdetail($where){
$this->db->where('Id_Nota',$where);
$this->db->delete('tb_penjualandetail');
return true;
}
//////////////////////////////////////////////////////////////////

//////////////////////////update bahan baku sesudah hapus barang penjualan/////////////////////////////////////////
public function ambildatabahanbaku($kodebahanbaku){	
		$query = $this->db->query ("select * from tb_bahan_baku where Kode_Bahan_Baku='$kodebahanbaku'");	
		return  $query->row_array();
}
public function kurangisibahanbaku($kodebahanbaku,$sisastok1,$sisadiambil1){	
		$data = array(       
	'Stok'=>$sisastok1,       
	'Sisa_Isi'=>$sisadiambil1
	);
	$this->db->where('Kode_Bahan_Baku',$kodebahanbaku);
	$this->db->update('tb_bahan_baku',$data);
}
public function kurangisibahanbakuqty($kodebahanbaku,$sisastok2,$sisadiambil2){	
		$data = array(       
	'Stok'=>$sisastok2,       
	'Sisa_Isi'=>$sisadiambil2
	);
	$this->db->where('Kode_Bahan_Baku',$kodebahanbaku);
	$this->db->update('tb_bahan_baku',$data);
}
public function kurangisibahanbakusisa($kodebahanbaku,$sisadiambil3){	
		$data = array(             
	'Sisa_Isi'=>$sisadiambil3
	);
	$this->db->where('Kode_Bahan_Baku',$kodebahanbaku);
	$this->db->update('tb_bahan_baku',$data);
}
public function kurangstok($kodebahanbaku,$kurang){	
		$data = array(       
	'Stok'=>$kurang
	);
	$this->db->where('Kode_Bahan_Baku',$kodebahanbaku);
	$this->db->update('tb_bahan_baku',$data);
}
public function kurangisibahanbakuketikasama($kodebahanbaku,$sisastok4,$sisadiambil4){	
		$data = array(       
	'Stok'=>$sisastok4,       
	'Sisa_Isi'=>$sisadiambil4
	);
	$this->db->where('Kode_Bahan_Baku',$kodebahanbaku);
	$this->db->update('tb_bahan_baku',$data);
}
//////////////////////////////////////////////////////////////

////////////////////////////Hapus Detail//////////////////////////////////
public function datatbbantupenjualan($idnota){	
		$query = $this->db->query ("select * from tb_penjualanbantu where Id_Nota='$idnota'");	
		return  $query->row_array();
}
public function tambahisibahanbakusisa($kdbahanbaku,$sisastok,$sisaditambah){	
		$data = array(       
	'Stok'=>$sisastok,       
	'Sisa_Isi'=>$sisaditambah
	);
	$this->db->where('Kode_Bahan_Baku',$kdbahanbaku);
	$this->db->update('tb_bahan_baku',$data);
}
public function tambahisibahanbakusisajikakurang($kdbahanbaku,$sisastok2,$sisaditambah2){	
		$data = array(       
	'Stok'=>$sisastok2,       
	'Sisa_Isi'=>$sisaditambah2
	);
	$this->db->where('Kode_Bahan_Baku',$kdbahanbaku);
	$this->db->update('tb_bahan_baku',$data);
}
public function tambahisibahanbakusisajikasama($kdbahanbaku,$sisastok3,$sisaditambah3){	
		$data = array(       
	'Stok'=>$sisastok3,       
	'Sisa_Isi'=>$sisaditambah3
	);
	$this->db->where('Kode_Bahan_Baku',$kdbahanbaku);
	$this->db->update('tb_bahan_baku',$data);
}
public function tambahstok($kdbahanbaku,$sisastok4){	
		$data = array(       
	'Stok'=>$sisastok4,       
	);
	$this->db->where('Kode_Bahan_Baku',$kdbahanbaku);
	$this->db->update('tb_bahan_baku',$data);
}
//////////////////////////////////////////////////////////////
/////////////////////// scan barcode //////////////////////////
public function ambildatajual($kdbhnbaku,$codescan){	
		$query = $this->db->query ("select * from tb_barang where Kode_Bahan_Baku='$kdbhnbaku' and Code_Barcode='$codescan'");	
		return  $query->row_array();
}
public function simpantbpenjualanbantubarcode($nmbarang,$hrgjual){
			
	$data = array(       
	'Id_Nota' =>$this->input->post('Id_Nota'),
	'Nota' =>$this->input->post('Nota'),
	'Kode_User' =>$this->input->post('Kode_User'),
	'Kode_Bahan_Baku' => $this->input->post('Kode_Bahan_Baku'),
	'Nama_Barang' => $nmbarang,
	'Nama_Satuan' =>$this->input->post('Nama_Satuan'),
	'Qty' =>$this->input->post('Qty'),
	'Harga_Jual' =>$hrgjual,
	
	
	);
	$this->db->insert('tb_penjualanbantu',$data);
	}
	
public function simpantbpenjualandetailbarcode($nmbarang,$hrgjual){
			
	$data = array(       
	'Id_Nota' =>$this->input->post('Id_Nota'),
	'Nota' =>$this->input->post('Nota'),
	'Kode_User' =>$this->input->post('Kode_User'),
	'Kode_Bahan_Baku' => $this->input->post('Kode_Bahan_Baku'),
	'Nama_Barang' => $nmbarang,
	'Nama_Satuan' =>$this->input->post('Nama_Satuan'),
	'Qty' =>$this->input->post('Qty'),
	'Harga_Jual' =>$hrgjual,
	
	
	);
	$this->db->insert('tb_penjualandetail',$data);
	}
///////////////////////////////////////////////////////////////
///////////////////////// Simpan Pembayaran////////////////////
public function simpanbayar(){
	date_default_timezone_set('Asia/Jakarta');
	$date = date("Y-m-d H:i:s");
	$data = array(       
	'Nota' =>$this->input->post('Nota'),
	'Kode_User' =>$this->input->post('Kode_User'),
	'Tanggal_Penjualan' =>$date,
	'Discount' => $this->input->post('Discount'),
	'Ppn' => $this->input->post('Ppn'),
	'Total_Pembelian' =>$this->input->post('Total_Pembelian'),
	'Total_Sebelumnya' =>$this->input->post('Total_Sebelumnya'),
	'Bayar' =>$this->input->post('Bayar'),
	'Bayar_Sebelumnya' =>$this->input->post('Bayar'),
	'Sisa' =>$this->input->post('Sisa'),
	'Status' =>"Bayar",
	'Status_Update' =>"None"
	
	
	);
	$this->db->insert('tb_penjualan',$data);
	}
public function simpanbayarhutang(){
	date_default_timezone_set('Asia/Jakarta');
	$date = date("Y-m-d H:i:s");
	$data = array(       
	'Nota' =>$this->input->post('Nota'),
	'Kode_User' =>$this->input->post('Kode_User'),
	'Tanggal_Penjualan' =>$date,
	'Discount' => $this->input->post('Discount'),
	'Ppn' => $this->input->post('Ppn'),
	'Total_Pembelian' =>$this->input->post('Total_Pembelian'),
	'Total_Sebelumnya' =>$this->input->post('Total_Sebelumnya'),
	'Bayar' =>$this->input->post('Bayar'),
	'Bayar_Sebelumnya' =>$this->input->post('Bayar'),
	'Sisa' =>$this->input->post('Sisa'),
	'Status' =>"Hutang",
	'Status_Update' =>"None"
	);
	$this->db->insert('tb_penjualan',$data);
	}
public function hapustbbantusetelahbayar(){
$where = $this->input->post("Nota");
$this->db->where('Nota',$where);
$this->db->delete('tb_penjualanbantu');
return true;
}
///////////////////////////////////////////////////////////////
////////////////////////// Nota untuk print//////////////////////////////
public function ambilheader($nota){	
		$query = $this->db->query ("select tb_penjualan.Nota, tb_penjualan.Status_Update, tb_user.Nama, tb_user.Username, tb_user.Kode_User, tb_penjualan.Tanggal_Penjualan, tb_penjualan.Discount, tb_penjualan.Ppn,
		tb_penjualan.Total_Pembelian, tb_penjualan.Total_Sebelumnya, tb_penjualan.Bayar, tb_penjualan.Sisa, tb_penjualan.Status
		from tb_penjualan join tb_user
		on tb_penjualan.Kode_User = tb_user.Kode_User
		where tb_penjualan.Nota='$nota'");	
		return  $query->row_array();
}
public function ambildetailpenjualan($nota){	
		$query = $this->db->query ("select * from tb_penjualandetail where Nota='$nota'");	
		return  $query->result();
}
public function datatoko(){	
		$query = $this->db->query ("select * from alamat_toko");	
		return  $query->row_array();
}
public function itembeli($nota){	
		$query = $this->db->query ("SELECT count('Nota') as item from `tb_penjualandetail` WHERE Nota='$nota' ");	
		return  $query->row_array();
}
//////////////////////////////////////////////////////////////
/////////////////////////// Hapus Penjualan ///////////////////
public function listdatapenjualandetail($nota){
		$q = $this->db->query("select * from tb_penjualandetail WHERE Nota ='$nota' Order By Id_Nota Asc");
		return  $q->result();
	}
public function headerpenjualanhapus($nota){
		$q = $this->db->query("select tb_penjualan.Nota, tb_penjualan.Bayar_Sebelumnya, tb_penjualan.Status_Update, tb_user.Nama, tb_user.Username, tb_user.Kode_User, tb_penjualan.Tanggal_Penjualan, tb_penjualan.Discount,
		tb_penjualan.Ppn, tb_penjualan.Total_Pembelian, tb_penjualan.Total_Sebelumnya, tb_penjualan.Bayar,tb_penjualan.Sisa
		from tb_penjualan join tb_user 
		on tb_penjualan.Kode_User = tb_user.Kode_User
		WHERE tb_penjualan.Nota ='$nota'");
		return  $q->row_array();
	}
public function totalbeliketikahapus($nota){
	
		$q = $this->db->query("select SUM(Qty * Harga_Jual) as Total
		from tb_penjualandetail where Nota = '$nota'");
		return  $q->row_array();
	}
public function datatbpenjualandetail($idnota){	
		$query = $this->db->query ("select * from tb_penjualandetail where Id_Nota='$idnota'");	
		return  $query->row_array();
}
public function cleanuppenjualansetelahhapus($where){
$this->db->where('Nota',$where);
$this->db->delete('tb_penjualan');
return true;
}

public function cariidhutang($where){	
		$query = $this->db->query ("select * from tb_hutangreport where Nota='$where'");	
		return  $query->row_array();
}

public function cleanuppenjualansetelahhapustbhutang($where){
$this->db->where('Nota',$where);
$this->db->delete('tb_hutang');
return true;
}
public function cleanuppenjualansetelahhapustbhutangreport($where){
$this->db->where('Nota',$where);
$this->db->delete('tb_hutangreport');
return true;
}

public function cleanuppenjualansetelahhapustbhutangdetail($idhutang){
$this->db->where('Id_Hutang',$idhutang);
$this->db->delete('tb_hutangdetail');
return true;
}
public function cleanuppenjualansetelahhapustbhutangreportdetail($idhutang){
$this->db->where('Id_Hutang',$idhutang);
$this->db->delete('tb_hutangreportdetail');
return true;
}
public function cleanuppenjualansetelahhapustbhutangpiutang($idhutang){
$this->db->where('Id_Hutang',$idhutang);
$this->db->delete('tb_hutang_piutang');
return true;
}
//////////////////////////////////////////////////////////////
///////////// Update Penjualan //////////////////////////////
public function updatenota(){
	$kurang = $this->input->post("Kurang");
	$sama = $this->input->post("Sama");
	$lebih = $this->input->post("Lebih");
	
	$totalpembelian = $this->input->post("Total_Pembelian");
	$totalsebelumnya = $this->input->post("Total_Sebelumnya");
	$bayar = $this->input->post("Bayar");
	$bayarsebelumnya = $this->input->post("Bayar_Sebelumnya");
	$tunai = $this->input->post("Tunai");
	
	if($kurang){
		$data = array(       
			'Total_Pembelian'=>$totalsebelumnya - $totalpembelian,
			'Total_Sebelumnya'=>$totalsebelumnya,
			'Bayar'=>$bayar,
			'Sisa'=>$bayarsebelumnya - ($totalsebelumnya - $totalpembelian),
			'Status'=>"Bayar",
			'Status_Update'=>"Kurang"
		);
	$this->db->where('Nota',$this->input->post("Nota"));
	$this->db->update('tb_penjualan',$data);
	
	}else if($sama){
		$data = array(       
			'Total_Pembelian'=>$totalpembelian,
			'Status'=>"Bayar",
			'Status_Update'=>"Sama"
		);
	$this->db->where('Nota',$this->input->post("Nota"));
	$this->db->update('tb_penjualan',$data);
	
	}else if($lebih){
		$data = array(       
			'Total_Pembelian'=>$totalsebelumnya + $totalpembelian,
			'Total_Sebelumnya'=>$totalsebelumnya,
			'Bayar'=>$bayarsebelumnya + $tunai,
			'Sisa'=>($bayarsebelumnya + $tunai) - ($totalsebelumnya + $totalpembelian),
			'Status'=>"Bayar",
			'Status_Update'=>"Lebih"
		);
	$this->db->where('Nota',$this->input->post("Nota"));
	$this->db->update('tb_penjualan',$data);
	
	}
	
	
}
////////////////////////////////////////////////////////////

////////////////// proses pembelian ////////////////////////
public function databahanbaku($kdbhnbaku){
		$q = $this->db->query("select * from tb_bahan_baku where kode_Bahan_Baku = '$kdbhnbaku'");
		return  $q->row_array();
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
////////////////// proses pembelian ////////////////////////
////////////////// proses hapus pembelian tb bantu////////////////////////
public function datapenjualanbantu($idnota){
		$q = $this->db->query("select * from tb_penjualanbantu where Id_Nota = '$idnota'");
		return  $q->row_array();
	}
public function datapenjualandetail($idnota){
		$q = $this->db->query("select * from tb_penjualandetail where Id_Nota = '$idnota'");
		return  $q->row_array();
	}
///////////// Lv1 /////////
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
//////////////////

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
//////////////////
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
/////////////////////////// scan barcode ////////////////////////////////
public function datascanbarang($codescan){
		$q = $this->db->query("select * from tb_barang where Code_Barcode = '$codescan' and Scan ='Scan'");
		return  $q->row_array();
	}
///////////////////////////////////////////////////////////////
}
?>