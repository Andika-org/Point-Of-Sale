<?php
class barang_master extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('model_barang','m');
	}

	function index(){
		$data['record'] = $this->m->tampil_data()->result();
		$this->load->library('pagination');
		$jumlah_data = $this->m->jumlah_data();
		$config['base_url'] = base_url().'index.php/barang_master/index/';
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
		$data['record'] = $this->m->pageBarangMaster($config['per_page'],$from);
		$this->load->view('admin/menuadmin'); 
		$this->load->view('admin/barang_master/tampil_data',$data);
	}

	function input_header(){
		if(isset($_POST['submit'])){
			$nmfile = "img_".time();
		    $config['upload_path'] 		= "./fotobarang/";
		    $config['allowed_types'] 	= "gif|jpg|jpeg|png"; 
		    $config['max_size'] 		= "3000";
		    $config['max_width'] 		= "5000";
		    $config['max_height'] 		= "5000";
		    $config['file_name'] 		= $nmfile;
	   		 
	    	$this->upload->initialize($config);
	        
	        if($_FILES['gambar']['name']){
	            if ($this->upload->do_upload('gambar')){
	                
	            	$kode	= $this->input->post('kode');
					$nama	= $this->input->post('nama');
					$harga	= $this->input->post('harga');

	              	$gbr = $this->upload->data();
	                $data = array(
					               'Kode_Barang'	=> $kode,
					               'Nama_Barang'	=> $nama,
					               'Foto'			=> $gbr['file_name'],
					               'Harga'			=> $harga
	               				 );

	                $this->m->input_header($data);//akses model untuk menyimpan ke database
	                //dibawah ini merupakan code untuk resize
	                $config2['image_library'] 	= 'gd2'; 
	                $config2['source_image'] 	= $this->upload->upload_path.$this->upload->file_name;
	                $config2['new_image'] 		= './fotobarang/resize/'; // folder tempat menyimpan hasil resize
	                $config2['maintain_ratio'] 	= TRUE;
	                $config2['width'] 			= 100; //lebar setelah resize menjadi 100 px
	                $config2['height'] 			= 100; //lebar setelah resize menjadi 100 px
	                $this->load->library('image_lib', $config2); 

	                //pesan yang muncul jika resize error dimasukkan pada session flashdata
	                if ( !$this->image_lib->resize()){
	                	$this->session->set_flashdata('errors', $this->image_lib->display_errors('', ''));   
	              	}

	                redirect('barang_master');
	            }else{
	                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
	                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");
	                redirect('barang_master'); //jika gagal maka akan ditampilkan form upload
	            }
	        }	
		}elseif(isset($_POST['tambah'])){
			$kd_brg 		= $this->input->post('kode');
    		$kd_bhn_baku 	= $this->input->post('bahan_baku');
    		$jml_stict	 	= $this->input->post('stict');

    		$data = array(
    						'Kode_Barang'		=> $kd_brg,
    						'Kode_Bahan_Baku'	=> $kd_bhn_baku,
    						'Jml_Stik'			=> $jml_stict
    					 );

    		$this->m->insert_detail($data);
    		redirect('barang_master/input_header');
		}else{
				$kd_barang = $this->m->getKdBrg();
				$data['kd_brg'] = $this->m->getKdBrg();
				$data['kd_bhn_baku'] = $this->m->getKdBhnBaku()->result();
    			$data['bhn_baku'] = $this->m->getBahanBaku($kd_barang)->result();
				$this->load->view('admin/menuadmin');  
				$this->load->view('admin/barang_master/input_header',$data);
	    }
	}
	
	/*function input_detail(){
		if(isset($_POST['simpan'])){
			$kode 		= $this->input->post('kode');
			$bahan_baku = $this->input->post('bahan_baku');
			$stict 		= $this->input->post('stict');

			$data1 = array(
							'Kode_Barang'		=> $kode,
							'Kode_Bahan_Baku'	=> $bahan_baku,
							'Jml_Stik'			=> $stict
						 );

			$this->m->insert_detail($data1);
		}else{
			$data['kd_brg'] 		= $this->m->getKdBrg();
			$data['kd_bhn_baku'] 	= $this->m->getKdBhnBaku();
			$this->load->view('admin/menuadmin');  
			//$this->load->view('admin/barang_master/input_header',$data);
		}
	}*/

	function lihat_detail(){
		$id = $this->uri->segment(3);
		$data['record'] = $this->m->get_one($id)->row_array();
		$data['detail'] = $this->m->tampil_detail($id)->result();
		$data['kd_bhn_baku'] = $this->m->getKdBhnBaku()->result();
		$this->load->view('admin/menuadmin');  
		$this->load->view('admin/barang_master/lihat_detail',$data);
	}

	function hapus_detail(){
		$kd_brg = $this->input->post('kode');
		$id 	= $this->uri->segment(3);
		$this->db->where('Id_Barang',$id);
		$this->db->delete('tb_barang_detail');
		redirect('barang_master');
	}

	function edit_header(){
		if(isset($_POST['submit'])){
			if(isset($_POST['ya'])){
				$nmfile = "img_".time();
			    $config['upload_path'] 		= "./fotobarang/";
			    $config['allowed_types'] 	= "gif|jpg|jpeg|png"; 
			    $config['max_size'] 		= "3000";
			    $config['max_width'] 		= "5000";
			    $config['max_height'] 		= "5000";
			    $config['file_name'] 		= $nmfile;
		   		 
		    	$this->upload->initialize($config);
		        
		        if($_FILES['foto']['name']){
		            if ($this->upload->do_upload('foto')){
		                
		               	$kode		= $this->input->post('kode');
						$nama		= $this->input->post('nama');
						$harga		= $this->input->post('harga');
						$img_path 	= $this->input->post('path');

		              	$gbr = $this->upload->data();
		                $data = array(
						               'Kode_Barang'	=> $kode,
						               'Nama_Barang'	=> $nama,
						               'Foto'			=> $gbr['file_name'],
						               'Harga'			=> $harga
		               				 );

		                //remove file sebelumnya menjadi file baru
		                @unlink("./fotobarang/". $img_path);
	                   	@unlink("./fotobarang/resize/". $img_path);

		                $this->m->edit_header($data,$kode);//akses model untuk menyimpan ke data

		                //dibawah ini merupakan code untuk resize
		                $config2['image_library'] 	= 'gd2'; 
		                $config2['source_image'] 	= $this->upload->upload_path.$this->upload->file_name;
		                $config2['new_image'] 		= './fotobarang/resize/'; // folder tempat menyimpan hasil resize
		                $config2['maintain_ratio'] 	= TRUE;
		                $config2['width'] 			= 100; //lebar setelah resize menjadi 100 px
		                $config2['height'] 			= 100; //lebar setelah resize menjadi 100 px
		                $this->load->library('image_lib', $config2); 

		                //pesan yang muncul jika resize error dimasukkan pada session flashdata
		                if ( !$this->image_lib->resize()){
		                	$this->session->set_flashdata('errors', $this->image_lib->display_errors('', ''));   
		              	}

		                redirect('barang_master/lihat_detail/'.$kode);
		            }else{
		                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
		                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");
		                redirect('barang_master/lihat_detail/'.$kode); //jika gagal maka akan ditampilkan form upload
		            }
	        	}
			}else{
				$kode	= $this->input->post('kode');
				$nama	= $this->input->post('nama');
				$harga	= $this->input->post('harga');

				$data = array(
						        'Kode_Barang'	=> $kode,
						        'Nama_Barang'	=> $nama,
						        'Harga'			=> $harga
		               		 );

		                $this->m->edit_header($data,$kode);//akses model untuk menyimpan ke data
		        redirect('barang_master/lihat_detail/'.$kode);
			}
		}else{
			$kode = $this->uri->segment(3);
			$data['record'] = $this->m->get_one_header($kode)->row_array();
			$data['detail'] = $this->m->tampil_detail($id)->result();
			$data['kd_bhn_baku'] = $this->m->getKdBhnBaku()->result();
			$this->load->view('admin/menuadmin');  
			$this->load->view('admin/barang_master/lihat_detail',$data);
		}
	}
	function get_state() {
        $tmp    = '';
        $data   = $this->m->get_bahan_baku();
        if(!empty($data)) {
            $tmp .= "<option value=''>Bahan Baku</option>";
            foreach($data as $row){
                 $tmp .= "<option value='".$row->Kode_Bahan_Baku."'>".$row->Nama_Barang."</option>";
            }
        } else {
            $tmp .= "<option value=''>Bahan Baku</option>";
        }
        die($tmp);
    }

    function ambil_bahan(){
    	$data['kd_bhn_baku'] = $this->m->getKdBhnBaku()->result();
    	$tulis = "";
    	foreach ($data['kd_bhn_baku'] as $a) {
    		$tulis = $tulis."
    			<option value='".$a->Kode_Bahan_Baku ."'>".$a->Nama_Barang ."</option>
    		";
    	}
		echo $tulis;
    }

    function hapus_detail_header(){
    	$id 	= $this->uri->segment(3);
    	$this->db->where('Id_Barang',$id);
    	$this->db->delete('tb_barang_detail');
    	redirect('barang_master/input_header');
    }

    function edit_detail(){
    	if(isset($_POST['add'])){
    		$kd_brg 		= $this->input->post('kode');
    		$kd_bhn_baku 	= $this->input->post('bahan_baku');
    		$jml_stict	 	= $this->input->post('stict');
    		$data = array(
    						'Kode_Barang'		=> $kd_brg,
    						'Kode_Bahan_Baku'	=> $kd_bhn_baku,
    						'Jml_Stik'			=> $jml_stict
    					 );

    		$this->m->edit_detail($data);
    		redirect('barang_master/lihat_detail/'.$kd_brg);
    	}else{
    		$id = $this->uri->segment(3);
			$data['record'] = $this->m->get_one($id)->row_array();
			$data['detail'] = $this->m->tampil_detail($id)->result();
			$data['kd_bhn_baku'] = $this->m->getKdBhnBaku()->result();
			$this->load->view('admin/menuadmin');  
			$this->load->view('admin/barang_master/lihat_detail',$data);
    	}
    }

    function cari(){
    	$key = $this->input->post('cari');
    	$data['record'] = $this->m->hasil_cari($key);
    	$this->load->view('admin/menuadmin');
    	$this->load->view('admin/barang_master/tampil_data',$data);
    }
}