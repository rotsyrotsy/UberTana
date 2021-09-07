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
}