<?php

namespace controllers;

use libs\Controller;
use libs\Session;

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
        $isLogged = Session::get('isLogged');

        if(!$isLogged) {
            $this->renderLogin();
        } else {
            $this->view->render('dashboard/index');
        }
    }

    /**
     * Calls the login function in the model.
     * Renders login page with errors if login failed.
     */
    public function login()
    {
        $errors = $this->model->login();

        if (isset($errors)) {
            $this->view->errorArray = $errors;
        }

        $this->renderLogin();
    }

    /**
     * Renders the login page.
     */
    public function renderLogin()
    {
        $this->view->title = 'Aanmelden';
        $this->view->scripts = array('login');
        $this->view->render('authentication/index');
    }
}