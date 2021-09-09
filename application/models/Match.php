<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Match extends CI_Model{

	public function matching($idChauffeur, $idPassager){
		$query = "INSERT INTO Match VALUES ('M' || nextval('seqMatch'),'%s','%s',NOW())";
		$query = sprintf($query,$idChauffeur,$idPassager);
		$this->db->query($query);
	}
    public function deleteDriverProposition($iddrivprop){
        $query = "UPDATE DriverProposition set statue=1 where iddrivprop='%s'";
		$query = sprintf($query,$iddrivprop);
		$this->db->query($query);
    }
	public function notMatch($idclient){
		$query = "DELETE FROM  DriverProposition where idclient='%s' and statue=0";
		$query = sprintf($query,$idclient);
		$this->db->query($query);
	}
	public function deleteFromClientFile($clientFile,$idPassager){
		if (file_get_contents($clientFile)!=false){
            $clientJson = file_get_contents($clientFile);
            $client = json_decode($clientJson, true);
            for ($i=0; $i<count($client); $i++){
                if ($client[$i]['idPassager']==$idPassager){
                    array_splice($client, $i, 1);
                }
            }

            $array = [];
            $txt = "[";
            for($i=0; $i<count($client); $i++){
                $el = array('idPassager'=>$client[$i]['idPassager'], 'latitude' => $client[$i]['latitude'],'longitude' => $client[$i]['longitude'],'destLat' => $client[$i]['destLat'],'destLng' => $client[$i]['destLng']);
                $txt = $txt.json_encode($el, JSON_PRETTY_PRINT);
                if ($i!=count($client)-1){
                    $txt = $txt.",";
                }
            }
            $txt = $txt."]";
            $fp = fopen($clientFile, 'w+');
            fwrite($fp, $txt);  
            fclose($fp);
        }
	}
	public function deleteFromDriverFile($chauffeurFile, $idChauffeur){
		if (file_get_contents($chauffeurFile)!=false){
            $chauffeurJson = file_get_contents($chauffeurFile);
            $chauffeur = json_decode($chauffeurJson, true);
            for ($i=0; $i<count($chauffeur); $i++){
                if ($chauffeur[$i]['idChauffeur']==$idChauffeur){
                    array_splice($chauffeur, $i, 1);
                }
            }

            $array = [];
            $txt = "[";
            for($i=0; $i<count($chauffeur); $i++){
                $el = array('idChauffeur'=>$chauffeur[$i]['idChauffeur'], 'latitude' => $chauffeur[$i]['latitude'],'longitude' => $chauffeur[$i]['longitude']);
                $txt = $txt.json_encode($el, JSON_PRETTY_PRINT);
                if ($i!=count($chauffeur)-1){
                    $txt = $txt.",";
                }
            }
            $txt = $txt."]";
            $fp = fopen($chauffeurFile, 'w+');
            fwrite($fp, $txt);  
            fclose($fp);
        }
	}

    
}