<?php
class karyawan extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('model_karyawan','m');
		//$this->load->model('model_pembelian');
	}

	function index(){
		$data['record'] = $this->m->tampil_data()->result();
		$this->load->library('pagination');
		$jumlah_data = $this->m->jumlah_data();
		$config['base_url'] = base_url().'index.php/karyawan/index/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 5;
		$config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
 
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
 
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
 
        $config['prev_link'] = '&larr; Prev';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
 
        $config['cur_tag_open'] = '<li class="current"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
 
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);		
		$data['record'] = $this->m->pageKaryawan($config['per_page'],$from);
		
//$chart['totalbeli']=$this->model_pembelian->hitungjumlahbeli();	
	$this->load->view('admin/menuadmin');		
		$this->load->view('admin/karyawan/tampil_data',$data);
	}

	function input(){
		if(isset($_POST['submit'])){
	
			$nmfile = "img_".time();
		    $config['upload_path'] 		= "./fotokaryawan/";
		    $config['allowed_types'] 	= "gif|jpg|jpeg|png"; 
		    $config['max_size'] 		= "3000";
		    $config['max_width'] 		= "5000";
		    $config['max_height'] 		= "5000";
		    $config['file_name'] 		= $nmfile;
	   		 
	    	$this->upload->initialize($config);
	        
	        if($_FILES['gambar']['name']){
	            if ($this->upload->do_upload('gambar')){
	                
	            	$kode 		= $this->input->post('kode');
					$nama 		= $this->input->post('nama');
					$tgl 		= $this->input->post('tgl');
					$alamat 	= $this->input->post('alamat');
					$jk 		= $this->input->post('jk');
					$tlp 		= $this->input->post('tlp');
					$email 		= $this->input->post('email');
					$bagian 	= $this->input->post('bagian');
					$jabatan 	= $this->input->post('jabatan');
					$gapok 		= $this->input->post('gapok');

	              	$gbr = $this->upload->data();
	                $data = array(
					               'Kode_Karyawan' 	=> $kode,
					               'Nama_karyawan' 	=> $nama,
					               'Tanggal_Lahir'	=> $tgl,
					               'Alamat'			=> $alamat,
					               'Jenis_Kelamin'	=> $jk,
					               'Telepon'		=> $tlp,
					               'Email'			=> $email,
					               'Foto_Karyawan'	=> $gbr['file_name'],
					               'Bagian'			=> $bagian,
					               'Jabatan'		=> $jabatan,
					               'Gaji_Pokok'		=> $gapok	
	               				 );

	                $this->m->input($data);//akses model untuk menyimpan ke database
	                //dibawah ini merupakan code untuk resize
	                $config2['image_library'] 	= 'gd2'; 
	                $config2['source_image'] 	= $this->upload->upload_path.$this->upload->file_name;
	                $config2['new_image'] 		= './fotokaryawan/resize/'; // folder tempat menyimpan hasil resize
	                $config2['maintain_ratio'] 	= TRUE;
	                $config2['width'] 			= 100; //lebar setelah resize menjadi 100 px
	                $config2['height'] 			= 100; //lebar setelah resize menjadi 100 px
	                $this->load->library('image_lib', $config2); 

	                //pesan yang muncul jika resize error dimasukkan pada session flashdata
	                if ( !$this->image_lib->resize()){
	                	$this->session->set_flashdata('errors', $this->image_lib->display_errors('', ''));   
	              	}

	                redirect('karyawan');
	            }else{
	                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
	                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");
	                redirect('karyawan'); //jika gagal maka akan ditampilkan form upload
	            }
	        }
		}else{
			$data['kd_kar'] = $this->m->getKar();
			
//$chart['totalbeli']=$this->model_pembelian->hitungjumlahbeli();	
	$this->load->view('admin/menuadmin');			
			$this->load->view('admin/karyawan/input_data',$data);
		}
	}

	function edit(){
		if(isset($_POST['submit'])){
			if(isset($_POST['ya'])){
				$nmfile = "img_".time();
			    $config['upload_path'] 		= "./fotokaryawan/";
			    $config['allowed_types'] 	= "gif|jpg|jpeg|png"; 
			    $config['max_size'] 		= "3000";
			    $config['max_width'] 		= "5000";
			    $config['max_height'] 		= "5000";
			    $config['file_name'] 		= $nmfile;
		   		 
		    	$this->upload->initialize($config);
		        
		        if($_FILES['gambar']['name']){
		            if ($this->upload->do_upload('gambar')){
		                
		                $img_path 	= $this->input->post('path');
		            	$kode 		= $this->input->post('kode');
						$nama 		= $this->input->post('nama');
						$tgl 		= $this->input->post('tgl');
						$alamat 	= $this->input->post('alamat');
						$jk 		= $this->input->post('jk');
						$tlp 		= $this->input->post('tlp');
						$email 		= $this->input->post('email');
						$bagian 	= $this->input->post('bagian');
						$jabatan 	= $this->input->post('jabatan');
						$gapok 		= $this->input->post('gapok');

		              	$gbr = $this->upload->data();
		                $data = array(
						               'Kode_Karyawan' 	=> $kode,
						               'Nama_karyawan' 	=> $nama,
						               'Tanggal_Lahir'	=> $tgl,
						               'Alamat'			=> $alamat,
						               'Jenis_Kelamin'	=> $jk,
						               'Telepon'		=> $tlp,
						               'Email'			=> $email,
						               'Foto_Karyawan'	=> $gbr['file_name'],
						               'Bagian'			=> $bagian,
						               'Jabatan'		=> $jabatan,
						               'Gaji_Pokok'		=> $gapok	
		               				 );

		                //remove file sebelumnya menjadi file baru
		                @unlink("./fotokaryawan/". $img_path);
	                   	@unlink("./fotokaryawan/resize/". $img_path);

		                $this->m->edit($data,$kode);//akses model untuk menyimpan ke data

		                //dibawah ini merupakan code untuk resize
		                $config2['image_library'] 	= 'gd2'; 
		                $config2['source_image'] 	= $this->upload->upload_path.$this->upload->file_name;
		                $config2['new_image'] 		= './fotokaryawan/resize/'; // folder tempat menyimpan hasil resize
		                $config2['maintain_ratio'] 	= TRUE;
		                $config2['width'] 			= 100; //lebar setelah resize menjadi 100 px
		                $config2['height'] 			= 100; //lebar setelah resize menjadi 100 px
		                $this->load->library('image_lib', $config2); 

		                //pesan yang muncul jika resize error dimasukkan pada session flashdata
		                if ( !$this->image_lib->resize()){
		                	$this->session->set_flashdata('errors', $this->image_lib->display_errors('', ''));   
		              	}

		                redirect('karyawan');
		            }else{
		                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
		                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");
		                redirect('karyawan'); //jika gagal maka akan ditampilkan form upload
		            }
	        	}
			}else{
				$kode 		= $this->input->post('kode');
				$nama 		= $this->input->post('nama');
				$tgl 		= $this->input->post('tgl');
				$alamat 	= $this->input->post('alamat');
				$jk 		= $this->input->post('jk');
				$tlp 		= $this->input->post('tlp');
				$email 		= $this->input->post('email');
				$bagian 	= $this->input->post('bagian');
				$jabatan 	= $this->input->post('jabatan');
				$gapok 		= $this->input->post('gapok');

				$data = array(
						      'Kode_Karyawan' 	=> $kode,
						      'Nama_karyawan' 	=> $nama,
						      'Tanggal_Lahir'	=> $tgl,
						      'Alamat'			=> $alamat,
						      'Jenis_Kelamin'	=> $jk,
						      'Telepon'			=> $tlp,
						      'Email'			=> $email,
						      'Bagian'			=> $bagian,
						      'Jabatan'			=> $jabatan,
						      'Gaji_Pokok'		=> $gapok	
		               		);

		                $this->m->edit($data,$kode);//akses model untuk menyimpan ke data
		                redirect('karyawan');
			}
		}else{
			$id = $this->uri->segment(3);
			$data['record'] = $this->m->get_one($id)->row_array();
			
//$chart['totalbeli']=$this->model_pembelian->hitungjumlahbeli();	
	$this->load->view('admin/menuadmin');			
			$this->load->view('admin/karyawan/edit_data',$data);
		}
	}

	function hapus(){
		$id 		= $this->uri->segment(3);
		//ambil value dari database
		$this->db->where('Kode_Karyawan',$id);
	    $query = $this->db->get('tb_karyawan');
	    $row = $query->row();

	    unlink("./fotokaryawan/". $row->Foto_Karyawan);
	    unlink("./fotokaryawan/resize/". $row->Foto_Karyawan);

	    $this->db->where('Kode_Karyawan',$id);
	    $this->db->delete('tb_karyawan');
	    redirect('karyawan');

	}
}