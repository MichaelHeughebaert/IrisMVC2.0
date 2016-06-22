<?php

namespace libs;

class Controller
{
    public $model;

    /**
     * Controller constructor.
     *
     * Creates View object.
     */
    public function __construct()
    {
        $this->view = new View();
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