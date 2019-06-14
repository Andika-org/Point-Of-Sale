<?php
class User extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Model_User');
		
	}
public	function index($offset = 0) 
	{
		
		//----- setting pagination  --------------------

		$datasesi['sesi'] = $this->session->userdata('admin/user/V_User');
		
		if( $datasesi['sesi']['batas'] == 0){
			$usersetting['batas'] = 0;
			$this->session->set_userdata('admin/user/V_User',$usersetting);
		}

		$baris = $this->Model_User->getrowuser();
		
		$settingpage = 0;
		if(!empty($satu = 20)){
			$limit = $satu;
			
			$usersetting['batas'] = $limit;
			$this->session->set_userdata('admin/user/V_User',$usersetting);
		}
		else if( $datasesi['sesi']['batas'] != 0){
			$limit = $datasesi['sesi']['batas'];
		}
		else{
			$limit = $baris;
		}
		
		
		if(!is_null($offset)){
		$config['uri_segment'] = 3;
		$config['base_url'] = base_url().'User/index/';
		
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
	
    $data['datatable']=$this->Model_User->listdatauser($limit,$offset);
	////////////////////////////////////////////////
     $data['ent'] = $this->Model_User->entries();
	 $data['totbaris'] = $limit;
	//$chart['totalbeli']=$this->model_pembelian->hitungjumlahbeli();
	$data['datasupplier'] = $this->Model_User->supplier();	
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/user/V_User',$data);
		}
	}
public	function index2($offset = 0) 
	{
		
		//----- setting pagination  --------------------

		$datasesi['sesi'] = $this->session->userdata('admin/user/V_User');
		
		if( $datasesi['sesi']['batas'] == 0){
			$usersetting['batas'] = 0;
			$this->session->set_userdata('admin/user/V_User',$usersetting);
		}

		$baris = $this->Model_User->getrowuser();
		
		$settingpage = 0;
		if(!empty($this->input->post('batas'))){
			$limit = $this->input->post('batas');
			
			$usersetting['batas'] = $limit;
			$this->session->set_userdata('admin/user/V_User',$usersetting);
		}
		else if( $datasesi['sesi']['batas'] != 0){
			$limit = $datasesi['sesi']['batas'];
		}
		else{
			$limit = $baris;
		}
		
		
		if(!is_null($offset)){
		$config['uri_segment'] = 3;
		$config['base_url'] = base_url().'User/index2/';
		
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
	
    $data['datatable']=$this->Model_User->listdatauser($limit,$offset);
	////////////////////////////////////////////////
     $data['ent'] = $this->Model_User->entries();
	 $data['totbaris'] = $limit;
	//$chart['totalbeli']=$this->model_pembelian->hitungjumlahbeli();
$data['datasupplier'] = $this->Model_User->supplier();		
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/user/V_User',$data);
		}
	}

public	function cariuser() 
	{
    $data['datatable']=$this->Model_User->searchingdatauser();
        if($data['datatable']==null){
	redirect(base_url("User/index"));
    }
		else {
     
	 $data['ent'] = $this->Model_User->entries();
	 
	 $baris = $this->Model_User->getrowuser();
	 $limit=$baris;
	 $data['totbaris'] = $limit;
	//$chart['totalbeli']=$this->model_pembelian->hitungjumlahbeli();
	$data['datasupplier'] = $this->Model_User->supplier();		
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/user/V_User',$data);
		}

	}
	
	
public function tambahuser(){
	//mengecek nama validation
	$this->form_validation->set_rules('Username','Username','required');
	

		
	if($this->form_validation->run() == TRUE)
	{ 
		$kodeuser = $this->Model_User->kodeuser();
		$this->Model_User->simpanuser($kodeuser);
		
	redirect(base_url('User/index'));
	}
		
	}

public function ajaxedit($id){
	$data = $this->Model_User->ambil_data_edituser($id);
	
			echo json_encode($data);
}
public function ajaxeditsupplier($id){
	$data = $this->Model_User->ambil_data_editsupplier($id);
	
			echo json_encode($data);
}

public function hapususer(){
$id = $this->uri->segment(3); 
$this->Model_User->hapus($id); 
redirect(base_url("User/index")); 
}

	
}