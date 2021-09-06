<?php if(!defined('BASEPATH')) exit('No direct script acces allowed');

class Chauffeur extends CI_Model 
{
    
    public function payer($email,$valeur,$date_heure)
    {
        $sql = "insert into paiement values(nextval('seqPaiement'),'"+$emailClient+"',"+$valeur+",'"+$date_heure+"')";
        $this->db->query($sql);
    } 


    public function depot($cardNumber, $password, $value, $driverID){
        $sql = "call depot(%s, %f)";
        $sql = sprintf($sql, $this->db->escape($driverID), $value);
        $sold = $this->check_sold($cardNumber, $password);
        
        if($sold < $value){
            throw new Exception('sold insuffisant !!');
        } 

        $this->db->query($sql);

    }

    public function check_sold($cardNumber, $password){
        $sql = "SELECT sold from BANKACCOUNT where cardNumber = %s and password = sha256(%s)";
        $sql = sprintf($sql, $this->db->escape($cardNumber), $this->db->escape($password));
        var_dump($sql);
        $query = $this->db->query($sql);
        $result = $query->row_array();
        if($result == null){
            throw new Exception('erreur de compte !!');
        } else {
            return (float) $result['sold'];
        }
    }
}