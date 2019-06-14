<?php
class ReturPembelian extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Model_ReturPembelian');
		
	}
public	function index($offset = 0) 
	{
		
		//----- setting pagination  --------------------

		$datasesi['sesi'] = $this->session->userdata('admin/returpembelian/V_Retur');
		
		if( $datasesi['sesi']['batas'] == 0){
			$usersetting['batas'] = 0;
			$this->session->set_userdata('admin/returpembelian/V_Retur',$usersetting);
		}

		$baris = $this->Model_ReturPembelian->getrowsreturpembelian();
		
		$settingpage = 0;
		if(!empty($satu = 20)){
			$limit = $satu;
			
			$usersetting['batas'] = $limit;
			$this->session->set_userdata('admin/returpembelian/V_Retur',$usersetting);
		}
		else if( $datasesi['sesi']['batas'] != 0){
			$limit = $datasesi['sesi']['batas'];
		}
		else{
			$limit = $baris;
		}
		
		
		if(!is_null($offset)){
		$config['uri_segment'] = 3;
		$config['base_url'] = base_url().'ReturPembelian/index/';
		
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
	
		
    $data['datatable']=$this->Model_ReturPembelian->listdatareturpembelian($limit,$offset);
	////////////////////////////////////////////////
     $data['ent'] = $this->Model_ReturPembelian->entries();
	 $data['totbaris'] = $limit;
	//$chart['totalbeli']=$this->model_pembelian->hitungjumlahbeli();	
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/returpembelian/V_Retur',$data);
		}
	}
	
public	function index2($offset = 0) 
	{
		
		//----- setting pagination  --------------------

		$datasesi['sesi'] = $this->session->userdata('admin/returpembelian/V_Retur');
		
		if( $datasesi['sesi']['batas'] == 0){
			$usersetting['batas'] = 0;
			$this->session->set_userdata('admin/returpembelian/V_Retur',$usersetting);
		}

		$baris = $this->Model_ReturPembelian->getrowsreturpembelian();
		
		$settingpage = 0;
		if(!empty($this->input->post('batas'))){
			$limit = $this->input->post('batas');
			
			$usersetting['batas'] = $limit;
			$this->session->set_userdata('admin/returpembelian/V_Retur',$usersetting);
		}
		else if( $datasesi['sesi']['batas'] != 0){
			$limit = $datasesi['sesi']['batas'];
		}
		else{
			$limit = $baris;
		}
		
		
		if(!is_null($offset)){
		$config['uri_segment'] = 3;
		$config['base_url'] = base_url().'ReturPembelian/index2/';
		
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
	
		
    $data['datatable']=$this->Model_ReturPembelian->listdatareturpembelian($limit,$offset);
	////////////////////////////////////////////////
     $data['ent'] = $this->Model_ReturPembelian->entries();
	 $data['totbaris'] = $limit;
	//$chart['totalbeli']=$this->model_pembelian->hitungjumlahbeli();	
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/returpembelian/V_Retur',$data);
		}
	}


public function tambahreturpembelian(){
	//mengecek nama validation
	$this->form_validation->set_rules('Kode_User','Kode_User','required');
	
		
	if($this->form_validation->run() == TRUE)
	{ 
		
		$this->Model_ReturPembelian->simpanreturpembelian();
		$id = $this->input->post('No_Retur');
		$this->Model_ReturPembelian->hapusdetailbantusetelahselesairetur($id);
		redirect('ReturPembelian/lihatcetakreturpembelian/'.$id);
	}
	
	$data['noretur'] = $this->Model_ReturPembelian->noretur();
	$data['datadetailbantu'] = $this->Model_ReturPembelian->detailbantureturpembelian();
	$data['supplier'] = $this->Model_ReturPembelian->datasupplier();
	$data['iddetail'] = $this->Model_ReturPembelian->iddetail();
	
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/returpembelian/Inputreturpembelian',$data);
	
	}
public function tambahreturpembeliandetail(){
	//mengecek nama validation
	$this->form_validation->set_rules('Kode_Bahan_Baku','Kode_Bahan_Baku','required');
		
	if($this->form_validation->run() == TRUE)
	{   
		$kdbhnbaku = $this->input->post("Kode_Bahan_Baku");
		$bhnbku = $this->Model_ReturPembelian->databahanbaku($kdbhnbaku);
		
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
		
		//// Lv1 ////
		if($qtylv1){
			if($isilv1 == "0"){
				redirect("ReturPembelian/tambahreturpembelian");
			}else if ($qtylv1 > $isilv1){
				redirect("ReturPembelian/tambahreturpembelian");
			}else if ($isilv1 > "0"){
				$hapuslv1 = $isilv1 - $qtylv1;
				$this->Model_ReturPembelian->hapuslv1($kdbhnbaku,$hapuslv1);
				$this->Model_ReturPembelian->simpanreturpembeliandetail();
				redirect("ReturPembelian/tambahreturpembelian");
			}
			
		}
//// Lv2 ////
		if($qtylv2){
		if($qtylv2 > $lv2){
			redirect("ReturPembelian/tambahreturpembelian");
		}else{
			if($isilv1 == "0"){
				redirect("ReturPembelian/tambahreturpembelian");
			}else if($qtylv2 > $isilv2){
				$tambahlv2hapus = $qtylv2 + $isilv2;
				if($tambahlv2hapus > $lv2){
					if($isilv1 == "0"){
						redirect("ReturPembelian/tambahreturpembelian");
					}else if($isilv1 > "0"){
						$sisalv1 = $isilv1 - 1;
						$hasillv2 = $lv2 - ($tambahlv2hapus - $lv2);
					} 
				}else if($tambahlv2hapus < $lv2){
					if($isilv1 == "0"){
						redirect("ReturPembelian/tambahreturpembelian");
					}else if($isilv1 > "0"){
						$sisalv1 = $isilv1 - 1;
						$hasillv2 =  $lv2 - ($lv2 - $tambahlv2hapus);
					}
				}else if($tambahlv2hapus == $lv2){
					if($isilv1 == "0"){
						redirect("ReturPembelian/tambahreturpembelian");
					}else if($isilv1 > "0"){
						$sisalv1 = $isilv1 - 1;
						$hasillv2 =  $lv2 + $isilv2 - $qtylv2;
					}
				}
				
				$this->Model_ReturPembelian->hapuslv2lebihdari($kdbhnbaku,$sisalv1,$hasillv2);
				$this->Model_ReturPembelian->simpanreturpembeliandetail();
				redirect("ReturPembelian/tambahreturpembelian");
			}else if($qtylv2 < $isilv2){
				if($isilv1 == "0"){
					redirect("ReturPembelian/tambahreturpembelian");
				}else if($isilv1 > "0"){
					$sisalv1kurangdari = $isilv1;
					$hasillv2kurangdari =  $isilv2 - $qtylv2;
				}
				
				$this->Model_ReturPembelian->hapuslv2kurangdari($kdbhnbaku,$sisalv1kurangdari,$hasillv2kurangdari);
				$this->Model_ReturPembelian->simpanreturpembeliandetail();
				redirect("ReturPembelian/tambahreturpembelian");
			}else if($qtylv2 == $isilv2){
				if($isilv1 == "0"){
					redirect("ReturPembelian/tambahreturpembelian");
				}else if($isilv1 > "0"){
					$sisalv1samadengan = $isilv1;
					$hasillv2samadengan =  $isilv2 - $qtylv2;
				}
				
				$this->Model_ReturPembelian->hapuslv2samadengan($kdbhnbaku,$sisalv1samadengan,$hasillv2samadengan);
				$this->Model_ReturPembelian->simpanreturpembeliandetail();
				redirect("ReturPembelian/tambahreturpembelian");
			}
		}
	}	
//// Lv3 ////
		if($qtylv3){
		if($qtylv3 > $lv3){
			redirect("ReturPembelian/tambahreturpembelian");
		}else{
			if($isilv1 == "0"){
				redirect("ReturPembelian/tambahreturpembelian");
			}else if($qtylv3 > $isilv3){
				$tambahlv3hapus = $isilv3 + $qtylv3;
				
				if($tambahlv3hapus > $lv3){
					if($isilv1 == "0"){
					redirect("ReturPembelian/tambahreturpembelian");
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
					redirect("ReturPembelian/tambahreturpembelian");
					}else if($isilv1 > "0"){
						if($isilv2 > "0"){
							if($isilv3 > "0"){
								$hasillv1lebihdari = $isilv1;
								$hasillv2lebihdari = $isilv2 - 1;
								$hasillv3lebihdari = $lv3 - ($lv3 - $tambahlv3hapus);
							}else if($isilv3 == "0"){
								$hasillv1lebihdari = $isilv1;
								$hasillv2lebihdari = $isilv2 - 1;
								$hasillv3lebihdari = $lv3 - $qtylv3;
							}
						}else if($isilv2 == "0"){
							if($isilv3 > "0"){
								$hasillv1lebihdari = $isilv1 - 1;
								$hasillv2lebihdari = $lv2 - 1;
								$hasillv3lebihdari = $lv3 - ($lv3 - $tambahlv3hapus);
							}else if($isilv3 == "0"){
								$hasillv1lebihdari = $isilv1 - 1;
								$hasillv2lebihdari = $lv2 - 1;
								$hasillv3lebihdari = $lv3 - $qtylv3;
							}
							
						}
					}
				}else if($tambahlv3hapus == $lv3){
					if($isilv1 == "0"){
					redirect("ReturPembelian/tambahreturpembelian");
					}else if($isilv1 > "0"){
						if($isilv2 > "0"){
							$hasillv1lebihdari = $isilv1;
							$hasillv2lebihdari = $isilv2 - 1;
							$hasillv3lebihdari = $lv3 + $isilv3 - $qtylv3;
						}else if($isilv2 == "0"){
							$hasillv1lebihdari = $isilv1 - 1;
							$hasillv2lebihdari = $lv2 - 1;
							$hasillv3lebihdari = $lv3 + $isilv3 - $qtylv3;
						}
					}
				}
				
				$this->Model_ReturPembelian->hapuslv3lebihdari($kdbhnbaku,$hasillv1lebihdari,$hasillv2lebihdari,$hasillv3lebihdari);
				$this->Model_ReturPembelian->simpanreturpembeliandetail();
				redirect("ReturPembelian/tambahreturpembelian");
			}else if($qtylv3 < $isilv3){
				if($isilv1 == "0"){
					redirect("ReturPembelian/tambahreturpembelian");
					}else if($isilv1 > "0"){
						$hasillv1kurangdariuntuk3 = $isilv1;
						$hasillv2kurangdariuntuk3 = $isilv2;
						$hasillv3kurangdariuntuk3 = $isilv3 - $qtylv3;
					}
				$this->Model_ReturPembelian->hapuslv3kurangdari($kdbhnbaku,$hasillv1kurangdariuntuk3,$hasillv2kurangdariuntuk3,$hasillv3kurangdariuntuk3);
				$this->Model_ReturPembelian->simpanreturpembeliandetail();
				redirect("ReturPembelian/tambahreturpembelian");
			}else if($qtylv3 == $isilv3){
				if($isilv1 == "0"){
					redirect("ReturPembelian/tambahreturpembelian");
					}else if($isilv1 > "0"){
						$hasillv1samadenganuntuk3 = $isilv1;
						$hasillv2samadenganuntuk3 = $isilv2;
						$hasillv3samadenganuntuk3 = $isilv3 - $qtylv3;
					}
				$this->Model_ReturPembelian->hapuslv3samadengan($kdbhnbaku,$hasillv1samadenganuntuk3,$hasillv2samadenganuntuk3,$hasillv3samadenganuntuk3);
				$this->Model_ReturPembelian->simpanreturpembeliandetail();
				redirect("ReturPembelian/tambahreturpembelian");
			}
		}
	}
	//// Lv4 ////
		if($qtylv4){
		if($qtylv4 > $lv4){
			redirect("ReturPembelian/tambahreturpembelian");
		}else{
			if($isilv1 == "0"){
				redirect("ReturPembelian/tambahreturpembelian");
			}else if($qtylv4 > $isilv4){
				$tambahlv4hapus = $isilv4 + $qtylv4;
				
				if($tambahlv4hapus > $lv4){
					if($isilv1 == "0"){
					redirect("ReturPembelian/tambahreturpembelian");
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
					redirect("ReturPembelian/tambahreturpembelian");
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
									$lv4lebihdariuntuk4 = $lv4 - $qtylv4;
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
									$lv4lebihdariuntuk4 = $lv4 - $qtylv4;
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
									$lv4lebihdariuntuk4 = $lv4 - $qtylv4;
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
									$lv4lebihdariuntuk4 = $lv4 - $qtylv4;
								}
								
							}
						}
					}
				}else if($tambahlv4hapus == $lv4){
					if($isilv1 == "0"){
					redirect("ReturPembelian/tambahreturpembelian");
					}else if($isilv1 > "0"){
						if($isilv2 > "0"){
							if($isilv3 > "0"){
								$lv1lebihdariuntuk4 = $isilv1;
								$lv2lebihdariuntuk4 = $isilv2;
								$lv3lebihdariuntuk4 = $isilv3 - 1;
								$lv4lebihdariuntuk4 = $lv4 + $isilv4 - $qtylv4;
							}else if($isilv3 == "0"){
								$lv1lebihdariuntuk4 = $isilv1;
								$lv2lebihdariuntuk4 = $isilv2 - 1;
								$lv3lebihdariuntuk4 = $isilv3 - 1;
								$lv4lebihdariuntuk4 = $lv4 + $isilv4 - $qtylv4;
							}
						}else if($isilv2 == "0"){
							if($isilv3 > "0"){
								$lv1lebihdariuntuk4 = $isilv1;
								$lv2lebihdariuntuk4 = $isilv2;
								$lv3lebihdariuntuk4 = $isilv3 - 1;
								$lv4lebihdariuntuk4 = $lv4 + $isilv4 - $qtylv4;
							}else if($isilv3 == "0"){
								$lv1lebihdariuntuk4 = $isilv1 - 1;
								$lv2lebihdariuntuk4 = $lv2 - 1;
								$lv3lebihdariuntuk4 = $lv3 - 1;
								$lv4lebihdariuntuk4 = $lv4 + $isilv4 - $qtylv4;
							}
						}
					}
				}
				
				$this->Model_ReturPembelian->hapuslv4lebihdari($kdbhnbaku,$lv1lebihdariuntuk4,$lv2lebihdariuntuk4,$lv3lebihdariuntuk4,$lv4lebihdariuntuk4);
				$this->Model_ReturPembelian->simpanreturpembeliandetail();
				redirect("ReturPembelian/tambahreturpembelian");
			}else if($qtylv4 < $isilv4){
				if($isilv1 == "0"){
					redirect("ReturPembelian/tambahreturpembelian");
					}else if($isilv1 > "0"){
						$lv1kurangdariuntuk4 = $isilv1;
						$lv2kurangdariuntuk4 = $isilv2;
						$lv3kurangdariuntuk4 = $isilv3;
						$lv4kurangdariuntuk4 = $isilv4 - $qtylv4;
					}
				$this->Model_ReturPembelian->hapuslv4kurangdari($kdbhnbaku,$lv1kurangdariuntuk4,$lv2kurangdariuntuk4,$lv3kurangdariuntuk4,$lv4kurangdariuntuk4);
				$this->Model_ReturPembelian->simpanreturpembeliandetail();
				redirect("ReturPembelian/tambahreturpembelian");
			}else if($qtylv4 == $isilv4){
				if($isilv1 == "0"){
					redirect("ReturPembelian/tambahreturpembelian");
					}else if($isilv1 > "0"){
						$lv1samadenganuntuk4 = $isilv1;
						$lv2samadenganuntuk4 = $isilv2;
						$lv3samadenganuntuk4 = $isilv3;
						$lv4samadenganuntuk4 = $isilv4 - $qtylv4;
					}
				$this->Model_ReturPembelian->hapuslv4samadengan($kdbhnbaku,$lv1samadenganuntuk4,$lv2samadenganuntuk4,$lv3samadenganuntuk4,$lv4samadenganuntuk4);
				$this->Model_ReturPembelian->simpanreturpembeliandetail();
				redirect("ReturPembelian/tambahreturpembelian");
			}
		}
	}
		//$this->Model_ReturPembelian->simpanreturpembeliandetail();	
		//redirect('ReturPembelian/tambahreturpembelian');
	}
	redirect("ReturPembelian/tambahreturpembelian");
	}
public function cariautobahanbaku()
	{
		// tangkap variabel keyword dari URL
		$keyword = $this->uri->segment(3);

		// cari di database
		$data = $this->Model_ReturPembelian->getdataautocomplete($keyword);	

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

public function hapusdetailreturpembelian(){
$id = $this->uri->segment(3); 
$datatbbanturetur = $this->Model_ReturPembelian->databhnbkutbbantudetailretur($id);
	$qty = $datatbbanturetur["Qty"];
	$level = $datatbbanturetur["Level"];
	$kdbhnbaku = $datatbbanturetur["Kode_Bahan_Baku"];
	
$bhnbku = $this->Model_ReturPembelian->databahanbaku($kdbhnbaku);
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
			
			$this->Model_ReturPembelian->updatelv1($kdbhnbaku,$tambahlv1);
			$this->Model_ReturPembelian->hapusdetailbantu($id); 
			$this->Model_ReturPembelian->hapusdetailretur($id);
			$this->Model_ReturPembelian->hapusdetailreport($id);
			redirect("ReturPembelian/tambahreturpembelian");
		}
		//// Lv2 ////
					
		if($level == "Lv2"){
			//if($lv1 == "0"){
			//	redirect("Pembelian/tambahpembelianbahanbaku");
			//}
	
			if($qty > $lv2){
				redirect("ReturPembelian/tambahreturpembelian");
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
					
				$this->Model_ReturPembelian->updatelv2($kdbhnbaku,$hasillv1,$hasiltambahisilv2);
				$this->Model_ReturPembelian->hapusdetailbantu($id); 
				$this->Model_ReturPembelian->hapusdetailretur($id);
				$this->Model_ReturPembelian->hapusdetailreport($id);
				redirect("ReturPembelian/tambahreturpembelian");
				
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
					
				$this->Model_ReturPembelian->updatelv2kurangdari($kdbhnbaku,$hasillv1kurangdari,$hasiltambahisilv2kurangdari);
				$this->Model_ReturPembelian->hapusdetailbantu($id); 
				$this->Model_ReturPembelian->hapusdetailretur($id);
				$this->Model_ReturPembelian->hapusdetailreport($id);
				redirect("ReturPembelian/tambahreturpembelian");
				
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
					
				$this->Model_ReturPembelian->updatelv2samadengan($kdbhnbaku,$hasillv1samadengan,$hasiltambahisilv2samadengan);
				$this->Model_ReturPembelian->hapusdetailbantu($id); 
				$this->Model_ReturPembelian->hapusdetailretur($id);
				$this->Model_ReturPembelian->hapusdetailreport($id);
				redirect("ReturPembelian/tambahreturpembelian");
			}
		}
		
		//// Lv3 ////
		if($level == "Lv3"){
			//if($lv1 == "0"){
			//	redirect("Pembelian/tambahpembelianbahanbaku");
			//}

			if($qty > $lv3){
				redirect("ReturPembelian/tambahreturpembelian");
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
					
				$this->Model_ReturPembelian->updatelv3($kdbhnbaku,$hasilsisalv1,$hasillv2,$hasiltambahisilv3);
				$this->Model_ReturPembelian->hapusdetailbantu($id); 
				$this->Model_ReturPembelian->hapusdetailretur($id);
				$this->Model_ReturPembelian->hapusdetailreport($id);
				redirect("ReturPembelian/tambahreturpembelian");
				
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
					
				$this->Model_ReturPembelian->updatelv3kurangdari($kdbhnbaku,$hasilsisalv1kurangdari,$hasillv2kurangdari,$hasiltambahisilv3kurangdari);
				$this->Model_ReturPembelian->hapusdetailbantu($id); 
				$this->Model_ReturPembelian->hapusdetailretur($id);
				$this->Model_ReturPembelian->hapusdetailreport($id);
				redirect("ReturPembelian/tambahreturpembelian");
				
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
					
				$this->Model_ReturPembelian->updatelv3samadengan($kdbhnbaku,$hasilsisalv1samadengan,$hasillv2samadengan,$hasiltambahisilv3samadengan);
				$this->Model_ReturPembelian->hapusdetailbantu($id); 
				$this->Model_ReturPembelian->hapusdetailretur($id);
				$this->Model_ReturPembelian->hapusdetailreport($id);
				redirect("ReturPembelian/tambahreturpembelian");	
			}
			
		}
		/////////////////////////////////////
		//// Lv4 ////
		if($level == "Lv4"){
			//if($lv1 == "0"){
			//	redirect("Pembelian/tambahpembelianbahanbaku");
			//}

			if($qty > $lv4){
				redirect("ReturPembelian/tambahreturpembelian");
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
					
				$this->Model_ReturPembelian->updatelv4($kdbhnbaku,$hasilsisalv1untuk4,$hasilsisalv2,$hasillv3,$hasiltambahisilv4);
				$this->Model_ReturPembelian->hapusdetailbantu($id); 
				$this->Model_ReturPembelian->hapusdetailretur($id);
				$this->Model_ReturPembelian->hapusdetailreport($id);
				redirect("ReturPembelian/tambahreturpembelian");
				
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
					
				$this->Model_ReturPembelian->updatelv4kurangdari($kdbhnbaku,$hasilsisalv1untuk4kurangdari,$hasilsisalv2kurangdari,$hasillv3kurangdari,$hasiltambahisilv4kurangdari);
				$this->Model_ReturPembelian->hapusdetailbantu($id); 
				$this->Model_ReturPembelian->hapusdetailretur($id);
				$this->Model_ReturPembelian->hapusdetailreport($id);
				redirect("ReturPembelian/tambahreturpembelian");
				
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
					
				$this->Model_ReturPembelian->updatelv4samadengan($kdbhnbaku,$hasilsisalv1untuk4samadengan,$hasilsisalv2samadengan,$hasillv3samadengan,$hasiltambahisilv4samadengan);
				$this->Model_ReturPembelian->hapusdetailbantu($id); 
				$this->Model_ReturPembelian->hapusdetailretur($id);
				$this->Model_ReturPembelian->hapusdetailreport($id);
				redirect("ReturPembelian/tambahreturpembelian");
			}
			
		}
//$this->Model_ReturPembelian->hapusdetailbantu($id); 
//$this->Model_ReturPembelian->hapusdetailretur($id);
//$this->Model_ReturPembelian->hapusdetailreport($id);
//redirect(base_url("ReturPembelian/tambahreturpembelian")); 
}

public	function caridata() 
	{
    $data['datatable']=$this->Model_ReturPembelian->searchingdata();
        if($data['datatable']==null){
	redirect(base_url("ReturPembelian/index"));
    }
		else {
   
	$data['ent'] = $this->Model_ReturPembelian->entries();
	$baris = $this->Model_ReturPembelian->getrowsreturpembelian();
	$limit=$baris;
	$data['totbaris'] = $limit;
	 
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/returpembelian/V_Retur',$data);
		}

	}
public function viewdatadetail(){
	$noretur = $this->uri->segment(3);
	$data['header'] = $this->Model_ReturPembelian->ambi_data_returpembelianheader($noretur);
	$data['detail'] = $this->Model_ReturPembelian->ambi_data_detailreturpembelianheader($noretur);
	$data['sumdetail'] = $this->Model_ReturPembelian->sumdetail($noretur);
	
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/returpembelian/Detailinforeturpembelian',$data);	
}
public function selesaidetailretur(){
$id = $this->uri->segment(3); 
$noretur = $this->uri->segment(4); 
$datatbbanturetur = $this->Model_ReturPembelian->databhnbkutbdetailretur($id);
	$qty = $datatbbanturetur["Qty"];
	$level = $datatbbanturetur["Level"];
	$kdbhnbaku = $datatbbanturetur["Kode_Bahan_Baku"];
	
$bhnbku = $this->Model_ReturPembelian->databahanbaku($kdbhnbaku);
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
			
			$this->Model_ReturPembelian->updatelv1($kdbhnbaku,$tambahlv1);
			$this->Model_ReturPembelian->hapusdetailretur($id);
			redirect("ReturPembelian/viewdatadetail/".$noretur);
		}
		//// Lv2 ////
					
		if($level == "Lv2"){
			//if($lv1 == "0"){
			//	redirect("Pembelian/tambahpembelianbahanbaku");
			//}
	
			if($qty > $lv2){
				redirect("ReturPembelian/viewdatadetail/".$noretur);
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
					
				$this->Model_ReturPembelian->updatelv2($kdbhnbaku,$hasillv1,$hasiltambahisilv2);
				$this->Model_ReturPembelian->hapusdetailretur($id);
				redirect("ReturPembelian/viewdatadetail/".$noretur);
				
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
					
				$this->Model_ReturPembelian->updatelv2kurangdari($kdbhnbaku,$hasillv1kurangdari,$hasiltambahisilv2kurangdari);
				$this->Model_ReturPembelian->hapusdetailretur($id);
				redirect("ReturPembelian/viewdatadetail/".$noretur);
				
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
					
				$this->Model_ReturPembelian->updatelv2samadengan($kdbhnbaku,$hasillv1samadengan,$hasiltambahisilv2samadengan);
				$this->Model_ReturPembelian->hapusdetailretur($id);
				redirect("ReturPembelian/viewdatadetail/".$noretur);
			}
		}
		
		//// Lv3 ////
		if($level == "Lv3"){
			//if($lv1 == "0"){
			//	redirect("Pembelian/tambahpembelianbahanbaku");
			//}

			if($qty > $lv3){
				redirect("ReturPembelian/viewdatadetail/".$noretur);
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
					
				$this->Model_ReturPembelian->updatelv3($kdbhnbaku,$hasilsisalv1,$hasillv2,$hasiltambahisilv3);
				$this->Model_ReturPembelian->hapusdetailretur($id);
				redirect("ReturPembelian/viewdatadetail/".$noretur);
				
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
					
				$this->Model_ReturPembelian->updatelv3kurangdari($kdbhnbaku,$hasilsisalv1kurangdari,$hasillv2kurangdari,$hasiltambahisilv3kurangdari);
				$this->Model_ReturPembelian->hapusdetailretur($id);
				redirect("ReturPembelian/viewdatadetail/".$noretur);
				
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
					
				$this->Model_ReturPembelian->updatelv3samadengan($kdbhnbaku,$hasilsisalv1samadengan,$hasillv2samadengan,$hasiltambahisilv3samadengan);
				$this->Model_ReturPembelian->hapusdetailretur($id);
				redirect("ReturPembelian/viewdatadetail/".$noretur);	
			}
			
		}
		/////////////////////////////////////
		//// Lv4 ////
		if($level == "Lv4"){
			//if($lv1 == "0"){
			//	redirect("Pembelian/tambahpembelianbahanbaku");
			//}

			if($qty > $lv4){
				redirect("ReturPembelian/viewdatadetail/".$noretur);
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
					
				$this->Model_ReturPembelian->updatelv4($kdbhnbaku,$hasilsisalv1untuk4,$hasilsisalv2,$hasillv3,$hasiltambahisilv4);
				$this->Model_ReturPembelian->hapusdetailretur($id);
				redirect("ReturPembelian/viewdatadetail/".$noretur);
				
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
					
				$this->Model_ReturPembelian->updatelv4kurangdari($kdbhnbaku,$hasilsisalv1untuk4kurangdari,$hasilsisalv2kurangdari,$hasillv3kurangdari,$hasiltambahisilv4kurangdari);
				$this->Model_ReturPembelian->hapusdetailretur($id);
				redirect("ReturPembelian/viewdatadetail/".$noretur);
				
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
					
				$this->Model_ReturPembelian->updatelv4samadengan($kdbhnbaku,$hasilsisalv1untuk4samadengan,$hasilsisalv2samadengan,$hasillv3samadengan,$hasiltambahisilv4samadengan);
				$this->Model_ReturPembelian->hapusdetailretur($id);
				redirect("ReturPembelian/viewdatadetail/".$noretur);
			}
			
		}
//$this->Model_ReturPembelian->hapusdetailbantu($id); 
//$this->Model_ReturPembelian->hapusdetailretur($id);
//$this->Model_ReturPembelian->hapusdetailreport($id);
//redirect(base_url("ReturPembelian/tambahreturpembelian")); 
}
public function editheaderreturpembelian(){
	$this->form_validation->set_rules('Kode_User','Kode_User','required');
	
		
	if($this->form_validation->run() == TRUE)
	{ 
		
		$this->Model_ReturPembelian->updateheaderreturpembelian();
		$this->Model_ReturPembelian->updateheaderreportreturpembelian();
		
		redirect('ReturPembelian/index');
	}
	
	$noretur = $this->uri->segment(3);
	$data['header'] = $this->Model_ReturPembelian->ambi_data_returpembelianheader($noretur);
	$data['detail'] = $this->Model_ReturPembelian->ambi_data_detailreturpembelianheader($noretur);
	$data['supplier'] = $this->Model_ReturPembelian->datasupplier();
	
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/returpembelian/Editheaderreturpembelian',$data);	
}
public function hapusheaderreturpembelian(){
$id = $this->uri->segment(3); 
$this->Model_ReturPembelian->hapustbreturpembelian($id);
$this->Model_ReturPembelian->hapustbreportreturpembelian($id);
$this->Model_ReturPembelian->hapustbdetailreturpembelian($id); 
$this->Model_ReturPembelian->hapustbreportdetailreturpembelian($id); 
redirect(base_url("ReturPembelian/index")); 
}
public function lihatcetakreturpembelian(){
	$noretur = $this->uri->segment(3);
	$data['header'] = $this->Model_ReturPembelian->ambi_data_returpembelianheader($noretur);
	$data['detail'] = $this->Model_ReturPembelian->ambi_data_detailreturpembelianheader($noretur);
	$data['supplier'] = $this->Model_ReturPembelian->datasupplier();
	$data['toko'] = $this->Model_ReturPembelian->datatoko();
	
	$this->load->view('admin/Menuadmin');
	$this->load->view('admin/returpembelian/LihatCetakReturPembelian',$data);	
}	
public function cetaknotaexcel(){
	$noretur = $this->uri->segment(3);
	$data['header'] = $this->Model_ReturPembelian->ambi_data_returpembelianheader($noretur);
	$data['detail'] = $this->Model_ReturPembelian->ambi_data_detailreturpembelianheader($noretur);
	$data['supplier'] = $this->Model_ReturPembelian->datasupplier();
	$data['toko'] = $this->Model_ReturPembelian->datatoko();
	
	//$this->load->view('admin/Menuadmin');
	$this->load->view('admin/returpembelian/CetakExcelReturPembelian',$data);	
}
public function konfirmasistatusretur(){
$id = $this->uri->segment(3); 
$this->Model_ReturPembelian->hapustbreturpembelian($id);
$this->Model_ReturPembelian->hapustbdetailreturpembelian($id); 

$this->Model_ReturPembelian->edittanggalselesai($id);

redirect(base_url("ReportReturPembelian/lihatcetakreportreturpembelian/".$id)); 
}
	
}