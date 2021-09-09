<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    //require_once('Base_Controller.php');
    class achat_coin extends CI_Controller {
        public function index() {
            $data = array(
                'page'=>'achat_coin'
            );

            $this-> load -> view('template', $data);
        }
    }
?>