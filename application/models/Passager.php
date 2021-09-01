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

// 	public function getRequestProximity($la){
// 		$sql_distance = $having = '';
// if (!empty($distance_km) && !empty($latitude) && !empty($longitude)) {
//     $radius_km = $distance_km;
//     $sql_distance = " ,(((acos(sin((" . $latitude . "*pi()/180)) * sin((`p`.`latitude`*pi()/180))+cos((" . $latitude . "*pi()/180)) * cos((`p`.`latitude`*pi()/180)) * cos(((" . $longitude . "-`p`.`longitude`)*pi()/180))))*180/pi())*60*1.1515*1.609344) as distance ";

//     $having = " HAVING (distance <= $radius_km) ";

//     $order_by = ' distance ASC ';
// } else {
//     $order_by = ' p.id DESC ';
// }

// // Fetch places from the database 
// $sql = "SELECT p.*" . $sql_distance . " FROM places p $having ORDER BY $order_by";
// $query = $db->query($sql);


// 	}
	public function getListDriver($rayon){
		$query = "SELECT * FROM Client WHERE  = '%s' ";
		$result = $this->db->query(sprintf($query,$rayon));
		$passager = array();
		foreach ($query->result_array() as $key) {
			$passager[] = $key;
		}
		return $passager;
	}

	public function getDriver($emailDriver){
		$query = "SELECT * FROM Client WHERE email = '%s' ";
		$result = $this->db->query(sprintf($query,$emailDriver));
		$passager = array();
		foreach ($query->result_array() as $key) {
			$passager[] = $key;
		}
		return $passager;
	}

	public function setDemande($emailDriver,$emailPassager){
		$query = "INSERT INTO Demande VALUES ('%s','%s')";
		$result = $this->db->query(sprintf($query,$emailPassager,$emailDriver));
	}

	public function setDemande($emailDriver,$emailPassager,$note){
		$query = "INSERT INTO Demande VALUES ('%s','%s',%s)";
		$result = $this->db->query(sprintf($query,$emailDriver,$emailPassager,$note));
	}
}