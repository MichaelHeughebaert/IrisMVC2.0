<?php

namespace libs\Form;

class FormValidation
{
    private $_returnValue = array();

    public function __construct() {}

    /**
     * Function to check if there is data that has been inputted.
     *
     * @param string $data Data that needs to be validated
     * @return string Error message to be displayed
     */
    public function required($data)
    {
        $this->_returnValue = array('value' => $data);

        if (empty($data))
            $this->_returnValue = array_merge($this->_returnValue, array('msg' => 'Dit veld mag niet leeg zijn'));

        return $this->_returnValue;
    }
}