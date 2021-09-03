<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Accueil extends CI_Controller{
    public function index()
	{
		$data = array(
			'page' => 'accueil'
		);
		$this->load->view('template', $data);
		
	}	
}

?>