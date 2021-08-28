<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Paiement extends CI_Model{
	
	public function getPaiement(){
		$query = $this->db->query('SELECT * FROM Paiement');
		$paiement = array();
		foreach ($query->result_array() as $key) {
			$paiement[] = $key;
		}
		return $paiement;
	}
}