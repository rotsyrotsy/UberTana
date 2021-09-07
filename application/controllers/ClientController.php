<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once('Base_Controller.php');
class ClientController extends CI_Controller {

	public function __construct(){
		parent::__construct();

	}
	
	public function index(){
        $idPassager = $this->input->post('idPassager');
        $mdp = $this->input->post('mdp');
        $this->load->model('passager');
        $passager = $this->passager->getPassagerLogin($idPassager,$mdp);
        if ($passager!=null){
            if ( $this->session->userdata('passager')==null){
                $this->session->set_userdata('passager',$passager);
            }
            $data = array(
                'page' => 'map'
            );
            $this -> load -> view('map');
        }else{
            $data = array();
            $data = array(
                'page' => 'login',
                'errorLogin' => "login or password invalid"
            );
            $this -> load -> view('template', $data);
        }
	}
    public function envoiCoordonnees(){
        $lat = $this->input->post('latitude');
        $lng = $this->input->post('longitude');
        $destLat = $this->input->post('destLatitude');
        $destLng = $this->input->post('destLongitude');
        $idPassager = $this->session->userdata('passager');
        $clientFile=APPPATH.'client';
        $this->load->model('json');
        $this->json->insertInFileClient($clientFile, $idPassager, $lat, $lng, $destLat, $destLng);
        $txt="Vos coordonnées on été envoyé";
        echo json_encode($txt);
    }
    public function choisirChauffeur(){
        $idClient = $this->session->userdata('passager');
        $this->load->model('passager');
        $listeChauffeurs = $this->passager->choixChauffeur($idClient);
        if ($listeChauffeurs!=null){
            $data=array();
            $data['propositions']=$listeChauffeurs;
            $this->load->view('propositionChauffeur',$data);
        }else{
            $data=array();
            $data['pasDeChauffeur']="Il n'y a pas de proposition de chauffeur";
            $this->load->view('vueClient',$data);
        }
    }
    public function matchClientChauffeur(){
        $idChauffeur = $this->input->post('idChauffeur');
        $idPassager = $this->session->userdata('passager');
        $iddrivprop = $this->input->post('iddrivprop');

        //transaction paiement
        $this->load->model('match');
        $this->match->matching($idChauffeur, $idPassager);  //match
        $this->match->deleteDriverProposition($iddrivprop); // mi accepter an'ny proposition anle chauffeur

        $clientFile=APPPATH.'client';   
        $this->match->deleteFromClientFile($clientFile,$idPassager); // mamafa anle position anle client tam demande

        $this->match->notMatch($idPassager); //mamafa ny propositions an'ny chauffeurs hafa

        $chauffeurFile=APPPATH.'chauffeur';
        $this->match->deleteFromDriverFile($chauffeurFile, $idChauffeur); // mamafa anle position anle chauffeur 


        $data=array();
        $data['matchReussi']="Merci de votre participation, votre chauffeur arrivera bientot";
        $this->load->view('propositionChauffeur',$data);

    }

}