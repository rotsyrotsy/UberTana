<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin extends CI_Controller {
		// public function getProduit() {
		// 	$data["produit"] = $this->produit_model->getAllProduit();
		// 	$this->load->view("produit", $data);
		// }

		// public function delete($id) {
		// 	$this->produit_model->deleteById($id);
		// 	getProduit();
		// }
        public function index(){

            // $this->load->model('depot');
			$data['year'] = $this->depot->annee();
			$annee = 2021;
			$data['annee'] = $annee;
			$data['chiffre'] = $this->depot->chiffreAffMoisAnnee($annee);
		    $data['moyenne'] = $this->depot->moyenneCAAnnee($annee);
            $data['page_admin'] = 'gestion_admin_accueil';
            $this->load->view('template_admin',$data);
            // $this->load->view('template_admin');

        }
		public function gestion_chauffeur(){
			$data['page_admin'] = 'gestion_admin_chauffeur';
			$data['note'] = $this->admin_model->getDriverNote();
			$this->load->view('template_admin',$data);
			
		}
		public function gestion_client(){
			$data['page_admin'] = 'gestion_admin_client';
			$data['note'] = $this->admin_model->getPassengerNote();
			$this->load->view('template_admin',$data);
		}
		public function gestion_coin(){
			$data['page_admin'] = 'gestion_admin_coin';
			$data['coin'] = $this->admin_model->getConfig();
			$this->load->view('template_admin',$data);
		}

		public function affCA(){
			$annee = $this->input->post('annee');
			if($annee == null) {
				$annee = 2021;
			}
			$data['year'] = $this->depot->annee();
			$data['chiffre'] = $this->depot->chiffreAffMoisAnnee($annee);
		    $data['moyenne'] = $this->depot->moyenneCAAnnee($annee);
			$data['annee'] = $annee;
			$data['page_admin'] = 'gestion_admin_accueil';
            $this->load->view('template_admin',$data);
		}
		// public function getListNoteDriver()
		// {
		// 	$data['driverNote'] = $this->admin->getDriverNote();
		// 	$this->load->view("vue_admin",$data);
		// }
		// public function getListNotePassenger()
		// {
		// 	$data['PassengerNote'] = $this->admin->getPassengerNote();
		// 	$this->load->view("vue_admin",$data);
		// }
		public function delete_Client()
		{
			$email = $this->input->get('email');
			$this->admin_model->deleteClient($email);
			$data['page_admin'] = 'gestion_admin_chauffeur';
			$data['note'] = $this->admin_model->getDriverNote();
			$this->load->view('template_admin',$data);
			// $this->getListNoteDriver();
		}
		public function delete_Passenger()
		{
			$email = $this->input->get('email');
			$this->admin_model->deletePassenger($email);
			$data['page_admin'] = 'gestion_admin_client';
			$data['note'] = $this->admin_model->getPassengerNote();
			$this->load->view('template_admin',$data);
		}
		public function updateConfig()
		{	
			$data['page_admin'] = 'gestion_admin_coin';
			$ariary = $this->input->post('ariary');
			$this->admin_model->updateConfig($ariary);
			$data['coin'] = $this->admin_model->getConfig();
			$data['message'] = "Mise à jour effectuée";
			$this->load->view('template_admin',$data);
			// $this->gestion_coin();
		}
	
		// public function getConfigCoin()
		// {
		// 	$data['configuration'] = $this->admin->getConfig();
		// 	$this->load->view("vue_admin",$data);

		// }


	}
?>