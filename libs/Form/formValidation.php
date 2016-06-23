<?php

namespace libs\Form;

class FormValidation
{
    public function __construct() {}

    /**
     * Function to check if there is data that has been inputted.
     *
     * @param string $data Data that needs to be validated
     * @return string Error message to be displayed
     */
    public function required($data)
    {
        if (empty($data)) {
            return "Dit veld mag niet leeg zijn";
        }
    }
}