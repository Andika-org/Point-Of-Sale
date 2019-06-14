<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {

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
		$this->load->model('Model_Pembelian');
		
		//$this->load->library('Excel_generator');
	}

public	function index($offset = 0) 
	{
		
	//----- setting pagination  --------------------
	
		$datasesi['sesi'] = $this->session->userdata('admin/Pembelian/V_Pembelian');
		
		if( $datasesi['sesi']['batas'] == 0){
			$usersetting['batas'] = 0;
			$this->session->set_userdata('admin/Pembelian/V_Pembelian',$usersetting);
		}

		$baris = $this->Model_Pembelian->getrowheaderpembelian();
		
		$settingpage = 0;
		if(!empty($satu = 20)){
			$limit = $satu;
			
			$usersetting['batas'] = $limit;
			$this->session->set_userdata('admin/Pembelian/V_Pembelian',$usersetting);
		}
		else if( $datasesi['sesi']['batas'] != 0){
			$limit = $datasesi['sesi']['batas'];
		}
		else{
			$limit = $baris;
		}
		
		
		if(!is_null($offset)){
		$config['uri_segment'] = 3;
		$config['base_url'] = base_url().'Pembelian/index/';
		
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
	
	
    $data['datatable']=$this->Model_Pembelian->listdatapembelianbahanbaku($limit,$offset);
		///////////////////////////////	
	 $data['ent'] = $this->Model_Pembelian->entries();
	 $data['totbaris'] = $limit;
	 /////////////////////////////////////
	 
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/Pembelian/V_Pembelian',$data);
		}
	}
	
public	function index2($offset = 0) 
	{
		
	//----- setting pagination  --------------------

		$datasesi['sesi'] = $this->session->userdata('admin/Pembelian/V_Pembelian');
		
		if( $datasesi['sesi']['batas'] == 0){
			$usersetting['batas'] = 0;
			$this->session->set_userdata('admin/Pembelian/V_Pembelian',$usersetting);
		}

		$baris = $this->Model_Pembelian->getrowheaderpembelian();
		
		$settingpage = 0;
		if(!empty($this->input->post('batas'))){
			$limit = $this->input->post('batas');
			
			$usersetting['batas'] = $limit;
			$this->session->set_userdata('admin/Pembelian/V_Pembelian',$usersetting);
		}
		else if( $datasesi['sesi']['batas'] != 0){
			$limit = $datasesi['sesi']['batas'];
		}
		else{
			$limit = $baris;
		}
		
		
		if(!is_null($offset)){
		$config['uri_segment'] = 3;
		$config['base_url'] = base_url().'Pembelian/index2/';
		
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
	
	
    $data['datatable']=$this->Model_Pembelian->listdatapembelianbahanbaku($limit,$offset);
		///////////////////////////////	
	 $data['ent'] = $this->Model_Pembelian->entries();
	 $data['totbaris'] = $limit;
	 /////////////////////////////////////
	 
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/Pembelian/V_Pembelian',$data);
		}
	}
	
public function tambahpembelianbahanbaku(){
	//mengecek nama validation
	$this->form_validation->set_rules('Id_Transaksi','Id_Transaksi','required');
	$this->form_validation->set_rules('No_Faktur','No_Faktur','required');
	$this->form_validation->set_rules('Kode_User','Kode_User','required');
	$this->form_validation->set_rules('Kode_Bahan_Baku','Kode_Bahan_Baku','required');
	
	if($this->form_validation->run() == TRUE)
	{   
		$kdbhnbaku = $this->input->post("Kode_Bahan_Baku");
		$bhnbku = $this->Model_Pembelian->databahanbaku($kdbhnbaku);
		
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
		
		$qtylv1 = $this->input->post("QtyLv1");
		$qtylv2 = $this->input->post("QtyLv2");
		$qtylv3 = $this->input->post("QtyLv3");
		$qtylv4 = $this->input->post("QtyLv4");
		//$qtylv5 = $this->input->post("QtyLv5");
		
		//// proses pembelian //
		
		//// Lv1 ////
		if($qtylv1){
			$tambahlv1 = $isilv1 + $qtylv1;
			
			$this->Model_Pembelian->updatelv1($kdbhnbaku,$tambahlv1);
			$this->Model_Pembelian->simpanpembeliantbbantu();
			$this->Model_Pembelian->simpanpembelianbahanbaku();
			redirect("Pembelian/tambahpembelianbahanbaku");
		}
		//// Lv2 ////
					
		if($qtylv2){
			//if($lv1 == "0"){
			//	redirect("Pembelian/tambahpembelianbahanbaku");
			//}
	
			if($qtylv2 > $lv2){
				redirect("Pembelian/tambahpembelianbahanbaku");
			}else if($qtylv2 > $isilv2){
				$tambahisilv2 = $qtylv2 + $isilv2;
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
					
				$this->Model_Pembelian->updatelv2($kdbhnbaku,$hasillv1,$hasiltambahisilv2);
				$this->Model_Pembelian->simpanpembeliantbbantu();
				$this->Model_Pembelian->simpanpembelianbahanbaku();
				redirect("Pembelian/tambahpembelianbahanbaku");
				
			}else if($qtylv2 < $isilv2){
				$tambahisilv2kurangdari = $qtylv2 + $isilv2;
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
					
				$this->Model_Pembelian->updatelv2kurangdari($kdbhnbaku,$hasillv1kurangdari,$hasiltambahisilv2kurangdari);
				$this->Model_Pembelian->simpanpembeliantbbantu();
				$this->Model_Pembelian->simpanpembelianbahanbaku();
				redirect("Pembelian/tambahpembelianbahanbaku");	
				
			}else if ($qtylv2 == $isilv2){
				$tambahisilv2samadengan = $qtylv2 + $isilv2;
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
					
				$this->Model_Pembelian->updatelv2samadengan($kdbhnbaku,$hasillv1samadengan,$hasiltambahisilv2samadengan);
				$this->Model_Pembelian->simpanpembeliantbbantu();
				$this->Model_Pembelian->simpanpembelianbahanbaku();
				redirect("Pembelian/tambahpembelianbahanbaku");	
			}
		}
		
		//// Lv3 ////
		if($qtylv3){
			//if($lv1 == "0"){
			//	redirect("Pembelian/tambahpembelianbahanbaku");
			//}

			if($qtylv3 > $lv3){
				redirect("Pembelian/tambahpembelianbahanbaku");
			}else if($qtylv3 > $isilv3){
				$tambahisilv3 = $qtylv3 + $isilv3;
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
					
				$this->Model_Pembelian->updatelv3($kdbhnbaku,$hasilsisalv1,$hasillv2,$hasiltambahisilv3);
				$this->Model_Pembelian->simpanpembeliantbbantu();
				$this->Model_Pembelian->simpanpembelianbahanbaku();
				redirect("Pembelian/tambahpembelianbahanbaku");
				
			}else if($qtylv3 < $isilv3){
				$tambahisilv3kurangdari = $qtylv3 + $isilv3;
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
					
				$this->Model_Pembelian->updatelv3kurangdari($kdbhnbaku,$hasilsisalv1kurangdari,$hasillv2kurangdari,$hasiltambahisilv3kurangdari);
				$this->Model_Pembelian->simpanpembeliantbbantu();
				$this->Model_Pembelian->simpanpembelianbahanbaku();
				redirect("Pembelian/tambahpembelianbahanbaku");
				
			}else if($qtylv3 == $isilv3){
				$tambahisilv3samadengan = $qtylv3 + $isilv3;
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
					
				$this->Model_Pembelian->updatelv3samadengan($kdbhnbaku,$hasilsisalv1samadengan,$hasillv2samadengan,$hasiltambahisilv3samadengan);
				$this->Model_Pembelian->simpanpembeliantbbantu();
				$this->Model_Pembelian->simpanpembelianbahanbaku();
				redirect("Pembelian/tambahpembelianbahanbaku");	
			}
			
		}
		/////////////////////////////////////
		//// Lv4 ////
		if($qtylv4){
			//if($lv1 == "0"){
			//	redirect("Pembelian/tambahpembelianbahanbaku");
			//}

			if($qtylv4 > $lv4){
				redirect("Pembelian/tambahpembelianbahanbaku");
			}else if($qtylv4 > $isilv4){
				$tambahisilv4 = $qtylv4 + $isilv4;
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
					
				$this->Model_Pembelian->updatelv4($kdbhnbaku,$hasilsisalv1untuk4,$hasilsisalv2,$hasillv3,$hasiltambahisilv4);
				$this->Model_Pembelian->simpanpembeliantbbantu();
				$this->Model_Pembelian->simpanpembelianbahanbaku();
				redirect("Pembelian/tambahpembelianbahanbaku");
				
			}else if($qtylv4 < $isilv4){
				$tambahisilv4kurangdari = $qtylv4 + $isilv4;
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
					
				$this->Model_Pembelian->updatelv4kurangdari($kdbhnbaku,$hasilsisalv1untuk4kurangdari,$hasilsisalv2kurangdari,$hasillv3kurangdari,$hasiltambahisilv4kurangdari);
				$this->Model_Pembelian->simpanpembeliantbbantu();
				$this->Model_Pembelian->simpanpembelianbahanbaku();
				redirect("Pembelian/tambahpembelianbahanbaku");
				
			}else if($qtylv4 == $isilv4){
				$tambahisilv4samadengan = $qtylv4 + $isilv4;
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
					
				$this->Model_Pembelian->updatelv4samadengan($kdbhnbaku,$hasilsisalv1untuk4samadengan,$hasilsisalv2samadengan,$hasillv3samadengan,$hasiltambahisilv4samadengan);
				$this->Model_Pembelian->simpanpembeliantbbantu();
				$this->Model_Pembelian->simpanpembelianbahanbaku();
				redirect("Pembelian/tambahpembelianbahanbaku");	
			}
			
		}
	}
	
	$cari = $this->Model_Pembelian->faktur();
		if($cari){
			$data['fak'] = $cari;
		}
	$cari2 = $this->Model_Pembelian->trans();
		if($cari2){
			$data['tr'] = $cari2;
		}
	$cari3 = $this->Model_Pembelian->datasupplier();
		if($cari3){
			$data['sp'] = $cari3;
		}	
	$cari4 = $this->Model_Pembelian->totalbeli();
		if($cari4){
			$data['tot'] = $cari4;
		}
		
	
	$data ['datatable']= $this->Model_Pembelian->listdatadetailbahanbaku();
	
		$this->load->view('admin/Menuadmin');
		$this->load->view('admin/Pembelian/Inputpembelian',$data);
	}

public function konfirmasipembelian(){
	
	//mengecek nama validation
	
	$this->form_validation->set_rules('No_Faktur','No_Faktur','required');
	
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
            $id = $this->input->post('No_Faktur');
			$this->Model_Pembelian->simpanheaderpembelian();
			
			
			$this->Model_Pembelian->hapustbbantupembelian();
			redirect(base_url('Pembelian/cetaknota/'.$id));
	}
/*
	$cari = $this->Model_Pembelian->faktur();
		if($cari){
			$data['fak'] = $cari;
		}
	$cari2 = $this->Model_Pembelian->trans();
		if($cari2){
			$data['tr'] = $cari2;
		}
	$cari3 = $this->Model_Pembelian->datasupplier();
		if($cari3){
			$data['sp'] = $cari3;
		}	
	$cari4 = $this->Model_Pembelian->totalbeli();
		if($cari4){
			$data['tot'] = $cari4;
		}

	
	//$chart['totalbeli']=$this->model_pembelian->hitungjumlahbeli();	
	$this->load->view('admin/Menuadmin');
		$this->load->view('admin/Pembelian/Konfirmasipembelianbahanbaku',$data);
		*/
}

public function hapuspembelian(){
$id = $this->uri->segment(3); 
$blibhnbku = $this->Model_Pembelian->bhnbakutbbantupembelian($id);
	$qty = $blibhnbku["Qty"];
	$level = $blibhnbku["Level"];
	$kdbhnbaku = $blibhnbku["Kode_Bahan_Baku"];

$bhnbku = $this->Model_Pembelian->databahanbaku($kdbhnbaku);
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
				redirect("Pembelian/tambahpembelianbahanbaku");
			}else if ($qty > $isilv1){
				redirect("Pembelian/tambahpembelianbahanbaku");
			}else if ($isilv1 > "0"){
				$hapuslv1 = $isilv1 - $qty;
				$this->Model_Pembelian->hapuslv1($kdbhnbaku,$hapuslv1);
				$this->Model_Pembelian->hapusbantupembelian($id);
				$this->Model_Pembelian->hapuspembelian($id); 
				redirect("Pembelian/tambahpembelianbahanbaku");
			}
			
		}
//// Lv2 ////
		if($level == "Lv2"){
			if($isilv1 == "0"){
				redirect("Pembelian/tambahpembelianbahanbaku");
			}else if($qty > $isilv2){
				$tambahlv2hapus = $qty + $isilv2;
				if($tambahlv2hapus > $lv2){
					if($isilv1 == "0"){
						redirect("Pembelian/tambahpembelianbahanbaku");
					}else if($isilv1 > "0"){
						$sisalv1 = $isilv1 - 1;
						$hasillv2 = $lv2 - ($tambahlv2hapus - $lv2);
					} 
				}else if($tambahlv2hapus < $lv2){
					if($isilv1 == "0"){
						redirect("Pembelian/tambahpembelianbahanbaku");
					}else if($isilv1 > "0"){
						$sisalv1 = $isilv1 - 1;
						$hasillv2 =  $lv2 - ($lv2 - $tambahlv2hapus);
					}
				}else if($tambahlv2hapus == $lv2){
					if($isilv1 == "0"){
						redirect("Pembelian/tambahpembelianbahanbaku");
					}else if($isilv1 > "0"){
						$sisalv1 = $isilv1 - 1;
						$hasillv2 =  $lv2 + $isilv2 - $qty;
					}
				}
				
				$this->Model_Pembelian->hapuslv2lebihdari($kdbhnbaku,$sisalv1,$hasillv2);
				$this->Model_Pembelian->hapusbantupembelian($id);
				$this->Model_Pembelian->hapuspembelian($id);
				redirect("Pembelian/tambahpembelianbahanbaku");
			}else if($qty < $isilv2){
				if($isilv1 == "0"){
					redirect("Pembelian/tambahpembelianbahanbaku");
				}else if($isilv1 > "0"){
					$sisalv1kurangdari = $isilv1;
					$hasillv2kurangdari =  $isilv2 - $qty;
				}
				
				$this->Model_Pembelian->hapuslv2kurangdari($kdbhnbaku,$sisalv1kurangdari,$hasillv2kurangdari);
				$this->Model_Pembelian->hapusbantupembelian($id);
				$this->Model_Pembelian->hapuspembelian($id);
				redirect("Pembelian/tambahpembelianbahanbaku");
			}else if($qty == $isilv2){
				if($isilv1 == "0"){
					redirect("Pembelian/tambahpembelianbahanbaku");
				}else if($isilv1 > "0"){
					$sisalv1samadengan = $isilv1;
					$hasillv2samadengan =  $isilv2 - $qty;
				}
				
				$this->Model_Pembelian->hapuslv2samadengan($kdbhnbaku,$sisalv1samadengan,$hasillv2samadengan);
				$this->Model_Pembelian->hapusbantupembelian($id);
				$this->Model_Pembelian->hapuspembelian($id);
				redirect("Pembelian/tambahpembelianbahanbaku");
			}
		}
			
//// Lv3 ////
		if($level == "Lv3"){
			if($isilv1 == "0"){
				redirect("Pembelian/tambahpembelianbahanbaku");
			}else if($qty > $isilv3){
				$tambahlv3hapus = $isilv3 + $qty;
				
				if($tambahlv3hapus > $lv3){
					if($isilv1 == "0"){
					redirect("Pembelian/tambahpembelianbahanbaku");
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
					redirect("Pembelian/tambahpembelianbahanbaku");
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
					redirect("Pembelian/tambahpembelianbahanbaku");
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
				
				$this->Model_Pembelian->hapuslv3lebihdari($kdbhnbaku,$hasillv1lebihdari,$hasillv2lebihdari,$hasillv3lebihdari);
				$this->Model_Pembelian->hapusbantupembelian($id);
				$this->Model_Pembelian->hapuspembelian($id);
				redirect("Pembelian/tambahpembelianbahanbaku");
			}else if($qty < $isilv3){
				if($isilv1 == "0"){
					redirect("Pembelian/tambahpembelianbahanbaku");
					}else if($isilv1 > "0"){
						$hasillv1kurangdariuntuk3 = $isilv1;
						$hasillv2kurangdariuntuk3 = $isilv2;
						$hasillv3kurangdariuntuk3 = $isilv3 - $qty;
					}
				$this->Model_Pembelian->hapuslv3kurangdari($kdbhnbaku,$hasillv1kurangdariuntuk3,$hasillv2kurangdariuntuk3,$hasillv3kurangdariuntuk3);
				$this->Model_Pembelian->hapusbantupembelian($id);
				$this->Model_Pembelian->hapuspembelian($id);
				redirect("Pembelian/tambahpembelianbahanbaku");
			}else if($qty == $isilv3){
				if($isilv1 == "0"){
					redirect("Pembelian/tambahpembelianbahanbaku");
					}else if($isilv1 > "0"){
						$hasillv1samadenganuntuk3 = $isilv1;
						$hasillv2samadenganuntuk3 = $isilv2;
						$hasillv3samadenganuntuk3 = $isilv3 - $qty;
					}
				$this->Model_Pembelian->hapuslv3samadengan($kdbhnbaku,$hasillv1samadenganuntuk3,$hasillv2samadenganuntuk3,$hasillv3samadenganuntuk3);
				$this->Model_Pembelian->hapusbantupembelian($id);
				$this->Model_Pembelian->hapuspembelian($id);
				redirect("Pembelian/tambahpembelianbahanbaku");
			}
		}
//// Lv4 ////
if($level == "Lv4"){
			if($isilv1 == "0"){
				redirect("Pembelian/tambahpembelianbahanbaku");
			}else if($qty > $isilv4){
				$tambahlv4hapus = $isilv4 + $qty;
				
				if($tambahlv4hapus > $lv4){
					if($isilv1 == "0"){
					redirect("Pembelian/tambahpembelianbahanbaku");
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
					redirect("Pembelian/tambahpembelianbahanbaku");
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
					redirect("Pembelian/tambahpembelianbahanbaku");
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
				
				$this->Model_Pembelian->hapuslv4lebihdari($kdbhnbaku,$lv1lebihdariuntuk4,$lv2lebihdariuntuk4,$lv3lebihdariuntuk4,$lv4lebihdariuntuk4);
				$this->Model_Pembelian->hapusbantupembelian($id);
				$this->Model_Pembelian->hapuspembelian($id);
				redirect("Pembelian/tambahpembelianbahanbaku");
			}else if($qty < $isilv4){
				if($isilv1 == "0"){
					redirect("Pembelian/tambahpembelianbahanbaku");
					}else if($isilv1 > "0"){
						$lv1kurangdariuntuk4 = $isilv1;
						$lv2kurangdariuntuk4 = $isilv2;
						$lv3kurangdariuntuk4 = $isilv3;
						$lv4kurangdariuntuk4 = $isilv4 - $qty;
					}
				$this->Model_Pembelian->hapuslv4kurangdari($kdbhnbaku,$lv1kurangdariuntuk4,$lv2kurangdariuntuk4,$lv3kurangdariuntuk4,$lv4kurangdariuntuk4);
				$this->Model_Pembelian->hapusbantupembelian($id);
				$this->Model_Pembelian->hapuspembelian($id);
				redirect("Pembelian/tambahpembelianbahanbaku");
			}else if($qty == $isilv4){
				if($isilv1 == "0"){
					redirect("Pembelian/tambahpembelianbahanbaku");
					}else if($isilv1 > "0"){
						$lv1samadenganuntuk4 = $isilv1;
						$lv2samadenganuntuk4 = $isilv2;
						$lv3samadenganuntuk4 = $isilv3;
						$lv4samadenganuntuk4 = $isilv4 - $qty;
					}
				$this->Model_Pembelian->hapuslv4samadengan($kdbhnbaku,$lv1samadenganuntuk4,$lv2samadenganuntuk4,$lv3samadenganuntuk4,$lv4samadenganuntuk4);
				$this->Model_Pembelian->hapusbantupembelian($id);
				$this->Model_Pembelian->hapuspembelian($id);
				redirect("Pembelian/tambahpembelianbahanbaku");
			}
		}		
//$this->Model_Pembelian->hapusbantupembelian($id);
//$this->Model_Pembelian->hapuspembelian($id); 
//redirect(base_url("Pembelian/Tambahpembelianbahanbaku")); 
}
public function viewhapuspembelian(){
	$faktur = $this->uri->segment(3);
	$data["header"] = $this->Model_Pembelian->dataheaderpembelian($faktur);
	$data["sumtotal"] = $this->Model_Pembelian->totalbelihapus($faktur);
	$data["datatable"] = $this->Model_Pembelian->listdetailpembelian($faktur);
	
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/Pembelian/Hapuspembelian',$data);
}
public function hapuspembeliandetail(){
$id = $this->uri->segment(3); 
$faktur = $this->uri->segment(4);
$blibhnbku = $this->Model_Pembelian->bhnbakutbdetailpembelian($id);
	$qty = $blibhnbku["Qty"];
	$level = $blibhnbku["Level"];
	$kdbhnbaku = $blibhnbku["Kode_Bahan_Baku"];

$bhnbku = $this->Model_Pembelian->databahanbaku($kdbhnbaku);
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
				redirect("Pembelian/viewhapuspembelian/".$faktur);
			}else if ($qty > $isilv1){
				redirect("Pembelian/viewhapuspembelian/".$faktur);
			}else if ($isilv1 > "0"){
				$hapuslv1 = $isilv1 - $qty;
				$this->Model_Pembelian->hapuslv1($kdbhnbaku,$hapuslv1);
				$this->Model_Pembelian->hapusbantupembelian($id);
				$this->Model_Pembelian->hapuspembelian($id); 
				redirect("Pembelian/viewhapuspembelian/".$faktur);
			}
			
		}
//// Lv2 ////
		if($level == "Lv2"){
			if($isilv1 == "0"){
				redirect("Pembelian/viewhapuspembelian/".$faktur);
			}else if($qty > $isilv2){
				$tambahlv2hapus = $qty + $isilv2;
				if($tambahlv2hapus > $lv2){
					if($isilv1 == "0"){
						redirect("Pembelian/viewhapuspembelian/".$faktur);
					}else if($isilv1 > "0"){
						$sisalv1 = $isilv1 - 1;
						$hasillv2 = $lv2 - ($tambahlv2hapus - $lv2);
					} 
				}else if($tambahlv2hapus < $lv2){
					if($isilv1 == "0"){
						redirect("Pembelian/viewhapuspembelian/".$faktur);
					}else if($isilv1 > "0"){
						$sisalv1 = $isilv1 - 1;
						$hasillv2 =  $lv2 - ($lv2 - $tambahlv2hapus);
					}
				}else if($tambahlv2hapus == $lv2){
					if($isilv1 == "0"){
						redirect("Pembelian/viewhapuspembelian/".$faktur);
					}else if($isilv1 > "0"){
						$sisalv1 = $isilv1 - 1;
						$hasillv2 =  $lv2 + $isilv2 - $qty;
					}
				}
				
				$this->Model_Pembelian->hapuslv2lebihdari($kdbhnbaku,$sisalv1,$hasillv2);
				$this->Model_Pembelian->hapusbantupembelian($id);
				$this->Model_Pembelian->hapuspembelian($id);
				redirect("Pembelian/viewhapuspembelian/".$faktur);
			}else if($qty < $isilv2){
				if($isilv1 == "0"){
					redirect("Pembelian/viewhapuspembelian/".$faktur);
				}else if($isilv1 > "0"){
					$sisalv1kurangdari = $isilv1;
					$hasillv2kurangdari =  $isilv2 - $qty;
				}
				
				$this->Model_Pembelian->hapuslv2kurangdari($kdbhnbaku,$sisalv1kurangdari,$hasillv2kurangdari);
				$this->Model_Pembelian->hapusbantupembelian($id);
				$this->Model_Pembelian->hapuspembelian($id);
				redirect("Pembelian/viewhapuspembelian/".$faktur);
			}else if($qty == $isilv2){
				if($isilv1 == "0"){
					redirect("Pembelian/viewhapuspembelian/".$faktur);
				}else if($isilv1 > "0"){
					$sisalv1samadengan = $isilv1;
					$hasillv2samadengan =  $isilv2 - $qty;
				}
				
				$this->Model_Pembelian->hapuslv2samadengan($kdbhnbaku,$sisalv1samadengan,$hasillv2samadengan);
				$this->Model_Pembelian->hapusbantupembelian($id);
				$this->Model_Pembelian->hapuspembelian($id);
				redirect("Pembelian/viewhapuspembelian/".$faktur);
			}
		}
			
//// Lv3 ////
		if($level == "Lv3"){
			if($isilv1 == "0"){
				redirect("Pembelian/viewhapuspembelian/".$faktur);
			}else if($qty > $isilv3){
				$tambahlv3hapus = $isilv3 + $qty;
				
				if($tambahlv3hapus > $lv3){
					if($isilv1 == "0"){
					redirect("Pembelian/viewhapuspembelian/".$faktur);
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
					redirect("Pembelian/viewhapuspembelian/".$faktur);
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
					redirect("Pembelian/viewhapuspembelian/".$faktur);
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
				
				$this->Model_Pembelian->hapuslv3lebihdari($kdbhnbaku,$hasillv1lebihdari,$hasillv2lebihdari,$hasillv3lebihdari);
				$this->Model_Pembelian->hapusbantupembelian($id);
				$this->Model_Pembelian->hapuspembelian($id);
				redirect("Pembelian/viewhapuspembelian/".$faktur);
			}else if($qty < $isilv3){
				if($isilv1 == "0"){
					redirect("Pembelian/viewhapuspembelian/".$faktur);
					}else if($isilv1 > "0"){
						$hasillv1kurangdariuntuk3 = $isilv1;
						$hasillv2kurangdariuntuk3 = $isilv2;
						$hasillv3kurangdariuntuk3 = $isilv3 - $qty;
					}
				$this->Model_Pembelian->hapuslv3kurangdari($kdbhnbaku,$hasillv1kurangdariuntuk3,$hasillv2kurangdariuntuk3,$hasillv3kurangdariuntuk3);
				$this->Model_Pembelian->hapusbantupembelian($id);
				$this->Model_Pembelian->hapuspembelian($id);
				redirect("Pembelian/viewhapuspembelian/".$faktur);
			}else if($qty == $isilv3){
				if($isilv1 == "0"){
					redirect("Pembelian/viewhapuspembelian/".$faktur);
					}else if($isilv1 > "0"){
						$hasillv1samadenganuntuk3 = $isilv1;
						$hasillv2samadenganuntuk3 = $isilv2;
						$hasillv3samadenganuntuk3 = $isilv3 - $qty;
					}
				$this->Model_Pembelian->hapuslv3samadengan($kdbhnbaku,$hasillv1samadenganuntuk3,$hasillv2samadenganuntuk3,$hasillv3samadenganuntuk3);
				$this->Model_Pembelian->hapusbantupembelian($id);
				$this->Model_Pembelian->hapuspembelian($id);
				redirect("Pembelian/viewhapuspembelian/".$faktur);
			}
		}
//// Lv4 ////
if($level == "Lv4"){
			if($isilv1 == "0"){
				redirect("Pembelian/viewhapuspembelian/".$faktur);
			}else if($qty > $isilv4){
				$tambahlv4hapus = $isilv4 + $qty;
				
				if($tambahlv4hapus > $lv4){
					if($isilv1 == "0"){
					redirect("Pembelian/viewhapuspembelian/".$faktur);
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
					redirect("Pembelian/viewhapuspembelian/".$faktur);
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
					redirect("Pembelian/viewhapuspembelian/".$faktur);
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
				
				$this->Model_Pembelian->hapuslv4lebihdari($kdbhnbaku,$lv1lebihdariuntuk4,$lv2lebihdariuntuk4,$lv3lebihdariuntuk4,$lv4lebihdariuntuk4);
				$this->Model_Pembelian->hapusbantupembelian($id);
				$this->Model_Pembelian->hapuspembelian($id);
				redirect("Pembelian/viewhapuspembelian/".$faktur);
			}else if($qty < $isilv4){
				if($isilv1 == "0"){
					redirect("Pembelian/viewhapuspembelian/".$faktur);
					}else if($isilv1 > "0"){
						$lv1kurangdariuntuk4 = $isilv1;
						$lv2kurangdariuntuk4 = $isilv2;
						$lv3kurangdariuntuk4 = $isilv3;
						$lv4kurangdariuntuk4 = $isilv4 - $qty;
					}
				$this->Model_Pembelian->hapuslv4kurangdari($kdbhnbaku,$lv1kurangdariuntuk4,$lv2kurangdariuntuk4,$lv3kurangdariuntuk4,$lv4kurangdariuntuk4);
				$this->Model_Pembelian->hapusbantupembelian($id);
				$this->Model_Pembelian->hapuspembelian($id);
				redirect("Pembelian/viewhapuspembelian/".$faktur);
			}else if($qty == $isilv4){
				if($isilv1 == "0"){
					redirect("Pembelian/viewhapuspembelian/".$faktur);
					}else if($isilv1 > "0"){
						$lv1samadenganuntuk4 = $isilv1;
						$lv2samadenganuntuk4 = $isilv2;
						$lv3samadenganuntuk4 = $isilv3;
						$lv4samadenganuntuk4 = $isilv4 - $qty;
					}
				$this->Model_Pembelian->hapuslv4samadengan($kdbhnbaku,$lv1samadenganuntuk4,$lv2samadenganuntuk4,$lv3samadenganuntuk4,$lv4samadenganuntuk4);
				$this->Model_Pembelian->hapusbantupembelian($id);
				$this->Model_Pembelian->hapuspembelian($id);
				redirect("Pembelian/viewhapuspembelian/".$faktur);
			}
		}		
}

public function editnota(){
	//mengecek nama validation
	$kodenya = $this->uri->segment(3);
	$this->form_validation->set_rules('No_Faktur','No_Faktur','required');
	//$this->form_validation->set_rules('Kode_User','Kode_User','required');
	//$this->form_validation->set_rules('Kode_Supplier','Kode_Supplier','required');
	//$this->form_validation->set_rules('Tanggal_Pembelian','Tanggal_Pembelian','required');
	//$this->form_validation->set_rules('Jenis_Pembayaran','Jenis_Pembayaran','required');
	//$this->form_validation->set_rules('Tanggal_Jatuh_Tempo','Tanggal_Jatuh_Tempo','required');
	//$this->form_validation->set_rules('Total_Pembelian','Total_Pembelian','required');
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
            
			$this->Model_Pembelian->updatenota();
					
			//$this->model_pembelian->hapusdetailpembelian();
			//redirect(base_url('index.php/pembelian/index'));
	}	
	$cari3 = $this->Model_Pembelian->datasupplier();
		if($cari3){
			$data['sp'] = $cari3;
		}
		
	$sp=$this->Model_Pembelian->ambil_data_headerpembelian($kodenya);
	$y = $sp['Kode_Supplier'];
	$user = $sp['Kode_User'];
	
	$data['ss'] = $this->Model_Pembelian->notsupplier($y);
	$data['uss'] = $this->Model_Pembelian->notuser($user);
	$data['baris']=$this->Model_Pembelian->ambil_data_headerpembelian($kodenya);
	
	//$chart['totalbeli']=$this->model_pembelian->hitungjumlahbeli();	
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/Pembelian/Editkonfirmasipembelianbahanbaku',$data);
	}
public function statuspembelian(){
	
	$this->Model_Pembelian->updatestatus();
	redirect(base_url("Pembelian/index"));
}

public function cariautobahanbakupembelian()
	{
		// tangkap variabel keyword dari URL
		$keyword = $this->uri->segment(3);

		// cari di database
		$data = $this->Model_Pembelian->getdataautocomplete($keyword);	

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

public	function carinota() 
	{
    $data['datatable']=$this->Model_Pembelian->searchingdatanota();
        if($data['datatable']==null){		
	redirect(base_url("Pembelian/index"));
    }
		else {
	$data['t'] = $this->Model_Pembelian->totalsemuapembelian();
	$data['ttlbln'] = $this->Model_Pembelian->totalperbulan();
	
	
	$data['ent'] = $this->Model_Pembelian->entries();
	 
	$baris = $this->Model_Pembelian->getrowheaderpembelian();
	$limit=$baris;
	$data['totbaris'] = $limit;
	
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/Pembelian/V_Pembelian',$data);
		}

	}
		
public	function caripembelian() 
	{
    $data['datatable']=$this->Model_Pembelian->searchingdataall();
        if($data['datatable']==null){		
	redirect(base_url("Pembelian/index"));
    }
		else {
	$data['t'] = $this->Model_Pembelian->totalsemuapembelian();
	$data['ttlbln'] = $this->Model_Pembelian->totalperbulan();
	
	
	$data['ent'] = $this->Model_Pembelian->entries();
	 
	$baris = $this->Model_Pembelian->getrowheaderpembelian();
	$limit=$baris;
	$data['totbaris'] = $limit;
	
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/Pembelian/V_Pembelian',$data);
		}

	}
	
public function ceknota($kodenya){
	$sp=$this->Model_Pembelian->ambil_data_headerpembelian($kodenya);
	$y = $sp['Kode_Supplier'];
	$user = $sp['Kode_User'];
	$faktur = $sp['No_Faktur'];

	$data['ss'] = $this->Model_Pembelian->notsupplier($y);
	$data['uss'] = $this->Model_Pembelian->notuser($user);
	$data['fak'] = $this->Model_Pembelian->listdatadetailbahanbaku2($faktur);
	
	$data['baris']=$this->Model_Pembelian->ambil_data_headerpembelian($kodenya);
	
	//$chart['totalbeli']=$this->model_pembelian->hitungjumlahbeli();	
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/Pembelian/Ceknota',$data);
	}
	
public function hapusnota(){
$id = $this->uri->segment(3); 
$ardel = ($id); 
$rowdel= $this->Model_Pembelian->ambil_data_headerpembelian($ardel); 

$la = $rowdel['Bukti_Pembayaran'];
unlink('./fotobuktipembayaran/'.$la); 

$this->Model_Pembelian->hapusheaderbeli($ardel); 
redirect(base_url("Pembelian/index")); 
}

public function cetaknota(){
	$kodenya = $this->uri->segment(3);
	$sp=$this->Model_Pembelian->ambil_data_headerpembelian($kodenya);
	$y = $sp['Kode_Supplier'];
	$user = $sp['Kode_User'];
	$faktur = $sp['No_Faktur'];
	
	$data['ss'] = $this->Model_Pembelian->notsupplier($y);
	$data['uss'] = $this->Model_Pembelian->notuser($user);
	$data['fak'] = $this->Model_Pembelian->listdatadetailbahanbaku2($faktur);
	
	$data['toko']=$this->Model_Pembelian->datatoko();
	
	$data['baris']=$this->Model_Pembelian->ambil_data_headerpembelian($kodenya);
	
	$data['faktur']= $sp['No_Faktur'];
	//
	$ambiltotal = $this->Model_Pembelian->ambil_data_headerpembelian($kodenya);
	$terbilang = $ambiltotal['Total_Pembelian']; 
	
	$data['terbilang'] = to_word($terbilang);
	//
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/Pembelian/Lihatcetaknota',$data);
}
public function cetaknotaexcel(){
	$kodenya = $this->uri->segment(3);
	
	$sp=$this->Model_Pembelian->ambil_data_headerpembelian($kodenya);
	$y = $sp['Kode_Supplier'];
	$user = $sp['Kode_User'];
	$faktur = $sp['No_Faktur'];
	
	$data['ss'] = $this->Model_Pembelian->notsupplier($y);
	$data['uss'] = $this->Model_Pembelian->notuser($user);
	$data['fak'] = $this->Model_Pembelian->listdatadetailbahanbaku2($faktur);
	$data['toko']=$this->Model_Pembelian->datatoko();
	
	$data['baris']=$this->Model_Pembelian->ambil_data_headerpembelian($kodenya);
	//
	$ambiltotal = $this->Model_Pembelian->ambil_data_headerpembelian($kodenya);
	$terbilang = $ambiltotal['Total_Pembelian']; 
	
	$data['terbilang'] = to_word($terbilang);
	//

	$this->load->view('admin/Pembelian/Cetaknota',$data);
}
public function cetaknotaperbulan($kodenya){
	$sp=$this->Model_Pembelian->ambil_data_headerpembelian($kodenya);
	$y = $sp['Kode_Supplier'];
	
	$us=$this->Model_Pembelian->ambil_data_headerpembelian($kodenya);
	$user = $us['Kode_User'];
	
	$fk=$this->Model_Pembelian->ambil_data_headerpembelian($kodenya);
	$faktur = $fk['No_Faktur'];
	
	$data['ss'] = $this->Model_Pembelian->notsupplier($y);
	$data['uss'] = $this->Model_Pembelian->notuser($user);
	$data['fak'] = $this->Model_Pembelian->listdatadetailbahanbaku2($faktur);
	
	$data['baris']=$this->Model_Pembelian->ambil_data_headerpembelian($kodenya);

	$this->load->view('admin/Pembelian/Cetaknota',$data);
}


}
