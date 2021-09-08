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
	public function insertPassager($email,$nom,$mdp){
		$query = "INSERT INTO Passager VALUES ('%s','%s','%s')";
		$this->db->query(sprintf($query,$email,$nom,$mdp));

	}
	public function getPassagerLogin($mail, $mdp){
		$query = "SELECT * FROM Passager where email='%s' and  mdp='%s'";
		$result = $this->db->query(sprintf($query,$mail,$mdp));
		$passager = array();
		foreach ($result->result_array() as $key) {
			$passager[] = $key;
		}
		if (count($passager)>0){
			return $passager[0];
		}else{
			return null;
		}
	}
	public function getPassagerById($mail){
		$query = "SELECT * FROM Passager where email='%s'";
		$query = sprintf($query,$mail);
		$result = $this->db->query($query);
		$client = array();
		foreach ($result->result_array() as $key) {
			$client[] = $key;
		}
		return $client[0];
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
	public function choixChauffeur($idPassager){
		$sql="SELECT dp.*,c.nom  FROM driverProposition dp join client c
		on dp.idDriver=c.email where dp.idClient='%s' and dp.statue=0";
        $sql=sprintf($sql,$idPassager);
        $query=$this->db->query($sql);
        $i=0;
		$val = null;
        foreach($query->result_array() as $row){
            foreach ($row as $key => $value) {
                $val[$i][$key]=$value;
            }
            $i++;
        }
        return $val;
	}
}