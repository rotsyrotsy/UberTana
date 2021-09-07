<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once('Base_Controller.php');
class ChauffeurController extends CI_Controller {

	public function __construct(){
		parent::__construct();

	}
	
	public function index(){
        $idChauffeur = $this->input->post('idChauffeur');
        $mdp = $this->input->post('mdp');
        $this->load->model('client');
        $chauffeur = $this->client->getChauffeurLogin($idChauffeur,$mdp);
        if ($chauffeur!=null){
            $this->session->set_userdata('chauffeur',$chauffeur);
            $data = array(
                'page' => 'accueil'
            );
            $this -> load -> view('template', $data);
        }else{
            $data = array();
            $data = array(
                'page' => 'login',
                'errorLoginDriver' => "login or password invalid"
            );
            $this -> load -> view('template', $data);
        }
		$this->load->view('vueChauffeur');
	}
    public function envoiCoordonnees(){
        $lat = $this->input->post('latitude');
        $lng = $this->input->post('longitude');
        
        // $lat = -18.530;
        // $lng = 47.255;

        $idChauffeur =  $this->session->userdata('chauffeur');
        $chauffeurFile=APPPATH.'chauffeur';
        $this->load->model('json');
        $this->json->insertInFileChauffeur($chauffeurFile, $idChauffeur, $lat, $lng);


        $clientFile=APPPATH.'client';
        if (file_get_contents($clientFile)!=false){
            $clientJson = file_get_contents($clientFile);
            $client = json_decode($clientJson, true);
            $this->load->model('client');
            $listeClient = $this->client->getProximite1km($client,$lat,$lng);
            echo json_encode($listeClient);
        }else{
            echo "tsisy";
        }
    }
    public function envoiProposition(){
        $idPassager = $this->input->get('idPassager');
        $idChauffeur = $this->session->userdata('chauffeur');
        $prix = $this->input->get('prix');
        $this->load->model('client');
        $this->client->proposerPrix($idChauffeur,$idPassager,$prix);
        $data=array();
        $data['response']="proposition envoyée";
        $this->load->view('vueChauffeur',$data);

    }

}