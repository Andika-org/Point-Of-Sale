<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hutang extends CI_Controller {

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
		$this->load->model('Model_Hutang');
		
		//$this->load->library('Excel_generator');
	}
public	function index($offset = 0) 
	{
		
	//----- setting pagination  --------------------

		$datasesi['sesi'] = $this->session->userdata('admin/hutang/V_Hutang');
		
		if( $datasesi['sesi']['batas'] == 0){
			$usersetting['batas'] = 0;
			$this->session->set_userdata('admin/hutang/V_Hutang',$usersetting);
		}

		$baris = $this->Model_Hutang->getrowhutang();
		
		$settingpage = 0;
		if(!empty($satu = 20)){
			$limit = $satu;
			
			$usersetting['batas'] = $limit;
			$this->session->set_userdata('admin/hutang/V_Hutang',$usersetting);
		}
		else if( $datasesi['sesi']['batas'] != 0){
			$limit = $datasesi['sesi']['batas'];
		}
		else{
			$limit = $baris;
		}
		
		
		if(!is_null($offset)){
		$config['uri_segment'] = 3;
		$config['base_url'] = base_url().'Hutang/index/';
		
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
	
	
    $data['datatable']=$this->Model_Hutang->listdatahutang($limit,$offset);
		///////////////////////////////	
	 $data['ent'] = $this->Model_Hutang->entries();
	 $data['totbaris'] = $limit;
	 /////////////////////////////////////
	 
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/hutang/V_Hutang',$data);
		}
	}
public	function index2($offset = 0) 
	{
		
	//----- setting pagination  --------------------

		$datasesi['sesi'] = $this->session->userdata('admin/hutang/V_Hutang');
		
		if( $datasesi['sesi']['batas'] == 0){
			$usersetting['batas'] = 0;
			$this->session->set_userdata('admin/hutang/V_Hutang',$usersetting);
		}

		$baris = $this->Model_Hutang->getrowhutang();
		
		$settingpage = 0;
		if(!empty($this->input->post('batas'))){
			$limit = $this->input->post('batas');
			
			$usersetting['batas'] = $limit;
			$this->session->set_userdata('admin/hutang/V_Hutang',$usersetting);
		}
		else if( $datasesi['sesi']['batas'] != 0){
			$limit = $datasesi['sesi']['batas'];
		}
		else{
			$limit = $baris;
		}
		
		
		if(!is_null($offset)){
		$config['uri_segment'] = 3;
		$config['base_url'] = base_url().'Hutang/index2/';
		
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
	
	
    $data['datatable']=$this->Model_Hutang->listdatahutang($limit,$offset);
		///////////////////////////////	
	 $data['ent'] = $this->Model_Hutang->entries();
	 $data['totbaris'] = $limit;
	 /////////////////////////////////////
	 
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/hutang/V_Hutang',$data);
		}
	}
public	function masukhutang() 
	{
	//mengecek nama validation
	
	$this->form_validation->set_rules('Nota','Nota','required');
	$this->form_validation->set_rules('Tanggal_Tempo_Hutang','Tanggal_Tempo_Hutang','required');
	$this->form_validation->set_rules('Bunga','Bunga','required');
	$this->form_validation->set_rules('Nominal_Bunga','Nominal_Bunga','required');
	
	if($this->form_validation->run() == TRUE)
	{ 
		$idhutang = $this->Model_Hutang->idhutang();
	
		$this->Model_Hutang->simpantbhutang($idhutang);
		$this->Model_Hutang->simpantbhutangreport($idhutang);
		
		redirect('Hutang/index/'.$id);
	}
	
	$nota = $this->uri->segment(3);
	
	$data["datapenjualan"] = $this->Model_Hutang->datapenjualan($nota);
	$data["baranghutang"] = $this->Model_Hutang->databaranghutang($nota);
	$data['tot']  = $this->Model_Hutang->totalbelihutang($nota);
		
		
	$data["nota"]=$nota;
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/hutang/inputhutang',$data);
	
	}


public function cariautocustomer()
	{
		// tangkap variabel keyword dari URL
		$keyword = $this->uri->segment(3);

		// cari di database
		$data = $this->Model_Hutang->getdataautocomplete($keyword);	

		// format keluaran di dalam array
		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'	=>$row->Nama_Customer,
				'Id_Customer' =>$row->Id_Customer,
				'Alamat' =>$row->Alamat,
				'Telepon' =>$row->Telepon,
				'Email' =>$row->Email,
				
			);
		}
		// minimal PHP 5.2
		echo json_encode($arr);
	}	
public	function caridatahutang() 
	{
    $data['datatable']=$this->Model_Hutang->searchingdatahutang();
        if($data['datatable']==null){
	redirect(base_url("Hutang/index"));
    }
		else {
     
	 $data['ent'] = $this->Model_Hutang->entries();
	 
	 $baris = $this->Model_Hutang->getrowhutang();
	 $limit=$baris;
	 $data['totbaris'] = $limit;
	//$chart['totalbeli']=$this->model_pembelian->hitungjumlahbeli();	
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/hutang/V_Hutang',$data);
		}

	}
public	function edithutang() 
	{
	//mengecek nama validation
	
	$this->form_validation->set_rules('Nota','Nota','required');
	$this->form_validation->set_rules('Bunga','Bunga','required');
	$this->form_validation->set_rules('Nominal_Bunga','Nominal_Bunga','required');
	$this->form_validation->set_rules('Tanggal_Tempo_Hutang','Tanggal_Tempo_Hutang','required');
	
		
	if($this->form_validation->run() == TRUE)
	{ 
	
		$this->Model_Hutang->simpanedittbhutang();
		$this->Model_Hutang->simpanedittbhutangreport();
		
		redirect('Hutang/index/'.$id);
	}
	
	$nota = $this->uri->segment(3);
	$idhutang = $this->uri->segment(4);
	
	$data["datapenjualan"] = $this->Model_Hutang->datapenjualan($nota);
	$data["baranghutang"] = $this->Model_Hutang->databaranghutang($nota);
	$data['tot']  = $this->Model_Hutang->totalbelihutang($nota);
	$data['customer']  = $this->Model_Hutang->datacustomer($idhutang);
		
	$data["nota"]=$nota;
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/hutang/Edithutang',$data);
	
	}
public	function listbaranghutang() 
	{
	//mengecek nama validation
	
	$nota = $this->uri->segment(3);
	$idhutang = $this->uri->segment(4);
	
	$data["datapenjualan"] = $this->Model_Hutang->datapenjualan($nota);
	$data["baranghutang"] = $this->Model_Hutang->databaranghutang($nota);
	$data['tot']  = $this->Model_Hutang->totalbelihutang($nota);
	$data['customer']  = $this->Model_Hutang->datacustomer($idhutang);
		
	$data["nota"]=$nota;
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/hutang/Databaranghutang',$data);
	
	}
public	function listcetakbaranghutang() 
	{
	//mengecek nama validation
	
	$nota = $this->uri->segment(3);
	$idhutang = $this->uri->segment(4);
	
	$data["datapenjualan"] = $this->Model_Hutang->datapenjualan($nota);
	$data["baranghutang"] = $this->Model_Hutang->databaranghutang($nota);
	$data['tot']  = $this->Model_Hutang->totalbelihutang($nota);
	$data['customer']  = $this->Model_Hutang->datacustomer($idhutang);
	$data['toko'] = $this->Model_Hutang->alamattoko();
	
	$data["nota"]=$nota;
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/hutang/LihatCetakBarangHutang',$data);
	
	}
public	function listcetaexcelkbaranghutang() 
	{
	//mengecek nama validation
	
	$nota = $this->uri->segment(3);
	$idhutang = $this->uri->segment(4);
	
	$data["datapenjualan"] = $this->Model_Hutang->datapenjualan($nota);
	$data["baranghutang"] = $this->Model_Hutang->databaranghutang($nota);
	$data['tot']  = $this->Model_Hutang->totalbelihutang($nota);
	$data['customer']  = $this->Model_Hutang->datacustomer($idhutang);
	$data['toko'] = $this->Model_Hutang->alamattoko();
	
	$data["nota"]=$nota;
	$this->load->view('admin/hutang/CetakExcelBarangHutang',$data);
	
	}
////////////////////// bayar hutang //////////////////////////
public	function inputpembayaranhutang() 
	{
	//mengecek nama validation
	
	$this->form_validation->set_rules('Bayar_Total','Bayar_Total','required');
	
		
	if($this->form_validation->run() == TRUE)
	{ 
		$idhutang = $this->uri->segment(3);
		$nota = $this->uri->segment(4);
		
		$iddetailbayarhutang = $this->Model_Hutang->idhutangdetail();
		
		
		
		$sisatotal = $this->input->post('Sisa_Total');
			
			if($sisatotal==0){
				$this->Model_Hutang->simpanhutangdetailreport($iddetailbayarhutang);
				
				$totbayar = $this->Model_Hutang->hutangterbayar($idhutang);
				$bayartotal = $totbayar['totalbayar'];
				
				///////////////////////////////////////////
				$datanota = $this->Model_Hutang->datanotapenjualanbynota($nota);
				$bayarpenjualan = $datanota["Bayar"];
				$totalbelipenjualan = $datanota["Total_Pembelian"];
				
				$ubahbayarpenjualan = $bayarpenjualan + $bayartotal;
				$ubahsisapenjualan = $ubahbayarpenjualan - $totalbelipenjualan;
				//////////////////////////////////////////
		
				$this->Model_Hutang->ubahselesaitbhutangreport($idhutang,$bayartotal);
				$this->Model_Hutang->hapushutangdetailketikalunas($idhutang);
				$this->Model_Hutang->hapushutangketikalunas($idhutang);
				$this->Model_Hutang->updatestatuspenjualan($nota,$ubahbayarpenjualan,$ubahsisapenjualan);
				
				redirect("Hutang/datacetakhutangreport/".$idhutang);
			}else if($sisatotal > 0){
				$this->Model_Hutang->simpanhutangdetailreport($iddetailbayarhutang);
				
				$totbayar = $this->Model_Hutang->hutangterbayar($idhutang);
				$bayartotal = $totbayar['totalbayar'];
				
				///////////////////////////////////////////
				$datanota = $this->Model_Hutang->datanotapenjualanbynota($nota);
				$bayarpenjualan = $datanota["Bayar"];
				$totalbelipenjualan = $datanota["Total_Pembelian"];
				
				$ubahbayarpenjualan = $bayarpenjualan + $bayartotal;
				$ubahsisapenjualan = $ubahbayarpenjualan - $totalbelipenjualan;
				//////////////////////////////////////////
				
				$this->Model_Hutang->ubahselesaitbhutangreport($idhutang,$bayartotal);
				$this->Model_Hutang->hapushutangdetailketikalunas($idhutang);
				$this->Model_Hutang->hapushutangketikalunas($idhutang);
				$this->Model_Hutang->updatestatuspenjualan($nota,$ubahbayarpenjualan,$ubahsisapenjualan);
				
				redirect("Hutang/datacetakhutangreport/".$idhutang);
			}else if($sisatotal < 0){
				$this->Model_Hutang->ubahtotalhutang($idhutang);
				$this->Model_Hutang->simpanhutangdetail($iddetailbayarhutang);
				$this->Model_Hutang->simpanhutangdetailreport($iddetailbayarhutang);
				
				redirect('Hutang/inputpembayaranhutang/'.$idhutang);
			}
	}
	
	//$nota = $this->uri->segment(3);
	$idhutang = $this->uri->segment(3);
	
	$data["datasisahutang"] = $this->Model_Hutang->datasisahutang($idhutang);
	$data["databayar"] = $this->Model_Hutang->databayarhutang($idhutang);
	$data['customer']  = $this->Model_Hutang->datacustomer($idhutang);
		
	//$data["nota"]=$nota;
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/hutang/Inputbayarhutang',$data);
	
	}
/////////////////// Report Hutang ////////////////////////////////
public	function datacetakhutang() 
	{
		$idhutang = $this->uri->segment(3);
		
		$data['customer']  = $this->Model_Hutang->datacustomerhutang($idhutang);
		$data['toko'] = $this->Model_Hutang->alamattoko();
		$data['detailhutang'] = $this->Model_Hutang->databayarhutang($idhutang);
		$data['bayar'] = $this->Model_Hutang->hutangterbayarbelumlunas($idhutang);
		
		$this->load->view('admin/Menuadmin');
		$this->load->view('admin/hutang/LihatCetakHutang',$data);
	}
public	function datacetakhutangtexcel() 
	{
		$idhutang = $this->uri->segment(3);
		
		$data['customer']  = $this->Model_Hutang->datacustomerhutang($idhutang);
		$data['toko'] = $this->Model_Hutang->alamattoko();
		$data['detailhutang'] = $this->Model_Hutang->databayarhutang($idhutang);
		$data['bayar'] = $this->Model_Hutang->hutangterbayarbelumlunas($idhutang);
		
		$this->load->view('admin/hutang/CetakExcelHutang',$data);
	}
public	function datacetakhutangketikaklikdimenupenjualan() 
	{
		$nota = $this->uri->segment(3);
		$id = $this->Model_Hutang->cariidhutang($nota);
		$idhutang = $id["Id_Hutang"];
		
		$data['customer']  = $this->Model_Hutang->datacustomerhutang($idhutang);
		$data['toko'] = $this->Model_Hutang->alamattoko();
		$data['detailhutang'] = $this->Model_Hutang->databayarhutang($idhutang);
		$data['bayar'] = $this->Model_Hutang->hutangterbayarbelumlunas($idhutang);
		
		$this->load->view('admin/Menuadmin');
		$this->load->view('admin/hutang/LihatCetakHutang',$data);
	}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////report lunas hutang////////////////////////
public	function listhutangreport($offset = 0) 
	{
		
	//----- setting pagination  --------------------

		$datasesi['sesi'] = $this->session->userdata('admin/hutang/V_Hutangreport');
		
		if( $datasesi['sesi']['batas'] == 0){
			$usersetting['batas'] = 0;
			$this->session->set_userdata('admin/hutang/V_Hutangreport',$usersetting);
		}

		$baris = $this->Model_Hutang->getrowhutangreport();
		
		$settingpage = 0;
		if(!empty($satu = 20)){
			$limit = $satu;
			
			$usersetting['batas'] = $limit;
			$this->session->set_userdata('admin/hutang/V_Hutangreport',$usersetting);
		}
		else if( $datasesi['sesi']['batas'] != 0){
			$limit = $datasesi['sesi']['batas'];
		}
		else{
			$limit = $baris;
		}
		
		
		if(!is_null($offset)){
		$config['uri_segment'] = 3;
		$config['base_url'] = base_url().'Hutang/listhutangreport/';
		
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
	
	
    $data['datatable']=$this->Model_Hutang->listdatahutangreport($limit,$offset);
		///////////////////////////////	
	 $data['ent'] = $this->Model_Hutang->entriesreport();
	 $data['totbaris'] = $limit;
	 /////////////////////////////////////
	 
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/hutang/V_Hutangreport',$data);
		}
	}
public	function listhutangreport2($offset = 0) 
	{
		
	//----- setting pagination  --------------------

		$datasesi['sesi'] = $this->session->userdata('admin/hutang/V_Hutangreport');
		
		if( $datasesi['sesi']['batas'] == 0){
			$usersetting['batas'] = 0;
			$this->session->set_userdata('admin/hutang/V_Hutangreport',$usersetting);
		}

		$baris = $this->Model_Hutang->getrowhutangreport();
		
		$settingpage = 0;
		if(!empty($this->input->post("batas"))){
			$limit = $this->input->post("batas");
			
			$usersetting['batas'] = $limit;
			$this->session->set_userdata('admin/hutang/V_Hutangreport',$usersetting);
		}
		else if( $datasesi['sesi']['batas'] != 0){
			$limit = $datasesi['sesi']['batas'];
		}
		else{
			$limit = $baris;
		}
		
		
		if(!is_null($offset)){
		$config['uri_segment'] = 3;
		$config['base_url'] = base_url().'Hutang/listhutangreport2/';
		
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
	
	
    $data['datatable']=$this->Model_Hutang->listdatahutangreport($limit,$offset);
		///////////////////////////////	
	 $data['ent'] = $this->Model_Hutang->entriesreport();
	 $data['totbaris'] = $limit;
	 /////////////////////////////////////
	 
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/hutang/V_Hutangreport',$data);
		}
	}
	
public	function caridatahutangreport() 
	{
    $data['datatable']=$this->Model_Hutang->searchingdatahutangreport();
        if($data['datatable']==null){
	redirect(base_url("Hutang/listhutangreport"));
    }
		else {
     
	 $data['ent'] = $this->Model_Hutang->entriesreport();
	 
	 $baris = $this->Model_Hutang->getrowhutangreport();
	 $limit=$baris;
	 $data['totbaris'] = $limit;
	//$chart['totalbeli']=$this->model_pembelian->hitungjumlahbeli();	
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/hutang/V_Hutangreport',$data);
		}

	}
public	function datacetakhutangreport() 
	{
		$idhutang = $this->uri->segment(3);
		
		$data['customer']  = $this->Model_Hutang->datacustomerreport($idhutang);
		$data['toko'] = $this->Model_Hutang->alamattoko();
		$data['detailhutang'] = $this->Model_Hutang->databayarhutangreport($idhutang);
		$data['terbayar'] = $this->Model_Hutang->hutangterbayar($idhutang);
		
		$this->load->view('admin/Menuadmin');
		$this->load->view('admin/hutang/LihatCetakLunasHutang',$data);
	}
public	function datacetakhutangreportexcel() 
	{
		$idhutang = $this->uri->segment(3);
		
		$data['customer']  = $this->Model_Hutang->datacustomerreport($idhutang);
		$data['toko'] = $this->Model_Hutang->alamattoko();
		$data['detailhutang'] = $this->Model_Hutang->databayarhutangreport($idhutang);
		$data['terbayar'] = $this->Model_Hutang->hutangterbayar($idhutang);
		
		$this->load->view('admin/hutang/CetakExcelLunasHutang',$data);
	}
public	function hapusreporthutang() 
	{
		$idhutang = $this->uri->segment(3);
		$this->Model_Hutang->hapushutangreport($idhutang);
		$this->Model_Hutang->hapushutangreportdetail($idhutang);
		$this->Model_Hutang->hapustbpiutangsetelahlunas($idhutang);
		
		redirect("Hutang/listhutangreport");
	}
	
public	function datacetakhutangreportpadamenupenjualan() 
	{
		$nota = $this->uri->segment(3);
		$id = $this->Model_Hutang->cariidhutang($nota);
		$idhutang = $id["Id_Hutang"];
		
		$data['customer']  = $this->Model_Hutang->datacustomerreport($idhutang);
		$data['toko'] = $this->Model_Hutang->alamattoko();
		$data['detailhutang'] = $this->Model_Hutang->databayarhutangreport($idhutang);
		$data['terbayar'] = $this->Model_Hutang->hutangterbayar($idhutang);
		
		$this->load->view('admin/Menuadmin');
		$this->load->view('admin/hutang/LihatCetakLunasHutang',$data);
	}
public	function listbaranglunashutang() 
	{
	//mengecek nama validation
	
	$nota = $this->uri->segment(3);
	$idhutang = $this->uri->segment(4);
	
	$data['terbayar'] = $this->Model_Hutang->hutangterbayar($idhutang);
	$data['toko'] = $this->Model_Hutang->alamattoko();
	$data["datapenjualan"] = $this->Model_Hutang->datapenjualan($nota);
	$data["baranghutang"] = $this->Model_Hutang->databaranghutang($nota);
	$data['tot']  = $this->Model_Hutang->totalbelihutang($nota);
	$data['customer']  = $this->Model_Hutang->datacustomerreport($idhutang);
		
	$data["nota"]=$nota;
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/hutang/LihatCetakBarangLunasHutang',$data);
	
	}
public	function listbaranglunashutangexcel() 
	{
	//mengecek nama validation
	
	$nota = $this->uri->segment(3);
	$idhutang = $this->uri->segment(4);
	
	$data['terbayar'] = $this->Model_Hutang->hutangterbayar($idhutang);
	$data['toko'] = $this->Model_Hutang->alamattoko();
	$data["datapenjualan"] = $this->Model_Hutang->datapenjualan($nota);
	$data["baranghutang"] = $this->Model_Hutang->databaranghutang($nota);
	$data['tot']  = $this->Model_Hutang->totalbelihutang($nota);
	$data['customer']  = $this->Model_Hutang->datacustomerreport($idhutang);
		
	$data["nota"]=$nota;
	$this->load->view('admin/hutang/LihatCetakExcelBarangLunasHutang',$data);
	
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////// bayar piutang //////////////
public	function updatenominalpiutang() 
	{
	//mengecek nama validation
	
	$idhutang = $this->uri->segment(3);
	$totalpiutang = $this->uri->segment(4);
	
	$datatotalhutang = $this->Model_Hutang->datatotalpiutang($idhutang);
	$datatotalpiutang = $datatotalhutang["Total_Piutang"];
	
	$total = $datatotalpiutang + $totalpiutang;
	
	$this->Model_Hutang->updatetotalpiutangtbhutang($idhutang,$total);
	$this->Model_Hutang->updatetotalpiutangtbhutangreport($idhutang,$total);
	
	redirect("Hutang/index");
	
	}
public	function bayarpiutang() 
	{
	//mengecek nama validation
	
	$idhutang = $this->uri->segment(3);
	
	$idpiutang = $this->Model_Hutang->idpiutang();
	$this->Model_Hutang->simpanpiutang($idpiutang);
	$this->Model_Hutang->updatenominaltotalpiutang($idhutang);
	$this->Model_Hutang->updatenominaltotalpiutangtbreport($idhutang);
	
	redirect("Hutang/reportpiutang/".$idhutang);
	}
public	function reportpiutang() 
	{
	//mengecek nama validation
	
	$idhutang = $this->uri->segment(3);
	
	$data['toko'] = $this->Model_Hutang->alamattoko();
	$data["header"] = $this->Model_Hutang->dataheaderreportpiutang($idhutang);
	$data["detail"] = $this->Model_Hutang->datapiutang($idhutang);
	
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/piutang/LihatCetakPiutang',$data);
	}
public	function reportpiutangexcel() 
	{
	//mengecek nama validation
	
	$idhutang = $this->uri->segment(3);
	
	$data['toko'] = $this->Model_Hutang->alamattoko();
	$data["header"] = $this->Model_Hutang->dataheaderreportpiutang($idhutang);
	$data["detail"] = $this->Model_Hutang->datapiutang($idhutang);
	
	$this->load->view('admin/piutang/CetakExcelPiutang',$data);
	}
///////////////////////////////////////
		
}
