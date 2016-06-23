<?php

namespace controllers;

use libs\Controller;

class Sync extends Controller
{
    /**
     * Sync constructor.
     */
    public function __construct()
    {
        parent::__construct(true);
    }

    /**
     * Synchronizes most recent data from AD to MySQL.
     */
    public function SyncADtoDB()
    {
        $this->model->SyncADtoDB();
    }
}