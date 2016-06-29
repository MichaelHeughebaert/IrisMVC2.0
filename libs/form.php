<?php

namespace libs;

use libs\Form\FormValidation;

class Form
{
    private $_validation = null;
    private $_errorArray = array('hasError' => 0);
    private $_currItem = null;
    private $_postData = array();

    /**
     * Form constructor.
     */
    public function __construct()
    {
        $this->_validation = new FormValidation();
    }

    /**
     * Function to populate the form data.
     *
     * @param string $field Key of the value in $_POST
     * @return Object $this Form object
     */
    public function post($field)
    {
        if (isset($_POST[$field])) {
            $this->_postData[$field] = $_POST[$field];
            $this->_currItem = $field;
        }
        return $this;
    }

    /**
     * Function to call the value of a field.
     *
     * @param string|bool $fieldName Field name
     * @return array|string All data or specific field
     */
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

    /**
     * Function used to call validation.
     *
     * @param string $typeOfValidator Validator that needs to be called
     * @param mixed $arg Argument used in validation, e.g. length
     * @return Object $this Form object
     */
    public function val($typeOfValidator, $arg = null)
    {
        if ($arg == null)
            $error = $this->_validation->{$typeOfValidator}($this->_postData[$this->_currItem]);
        else
            $error = $this->_validation->{$typeOfValidator}($this->_postData[$this->_currItem], $arg);

        if (isset($error['msg'])) {
            $this->_errorArray['hasError'] = true;
        }

        $this->_errorArray[$this->_currItem] = $error;

        return $this;
    }

    /**
     * Function used to get all errors of the form.
     *
     * @return array Array containing all errors
     */
    public function submit()
    {
        if (!empty($this->_errorArray)) {
            return $this->_errorArray;
        }
    }
}