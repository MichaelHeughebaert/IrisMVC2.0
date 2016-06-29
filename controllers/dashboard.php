<?php

namespace controllers;

use libs\Controller;

class Dashboard extends Controller
{
    /**
     * Renders the Dashboard index view
     */
    public function index()
    {
        $this->view->render('dashboard/index', 'Dashboard');
    }
}