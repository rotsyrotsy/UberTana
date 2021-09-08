<?php if(!defined('BASEPATH')) exit('No direct script acces allowed');

class Chauffeur extends CI_Model 
{
    
    public function checkout($email,$value, $date_time)
    {
        $sql = "insert into paiement values(nextval('seqPaiement'),'"+$emailClient+"',"+$valeur+",'"+$date_heure+"')";
        $checker = check_coin_sold($email);
        if(!$checker){
            throw new Exception("Niveau de coin insuffisant!!");
        }
        $this->db->query($sql);
    } 

    public function check_coin_sold($email){
        $sql = "SELECT actual_coin(%s) as coin";
        $sql = sprintf($sql, $this->db->escape($email));
        $this->db->query($sql);
        $result = $query->row_array();
        if((float) $result['sold'] < 1){
            return false;
        }
        return true;
    }


    public function depot($cardNumber, $password, $value, $driverID){
        $sql = "call depot(%s, %f, %s)";
        $sql = sprintf($sql, $this->db->escape($driverID), $value,$this->db->escape($cardNumber));
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