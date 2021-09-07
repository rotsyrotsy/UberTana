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
	
	public function index(){
		
        $data['erreur'] = null;
        $data['error'] = null;
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
		// $this->load->model('note');
		// $data['liste_note'] = $this->note->getNote();

		$this->load->view('vue',$data);
	}

	public function connexionClient(){

		$this->load->model('client');
		$username = $this->input->post('login');
        $mdp = $this->input->post('mdp');

        $data['connexion'] = $this->client->loginClient($username,$mdp);


        if($data['connexion'] == 1){

        	// $this->load->view('accueil',$donnee);
        	echo "mety iiiii";
        }

        else{


	        $data['erreur'] = "Erreur";
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

	        // $data['erreur'] = "Erreur";
			// redirect(site_url());
	    }
	}

	public function connexionAdmin(){

		$this->load->model('admin');
		$username = $this->input->post('login');
        $mdp = $this->input->post('mdp');

        $data['connexion'] = $this->admin->loginAdmin($username,$mdp);


        if($data['connexion'] == 1){

        	// $this->load->view('accueil',$donnee);
        	echo "mety iiiii";
        }

        else{

    		$data['error'] = "Erreur";
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
	        // $data['erreur'] = "Erreur";
			// redirect(site_url());
	    }
	}
}