<?php
class Stokopname extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Model_Stokopname');
		
	}
	
public	function index($offset = 0) 
	{
		
	//----- setting pagination  --------------------

		$datasesi['sesi'] = $this->session->userdata('admin/stokopname/V_Stokopname');
		
		if( $datasesi['sesi']['batas'] == 0){
			$usersetting['batas'] = 0;
			$this->session->set_userdata('admin/stokopname/V_Stokopname',$usersetting);
		}

		$baris = $this->Model_Stokopname->getrowstokopname();
		
		$settingpage = 0;
		if(!empty($satu = 20)){
			$limit = $satu;
			
			$usersetting['batas'] = $limit;
			$this->session->set_userdata('admin/stokopname/V_Stokopname',$usersetting);
		}
		else if( $datasesi['sesi']['batas'] != 0){
			$limit = $datasesi['sesi']['batas'];
		}
		else{
			$limit = $baris;
		}
		
		
		if(!is_null($offset)){
		$config['uri_segment'] = 3;
		$config['base_url'] = base_url().'Stokopname/index/';
		
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
	
	
    $data['datatable']=$this->Model_Stokopname->listdatastokopname($limit,$offset);
		///////////////////////////////	
	 $data['ent'] = $this->Model_Stokopname->entries();
	 $data['totbaris'] = $limit;
	 /////////////////////////////////////
	 
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/stokopname/V_Stokopname',$data);
		}
	}
	
public	function index2($offset = 0) 
	{
		
	//----- setting pagination  --------------------

		$datasesi['sesi'] = $this->session->userdata('admin/stokopname/V_Stokopname');
		
		if( $datasesi['sesi']['batas'] == 0){
			$usersetting['batas'] = 0;
			$this->session->set_userdata('admin/stokopname/V_Stokopname',$usersetting);
		}

		$baris = $this->Model_Stokopname->getrowstokopname();
		
		$settingpage = 0;
		if(!empty($this->input->post('batas'))){
			$limit = $this->input->post('batas');
			
			$usersetting['batas'] = $limit;
			$this->session->set_userdata('admin/stokopname/V_Stokopname',$usersetting);
		}
		else if( $datasesi['sesi']['batas'] != 0){
			$limit = $datasesi['sesi']['batas'];
		}
		else{
			$limit = $baris;
		}
		
		
		if(!is_null($offset)){
		$config['uri_segment'] = 3;
		$config['base_url'] = base_url().'Stokopname/index2/';
		
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
	
	
    $data['datatable']=$this->Model_Stokopname->listdatastokopname($limit,$offset);
		///////////////////////////////	
	 $data['ent'] = $this->Model_Stokopname->entries();
	 $data['totbaris'] = $limit;
	 /////////////////////////////////////
	 
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/stokopname/V_Stokopname',$data);
		}
	}
public	function inputstokopname() 
	{
		$this->form_validation->set_rules('Kode_Bahan_Baku','Kode_Bahan_Baku','required');
			
		if($this->form_validation->run() == TRUE)
		{ 	
			$id = $this->Model_Stokopname->idstokopname();
			$iddetail = $this->Model_Stokopname->idstokopnamedetail();
			
			$nm = $this->input->post('namasatuan');
			$kdbhnbku = $this->input->post('Kode_Bahan_Baku');
			$namabarang = $this->input->post('Nama_Barang');
			$kduser = $this->session->userdata("Kode_User");
			$no=1;			
						$result = array();
			
						foreach($nm AS $key => $val){
					
							$result[] = array(
							'Id_Detail' => $iddetail.$no++,
							'Id_Stokopname' => $id,
							'Kode_Bahan_Baku' => $kdbhnbku,
							'Nama_Barang' => $namabarang,
							'Stok' => $_POST['isistok'][$key],
							'Stok_Nyata' => $_POST['stoknyata'][$key],
							'Stok_Selisih' => $_POST['selisih'][$key],
							'Nama_Satuan' => $_POST['namasatuan'][$key],
							'Level' => $_POST['level'][$key],
							'Keterangan' => $_POST['keterangan'][$key],
							'Kode_User' => $kduser,
							'Normalisasi' => "Belum"
							);
							
						} 
						$test= $this->db->insert_batch('tb_stokopnamedetail', $result); // fungsi dari codeigniter untuk menyimpan multi array
						$test= $this->db->insert_batch('tb_stokopnamedetailbantu', $result); // fungsi dari codeigniter untuk menyimpan multi array

						$this->Model_Stokopname->delkosong($id);
						$this->Model_Stokopname->delkosongbantu($id);
					redirect('Stokopname/inputstokopname');
						
		}
		
		//foreach($data["barang"] as $kdbhnbku){
		//	$kd = $kdbhnbku->Kode_Bahan_Baku;
		//	$data["qty"] = $this->Model_Stokopname->listdetailsoqty($kd);
		//}
		$print ="";
		
		$data["barang"] = $this->Model_Stokopname->listdetailsogroup();
		
		$i = 1;
		foreach($data["barang"] as $dtbrng){
			
			$print = $print .'
					<tr>
					<td><center>'.$i++.'</center></td>
					<td>'.$dtbrng->Kode_Bahan_Baku.'</td>
					<td><center>'.$dtbrng->Nama_Barang.'</center></td>';
					
					
						
					$kdbhnbku = $dtbrng->Kode_Bahan_Baku;
					
					$data["coba"] = $this->Model_Stokopname->listdetailsoqtycoba($kdbhnbku);
					if(!empty($data['coba'])){
						
						$print = $print.'
						<td><table>';
						
						foreach($data['coba'] as $dd){
							$print = $print .'
								<tr><td>'.$dd->Stok ." ".$dd->Nama_Satuan.'</td></tr>
								';
						}
						
						$print = $print.'
						</td></table>';
						
						/////////////////////////////////////////////////////////////////
						$print = $print.'
						<td><table>';
						
						foreach($data['coba'] as $dd){
							$print = $print .'
								<tr><td>'.$dd->Stok_Nyata." ".$dd->Nama_Satuan.'</td></tr>
								';
						}
						
						$print = $print.'
						</td></table>';
						
						/////////////////////////////////////////////////////////////////
						$print = $print.'
						<td><table>';
						
						foreach($data['coba'] as $dd){
							$print = $print .'
								<tr><td>'.$dd->Stok_Selisih ." ".$dd->Nama_Satuan.'</td></tr>
								';
						}
						
						$print = $print.'
						</td></table>';
						
						/////////////////////////////////////////////////////////////////
						$print = $print.'
						<td><center><table>';
						
						foreach($data['coba'] as $dd){
							$print = $print .'
								<tr><td>'.$dd->Keterangan.'</td></tr>
								';
						}
						
						$print = $print.'
						</td></center></table>';
						
						
					}
					
					
					else{
						$print = $print.'
						<td><table>';
						
						$print = $print .'
						<td></td>';
					
						$print = $print.'
						</td></table>';
						
						///////////////////////////
						$print = $print.'
						<td><table>';
						
						$print = $print .'
						<td></td>';
					
						$print = $print.'
						</td></table>';
						
						///////////////////////////
						$print = $print.'
						<td><table>';
						
						$print = $print .'
						<td></td>';
					
						$print = $print.'
						</td></table>';
						
						///////////////////////////
						$print = $print.'
						<td><table>';
						
						$print = $print .'
						<td></td>';
					
						$print = $print.'
						</td></table>';
					}
		}
	
		//$kd = $this->Model_Stokopname->listdetailsogroup();
		$data["test"] = $print;
		$data["idstok"] = $this->Model_Stokopname->idso();
		$data["qty"] = $this->Model_Stokopname->listdetailsoqty();
		
		
		
		///////////////////////////////////////////////////////////////////////
		$this->load->view('admin/Menuadmin');
		$this->load->view('admin/stokopname/InputStokOpname',$data);
	}	
	
	
public function cariautobahanbaku()
	{
		// tangkap variabel keyword dari URL
		$keyword = $this->uri->segment(3);

		// cari di database
		$data = $this->Model_Stokopname->getdataautocomplete($keyword);	

		// format keluaran di dalam array
		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'	=>'[ '.$row->Kode_Bahan_Baku.' ]'.' - '.$row->Nama_Barang,
				'Kode_Bahan_Baku' =>$row->Kode_Bahan_Baku,
				'Nama_Barang' =>$row->Nama_Barang,
				'Name_Lv1' =>$row->Name_Lv1,
				'Name_Lv2' =>$row->Name_Lv2,
				'Name_Lv3' =>$row->Name_Lv3,
				'Name_Lv4' =>$row->Name_Lv4,
				//'Name_Lv5' =>$row->Name_Lv5,
				
				'Lv2' =>$row->Lv2,
				'Lv3' =>$row->Lv3,
				'Lv4' =>$row->Lv4,
				
				'Lv1' =>$row->Lv1,
				'Isi_Lv2' =>$row->Isi_Lv2,
				'Isi_Lv3' =>$row->Isi_Lv3,
				'Isi_Lv4' =>$row->Isi_Lv4,
				//'Lv5' =>$row->Lv5,
				//'Type_Barang' =>$row->Type_Barang,
				//'Nama_Satuan' =>$row->Nama_Satuan,
				//'Harga_Beli'=>$row->Harga_Beli,
				//'Satuan'=>$row->Satuan,
			);
		}
		// minimal PHP 5.2
		echo json_encode($arr);
	}	
public	function simpanheader() 
	{	
		$id = $this->uri->segment(3);
		$this->Model_Stokopname->simpanheaderstokopname($id);
		$this->Model_Stokopname->delbantu($id);
		
		redirect('Stokopname/index');
	}
public	function hapusstokopname() 
	{	
		$id = $this->uri->segment(3);
		$this->Model_Stokopname->delstokopname($id);
		$this->Model_Stokopname->delstokopnamedetail($id);
		
		redirect('Stokopname/index');
	}	
public	function caristokopname() 
	{
    $data['datatable']=$this->Model_Stokopname->searchingdatastokopname();
        if($data['datatable']==null){		
	redirect(base_url("Stokopname/index"));
    }
		else {
	
	 $data['ent'] = $this->Model_Stokopname->entries();
	 
	$baris = $this->Model_Stokopname->getrowstokopname();
	$limit=$baris;
	$data['totbaris'] = $limit;
	
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/stokopname/V_Stokopname',$data);
		}

	}
public	function cetakreport() 
	{
		$id = $this->uri->segment(3);
		$data["header"] = $this->Model_Stokopname->listdatastokopnameheader($id);
		$data["detail"] = $this->Model_Stokopname->listdatastokopnamedetail($id);
		$data["toko"] = $this->Model_Stokopname->datatoko();
		
		//////////////////////////////////////////////////////////////////////////////////
		$print ="";
		
		$data["barang"] = $this->Model_Stokopname->listdatastokopnamedetailgroup($id);
		
		$i = 1;
		foreach($data["barang"] as $dtbrng){
			
			$print = $print .'
					<tr style="border:1px solid #000;">
					<td align="center" style="border:1px solid #000;"><center>'.$i++.'<center></td>
					<td style="padding-left:10px;border:1px solid #000;">'.$dtbrng->Kode_Bahan_Baku.'</td>
					<td align="center" style="border:1px solid #000;">'.$dtbrng->Nama_Barang.'</td>';
					
					
						
					$kdbhnbku = $dtbrng->Kode_Bahan_Baku;
					
					$data["coba"] = $this->Model_Stokopname->listdatastokopnamedetailbarang($kdbhnbku,$id);
					if(!empty($data['coba'])){
						
						$print = $print.'
						<td align="center" style="border:1px solid #000;"><table>';
						
						foreach($data['coba'] as $dd){
							$print = $print .'
								<tr><td style="padding-left:10px;">'.$dd->Stok ." ".$dd->Nama_Satuan.'</td></tr>
								';
						}
						
						$print = $print.'
						</td></table>';
						
						/////////////////////////////////////////////////////////////////
						$print = $print.'
						<td align="center" style="border:1px solid #000;"><table>';
						
						foreach($data['coba'] as $dd){
							$print = $print .'
								<tr><td style="padding-left:10px;">'.$dd->Stok_Nyata." ".$dd->Nama_Satuan.'</td></tr>
								';
						}
						
						$print = $print.'
						</td></table>';
						
						/////////////////////////////////////////////////////////////////
						$print = $print.'
						<td align="center" style="border:1px solid #000;"><table>';
						
						foreach($data['coba'] as $dd){
							$print = $print .'
								<tr><td style="padding-left:10px;">'.$dd->Stok_Selisih ." ".$dd->Nama_Satuan.'</td></tr>
								';
						}
						
						$print = $print.'
						</td></table>';
						
						/////////////////////////////////////////////////////////////////
						$print = $print.'
						<td align="center" style="border:1px solid #000;"><center><table>';
						
						foreach($data['coba'] as $dd){
							$print = $print .'
								<tr><td align="center">'.$dd->Keterangan.'</td></tr>
								';
						}
						
						$print = $print.'
						</td></center></table>';
						
					}
					
					
					else{
						$print = $print.'
						<td><table>';
						
						$print = $print .'
						<td></td>';
					
						$print = $print.'
						</td></table>';
						
						///////////////////////////
						$print = $print.'
						<td><table>';
						
						$print = $print .'
						<td></td>';
					
						$print = $print.'
						</td></table>';
						
						///////////////////////////
						$print = $print.'
						<td><table>';
						
						$print = $print .'
						<td></td>';
					
						$print = $print.'
						</td></table>';
						
						///////////////////////////
						$print = $print.'
						<td><table>';
						
						$print = $print .'
						<td></td>';
					
						$print = $print.'
						</td></table>';
					}
		}
		
		$data["detailnormalisasi"] = $print;
		$this->load->view('admin/Menuadmin');
		$this->load->view('admin/stokopname/Lihatcetakstokopname',$data);
	}
public	function cetakreportexcel() 
	{
		$id = $this->uri->segment(3);
		$data["header"] = $this->Model_Stokopname->listdatastokopnameheader($id);
		$data["detail"] = $this->Model_Stokopname->listdatastokopnamedetail($id);
		$data["toko"] = $this->Model_Stokopname->datatoko();
		
		//////////////////////////////////////////////////////////////////////////////////
		$print ="";
		
		$data["barang"] = $this->Model_Stokopname->listdatastokopnamedetailgroup($id);
		
		$i = 1;
		foreach($data["barang"] as $dtbrng){
			
			$print = $print .'
					<tr style="border:1px solid #000;">
					<td align="center" style="border:1px solid #000;"><center>'.$i++.'<center></td>
					<td style="padding-left:10px;border:1px solid #000;">'.$dtbrng->Kode_Bahan_Baku.'</td>
					<td align="center" style="border:1px solid #000;">'.$dtbrng->Nama_Barang.'</td>';
					
					
						
					$kdbhnbku = $dtbrng->Kode_Bahan_Baku;
					
					$data["coba"] = $this->Model_Stokopname->listdatastokopnamedetailbarang($kdbhnbku,$id);
					if(!empty($data['coba'])){
						
						$print = $print.'
						<td align="center" style="border:1px solid #000;"><table>';
						
						foreach($data['coba'] as $dd){
							$print = $print .'
								<tr><td style="padding-left:10px;">'.$dd->Stok ." ".$dd->Nama_Satuan.'</td></tr>
								';
						}
						
						$print = $print.'
						</td></table>';
						
						/////////////////////////////////////////////////////////////////
						$print = $print.'
						<td align="center" style="border:1px solid #000;"><table>';
						
						foreach($data['coba'] as $dd){
							$print = $print .'
								<tr><td style="padding-left:10px;">'.$dd->Stok_Nyata." ".$dd->Nama_Satuan.'</td></tr>
								';
						}
						
						$print = $print.'
						</td></table>';
						
						/////////////////////////////////////////////////////////////////
						$print = $print.'
						<td align="center" style="border:1px solid #000;"><table>';
						
						foreach($data['coba'] as $dd){
							$print = $print .'
								<tr><td style="padding-left:10px;">'.$dd->Stok_Selisih ." ".$dd->Nama_Satuan.'</td></tr>
								';
						}
						
						$print = $print.'
						</td></table>';
						
						/////////////////////////////////////////////////////////////////
						$print = $print.'
						<td align="center" style="border:1px solid #000;"><center><table>';
						
						foreach($data['coba'] as $dd){
							$print = $print .'
								<tr><td align="center">'.$dd->Keterangan.'</td></tr>
								';
						}
						
						$print = $print.'
						</td></center></table>';
						
					}
					
					
					else{
						$print = $print.'
						<td><table>';
						
						$print = $print .'
						<td></td>';
					
						$print = $print.'
						</td></table>';
						
						///////////////////////////
						$print = $print.'
						<td><table>';
						
						$print = $print .'
						<td></td>';
					
						$print = $print.'
						</td></table>';
						
						///////////////////////////
						$print = $print.'
						<td><table>';
						
						$print = $print .'
						<td></td>';
					
						$print = $print.'
						</td></table>';
						
						///////////////////////////
						$print = $print.'
						<td><table>';
						
						$print = $print .'
						<td></td>';
					
						$print = $print.'
						</td></table>';
					}
		}
		
		$data["detailnormalisasi"] = $print;
		
		$this->load->view('admin/stokopname/CetakExcelStokopname',$data);
	}
public	function normalisasi() 
	{
		$id = $this->uri->segment(3);
		$data["header"] = $this->Model_Stokopname->listdatastokopnameheader($id);
		$header = $this->Model_Stokopname->listdatastokopnameheader($id);
		$data["detail"] = $this->Model_Stokopname->listdatastokopnamedetail($id);
		$data["countnormalisasi"] = $this->Model_Stokopname->countnormalisasibelum($id);
		
		//////////////////////////////////////////////////////////////////////////////////
		$print ="";
		
		$data["barang"] = $this->Model_Stokopname->listdatastokopnamedetailgroup($id);
		
		$i = 1;
		foreach($data["barang"] as $dtbrng){
			
			$print = $print .'
					<tr>
					<td><center>'.$i++.'<center></td>
					<td>'.$dtbrng->Kode_Bahan_Baku.'</td>
					<td><center>'.$dtbrng->Nama_Barang.'</center></td>';
					
					
						
					$kdbhnbku = $dtbrng->Kode_Bahan_Baku;
					
					$data["coba"] = $this->Model_Stokopname->listdatastokopnamedetailbarang($kdbhnbku,$id);
					if(!empty($data['coba'])){
						
						$print = $print.'
						<td><table>';
						
						foreach($data['coba'] as $dd){
							$print = $print .'
								<tr><td>'.$dd->Stok ." ".$dd->Nama_Satuan.'</td></tr>
								';
						}
						
						$print = $print.'
						</td></table>';
						
						/////////////////////////////////////////////////////////////////
						$print = $print.'
						<td><table>';
						
						foreach($data['coba'] as $dd){
							$print = $print .'
								<tr><td>'.$dd->Stok_Nyata." ".$dd->Nama_Satuan.'</td></tr>
								';
						}
						
						$print = $print.'
						</td></table>';
						
						/////////////////////////////////////////////////////////////////
						$print = $print.'
						<td><table>';
						
						foreach($data['coba'] as $dd){
							$print = $print .'
								<tr><td>'.$dd->Stok_Selisih ." ".$dd->Nama_Satuan.'</td></tr>
								';
						}
						
						$print = $print.'
						</td></table>';
						
						/////////////////////////////////////////////////////////////////
						$print = $print.'
						<td><center><table>';
						
						foreach($data['coba'] as $dd){
							$print = $print .'
								<tr><td>'.$dd->Keterangan.'</td></tr>
								';
						}
						
						$print = $print.'
						</td></center></table>';
						
						/////////////////////////////////////////////////////////////////
						$print = $print.'
						<td><center><table>';
						
						foreach($data['coba'] as $dd){
							$normal = $dd->Normalisasi;
								if($normal == "Belum"){
									
							$print = $print .'
								<tr><td>'.
									'<center><a href="'.base_url().'/Stokopname/normalisasidetail/'.$dd->Id_Detail.'/'.$header["Id_Stokopname"].'" style="margin-top:-9px;" title="Normalisasi Bahan Baku" class="btn btn-primary btn btn-sm"><b>Normalisasi</b></a><center>';
								
								'</td></tr>
								';
								
								}else{
									$print = $print .'
								<tr><td>'.
									'<center><span style="margin-top:-9px;" title="Normalisasi Finish" class="btn btn-primary btn btn-sm"><b>Finish</b></span></center>';
								'</td></tr>
								';
									
								}
								
						}
						
						$print = $print.'
						</td></center></table>';

						
					}
					
					
					else{
						$print = $print.'
						<td><table>';
						
						$print = $print .'
						<td></td>';
					
						$print = $print.'
						</td></table>';
						
						///////////////////////////
						$print = $print.'
						<td><table>';
						
						$print = $print .'
						<td></td>';
					
						$print = $print.'
						</td></table>';
						
						///////////////////////////
						$print = $print.'
						<td><table>';
						
						$print = $print .'
						<td></td>';
					
						$print = $print.'
						</td></table>';
						
						///////////////////////////
						$print = $print.'
						<td><table>';
						
						$print = $print .'
						<td></td>';
					
						$print = $print.'
						</td></table>';
					}
		}
		//////////////////////////////////////////////////////////
		$data["detailnormalisasi"] = $print;
		$this->load->view('admin/Menuadmin');
		$this->load->view('admin/stokopname/Normalisasi',$data);
	}
public	function updatenormalisasiheader() 
	{
		$id = $this->uri->segment(3);
		$this->Model_Stokopname->updateheaderfinish($id);
		redirect("Stokopname");
	}
public	function normalisasidetail() 
	{
		$iddetail = $this->uri->segment(3);
		$idso = $this->uri->segment(4);
		
		$datadetail = $this->Model_Stokopname->datadetailnormalisasi($iddetail);
		$kdbhnbku = $datadetail["Kode_Bahan_Baku"];
		$stk = $datadetail["Stok_Nyata"];
		$lv = $datadetail["Level"];
		
		if($lv == "Lv1"){
			$this->Model_Stokopname->updatebahanbakulv1($kdbhnbku,$stk);
			$this->Model_Stokopname->updatefinishdetail($iddetail);
			
			redirect("Stokopname/normalisasi/".$idso);
		}else if($lv == "Lv2"){
			$this->Model_Stokopname->updatebahanbakulv2($kdbhnbku,$stk);
			$this->Model_Stokopname->updatefinishdetail($iddetail);
			
			redirect("Stokopname/normalisasi/".$idso);
		}else if($lv == "Lv3"){
			$this->Model_Stokopname->updatebahanbakulv3($kdbhnbku,$stk);
			$this->Model_Stokopname->updatefinishdetail($iddetail);
			
			redirect("Stokopname/normalisasi/".$idso);
		}else if($lv == "Lv4"){
			$this->Model_Stokopname->updatebahanbakulv4($kdbhnbku,$stk);
			$this->Model_Stokopname->updatefinishdetail($iddetail);
			
			redirect("Stokopname/normalisasi/".$idso);
		}
	}
///////////////////////////////////////////////

	
}