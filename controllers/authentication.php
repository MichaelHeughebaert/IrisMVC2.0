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

    public function login()
    {
        $errors = $this->model->login();

        if (isset($errors)) {
            $this->view->errorArray = $errors;
        }

        $this->renderLogin();
    }

    public function renderLogin()
    {
        $this->view->title = 'Aanmelden';
        $this->view->scripts = array('login');
        $this->view->render('authentication/index');
    }
}