<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Accueil extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$this->load->view('template');
	}
    public function client(){
        $data['page'] = 'accueil_Client';
		$this->load->view('template',$data);
	}

}
?>
