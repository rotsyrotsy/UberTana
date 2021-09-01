<?php if(!defined('BASEPATH')) exit('No direct script acces allowed');

class Model extends CI_Model 
{
    CREATE TABLE Paiement(
        idPaiement VARCHAR(20) NOT NULL PRIMARY KEY,
        emailClient VARCHAR(20),
        valeur  DOUBLE PRECISION,
        date_heure TIMESTAMP,
        foreign key (emailClient) references Client(email) ON DELETE CASCADE
    );
    
    public function payer($email,$valeur,$date_heure)
    {
        $sql = "insert into paiement values(nextval('seqPaiement'),'"+$emailClient+"',"+$valeur+",'"+$date_heure+"')";
        $this->db->query($sql);
    } 
}