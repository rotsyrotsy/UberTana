<?php if(!defined('BASEPATH')) exit('No direct script acces allowed');

class Model extends CI_Model 
{
    
    public function payer($email,$valeur,$date_heure)
    {
        $sql = "insert into paiement values(nextval('seqPaiement'),'"+$emailClient+"',"+$valeur+",'"+$date_heure+"')";
        $this->db->query($sql);
    } 
}