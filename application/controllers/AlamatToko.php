<?php
class AlamatToko extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Model_AlamatToko');
		
	}

public	function index() 
	{
		
    $data['datatable']=$this->Model_AlamatToko->listdatatoko();
	 $data['new']=$this->Model_AlamatToko->listnew();
	 
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/alamattoko/V_AlamatToko',$data);
	}
	
	
public function tambahtoko(){
	//mengecek nama validation
	$this->form_validation->set_rules('Id_Toko','Id_Toko','required');
		
	if($this->form_validation->run() == TRUE)
	{ 	
		$ubahnamafile = date('dmyHis');
		/* Start Uploading File */		
		if (isset($_FILES['Foto_Toko']['name'])) {
			$config['upload_path'] = './gambartoko/';
			$config['allowed_types'] = 'jpg|png|gif|';
			$config['max_filename'] = '5000000';
			$config['maintain_ratio'] 	= TRUE;
			$config['encrypt_name'] = FALSE; //untuk merubah nama atau encryptr
			$config['max_size'] = '5120000'; 
			$config['file_name'] = $ubahnamafile; //untuk mengubah nama photo menjadi : 51photo.jpg atau 52photo.jpg
			
			if (file_exists('./gambartoko/' . $config['file_name'])) {
				echo "<script>alert('Nama File Sudah Ada, Silahkan Rename Nama File Anda..!!');</script>";
			} else {
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
                if (!$this->upload->do_upload('Foto_Toko')) { 
					echo "<script>alert('Jenis File Terlalu Besar, File Tidak Tersimpan, Silahkan Lihat Table Bahan Baku Dan Edit File Anda..!!');</script>";
				} else {
					echo "<script>alert('Data Telah Tersimpan, Silahkan Lihat Table Bahan Baku Atau Input Data Lagi..!!');</script>";
				}
            }
		}
		
		$this->Model_AlamatToko->simpanalamattoko();
		
	}
		
	}

public function ajaxedit($id){
	$data = $this->Model_AlamatToko->ambil_data_editalamattoko($id);
	
			echo json_encode($data);
}

public function editalamattoko()
	{
	//mengecek nama validation
	$this->form_validation->set_rules('Id_Toko','Id_Toko','required');
	
	
	if($this->form_validation->run() == TRUE)
	{
	$ubah = $this->input->post("Editfile");
		if($ubah == "Yes"){
			$ubahnamafile = date('dmyHis');
		/* Start Uploading File */		
		if (isset($_FILES['Foto_Toko']['name'])) {
			$config['upload_path'] = './gambartoko/';
			$config['allowed_types'] = 'jpg|png|gif|';
			$config['max_filename'] = '5000000';
			$config['encrypt_name'] = FALSE; //untuk merubah nama atau encryptr
			$config['max_size'] = '5120000';  
			$config['file_name'] = $ubahnamafile; //untuk mengubah nama photo menjadi : 51photo.jpg atau 52photo.jpg
			
			if (file_exists('./gambartoko/' . $config['file_name'])) {
				echo "<script>alert('Nama File Sudah Ada, Silahkan Rename Nama File Anda..!!');</script>";
			} else {
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
                if (!$this->upload->do_upload('Foto_Toko')) { 
						echo "<script>alert('Jenis File Terlalu Besar, File Tidak Tersimpan, Silahkan Edit File Anda..!!');</script>";
				} else {
					echo "<script>alert('Data Telah Terupdate, Silahkan Lihat Table..!!');</script>";
				}
            }
		}
		
		$this->Model_AlamatToko->updatealamattoko();
	}else if($ubah == "No"){
		$this->Model_AlamatToko->updatealamattoko();
	}
		
			
	}	
	
	
	}
	

public function lihatdetailtoko(){
	$id=$this->uri->segment(3);
	$data['lihat']= $this->Model_AlamatToko->ambil_data_editalamattoko($id);
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/alamattoko/V_Lihattoko',$data);
}
public function hapustoko(){
$id = $this->uri->segment(3); 
$datatoko = $this->Model_AlamatToko->datatokoarray($id);
$foto = $datatoko["Foto_Toko"];
unlink('./gambartoko/'.$foto); 

$this->Model_AlamatToko->hapus($id); 
redirect(base_url("AlamatToko/index")); 
}

	
}