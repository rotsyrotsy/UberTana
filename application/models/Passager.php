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
	public function getPassagerById($mail){
		$query = $this->db->query("SELECT * FROM Passager where email='%s'");
		$result = $this->db->query(sprintf($query,$mail));
		$passager = array();
		foreach ($query->result_array() as $key) {
			$passager[] = $key;
		}
		return $passager[0];
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
        var_dump($sql);
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