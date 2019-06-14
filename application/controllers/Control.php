<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control extends CI_Controller {

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
		//$this->load->model('model_pembelian');
		
	}
	
public	function index() 
	{
	$this->session->sess_destroy();
	$this->load->view('login');
	
	}
public function cariuser()
	{
		// tangkap variabel keyword dari URL
		$keyword = $this->uri->segment(3);

		// cari di database
		$data = $this->db->from('tb_user')->like('Username',$keyword)->get();	

		// format keluaran di dalam array
		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'	=>$row->Username,
				'Kode_User'	=>$row->Kode_User,
				'Hak_Akses'	=>$row->Hak_Akses,

			);
		}
		// minimal PHP 5.2
		echo json_encode($arr);
	}	
public function loginuser(){
	$usr = $this->input->post('Username');
	$pss = $this->input->post('Pass');
	
	$datauser = $this->Model->datauser($usr,$pss);
	$datatoko = $this->Model->datatoko();
	
	$nama = $datauser["Nama"];
	$kodesupplier = $datauser["Kode_Supplier"];
	$username = $datauser["Username"];
	$pass = $datauser["Pass"];
	$kodeuser = $datauser["Kode_User"];
	$hakakses = $datauser["Hak_Akses"];
	$jk = $datauser["Jenis_Kelamin"];
	
	$nmtoko = $datatoko["Nama_Toko"];
	$fototoko = $datatoko["Foto_Toko"];
	
	$where = array(
		'Username' => $username,
		'Pass' => $pass,
		);
	$cek = $this->Model->cek_login("tb_user",$where)->num_rows();
		if($cek > 0){
			
			session_start();
			$_SESSION['Username'] 	= $nama;
			$_SESSION['Pass'] 		= $password;
			$_SESSION['Kode_User'] 	= $kodeuser;
			$_SESSION['Hak_Akses'] 	= $hakakses;
			$_SESSION['Jenis_Kelamin'] 	= $jk;
			$_SESSION['Nama_Toko'] 	= $nmtoko;
			$_SESSION['Foto_Toko'] 	= $fototoko;
			$_SESSION['Kode_Supplier'] 	= $kodesupplier;
			
			
			redirect(base_url("Control/hakadmin"));
			
		}else{
			echo "<script>alert('Username Atau Password Salah..!!');</script>";
			redirect(base_url(),'refresh');
		}
	}
public function hakadmin(){
	if($this->session->userdata['Hak_Akses'] == 'Admin'){
	
		$this->load->view('admin/Menuadmin');
		$this->load->view('admin/content');
		
	}else if($this->session->userdata['Hak_Akses'] == 'Pemilik Toko'){
	
		$this->load->view('admin/Menuadmin');
		$this->load->view('admin/content');
		
	}else if($this->session->userdata['Hak_Akses'] == 'Kepala Gudang'){
	
		$this->load->view('admin/Menuadmin');
		$this->load->view('admin/content');
		
	}else if($this->session->userdata['Hak_Akses'] == 'Kepala Penjualan'){
	
		$this->load->view('admin/Menuadmin');
		$this->load->view('admin/content');
		
	}else if($this->session->userdata['Hak_Akses'] == 'Kasir'){
	
		$this->load->view('admin/Menuadmin');
		$this->load->view('admin/content');
		
	}else if($this->session->userdata['Hak_Akses'] == 'Accountant'){
	
		$this->load->view('admin/Menuadmin');
		$this->load->view('admin/content');
		
	}else if($this->session->userdata['Hak_Akses'] == 'Supplier'){
	
		$this->load->view('admin/Menuadmin');
		$this->load->view('admin/content');
		
	}
	else if($this->session->userdata['Hak_Akses'] == ' '){
	echo "<script>alert('Tidak Ada Akses');</script>";
		redirect(base_url(),'refresh');
	}
	}
public	function databahanbaku($offset = 0) 
	{
		
		//----- setting pagination  --------------------

		$datasesi['sesi'] = $this->session->userdata('admin/bahanbaku/V_Bahanbaku');
		
		if( $datasesi['sesi']['batas'] == 0){
			$usersetting['batas'] = 0;
			$this->session->set_userdata('admin/bahanbaku/V_Bahanbaku',$usersetting);
		}

		$baris = $this->Model->getrowbahanbaku();
		
		$settingpage = 0;
		if(!empty($satu = 20)){
			$limit = $satu;
			
			$usersetting['batas'] = $limit;
			$this->session->set_userdata('admin/bahanbaku/V_Bahanbaku',$usersetting);
		}
		else if( $datasesi['sesi']['batas'] != 0){
			$limit = $datasesi['sesi']['batas'];
		}
		else{
			$limit = $baris;
		}
		
		
		if(!is_null($offset)){
		$config['uri_segment'] = 3;
		$config['base_url'] = base_url().'Control/databahanbaku/';
		
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
	
		
    $data['datatable']=$this->Model->listdatabahanbaku($limit,$offset);
      
   	$cari = $this->Model->gudang();
			if($cari){
				$data ['gdng']= $cari;
			}
	///////////////////////////////	
	 $data['ent'] = $this->Model->entries();
	 $data['totbaris'] = $limit;
	 /////////////////////////////////////
	 $data['satuan']=$this->Model->listsatuan();
		$this->load->view('admin/Menuadmin');
		$this->load->view('admin/bahanbaku/V_Bahanbaku',$data);
		}
	}
public	function databahanbaku2($offset = 0) 
	{
		
		//----- setting pagination  --------------------

		$datasesi['sesi'] = $this->session->userdata('admin/bahanbaku/V_Bahanbaku');
		
		if( $datasesi['sesi']['batas'] == 0){
			$usersetting['batas'] = 0;
			$this->session->set_userdata('admin/bahanbaku/V_Bahanbaku',$usersetting);
		}

		$baris = $this->Model->getrowbahanbaku();
		
		$settingpage = 0;
		if(!empty($this->input->post('batas'))){
			$limit = $this->input->post('batas');
			
			$usersetting['batas'] = $limit;
			$this->session->set_userdata('admin/bahanbaku/V_Bahanbaku',$usersetting);
		}
		else if( $datasesi['sesi']['batas'] != 0){
			$limit = $datasesi['sesi']['batas'];
		}
		else{
			$limit = $baris;
		}
		
		
		if(!is_null($offset)){
		$config['uri_segment'] = 3;
		$config['base_url'] = base_url().'Control/databahanbaku2/';
		
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
	
		
    $data['datatable']=$this->Model->listdatabahanbaku($limit,$offset);
      
   	$cari = $this->Model->gudang();
			if($cari){
				$data ['gdng']= $cari;
			}
	///////////////////////////////	
	 $data['ent'] = $this->Model->entries();
	 $data['totbaris'] = $limit;
	 /////////////////////////////////////
	 $data['satuan']=$this->Model->listsatuan();
		$this->load->view('admin/Menuadmin');
		$this->load->view('admin/bahanbaku/V_Bahanbaku',$data);
		}
	}
public function cariautobahanbaku()
	{
		// tangkap variabel keyword dari URL
		$keyword = $this->uri->segment(3);

		// cari di database
		$data = $this->db->from('tb_bahan_baku')->like('Kode_Bahan_Baku',$keyword)->get();	

		// format keluaran di dalam array
		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'	=>$row->Kode_Bahan_Baku,

			);
		}
		// minimal PHP 5.2
		echo json_encode($arr);
	}	
public function cariautobahanbaku2()
	{
		// tangkap variabel keyword dari URL
		$keyword = $this->uri->segment(3);

		// cari di database
		$data = $this->db->from('tb_bahan_baku')->like('Nama_Barang',$keyword)->get();	

		// format keluaran di dalam array
		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'	=>$row->Nama_Barang,

			);
		}
		// minimal PHP 5.2
		echo json_encode($arr);
	}	
	
public	function caribahanbaku() 
	{
    $data['datatable']=$this->Model->searchingdatabahanbaku();
        if($data['datatable']==null){
	redirect(base_url("Control/databahanbaku"));
    }
		else {
   $cari = $this->Model->gudang();
			if($cari){
				$data ['gdng']= $cari;
			}
	$data['ent'] = $this->Model->entries();
	$baris = $this->Model->getrowbahanbaku();
	$limit=$baris;
	$data['totbaris'] = $limit;
	 
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/bahanbaku/V_Bahanbaku',$data);
		}

	}
	
///////////////////
/*
public	function caribahanbaku($offset = 0) 
	{
		//
		//$batas = $this->input->post('Batas');
		
	//----- setting pagination  --------------------

		$datasesi['sesi'] = $this->session->userdata('admin/bahanbaku/v_bahanbaku');
		
		if( $datasesi['sesi']['batas'] == 0){
			$usersetting['batas'] = 0;
			$this->session->set_userdata('admin/bahanbaku/v_bahanbaku',$usersetting);
		}

		$baris = $this->model->getrowbahanbaku();
		
		$settingpage = 0;
		if(!empty($this->input->post('batas'))){
			$limit = $this->input->post('batas');
			
			$usersetting['batas'] = $limit;
			$this->session->set_userdata('admin/bahanbaku/v_bahanbaku',$usersetting);
		}
		else if( $datasesi['sesi']['batas'] != 0){
			$limit = $datasesi['sesi']['batas'];
		}
		else{
			$limit = $baris;
		}
		
		
		if(!is_null($offset)){
		$config['uri_segment'] = 3;
		$config['base_url'] = base_url().'index.php/control/caribahanbaku/';
		
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
		
    $data['datatable']=$this->model->searchingdatabahanbaku($limit,$offset);
        if($data['datatable']==null){
			
	redirect(base_url("index.php/control/databahanbaku"));
	
		
    }
		else {
   
	$chart['totalbeli']=$this->model_pembelian->hitungjumlahbeli();	
	$this->load->view('admin/menuadmin',$chart);
	$this->load->view('admin/bahanbaku/v_bahanbaku',$data);
		}

	}
	}
*/
//////////////
public function cariautogudang()
	{
		// tangkap variabel keyword dari URL
		$keyword = $this->uri->segment(3);

		// cari di database
		$data = $this->db->from('tb_gudang')->like('Kode_Gudang',$keyword)->get();	

		// format keluaran di dalam array
		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'	=>$row->Kode_Gudang,
				'Nama_Gudang' =>$row->Nama_Gudang,

			);
		}
		// minimal PHP 5.2
		echo json_encode($arr);
	}		
public function tambahbahanbaku(){
	//mengecek nama validation
	$this->form_validation->set_rules('Kode_Bahan_Baku','Kode_Bahan_Baku','required');
	$this->form_validation->set_rules('Kode_Gudang','Kode_Gudang','required');
	$this->form_validation->set_rules('Nama_Barang','Nama_Barang','required');
	//$this->form_validation->set_rules('Harga_Jual','Harga_Jual','required');
	

		
	if($this->form_validation->run() == TRUE)
	{
		$ubahnamafile = date('dmyHis');
		/* Start Uploading File */		
		if (isset($_FILES['Foto_Barang']['name'])) {
			$config['upload_path'] = './fotobahanbaku/';
			$config['allowed_types'] = 'jpg|png|gif|';
			$config['max_filename'] = '5000000';
			$config['maintain_ratio'] 	= TRUE;
			//$config['max_width'] = 100;
			//$config['max_height'] = 100;
			$config['encrypt_name'] = FALSE; //untuk merubah nama atau encryptr
			$config['max_size'] = '5120000'; 
			$config['file_name'] = $ubahnamafile; //untuk mengubah nama photo menjadi : 51photo.jpg atau 52photo.jpg
			
			if (file_exists('./fotobahanbaku/' . $config['file_name'])) {
				echo "<script>alert('Nama File Sudah Ada, Silahkan Rename Nama File Anda..!!');</script>";
			} else {
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
                if (!$this->upload->do_upload('Foto_Barang')) { 
					echo "<script>alert('Jenis File Terlalu Besar, File Tidak Tersimpan, Silahkan Lihat File Anda..!!');</script>";
				} else {
					echo "<script>alert('Data Telah Tersimpan, Input Data Lagi..!!');</script>";
				}
            }
		}
		/*
        $idsatuan = $this->input->post('Satuan'); 
		$cari = $this->Model->carisatuan($idsatuan); 
		$satuan = $cari['Satuan_Bahan_Baku'];
		*/
		$this->Model->simpanbahanbaku();
		//redirect(base_url(),'refresh');
	}
		
	}


public function editbahanbakubarang($kodenya)
	{
	//mengecek nama validation
	$this->form_validation->set_rules('Kode_Bahan_Baku','Kode_Bahan_Baku','required');
	$this->form_validation->set_rules('Kode_Gudang','Kode_Gudang','required');
	$this->form_validation->set_rules('Nama_Barang','Nama_Barang','required');
	$this->form_validation->set_rules('Stok','Stok','required');
	$this->form_validation->set_rules('Satuan','Satuan','required');
	$this->form_validation->set_rules('Isi','Isi','required');
	$this->form_validation->set_rules('Harga_Beli','Harga_Beli','required');
	//$this->form_validation->set_rules('Harga_Jual','Harga_Jual','required');
	
	
	if($this->form_validation->run() == TRUE)
	{
		$ubahnamafile = date('dmyHis');
		/* Start Uploading File */		
		if (isset($_FILES['Foto_Barang']['name'])) {
			$config['upload_path'] = './fotobahanbaku/';
			$config['allowed_types'] = 'jpg|png|gif|';
			$config['max_filename'] = '5000000';
			//$config['max_width'] = 166;
			//$config['max_height'] = 174;
			$config['encrypt_name'] = FALSE; //untuk merubah nama atau encryptr
			$config['max_size'] = '5120000';  
			$config['file_name'] = $ubahnamafile; //untuk mengubah nama photo menjadi : 51photo.jpg atau 52photo.jpg
			
			if (file_exists('./fotobahanbaku/' . $config['file_name'])) {
				echo "<script>alert('Nama File Sudah Ada, Silahkan Rename Nama File Anda..!!');</script>";
			} else {
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
                if (!$this->upload->do_upload('Foto_Barang')) { 
						echo "<script>alert('Jenis File Terlalu Besar, File Tidak Tersimpan, Silahkan Edit File Anda..!!');</script>";
				} else {
					echo "<script>alert('Data Telah Terupdate, Silahkan Lihat Table..!!');</script>";
				}
            }
		}
        $idsatuan = $this->input->post('Satuan'); 
		$cari = $this->Model->carisatuan($idsatuan); 
		$satuan = $cari['Satuan_Bahan_Baku'];
		
		$this->Model->updatebahanbaku($satuan);
			//redirect(base_url(),'refresh');
	}	
	
	//$data['baris']=$this->model->ambil_data_editbahanbaku($kodenya);
	
	//$cari = $this->model->gudang();
	//		if($cari){
	//			$data ['gdg']= $cari;
	//		}
	
	//$chart['totalbeli']=$this->model_pembelian->hitungjumlahbeli();	
	//$this->load->view('admin/menuadmin');
	//$this->load->view('admin/bahanbaku/editbahanbaku',$data);
	//echo json_encode($data);
	}
	
public function ajaxedit($id){
	$data = $this->Model->ambil_data_editbahanbaku($id);
	
			echo json_encode($data);
}

public function hapusbahanbaku(){
$id = $this->input->get('Kode_Bahan_Baku'); 
$ardel = ($id); 
$rowdel= $this->Model->ambil_data_editbahanbaku($ardel); 

$la = $rowdel['Foto_Barang'];
unlink('./fotobahanbaku/'.$la); 

$this->Model->hapusbarangbahanbaku($ardel); 
redirect(base_url("Control/databahanbaku")); 
}
public function lihatdetailbahanbaku($kodenya)
	{
		$data['baris'] = $this->Model->list_detail_bahanbaku($kodenya);
		$this->load->view('admin/Menuadmin');
		$this->load->view('admin/bahanbaku/V_Detailbahanbaku',$data);
	}	

}
