<?php

namespace controllers;

use libs\Controller;

class Error extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Renders the Error index view
     */
    public function index()
    {
        $this->view->render('error/index');
    }
}