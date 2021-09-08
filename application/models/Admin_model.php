<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Admin_model extends CI_Model{
	
	public function getAdmin(){
		$query = $this->db->query('SELECT * FROM Admin');
		$admin = array();
		foreach ($query->result_array() as $key) {
			$admin[] = $key;
		}
		return $admin;
	}

	public function insert_Admin($email,$mdp){
		$sql = "INSERT INTO Admin VALUES (%s,%s)";
		$sql = sprintf($sql,$this->db->escape($email),$this->db->escape($mdp));
		$this->db->query($sql);
	}

	public function loginAdmin($username,$password){

		$query = $this->db->where('email',$username)->where('mdp',$password)->get('admin');

        if($query->num_rows() == 1){

            return 1;
        }

        return 0;
	}
	
	public function updateConfig($ariary){
		$sql = "update config set ariary = %s";
		$sql = sprintf($sql,$this->db->escape($ariary));
		$this->db->query($sql);
	}

	public function deleteClient($email){
		$query = " DELETE FROM Client WHERE email = '%s'";
		$this->db->query(sprintf($query, $email)); 
	}

	public function deletePassenger($email){
		$query = " DELETE FROM Passager WHERE email = '%s'";
		echo $query;
		$this->db->query(sprintf($query, $email)); 
	}

	
	public function getDriverNote(){
		$query = $this->db->query('SELECT  email,nom,avg(note) as note FROM NDriverNote GROUP BY email,nom');
		$note = array();
		foreach ($query->result_array() as $key) {
			$note[] = $key;
		}
		return $note;
	}

	public function getPassengerNote()
	{
		$query = 'SELECT email,nom,avg(note) as note FROM NPassagerNote GROUP BY nom,email';
		echo $query;
		$query = $this->db->query($query);
		$driverNote = array();
		foreach($query->result_array() as $row) {
			$driverNote[] = $row;
					}
		return $driverNote ;
	}

	public function getConfig()
	{
		$query = "SELECT * FROM CONFIG";
		$query =$this->db->query($query);
		$config = $query->row_array();
		return $config;
	}
}
?>