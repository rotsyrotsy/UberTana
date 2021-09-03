<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Admin extends CI_Model{
	
	public function getAdmin(){
		$query = $this->db->query('SELECT * FROM Admin');
		$admin = array();
		foreach ($query->result_array() as $key) {
			$admin[] = $key;
		}
		return $admin;
	}

	public function insert_Admin($email,$mdp){
		$sql = "INSERT INTO Admin VALUES (%s,%s)";
		$sql = sprintf($sql,$this->db->escape($email),$this->db->escape($mdp));
		$this->db->query($sql);
	}

	
}
?>