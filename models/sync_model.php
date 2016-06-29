<?php

namespace models;

use libs\Model;

class Sync_model extends Model
{
    private $_ADUsers;
    private $_ADGroups;

    /**
     * Sync_model constructor.
     *
     * Gets all users from the AD.
     * Gets all groups from the AD.
     */
    public function __construct()
    {
        $this->_setADUsers($this->provider->search()->users()->sortBy('cn')->get());
        $this->_setADGroups($this->provider->search()->groups()->sortBy('cn')->get());
    }

    /**
     * Function used to filter the user data from the AD.
     * Only users with a samaccountname like P0000000 are kept.
     *
     * @param array $rawADUsers Raw userData from AD
     */
    private function _setADUsers($rawADUsers)
    {
        $filteredADUsers = array();

        foreach ($rawADUsers as $ADUser) {
            if (preg_match('/p(.*)\d{7}/', $ADUser['samaccountname'][0])) {
                array_push($filteredADUsers, $ADUser);
            }
        }

        $this->_ADUsers = $filteredADUsers;
    }

    /**
     * Function used to filter the group data from the AD.
     * Only groups with a cn like GRP_ or Mailgroep_ are kept.
     *
     * @param array $rawADGroups Raw groupData from AD
     */
    private function _setADGroups($rawADGroups)
    {
        $filteredADGroups = array();

        foreach ($rawADGroups as $ADGroup) {
            if (preg_match('/^GRP_(.*)/', $ADGroup['cn'][0]) || preg_match('/^_Mailgroep(.*)/', $ADGroup['cn'][0])) {
                array_push($filteredADGroups, $ADGroup);
            }
        }

        $this->_ADGroups = $filteredADGroups;
    }

    /**
     * Function to do complete sync with AD.
     *
     * Lock database.
     * Sync AD groups to database.
     * Sync AD users to database.
     * Unlock database.
     *
     * @param bool $verbose String output of actions?
     */
    public function SyncADtoDB($verbose)
    {
        $this->_lockDb($verbose);
        $this->_SyncADGroupsToDB($verbose);
        $this->_SyncADUsersToDB($verbose);
        $this->_unlockDb($verbose);
    }

    /**
     * Function used to lock the database.
     *
     * @param $verbose String output of actions
     */
    private function _lockDb($verbose)
    {
        echo ($verbose) ? 'Starting database sync... <br />' : '';
        $this->db->lockDb();
    }

    /**
     * Function used to sync AD data to MySQL.
     *
     * @param $verbose String output of actions
     */
    private function _SyncADGroupsToDB($verbose)
    {
        echo ($verbose) ? '<br /> Starting group sync <br /><br />' : '';

        foreach ($this->_ADGroups as $ADGroup) {
            echo ($verbose) ? 'Syncing ' . $ADGroup['cn'][0] . ' <br />' : '';
        }
    }

    /**
     * Function used to sync AD data to MySQL.
     *
     * @param $verbose String output of actions
     */
    private function _SyncADUsersToDB($verbose)
    {
        echo ($verbose) ? '<br /> Starting user sync <br /><br />' : '';

        foreach ($this->_ADUsers as $ADUser) {
            echo ($verbose) ? 'Syncing ' . $ADUser['samaccountname'][0] . ' - ' . $ADUser['cn'][0] . ' <br />' : '';

            $id = $ADUser->getAttribute('samaccountname', 0);
            $idExt = $ADUser->getAttribute('employeenumber', 0);
            $fName = $ADUser->getAttribute('givenname', 0);
            $name = $ADUser->getAttribute('sn', 0);
            $dName = $ADUser->getAttribute('distinguishedname', 0);

            $qry = $this->db->prepare('INSERT INTO systemuser (id, idExt, fName, name, dName)
                                       VALUES (:id, :idExt, :fName, :name, dName)
                                       ON DUPLICATE KEY UPDATE idExt = :idExt, fName = :fName, name = :name, dName = :dName');
            $qry->bindParam(':id', $id);
            $qry->bindParam(':idExt', $idExt);
            $qry->bindParam(':fName', $fName);
            $qry->bindParam(':name', $name);
            $qry->bindParam(':dName', $dName);
            $qry->execute();
        }
    }

    /**
     * Function used to unlock the database.
     *
     * @param $verbose String output of actions
     */
    private function _unlockDb($verbose)
    {
        echo ($verbose) ? '<br /> Database sync complete!' : '';
        $this->db->unlockDb();
    }
}
