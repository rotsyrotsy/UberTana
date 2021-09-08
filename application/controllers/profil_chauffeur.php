<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class profil_chauffeur extends CI_Controller{
        public function index () {
            $data = array (
                'page' => 'profil_chauffeur'
            );
            $this->load->view('template', $data);
        }
    }
?>