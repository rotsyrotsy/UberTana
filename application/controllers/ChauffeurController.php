<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once('Base_Controller.php');
class ChauffeurController extends CI_Controller {

	public function __construct(){
		parent::__construct();

	}
	
	public function inscription(){
        $email = $this->input->post('email');
        $mdp = $this->input->post('mdp');
        $nom = $this->input->post('nom');
        $prenom = $this->input->post('prenom');
        $numtel = $this->input->post('numtel');
        $sexe = $this->input->post('sexe');
        $nationalite = $this->input->post('nationalite');
        $dtn = $this->input->post('annee')."-".$this->input->post('mois')."-".$this->input->post('jour');
        $modele = $this->input->post('modele');
        $matricule = $this->input->post('matricule');
        $this->load->model('client');
        $chauffeur = $this->client->getChauffeurLogin($email,$mdp);
        if ($chauffeur!=null){
            $data = array(
                'page' => 'inscriptionChauffeur',
                'errorInscriptionDriver' => "Cet email existe déjà, veuillez en entrer un autre."
            );
            $this -> load -> view('template', $data);
        }else{
            $this->client->insertChauffeur($email,$nom,$prenom, $modele, $matricule , $mdp,$numtel, $nationalite, $dtn,$sexe);
            $new_chauffeur= array('email' => $email, 'mdp' => $mdp, 'nom'=>$nom);
            $this->session->set_userdata('chauffeur',$new_chauffeur);
            $this -> load -> view('mapChauffeur');
        }
	}
	public function login(){
        $idChauffeur = $this->input->post('idChauffeur');
        $mdp = $this->input->post('mdp');
        $this->load->model('client');
        $chauffeur = $this->client->getChauffeurLogin($idChauffeur,$mdp);
        if ($chauffeur!=null){
            if ( $this->session->userdata('chauffeur')==null){
                $this->session->set_userdata('chauffeur',$chauffeur);
            }
            $this -> load -> view('mapChauffeur');
        }else{
            $data = array(
                'page' => 'login',
                'errorLoginDriver' => "email ou mot de passe invalide"
            );
            $this -> load -> view('template', $data);
        }
	}
    public function envoiCoordonnees(){
        $lat = $this->input->post('latitude');
        $lng = $this->input->post('longitude');

        $chauffeur =  $this->session->userdata('chauffeur');
        $idChauffeur = $chauffeur['email'];

        $chauffeurFile=APPPATH.'chauffeur';
        $this->load->model('json');
        $this->json->insertInFileChauffeur($chauffeurFile, $idChauffeur, $lat, $lng);


        $clientFile=APPPATH.'client';
        if (file_get_contents($clientFile)!=false){
            $clientJson = file_get_contents($clientFile);
            $client = json_decode($clientJson, true);
            $this->load->model('client');
            $listeClient = $this->client->getProximite1km($client,$lat,$lng);
            $retour=array();

            $this->load->model('passager');
            for($i=0; $i<count($listeClient); $i++){
                $pass = $this->passager->getPassagerById($listeClient[$i]['idPassager']);
                $retour[$i]['nom']=$pass['nom'];
                $retour[$i]['latitude']=$listeClient[$i]['latitude'];
                $retour[$i]['longitude']=$listeClient[$i]['longitude'];
                $retour[$i]['destLat']=$listeClient[$i]['destLat'];
                $retour[$i]['destLng']=$listeClient[$i]['destLng'];
                $retour[$i]['idPassager']=$listeClient[$i]['idPassager'];
            }
            if (count($listeClient)>0){
                echo json_encode($retour);
            }else{
                echo json_encode("Il n'y a pas de client à proximité");
            }
        }else{
            echo json_encode("Il n'y a pas de client à proximité");
        }
    }
    public function envoiProposition(){
        $idPassager = $this->input->post('idPassager');
        $chauffeur = $this->session->userdata('chauffeur');
        $idChauffeur=$chauffeur['email'];
        $prix = $this->input->post('prix');
        $this->load->model('client');
        $this->client->proposerPrix($idChauffeur,$idPassager,$prix);
        $data=array();
        $data['response']="proposition de prix envoyée";
        $this->load->view('mapChauffeur',$data);

    }
    public function deconnexion(){
        $this->session->sess_destroy();
        $data = array(
            'page' => 'login'
        );
        $this -> load -> view('template', $data);
    }

}