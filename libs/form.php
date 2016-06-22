<?php

namespace libs;

use libs\Form\FormValidation;

class Form
{
    private $_validation = null;
    private $_errorArray = array();
    private $_currItem = null;
    private $_postData = array();

    public function __construct()
    {
        $this->_validation = new FormValidation();
    }

    public function post($field)
    {
        $this->_postData[$field] = $_POST[$field];
        $this->_currItem = $field;
        return $this;
    }

    public function fetch($fieldName = false)
    {
        if ($fieldName) {
            if (isset($this->_postData[$fieldName]))
                return $this->_postData[$fieldName];
            else
                return false;
        } else {
            return $this->_postData;
        }
    }

    public function val($typeOfValidator, $arg = null)
    {
        if ($arg == null)
            $error = $this->_validation->{$typeOfValidator}($this->_postData[$this->_currItem]);
        else
            $error = $this->_validation->{$typeOfValidator}($this->_postData[$this->_currItem], $arg);

        if ($error)
            $this->_errorArray[$this->_currItem] = $error;

        return $this;
    }

    public function submit()
    {
        if (!empty($this->_errorArray)) {
            return $this->_errorArray;
        }
    }
}