<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once('Base_Controller.php');
class Accueil extends CI_Controller {

	public function __construct(){
		parent::__construct();

	}
	
	public function index(){
        $data = array(
            'page' => 'login'
        );
        $this -> load -> view('template', $data);
	}

}
?>
