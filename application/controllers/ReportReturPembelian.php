<?php
class ReportReturPembelian extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Model_ReportReturPembelian');
		
	}
public	function index($offset = 0) 
	{
		
		//----- setting pagination  --------------------

		$datasesi['sesi'] = $this->session->userdata('admin/reportreturpembelian/V_ReportRetur');
		
		if( $datasesi['sesi']['batas'] == 0){
			$usersetting['batas'] = 0;
			$this->session->set_userdata('admin/reportreturpembelian/V_ReportRetur',$usersetting);
		}

		$baris = $this->Model_ReportReturPembelian->getrowsreportreturpembelian();
		
		$settingpage = 0;
		if(!empty($satu = 20)){
			$limit = $satu;
			
			$usersetting['batas'] = $limit;
			$this->session->set_userdata('admin/reportreturpembelian/V_ReportRetur',$usersetting);
		}
		else if( $datasesi['sesi']['batas'] != 0){
			$limit = $datasesi['sesi']['batas'];
		}
		else{
			$limit = $baris;
		}
		
		
		if(!is_null($offset)){
		$config['uri_segment'] = 3;
		$config['base_url'] = base_url().'ReportReturPembelian/index/';
		
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
	
		
    $data['datatable']=$this->Model_ReportReturPembelian->listdatareturpembelian($limit,$offset);
	////////////////////////////////////////////////
     $data['ent'] = $this->Model_ReportReturPembelian->entries();
	 $data['totbaris'] = $limit;
	//$chart['totalbeli']=$this->model_pembelian->hitungjumlahbeli();
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/reportreturpembelian/V_ReportRetur',$data);
		}
	}
	
public	function index2($offset = 0) 
	{
		
		//----- setting pagination  --------------------

		$datasesi['sesi'] = $this->session->userdata('admin/reportreturpembelian/V_ReportRetur');
		
		if( $datasesi['sesi']['batas'] == 0){
			$usersetting['batas'] = 0;
			$this->session->set_userdata('admin/reportreturpembelian/V_ReportRetur',$usersetting);
		}

		$baris = $this->Model_ReportReturPembelian->getrowsreportreturpembelian();
		
		$settingpage = 0;
		if(!empty($this->input->post('batas'))){
			$limit = $this->input->post('batas');
			
			$usersetting['batas'] = $limit;
			$this->session->set_userdata('admin/reportreturpembelian/V_ReportRetur',$usersetting);
		}
		else if( $datasesi['sesi']['batas'] != 0){
			$limit = $datasesi['sesi']['batas'];
		}
		else{
			$limit = $baris;
		}
		
		
		if(!is_null($offset)){
		$config['uri_segment'] = 3;
		$config['base_url'] = base_url().'ReportReturPembelian/index2/';
		
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
	
		
    $data['datatable']=$this->Model_ReportReturPembelian->listdatareturpembelian($limit,$offset);
	////////////////////////////////////////////////
     $data['ent'] = $this->Model_ReportReturPembelian->entries();
	 $data['totbaris'] = $limit;
	//$chart['totalbeli']=$this->model_pembelian->hitungjumlahbeli();
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/reportreturpembelian/V_ReportRetur',$data);
		}
	}
	
public	function caridata() 
	{
    $data['datatable']=$this->Model_ReportReturPembelian->searchingdata();
        if($data['datatable']==null){
	redirect(base_url("ReportReturPembelian/index"));
    }
		else {
   
	$data['ent'] = $this->Model_ReportReturPembelian->entries();
	$baris = $this->Model_ReportReturPembelian->getrowsreportreturpembelian();
	$limit=$baris;
	$data['totbaris'] = $limit;
	 
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/reportreturpembelian/V_ReportRetur',$data);
		}

	}

public function hapusreportreturpembelian(){
$id = $this->uri->segment(3); 
$this->Model_ReportReturPembelian->hapustbreportreturpembelian($id);
$this->Model_ReportReturPembelian->hapustbreportdetailreturpembelian($id); 
redirect(base_url("ReportReturPembelian/index")); 
}
public function lihatcetakreportreturpembelian(){
	$noretur = $this->uri->segment(3);
	$data['header'] = $this->Model_ReportReturPembelian->ambi_data_reportreturpembelianheader($noretur);
	$data['detail'] = $this->Model_ReportReturPembelian->ambi_data_detailreportreturpembelianheader($noretur);
	$data['supplier'] = $this->Model_ReportReturPembelian->datasupplier();
	$data['toko'] = $this->Model_ReportReturPembelian->datatoko();
	
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/reportreturpembelian/LihatCetakReportReturPembelian',$data);	
}	
public function cetaknotaexcel(){
	$noretur = $this->uri->segment(3);
	$data['header'] = $this->Model_ReportReturPembelian->ambi_data_reportreturpembelianheader($noretur);
	$data['detail'] = $this->Model_ReportReturPembelian->ambi_data_detailreportreturpembelianheader($noretur);
	$data['supplier'] = $this->Model_ReportReturPembelian->datasupplier();
	$data['toko'] = $this->Model_ReportReturPembelian->datatoko();
	
	//$this->load->view('admin/Menuadmin');
	$this->load->view('admin/reportreturpembelian/CetakExcelReportReturPembelian',$data);	
}
	
}