<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once('Base_Controller.php');
class ChauffeurController extends CI_Controller {

	public function __construct(){
		parent::__construct();

	}
	
	public function index(){
		$this->load->view('vueChauffeur');
	}
    public function envoiCoordonnees(){
        // $lat = $this->input->post('latitude');
        // $lng = $this->input->post('longitude');
        
        $lat = -18.530;
        $lng = 47.255;

        $idChauffeur = 'C2@gmail.com';
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
        $idChauffeur = 'C2@gmail.com';
        $prix = $this->input->get('prix');
        $this->load->model('client');
        $this->client->proposerPrix($idChauffeur,$idPassager,$prix);
        $data=array();
        $data['response']="proposition envoyée";
        $this->load->view('vueChauffeur',$data);

    }

}