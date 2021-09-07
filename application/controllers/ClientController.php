<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once('Base_Controller.php');
class ClientController extends CI_Controller {

	public function __construct(){
		parent::__construct();

	}
    public function inscription(){
        $email = $this->input->post('email');
        $nom = $this->input->post('nom');
        $mdp = $this->input->post('mdp');
        $this->load->model('passager');
        $passager = $this->passager->getPassagerLogin($email,$mdp);
        if ($passager!=null){
            $data = array(
                'page' => 'login',
                'errorLogin' => "this email already has an account, please log in"
            );
            $this -> load -> view('template', $data);
        }else{
            $this->passager->insertPassager($email,$nom,$mdp);
            $new_passager = array('email' => $email,'nom' => $nom, 'mdp' => $mdp);
            $this->session->set_userdata('passager',$new_passager);
            $this -> load -> view('mapClient', $data);
        }
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
            $data = array();
            $data = array(
                'idPassager' => $this->session->userdata('passager')
            );
            $this -> load -> view('mapClient',$data);
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
        // $lat = $this->input->post('latitude');
        // $lng = $this->input->post('longitude');
        // $destLat = $this->input->post('destLatitude');
        // $destLng = $this->input->post('destLongitude');
        // $idPassager=$this->session->userdata('passager');

        // $clientFile=APPPATH.'client';
        // $this->load->model('json');
        // $this->json->insertInFileClient($clientFile, $idPassager, $lat, $lng, $destLat, $destLng);
        // $txt="Vos coordonnées on été envoyé";
        // echo json_encode($this->session->all_userdata());
        $this->load->view('test');
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