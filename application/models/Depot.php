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

	public function chiffreAffMoisAnnee($annee){
		$sql = "select * from turnoverIn(%s)";
		$sql = sprintf($sql,$this->db->escape($annee));
		$query = $this->db->query($sql);
		$depot = array();
		foreach ($query->result_array() as $key) {
			$depot[] = $key;
		}
		return $depot;
	}

	public function moyenneCAAnnee($annee){
		$sql = "select moyenneCAAnnee(%s) as moyenneCA";
		$sql = sprintf($sql,$this->db->escape($annee));

		$query = $this->db->query($sql);

		$depot = array();
		foreach ($query->result_array() as $key) {
			$depot[] = $key;
		}
		return $depot;
	}
}