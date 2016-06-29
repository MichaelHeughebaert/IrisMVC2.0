<?php

namespace libs;

use libs\Adldap\Adldap;
use libs\Adldap\Connections\Provider;
use libs\Adldap\Exceptions\Auth\BindException;

class Model
{
    /**
     * Model constructor.
     *
     * Establishes connection to the AD-server.
     * Establishes connection to the SQL-server.
     */
    public function __construct()
    {
        $config = [
            'domain_controllers'    => array(BASE_DC),
            'base_dn'               => BASE_DN,
            'admin_username'        => BASE_ADM,
            'admin_password'        => BASE_PWD,

            // Optional Configuration Options
            'account_suffix'        => ACC_SUFF,
        ];

        $this->ldap = new Adldap();
        $this->provider = new Provider($config);
        $this->ldap->addProvider('default', $this->provider);

        try {
            $this->ldap->connect('default');
        } catch (BindException $e) {
            die('Kan geen verbinding met de active directory tot stand brengen!');
        }

        $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PWD);
    }
}