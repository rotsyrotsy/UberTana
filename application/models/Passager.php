<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Passager extends CI_Model{

	public function getPassager(){
		$query = $this->db->query('SELECT * FROM Passager');
		$passager = array();
		foreach ($query->result_array() as $key) {
			$passager[] = $key;
		}
		return $passager;
	}
}