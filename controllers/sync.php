<?php

namespace controllers;

use libs\Controller;

class Sync extends Controller
{
    /**
     * Synchronizes most recent data from AD to MySQL.
     *
     * @param bool $verbose String output of sync
     */
    public function SyncADtoDB($verbose = false)
    {
        $this->model->SyncADtoDB($verbose);
    }
}