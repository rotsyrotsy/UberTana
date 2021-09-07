<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class TraitementLogin extends CI_Controller{
        public function index() {
            if (isset($_POST['email']) && isset($_POST['mdp'])) {
                $email = $_POST['email'];
                $mdp = $_POST['mdp'];
                $retour = true;
                /*
                    Si retour true, activer la session utilisateur, sinon message d'erreur
                */
                $array = Array (
                    'retour' => $retour==true?'connecté':'refusé',
                    'utilisateur' => $email,
                    'mdp' => $mdp
                );
                echo json_encode($array);
            }
        }
    }
?>