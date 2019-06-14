<?php
class Gudang extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Model_Gudang');
		
	}

public	function index($offset = 0) 
	{
		
		//----- setting pagination  --------------------

		$datasesi['sesi'] = $this->session->userdata('admin/gudang/V_Gudang');
		
		if( $datasesi['sesi']['batas'] == 0){
			$usersetting['batas'] = 0;
			$this->session->set_userdata('admin/gudang/V_Gudang',$usersetting);
		}

		$baris = $this->Model_Gudang->getrowGudang();
		
		$settingpage = 0;
		if(!empty($this->input->post('batas'))){
			$limit = $this->input->post('batas');
			
			$usersetting['batas'] = $limit;
			$this->session->set_userdata('admin/gudang/V_Gudang',$usersetting);
		}
		else if( $datasesi['sesi']['batas'] != 0){
			$limit = $datasesi['sesi']['batas'];
		}
		else{
			$limit = $baris;
		}
		
		
		if(!is_null($offset)){
		$config['uri_segment'] = 3;
		$config['base_url'] = base_url().'Gudang/index/';
		
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
	
		
    $data['datatable']=$this->Model_Gudang->listgudang($limit,$offset);
	////////////////////////////////////////////////
     $data['ent'] = $this->Model_Gudang->entries();
	 $data['totbaris'] = $limit;
	//$chart['totalbeli']=$this->model_pembelian->hitungjumlahbeli();	
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/gudang/V_Gudang',$data);
		}
	}

public	function carigudang() 
	{
    $data['datatable']=$this->Model_Gudang->searchingdatagudang();
        if($data['datatable']==null){
	redirect(base_url("Gudang/index/"));
    }
		else {
     
	 $data['ent'] = $this->Model_Gudang->entries();
	 
	 $baris = $this->Model_Gudang->getrowGudang();
	 $limit=$baris;
	 $data['totbaris'] = $limit;
	//$chart['totalbeli']=$this->model_pembelian->hitungjumlahbeli();	
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/gudang/V_Gudang',$data);
		}

	}
	
	
public function tambahgudang(){
	//mengecek nama validation
	$this->form_validation->set_rules('Nama_Gudang[]','Nama_Gudang','required');
		
	if($this->form_validation->run() == TRUE)
	{ 
		$kode = $this->Model_Gudang->kodegudang();
		$nm = $this->input->post('Nama_Gudang');
		$no=1;			
						$result = array();
			
						foreach($nm AS $key => $val){
					
							$result[] = array(
							'Kode_Gudang' => $no++.$kode,
							'Nama_Gudang' => $_POST['Nama_Gudang'][$key]
							
							);
							
						} 

						$test= $this->db->insert_batch('tb_gudang', $result); // fungsi dari codeigniter untuk menyimpan multi array

						redirect('Gudang/index');
	}
		
	}

//public function ajaxedit($id){
	//$data = $this->Model_Gudang->ambil_data_editsatuanbahanbaku($id);
	
		//	echo json_encode($data);
//}

/*public function editsatuan($kodenya)
	{
	//mengecek nama validation
	$this->form_validation->set_rules('Id_Satuan','Id_Satuan','required');
	$this->form_validation->set_rules('Satuan_Bahan_Baku','Satuan_Bahan_Baku','required');
	
	if($this->form_validation->run() == TRUE)
	{
		$this->Model_SatuanBahanBaku->updatebahanbaku();
			
	}	
	
	
	}
	

*/
public function hapus(){
$id = $this->uri->segment(3); 
$this->Model_Gudang->hapus($id); 
redirect(base_url("Gudang/index")); 
}

	
}