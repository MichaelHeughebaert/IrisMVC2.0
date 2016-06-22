<?php

namespace libs;

use controllers\dashboard;
use controllers\error;

class Bootstrap
{
    /**
     * @var $_url array Contains the current url, used for routing.
     * @var $_controller Object Contains the currently loaded controller.
     */
    private $_url = null;
    private $_controller = null;

    /**
     * Initial function to be called inside bootstrap class.
     * Reads and processes the URL.
     * Loads the required controller.
     * Loads the required method.
     */
    public function init()
    {
        $this->_getUrl();

        if (empty($this->_url[0])) {
            $this->_loadDefaultController();
            return;
        }

        $this->_loadExistingController();
        $this->_callControllerMethod();
    }

    /**
     * Function used to split the URL into usable parts.
     * Used to determine which controller and function need to be called.
     */
    private function _getUrl()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $this->_url = explode('/', $url);
    }

    /**
     * Function used to call the default controller.
     */
    private function _loadDefaultController()
    {
        $this->_controller = new Dashboard();
        $this->_controller->index();
    }

    /**
     * Function used to call a specific controller.
     * Calls Error controller when an invalid controller is specified.
     */
    private function _loadExistingController()
    {
        $file = 'controllers/' . $this->_url[0] . '.php';

        if (file_exists($file)) {
            $controller = '\\controllers\\' . $this->_url[0];
            $this->_controller = new $controller;
            $this->_controller->loadModel($this->_url[0] . '_model');
        } else {
            $this->_loadErrorController();
        }
    }

    /**
     * Function used to call Error controller.
     */
    private function _loadErrorController()
    {
        $this->_controller = new Error();
        $this->_controller->index();
        exit();
    }

    /**
     * Function used to call a specific method inside the controller.
     *
     * Checks if URL is required length and redirects to error page if needed.
     * Call method of controller using parameters in url, current maximum of 3 parameters per method.
     */
    private function _callControllerMethod()
    {
        $length = count($this->_url);

        if ($length > 1) {
            if (!method_exists($this->_controller, $this->_url[1])) {
                $this->_loadErrorController();
            }
        }

        switch ($length) {
            default:
                $this->_controller->index();
                break;
            case 2:
                $this->_controller->{$this->_url[1]} ();
                break;
            case 3:
                $this->_controller->{$this->_url[1]} ($this->_url[2]);
                break;
            case 4:
                $this->_controller->{$this->_url[1]} ($this->_url[2], $this->_url[3]);
                break;
            case 5:
                $this->_controller->{$this->_url[1]} ($this->_url[2], $this->_url[3], $this->_url[4]);
                break;
        }

        //TODO: Rewrite switch to handle more parameters
    }
}