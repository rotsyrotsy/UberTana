<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller{
   
    public function index(){
		$this->load->view('template_admin');
	}
	
	public function stat(){
		$data['page'] = 'statistiques_admin';
		$this->load->view('template_admin',$data);

	}
}
?>