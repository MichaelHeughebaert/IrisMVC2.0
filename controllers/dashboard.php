<?php

namespace controllers;

use libs\Controller;

class Dashboard extends Controller
{
    /**
     * Dashboard constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Renders the Dashboard index view
     */
    public function index()
    {
        $this->view->title = 'Dashboard';
        $this->view->render('dashboard/index');
    }
}