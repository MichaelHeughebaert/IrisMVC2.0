<?php

namespace controllers;

use libs\Controller;

class Dashboard extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo 'Dit is de dashboard index';
    }
}