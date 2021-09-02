<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once('Base_Controller.php');
class Accueil extends CI_Controller {

	public function __construct(){
		parent::__construct();

	}
	
	public function index(){
		$this->load->view('location');
	}
    public function envoiCoordonnees(){
        $lat = $this->input->post('latitude');
        $lng = $this->input->post('longitude');
        $destLat = $this->input->post('destLatitude');
        $destLng = $this->input->post('destLongitude');
        $array = [
            'lat' => $lat, 
            'lng' => $lng, 
            'destLat' => $destLat,
            'destLng' => $destLng,
        ];
        // get coordonnées des chauffeurs
        $chauffeurs = array();
        $chauffeurs[0]=array('id'=>1, 'latitude'=>-18.920, 'longitude'=>47.528);
        $chauffeurs[1]=array('id'=>2, 'latitude'=>-18.918, 'longitude'=>47.527);
        $chauffeurs[2]=array('id'=>3, 'latitude'=>-18.922, 'longitude'=>47.525);
        $chauffeurs[3]=array('id'=>4, 'latitude'=>-18.950, 'longitude'=>47.530);
        $chauffeurs[4]=array('id'=>5, 'latitude'=>-18.955, 'longitude'=>47.524);

        $this->load->model('passager');
        $listeChauffeurs = $this->passager->getProximite1km($chauffeurs,$lat,$lng);

        echo json_encode ($listeChauffeurs);
    }

}