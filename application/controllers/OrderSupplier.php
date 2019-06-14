<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderSupplier extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
function __construct(){
		parent::__construct();
		$this->load->model('Model_OrderSupplier');
		
		//$this->load->library('Excel_generator');
	}

public	function index($offset = 0) 
	{
		
	//----- setting pagination  --------------------
	
		$datasesi['sesi'] = $this->session->userdata('supplier/dataorderbarang/V_Pembelian');
		
		if( $datasesi['sesi']['batas'] == 0){
			$usersetting['batas'] = 0;
			$this->session->set_userdata('supplier/dataorderbarang/V_Pembelian',$usersetting);
		}

		$baris = $this->Model_OrderSupplier->getrowheaderpembelian();
		
		$settingpage = 0;
		if(!empty($satu = 20)){
			$limit = $satu;
			
			$usersetting['batas'] = $limit;
			$this->session->set_userdata('supplier/dataorderbarang/V_Pembelian',$usersetting);
		}
		else if( $datasesi['sesi']['batas'] != 0){
			$limit = $datasesi['sesi']['batas'];
		}
		else{
			$limit = $baris;
		}
		
		
		if(!is_null($offset)){
		$config['uri_segment'] = 3;
		$config['base_url'] = base_url().'OrderSupplier/index/';
		
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
	
	
    $data['datatable']=$this->Model_OrderSupplier->listdatapembelianbahanbaku($limit,$offset);
		///////////////////////////////	
	 $data['ent'] = $this->Model_OrderSupplier->entries();
	 $data['totbaris'] = $limit;
	 /////////////////////////////////////
	 
	$this->load->view('admin/Menuadmin');
	$this->load->view('supplier/dataorderbarang/V_Pembelian',$data);
		}
	}
	
public	function index2($offset = 0) 
	{
		
	//----- setting pagination  --------------------

		$datasesi['sesi'] = $this->session->userdata('supplier/dataorderbarang/V_Pembelian');
		
		if( $datasesi['sesi']['batas'] == 0){
			$usersetting['batas'] = 0;
			$this->session->set_userdata('supplier/dataorderbarang/V_Pembelian',$usersetting);
		}

		$baris = $this->Model_OrderSupplier->getrowheaderpembelian();
		
		$settingpage = 0;
		if(!empty($this->input->post('batas'))){
			$limit = $this->input->post('batas');
			
			$usersetting['batas'] = $limit;
			$this->session->set_userdata('supplier/dataorderbarang/V_Pembelian',$usersetting);
		}
		else if( $datasesi['sesi']['batas'] != 0){
			$limit = $datasesi['sesi']['batas'];
		}
		else{
			$limit = $baris;
		}
		
		
		if(!is_null($offset)){
		$config['uri_segment'] = 3;
		$config['base_url'] = base_url().'OrderSupplier/index2/';
		
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
	
	
    $data['datatable']=$this->Model_OrderSupplier->listdatapembelianbahanbaku($limit,$offset);
		///////////////////////////////	
	 $data['ent'] = $this->Model_OrderSupplier->entries();
	 $data['totbaris'] = $limit;
	 /////////////////////////////////////
	 
	$this->load->view('admin/Menuadmin');
	$this->load->view('supplier/dataorderbarang/V_Pembelian',$data);
		}
	}
	
public function editnota($kodenya){
	//mengecek nama validation
	
	$this->form_validation->set_rules('No_Faktur','No_Faktur','required');
	$this->form_validation->set_rules('Kode_User','Kode_User','required');
	$this->form_validation->set_rules('Kode_Supplier','Kode_Supplier','required');
	$this->form_validation->set_rules('Tanggal_Pembelian','Tanggal_Pembelian','required');
	$this->form_validation->set_rules('Jenis_Pembayaran','Jenis_Pembayaran','required');
	//$this->form_validation->set_rules('Tanggal_Jatuh_Tempo','Tanggal_Jatuh_Tempo','required');
	$this->form_validation->set_rules('Total_Pembelian','Total_Pembelian','required');
	//$this->form_validation->set_rules('Status_Pembelian','Status_Pembelian','required');
	
	if($this->form_validation->run() == TRUE)
	{
			$ubahnamafile = date('dmyHis');
		/* Start Uploading File */		
		if (isset($_FILES['Bukti_Pembayaran']['name'])) {
			
			$config['upload_path'] = './fotobuktipembayaran/';
			$config['allowed_types'] = 'jpg|png|gif|';
			$config['max_filename'] = '5000000';
			$config['maintain_ratio'] 	= TRUE;
			//$config['max_width'] = 100;
			//$config['max_height'] = 100;
			$config['encrypt_name'] = FALSE; //untuk merubah nama atau encryptr
			$config['max_size'] = '5120000'; 
			$config['file_name'] = $ubahnamafile; //untuk mengubah nama photo menjadi : 51photo.jpg atau 52photo.jpg
			
			if (file_exists('./fotobuktipembayaran/' . $config['file_name'])) {
				echo "<script>alert('Nama File Sudah Ada, Silahkan Rename Nama File Anda..!!');</script>";
			} else {
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
                if (!$this->upload->do_upload('Bukti_Pembayaran')) { 
					echo "<script>alert('Jenis File Terlalu Besar, File Tidak Tersimpan, Silahkan Lihat Table Dan Edit File Anda..!!');</script>";
				} else {
					echo "<script>alert('Data Telah Tersimpan, Silahkan Lihat Table Pembelian..!!');</script>";
				}
            }
		}
            
			$this->Model_OrderSupplier->updatenota();
			
	}	
	$cari3 = $this->Model_OrderSupplier->datasupplier();
		if($cari3){
			$data['sp'] = $cari3;
		}
		
	$sp=$this->Model_OrderSupplier->ambil_data_headerpembelian($kodenya);
	$y = $sp['Kode_Supplier'];
	$user = $sp['Kode_User'];
	
	$data['ss'] = $this->Model_OrderSupplier->notsupplier($y);
	$data['uss'] = $this->Model_OrderSupplier->notuser($user);
	$data['baris']=$this->Model_OrderSupplier->ambil_data_headerpembelian($kodenya);
		
	$this->load->view('admin/Menuadmin');
	$this->load->view('supplier/dataorderbarang/Editkonfirmasipembelianbahanbaku',$data);
	}
public function statuspembelian(){
	
	$this->Model_OrderSupplier->updatestatus();
	redirect(base_url("OrderSupplier/index"));
}
public	function carinota() 
	{
    $data['datatable']=$this->Model_OrderSupplier->searchingdatanota();
        if($data['datatable']==null){		
	redirect(base_url("OrderSupplier/index"));
    }
		else {
	
	$data['ent'] = $this->Model_OrderSupplier->entries();
	 
	$baris = $this->Model_OrderSupplier->getrowheaderpembelian();
	$limit=$baris;
	$data['totbaris'] = $limit;
	
	$this->load->view('admin/Menuadmin');
	$this->load->view('supplier/dataorderbarang/V_Pembelian',$data);
		}

	}
		
public	function caripembelian() 
	{
    $data['datatable']=$this->Model_OrderSupplier->searchingdataall();
        if($data['datatable']==null){		
	redirect(base_url("OrderSupplier/index"));
    }
		else {
	
	$data['ent'] = $this->Model_OrderSupplier->entries();
	 
	$baris = $this->Model_OrderSupplier->getrowheaderpembelian();
	$limit=$baris;
	$data['totbaris'] = $limit;
	
	$this->load->view('admin/Menuadmin');
	$this->load->view('supplier/dataorderbarang/V_Pembelian',$data);
		}

	}
	
public function ceknota($kodenya){
	$sp=$this->Model_OrderSupplier->ambil_data_headerpembelian($kodenya);
	$y = $sp['Kode_Supplier'];
	$user = $sp['Kode_User'];
	$faktur = $sp['No_Faktur'];

	$data['ss'] = $this->Model_OrderSupplier->notsupplier($y);
	$data['uss'] = $this->Model_OrderSupplier->notuser($user);
	$data['fak'] = $this->Model_OrderSupplier->listdatadetailbahanbaku2($faktur);
	
	$data['baris']=$this->Model_OrderSupplier->ambil_data_headerpembelian($kodenya);
	
	$this->load->view('admin/Menuadmin');
	$this->load->view('supplier/dataorderbarang/Ceknota',$data);
	}
	
public function cetaknota(){
	$kodenya = $this->uri->segment(3);
	$sp=$this->Model_OrderSupplier->ambil_data_headerpembelian($kodenya);
	$y = $sp['Kode_Supplier'];
	$user = $sp['Kode_User'];
	$faktur = $sp['No_Faktur'];
	
	$data['ss'] = $this->Model_OrderSupplier->notsupplier($y);
	$data['uss'] = $this->Model_OrderSupplier->notuser($user);
	$data['fak'] = $this->Model_OrderSupplier->listdatadetailbahanbaku2($faktur);
	
	$data['toko']=$this->Model_OrderSupplier->datatoko();
	
	$data['baris']=$this->Model_OrderSupplier->ambil_data_headerpembelian($kodenya);
	
	$data['faktur']= $sp['No_Faktur'];
	//
	$ambiltotal = $this->Model_OrderSupplier->ambil_data_headerpembelian($kodenya);
	$terbilang = $ambiltotal['Total_Pembelian']; 
	
	$data['terbilang'] = to_word($terbilang);
	//
	$this->load->view('admin/Menuadmin');
	$this->load->view('supplier/dataorderbarang/Lihatcetaknota',$data);
}
public function cetaknotaexcel(){
	$kodenya = $this->uri->segment(3);
	
	$sp=$this->Model_OrderSupplier->ambil_data_headerpembelian($kodenya);
	$y = $sp['Kode_Supplier'];
	$user = $sp['Kode_User'];
	$faktur = $sp['No_Faktur'];
	
	$data['ss'] = $this->Model_OrderSupplier->notsupplier($y);
	$data['uss'] = $this->Model_OrderSupplier->notuser($user);
	$data['fak'] = $this->Model_OrderSupplier->listdatadetailbahanbaku2($faktur);
	$data['toko']=$this->Model_OrderSupplier->datatoko();
	
	$data['baris']=$this->Model_OrderSupplier->ambil_data_headerpembelian($kodenya);
	//
	$ambiltotal = $this->Model_OrderSupplier->ambil_data_headerpembelian($kodenya);
	$terbilang = $ambiltotal['Total_Pembelian']; 
	
	$data['terbilang'] = to_word($terbilang);
	//

	$this->load->view('supplier/dataorderbarang/Cetaknota',$data);
}
public function cetaknotaperbulan($kodenya){
	$sp=$this->Model_OrderSupplier->ambil_data_headerpembelian($kodenya);
	$y = $sp['Kode_Supplier'];
	
	$us=$this->Model_OrderSupplier->ambil_data_headerpembelian($kodenya);
	$user = $us['Kode_User'];
	
	$fk=$this->Model_OrderSupplier->ambil_data_headerpembelian($kodenya);
	$faktur = $fk['No_Faktur'];
	
	$data['ss'] = $this->Model_OrderSupplier->notsupplier($y);
	$data['uss'] = $this->Model_OrderSupplier->notuser($user);
	$data['fak'] = $this->Model_OrderSupplier->listdatadetailbahanbaku2($faktur);
	
	$data['baris']=$this->Model_OrderSupplier->ambil_data_headerpembelian($kodenya);

	$this->load->view('supplier/dataorderbarang/Ceknota',$data);
}


}
