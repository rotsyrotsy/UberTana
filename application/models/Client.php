<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Client extends CI_Model{

	public function loginClient($username,$password){

		$query = $this->db->where('email',$username)->where('mdp',$password)->get('client');

        if($query->num_rows() == 1){

            return 1;
        }

        return 0;
	}
	
	public function getClient(){
		$query = $this->db->query('SELECT * FROM Client');
		$client = array();
		foreach ($query->result_array() as $key) {
			$client[] = $key;
		}
		return $client;
	}
	public function getClientByIdChauffeur($mail){
		$query = "SELECT * FROM Client where email='%s'";
		$query = sprintf($query,$mail);
		$result = $this->db->query($query);
		$client = array();
		foreach ($result->result_array() as $key) {
			$client[] = $key;
		}
		return $client[0];
	}
	public function getChauffeurLogin($mail, $mdp){
		$query = "SELECT * FROM Client where email='%s' and  mdp='%s'";
		$query = sprintf($query,$mail,$mdp);
		// var_dump($query);
		$result = $this->db->query($query);
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
	public function insertChauffeur($email,$nom,$prenom, $modele, $matricule , $mdp,$numtel, $nationalite, $dtn,$sexe){
		$query = "INSERT INTO Client (email,nom,prenom, modele, matricule , mdp,numtel, nationalite, dtn,sexe) VALUES('%s','%s','%s','%s', '%s', '%s','%s','%s','%s','%s' )";
		$query = sprintf($query,$email,$nom,$prenom, $modele, $matricule , $mdp,$numtel, $nationalite, $dtn,$sexe);
		$this->db->query($query);
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
		$query = "INSERT INTO DriverProposition VALUES ('DP' || nextval('seqDriverProposition'),'%s','%s',%d,0, NOW());";
		$query = sprintf($query,$idChauffeur,$idPassager,$proposition);
		$this->db->query($query);
	}

	public function checkout($email,$value)
    {
        $sql = "insert into paiement values(nextval('seqPaiement'),'".$email."',".$value.",NOW())";
        $checker = $this->client->check_coin_sold($email);
        if(!$checker){
			return false;
            // throw new Exception("Niveau de coin insuffisant!!");
        }
        $this->db->query($sql);
		return true;
    } 

	public function getActualCoin($email){
		$sql = "SELECT actual_coin(%s) as coin";
        $sql = sprintf($sql, $this->db->escape($email));
		$result = $this->db->query($sql);
		$client = array();
		foreach ($result->result_array() as $key) {
			$client[] = $key;
		}
		return $client[0];
	}

    public function check_coin_sold($email){
        $sql = "SELECT actual_coin(%s) as coin";
        $sql = sprintf($sql, $this->db->escape($email));
        $query = $this->db->query($sql);
        $result = $query->row_array();
        if((float) $result['coin'] < 1){
            return false;
        }
        return true;
    }


    public function depot($cardNumber, $password, $value, $driverID){
        $sql = "call depot(%s, %f, %s)";
        $sql = sprintf($sql, $this->db->escape($driverID), $value, $this->db->escape($cardNumber));
        $sold = $this->client->check_sold($cardNumber, $password);
        
        if($sold < $value){
			return false;
            //throw new Exception('sold insuffisant !!');
        } 
        $this->db->query($sql);
		return true;

    }

    public function check_sold($cardNumber, $password){
        $sql = "SELECT sold from BANKACCOUNT where cardNumber = %s and password = cast(sha256(%s) as char(256))";
        $sql = sprintf($sql, $this->db->escape($cardNumber), $this->db->escape($password));
        $query = $this->db->query($sql);
        $result = $query->row_array();
        if($result == null){
            throw new Exception('erreur de compte !!');
        } else {
            return (float) $result['sold'];
        }
    }

}