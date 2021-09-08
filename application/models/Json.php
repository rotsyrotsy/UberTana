<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Json extends CI_Model{
    public function insertInFileClient($clientFile, $idPassager, $lat, $lng, $destLat, $destLng,$nom){
        $array = array('idPassager'=>$idPassager,'nom'=>$nom, 'latitude' => floatval($lat),'longitude' => floatval($lng),'destLat' => floatval($destLat),'destLng' => floatval($destLng));
        $myfile = fopen($clientFile, "r") or die("Unable to open file!");
        $before =  fread($myfile,filesize($clientFile));

        if (filesize($clientFile)>0){
            $fp = fopen($clientFile, 'w+');
            $change = str_replace(']', '', $before);
            $after = $change.",".json_encode($array, JSON_PRETTY_PRINT)."]";
            fwrite($fp, $after);  
            fclose($fp);
        }else{
            $fp = fopen($clientFile, 'w+');
            $after = "[".json_encode($array, JSON_PRETTY_PRINT)."]";
            fwrite($fp, $after);  
            fclose($fp);
        }
        fclose($myfile);
    }
    public function insertInFileChauffeur($chauffeurFile, $idChauffeur, $lat, $lng,$nom){
        $array = array('idChauffeur'=>$idChauffeur,'nom'=>$nom,'latitude' => floatval($lat),'longitude' => floatval($lng));

        $myfile = fopen($chauffeurFile, "r") or die("Unable to open file!");
        $before =  fread($myfile,filesize($chauffeurFile));
        if (filesize($chauffeurFile)>0){
            $fp = fopen($chauffeurFile, 'w+');
            $change = str_replace(']', '', $before);
            $after = $change.",".json_encode($array, JSON_PRETTY_PRINT)."]";
            fwrite($fp, $after);  
            fclose($fp);
        }else{
            $fp = fopen($chauffeurFile, 'w+');
            $after = "[".json_encode($array, JSON_PRETTY_PRINT)."]";
            fwrite($fp, $after);  
            fclose($fp);
        }
        fclose($myfile);
    }
}