<?php

namespace libs;

class View
{
    /**
     * View constructor.
     */
    public function __construct() {}

    /**
     * Function used to render a specific view
     *
     * @param $view string Contains the name of the view it needs to load.
     */
    public function render($view)
    {
        require 'views/header.php';
        require 'views/' . $view . '.php';
        require 'views/footer.php';
    }
}