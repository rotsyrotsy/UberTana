<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once('Base_Controller.php');
class DatabaseController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/Load
	 *	- or -
	 * 		http://example.com/index.php/Load/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/Load/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();

	}
	
	public function affAdmin(){
		$this->load->model('admin');
		$data['liste_admin'] = $this->admin->getAdmin();
		$this->load->view('vue',$data);
	}

	public function affPassager(){
		$this->load->model('passager');
		$data['liste_passager'] = $this->passager->getPassager();
		$this->load->view('vue',$data);
	}
	
	public function affClient(){
		$this->load->model('client');
		$data['liste_client'] = $this->client->getClient();
		$this->load->view('vue',$data);
	}

	public function affPaiement(){
		$this->load->model('paiement');
		$data['liste_paiement'] = $this->paiement->getPaiement();
		$this->load->view('vue',$data);
	}

	public function affDepot(){
		$this->load->model('depot');
		$data['liste_depot'] = $this->depot->getDepot();
		$this->load->view('vue',$data);
	}

	public function affNote(){
		$this->load->model('note');
		$data['liste_note'] = $this->note->getNote();
		$this->load->view('vue',$data);
	}

	public function affRehetra(){
		
		$this->load->model('admin');
		$data['liste_admin'] = $this->admin->getAdmin();
		$this->load->model('passager');
		$data['liste_passager'] = $this->passager->getPassager();
		$this->load->model('client');
		$data['liste_client'] = $this->client->getClient();
		$this->load->model('paiement');
		$data['liste_paiement'] = $this->paiement->getPaiement();
		$this->load->model('depot');
		$data['liste_depot'] = $this->depot->getDepot();
		$this->load->model('note');
		$data['liste_note'] = $this->note->getNote();

		$this->load->view('vue',$data);
	}
}