<?php

namespace libs;

class View
{
    private $_parameters;
    private $_title;

    /**
     * Function used to render a specific view
     *
     * @param string $view Contains the name of the view it needs to load.
     * @param string $title Contains the title of the to be rendered view.
     * @param array $parameters Contains all parameters needed for the view.
     */
    public function render($view, $title, $parameters = array())
    {
        $file = 'views/' . $view . '.php';

        if (file_exists($file)) {
            $this->_setTitle($title);
            $this->_setParams($parameters);

            require 'views/header.php';
            require 'views/' . $view . '.php';
            require 'views/footer.php';
        } else {
            echo 'Could not find the required view!';
            exit();
        }
    }

    private function _setTitle($title)
    {
        $this->_title = 'Intranet | ' . $title;
    }

    private function _setParams($parameters)
    {
        $this->_parameters = $parameters;
    }

    public function getTitle()
    {
        return $this->_title;
    }

    public function getParam($param, $key = null)
    {
        if (!isset($key))
            return $this->_parameters[$param];

        if (array_key_exists($param, $this->_parameters)) {
            if ($param == 'scripts')
                return in_array($key, $this->_parameters['scripts']);
            if ($param == 'errors') {
                if (array_key_exists($key, $this->_parameters['errors']))
                    return $this->_parameters['errors'][$key];
            }


        }

        return false;
    }

    public function breadcrumbs($separator = 'fa fa-circle', $home = 'Beginpagina')
    {
        $controllers = array('errorhandler' => 'Systeem');
        $methods = array('errorhandler' => array('index' => 'Overzicht'));

        $path = array_filter(explode('/', strtolower(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))));
        $breadcrumbs = '<li><i class="icon-home"></i>&nbsp;<a href="/">' . $home . '</a></li>';

        if (!isset($path[1]) || $path[1] == 'dashboard')
            return $breadcrumbs;

        if (array_key_exists($path[1], $controllers)) {
            $breadcrumbs .= '<li><i class="' . $separator . '"></i><a href="/' . $path[1] . '">' . $controllers[$path[1]] . '</a></li>';

            if (array_key_exists($path[1], $methods)) {
                if (array_key_exists($path[2], $methods[$path[1]])) {
                    $breadcrumbs .= '<li><i class="' . $separator . '"></i><a href="/' . $path[1] . '/' . $path[2] . '">' . $methods[$path[1]][$path[2]] . '</a></li>';
                }
            }
        } else {
            $breadcrumbs .= '<li><i class="' . $separator . '"></i><a href="/">Systeem</li></a>';
        }

        return $breadcrumbs;
    }
}