<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once('Base_Controller.php');
class Statistique extends CI_Controller {

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

	public function statNoteChauffeur(){
		$this->load->model('note');
		$data['chauffeur'] = $this->note->noteChauffeur();

		$this->load->view('stat',$data);
	}

	public function statNotePassager(){
		$this->load->model('note');
		$data['passager'] = $this->note->notePassager();

		$this->load->view('stat',$data);
	}

	public function chiffreAffaire(){
		$this->load->model('depot');
		$data['chiffre'] = $this->depot->chiffreAffMoisAnnee();

		$this->load->view('stat',$data);
	}
}