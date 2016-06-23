<?php

namespace libs;

class Database extends \PDO
{
    /**
     * Database constructor.
     *
     * Connect to database.
     *
     * @param string $db_type
     * @param string $db_host
     * @param string $db_name
     * @param string $db_user
     * @param string $db_pwd
     */
    public function __construct($db_type, $db_host, $db_name, $db_user, $db_pwd)
    {
        parent::__construct($db_type . ':host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_pwd);
    }
}