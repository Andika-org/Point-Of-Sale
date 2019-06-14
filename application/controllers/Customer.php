<?php
class Customer extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Model_Customer');
		
	}
public	function index($offset = 0) 
	{
		
		//----- setting pagination  --------------------

		$datasesi['sesi'] = $this->session->userdata('admin/customer/V_Customer');
		
		if( $datasesi['sesi']['batas'] == 0){
			$usersetting['batas'] = 0;
			$this->session->set_userdata('admin/customer/V_Customer',$usersetting);
		}

		$baris = $this->Model_Customer->getrowcustomer();
		
		$settingpage = 0;
		if(!empty($satu = 20)){
			$limit = $satu;
			
			$usersetting['batas'] = $limit;
			$this->session->set_userdata('admin/customer/V_Customer',$usersetting);
		}
		else if( $datasesi['sesi']['batas'] != 0){
			$limit = $datasesi['sesi']['batas'];
		}
		else{
			$limit = $baris;
		}
		
		
		if(!is_null($offset)){
		$config['uri_segment'] = 3;
		$config['base_url'] = base_url().'Customer/index/';
		
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
	
    $data['datatable']=$this->Model_Customer->listdatacustomer($limit,$offset);
	////////////////////////////////////////////////
     $data['ent'] = $this->Model_Customer->entries();
	 $data['totbaris'] = $limit;
	//$chart['totalbeli']=$this->model_pembelian->hitungjumlahbeli();	
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/customer/V_Customer',$data);
		}
	}
public	function index2($offset = 0) 
	{
		
		//----- setting pagination  --------------------

		$datasesi['sesi'] = $this->session->userdata('admin/customer/V_Customer');
		
		if( $datasesi['sesi']['batas'] == 0){
			$usersetting['batas'] = 0;
			$this->session->set_userdata('admin/customer/V_Customer',$usersetting);
		}

		$baris = $this->Model_Customer->getrowcustomer();
		
		$settingpage = 0;
		if(!empty($this->input->post('batas'))){
			$limit = $this->input->post('batas');
			
			$usersetting['batas'] = $limit;
			$this->session->set_userdata('admin/customer/V_Customer',$usersetting);
		}
		else if( $datasesi['sesi']['batas'] != 0){
			$limit = $datasesi['sesi']['batas'];
		}
		else{
			$limit = $baris;
		}
		
		
		if(!is_null($offset)){
		$config['uri_segment'] = 3;
		$config['base_url'] = base_url().'Customer/index2/';
		
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
	
    $data['datatable']=$this->Model_Customer->listdatacustomer($limit,$offset);
	////////////////////////////////////////////////
     $data['ent'] = $this->Model_Customer->entries();
	 $data['totbaris'] = $limit;
	//$chart['totalbeli']=$this->model_pembelian->hitungjumlahbeli();	
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/customer/V_Customer',$data);
		}
	}

public	function caricustomer() 
	{
    $data['datatable']=$this->Model_Customer->searchingdatacustomer();
        if($data['datatable']==null){
	redirect(base_url("Customer/index"));
    }
		else {
     
	 $data['ent'] = $this->Model_Customer->entries();
	 
	 $baris = $this->Model_Customer->getrowcustomer();
	 $limit=$baris;
	 $data['totbaris'] = $limit;
	//$chart['totalbeli']=$this->model_pembelian->hitungjumlahbeli();	
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/customer/V_Customer',$data);
		}

	}
	
	
public function tambahcustomer(){
	//mengecek nama validation
	$this->form_validation->set_rules('Nama_Customer','Nama_Customer','required');
	//$this->form_validation->set_rules('Alamat','Alamat','required');
	//$this->form_validation->set_rules('Telepon','Telepon','required');
	//$this->form_validation->set_rules('Email','Email','required');
	
	if($this->form_validation->run() == TRUE)
	{
		$ubahnamafile = date('dmyHis');
		/* Start Uploading File */		
		if (isset($_FILES['Foto_Identitas']['name'])) {
			$config['upload_path'] = './identitascustomer/';
			$config['allowed_types'] = 'jpg|png|gif|';
			$config['max_filename'] = '5000000';
			//$config['max_width'] = 166;
			//$config['max_height'] = 174;
			$config['encrypt_name'] = FALSE; //untuk merubah nama atau encryptr
			$config['max_size'] = '5120000';  
			$config['file_name'] = $ubahnamafile; //untuk mengubah nama photo menjadi : 51photo.jpg atau 52photo.jpg
			
			if (file_exists('./identitascustomer/' . $config['file_name'])) {
				echo "<script>alert('Nama File Sudah Ada, Silahkan Rename Nama File Anda..!!');</script>";
			} else {
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
                if (!$this->upload->do_upload('Foto_Identitas')) { 
						echo "<script>alert('Jenis File Terlalu Besar, File Tidak Tersimpan, Silahkan Edit File Anda..!!');</script>";
				} else {
					echo "<script>alert('Data Telah Tersimpan, Silahkan Lihat Table..!!');</script>";
				}
            }
		}
		$id = $this->Model_Customer->kodecustomer();
		$this->Model_Customer->simpancustomer($id);
		
	}
		
	}

public function ajaxedit($id){
	$data = $this->Model_Customer->ambil_data_editcustomer($id);
	
			echo json_encode($data);
}

public function editcustomer($kodenya)
	{
	//mengecek nama validation
	$this->form_validation->set_rules('Id_Customer','Id_Customer','required');
	//$this->form_validation->set_rules('Nama_Customer','Nama_Customer','required');
	//$this->form_validation->set_rules('Alamat','Alamat','required');
	//$this->form_validation->set_rules('Telepon','Telepon','required');
	//$this->form_validation->set_rules('Email','Email','required');
	
	
	if($this->form_validation->run() == TRUE)
	{
		//
		
	$ubah = $this->input->post("Ubah_File");
		if($ubah == "Yes"){
			$ubahnamafile = date('dmyHis');
		/* Start Uploading File */		
		if (isset($_FILES['Foto_Identitas']['name'])) {
			$config['upload_path'] = './identitascustomer/';
			$config['allowed_types'] = 'jpg|png|gif|';
			$config['max_filename'] = '5000000';
			//$config['max_width'] = 166;
			//$config['max_height'] = 174;
			$config['encrypt_name'] = FALSE; //untuk merubah nama atau encryptr
			$config['max_size'] = '5120000';  
			$config['file_name'] = $ubahnamafile; //untuk mengubah nama photo menjadi : 51photo.jpg atau 52photo.jpg
			
			if (file_exists('./identitascustomer/' . $config['file_name'])) {
				echo "<script>alert('Nama File Sudah Ada, Silahkan Rename Nama File Anda..!!');</script>";
			} else {
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
                if (!$this->upload->do_upload('Foto_Identitas')) { 
						echo "<script>alert('Jenis File Terlalu Besar, File Tidak Tersimpan, Silahkan Edit File Anda..!!');</script>";
				} else {
					echo "<script>alert('Data Telah Tersimpan, Silahkan Lihat Table..!!');</script>";
				}
            }
		}
		
		$this->Model_Customer->updatecustomer();
	}else if($ubah == "No"){
		$this->Model_Customer->updatecustomer();
	}
		//
		
			
	}	
	
	
	}
	


public function hapuscustomer(){
$id = $this->uri->segment(3);
$carifoto = $this->Model_Customer->carifotoidentitas($id);
$datafoto = $carifoto["Foto_Identitas"];
unlink('./identitascustomer/'.$datafoto);  
$this->Model_Customer->hapus($id); 
redirect(base_url("Customer/index")); 
}

	
}