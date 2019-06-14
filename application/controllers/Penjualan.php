<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

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
		$this->load->model('Model_Penjualan');
		
		//$this->load->library('Excel_generator');
	}

public	function index($offset = 0) 
	{
		
	//----- setting pagination  --------------------

		$datasesi['sesi'] = $this->session->userdata('admin/penjualan/V_Penjualan');
		
		if( $datasesi['sesi']['batas'] == 0){
			$usersetting['batas'] = 0;
			$this->session->set_userdata('admin/penjualan/V_Penjualan',$usersetting);
		}

		$baris = $this->Model_Penjualan->getrowheaderpenjualan();
		
		$settingpage = 0;
		if(!empty($satu = 20)){
			$limit = $satu;
			
			$usersetting['batas'] = $limit;
			$this->session->set_userdata('admin/penjualan/V_Penjualan',$usersetting);
		}
		else if( $datasesi['sesi']['batas'] != 0){
			$limit = $datasesi['sesi']['batas'];
		}
		else{
			$limit = $baris;
		}
		
		
		if(!is_null($offset)){
		$config['uri_segment'] = 3;
		$config['base_url'] = base_url().'Penjualan/index/';
		
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
	
	
    $data['datatable']=$this->Model_Penjualan->listdatapenjualan($limit,$offset);
		///////////////////////////////	
	 $data['ent'] = $this->Model_Penjualan->entries();
	 $data['totbaris'] = $limit;
	 /////////////////////////////////////
	 
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/penjualan/V_Penjualan',$data);
		}
	}
	
public	function index2($offset = 0) 
	{
		
	//----- setting pagination  --------------------

		$datasesi['sesi'] = $this->session->userdata('admin/penjualan/V_Penjualan');
		
		if( $datasesi['sesi']['batas'] == 0){
			$usersetting['batas'] = 0;
			$this->session->set_userdata('admin/penjualan/V_Penjualan',$usersetting);
		}

		$baris = $this->Model_Penjualan->getrowheaderpenjualan();
		
		$settingpage = 0;
		if(!empty($this->input->post('batas'))){
			$limit = $this->input->post('batas');
			
			$usersetting['batas'] = $limit;
			$this->session->set_userdata('admin/penjualan/V_Penjualan',$usersetting);
		}
		else if( $datasesi['sesi']['batas'] != 0){
			$limit = $datasesi['sesi']['batas'];
		}
		else{
			$limit = $baris;
		}
		
		
		if(!is_null($offset)){
		$config['uri_segment'] = 3;
		$config['base_url'] = base_url().'Penjualan/index2/';
		
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
	
	
    $data['datatable']=$this->Model_Penjualan->listdatapenjualan($limit,$offset);
		///////////////////////////////	
	 $data['ent'] = $this->Model_Penjualan->entries();
	 $data['totbaris'] = $limit;
	 /////////////////////////////////////
	 
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/penjualan/V_Penjualan',$data);
		}
	}
	
public function inputpembelian(){
	//mengecek nama validation
	$this->form_validation->set_rules('Nama_Barang','Nama_Barang','required');
	
	if($this->form_validation->run() == TRUE)
	{
		
		//$id = $this->uri->segment(3); 
//$blibhnbku = $this->Model_Pembelian->bhnbakutbbantupembelian($id);
	$qty = $this->input->post("Qty");
	$level = $this->input->post("Level");
	$kdbhnbaku = $this->input->post("Kode_Bahan_Baku");

$bhnbku = $this->Model_Penjualan->databahanbaku($kdbhnbaku);
	$lv1 = $bhnbku["Lv1"];
	$lv2 = $bhnbku["Lv2"];
	$lv3 = $bhnbku["Lv3"];
	$lv4 = $bhnbku["Lv4"];
	//$lv5 = $bhnbku["Lv5"];
		
	$isilv1 = $bhnbku["Lv1"];
	$isilv2 = $bhnbku["Isi_Lv2"];
	$isilv3 = $bhnbku["Isi_Lv3"];
	$isilv4 = $bhnbku["Isi_Lv4"];
	//$isilv5 = $bhnbku["Isi_Lv5"];

//// Lv1 ////
		if($level == "Lv1"){
			if($isilv1 == "0"){
				redirect("Penjualan/inputpembelian");
			}else if ($qty > $isilv1){
				redirect("Penjualan/inputpembelian");
			}else if ($isilv1 > "0"){
				$hapuslv1 = $isilv1 - $qty;
				$this->Model_Penjualan->hapuslv1($kdbhnbaku,$hapuslv1);
				$this->Model_Penjualan->simpantbpenjualanbantu();
				$this->Model_Penjualan->simpantbpenjualandetail();
				redirect("Penjualan/inputpembelian");
			}
			
		}
//// Lv2 ////
		if($level == "Lv2"){
		if($qty > $lv2){
			redirect("Penjualan/inputpembelian");	
		}else{
			
		
			if($isilv1 == "0"){
				redirect("Penjualan/inputpembelian");
			}else if($qty > $isilv2){
				$tambahlv2hapus = $qty + $isilv2;
				if($tambahlv2hapus > $lv2){
					if($isilv1 == "0"){
						redirect("Penjualan/inputpembelian");
					}else if($isilv1 > "0"){
						$sisalv1 = $isilv1 - 1;
						$hasillv2 = $lv2 - ($tambahlv2hapus - $lv2);
					} 
				}else if($tambahlv2hapus < $lv2){
					if($isilv1 == "0"){
						redirect("Penjualan/inputpembelian");
					}else if($isilv1 > "0"){
						$sisalv1 = $isilv1 - 1;
						$hasillv2 =  $lv2 - ($lv2 - $tambahlv2hapus);
					}
				}else if($tambahlv2hapus == $lv2){
					if($isilv1 == "0"){
						redirect("Penjualan/inputpembelian");
					}else if($isilv1 > "0"){
						$sisalv1 = $isilv1 - 1;
						$hasillv2 =  $lv2 + $isilv2 - $qty;
					}
				}
				
				$this->Model_Penjualan->hapuslv2lebihdari($kdbhnbaku,$sisalv1,$hasillv2);
				$this->Model_Penjualan->simpantbpenjualanbantu();
				$this->Model_Penjualan->simpantbpenjualandetail();
				redirect("Penjualan/inputpembelian");
			}else if($qty < $isilv2){
				if($isilv1 == "0"){
					redirect("Penjualan/inputpembelian");
				}else if($isilv1 > "0"){
					$sisalv1kurangdari = $isilv1;
					$hasillv2kurangdari =  $isilv2 - $qty;
				}
				
				$this->Model_Penjualan->hapuslv2kurangdari($kdbhnbaku,$sisalv1kurangdari,$hasillv2kurangdari);
				$this->Model_Penjualan->simpantbpenjualanbantu();
				$this->Model_Penjualan->simpantbpenjualandetail();
				redirect("Penjualan/inputpembelian");
			}else if($qty == $isilv2){
				if($isilv1 == "0"){
					redirect("Penjualan/inputpembelian");
				}else if($isilv1 > "0"){
					$sisalv1samadengan = $isilv1;
					$hasillv2samadengan =  $isilv2 - $qty;
				}
				
				$this->Model_Penjualan->hapuslv2samadengan($kdbhnbaku,$sisalv1samadengan,$hasillv2samadengan);
				$this->Model_Penjualan->simpantbpenjualanbantu();
				$this->Model_Penjualan->simpantbpenjualandetail();
				redirect("Penjualan/inputpembelian");
			}
		}
	}	
//// Lv3 ////
		if($level == "Lv3"){
		if($qty > $lv3){
			redirect("Penjualan/inputpembelian");	
		}else{
			if($isilv1 == "0"){
				redirect("Penjualan/inputpembelian");
			}else if($qty > $isilv3){
				$tambahlv3hapus = $isilv3 + $qty;
				
				if($tambahlv3hapus > $lv3){
					if($isilv1 == "0"){
					redirect("Penjualan/inputpembelian");
					}else if($isilv1 > "0"){
						if($isilv2 > "0"){
							$hasillv1lebihdari = $isilv1;
							$hasillv2lebihdari = $isilv2 - 1;
							$hasillv3lebihdari = $lv3 - ($tambahlv3hapus - $lv3);
						}else if($isilv2 == "0"){
							$hasillv1lebihdari = $isilv1 - 1;
							$hasillv2lebihdari = $lv2 - 1;
							$hasillv3lebihdari = $lv3 - ($tambahlv3hapus - $lv3);
						}
					}
				}else if($tambahlv3hapus < $lv3){
					if($isilv1 == "0"){
					redirect("Penjualan/inputpembelian");
					}else if($isilv1 > "0"){
						if($isilv2 > "0"){
							if($isilv3 > "0"){
								$hasillv1lebihdari = $isilv1;
								$hasillv2lebihdari = $isilv2 - 1;
								$hasillv3lebihdari = $lv3 - ($lv3 - $tambahlv3hapus);
							}else if($isilv3 == "0"){
								$hasillv1lebihdari = $isilv1;
								$hasillv2lebihdari = $isilv2 - 1;
								$hasillv3lebihdari = $lv3 - $qty;
							}
						}else if($isilv2 == "0"){
							if($isilv3 > "0"){
								$hasillv1lebihdari = $isilv1 - 1;
								$hasillv2lebihdari = $lv2 - 1;
								$hasillv3lebihdari = $lv3 - ($lv3 - $tambahlv3hapus);
							}else if($isilv3 == "0"){
								$hasillv1lebihdari = $isilv1 - 1;
								$hasillv2lebihdari = $lv2 - 1;
								$hasillv3lebihdari = $lv3 - $qty;
							}
							
						}
					}
				}else if($tambahlv3hapus == $lv3){
					if($isilv1 == "0"){
					redirect("Penjualan/inputpembelian");
					}else if($isilv1 > "0"){
						if($isilv2 > "0"){
							$hasillv1lebihdari = $isilv1;
							$hasillv2lebihdari = $isilv2 - 1;
							$hasillv3lebihdari = $lv3 + $isilv3 - $qty;
						}else if($isilv2 == "0"){
							$hasillv1lebihdari = $isilv1 - 1;
							$hasillv2lebihdari = $lv2 - 1;
							$hasillv3lebihdari = $lv3 + $isilv3 - $qty;
						}
					}
				}
				
				$this->Model_Penjualan->hapuslv3lebihdari($kdbhnbaku,$hasillv1lebihdari,$hasillv2lebihdari,$hasillv3lebihdari);
				$this->Model_Penjualan->simpantbpenjualanbantu();
				$this->Model_Penjualan->simpantbpenjualandetail();
				redirect("Penjualan/inputpembelian");
			}else if($qty < $isilv3){
				if($isilv1 == "0"){
					redirect("Penjualan/inputpembelian");
					}else if($isilv1 > "0"){
						$hasillv1kurangdariuntuk3 = $isilv1;
						$hasillv2kurangdariuntuk3 = $isilv2;
						$hasillv3kurangdariuntuk3 = $isilv3 - $qty;
					}
				$this->Model_Penjualan->hapuslv3kurangdari($kdbhnbaku,$hasillv1kurangdariuntuk3,$hasillv2kurangdariuntuk3,$hasillv3kurangdariuntuk3);
				$this->Model_Penjualan->simpantbpenjualanbantu();
				$this->Model_Penjualan->simpantbpenjualandetail();
				redirect("Penjualan/inputpembelian");
			}else if($qty == $isilv3){
				if($isilv1 == "0"){
					redirect("Penjualan/inputpembelian");
					}else if($isilv1 > "0"){
						$hasillv1samadenganuntuk3 = $isilv1;
						$hasillv2samadenganuntuk3 = $isilv2;
						$hasillv3samadenganuntuk3 = $isilv3 - $qty;
					}
				$this->Model_Penjualan->hapuslv3samadengan($kdbhnbaku,$hasillv1samadenganuntuk3,$hasillv2samadenganuntuk3,$hasillv3samadenganuntuk3);
				$this->Model_Penjualan->simpantbpenjualanbantu();
				$this->Model_Penjualan->simpantbpenjualandetail();
				redirect("Penjualan/inputpembelian");
			}
		}
	}
//// Lv4 ////
if($level == "Lv4"){
	if($qty > $lv4){
			redirect("Penjualan/inputpembelian");	
		}else{
			if($isilv1 == "0"){
				redirect("Penjualan/inputpembelian");
			}else if($qty > $isilv4){
				$tambahlv4hapus = $isilv4 + $qty;
				
				if($tambahlv4hapus > $lv4){
					if($isilv1 == "0"){
					redirect("Penjualan/inputpembelian");
					}else if($isilv1 > "0"){
						if($isilv2 > "0"){
							if($isilv3 > "0"){
								$lv1lebihdariuntuk4 = $isilv1;
								$lv2lebihdariuntuk4 = $isilv2;
								$lv3lebihdariuntuk4 = $isilv3 - 1;
								$lv4lebihdariuntuk4 = $lv4 - ($tambahlv4hapus - $lv4);
							}else if($isilv3 == "0"){
								$lv1lebihdariuntuk4 = $isilv1;
								$lv2lebihdariuntuk4 = $isilv2 - 1;
								$lv3lebihdariuntuk4 = $lv3 - 1;
								$lv4lebihdariuntuk4 = $lv4 - ($tambahlv4hapus - $lv4);
							}
						}else if($isilv2 == "0"){
							if($isilv3 > "0"){
								$lv1lebihdariuntuk4 = $isilv1;
								$lv2lebihdariuntuk4 = $isilv2;
								$lv3lebihdariuntuk4 = $isilv3 - 1;
								$lv4lebihdariuntuk4 = $lv4 - ($tambahlv4hapus - $lv4);
							}else if($isilv3 == "0"){
								$lv1lebihdariuntuk4 = $isilv1 - 1;
								$lv2lebihdariuntuk4 = $lv2 - 1;
								$lv3lebihdariuntuk4 = $lv3 - 1;
								$lv4lebihdariuntuk4 = $lv4 - ($tambahlv4hapus - $lv4);
							}
						}
					}
				}else if($tambahlv4hapus < $lv4){
					if($isilv1 == "0"){
					redirect("Penjualan/inputpembelian");
					}else if($isilv1 > "0"){
						if($isilv2 > "0"){
							if($isilv3 > "0"){
								if($isilv4 > "0"){
									$lv1lebihdariuntuk4 = $isilv1;
									$lv2lebihdariuntuk4 = $isilv2;
									$lv3lebihdariuntuk4 = $isilv3 - 1;
									$lv4lebihdariuntuk4 = $lv4 - ($lv4 - $tambahlv4hapus);
								}else if($isilv4 == "0"){
									$lv1lebihdariuntuk4 = $isilv1;
									$lv2lebihdariuntuk4 = $isilv2;
									$lv3lebihdariuntuk4 = $isilv3 - 1;
									$lv4lebihdariuntuk4 = $lv4 - $qty;
								}
								
							}else if($isilv3 == "0"){
								if($isilv4 > "0"){
									$lv1lebihdariuntuk4 = $isilv1;
									$lv2lebihdariuntuk4 = $isilv2 - 1;
									$lv3lebihdariuntuk4 = $lv3 - 1;
									$lv4lebihdariuntuk4 = $lv4 - ($lv4 - $tambahlv4hapus);
								}else if($isilv4 == "0"){
									$lv1lebihdariuntuk4 = $isilv1;
									$lv2lebihdariuntuk4 = $isilv2 - 1;
									$lv3lebihdariuntuk4 = $lv3 - 1;
									$lv4lebihdariuntuk4 = $lv4 - $qty;
								}
								
							}
						}else if($isilv2 == "0"){
							if($isilv3 > "0"){
								if($isilv4 > "0"){
									$lv1lebihdariuntuk4 = $isilv1;
									$lv2lebihdariuntuk4 = $isilv2;
									$lv3lebihdariuntuk4 = $isilv3 - 1;
									$lv4lebihdariuntuk4 = $lv4 - ($lv4 - $tambahlv4hapus);
								}else if($isilv4 == "0"){
									$lv1lebihdariuntuk4 = $isilv1;
									$lv2lebihdariuntuk4 = $isilv2;
									$lv3lebihdariuntuk4 = $isilv3 - 1;
									$lv4lebihdariuntuk4 = $lv4 - $qty;
								}
								
							}else if($isilv3 == "0"){
								if($isilv4 > "0"){
									$lv1lebihdariuntuk4 = $isilv1 - 1;
									$lv2lebihdariuntuk4 = $lv2 - 1;
									$lv3lebihdariuntuk4 = $lv3 - 1;
									$lv4lebihdariuntuk4 = $lv4 - ($lv4 - $tambahlv4hapus);
								}else if($isilv4 == "0"){
									$lv1lebihdariuntuk4 = $isilv1 - 1;
									$lv2lebihdariuntuk4 = $lv2 - 1;
									$lv3lebihdariuntuk4 = $lv3 - 1;
									$lv4lebihdariuntuk4 = $lv4 - $qty;
								}
								
							}
						}
					}
				}else if($tambahlv4hapus == $lv4){
					if($isilv1 == "0"){
					redirect("Penjualan/inputpembelian");
					}else if($isilv1 > "0"){
						if($isilv2 > "0"){
							if($isilv3 > "0"){
								$lv1lebihdariuntuk4 = $isilv1;
								$lv2lebihdariuntuk4 = $isilv2;
								$lv3lebihdariuntuk4 = $isilv3 - 1;
								$lv4lebihdariuntuk4 = $lv4 + $isilv4 - $qty;
							}else if($isilv3 == "0"){
								$lv1lebihdariuntuk4 = $isilv1;
								$lv2lebihdariuntuk4 = $isilv2 - 1;
								$lv3lebihdariuntuk4 = $isilv3 - 1;
								$lv4lebihdariuntuk4 = $lv4 + $isilv4 - $qty;
							}
						}else if($isilv2 == "0"){
							if($isilv3 > "0"){
								$lv1lebihdariuntuk4 = $isilv1;
								$lv2lebihdariuntuk4 = $isilv2;
								$lv3lebihdariuntuk4 = $isilv3 - 1;
								$lv4lebihdariuntuk4 = $lv4 + $isilv4 - $qty;
							}else if($isilv3 == "0"){
								$lv1lebihdariuntuk4 = $isilv1 - 1;
								$lv2lebihdariuntuk4 = $lv2 - 1;
								$lv3lebihdariuntuk4 = $lv3 - 1;
								$lv4lebihdariuntuk4 = $lv4 + $isilv4 - $qty;
							}
						}
					}
				}
				
				$this->Model_Penjualan->hapuslv4lebihdari($kdbhnbaku,$lv1lebihdariuntuk4,$lv2lebihdariuntuk4,$lv3lebihdariuntuk4,$lv4lebihdariuntuk4);
				$this->Model_Penjualan->simpantbpenjualanbantu();
				$this->Model_Penjualan->simpantbpenjualandetail();
				redirect("Penjualan/inputpembelian");
			}else if($qty < $isilv4){
				if($isilv1 == "0"){
					redirect("Penjualan/inputpembelian");
					}else if($isilv1 > "0"){
						$lv1kurangdariuntuk4 = $isilv1;
						$lv2kurangdariuntuk4 = $isilv2;
						$lv3kurangdariuntuk4 = $isilv2;
						$lv4kurangdariuntuk4 = $isilv4 - $qty;
					}
				$this->Model_Penjualan->hapuslv4kurangdari($kdbhnbaku,$lv1kurangdariuntuk4,$lv2kurangdariuntuk4,$lv3kurangdariuntuk4,$lv4kurangdariuntuk4);
				$this->Model_Penjualan->simpantbpenjualanbantu();
				$this->Model_Penjualan->simpantbpenjualandetail();
				redirect("Penjualan/inputpembelian");
			}else if($qty == $isilv4){
				if($isilv1 == "0"){
					redirect("Penjualan/inputpembelian");
					}else if($isilv1 > "0"){
						$lv1samadenganuntuk4 = $isilv1;
						$lv2samadenganuntuk4 = $isilv2;
						$lv3samadenganuntuk4 = $isilv3;
						$lv4samadenganuntuk4 = $isilv4 - $qty;
					}
				$this->Model_Penjualan->hapuslv4samadengan($kdbhnbaku,$lv1samadenganuntuk4,$lv2samadenganuntuk4,$lv3samadenganuntuk4,$lv4samadenganuntuk4);
				$this->Model_Penjualan->simpantbpenjualanbantu();
				$this->Model_Penjualan->simpantbpenjualandetail();
				redirect("Penjualan/inputpembelian");
			}
		}
	}		
	}
	
	$cari = $this->Model_Penjualan->nota();
		if($cari){
			$data['nota'] = $cari;
		}
	$cari2 = $this->Model_Penjualan->iddetailnota();
		if($cari2){
			$data['detnota'] = $cari2;
		}
	
	$cari4 = $this->Model_Penjualan->totalbeli();
		if($cari4){
			$data['tot'] = $cari4;
		}
		
	
	$data ['datatable']= $this->Model_Penjualan->listdatadetailjual();
	$data['barcode'] = "";
		$this->load->view('admin/Menuadmin');
		$this->load->view('admin/penjualan/Inputpenjualan',$data);
	}
	
public function scanbarcode(){
	//mengecek nama validation
	$this->form_validation->set_rules('Kode_Bahan_Baku','Kode_Bahan_Baku','required');
	
	if($this->form_validation->run() == TRUE)
	{
		$codescan = $this->input->post("Kode_Bahan_Baku");
		$dtscan = $this->Model_Penjualan->datascanbarang($codescan);
		$kdbhnbaku = $dtscan["Kode_Bahan_Baku"];
		
		$datajual = $this->Model_Penjualan->ambildatajual($kdbhnbaku,$codescan);
		//////////
		
	$qty = $dtscan["Isi"];
	$level = $dtscan["Level"];
	$nmsatuan = $dtscan["Nama_Satuan"];
	$nmbarang = $dtscan["Nama_Barang"];
	$hrgjual = $dtscan["Harga_Jual"];
	

$bhnbku = $this->Model_Penjualan->databahanbaku($kdbhnbaku);
	$lv1 = $bhnbku["Lv1"];
	$lv2 = $bhnbku["Lv2"];
	$lv3 = $bhnbku["Lv3"];
	$lv4 = $bhnbku["Lv4"];
	//$lv5 = $bhnbku["Lv5"];
		
	$isilv1 = $bhnbku["Lv1"];
	$isilv2 = $bhnbku["Isi_Lv2"];
	$isilv3 = $bhnbku["Isi_Lv3"];
	$isilv4 = $bhnbku["Isi_Lv4"];
	//$isilv5 = $bhnbku["Isi_Lv5"];

//// Lv1 ////
		if($level == "Lv1"){
			if($isilv1 == "0"){
				redirect("Penjualan/scanbarcode/".$kdbhnbaku."/".$codescan);
			}else if ($qty > $isilv1){
				redirect("Penjualan/scanbarcode/".$kdbhnbaku."/".$codescan);
			}else if ($isilv1 > "0"){
				$hapuslv1 = $isilv1 - $qty;
				$this->Model_Penjualan->hapuslv1($kdbhnbaku,$hapuslv1);
				$this->Model_Penjualan->simpantbpenjualanbantuscan($nmbarang,$nmsatuan,$level,$hrgjual,$kdbhnbaku);
				$this->Model_Penjualan->simpantbpenjualandetailscan($nmbarang,$nmsatuan,$level,$hrgjual,$kdbhnbaku);
				redirect("Penjualan/scanbarcode/".$kdbhnbaku."/".$codescan);
			}
			
		}
//// Lv2 ////
		if($level == "Lv2"){
		if($qty > $lv2){
			redirect("Penjualan/scanbarcode/".$kdbhnbaku."/".$codescan);
		}else{
			
		
			if($isilv1 == "0"){
				redirect("Penjualan/scanbarcode/".$kdbhnbaku."/".$codescan);
			}else if($qty > $isilv2){
				$tambahlv2hapus = $qty + $isilv2;
				if($tambahlv2hapus > $lv2){
					if($isilv1 == "0"){
						redirect("Penjualan/scanbarcode/".$kdbhnbaku."/".$codescan);
					}else if($isilv1 > "0"){
						$sisalv1 = $isilv1 - 1;
						$hasillv2 = $lv2 - ($tambahlv2hapus - $lv2);
					} 
				}else if($tambahlv2hapus < $lv2){
					if($isilv1 == "0"){
						redirect("Penjualan/scanbarcode/".$kdbhnbaku."/".$codescan);
					}else if($isilv1 > "0"){
						$sisalv1 = $isilv1 - 1;
						$hasillv2 =  $lv2 - ($lv2 - $tambahlv2hapus);
					}
				}else if($tambahlv2hapus == $lv2){
					if($isilv1 == "0"){
						redirect("Penjualan/scanbarcode/".$kdbhnbaku."/".$codescan);
					}else if($isilv1 > "0"){
						$sisalv1 = $isilv1 - 1;
						$hasillv2 =  $lv2 + $isilv2 - $qty;
					}
				}
				
				$this->Model_Penjualan->hapuslv2lebihdari($kdbhnbaku,$sisalv1,$hasillv2);
				$this->Model_Penjualan->simpantbpenjualanbantuscan($nmbarang,$nmsatuan,$level,$hrgjual,$kdbhnbaku);
				$this->Model_Penjualan->simpantbpenjualandetailscan($nmbarang,$nmsatuan,$level,$hrgjual,$kdbhnbaku);
				redirect("Penjualan/scanbarcode/".$kdbhnbaku."/".$codescan);
			}else if($qty < $isilv2){
				if($isilv1 == "0"){
					redirect("Penjualan/scanbarcode/".$kdbhnbaku."/".$codescan);
				}else if($isilv1 > "0"){
					$sisalv1kurangdari = $isilv1;
					$hasillv2kurangdari =  $isilv2 - $qty;
				}
				
				$this->Model_Penjualan->hapuslv2kurangdari($kdbhnbaku,$sisalv1kurangdari,$hasillv2kurangdari);
				$this->Model_Penjualan->simpantbpenjualanbantuscan($nmbarang,$nmsatuan,$level,$hrgjual,$kdbhnbaku);
				$this->Model_Penjualan->simpantbpenjualandetailscan($nmbarang,$nmsatuan,$level,$hrgjual,$kdbhnbaku);
				redirect("Penjualan/scanbarcode/".$kdbhnbaku."/".$codescan);
			}else if($qty == $isilv2){
				if($isilv1 == "0"){
					redirect("Penjualan/scanbarcode/".$kdbhnbaku."/".$codescan);
				}else if($isilv1 > "0"){
					$sisalv1samadengan = $isilv1;
					$hasillv2samadengan =  $isilv2 - $qty;
				}
				
				$this->Model_Penjualan->hapuslv2samadengan($kdbhnbaku,$sisalv1samadengan,$hasillv2samadengan);
				$this->Model_Penjualan->simpantbpenjualanbantuscan($nmbarang,$nmsatuan,$level,$hrgjual,$kdbhnbaku);
				$this->Model_Penjualan->simpantbpenjualandetailscan($nmbarang,$nmsatuan,$level,$hrgjual,$kdbhnbaku);
				redirect("Penjualan/scanbarcode/".$kdbhnbaku."/".$codescan);
			}
		}
	}	
//// Lv3 ////
		if($level == "Lv3"){
		if($qty > $lv3){
			redirect("Penjualan/scanbarcode/".$kdbhnbaku."/".$codescan);
		}else{
			if($isilv1 == "0"){
				redirect("Penjualan/scanbarcode/".$kdbhnbaku."/".$codescan);
			}else if($qty > $isilv3){
				$tambahlv3hapus = $isilv3 + $qty;
				
				if($tambahlv3hapus > $lv3){
					if($isilv1 == "0"){
					redirect("Penjualan/scanbarcode/".$kdbhnbaku."/".$codescan);
					}else if($isilv1 > "0"){
						if($isilv2 > "0"){
							$hasillv1lebihdari = $isilv1;
							$hasillv2lebihdari = $isilv2 - 1;
							$hasillv3lebihdari = $lv3 - ($tambahlv3hapus - $lv3);
						}else if($isilv2 == "0"){
							$hasillv1lebihdari = $isilv1 - 1;
							$hasillv2lebihdari = $lv2 - 1;
							$hasillv3lebihdari = $lv3 - ($tambahlv3hapus - $lv3);
						}
					}
				}else if($tambahlv3hapus < $lv3){
					if($isilv1 == "0"){
					redirect("Penjualan/scanbarcode/".$kdbhnbaku."/".$codescan);
					}else if($isilv1 > "0"){
						if($isilv2 > "0"){
							if($isilv3 > "0"){
								$hasillv1lebihdari = $isilv1;
								$hasillv2lebihdari = $isilv2 - 1;
								$hasillv3lebihdari = $lv3 - ($lv3 - $tambahlv3hapus);
							}else if($isilv3 == "0"){
								$hasillv1lebihdari = $isilv1;
								$hasillv2lebihdari = $isilv2 - 1;
								$hasillv3lebihdari = $lv3 - $qty;
							}
						}else if($isilv2 == "0"){
							if($isilv3 > "0"){
								$hasillv1lebihdari = $isilv1 - 1;
								$hasillv2lebihdari = $lv2 - 1;
								$hasillv3lebihdari = $lv3 - ($lv3 - $tambahlv3hapus);
							}else if($isilv3 == "0"){
								$hasillv1lebihdari = $isilv1 - 1;
								$hasillv2lebihdari = $lv2 - 1;
								$hasillv3lebihdari = $lv3 - $qty;
							}
							
						}
					}
				}else if($tambahlv3hapus == $lv3){
					if($isilv1 == "0"){
					redirect("Penjualan/scanbarcode/".$kdbhnbaku."/".$codescan);
					}else if($isilv1 > "0"){
						if($isilv2 > "0"){
							$hasillv1lebihdari = $isilv1;
							$hasillv2lebihdari = $isilv2 - 1;
							$hasillv3lebihdari = $lv3 + $isilv3 - $qty;
						}else if($isilv2 == "0"){
							$hasillv1lebihdari = $isilv1 - 1;
							$hasillv2lebihdari = $lv2 - 1;
							$hasillv3lebihdari = $lv3 + $isilv3 - $qty;
						}
					}
				}
				
				$this->Model_Penjualan->hapuslv3lebihdari($kdbhnbaku,$hasillv1lebihdari,$hasillv2lebihdari,$hasillv3lebihdari);
				$this->Model_Penjualan->simpantbpenjualanbantuscan($nmbarang,$nmsatuan,$level,$hrgjual,$kdbhnbaku);
				$this->Model_Penjualan->simpantbpenjualandetailscan($nmbarang,$nmsatuan,$level,$hrgjual,$kdbhnbaku);
				redirect("Penjualan/scanbarcode/".$kdbhnbaku."/".$codescan);
			}else if($qty < $isilv3){
				if($isilv1 == "0"){
					redirect("Penjualan/scanbarcode/".$kdbhnbaku."/".$codescan);
					}else if($isilv1 > "0"){
						$hasillv1kurangdariuntuk3 = $isilv1;
						$hasillv2kurangdariuntuk3 = $isilv2;
						$hasillv3kurangdariuntuk3 = $isilv3 - $qty;
					}
				$this->Model_Penjualan->hapuslv3kurangdari($kdbhnbaku,$hasillv1kurangdariuntuk3,$hasillv2kurangdariuntuk3,$hasillv3kurangdariuntuk3);
				$this->Model_Penjualan->simpantbpenjualanbantuscan($nmbarang,$nmsatuan,$level,$hrgjual,$kdbhnbaku);
				$this->Model_Penjualan->simpantbpenjualandetailscan($nmbarang,$nmsatuan,$level,$hrgjual,$kdbhnbaku);
				redirect("Penjualan/scanbarcode/".$kdbhnbaku."/".$codescan);
			}else if($qty == $isilv3){
				if($isilv1 == "0"){
					redirect("Penjualan/scanbarcode/".$kdbhnbaku."/".$codescan);
					}else if($isilv1 > "0"){
						$hasillv1samadenganuntuk3 = $isilv1;
						$hasillv2samadenganuntuk3 = $isilv2;
						$hasillv3samadenganuntuk3 = $isilv3 - $qty;
					}
				$this->Model_Penjualan->hapuslv3samadengan($kdbhnbaku,$hasillv1samadenganuntuk3,$hasillv2samadenganuntuk3,$hasillv3samadenganuntuk3);
				$this->Model_Penjualan->simpantbpenjualanbantuscan($nmbarang,$nmsatuan,$level,$hrgjual,$kdbhnbaku);
				$this->Model_Penjualan->simpantbpenjualandetailscan($nmbarang,$nmsatuan,$level,$hrgjual,$kdbhnbaku);
				redirect("Penjualan/scanbarcode/".$kdbhnbaku."/".$codescan);
			}
		}
	}
//// Lv4 ////
if($level == "Lv4"){
	if($qty > $lv4){
			redirect("Penjualan/scanbarcode/".$kdbhnbaku."/".$codescan);
		}else{
			if($isilv1 == "0"){
				redirect("Penjualan/scanbarcode/".$kdbhnbaku."/".$codescan);
			}else if($qty > $isilv4){
				$tambahlv4hapus = $isilv4 + $qty;
				
				if($tambahlv4hapus > $lv4){
					if($isilv1 == "0"){
					redirect("Penjualan/scanbarcode/".$kdbhnbaku."/".$codescan);
					}else if($isilv1 > "0"){
						if($isilv2 > "0"){
							if($isilv3 > "0"){
								$lv1lebihdariuntuk4 = $isilv1;
								$lv2lebihdariuntuk4 = $isilv2;
								$lv3lebihdariuntuk4 = $isilv3 - 1;
								$lv4lebihdariuntuk4 = $lv4 - ($tambahlv4hapus - $lv4);
							}else if($isilv3 == "0"){
								$lv1lebihdariuntuk4 = $isilv1;
								$lv2lebihdariuntuk4 = $isilv2 - 1;
								$lv3lebihdariuntuk4 = $lv3 - 1;
								$lv4lebihdariuntuk4 = $lv4 - ($tambahlv4hapus - $lv4);
							}
						}else if($isilv2 == "0"){
							if($isilv3 > "0"){
								$lv1lebihdariuntuk4 = $isilv1;
								$lv2lebihdariuntuk4 = $isilv2;
								$lv3lebihdariuntuk4 = $isilv3 - 1;
								$lv4lebihdariuntuk4 = $lv4 - ($tambahlv4hapus - $lv4);
							}else if($isilv3 == "0"){
								$lv1lebihdariuntuk4 = $isilv1 - 1;
								$lv2lebihdariuntuk4 = $lv2 - 1;
								$lv3lebihdariuntuk4 = $lv3 - 1;
								$lv4lebihdariuntuk4 = $lv4 - ($tambahlv4hapus - $lv4);
							}
						}
					}
				}else if($tambahlv4hapus < $lv4){
					if($isilv1 == "0"){
					redirect("Penjualan/scanbarcode/".$kdbhnbaku."/".$codescan);
					}else if($isilv1 > "0"){
						if($isilv2 > "0"){
							if($isilv3 > "0"){
								if($isilv4 > "0"){
									$lv1lebihdariuntuk4 = $isilv1;
									$lv2lebihdariuntuk4 = $isilv2;
									$lv3lebihdariuntuk4 = $isilv3 - 1;
									$lv4lebihdariuntuk4 = $lv4 - ($lv4 - $tambahlv4hapus);
								}else if($isilv4 == "0"){
									$lv1lebihdariuntuk4 = $isilv1;
									$lv2lebihdariuntuk4 = $isilv2;
									$lv3lebihdariuntuk4 = $isilv3 - 1;
									$lv4lebihdariuntuk4 = $lv4 - $qty;
								}
								
							}else if($isilv3 == "0"){
								if($isilv4 > "0"){
									$lv1lebihdariuntuk4 = $isilv1;
									$lv2lebihdariuntuk4 = $isilv2 - 1;
									$lv3lebihdariuntuk4 = $lv3 - 1;
									$lv4lebihdariuntuk4 = $lv4 - ($lv4 - $tambahlv4hapus);
								}else if($isilv4 == "0"){
									$lv1lebihdariuntuk4 = $isilv1;
									$lv2lebihdariuntuk4 = $isilv2 - 1;
									$lv3lebihdariuntuk4 = $lv3 - 1;
									$lv4lebihdariuntuk4 = $lv4 - $qty;
								}
								
							}
						}else if($isilv2 == "0"){
							if($isilv3 > "0"){
								if($isilv4 > "0"){
									$lv1lebihdariuntuk4 = $isilv1;
									$lv2lebihdariuntuk4 = $isilv2;
									$lv3lebihdariuntuk4 = $isilv3 - 1;
									$lv4lebihdariuntuk4 = $lv4 - ($lv4 - $tambahlv4hapus);
								}else if($isilv4 == "0"){
									$lv1lebihdariuntuk4 = $isilv1;
									$lv2lebihdariuntuk4 = $isilv2;
									$lv3lebihdariuntuk4 = $isilv3 - 1;
									$lv4lebihdariuntuk4 = $lv4 - $qty;
								}
								
							}else if($isilv3 == "0"){
								if($isilv4 > "0"){
									$lv1lebihdariuntuk4 = $isilv1 - 1;
									$lv2lebihdariuntuk4 = $lv2 - 1;
									$lv3lebihdariuntuk4 = $lv3 - 1;
									$lv4lebihdariuntuk4 = $lv4 - ($lv4 - $tambahlv4hapus);
								}else if($isilv4 == "0"){
									$lv1lebihdariuntuk4 = $isilv1 - 1;
									$lv2lebihdariuntuk4 = $lv2 - 1;
									$lv3lebihdariuntuk4 = $lv3 - 1;
									$lv4lebihdariuntuk4 = $lv4 - $qty;
								}
								
							}
						}
					}
				}else if($tambahlv4hapus == $lv4){
					if($isilv1 == "0"){
					redirect("Penjualan/scanbarcode/".$kdbhnbaku."/".$codescan);
					}else if($isilv1 > "0"){
						if($isilv2 > "0"){
							if($isilv3 > "0"){
								$lv1lebihdariuntuk4 = $isilv1;
								$lv2lebihdariuntuk4 = $isilv2;
								$lv3lebihdariuntuk4 = $isilv3 - 1;
								$lv4lebihdariuntuk4 = $lv4 + $isilv4 - $qty;
							}else if($isilv3 == "0"){
								$lv1lebihdariuntuk4 = $isilv1;
								$lv2lebihdariuntuk4 = $isilv2 - 1;
								$lv3lebihdariuntuk4 = $isilv3 - 1;
								$lv4lebihdariuntuk4 = $lv4 + $isilv4 - $qty;
							}
						}else if($isilv2 == "0"){
							if($isilv3 > "0"){
								$lv1lebihdariuntuk4 = $isilv1;
								$lv2lebihdariuntuk4 = $isilv2;
								$lv3lebihdariuntuk4 = $isilv3 - 1;
								$lv4lebihdariuntuk4 = $lv4 + $isilv4 - $qty;
							}else if($isilv3 == "0"){
								$lv1lebihdariuntuk4 = $isilv1 - 1;
								$lv2lebihdariuntuk4 = $lv2 - 1;
								$lv3lebihdariuntuk4 = $lv3 - 1;
								$lv4lebihdariuntuk4 = $lv4 + $isilv4 - $qty;
							}
						}
					}
				}
				
				$this->Model_Penjualan->hapuslv4lebihdari($kdbhnbaku,$lv1lebihdariuntuk4,$lv2lebihdariuntuk4,$lv3lebihdariuntuk4,$lv4lebihdariuntuk4);
				$this->Model_Penjualan->simpantbpenjualanbantuscan($nmbarang,$nmsatuan,$level,$hrgjual,$kdbhnbaku);
				$this->Model_Penjualan->simpantbpenjualandetailscan($nmbarang,$nmsatuan,$level,$hrgjual,$kdbhnbaku);
				redirect("Penjualan/scanbarcode/".$kdbhnbaku."/".$codescan);
			}else if($qty < $isilv4){
				if($isilv1 == "0"){
					redirect("Penjualan/scanbarcode/".$kdbhnbaku."/".$codescan);
					}else if($isilv1 > "0"){
						$lv1kurangdariuntuk4 = $isilv1;
						$lv2kurangdariuntuk4 = $isilv2;
						$lv3kurangdariuntuk4 = $isilv3;
						$lv4kurangdariuntuk4 = $isilv4 - $qty;
					}
				$this->Model_Penjualan->hapuslv4kurangdari($kdbhnbaku,$lv1kurangdariuntuk4,$lv2kurangdariuntuk4,$lv3kurangdariuntuk4,$lv4kurangdariuntuk4);
				$this->Model_Penjualan->simpantbpenjualanbantuscan($nmbarang,$nmsatuan,$level,$hrgjual,$kdbhnbaku);
				$this->Model_Penjualan->simpantbpenjualandetailscan($nmbarang,$nmsatuan,$level,$hrgjual,$kdbhnbaku);
				redirect("Penjualan/scanbarcode/".$kdbhnbaku."/".$codescan);
			}else if($qty == $isilv4){
				if($isilv1 == "0"){
					redirect("Penjualan/scanbarcode/".$kdbhnbaku."/".$codescan);
					}else if($isilv1 > "0"){
						$lv1samadenganuntuk4 = $isilv1;
						$lv2samadenganuntuk4 = $isilv2;
						$lv3samadenganuntuk4 = $isilv3;
						$lv4samadenganuntuk4 = $isilv4 - $qty;
					}
				$this->Model_Penjualan->hapuslv4samadengan($kdbhnbaku,$lv1samadenganuntuk4,$lv2samadenganuntuk4,$lv3samadenganuntuk4,$lv4samadenganuntuk4);
				$this->Model_Penjualan->simpantbpenjualanbantuscan($nmbarang,$nmsatuan,$level,$hrgjual,$kdbhnbaku);
				$this->Model_Penjualan->simpantbpenjualandetailscan($nmbarang,$nmsatuan,$level,$hrgjual,$kdbhnbaku);
				redirect("Penjualan/scanbarcode/".$kdbhnbaku."/".$codescan);
			}
		}
	}	
			
	}
	
	$cari = $this->Model_Penjualan->nota();
		if($cari){
			$data['nota'] = $cari;
		}
	$cari2 = $this->Model_Penjualan->iddetailnota();
		if($cari2){
			$data['detnota'] = $cari2;
		}
	
	$cari4 = $this->Model_Penjualan->totalbeli();
		if($cari4){
			$data['tot'] = $cari4;
		}
		
	
	$data ['datatable']= $this->Model_Penjualan->listdatadetailjual();
		$kdbhnbaku = $this->uri->segment(3);
		$codescan = $this->uri->segment(4);
		
		$datajual = $this->Model_Penjualan->ambildatajual($kdbhnbaku,$codescan);
	$data['barcode'] = $datajual;
		$this->load->view('admin/Menuadmin');
		$this->load->view('admin/penjualan/Inputpenjualan',$data);
	}
	
public function hapuspenjualandetail(){
	//$this->Model_Penjualan->hapustbpenjualanbantu($idnota);
	//$this->Model_Penjualan->hapuspenjualantbdetail($idnota);
			
	//redirect("Penjualan/inputpembelian");
	$idnota = $this->uri->segment(3); 
	$datatbbanturetur = $this->Model_Penjualan->datapenjualanbantu($idnota);
	$qty = $datatbbanturetur["Qty"];
	$level = $datatbbanturetur["Level"];
	$kdbhnbaku = $datatbbanturetur["Kode_Bahan_Baku"];
	
$bhnbku = $this->Model_Penjualan->databahanbaku($kdbhnbaku);
	$lv1 = $bhnbku["Lv1"];
	$lv2 = $bhnbku["Lv2"];
	$lv3 = $bhnbku["Lv3"];
	$lv4 = $bhnbku["Lv4"];
	//$lv5 = $bhnbku["Lv5"];
		
	$isilv1 = $bhnbku["Lv1"];
	$isilv2 = $bhnbku["Isi_Lv2"];
	$isilv3 = $bhnbku["Isi_Lv3"];
	$isilv4 = $bhnbku["Isi_Lv4"];
	//$isilv5 = $bhnbku["Isi_Lv5"];
	
	////////// proses /////////////
	//// Lv1 ////
		if($level == "Lv1"){
			$tambahlv1 = $isilv1 + $qty;
			
			$this->Model_Penjualan->updatelv1($kdbhnbaku,$tambahlv1);
			$this->Model_Penjualan->hapustbpenjualanbantu($idnota);
			$this->Model_Penjualan->hapuspenjualantbdetail($idnota);
			
			redirect("Penjualan/inputpembelian");
		}
		//// Lv2 ////
					
		if($level == "Lv2"){
			//if($lv1 == "0"){
			//	redirect("Pembelian/tambahpembelianbahanbaku");
			//}
	
			if($qty > $lv2){
				redirect("Penjualan/inputpembelian");
			}else if($qty > $isilv2){
				$tambahisilv2 = $qty + $isilv2;
					if($tambahisilv2 < $lv2){
						$hasiltambahisilv2 = $tambahisilv2;
						$hasillv1 = $lv1;
					}else if($tambahisilv2 > $lv2){
						$hasiltambahisilv2 = $tambahisilv2 - $lv2;
						$hasillv1 = $lv1 + 1;
					}else if($tambahisilv2 == $lv2){
						$hasiltambahisilv2 = $tambahisilv2;
						$hasillv1 = $lv1;
					}
					
				$this->Model_Penjualan->updatelv2($kdbhnbaku,$hasillv1,$hasiltambahisilv2);
				$this->Model_Penjualan->hapustbpenjualanbantu($idnota);
				$this->Model_Penjualan->hapuspenjualantbdetail($idnota);
			
				redirect("Penjualan/inputpembelian");
				
			}else if($qty < $isilv2){
				$tambahisilv2kurangdari = $qty + $isilv2;
					if($tambahisilv2kurangdari > $lv2){
						$hasiltambahisilv2kurangdari = $tambahisilv2kurangdari - $isilv2;
						$hasillv1kurangdari = $lv1 + 1;
					}else if($tambahisilv2kurangdari < $lv2){
						$hasiltambahisilv2kurangdari = $tambahisilv2kurangdari;
						$hasillv1kurangdari = $lv1;
					}else if($tambahisilv2kurangdari == $lv2){
						$hasiltambahisilv2kurangdari = $tambahisilv2kurangdari;
						$hasillv1kurangdari = $lv1;
					}
					
				$this->Model_Penjualan->updatelv2kurangdari($kdbhnbaku,$hasillv1kurangdari,$hasiltambahisilv2kurangdari);
				$this->Model_Penjualan->hapustbpenjualanbantu($idnota);
				$this->Model_Penjualan->hapuspenjualantbdetail($idnota);
				redirect("Penjualan/inputpembelian");
				
			}else if ($qty == $isilv2){
				$tambahisilv2samadengan = $qty + $isilv2;
					if($tambahisilv2samadengan > $lv2){
						$hasiltambahisilv2samadengan = $tambahisilv2samadengan - $lv2;
						$hasillv1samadengan = $lv1 + 1;
					}else if($tambahisilv2samadengan < $lv2){
						$hasiltambahisilv2samadengan = $tambahisilv2samadengan;
						$hasillv1samadengan = $lv1;
					}else if($tambahisilv2samadengan == $lv2){
						$hasiltambahisilv2samadengan = $tambahisilv2samadengan;
						$hasillv1samadengan = $lv1;
					}
					
				$this->Model_Penjualan->updatelv2samadengan($kdbhnbaku,$hasillv1samadengan,$hasiltambahisilv2samadengan);
				$this->Model_Penjualan->hapustbpenjualanbantu($idnota);
				$this->Model_Penjualan->hapuspenjualantbdetail($idnota);
				redirect("Penjualan/inputpembelian");
			}
		}
		
		//// Lv3 ////
		if($level == "Lv3"){
			//if($lv1 == "0"){
			//	redirect("Pembelian/tambahpembelianbahanbaku");
			//}

			if($qty > $lv3){
				redirect("Penjualan/inputpembelian");
			}else if($qty > $isilv3){
				$tambahisilv3 = $qty + $isilv3;
					if($tambahisilv3 < $lv3){
						$hasilsisalv1 = $isilv1;
						$hasillv2 = $isilv2;
						$hasiltambahisilv3 = $tambahisilv3;
					}else if($tambahisilv3 > $lv3){
							if($isilv2 == $lv2){
								$hasilsisalv1 = $isilv1 + 1;
								$hasillv2 = 1;
								$hasiltambahisilv3 = $tambahisilv3 - $lv3;
							}else if($isilv2 < $lv2){
								$hasilsisalv1 = $isilv1;
								$hasillv2 = $isilv2 + 1;
								$hasiltambahisilv3 = $tambahisilv3 - $lv3;
							}
					}else if($tambahisilv3 == $lv3){
						$hasilsisalv1 = $isilv1;
						$hasillv2 = $isilv2;
						$hasiltambahisilv3 = $tambahisilv3;
					}
					
				$this->Model_Penjualan->updatelv3($kdbhnbaku,$hasilsisalv1,$hasillv2,$hasiltambahisilv3);
				$this->Model_Penjualan->hapustbpenjualanbantu($idnota);
				$this->Model_Penjualan->hapuspenjualantbdetail($idnota);
				redirect("Penjualan/inputpembelian");
				
			}else if($qty < $isilv3){
				$tambahisilv3kurangdari = $qty + $isilv3;
					if($tambahisilv3kurangdari > $lv3){
						if($isilv2 == $lv2){
								$hasilsisalv1kurangdari = $isilv1 + 1;
								$hasillv2kurangdari = 1;
								$hasiltambahisilv3kurangdari = $tambahisilv3kurangdari - $lv3;
							}else if($isilv2 < $lv2){
								$hasilsisalv1kurangdari = $isilv1;
								$hasillv2kurangdari = $isilv2 + 1;
								$hasiltambahisilv3kurangdari = $tambahisilv3kurangdari - $lv3;
							}
					}else if($tambahisilv3kurangdari < $lv3){
						$hasilsisalv1kurangdari = $isilv1;
						$hasillv2kurangdari = $isilv2;
						$hasiltambahisilv3kurangdari = $tambahisilv3kurangdari;
					}else if($tambahisilv3kurangdari == $lv3){
						$hasilsisalv1kurangdari = $isilv1;
						$hasillv2kurangdari = $isilv2;
						$hasiltambahisilv3kurangdari = $tambahisilv3kurangdari;
					}
					
				$this->Model_Penjualan->updatelv3kurangdari($kdbhnbaku,$hasilsisalv1kurangdari,$hasillv2kurangdari,$hasiltambahisilv3kurangdari);
				$this->Model_Penjualan->hapustbpenjualanbantu($idnota);
				$this->Model_Penjualan->hapuspenjualantbdetail($idnota);
				redirect("Penjualan/inputpembelian");
				
			}else if($qty == $isilv3){
				$tambahisilv3samadengan = $qty + $isilv3;
					if($tambahisilv3samadengan > $lv3){
						if($isilv2 == $lv2){
							$hasilsisalv1samadengan = $isilv1 + 1;
							$hasillv2samadengan = 1;
							$hasiltambahisilv3samadengan = $tambahisilv3samadengan - $lv3;
						}else if($isilv2 < $lv2){
							$hasilsisalv1samadengan = $isilv1;
							$hasillv2samadengan = $isilv2 + 1;
							$hasiltambahisilv3samadengan = $tambahisilv3samadengan - $lv3;
						}
						
					}else if($tambahisilv3samadengan < $lv3){
						$hasilsisalv1samadengan = $isilv1;
						$hasillv2samadengan = $isilv2;
						$hasiltambahisilv3samadengan = $tambahisilv3samadengan;
					}else if($tambahisilv3samadengan == $lv3){
						$hasilsisalv1samadengan = $isilv1;
						$hasillv2samadengan = $isilv2;
						$hasiltambahisilv3samadengan = $tambahisilv3samadengan;
					}
					
				$this->Model_Penjualan->updatelv3samadengan($kdbhnbaku,$hasilsisalv1samadengan,$hasillv2samadengan,$hasiltambahisilv3samadengan);
				$this->Model_Penjualan->hapustbpenjualanbantu($idnota);
				$this->Model_Penjualan->hapuspenjualantbdetail($idnota);
				redirect("Penjualan/inputpembelian");
			}
			
		}
		/////////////////////////////////////
		//// Lv4 ////
		if($level == "Lv4"){
			//if($lv1 == "0"){
			//	redirect("Pembelian/tambahpembelianbahanbaku");
			//}

			if($qty > $lv4){
				redirect("Penjualan/inputpembelian");
			}else if($qty > $isilv4){
				$tambahisilv4 = $qty + $isilv4;
					if($tambahisilv4 < $lv4){
						$hasilsisalv1untuk4 = $isilv1;
						$hasilsisalv2 = $isilv2;
						$hasillv3 = $isilv3;
						$hasiltambahisilv4 = $tambahisilv4;
					}else if($tambahisilv4 > $lv4){
							if($isilv3 == $lv3){
								if($isilv2 == $lv2){
									$hasilsisalv1untuk4 = $isilv1 + 1;
									$hasilsisalv2 = 1;
									$hasillv3 = 1;
								}else if($isilv2 < $lv2){
									$hasilsisalv1untuk4 = $isilv1;
									$hasilsisalv2 = $isilv2 + 1;
									$hasillv3 = 1;
								}
								//$hasilsisalv2 = $isilv2 + 1;
								//$hasillv3 = 1;
								$hasiltambahisilv4 = $tambahisilv4 - $lv4;
							}else if($isilv3 < $lv3){
								$hasilsisalv1untuk4 = $isilv1;
								$hasilsisalv2 = $isilv2;
								$hasillv3 = $isilv3 + 1;
								$hasiltambahisilv4 = $tambahisilv4 - $lv4;
							}
					}else if($tambahisilv4 == $lv4){
						$hasilsisalv1untuk4 = $isilv1;
						$hasilsisalv2 = $isilv2;
						$hasillv3 = $isilv3;
						$hasiltambahisilv4 = $tambahisilv4;
					}
					
				$this->Model_Penjualan->updatelv4($kdbhnbaku,$hasilsisalv1untuk4,$hasilsisalv2,$hasillv3,$hasiltambahisilv4);
				$this->Model_Penjualan->hapustbpenjualanbantu($idnota);
				$this->Model_Penjualan->hapuspenjualantbdetail($idnota);
				redirect("Penjualan/inputpembelian");
				
			}else if($qty < $isilv4){
				$tambahisilv4kurangdari = $qty + $isilv4;
					if($tambahisilv4kurangdari > $lv4){
						if($isilv3 == $lv3){
								if($isilv2 == $lv2){
									$hasilsisalv1untuk4kurangdari = $isilv1 + 1;
									$hasilsisalv2kurangdari = 1;
									$hasillv3kurangdari = 1;
								}else if($isilv2 < $lv2){
									$hasilsisalv1untuk4kurangdari = $isilv1;
									$hasilsisalv2kurangdari = $isilv2 + 1;
									$hasillv3kurangdari = 1;
								}
								//$hasilsisalv2 = $isilv2 + 1;
								//$hasillv3 = 1;
								$hasiltambahisilv4kurangdari = $tambahisilv4kurangdari - $lv4;
							}else if($isilv3 < $lv3){
								$hasilsisalv1untuk4kurangdari = $isilv1;
								$hasilsisalv2kurangdari = $isilv2;
								$hasillv3kurangdari = $isilv3 + 1;
								$hasiltambahisilv4kurangdari = $tambahisilv4kurangdari - $lv4;
							}
					}else if($tambahisilv4kurangdari < $lv4){
						$hasilsisalv1untuk4kurangdari = $isilv1;
						$hasilsisalv2kurangdari = $isilv2;
						$hasillv3kurangdari = $isilv3;
						$hasiltambahisilv4kurangdari = $tambahisilv4kurangdari;
					}else if($tambahisilv4kurangdari == $lv4){
						$hasilsisalv1untuk4kurangdari = $isilv1;
						$hasilsisalv2kurangdari = $isilv2;
						$hasillv3kurangdari = $isilv3;
						$hasiltambahisilv4kurangdari = $tambahisilv4kurangdari;
					}
					
				$this->Model_Penjualan->updatelv4kurangdari($kdbhnbaku,$hasilsisalv1untuk4kurangdari,$hasilsisalv2kurangdari,$hasillv3kurangdari,$hasiltambahisilv4kurangdari);
				$this->Model_Penjualan->hapustbpenjualanbantu($idnota);
				$this->Model_Penjualan->hapuspenjualantbdetail($idnota);
				redirect("Penjualan/inputpembelian");
				
			}else if($qty == $isilv4){
				$tambahisilv4samadengan = $qty + $isilv4;
					if($tambahisilv4samadengan > $lv4){
						if($isilv3 == $lv3){
								if($isilv2 == $lv2){
									$hasilsisalv1untuk4samadengan = $isilv1 + 1;
									$hasilsisalv2samadengan = 1;
									$hasillv3samadengan = 1;
								}else if($isilv2 < $lv2){
									$hasilsisalv1untuk4samadengan = $isilv1;
									$hasilsisalv2samadengan = $isilv2 + 1;
									$hasillv3samadengan = 1;
								}
								//$hasilsisalv2 = $isilv2 + 1;
								//$hasillv3 = 1;
								$hasiltambahisilv4samadengan = $tambahisilv4samadengan - $lv4;
							}else if($isilv3 < $lv3){
								$hasilsisalv1untuk4samadengan = $isilv1;
								$hasilsisalv2samadengan = $isilv2;
								$hasillv3samadengan = $isilv3 + 1;
								$hasiltambahisilv4samadengan = $tambahisilv4samadengan - $lv4;
							}
					}else if($tambahisilv4samadengan < $lv4){
						$hasilsisalv1untuk4samadengan = $isilv1;
						$hasilsisalv2samadengan = $isilv2;
						$hasillv3samadengan = $isilv3;
						$hasiltambahisilv4samadengan = $tambahisilv4samadengan;
					}else if($tambahisilv4samadengan == $lv4){
						$hasilsisalv1untuk4samadengan = $isilv1;
						$hasilsisalv2samadengan = $isilv2;
						$hasillv3samadengan = $isilv3;
						$hasiltambahisilv4samadengan = $tambahisilv4samadengan;
					}
					
				$this->Model_Penjualan->updatelv4samadengan($kdbhnbaku,$hasilsisalv1untuk4samadengan,$hasilsisalv2samadengan,$hasillv3samadengan,$hasiltambahisilv4samadengan);
				$this->Model_Penjualan->hapustbpenjualanbantu($idnota);
				$this->Model_Penjualan->hapuspenjualantbdetail($idnota);
				redirect("Penjualan/inputpembelian");
			}
			
		}
/////////////////////////////////////////////////////////////////////////////////////////////////////	
	
	
	}
	
public function hapuspenjualan(){
	
	$nota = $this->uri->segment(4); 
	
	$idnota = $this->uri->segment(3); 
	$datatbbanturetur = $this->Model_Penjualan->datapenjualandetail($idnota);
	$qty = $datatbbanturetur["Qty"];
	$level = $datatbbanturetur["Level"];
	$kdbhnbaku = $datatbbanturetur["Kode_Bahan_Baku"];
	
$bhnbku = $this->Model_Penjualan->databahanbaku($kdbhnbaku);
	$lv1 = $bhnbku["Lv1"];
	$lv2 = $bhnbku["Lv2"];
	$lv3 = $bhnbku["Lv3"];
	$lv4 = $bhnbku["Lv4"];
	//$lv5 = $bhnbku["Lv5"];
		
	$isilv1 = $bhnbku["Lv1"];
	$isilv2 = $bhnbku["Isi_Lv2"];
	$isilv3 = $bhnbku["Isi_Lv3"];
	$isilv4 = $bhnbku["Isi_Lv4"];
	//$isilv5 = $bhnbku["Isi_Lv5"];
	
	////////// proses /////////////
	//// Lv1 ////
		if($level == "Lv1"){
			$tambahlv1 = $isilv1 + $qty;
			
			$this->Model_Penjualan->updatelv1($kdbhnbaku,$tambahlv1);
			
			$this->Model_Penjualan->hapuspenjualantbdetail($idnota);
			
				redirect("Penjualan/viewhapuspenjualan/".$nota);
		}
		//// Lv2 ////
					
		if($level == "Lv2"){
			//if($lv1 == "0"){
			//	redirect("Pembelian/tambahpembelianbahanbaku");
			//}
	
			if($qty > $lv2){
					redirect("Penjualan/viewhapuspenjualan/".$nota);
			}else if($qty > $isilv2){
				$tambahisilv2 = $qty + $isilv2;
					if($tambahisilv2 < $lv2){
						$hasiltambahisilv2 = $tambahisilv2;
						$hasillv1 = $lv1;
					}else if($tambahisilv2 > $lv2){
						$hasiltambahisilv2 = $tambahisilv2 - $lv2;
						$hasillv1 = $lv1 + 1;
					}else if($tambahisilv2 == $lv2){
						$hasiltambahisilv2 = $tambahisilv2;
						$hasillv1 = $lv1;
					}
					
				$this->Model_Penjualan->updatelv2($kdbhnbaku,$hasillv1,$hasiltambahisilv2);
				 
				$this->Model_Penjualan->hapuspenjualantbdetail($idnota);
			
					redirect("Penjualan/viewhapuspenjualan/".$nota);
				
			}else if($qty < $isilv2){
				$tambahisilv2kurangdari = $qty + $isilv2;
					if($tambahisilv2kurangdari > $lv2){
						$hasiltambahisilv2kurangdari = $tambahisilv2kurangdari - $isilv2;
						$hasillv1kurangdari = $lv1 + 1;
					}else if($tambahisilv2kurangdari < $lv2){
						$hasiltambahisilv2kurangdari = $tambahisilv2kurangdari;
						$hasillv1kurangdari = $lv1;
					}else if($tambahisilv2kurangdari == $lv2){
						$hasiltambahisilv2kurangdari = $tambahisilv2kurangdari;
						$hasillv1kurangdari = $lv1;
					}
					
				$this->Model_Penjualan->updatelv2kurangdari($kdbhnbaku,$hasillv1kurangdari,$hasiltambahisilv2kurangdari);
				$this->Model_Penjualan->hapuspenjualantbdetail($idnota);
				redirect("Penjualan/viewhapuspenjualan/".$nota);
				
			}else if ($qty == $isilv2){
				$tambahisilv2samadengan = $qty + $isilv2;
					if($tambahisilv2samadengan > $lv2){
						$hasiltambahisilv2samadengan = $tambahisilv2samadengan - $lv2;
						$hasillv1samadengan = $lv1 + 1;
					}else if($tambahisilv2samadengan < $lv2){
						$hasiltambahisilv2samadengan = $tambahisilv2samadengan;
						$hasillv1samadengan = $lv1;
					}else if($tambahisilv2samadengan == $lv2){
						$hasiltambahisilv2samadengan = $tambahisilv2samadengan;
						$hasillv1samadengan = $lv1;
					}
					
				$this->Model_Penjualan->updatelv2samadengan($kdbhnbaku,$hasillv1samadengan,$hasiltambahisilv2samadengan);
				$this->Model_Penjualan->hapuspenjualantbdetail($idnota);
				redirect("Penjualan/viewhapuspenjualan/".$nota);
			}
		}
		
		//// Lv3 ////
		if($level == "Lv3"){
			//if($lv1 == "0"){
			//	redirect("Pembelian/tambahpembelianbahanbaku");
			//}

			if($qty > $lv3){
				redirect("Penjualan/viewhapuspenjualan/".$nota);
			}else if($qty > $isilv3){
				$tambahisilv3 = $qty + $isilv3;
					if($tambahisilv3 < $lv3){
						$hasilsisalv1 = $isilv1;
						$hasillv2 = $isilv2;
						$hasiltambahisilv3 = $tambahisilv3;
					}else if($tambahisilv3 > $lv3){
							if($isilv2 == $lv2){
								$hasilsisalv1 = $isilv1 + 1;
								$hasillv2 = 1;
								$hasiltambahisilv3 = $tambahisilv3 - $lv3;
							}else if($isilv2 < $lv2){
								$hasilsisalv1 = $isilv1;
								$hasillv2 = $isilv2 + 1;
								$hasiltambahisilv3 = $tambahisilv3 - $lv3;
							}
					}else if($tambahisilv3 == $lv3){
						$hasilsisalv1 = $isilv1;
						$hasillv2 = $isilv2;
						$hasiltambahisilv3 = $tambahisilv3;
					}
					
				$this->Model_Penjualan->updatelv3($kdbhnbaku,$hasilsisalv1,$hasillv2,$hasiltambahisilv3);
				 $this->Model_Penjualan->hapuspenjualantbdetail($idnota);
				redirect("Penjualan/viewhapuspenjualan/".$nota);
				
			}else if($qty < $isilv3){
				$tambahisilv3kurangdari = $qty + $isilv3;
					if($tambahisilv3kurangdari > $lv3){
						if($isilv2 == $lv2){
								$hasilsisalv1kurangdari = $isilv1 + 1;
								$hasillv2kurangdari = 1;
								$hasiltambahisilv3kurangdari = $tambahisilv3kurangdari - $lv3;
							}else if($isilv2 < $lv2){
								$hasilsisalv1kurangdari = $isilv1;
								$hasillv2kurangdari = $isilv2 + 1;
								$hasiltambahisilv3kurangdari = $tambahisilv3kurangdari - $lv3;
							}
					}else if($tambahisilv3kurangdari < $lv3){
						$hasilsisalv1kurangdari = $isilv1;
						$hasillv2kurangdari = $isilv2;
						$hasiltambahisilv3kurangdari = $tambahisilv3kurangdari;
					}else if($tambahisilv3kurangdari == $lv3){
						$hasilsisalv1kurangdari = $isilv1;
						$hasillv2kurangdari = $isilv2;
						$hasiltambahisilv3kurangdari = $tambahisilv3kurangdari;
					}
					
				$this->Model_Penjualan->updatelv3kurangdari($kdbhnbaku,$hasilsisalv1kurangdari,$hasillv2kurangdari,$hasiltambahisilv3kurangdari);
				 $this->Model_Penjualan->hapuspenjualantbdetail($idnota);
				redirect("Penjualan/viewhapuspenjualan/".$nota);
				
			}else if($qty == $isilv3){
				$tambahisilv3samadengan = $qty + $isilv3;
					if($tambahisilv3samadengan > $lv3){
						if($isilv2 == $lv2){
							$hasilsisalv1samadengan = $isilv1 + 1;
							$hasillv2samadengan = 1;
							$hasiltambahisilv3samadengan = $tambahisilv3samadengan - $lv3;
						}else if($isilv2 < $lv2){
							$hasilsisalv1samadengan = $isilv1;
							$hasillv2samadengan = $isilv2 + 1;
							$hasiltambahisilv3samadengan = $tambahisilv3samadengan - $lv3;
						}
						
					}else if($tambahisilv3samadengan < $lv3){
						$hasilsisalv1samadengan = $isilv1;
						$hasillv2samadengan = $isilv2;
						$hasiltambahisilv3samadengan = $tambahisilv3samadengan;
					}else if($tambahisilv3samadengan == $lv3){
						$hasilsisalv1samadengan = $isilv1;
						$hasillv2samadengan = $isilv2;
						$hasiltambahisilv3samadengan = $tambahisilv3samadengan;
					}
					
				$this->Model_Penjualan->updatelv3samadengan($kdbhnbaku,$hasilsisalv1samadengan,$hasillv2samadengan,$hasiltambahisilv3samadengan);
				 $this->Model_Penjualan->hapuspenjualantbdetail($idnota);
				redirect("Penjualan/viewhapuspenjualan/".$nota);
			}
			
		}
		/////////////////////////////////////
		//// Lv4 ////
		if($level == "Lv4"){
			//if($lv1 == "0"){
			//	redirect("Pembelian/tambahpembelianbahanbaku");
			//}

			if($qty > $lv4){
				redirect("Penjualan/viewhapuspenjualan/".$nota);
			}else if($qty > $isilv4){
				$tambahisilv4 = $qty + $isilv4;
					if($tambahisilv4 < $lv4){
						$hasilsisalv1untuk4 = $isilv1;
						$hasilsisalv2 = $isilv2;
						$hasillv3 = $isilv3;
						$hasiltambahisilv4 = $tambahisilv4;
					}else if($tambahisilv4 > $lv4){
							if($isilv3 == $lv3){
								if($isilv2 == $lv2){
									$hasilsisalv1untuk4 = $isilv1 + 1;
									$hasilsisalv2 = 1;
									$hasillv3 = 1;
								}else if($isilv2 < $lv2){
									$hasilsisalv1untuk4 = $isilv1;
									$hasilsisalv2 = $isilv2 + 1;
									$hasillv3 = 1;
								}
								//$hasilsisalv2 = $isilv2 + 1;
								//$hasillv3 = 1;
								$hasiltambahisilv4 = $tambahisilv4 - $lv4;
							}else if($isilv3 < $lv3){
								$hasilsisalv1untuk4 = $isilv1;
								$hasilsisalv2 = $isilv2;
								$hasillv3 = $isilv3 + 1;
								$hasiltambahisilv4 = $tambahisilv4 - $lv4;
							}
					}else if($tambahisilv4 == $lv4){
						$hasilsisalv1untuk4 = $isilv1;
						$hasilsisalv2 = $isilv2;
						$hasillv3 = $isilv3;
						$hasiltambahisilv4 = $tambahisilv4;
					}
					
				$this->Model_Penjualan->updatelv4($kdbhnbaku,$hasilsisalv1untuk4,$hasilsisalv2,$hasillv3,$hasiltambahisilv4);
				 $this->Model_Penjualan->hapuspenjualantbdetail($idnota);
				redirect("Penjualan/viewhapuspenjualan/".$nota);
				
			}else if($qty < $isilv4){
				$tambahisilv4kurangdari = $qty + $isilv4;
					if($tambahisilv4kurangdari > $lv4){
						if($isilv3 == $lv3){
								if($isilv2 == $lv2){
									$hasilsisalv1untuk4kurangdari = $isilv1 + 1;
									$hasilsisalv2kurangdari = 1;
									$hasillv3kurangdari = 1;
								}else if($isilv2 < $lv2){
									$hasilsisalv1untuk4kurangdari = $isilv1;
									$hasilsisalv2kurangdari = $isilv2 + 1;
									$hasillv3kurangdari = 1;
								}
								//$hasilsisalv2 = $isilv2 + 1;
								//$hasillv3 = 1;
								$hasiltambahisilv4kurangdari = $tambahisilv4kurangdari - $lv4;
							}else if($isilv3 < $lv3){
								$hasilsisalv1untuk4kurangdari = $isilv1;
								$hasilsisalv2kurangdari = $isilv2;
								$hasillv3kurangdari = $isilv3 + 1;
								$hasiltambahisilv4kurangdari = $tambahisilv4kurangdari - $lv4;
							}
					}else if($tambahisilv4kurangdari < $lv4){
						$hasilsisalv1untuk4kurangdari = $isilv1;
						$hasilsisalv2kurangdari = $isilv2;
						$hasillv3kurangdari = $isilv3;
						$hasiltambahisilv4kurangdari = $tambahisilv4kurangdari;
					}else if($tambahisilv4kurangdari == $lv4){
						$hasilsisalv1untuk4kurangdari = $isilv1;
						$hasilsisalv2kurangdari = $isilv2;
						$hasillv3kurangdari = $isilv3;
						$hasiltambahisilv4kurangdari = $tambahisilv4kurangdari;
					}
					
				$this->Model_Penjualan->updatelv4kurangdari($kdbhnbaku,$hasilsisalv1untuk4kurangdari,$hasilsisalv2kurangdari,$hasillv3kurangdari,$hasiltambahisilv4kurangdari);
				 $this->Model_Penjualan->hapuspenjualantbdetail($idnota);
				redirect("Penjualan/viewhapuspenjualan/".$nota);
				
			}else if($qty == $isilv4){
				$tambahisilv4samadengan = $qty + $isilv4;
					if($tambahisilv4samadengan > $lv4){
						if($isilv3 == $lv3){
								if($isilv2 == $lv2){
									$hasilsisalv1untuk4samadengan = $isilv1 + 1;
									$hasilsisalv2samadengan = 1;
									$hasillv3samadengan = 1;
								}else if($isilv2 < $lv2){
									$hasilsisalv1untuk4samadengan = $isilv1;
									$hasilsisalv2samadengan = $isilv2 + 1;
									$hasillv3samadengan = 1;
								}
								//$hasilsisalv2 = $isilv2 + 1;
								//$hasillv3 = 1;
								$hasiltambahisilv4samadengan = $tambahisilv4samadengan - $lv4;
							}else if($isilv3 < $lv3){
								$hasilsisalv1untuk4samadengan = $isilv1;
								$hasilsisalv2samadengan = $isilv2;
								$hasillv3samadengan = $isilv3 + 1;
								$hasiltambahisilv4samadengan = $tambahisilv4samadengan - $lv4;
							}
					}else if($tambahisilv4samadengan < $lv4){
						$hasilsisalv1untuk4samadengan = $isilv1;
						$hasilsisalv2samadengan = $isilv2;
						$hasillv3samadengan = $isilv3;
						$hasiltambahisilv4samadengan = $tambahisilv4samadengan;
					}else if($tambahisilv4samadengan == $lv4){
						$hasilsisalv1untuk4samadengan = $isilv1;
						$hasilsisalv2samadengan = $isilv2;
						$hasillv3samadengan = $isilv3;
						$hasiltambahisilv4samadengan = $tambahisilv4samadengan;
					}
					
				$this->Model_Penjualan->updatelv4samadengan($kdbhnbaku,$hasilsisalv1untuk4samadengan,$hasilsisalv2samadengan,$hasillv3samadengan,$hasiltambahisilv4samadengan);
				 $this->Model_Penjualan->hapuspenjualantbdetail($idnota);
				redirect("Penjualan/viewhapuspenjualan/".$nota);
			}
			
		}
	}	
public function viewhapuspenjualan(){
	$nota = $this->uri->segment(3);
		
	$cari4 = $this->Model_Penjualan->totalbeliketikahapus($nota);
		if($cari4){
			$data['tot'] = $cari4;
		}
		
	$data['nota'] = $nota;
	$data['header'] = $this->Model_Penjualan->headerpenjualanhapus($nota);
	$data ['datatable']= $this->Model_Penjualan->listdatapenjualandetail($nota);
		$this->load->view('admin/Menuadmin');
		$this->load->view('admin/penjualan/Hapuspenjualan',$data);
}
public function pembayaran(){
	$bayar = $this->input->post("SubmitBayar");
	$hutang = $this->input->post("SubmitHutang");
	$nota = $this->input->post("Nota");
	if($bayar){
		$this->Model_Penjualan->simpanbayar();
		$this->Model_Penjualan->hapustbbantusetelahbayar();
		redirect("Penjualan/notapenjualan/".$nota);
	}else if($hutang){
		$this->Model_Penjualan->simpanbayarhutang();
		$this->Model_Penjualan->hapustbbantusetelahbayar();
		redirect("hutang/masukhutang/".$nota);
	}
}
public function cleanuppenjualan(){
	$where = $this->uri->segment(3);
	$this->Model_Penjualan->cleanuppenjualansetelahhapus($where); //hapus tb penjualan
	
	$dataid = $this->Model_Penjualan->cariidhutang($where);
	$idhutang = $dataid['Id_Hutang'];
	
	$this->Model_Penjualan->cleanuppenjualansetelahhapustbhutang($where); //hapus tb hutang 
	$this->Model_Penjualan->cleanuppenjualansetelahhapustbhutangreport($where); //hapus tb hutang report
	
	$this->Model_Penjualan->cleanuppenjualansetelahhapustbhutangdetail($idhutang); //hapus tb hutang detail
	$this->Model_Penjualan->cleanuppenjualansetelahhapustbhutangreportdetail($idhutang); //hapus tb hutang report detail
	$this->Model_Penjualan-> cleanuppenjualansetelahhapustbhutangpiutang($idhutang); //hapus tb hutang piutang
	
	redirect("Penjualan/index");
}
public function notapenjualan(){
	$nota = $this->uri->segment(3);
	$data["header"] = $this->Model_Penjualan->ambilheader($nota);
	$data["detail"] = $this->Model_Penjualan->ambildetailpenjualan($nota);
	$data["toko"] = $this->Model_Penjualan->datatoko();
	$data["item"] = $this->Model_Penjualan->itembeli($nota);
	
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/penjualan/LihatCetakNotaPenjualan',$data);
}

public function cetaknotaexcel(){
	$nota = $this->uri->segment(3);
	$data["header"] = $this->Model_Penjualan->ambilheader($nota);
	$data["detail"] = $this->Model_Penjualan->ambildetailpenjualan($nota);
	$data["toko"] = $this->Model_Penjualan->datatoko();
	$data["item"] = $this->Model_Penjualan->itembeli($nota);
	
	$this->load->view('admin/penjualan/CetakExcelNotaPenjualan',$data);
}

public function cariautobarang()
	{
		// tangkap variabel keyword dari URL
		$keyword = $this->uri->segment(3);

		// cari di database
		$data = $this->Model_Penjualan->getdataautocomplete($keyword);	

		// format keluaran di dalam array
		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'	=>$row->Nama_Barang.' - '.$row->Isi.' '.$row->Nama_Satuan,
				'Kode_Bahan_Baku' =>$row->Kode_Bahan_Baku,
				'Nama_Barang' =>$row->Nama_Barang,
				'Nama_Satuan' =>$row->Nama_Satuan,
				'Isi' =>$row->Isi,
				'Level' =>$row->Level,
				'Harga_Jual' =>$row->Harga_Jual,
				'Isi_Default' =>$row->Isi_Default,
				
			);
		}
		// minimal PHP 5.2
		echo json_encode($arr);
	}

public	function carinota() 
	{
    $data['datatable']=$this->Model_Penjualan->searchingdatanotapenjualan();
        if($data['datatable']==null){		
	redirect(base_url("Penjualan/index"));
    }
		else {
	
	$data['ent'] = $this->Model_Penjualan->entries();
	 
	$baris = $this->Model_Penjualan->getrowheaderpenjualan();
	$limit=$baris;
	$data['totbaris'] = $limit;
	
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/penjualan/V_Penjualan',$data);
		}

	}
//////////////////////////Edit Nota ///////////////////////
public function vieweditpenjualan(){
	$nota = $this->uri->segment(3);
	$kodebahanbaku = $this->uri->segment(4);	
	$codescan = $this->uri->segment(5);	
	$cari4 = $this->Model_Penjualan->totalbeliketikahapus($nota);
		if($cari4){
			$data['tot'] = $cari4;
		}
	$cari2 = $this->Model_Penjualan->iddetailnota();
		if($cari2){
			$data['detnota'] = $cari2;
		}
	
	
		
	$datajual = $this->Model_Penjualan->ambildatajual($kodebahanbaku,$codescan);
	
	$data['barcode'] = $datajual;
	$data['nota'] = $nota;
	$data['header'] = $this->Model_Penjualan->headerpenjualanhapus($nota);
	$data ['datatable']= $this->Model_Penjualan->listdatapenjualandetail($nota);
		$this->load->view('admin/Menuadmin');
		$this->load->view('admin/penjualan/Editpenjualan',$data);
}

public function hapuspenjualanedit(){
	$nota = $this->uri->segment(4); 
	
	$idnota = $this->uri->segment(3); 
	$datatbbanturetur = $this->Model_Penjualan->datapenjualandetail($idnota);
	$qty = $datatbbanturetur["Qty"];
	$level = $datatbbanturetur["Level"];
	$kdbhnbaku = $datatbbanturetur["Kode_Bahan_Baku"];
	
$bhnbku = $this->Model_Penjualan->databahanbaku($kdbhnbaku);
	$lv1 = $bhnbku["Lv1"];
	$lv2 = $bhnbku["Lv2"];
	$lv3 = $bhnbku["Lv3"];
	$lv4 = $bhnbku["Lv4"];
	//$lv5 = $bhnbku["Lv5"];
		
	$isilv1 = $bhnbku["Lv1"];
	$isilv2 = $bhnbku["Isi_Lv2"];
	$isilv3 = $bhnbku["Isi_Lv3"];
	$isilv4 = $bhnbku["Isi_Lv4"];
	//$isilv5 = $bhnbku["Isi_Lv5"];
	
	////////// proses /////////////
	//// Lv1 ////
		if($level == "Lv1"){
			$tambahlv1 = $isilv1 + $qty;
			
			$this->Model_Penjualan->updatelv1($kdbhnbaku,$tambahlv1);
			
			$this->Model_Penjualan->hapuspenjualantbdetail($idnota);
			
			redirect("Penjualan/vieweditpenjualan/".$nota);
		}
		//// Lv2 ////
					
		if($level == "Lv2"){
			//if($lv1 == "0"){
			//	redirect("Pembelian/tambahpembelianbahanbaku");
			//}
	
			if($qty > $lv2){
				redirect("Penjualan/vieweditpenjualan/".$nota);
			}else if($qty > $isilv2){
				$tambahisilv2 = $qty + $isilv2;
					if($tambahisilv2 < $lv2){
						$hasiltambahisilv2 = $tambahisilv2;
						$hasillv1 = $lv1;
					}else if($tambahisilv2 > $lv2){
						$hasiltambahisilv2 = $tambahisilv2 - $lv2;
						$hasillv1 = $lv1 + 1;
					}else if($tambahisilv2 == $lv2){
						$hasiltambahisilv2 = $tambahisilv2;
						$hasillv1 = $lv1;
					}
					
				$this->Model_Penjualan->updatelv2($kdbhnbaku,$hasillv1,$hasiltambahisilv2);
				 
				$this->Model_Penjualan->hapuspenjualantbdetail($idnota);
			
				redirect("Penjualan/vieweditpenjualan/".$nota);
				
			}else if($qty < $isilv2){
				$tambahisilv2kurangdari = $qty + $isilv2;
					if($tambahisilv2kurangdari > $lv2){
						$hasiltambahisilv2kurangdari = $tambahisilv2kurangdari - $isilv2;
						$hasillv1kurangdari = $lv1 + 1;
					}else if($tambahisilv2kurangdari < $lv2){
						$hasiltambahisilv2kurangdari = $tambahisilv2kurangdari;
						$hasillv1kurangdari = $lv1;
					}else if($tambahisilv2kurangdari == $lv2){
						$hasiltambahisilv2kurangdari = $tambahisilv2kurangdari;
						$hasillv1kurangdari = $lv1;
					}
					
				$this->Model_Penjualan->updatelv2kurangdari($kdbhnbaku,$hasillv1kurangdari,$hasiltambahisilv2kurangdari);
				$this->Model_Penjualan->hapuspenjualantbdetail($idnota);
				redirect("Penjualan/vieweditpenjualan/".$nota);
				
			}else if ($qty == $isilv2){
				$tambahisilv2samadengan = $qty + $isilv2;
					if($tambahisilv2samadengan > $lv2){
						$hasiltambahisilv2samadengan = $tambahisilv2samadengan - $lv2;
						$hasillv1samadengan = $lv1 + 1;
					}else if($tambahisilv2samadengan < $lv2){
						$hasiltambahisilv2samadengan = $tambahisilv2samadengan;
						$hasillv1samadengan = $lv1;
					}else if($tambahisilv2samadengan == $lv2){
						$hasiltambahisilv2samadengan = $tambahisilv2samadengan;
						$hasillv1samadengan = $lv1;
					}
					
				$this->Model_Penjualan->updatelv2samadengan($kdbhnbaku,$hasillv1samadengan,$hasiltambahisilv2samadengan);
				$this->Model_Penjualan->hapuspenjualantbdetail($idnota);
				redirect("Penjualan/vieweditpenjualan/".$nota);
			}
		}
		
		//// Lv3 ////
		if($level == "Lv3"){
			//if($lv1 == "0"){
			//	redirect("Pembelian/tambahpembelianbahanbaku");
			//}

			if($qty > $lv3){
				redirect("Penjualan/vieweditpenjualan/".$nota);
			}else if($qty > $isilv3){
				$tambahisilv3 = $qty + $isilv3;
					if($tambahisilv3 < $lv3){
						$hasilsisalv1 = $isilv1;
						$hasillv2 = $isilv2;
						$hasiltambahisilv3 = $tambahisilv3;
					}else if($tambahisilv3 > $lv3){
							if($isilv2 == $lv2){
								$hasilsisalv1 = $isilv1 + 1;
								$hasillv2 = 1;
								$hasiltambahisilv3 = $tambahisilv3 - $lv3;
							}else if($isilv2 < $lv2){
								$hasilsisalv1 = $isilv1;
								$hasillv2 = $isilv2 + 1;
								$hasiltambahisilv3 = $tambahisilv3 - $lv3;
							}
					}else if($tambahisilv3 == $lv3){
						$hasilsisalv1 = $isilv1;
						$hasillv2 = $isilv2;
						$hasiltambahisilv3 = $tambahisilv3;
					}
					
				$this->Model_Penjualan->updatelv3($kdbhnbaku,$hasilsisalv1,$hasillv2,$hasiltambahisilv3);
				 $this->Model_Penjualan->hapuspenjualantbdetail($idnota);
				redirect("Penjualan/vieweditpenjualan/".$nota);
				
			}else if($qty < $isilv3){
				$tambahisilv3kurangdari = $qty + $isilv3;
					if($tambahisilv3kurangdari > $lv3){
						if($isilv2 == $lv2){
								$hasilsisalv1kurangdari = $isilv1 + 1;
								$hasillv2kurangdari = 1;
								$hasiltambahisilv3kurangdari = $tambahisilv3kurangdari - $lv3;
							}else if($isilv2 < $lv2){
								$hasilsisalv1kurangdari = $isilv1;
								$hasillv2kurangdari = $isilv2 + 1;
								$hasiltambahisilv3kurangdari = $tambahisilv3kurangdari - $lv3;
							}
					}else if($tambahisilv3kurangdari < $lv3){
						$hasilsisalv1kurangdari = $isilv1;
						$hasillv2kurangdari = $isilv2;
						$hasiltambahisilv3kurangdari = $tambahisilv3kurangdari;
					}else if($tambahisilv3kurangdari == $lv3){
						$hasilsisalv1kurangdari = $isilv1;
						$hasillv2kurangdari = $isilv2;
						$hasiltambahisilv3kurangdari = $tambahisilv3kurangdari;
					}
					
				$this->Model_Penjualan->updatelv3kurangdari($kdbhnbaku,$hasilsisalv1kurangdari,$hasillv2kurangdari,$hasiltambahisilv3kurangdari);
				 $this->Model_Penjualan->hapuspenjualantbdetail($idnota);
				redirect("Penjualan/vieweditpenjualan/".$nota);
				
			}else if($qty == $isilv3){
				$tambahisilv3samadengan = $qty + $isilv3;
					if($tambahisilv3samadengan > $lv3){
						if($isilv2 == $lv2){
							$hasilsisalv1samadengan = $isilv1 + 1;
							$hasillv2samadengan = 1;
							$hasiltambahisilv3samadengan = $tambahisilv3samadengan - $lv3;
						}else if($isilv2 < $lv2){
							$hasilsisalv1samadengan = $isilv1;
							$hasillv2samadengan = $isilv2 + 1;
							$hasiltambahisilv3samadengan = $tambahisilv3samadengan - $lv3;
						}
						
					}else if($tambahisilv3samadengan < $lv3){
						$hasilsisalv1samadengan = $isilv1;
						$hasillv2samadengan = $isilv2;
						$hasiltambahisilv3samadengan = $tambahisilv3samadengan;
					}else if($tambahisilv3samadengan == $lv3){
						$hasilsisalv1samadengan = $isilv1;
						$hasillv2samadengan = $isilv2;
						$hasiltambahisilv3samadengan = $tambahisilv3samadengan;
					}
					
				$this->Model_Penjualan->updatelv3samadengan($kdbhnbaku,$hasilsisalv1samadengan,$hasillv2samadengan,$hasiltambahisilv3samadengan);
				 $this->Model_Penjualan->hapuspenjualantbdetail($idnota);
				redirect("Penjualan/vieweditpenjualan/".$nota);
			}
			
		}
		/////////////////////////////////////
		//// Lv4 ////
		if($level == "Lv4"){
			//if($lv1 == "0"){
			//	redirect("Pembelian/tambahpembelianbahanbaku");
			//}

			if($qty > $lv4){
				redirect("Penjualan/vieweditpenjualan/".$nota);
			}else if($qty > $isilv4){
				$tambahisilv4 = $qty + $isilv4;
					if($tambahisilv4 < $lv4){
						$hasilsisalv1untuk4 = $isilv1;
						$hasilsisalv2 = $isilv2;
						$hasillv3 = $isilv3;
						$hasiltambahisilv4 = $tambahisilv4;
					}else if($tambahisilv4 > $lv4){
							if($isilv3 == $lv3){
								if($isilv2 == $lv2){
									$hasilsisalv1untuk4 = $isilv1 + 1;
									$hasilsisalv2 = 1;
									$hasillv3 = 1;
								}else if($isilv2 < $lv2){
									$hasilsisalv1untuk4 = $isilv1;
									$hasilsisalv2 = $isilv2 + 1;
									$hasillv3 = 1;
								}
								//$hasilsisalv2 = $isilv2 + 1;
								//$hasillv3 = 1;
								$hasiltambahisilv4 = $tambahisilv4 - $lv4;
							}else if($isilv3 < $lv3){
								$hasilsisalv1untuk4 = $isilv1;
								$hasilsisalv2 = $isilv2;
								$hasillv3 = $isilv3 + 1;
								$hasiltambahisilv4 = $tambahisilv4 - $lv4;
							}
					}else if($tambahisilv4 == $lv4){
						$hasilsisalv1untuk4 = $isilv1;
						$hasilsisalv2 = $isilv2;
						$hasillv3 = $isilv3;
						$hasiltambahisilv4 = $tambahisilv4;
					}
					
				$this->Model_Penjualan->updatelv4($kdbhnbaku,$hasilsisalv1untuk4,$hasilsisalv2,$hasillv3,$hasiltambahisilv4);
				 $this->Model_Penjualan->hapuspenjualantbdetail($idnota);
				redirect("Penjualan/vieweditpenjualan/".$nota);
				
			}else if($qty < $isilv4){
				$tambahisilv4kurangdari = $qty + $isilv4;
					if($tambahisilv4kurangdari > $lv4){
						if($isilv3 == $lv3){
								if($isilv2 == $lv2){
									$hasilsisalv1untuk4kurangdari = $isilv1 + 1;
									$hasilsisalv2kurangdari = 1;
									$hasillv3kurangdari = 1;
								}else if($isilv2 < $lv2){
									$hasilsisalv1untuk4kurangdari = $isilv1;
									$hasilsisalv2kurangdari = $isilv2 + 1;
									$hasillv3kurangdari = 1;
								}
								//$hasilsisalv2 = $isilv2 + 1;
								//$hasillv3 = 1;
								$hasiltambahisilv4kurangdari = $tambahisilv4kurangdari - $lv4;
							}else if($isilv3 < $lv3){
								$hasilsisalv1untuk4kurangdari = $isilv1;
								$hasilsisalv2kurangdari = $isilv2;
								$hasillv3kurangdari = $isilv3 + 1;
								$hasiltambahisilv4kurangdari = $tambahisilv4kurangdari - $lv4;
							}
					}else if($tambahisilv4kurangdari < $lv4){
						$hasilsisalv1untuk4kurangdari = $isilv1;
						$hasilsisalv2kurangdari = $isilv2;
						$hasillv3kurangdari = $isilv3;
						$hasiltambahisilv4kurangdari = $tambahisilv4kurangdari;
					}else if($tambahisilv4kurangdari == $lv4){
						$hasilsisalv1untuk4kurangdari = $isilv1;
						$hasilsisalv2kurangdari = $isilv2;
						$hasillv3kurangdari = $isilv3;
						$hasiltambahisilv4kurangdari = $tambahisilv4kurangdari;
					}
					
				$this->Model_Penjualan->updatelv4kurangdari($kdbhnbaku,$hasilsisalv1untuk4kurangdari,$hasilsisalv2kurangdari,$hasillv3kurangdari,$hasiltambahisilv4kurangdari);
				 $this->Model_Penjualan->hapuspenjualantbdetail($idnota);
				redirect("Penjualan/vieweditpenjualan/".$nota);
				
			}else if($qty == $isilv4){
				$tambahisilv4samadengan = $qty + $isilv4;
					if($tambahisilv4samadengan > $lv4){
						if($isilv3 == $lv3){
								if($isilv2 == $lv2){
									$hasilsisalv1untuk4samadengan = $isilv1 + 1;
									$hasilsisalv2samadengan = 1;
									$hasillv3samadengan = 1;
								}else if($isilv2 < $lv2){
									$hasilsisalv1untuk4samadengan = $isilv1;
									$hasilsisalv2samadengan = $isilv2 + 1;
									$hasillv3samadengan = 1;
								}
								//$hasilsisalv2 = $isilv2 + 1;
								//$hasillv3 = 1;
								$hasiltambahisilv4samadengan = $tambahisilv4samadengan - $lv4;
							}else if($isilv3 < $lv3){
								$hasilsisalv1untuk4samadengan = $isilv1;
								$hasilsisalv2samadengan = $isilv2;
								$hasillv3samadengan = $isilv3 + 1;
								$hasiltambahisilv4samadengan = $tambahisilv4samadengan - $lv4;
							}
					}else if($tambahisilv4samadengan < $lv4){
						$hasilsisalv1untuk4samadengan = $isilv1;
						$hasilsisalv2samadengan = $isilv2;
						$hasillv3samadengan = $isilv3;
						$hasiltambahisilv4samadengan = $tambahisilv4samadengan;
					}else if($tambahisilv4samadengan == $lv4){
						$hasilsisalv1untuk4samadengan = $isilv1;
						$hasilsisalv2samadengan = $isilv2;
						$hasillv3samadengan = $isilv3;
						$hasiltambahisilv4samadengan = $tambahisilv4samadengan;
					}
					
				$this->Model_Penjualan->updatelv4samadengan($kdbhnbaku,$hasilsisalv1untuk4samadengan,$hasilsisalv2samadengan,$hasillv3samadengan,$hasiltambahisilv4samadengan);
				 $this->Model_Penjualan->hapuspenjualantbdetail($idnota);
				redirect("Penjualan/vieweditpenjualan/".$nota);
			}
			
		}
	}
	
public function inputeditbarangpenjualan(){ 
		$nota = $this->input->post("Nota");
		
	$qty = $this->input->post("Qty");
	$level = $this->input->post("Level");
	$kdbhnbaku = $this->input->post("Kode_Bahan_Baku");

$bhnbku = $this->Model_Penjualan->databahanbaku($kdbhnbaku);
	$lv1 = $bhnbku["Lv1"];
	$lv2 = $bhnbku["Lv2"];
	$lv3 = $bhnbku["Lv3"];
	$lv4 = $bhnbku["Lv4"];
	//$lv5 = $bhnbku["Lv5"];
		
	$isilv1 = $bhnbku["Lv1"];
	$isilv2 = $bhnbku["Isi_Lv2"];
	$isilv3 = $bhnbku["Isi_Lv3"];
	$isilv4 = $bhnbku["Isi_Lv4"];
	//$isilv5 = $bhnbku["Isi_Lv5"];

//// Lv1 ////
		if($level == "Lv1"){
			if($isilv1 == "0"){
				redirect("Penjualan/vieweditpenjualan/".$nota);
			}else if ($qty > $isilv1){
				redirect("Penjualan/vieweditpenjualan/".$nota);
			}else if ($isilv1 > "0"){
				$hapuslv1 = $isilv1 - $qty;
				$this->Model_Penjualan->hapuslv1($kdbhnbaku,$hapuslv1);
				$this->Model_Penjualan->simpantbpenjualandetail();
				redirect("Penjualan/vieweditpenjualan/".$nota);
			}
			
		}
//// Lv2 ////
		if($level == "Lv2"){
		if($qty > $lv2){
			redirect("Penjualan/vieweditpenjualan/".$nota);
		}else{
			
		
			if($isilv1 == "0"){
				redirect("Penjualan/vieweditpenjualan/".$nota);
			}else if($qty > $isilv2){
				$tambahlv2hapus = $qty + $isilv2;
				if($tambahlv2hapus > $lv2){
					if($isilv1 == "0"){
						redirect("Penjualan/vieweditpenjualan/".$nota);
					}else if($isilv1 > "0"){
						$sisalv1 = $isilv1 - 1;
						$hasillv2 = $lv2 - ($tambahlv2hapus - $lv2);
					} 
				}else if($tambahlv2hapus < $lv2){
					if($isilv1 == "0"){
						redirect("Penjualan/vieweditpenjualan/".$nota);
					}else if($isilv1 > "0"){
						$sisalv1 = $isilv1 - 1;
						$hasillv2 =  $lv2 - ($lv2 - $tambahlv2hapus);
					}
				}else if($tambahlv2hapus == $lv2){
					if($isilv1 == "0"){
						redirect("Penjualan/vieweditpenjualan/".$nota);
					}else if($isilv1 > "0"){
						$sisalv1 = $isilv1 - 1;
						$hasillv2 =  $lv2 + $isilv2 - $qty;
					}
				}
				
				$this->Model_Penjualan->hapuslv2lebihdari($kdbhnbaku,$sisalv1,$hasillv2);
				$this->Model_Penjualan->simpantbpenjualandetail();
				redirect("Penjualan/vieweditpenjualan/".$nota);
			}else if($qty < $isilv2){
				if($isilv1 == "0"){
					redirect("Penjualan/vieweditpenjualan/".$nota);
				}else if($isilv1 > "0"){
					$sisalv1kurangdari = $isilv1;
					$hasillv2kurangdari =  $isilv2 - $qty;
				}
				
				$this->Model_Penjualan->hapuslv2kurangdari($kdbhnbaku,$sisalv1kurangdari,$hasillv2kurangdari);
				$this->Model_Penjualan->simpantbpenjualandetail();
				redirect("Penjualan/vieweditpenjualan/".$nota);
			}else if($qty == $isilv2){
				if($isilv1 == "0"){
					redirect("Penjualan/vieweditpenjualan/".$nota);
				}else if($isilv1 > "0"){
					$sisalv1samadengan = $isilv1;
					$hasillv2samadengan =  $isilv2 - $qty;
				}
				
				$this->Model_Penjualan->hapuslv2samadengan($kdbhnbaku,$sisalv1samadengan,$hasillv2samadengan);
				$this->Model_Penjualan->simpantbpenjualandetail();
				redirect("Penjualan/vieweditpenjualan/".$nota);
			}
		}
	}	
//// Lv3 ////
		if($level == "Lv3"){
		if($qty > $lv3){
			redirect("Penjualan/vieweditpenjualan/".$nota);	
		}else{
			if($isilv1 == "0"){
				redirect("Penjualan/vieweditpenjualan/".$nota);
			}else if($qty > $isilv3){
				$tambahlv3hapus = $isilv3 + $qty;
				
				if($tambahlv3hapus > $lv3){
					if($isilv1 == "0"){
					redirect("Penjualan/vieweditpenjualan/".$nota);
					}else if($isilv1 > "0"){
						if($isilv2 > "0"){
							$hasillv1lebihdari = $isilv1;
							$hasillv2lebihdari = $isilv2 - 1;
							$hasillv3lebihdari = $lv3 - ($tambahlv3hapus - $lv3);
						}else if($isilv2 == "0"){
							$hasillv1lebihdari = $isilv1 - 1;
							$hasillv2lebihdari = $lv2 - 1;
							$hasillv3lebihdari = $lv3 - ($tambahlv3hapus - $lv3);
						}
					}
				}else if($tambahlv3hapus < $lv3){
					if($isilv1 == "0"){
					redirect("Penjualan/vieweditpenjualan/".$nota);
					}else if($isilv1 > "0"){
						if($isilv2 > "0"){
							if($isilv3 > "0"){
								$hasillv1lebihdari = $isilv1;
								$hasillv2lebihdari = $isilv2 - 1;
								$hasillv3lebihdari = $lv3 - ($lv3 - $tambahlv3hapus);
							}else if($isilv3 == "0"){
								$hasillv1lebihdari = $isilv1;
								$hasillv2lebihdari = $isilv2 - 1;
								$hasillv3lebihdari = $lv3 - $qty;
							}
						}else if($isilv2 == "0"){
							if($isilv3 > "0"){
								$hasillv1lebihdari = $isilv1 - 1;
								$hasillv2lebihdari = $lv2 - 1;
								$hasillv3lebihdari = $lv3 - ($lv3 - $tambahlv3hapus);
							}else if($isilv3 == "0"){
								$hasillv1lebihdari = $isilv1 - 1;
								$hasillv2lebihdari = $lv2 - 1;
								$hasillv3lebihdari = $lv3 - $qty;
							}
							
						}
					}
				}else if($tambahlv3hapus == $lv3){
					if($isilv1 == "0"){
					redirect("Penjualan/vieweditpenjualan/".$nota);
					}else if($isilv1 > "0"){
						if($isilv2 > "0"){
							$hasillv1lebihdari = $isilv1;
							$hasillv2lebihdari = $isilv2 - 1;
							$hasillv3lebihdari = $lv3 + $isilv3 - $qty;
						}else if($isilv2 == "0"){
							$hasillv1lebihdari = $isilv1 - 1;
							$hasillv2lebihdari = $lv2 - 1;
							$hasillv3lebihdari = $lv3 + $isilv3 - $qty;
						}
					}
				}
				
				$this->Model_Penjualan->hapuslv3lebihdari($kdbhnbaku,$hasillv1lebihdari,$hasillv2lebihdari,$hasillv3lebihdari);
				$this->Model_Penjualan->simpantbpenjualandetail();
				redirect("Penjualan/vieweditpenjualan/".$nota);
			}else if($qty < $isilv3){
				if($isilv1 == "0"){
					redirect("Penjualan/vieweditpenjualan/".$nota);
					}else if($isilv1 > "0"){
						$hasillv1kurangdariuntuk3 = $isilv1;
						$hasillv2kurangdariuntuk3 = $isilv2;
						$hasillv3kurangdariuntuk3 = $isilv3 - $qty;
					}
				$this->Model_Penjualan->hapuslv3kurangdari($kdbhnbaku,$hasillv1kurangdariuntuk3,$hasillv2kurangdariuntuk3,$hasillv3kurangdariuntuk3);
				$this->Model_Penjualan->simpantbpenjualandetail();
				redirect("Penjualan/vieweditpenjualan/".$nota);
			}else if($qty == $isilv3){
				if($isilv1 == "0"){
					redirect("Penjualan/vieweditpenjualan/".$nota);
					}else if($isilv1 > "0"){
						$hasillv1samadenganuntuk3 = $isilv1;
						$hasillv2samadenganuntuk3 = $isilv2;
						$hasillv3samadenganuntuk3 = $isilv3 - $qty;
					}
				$this->Model_Penjualan->hapuslv3samadengan($kdbhnbaku,$hasillv1samadenganuntuk3,$hasillv2samadenganuntuk3,$hasillv3samadenganuntuk3);
				$this->Model_Penjualan->simpantbpenjualandetail();
				redirect("Penjualan/vieweditpenjualan/".$nota);
			}
		}
	}
//// Lv4 ////
if($level == "Lv4"){
	if($qty > $lv4){
			redirect("Penjualan/vieweditpenjualan/".$nota);
		}else{
			if($isilv1 == "0"){
				redirect("Penjualan/vieweditpenjualan/".$nota);
			}else if($qty > $isilv4){
				$tambahlv4hapus = $isilv4 + $qty;
				
				if($tambahlv4hapus > $lv4){
					if($isilv1 == "0"){
					redirect("Penjualan/vieweditpenjualan/".$nota);
					}else if($isilv1 > "0"){
						if($isilv2 > "0"){
							if($isilv3 > "0"){
								$lv1lebihdariuntuk4 = $isilv1;
								$lv2lebihdariuntuk4 = $isilv2;
								$lv3lebihdariuntuk4 = $isilv3 - 1;
								$lv4lebihdariuntuk4 = $lv4 - ($tambahlv4hapus - $lv4);
							}else if($isilv3 == "0"){
								$lv1lebihdariuntuk4 = $isilv1;
								$lv2lebihdariuntuk4 = $isilv2 - 1;
								$lv3lebihdariuntuk4 = $lv3 - 1;
								$lv4lebihdariuntuk4 = $lv4 - ($tambahlv4hapus - $lv4);
							}
						}else if($isilv2 == "0"){
							if($isilv3 > "0"){
								$lv1lebihdariuntuk4 = $isilv1;
								$lv2lebihdariuntuk4 = $isilv2;
								$lv3lebihdariuntuk4 = $isilv3 - 1;
								$lv4lebihdariuntuk4 = $lv4 - ($tambahlv4hapus - $lv4);
							}else if($isilv3 == "0"){
								$lv1lebihdariuntuk4 = $isilv1 - 1;
								$lv2lebihdariuntuk4 = $lv2 - 1;
								$lv3lebihdariuntuk4 = $lv3 - 1;
								$lv4lebihdariuntuk4 = $lv4 - ($tambahlv4hapus - $lv4);
							}
						}
					}
				}else if($tambahlv4hapus < $lv4){
					if($isilv1 == "0"){
					redirect("Penjualan/vieweditpenjualan/".$nota);
					}else if($isilv1 > "0"){
						if($isilv2 > "0"){
							if($isilv3 > "0"){
								if($isilv4 > "0"){
									$lv1lebihdariuntuk4 = $isilv1;
									$lv2lebihdariuntuk4 = $isilv2;
									$lv3lebihdariuntuk4 = $isilv3 - 1;
									$lv4lebihdariuntuk4 = $lv4 - ($lv4 - $tambahlv4hapus);
								}else if($isilv4 == "0"){
									$lv1lebihdariuntuk4 = $isilv1;
									$lv2lebihdariuntuk4 = $isilv2;
									$lv3lebihdariuntuk4 = $isilv3 - 1;
									$lv4lebihdariuntuk4 = $lv4 - $qty;
								}
								
							}else if($isilv3 == "0"){
								if($isilv4 > "0"){
									$lv1lebihdariuntuk4 = $isilv1;
									$lv2lebihdariuntuk4 = $isilv2 - 1;
									$lv3lebihdariuntuk4 = $lv3 - 1;
									$lv4lebihdariuntuk4 = $lv4 - ($lv4 - $tambahlv4hapus);
								}else if($isilv4 == "0"){
									$lv1lebihdariuntuk4 = $isilv1;
									$lv2lebihdariuntuk4 = $isilv2 - 1;
									$lv3lebihdariuntuk4 = $lv3 - 1;
									$lv4lebihdariuntuk4 = $lv4 - $qty;
								}
								
							}
						}else if($isilv2 == "0"){
							if($isilv3 > "0"){
								if($isilv4 > "0"){
									$lv1lebihdariuntuk4 = $isilv1;
									$lv2lebihdariuntuk4 = $isilv2;
									$lv3lebihdariuntuk4 = $isilv3 - 1;
									$lv4lebihdariuntuk4 = $lv4 - ($lv4 - $tambahlv4hapus);
								}else if($isilv4 == "0"){
									$lv1lebihdariuntuk4 = $isilv1;
									$lv2lebihdariuntuk4 = $isilv2;
									$lv3lebihdariuntuk4 = $isilv3 - 1;
									$lv4lebihdariuntuk4 = $lv4 - $qty;
								}
								
							}else if($isilv3 == "0"){
								if($isilv4 > "0"){
									$lv1lebihdariuntuk4 = $isilv1 - 1;
									$lv2lebihdariuntuk4 = $lv2 - 1;
									$lv3lebihdariuntuk4 = $lv3 - 1;
									$lv4lebihdariuntuk4 = $lv4 - ($lv4 - $tambahlv4hapus);
								}else if($isilv4 == "0"){
									$lv1lebihdariuntuk4 = $isilv1 - 1;
									$lv2lebihdariuntuk4 = $lv2 - 1;
									$lv3lebihdariuntuk4 = $lv3 - 1;
									$lv4lebihdariuntuk4 = $lv4 - $qty;
								}
								
							}
						}
					}
				}else if($tambahlv4hapus == $lv4){
					if($isilv1 == "0"){
					redirect("Penjualan/vieweditpenjualan/".$nota);
					}else if($isilv1 > "0"){
						if($isilv2 > "0"){
							if($isilv3 > "0"){
								$lv1lebihdariuntuk4 = $isilv1;
								$lv2lebihdariuntuk4 = $isilv2;
								$lv3lebihdariuntuk4 = $isilv3 - 1;
								$lv4lebihdariuntuk4 = $lv4 + $isilv4 - $qty;
							}else if($isilv3 == "0"){
								$lv1lebihdariuntuk4 = $isilv1;
								$lv2lebihdariuntuk4 = $isilv2 - 1;
								$lv3lebihdariuntuk4 = $isilv3 - 1;
								$lv4lebihdariuntuk4 = $lv4 + $isilv4 - $qty;
							}
						}else if($isilv2 == "0"){
							if($isilv3 > "0"){
								$lv1lebihdariuntuk4 = $isilv1;
								$lv2lebihdariuntuk4 = $isilv2;
								$lv3lebihdariuntuk4 = $isilv3 - 1;
								$lv4lebihdariuntuk4 = $lv4 + $isilv4 - $qty;
							}else if($isilv3 == "0"){
								$lv1lebihdariuntuk4 = $isilv1 - 1;
								$lv2lebihdariuntuk4 = $lv2 - 1;
								$lv3lebihdariuntuk4 = $lv3 - 1;
								$lv4lebihdariuntuk4 = $lv4 + $isilv4 - $qty;
							}
						}
					}
				}
				
				$this->Model_Penjualan->hapuslv4lebihdari($kdbhnbaku,$lv1lebihdariuntuk4,$lv2lebihdariuntuk4,$lv3lebihdariuntuk4,$lv4lebihdariuntuk4);
				$this->Model_Penjualan->simpantbpenjualandetail();
				redirect("Penjualan/vieweditpenjualan/".$nota);
			}else if($qty < $isilv4){
				if($isilv1 == "0"){
					redirect("Penjualan/vieweditpenjualan/".$nota);
					}else if($isilv1 > "0"){
						$lv1kurangdariuntuk4 = $isilv1;
						$lv2kurangdariuntuk4 = $isilv2;
						$lv3kurangdariuntuk4 = $isilv3;
						$lv4kurangdariuntuk4 = $isilv4 - $qty;
					}
				$this->Model_Penjualan->hapuslv4kurangdari($kdbhnbaku,$lv1kurangdariuntuk4,$lv2kurangdariuntuk4,$lv3kurangdariuntuk4,$lv4kurangdariuntuk4);
				$this->Model_Penjualan->simpantbpenjualandetail();
				redirect("Penjualan/vieweditpenjualan/".$nota);
			}else if($qty == $isilv4){
				if($isilv1 == "0"){
					redirect("Penjualan/vieweditpenjualan/".$nota);
					}else if($isilv1 > "0"){
						$lv1samadenganuntuk4 = $isilv1;
						$lv2samadenganuntuk4 = $isilv2;
						$lv3samadenganuntuk4 = $isilv3;
						$lv4samadenganuntuk4 = $isilv4 - $qty;
					}
				$this->Model_Penjualan->hapuslv4samadengan($kdbhnbaku,$lv1samadenganuntuk4,$lv2samadenganuntuk4,$lv3samadenganuntuk4,$lv4samadenganuntuk4);
				$this->Model_Penjualan->simpantbpenjualanbantu();
				$this->Model_Penjualan->simpantbpenjualandetail();
				redirect("Penjualan/vieweditpenjualan/".$nota);
			}
		}
	}	
	}
public function scanbarcodeedit(){
    
		$nota = $this->input->post("Nota");
		$codescan = $this->input->post("Kode_Bahan_Baku");
		
		////////////////////////////////////////////////////////
		
		
		$dtscan = $this->Model_Penjualan->datascanbarang($codescan);
		$kdbhnbaku = $dtscan["Kode_Bahan_Baku"];
		if($kdbhnbaku){
		$datajual = $this->Model_Penjualan->ambildatajual($kdbhnbaku,$codescan);
		//////////
		
	$qty = $dtscan["Isi"];
	$level = $dtscan["Level"];
	$nmsatuan = $dtscan["Nama_Satuan"];
	$nmbarang = $dtscan["Nama_Barang"];
	$hrgjual = $dtscan["Harga_Jual"];

$bhnbku = $this->Model_Penjualan->databahanbaku($kdbhnbaku);
	$lv1 = $bhnbku["Lv1"];
	$lv2 = $bhnbku["Lv2"];
	$lv3 = $bhnbku["Lv3"];
	$lv4 = $bhnbku["Lv4"];
	//$lv5 = $bhnbku["Lv5"];
		
	$isilv1 = $bhnbku["Lv1"];
	$isilv2 = $bhnbku["Isi_Lv2"];
	$isilv3 = $bhnbku["Isi_Lv3"];
	$isilv4 = $bhnbku["Isi_Lv4"];
	//$isilv5 = $bhnbku["Isi_Lv5"];

//// Lv1 ////
		if($level == "Lv1"){
			if($isilv1 == "0"){
				redirect("Penjualan/vieweditpenjualan/".$nota."/".$kdbhnbaku."/".$codescan);
			}else if ($qty > $isilv1){
				redirect("Penjualan/vieweditpenjualan/".$nota."/".$kdbhnbaku."/".$codescan);
			}else if ($isilv1 > "0"){
				$hapuslv1 = $isilv1 - $qty;
				$this->Model_Penjualan->hapuslv1($kdbhnbaku,$hapuslv1);
				$this->Model_Penjualan->simpantbpenjualandetailscan($nmbarang,$nmsatuan,$level,$hrgjual,$kdbhnbaku);
				redirect("Penjualan/vieweditpenjualan/".$nota."/".$kdbhnbaku."/".$codescan);
			}
			
		}
//// Lv2 ////
		if($level == "Lv2"){
		if($qty > $lv2){
			redirect("Penjualan/vieweditpenjualan/".$nota."/".$kdbhnbaku."/".$codescan);
		}else{
			
		
			if($isilv1 == "0"){
				redirect("Penjualan/vieweditpenjualan/".$nota."/".$kdbhnbaku."/".$codescan);
			}else if($qty > $isilv2){
				$tambahlv2hapus = $qty + $isilv2;
				if($tambahlv2hapus > $lv2){
					if($isilv1 == "0"){
						redirect("Penjualan/vieweditpenjualan/".$nota."/".$kdbhnbaku."/".$codescan);
					}else if($isilv1 > "0"){
						$sisalv1 = $isilv1 - 1;
						$hasillv2 = $lv2 - ($tambahlv2hapus - $lv2);
					} 
				}else if($tambahlv2hapus < $lv2){
					if($isilv1 == "0"){
						redirect("Penjualan/vieweditpenjualan/".$nota."/".$kdbhnbaku."/".$codescan);
					}else if($isilv1 > "0"){
						$sisalv1 = $isilv1 - 1;
						$hasillv2 =  $lv2 - ($lv2 - $tambahlv2hapus);
					}
				}else if($tambahlv2hapus == $lv2){
					if($isilv1 == "0"){
						redirect("Penjualan/vieweditpenjualan/".$nota."/".$kdbhnbaku."/".$codescan);
					}else if($isilv1 > "0"){
						$sisalv1 = $isilv1 - 1;
						$hasillv2 =  $lv2 + $isilv2 - $qty;
					}
				}
				
				$this->Model_Penjualan->hapuslv2lebihdari($kdbhnbaku,$sisalv1,$hasillv2);
				$this->Model_Penjualan->simpantbpenjualandetailscan($nmbarang,$nmsatuan,$level,$hrgjual,$kdbhnbaku);
				redirect("Penjualan/vieweditpenjualan/".$nota."/".$kdbhnbaku."/".$codescan);
			}else if($qty < $isilv2){
				if($isilv1 == "0"){
					redirect("Penjualan/vieweditpenjualan/".$nota."/".$kdbhnbaku."/".$codescan);
				}else if($isilv1 > "0"){
					$sisalv1kurangdari = $isilv1;
					$hasillv2kurangdari =  $isilv2 - $qty;
				}
				
				$this->Model_Penjualan->hapuslv2kurangdari($kdbhnbaku,$sisalv1kurangdari,$hasillv2kurangdari);
				$this->Model_Penjualan->simpantbpenjualandetailscan($nmbarang,$nmsatuan,$level,$hrgjual,$kdbhnbaku);
				redirect("Penjualan/vieweditpenjualan/".$nota."/".$kdbhnbaku."/".$codescan);
			}else if($qty == $isilv2){
				if($isilv1 == "0"){
					redirect("Penjualan/vieweditpenjualan/".$nota."/".$kdbhnbaku."/".$codescan);
				}else if($isilv1 > "0"){
					$sisalv1samadengan = $isilv1;
					$hasillv2samadengan =  $isilv2 - $qty;
				}
				
				$this->Model_Penjualan->hapuslv2samadengan($kdbhnbaku,$sisalv1samadengan,$hasillv2samadengan);
				$this->Model_Penjualan->simpantbpenjualandetailscan($nmbarang,$nmsatuan,$level,$hrgjual,$kdbhnbaku);
				redirect("Penjualan/vieweditpenjualan/".$nota."/".$kdbhnbaku."/".$codescan);
			}
		}
	}	
//// Lv3 ////
		if($level == "Lv3"){
		if($qty > $lv3){
			redirect("Penjualan/vieweditpenjualan/".$nota."/".$kdbhnbaku."/".$codescan);
		}else{
			if($isilv1 == "0"){
				redirect("Penjualan/vieweditpenjualan/".$nota."/".$kdbhnbaku."/".$codescan);
			}else if($qty > $isilv3){
				$tambahlv3hapus = $isilv3 + $qty;
				
				if($tambahlv3hapus > $lv3){
					if($isilv1 == "0"){
					redirect("Penjualan/vieweditpenjualan/".$nota."/".$kdbhnbaku."/".$codescan);
					}else if($isilv1 > "0"){
						if($isilv2 > "0"){
							$hasillv1lebihdari = $isilv1;
							$hasillv2lebihdari = $isilv2 - 1;
							$hasillv3lebihdari = $lv3 - ($tambahlv3hapus - $lv3);
						}else if($isilv2 == "0"){
							$hasillv1lebihdari = $isilv1 - 1;
							$hasillv2lebihdari = $lv2 - 1;
							$hasillv3lebihdari = $lv3 - ($tambahlv3hapus - $lv3);
						}
					}
				}else if($tambahlv3hapus < $lv3){
					if($isilv1 == "0"){
					redirect("Penjualan/vieweditpenjualan/".$nota."/".$kdbhnbaku."/".$codescan);
					}else if($isilv1 > "0"){
						if($isilv2 > "0"){
							if($isilv3 > "0"){
								$hasillv1lebihdari = $isilv1;
								$hasillv2lebihdari = $isilv2 - 1;
								$hasillv3lebihdari = $lv3 - ($lv3 - $tambahlv3hapus);
							}else if($isilv3 == "0"){
								$hasillv1lebihdari = $isilv1;
								$hasillv2lebihdari = $isilv2 - 1;
								$hasillv3lebihdari = $lv3 - $qty;
							}
						}else if($isilv2 == "0"){
							if($isilv3 > "0"){
								$hasillv1lebihdari = $isilv1 - 1;
								$hasillv2lebihdari = $lv2 - 1;
								$hasillv3lebihdari = $lv3 - ($lv3 - $tambahlv3hapus);
							}else if($isilv3 == "0"){
								$hasillv1lebihdari = $isilv1 - 1;
								$hasillv2lebihdari = $lv2 - 1;
								$hasillv3lebihdari = $lv3 - $qty;
							}
							
						}
					}
				}else if($tambahlv3hapus == $lv3){
					if($isilv1 == "0"){
					redirect("Penjualan/vieweditpenjualan/".$nota."/".$kdbhnbaku."/".$codescan);
					}else if($isilv1 > "0"){
						if($isilv2 > "0"){
							$hasillv1lebihdari = $isilv1;
							$hasillv2lebihdari = $isilv2 - 1;
							$hasillv3lebihdari = $lv3 + $isilv3 - $qty;
						}else if($isilv2 == "0"){
							$hasillv1lebihdari = $isilv1 - 1;
							$hasillv2lebihdari = $lv2 - 1;
							$hasillv3lebihdari = $lv3 + $isilv3 - $qty;
						}
					}
				}
				
				$this->Model_Penjualan->hapuslv3lebihdari($kdbhnbaku,$hasillv1lebihdari,$hasillv2lebihdari,$hasillv3lebihdari);
				
				$this->Model_Penjualan->simpantbpenjualandetailscan($nmbarang,$nmsatuan,$level,$hrgjual,$kdbhnbaku);
				redirect("Penjualan/vieweditpenjualan/".$nota."/".$kdbhnbaku."/".$codescan);
			}else if($qty < $isilv3){
				if($isilv1 == "0"){
					redirect("Penjualan/vieweditpenjualan/".$nota."/".$kdbhnbaku."/".$codescan);
					}else if($isilv1 > "0"){
						$hasillv1kurangdariuntuk3 = $isilv1;
						$hasillv2kurangdariuntuk3 = $isilv2;
						$hasillv3kurangdariuntuk3 = $isilv3 - $qty;
					}
				$this->Model_Penjualan->hapuslv3kurangdari($kdbhnbaku,$hasillv1kurangdariuntuk3,$hasillv2kurangdariuntuk3,$hasillv3kurangdariuntuk3);
				
				$this->Model_Penjualan->simpantbpenjualandetailscan($nmbarang,$nmsatuan,$level,$hrgjual,$kdbhnbaku);
				redirect("Penjualan/vieweditpenjualan/".$nota."/".$kdbhnbaku."/".$codescan);
			}else if($qty == $isilv3){
				if($isilv1 == "0"){
					redirect("Penjualan/vieweditpenjualan/".$nota."/".$kdbhnbaku."/".$codescan);
					}else if($isilv1 > "0"){
						$hasillv1samadenganuntuk3 = $isilv1;
						$hasillv2samadenganuntuk3 = $isilv2;
						$hasillv3samadenganuntuk3 = $isilv3 - $qty;
					}
				$this->Model_Penjualan->hapuslv3samadengan($kdbhnbaku,$hasillv1samadenganuntuk3,$hasillv2samadenganuntuk3,$hasillv3samadenganuntuk3);
				
				$this->Model_Penjualan->simpantbpenjualandetailscan($nmbarang,$nmsatuan,$level,$hrgjual,$kdbhnbaku);
				redirect("Penjualan/vieweditpenjualan/".$nota."/".$kdbhnbaku."/".$codescan);
			}
		}
	}
//// Lv4 ////
if($level == "Lv4"){
	if($qty > $lv4){
			redirect("Penjualan/vieweditpenjualan/".$nota."/".$kdbhnbaku."/".$codescan);
		}else{
			if($isilv1 == "0"){
				redirect("Penjualan/vieweditpenjualan/".$nota."/".$kdbhnbaku."/".$codescan);
			}else if($qty > $isilv4){
				$tambahlv4hapus = $isilv4 + $qty;
				
				if($tambahlv4hapus > $lv4){
					if($isilv1 == "0"){
					redirect("Penjualan/vieweditpenjualan/".$nota."/".$kdbhnbaku."/".$codescan);
					}else if($isilv1 > "0"){
						if($isilv2 > "0"){
							if($isilv3 > "0"){
								$lv1lebihdariuntuk4 = $isilv1;
								$lv2lebihdariuntuk4 = $isilv2;
								$lv3lebihdariuntuk4 = $isilv3 - 1;
								$lv4lebihdariuntuk4 = $lv4 - ($tambahlv4hapus - $lv4);
							}else if($isilv3 == "0"){
								$lv1lebihdariuntuk4 = $isilv1;
								$lv2lebihdariuntuk4 = $isilv2 - 1;
								$lv3lebihdariuntuk4 = $lv3 - 1;
								$lv4lebihdariuntuk4 = $lv4 - ($tambahlv4hapus - $lv4);
							}
						}else if($isilv2 == "0"){
							if($isilv3 > "0"){
								$lv1lebihdariuntuk4 = $isilv1;
								$lv2lebihdariuntuk4 = $isilv2;
								$lv3lebihdariuntuk4 = $isilv3 - 1;
								$lv4lebihdariuntuk4 = $lv4 - ($tambahlv4hapus - $lv4);
							}else if($isilv3 == "0"){
								$lv1lebihdariuntuk4 = $isilv1 - 1;
								$lv2lebihdariuntuk4 = $lv2 - 1;
								$lv3lebihdariuntuk4 = $lv3 - 1;
								$lv4lebihdariuntuk4 = $lv4 - ($tambahlv4hapus - $lv4);
							}
						}
					}
				}else if($tambahlv4hapus < $lv4){
					if($isilv1 == "0"){
					redirect("Penjualan/vieweditpenjualan/".$nota."/".$kdbhnbaku."/".$codescan);
					}else if($isilv1 > "0"){
						if($isilv2 > "0"){
							if($isilv3 > "0"){
								if($isilv4 > "0"){
									$lv1lebihdariuntuk4 = $isilv1;
									$lv2lebihdariuntuk4 = $isilv2;
									$lv3lebihdariuntuk4 = $isilv3 - 1;
									$lv4lebihdariuntuk4 = $lv4 - ($lv4 - $tambahlv4hapus);
								}else if($isilv4 == "0"){
									$lv1lebihdariuntuk4 = $isilv1;
									$lv2lebihdariuntuk4 = $isilv2;
									$lv3lebihdariuntuk4 = $isilv3 - 1;
									$lv4lebihdariuntuk4 = $lv4 - $qty;
								}
								
							}else if($isilv3 == "0"){
								if($isilv4 > "0"){
									$lv1lebihdariuntuk4 = $isilv1;
									$lv2lebihdariuntuk4 = $isilv2 - 1;
									$lv3lebihdariuntuk4 = $lv3 - 1;
									$lv4lebihdariuntuk4 = $lv4 - ($lv4 - $tambahlv4hapus);
								}else if($isilv4 == "0"){
									$lv1lebihdariuntuk4 = $isilv1;
									$lv2lebihdariuntuk4 = $isilv2 - 1;
									$lv3lebihdariuntuk4 = $lv3 - 1;
									$lv4lebihdariuntuk4 = $lv4 - $qty;
								}
								
							}
						}else if($isilv2 == "0"){
							if($isilv3 > "0"){
								if($isilv4 > "0"){
									$lv1lebihdariuntuk4 = $isilv1;
									$lv2lebihdariuntuk4 = $isilv2;
									$lv3lebihdariuntuk4 = $isilv3 - 1;
									$lv4lebihdariuntuk4 = $lv4 - ($lv4 - $tambahlv4hapus);
								}else if($isilv4 == "0"){
									$lv1lebihdariuntuk4 = $isilv1;
									$lv2lebihdariuntuk4 = $isilv2;
									$lv3lebihdariuntuk4 = $isilv3 - 1;
									$lv4lebihdariuntuk4 = $lv4 - $qty;
								}
								
							}else if($isilv3 == "0"){
								if($isilv4 > "0"){
									$lv1lebihdariuntuk4 = $isilv1 - 1;
									$lv2lebihdariuntuk4 = $lv2 - 1;
									$lv3lebihdariuntuk4 = $lv3 - 1;
									$lv4lebihdariuntuk4 = $lv4 - ($lv4 - $tambahlv4hapus);
								}else if($isilv4 == "0"){
									$lv1lebihdariuntuk4 = $isilv1 - 1;
									$lv2lebihdariuntuk4 = $lv2 - 1;
									$lv3lebihdariuntuk4 = $lv3 - 1;
									$lv4lebihdariuntuk4 = $lv4 - $qty;
								}
								
							}
						}
					}
				}else if($tambahlv4hapus == $lv4){
					if($isilv1 == "0"){
					redirect("Penjualan/vieweditpenjualan/".$nota."/".$kdbhnbaku."/".$codescan);
					}else if($isilv1 > "0"){
						if($isilv2 > "0"){
							if($isilv3 > "0"){
								$lv1lebihdariuntuk4 = $isilv1;
								$lv2lebihdariuntuk4 = $isilv2;
								$lv3lebihdariuntuk4 = $isilv3 - 1;
								$lv4lebihdariuntuk4 = $lv4 + $isilv4 - $qty;
							}else if($isilv3 == "0"){
								$lv1lebihdariuntuk4 = $isilv1;
								$lv2lebihdariuntuk4 = $isilv2 - 1;
								$lv3lebihdariuntuk4 = $isilv3 - 1;
								$lv4lebihdariuntuk4 = $lv4 + $isilv4 - $qty;
							}
						}else if($isilv2 == "0"){
							if($isilv3 > "0"){
								$lv1lebihdariuntuk4 = $isilv1;
								$lv2lebihdariuntuk4 = $isilv2;
								$lv3lebihdariuntuk4 = $isilv3 - 1;
								$lv4lebihdariuntuk4 = $lv4 + $isilv4 - $qty;
							}else if($isilv3 == "0"){
								$lv1lebihdariuntuk4 = $isilv1 - 1;
								$lv2lebihdariuntuk4 = $lv2 - 1;
								$lv3lebihdariuntuk4 = $lv3 - 1;
								$lv4lebihdariuntuk4 = $lv4 + $isilv4 - $qty;
							}
						}
					}
				}
				
				$this->Model_Penjualan->hapuslv4lebihdari($kdbhnbaku,$lv1lebihdariuntuk4,$lv2lebihdariuntuk4,$lv3lebihdariuntuk4,$lv4lebihdariuntuk4);
				
				$this->Model_Penjualan->simpantbpenjualandetailscan($nmbarang,$nmsatuan,$level,$hrgjual,$kdbhnbaku);
				redirect("Penjualan/vieweditpenjualan/".$nota."/".$kdbhnbaku."/".$codescan);
			}else if($qty < $isilv4){
				if($isilv1 == "0"){
					redirect("Penjualan/vieweditpenjualan/".$nota."/".$kdbhnbaku."/".$codescan);
					}else if($isilv1 > "0"){
						$lv1kurangdariuntuk4 = $isilv1;
						$lv2kurangdariuntuk4 = $isilv2;
						$lv3kurangdariuntuk4 = $isilv3;
						$lv4kurangdariuntuk4 = $isilv4 - $qty;
					}
				$this->Model_Penjualan->hapuslv4kurangdari($kdbhnbaku,$lv1kurangdariuntuk4,$lv2kurangdariuntuk4,$lv3kurangdariuntuk4,$lv4kurangdariuntuk4);
				
				$this->Model_Penjualan->simpantbpenjualandetailscan($nmbarang,$nmsatuan,$level,$hrgjual,$kdbhnbaku);
				redirect("Penjualan/vieweditpenjualan/".$nota."/".$kdbhnbaku."/".$codescan);
			}else if($qty == $isilv4){
				if($isilv1 == "0"){
					redirect("Penjualan/vieweditpenjualan/".$nota."/".$kdbhnbaku."/".$codescan);
					}else if($isilv1 > "0"){
						$lv1samadenganuntuk4 = $isilv1;
						$lv2samadenganuntuk4 = $isilv2;
						$lv3samadenganuntuk4 = $isilv3;
						$lv4samadenganuntuk4 = $isilv4 - $qty;
					}
				$this->Model_Penjualan->hapuslv4samadengan($kdbhnbaku,$lv1samadenganuntuk4,$lv2samadenganuntuk4,$lv3samadenganuntuk4,$lv4samadenganuntuk4);
				
				$this->Model_Penjualan->simpantbpenjualandetailscan($nmbarang,$nmsatuan,$level,$hrgjual,$kdbhnbaku);
				redirect("Penjualan/vieweditpenjualan/".$nota."/".$kdbhnbaku."/".$codescan);
			}
		}
	}	
	
		}else{
			redirect("Penjualan/vieweditpenjualan/".$nota);
		}	
	}
public function updatenotapenjualan(){
	$this->Model_Penjualan->updatenota();
	
	$nota=$this->input->post("Nota");
	redirect("Penjualan/notapenjualan/".$nota);
}
///////////////////////////////////////////////////////////		


}
