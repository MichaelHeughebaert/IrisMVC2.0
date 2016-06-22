<?php

namespace libs\Adldap\Contracts;

use libs\Adldap\Contracts\Connections\ManagerInterface;
use libs\Adldap\Contracts\Connections\ProviderInterface;

interface AdldapInterface
{
    /**
     * Constructor.
     *
     * @param ManagerInterface $manager
     *
     * @throws \libs\Adldap\Exceptions\AdldapException
     * @throws \InvalidArgumentException
     */
    public function __construct(ManagerInterface $manager);

    /**
     * Returns the current manager instance.
     *
     * @return ManagerInterface
     */
    public function getManager();

    /**
     * Sets the connection manager.
     *
     * @param ManagerInterface $manager
     */
    public function setManager(ManagerInterface $manager);

    /**
     * Adds a provider to the connection Manager.
     *
     * @param string            $name
     * @param ProviderInterface $provider
     *
     * @return ProviderInterface
     */
    public function addProvider($name, ProviderInterface $provider);

    /**
     * Retrieves a provider from the connection Manager.
     *
     * @param string $name
     *
     * @throws \libs\Adldap\Exceptions\AdldapException
     *
     * @return ProviderInterface
     */
    public function getProvider($name);

    /**
     * Retrieves the default provider from the connection Manager.
     *
     * @throws \libs\Adldap\Exceptions\AdldapException
     *
     * @return ProviderInterface
     */
    public function getDefaultProvider();

    /**
     * Connects and binds to the configured LDAP server.
     *
     * Returns a new connection Manager instance on success.
     *
     * @param string      $connection
     * @param string|null $username
     * @param string|null $password
     *
     * @throws \libs\Adldap\Exceptions\ConnectionException
     * @throws \libs\Adldap\Exceptions\Auth\BindException
     * @throws \libs\Adldap\Exceptions\AdldapException
     *
     * @return \libs\Adldap\Contracts\Connections\ProviderInterface
     */
    public function connect($connection, $username = null, $password = null);
}
