<?php

namespace models;

use libs\Form;
use libs\Model;
use libs\Session;

class Authentication_model extends Model
{
    /**
     * Function to handle the user login.
     *
     * Validates form data.
     * Checks if data is correct in AD.
     * Log in user and create session.
     *
     * @return array|bool Return error array of error code
     */
    public function login()
    {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $form = new Form();

            $form->post('username')
                ->val('required')
                ->post('password')
                ->val('required');

            $errors = $form->submit();

            if ($errors['hasError'] == 1) {
                return $errors;
            }

            if ($this->provider->auth()->attempt($form->fetch('username'), $form->fetch('password'))) {
                Session::set('isLogged', true);
                Session::set('username', $form->fetch('username'));
                return true;
            }
        }

        return false;
    }
}