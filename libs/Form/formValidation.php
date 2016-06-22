<?php

namespace libs\Form;

class FormValidation
{
    public function __construct() {}

    public function required($data)
    {
        if (empty($data)) {
            return "Dit veld mag niet leeg zijn";
        }
    }
}