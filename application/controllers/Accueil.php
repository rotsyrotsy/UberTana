<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once('Base_Controller.php');
class Accueil extends CI_Controller {

	public function __construct(){
		parent::__construct();

	}
	
	public function index(){
		$this->load->view('template');
	}
	public function login(){
		$data = array(
			'page'=>'login'
		);
		$this->load->view('template',$data);
	}
	public function inscription () {
		$data=null;
		if ($this->input->get('option')=='passager'){
			$data = array (
				'page' => 'inscriptionPassager'
			);
		}else if($this->input->get('option')=='chauffeur'){
			$data = array (
				'page' => 'inscriptionChauffeur'
			);
		}
        $this->load->helper('Date');
        $this->load->view('template.php', $data);
    }
    public function client(){
        $data['page'] = 'accueil_Client';
		$this->load->view('template',$data);
	}

}
?>
