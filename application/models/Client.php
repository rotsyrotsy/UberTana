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
	public function getChauffeurLogin($mail, $mdp){
		$query = "SELECT * FROM Client where email='%s' and  mdp='%s'";
		$result = $this->db->query(sprintf($query,$mail,$mdp));
		$chauffeur = array();
		foreach ($result->result_array() as $key) {
			$chauffeur[] = $key;
		}
		if (count($chauffeur)>0){
			return $chauffeur[0];
		}else{
			return null;
		}
	}
	public function getProximite1km($tab, $lat, $long){
		$XLatitude=0.009;
		$cosinusLong=cos(deg2rad($lat));
		$UnLongitude=111.11*$cosinusLong;
		$XLongitude=2/$UnLongitude;
		
		$XLatitude1= $lat-$XLatitude;
		$XLatitude2= $lat+$XLatitude;
		
		$XLongitude1=$long-$XLongitude;
		$XLongitude2=$long+$XLongitude;

		$ret = [];
		for ($i=0; $i<count($tab); $i++){
			if ($tab[$i]['longitude']> $XLongitude1 && $tab[$i]['longitude']<= $XLongitude2 && $tab[$i]['latitude']> $XLatitude1 && $tab[$i]['latitude']<= $XLatitude2) {
				array_push($ret,$tab[$i]);
			}
		}
		return $ret;
	}
	public function proposerPrix($idChauffeur,$idPassager,$proposition){
		$query = "INSERT INTO DriverProposition VALUES ('DP' || nextval('seqDriverProposition'),'%s','%s',%d,0);";
		$query = sprintf($query,$idChauffeur,$idPassager,$proposition);
		$this->db->query($query);
	}

}