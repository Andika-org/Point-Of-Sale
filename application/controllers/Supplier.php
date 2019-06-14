<?php
class Supplier extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Model_Supplier');
		
	}
public	function index($offset = 0) 
	{
		
		//----- setting pagination  --------------------

		$datasesi['sesi'] = $this->session->userdata('admin/supplier/V_Supplier');
		
		if( $datasesi['sesi']['batas'] == 0){
			$usersetting['batas'] = 0;
			$this->session->set_userdata('admin/supplier/V_Supplier',$usersetting);
		}

		$baris = $this->Model_Supplier->getrowsupplier();
		
		$settingpage = 0;
		if(!empty($satu = 20)){
			$limit = $satu;
			
			$usersetting['batas'] = $limit;
			$this->session->set_userdata('admin/supplier/V_Supplier',$usersetting);
		}
		else if( $datasesi['sesi']['batas'] != 0){
			$limit = $datasesi['sesi']['batas'];
		}
		else{
			$limit = $baris;
		}
		
		
		if(!is_null($offset)){
		$config['uri_segment'] = 3;
		$config['base_url'] = base_url().'Supplier/index/';
		
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
	
		$cari = $this->Model_Supplier->kodesupplier();
			if($cari){
				$data ['sup']= $cari;
			}
    $data['datatable']=$this->Model_Supplier->listdatasupplier($limit,$offset);
	////////////////////////////////////////////////
     $data['ent'] = $this->Model_Supplier->entries();
	 $data['totbaris'] = $limit;
	//$chart['totalbeli']=$this->model_pembelian->hitungjumlahbeli();	
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/supplier/V_Supplier',$data);
		}
	}
public	function index2($offset = 0) 
	{
		
		//----- setting pagination  --------------------

		$datasesi['sesi'] = $this->session->userdata('admin/supplier/V_Supplier');
		
		if( $datasesi['sesi']['batas'] == 0){
			$usersetting['batas'] = 0;
			$this->session->set_userdata('admin/supplier/V_Supplier',$usersetting);
		}

		$baris = $this->Model_Supplier->getrowsupplier();
		
		$settingpage = 0;
		if(!empty($this->input->post('batas'))){
			$limit = $this->input->post('batas');
			
			$usersetting['batas'] = $limit;
			$this->session->set_userdata('admin/supplier/V_Supplier',$usersetting);
		}
		else if( $datasesi['sesi']['batas'] != 0){
			$limit = $datasesi['sesi']['batas'];
		}
		else{
			$limit = $baris;
		}
		
		
		if(!is_null($offset)){
		$config['uri_segment'] = 3;
		$config['base_url'] = base_url().'Supplier/index2/';
		
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
	
		$cari = $this->Model_Supplier->kodesupplier();
			if($cari){
				$data ['sup']= $cari;
			}
    $data['datatable']=$this->Model_Supplier->listdatasupplier($limit,$offset);
	////////////////////////////////////////////////
     $data['ent'] = $this->Model_Supplier->entries();
	 $data['totbaris'] = $limit;
	//$chart['totalbeli']=$this->model_pembelian->hitungjumlahbeli();	
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/supplier/V_Supplier',$data);
		}
	}

public	function carisupplier() 
	{
    $data['datatable']=$this->Model_Supplier->searchingdatasupplier();
        if($data['datatable']==null){
	redirect(base_url("Supplier/index"));
    }
		else {
     
	 $data['ent'] = $this->Model_Supplier->entries();
	 
	 $baris = $this->Model_Supplier->getrowsupplier();
	 $limit=$baris;
	 $data['totbaris'] = $limit;
	//$chart['totalbeli']=$this->model_pembelian->hitungjumlahbeli();	
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/supplier/V_Supplier',$data);
		}

	}
	
	
public function tambahsupplier(){
	//mengecek nama validation
	$this->form_validation->set_rules('Kode_Supplier','Kode_Supplier','required');
	$this->form_validation->set_rules('Nama_Supplier','Nama_Supplier','required');
	$this->form_validation->set_rules('Deskripsi','Deskripsi','required');
	$this->form_validation->set_rules('Alamat','Alamat','required');
	$this->form_validation->set_rules('Telepon','Telepon','required');
	$this->form_validation->set_rules('Email','Email','required');
	

		
	if($this->form_validation->run() == TRUE)
	{ 
		$this->Model_Supplier->simpansupplier();
		
	}
		
	}

public function ajaxedit($id){
	$data = $this->Model_Supplier->ambil_data_editsupplier($id);
	
			echo json_encode($data);
}

public function editsupplier($kodenya)
	{
	//mengecek nama validation
	$this->form_validation->set_rules('Kode_Supplier','Kode_Supplier','required');
	$this->form_validation->set_rules('Nama_Supplier','Nama_Supplier','required');
	$this->form_validation->set_rules('Deskripsi','Deskripsi','required');
	$this->form_validation->set_rules('Alamat','Alamat','required');
	$this->form_validation->set_rules('Telepon','Telepon','required');
	$this->form_validation->set_rules('Email','Email','required');
	
	
	if($this->form_validation->run() == TRUE)
	{
		$this->Model_Supplier->updatebahanbaku();
			
	}	
	
	
	}
	


public function hapussupplier(){
$id = $this->input->get('Kode_Supplier'); 
$this->Model_Supplier->hapus($id); 
redirect(base_url("Supplier/index")); 
}

	
}