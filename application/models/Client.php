<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Client extends CI_Model{
	
	public function getClient(){
		$query = $this->db->query('SELECT * FROM Client');
		$client = array();
		foreach ($query->result_array() as $key) {
			$client[] = $key;
		}
		return $client;
	}

// 	public function getAroundDriver() {
// 		$query = $this->db->query('SELECT * FROM (
//     SELECT *, 
//         (
//             (
//                 (
//                     acos(
//                         sin(( $LATITUDE * pi() / 180))
//                         *
//                         sin(( `latitud_fieldname` * pi() / 180)) + cos(( $LATITUDE * pi() /180 ))
//                         *
//                         cos(( `latitud_fieldname` * pi() / 180)) * cos((( $LONGITUDE - `longitude_fieldname`) * pi()/180)))
//                 ) * 180/pi()
//             ) * 60 * 1.1515 * 1.609344
//         )
//     as distance FROM `myTable`
// ) myTable
// WHERE distance <= $DISTANCE_KILOMETERS
// LIMIT 15;');
// 		$client = array();
// 		foreach ($query->result_array() as $key) {
// 			$client[] = $key;
// 		}
// 		return $client;
// 	}
	
}