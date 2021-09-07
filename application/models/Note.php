<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Note extends CI_Model{
	
	public function getNoteChauffeur(){
		$query = $this->db->query('SELECT * FROM NoteChauffeur');
		$note = array();
		foreach ($query->result_array() as $key) {
			$note[] = $key;
		}
		return $note;
	}

	public function getNotePassager(){
		$query = $this->db->query('SELECT * FROM NotePassager');
		$note = array();
		foreach ($query->result_array() as $key) {
			$note[] = $key;
		}
		return $note;
	}

	public function noteChauffeur(){
		$query = $this->db->query('select Client.nom as nomChauffeur, round(avg(noteChauffeur.note)) as noteMoyenne from noteChauffeur join Client on Client.email = noteChauffeur.emailClient group by Client.email');
		$note = array();
		foreach ($query->result_array() as $key) {
			$note[] = $key;
		}
		return $note;
	}

	public function notePassager(){
		$query = $this->db->query('select passager.nom as nomPassager, round(avg(notePassager.note)) as noteMoyenne 
			    from notePassager join passager on passager.email = notePassager.emailPassager 
			    group by passager.email');
		$note = array();
		foreach ($query->result_array() as $key) {
			$note[] = $key;
		}
		return $note;
	}
}