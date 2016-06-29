<?php

namespace libs;

class Controller
{
    public $model;

    /**
     * Controller constructor.
     *
     * Checks if user is logged in, redirect to login if false.
     * Creates View object.
     *
     * @param bool $loginPage Is it the login page?
     */
    public function __construct($loginPage = false)
    {
        $isLogged = Session::get('isLogged');
        $this->view = new View();

        if(!$isLogged && !$loginPage) {
            Session::destroy();
            $this->view->render('authentication/index', 'Aanmelden', array('scripts' => array('login')));
            exit;
        }
    }

    /**
     * Function used to load the required model into memory
     *
     * @param string $class Name of the model class to be included
     */
    public function loadModel($class)
    {
        $file = 'models/' . $class . '.php';

        if (file_exists($file)) {
            $model = '\\models\\' . $class;
            $this->model = new $model;
        }
    }
}
