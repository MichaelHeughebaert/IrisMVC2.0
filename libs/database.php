<?php

namespace libs;

class Database extends \PDO
{
    private $isLocked = false;

    /**
     * Database constructor.
     *
     * Connect to database.
     *
     * @param string $db_type Type of database
     * @param string $db_host Host of the database
     * @param string $db_name Name of the database
     * @param string $db_user User of the database
     * @param string $db_pwd Password of the database
     */
    public function __construct($db_type, $db_host, $db_name, $db_user, $db_pwd)
    {
        parent::__construct($db_type . ':host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_pwd);
    }

    /**
     * Function used to lock the database from writing.
     */
    public function lockDb()
    {
        try {
            $qry = $this->prepare("UPDATE system SET state = 1 WHERE id = 'dbLock'");
            $qry->execute();
            $this->isLocked = true;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Function to unlock the database.
     */
    public function unlockDb()
    {
        try {
            $qry = $this->prepare("UPDATE system SET state = 0 WHERE id = 'dbLock'");
            $qry->execute();
            $this->isLocked = false;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @return bool $isLocked Is the database locked?
     */
    public function isLocked()
    {
        return $this->isLocked;
    }
}