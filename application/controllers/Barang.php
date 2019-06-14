<?php
class Barang extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Model_Barang');
		
	}

public	function index($offset = 0) 
	{
		
		//----- setting pagination  --------------------

		$datasesi['sesi'] = $this->session->userdata('admin/barang/V_Barang');
		
		if( $datasesi['sesi']['batas'] == 0){
			$usersetting['batas'] = 0;
			$this->session->set_userdata('admin/barang/V_Barang',$usersetting);
		}

		$baris = $this->Model_Barang->getrowsbarang();
		
		$settingpage = 0;
		if(!empty($satu = 20)){
			$limit = $satu;
			
			$usersetting['batas'] = $limit;
			$this->session->set_userdata('admin/barang/V_Barang',$usersetting);
		}
		else if( $datasesi['sesi']['batas'] != 0){
			$limit = $datasesi['sesi']['batas'];
		}
		else{
			$limit = $baris;
		}
		
		
		if(!is_null($offset)){
		$config['uri_segment'] = 3;
		$config['base_url'] = base_url().'Barang/index/';
		
		$config['total_rows'] = $baris;
		$config['per_page'] = $limit;
		
		//model pagination untuk pemanis pagination
		$config['full_tag_open'] ='<div class="pagination" <ul>';
		$config['full_tag_close'] ='</ul></div>';
		$config['first_link'] = '&laquo; First';
		
		$config['first_tag_open'] = '<li class="prevpage">';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last &raquo';
		
		$config['last_tag_open'] = '<li class="nextpage">';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = 'Next &rarr;';
		
		$config['next_tag_open'] = '<li class="nextpage">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&larr; Previous';
		
		$config['prev_tag_open'] = '<li class="prevpage">';
		$config['prev_tag_close'] = '</li>';
		
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';
		//sampe sini pemanis paginationnya
		
		$this->pagination->initialize($config);
	
		
		$cari = $this->Model_Barang->gudang();
			if($cari){
				$data ['gudang']= $cari;
			}
    $data['datatable']=$this->Model_Barang->listdatabarang($limit,$offset);
	////////////////////////////////////////////////
     $data['ent'] = $this->Model_Barang->entries();
	 $data['totbaris'] = $limit;
	//$chart['totalbeli']=$this->model_pembelian->hitungjumlahbeli();	
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/barang/V_Barang',$data);
		}
	}
public	function index2($offset = 0) 
	{
		
		//----- setting pagination  --------------------

		$datasesi['sesi'] = $this->session->userdata('admin/barang/V_Barang');
		
		if( $datasesi['sesi']['batas'] == 0){
			$usersetting['batas'] = 0;
			$this->session->set_userdata('admin/barang/V_Barang',$usersetting);
		}

		$baris = $this->Model_Barang->getrowsbarang();
		
		$settingpage = 0;
		if(!empty($this->input->post('batas'))){
			$limit = $this->input->post('batas');
			
			$usersetting['batas'] = $limit;
			$this->session->set_userdata('admin/barang/V_Barang',$usersetting);
		}
		else if( $datasesi['sesi']['batas'] != 0){
			$limit = $datasesi['sesi']['batas'];
		}
		else{
			$limit = $baris;
		}
		
		
		if(!is_null($offset)){
		$config['uri_segment'] = 3;
		$config['base_url'] = base_url().'Barang/index2/';
		
		$config['total_rows'] = $baris;
		$config['per_page'] = $limit;
		
		//model pagination untuk pemanis pagination
		$config['full_tag_open'] ='<div class="pagination" <ul>';
		$config['full_tag_close'] ='</ul></div>';
		$config['first_link'] = '&laquo; First';
		
		$config['first_tag_open'] = '<li class="prevpage">';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last &raquo';
		
		$config['last_tag_open'] = '<li class="nextpage">';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = 'Next &rarr;';
		
		$config['next_tag_open'] = '<li class="nextpage">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&larr; Previous';
		
		$config['prev_tag_open'] = '<li class="prevpage">';
		$config['prev_tag_close'] = '</li>';
		
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';
		//sampe sini pemanis paginationnya
		
		$this->pagination->initialize($config);
	
		
		$cari = $this->Model_Barang->gudang();
			if($cari){
				$data ['gudang']= $cari;
			}
    $data['datatable']=$this->Model_Barang->listdatabarang($limit,$offset);
	////////////////////////////////////////////////
     $data['ent'] = $this->Model_Barang->entries();
	 $data['totbaris'] = $limit;
	//$chart['totalbeli']=$this->model_pembelian->hitungjumlahbeli();	
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/barang/V_Barang',$data);
		}
	}
public	function caribarang() 
	{
    $data['datatable']=$this->Model_Barang->searchingdatabarang();
        if($data['datatable']==null){
	redirect(base_url("Barang/index"));
    }
		else {
     
	 $data['ent'] = $this->Model_Barang->entries();
	 
	 $baris = $this->Model_Barang->getrowsbarang();
	 $limit=$baris;
	 $data['totbaris'] = $limit;
	//$chart['totalbeli']=$this->model_pembelian->hitungjumlahbeli();	
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/Barang/V_Barang',$data);
		}

	}
	
	
public function tambahbarang(){
	//mengecek nama validation
	$this->form_validation->set_rules('Nama_Barang','Nama_Barang','required');
	

		
	if($this->form_validation->run() == TRUE)
	{ 
		///////////////////////////////////////
		$lv1 = $this->input->post("QtyLv1");
		$lv2 = $this->input->post("QtyLv2");
		$lv3 = $this->input->post("QtyLv3");
		$lv4 = $this->input->post("QtyLv4");
		
		$isidefault2 = $this->input->post("Isi_Default2");
		$isidefault3 = $this->input->post("Isi_Default3");
		$isidefault4 = $this->input->post("Isi_Default4");
		
	//////////////
		if($lv1){
		$level = "Lv1";
		}else if($lv2){
			$level = "Lv2";
		}else if($lv3){
			$level = "Lv3";
		}else if($lv4){
			$level = "Lv4";
		}
	
		$idbarang = $this->input->post('Kode_Bahan_Baku').$this->input->post('Scanbarcode').$level;
		
		$cekid = $this->Model_Barang->databarang($idbarang);
		$dataid = $cekid["Id"];
		
	if($dataid){
		redirect(base_url('Barang/index'));
	}else{
			
	//////////////	
	
		if($lv1){
			$id = $this->Model_Barang->kodebarang();
			$this->Model_Barang->simpanbarang($id);
			redirect(base_url('Barang/index'));
		}
		
		else if($lv2 > $isidefault2){
			redirect(base_url('Barang/index'));
		}else if($lv2 < $isidefault2){
			$id = $this->Model_Barang->kodebarang();
			$this->Model_Barang->simpanbarang($id);
			redirect(base_url('Barang/index'));
		}else if($lv2 == $isidefault2){
			$id = $this->Model_Barang->kodebarang();
			$this->Model_Barang->simpanbarang($id);
			redirect(base_url('Barang/index'));
		}
		
		else if($lv3 > $isidefault3){
			redirect(base_url('Barang/index'));
		}else if($lv3 < $isidefault3){
			$id = $this->Model_Barang->kodebarang();
			$this->Model_Barang->simpanbarang($id);
			redirect(base_url('Barang/index'));
		}else if($lv3 == $isidefault3){
			$id = $this->Model_Barang->kodebarang();
			$this->Model_Barang->simpanbarang($id);
			redirect(base_url('Barang/index'));
		}
		
		else if($lv4 > $isidefault4){
			redirect(base_url('Barang/index'));
		}else if($lv4 < $isidefault4){
			$id = $this->Model_Barang->kodebarang();
			$this->Model_Barang->simpanbarang($id);
			redirect(base_url('Barang/index'));
		}else if($lv4 == $isidefault4){
			$id = $this->Model_Barang->kodebarang();
			$this->Model_Barang->simpanbarang($id);
			redirect(base_url('Barang/index'));
		}
		
		
	}
	}
		redirect(base_url("Barang/index/"));
	}

public function ajaxedit($id){
	$data = $this->Model_Barang->ambil_data_editbarang($id);
	
			echo json_encode($data);
}

public function editbarang($kodenya)
	{
	//mengecek nama validation
	$this->form_validation->set_rules('Id','Id','required');
	
	
	if($this->form_validation->run() == TRUE)
	{
		$this->Model_Barang->updatebarang();		
	}	
	
	}
	


public function hapusbarang(){
$id = $this->uri->segment(3); 
$this->Model_Barang->hapus($id); 
redirect(base_url("Barang/index")); 
}

public function cariautobahanbaku()
	{
		// tangkap variabel keyword dari URL
		$keyword = $this->uri->segment(3);

		// cari di database
		$data = $this->Model_Barang->getdataautocomplete($keyword);	

		// format keluaran di dalam array
		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'	=>'[ '.$row->Kode_Bahan_Baku.' ]'.' - '.$row->Nama_Barang,
				'Kode_Bahan_Baku' =>$row->Kode_Bahan_Baku,
				'Nama_Barang' =>$row->Nama_Barang,
				'Name_Lv1' =>$row->Name_Lv1,
				'Name_Lv2' =>$row->Name_Lv2,
				'Name_Lv3' =>$row->Name_Lv3,
				'Name_Lv4' =>$row->Name_Lv4,
				//'Name_Lv5' =>$row->Name_Lv5,
				
				'Lv2' =>$row->Lv2,
				'Lv3' =>$row->Lv3,
				'Lv4' =>$row->Lv4,
				//'Lv5' =>$row->Lv5,
				//'Type_Barang' =>$row->Type_Barang,
				//'Nama_Satuan' =>$row->Nama_Satuan,
				//'Harga_Beli'=>$row->Harga_Beli,
				//'Satuan'=>$row->Satuan,
			);
		}
		// minimal PHP 5.2
		echo json_encode($arr);
	}
			
}