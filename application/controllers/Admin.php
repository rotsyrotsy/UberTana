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
		public function getListNoteDriver()
		{
			$data['driverNote'] = $this->admin->getDriverNote();
			$this->load->view("vue_admin",$data);
		}
		public function getListNotePassenger()
		{
			$data['PassengerNote'] = $this->admin->getPassengerNote();
			$this->load->view("vue_admin",$data);
		}
		public function delete_Client($email)
		{
			$this->admin->deleteClient($email);
			$this->getListNoteDriver();
		}
		public function delete_Passenger($email)
		{
			$this->admin->deletePassenger($email);
			$this->getListNotePassenger();
		}
		public function updateConfig()
		{	
			$coin = $this->input->post('coin');
			$ariary = $this->input->post('ariary');
			$this->admin_model->updateConfig($ariary,$coin);
			$this->getListNoteDriver();
		}
	}
?>