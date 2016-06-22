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
            $this->view->title = 'Aanmelden';
            $this->view->scripts = array('login');
            $this->view->render('authentication/index', false);
        } else {
            $this->view->render('dashboard/index');
        }
    }
}