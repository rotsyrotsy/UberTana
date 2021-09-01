<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Depot extends CI_Model{
	
	public function getDepot(){
		$query = $this->db->query('SELECT * FROM Depot');
		$depot = array();
		foreach ($query->result_array() as $key) {
			$depot[] = $key;
		}
		return $depot;
	}
}