<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Note extends CI_Model{
	
	public function getNote(){
		$query = $this->db->query('SELECT * FROM Note');
		$note = array();
		foreach ($query->result_array() as $key) {
			$note[] = $key;
		}
		return $note;
	}
}