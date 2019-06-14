public	function index() 
	{
	$this->load->view('login');
	$this->session->sess_destroy();
	}
	
	public function loginuser(){
	$username = $this->input->post('Username');
	$pass = $this->input->post('Pass');
	$kodeuser = $this->input->post('Kode_User');
	$hakakses = $this->input->post('Hak_Akses');
	$where = array(
		'Username' => $username,
		'Pass' => $pass,
		'Kode_User' => $kodeuser,
		'Hak_Akses' => $hakakses
		);
	$cek = $this->Model->cek_login("tb_user",$where)->num_rows();
		if($cek > 0){
			
			session_start();
			$_SESSION['Username'] 	= $username;
			$_SESSION['Pass'] 		= $password;
			$_SESSION['Kode_User'] 	= $kodeuser;
			$_SESSION['Hak_Akses'] 	= $hakakses;
			
			
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
		
	}
	else {
	echo "<script>alert('Tidak Ada Akses');</script>";
		redirect(base_url(),'refresh');
	}
	}
public	function databahanbaku() 
	{
	
	 $data['datatable']=$this->Model->listdatabahanbaku();
      
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/bahanbaku/V_Bahanbaku',$data);
		}
public	function caribahanbaku() 
	{
    $data['datatable']=$this->Model->searchingdatabahanbaku();
        if($data['datatable']==null){
	redirect(base_url("Control/databahanbaku"));
    }
		else {
  
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/bahanbaku/V_Bahanbaku',$data);
		}

	}
	
public function tambahbahanbaku(){
	//mengecek nama validation
	$this->form_validation->set_rules('Kode_Bahan_Baku','Kode_Bahan_Baku','required');
	
	if($this->form_validation->run() == TRUE)
	{    
		$this->Model->simpanbahanbaku();
		//redirect(base_url(),'refresh');
	}
		$this->load->view('admin/Menuadmin');
	$this->load->view('admin/bahanbaku/V_Bahanbaku');
	}
	
public function editbahanbakubarang($kodenya)
	{
	//mengecek nama validation
	$this->form_validation->set_rules('Kode_Bahan_Baku','Kode_Bahan_Baku','required');
	
	if($this->form_validation->run() == TRUE)
	{
            
		$this->Model->updatebahanbaku();
			//redirect(base_url(),'refresh');
	}	
	
	$data['baris']=$this->model->ambil_data_editbahanbaku($kodenya);

	$this->load->view('admin/menuadmin');
	$this->load->view('admin/bahanbaku/editbahanbaku',$data);
	}
	
public function hapusbahanbaku(){
$id = $this->input->get('Kode_Bahan_Baku'); 
$this->Model->hapusbarangbahanbaku($id); 
redirect(base_url("Control/databahanbaku")); 
}