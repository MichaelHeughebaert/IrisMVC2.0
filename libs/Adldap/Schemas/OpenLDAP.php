<?php

namespace libs\Adldap\Schemas;

class OpenLDAP extends ActiveDirectory
{
    /**
     * {@inheritdoc}
     */
    public function objectCategory()
    {
        return 'objectclass';
    }

    /**
     * {@inheritdoc}
     */
    public function objectClassPerson()
    {
        return 'inetorgperson';
    }

    /**
     * {@inheritdoc}
     */
    public function distinguishedName()
    {
        return 'dn';
    }
}
