<?php

namespace controllers;

use libs\Controller;

class Error extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo 'Dit is de error index';
    }
}