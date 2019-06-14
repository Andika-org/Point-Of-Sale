<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class My_Controller extends CI_Controller{
    function viewmenuadmin($data = NULL){
		$this->load->view('admin/Menuadmin', TRUE);
      
    }
}