<?php

namespace controllers;

use libs\Controller;

class Authentication extends Controller
{
    /**
     * Authentication constructor.
     */
    public function __construct()
    {
        parent::__construct(true);
    }

    /**
     * Renders the Authentication index view
     *
     * Checks if user is logged in.
     * Redirects to login if false, to dashboard if true.
     */
    public function index()
    {
        $params = array('scripts' => array('login'));
        $this->view->render('authentication/index', 'Aanmelden', $params);
    }

    /**
     * Calls the login function in the model.
     * Renders login page with errors if login failed.
     */
    public function login()
    {
        $params = array('scripts' => array('login'));
        $errors = $this->model->login();

        if ($errors === true) {
            header('location: /dashboard');
        } else {
            if (is_array($errors)) {
                $params = array_merge($params, array('errors' => $errors));
            }

            $this->view->render('authentication/index', 'Aanmelden', $params);
        }
    }
}