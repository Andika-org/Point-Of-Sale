<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cbarcode extends CI_Controller {

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
		//$this->load->library('Excel_generator');
		//$this->load->library('untukbarcode/Zend');
	}


public	function index() 
	{	
	//$kode = 1234;
	//echo '<img src="'.base_url().'cbarcode/bikin_barcode/'.$kode.'">';
	$render["barcode"] = $this->uri->segment(3);	

	$this->load->view('admin/buatbarcode',$render);
	}
public	function bikin_barcode() 
	{
		$kode = $this->input->post("bar");
		$this->load->library('CI_Zend');
		$this->load->library('Zend/Zend_Barcode');
		
		Zend_Barcode::render('ean13', 'image', array('text'=>$kode),array());
	}	
public	function bikinbarcode() 
	{
		//$kode = $this->input->post('bar');
		$kode= $this->input->post("bar");
		//$this->load->library('Zend');
		//$this->zend->load('Zend/Barcode');
		
		//Zend_Barcode::render('code128','image',array('text'=>$kode),array());
		$height= isset($_GET['height'])?mysql_real_escape_string($_GET['height']):'74';
		$width= isset($_GET['width'])?mysql_real_escape_string($_GET['width']):'1';//1,2,3,4 dst
		
		$this->load->library('CI_Zend');
		$this->load->library('Zend/Barcode');
		
		$barcodeOPT = array(
			'text'=>$kode,
			'barHeight'=>$height,
			'factor'=>$width
		);
		$renderOPT = array();
		
		$render["barcode"] = Barcode::render('code128','image',array("text"=>$kode,"barHeight"=>24,"factor"=>1.98),array());
		$this->load->view('admin/buatbarcode',$render);
		//redirect(base_url("cbarcode/".$render));//$this->load->view('admin/buatbarcode',$render);
	}
	
}

