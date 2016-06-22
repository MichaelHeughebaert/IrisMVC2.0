<?php

namespace models;

use libs\Form;
use libs\Model;
use libs\Session;

class Authentication_model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        if (isset($_POST['Gebruikersnaam']) && isset($_POST['Wachtwoord'])) {
            $form = new Form();

            $form->post('Gebruikersnaam')
                ->val('required')
                ->post('Wachtwoord')
                ->val('required');

            $errorArray = $form->submit();

            if (isset($errorArray)) {
                return $errorArray;
            }

            if ($this->provider->auth()->attempt($form->fetch('Gebruikersnaam'), $form->fetch('Wachtwoord'))) {
                Session::set('isLogged', true);
                header('location: ' . URL . 'dashboard');
            } else {
                echo 'le epic fail';
            }

            exit();
        }
    }
}