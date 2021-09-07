<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Inscription extends CI_Controller{
    public function index () {
        $data = array (
            'page' => 'inscription'
        );
        $this->load->view('template.php', $data);
    }
}