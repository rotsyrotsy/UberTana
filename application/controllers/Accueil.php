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
    public function choisirChauffeur($idChauffeur){
        $idClient = 'p1@gmail.com'; // anaty session
        $this->load->model('passager');
        $this->passager->setDemande($idChauffeur, $idClient);
    }
    public function contexteClient()
    {
        // $lat = $this->input->post('latitude');
        // $lng = $this->input->post('longitude');
        // $destLat = $this->input->post('destLatitude');
        // $destLng = $this->input->post('destLongitude');

        $lat=-18.85;
        $lng =47.88;
        $destLat=-18.55;
        $destLng=47.89;

        $data = 
            array(
                "lat" => $lat, 
                'lng' => $lng, 
                'destLat' => $destLat,
                'destLng' => $destLng
            
            );
            $data2 = 
                array(
                    "lat" => "mmm", 
                    'lng' => "mmmm", 
                    'destLat' => "uuuu",
                    'destLng' => "yyy"
                
                );
        // $array = array(
        //     'http' => array (
        //         'method' => 'POST',
        //         'header'=> "Content-type: application/x-www-form-urlencoded\r\n"
        //             . "Content-Length: " . strlen($data) . "\r\n",
        //         'content' => $data
        //         )
        //     );
          
        // $context = stream_context_create();
        // stream_context_set_params($context,$data);
        $ctx = stream_context_create();
        $params = array("notification" => $data);
        stream_context_set_params($ctx, $params);
        $_SERVER['exemple']="ceci est un test";
        $this->load->view('location');

        // echo json_encode($context);
        // var_dump(stream_context_get_params($context));
    }

}