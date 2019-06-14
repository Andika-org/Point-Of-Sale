<?php
class SatuanBahanBaku extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Model_SatuanBahanBaku');
		
	}

public	function index($offset = 0) 
	{
		
		//----- setting pagination  --------------------

		$datasesi['sesi'] = $this->session->userdata('admin/satuan/V_SatuanBahanBaku');
		
		if( $datasesi['sesi']['batas'] == 0){
			$usersetting['batas'] = 0;
			$this->session->set_userdata('admin/satuan/V_SatuanBahanBaku',$usersetting);
		}

		$baris = $this->Model_SatuanBahanBaku->getrowsatuanbahanbaku();
		
		$settingpage = 0;
		if(!empty($this->input->post('batas'))){
			$limit = $this->input->post('batas');
			
			$usersetting['batas'] = $limit;
			$this->session->set_userdata('admin/satuan/V_SatuanBahanBaku',$usersetting);
		}
		else if( $datasesi['sesi']['batas'] != 0){
			$limit = $datasesi['sesi']['batas'];
		}
		else{
			$limit = $baris;
		}
		
		
		if(!is_null($offset)){
		$config['uri_segment'] = 3;
		$config['base_url'] = base_url().'SatuanBahanBaku/index/';
		
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
	
		
    $data['datatable']=$this->Model_SatuanBahanBaku->listsatuanbahanbaku($limit,$offset);
	////////////////////////////////////////////////
     $data['ent'] = $this->Model_SatuanBahanBaku->entries();
	 $data['totbaris'] = $limit;
	//$chart['totalbeli']=$this->model_pembelian->hitungjumlahbeli();	
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/satuan/V_SatuanBahanBaku',$data);
		}
	}

public	function carisatuanbahanbaku() 
	{
    $data['datatable']=$this->Model_SatuanBahanBaku->searchingdatasatuanbahanbaku();
        if($data['datatable']==null){
	redirect(base_url("SatuanBahanBaku/index/"));
    }
		else {
     
	 $data['ent'] = $this->Model_SatuanBahanBaku->entries();
	 
	 $baris = $this->Model_SatuanBahanBaku->getrowsatuanbahanbaku();
	 $limit=$baris;
	 $data['totbaris'] = $limit;
	//$chart['totalbeli']=$this->model_pembelian->hitungjumlahbeli();	
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/satuan/V_SatuanBahanBaku',$data);
		}

	}
	
	
public function tambahsatuanbahanbaku(){
	//mengecek nama validation
	$this->form_validation->set_rules('Satuan_Bahan_Baku[]','Satuan_Bahan_Baku','required');
		
	if($this->form_validation->run() == TRUE)
	{ 
		$kode = $this->Model_SatuanBahanBaku->kodesatuanbahanbaku();
		$nm = $this->input->post('Satuan_Bahan_Baku');
		$no=1;			
						$result = array();
			
						foreach($nm AS $key => $val){
					
							$result[] = array(
							'Id_Satuan' => $no++.$kode,
							'Satuan_Bahan_Baku' => $_POST['Satuan_Bahan_Baku'][$key]
							
							);
							
						} 

						$test= $this->db->insert_batch('tb_satuan_bahan_baku', $result); // fungsi dari codeigniter untuk menyimpan multi array

						redirect('SatuanBahanBaku/index');
	}
		
	}

public function ajaxedit($id){
	$data = $this->Model_SatuanBahanBaku->ambil_data_editsatuanbahanbaku($id);
	
			echo json_encode($data);
}

public function editsatuan($kodenya)
	{
	//mengecek nama validation
	$this->form_validation->set_rules('Id_Satuan','Id_Satuan','required');
	$this->form_validation->set_rules('Satuan_Bahan_Baku','Satuan_Bahan_Baku','required');
	
	if($this->form_validation->run() == TRUE)
	{
		$this->Model_SatuanBahanBaku->updatebahanbaku();
			
	}	
	
	
	}
	


public function hapus(){
$id = $this->uri->segment(3); 
$this->Model_SatuanBahanBaku->hapus($id); 
redirect(base_url("SatuanBahanBaku/index")); 
}

	
}