<?php

namespace TwelveCode\Account\Model;

use TwelveCode\Account\Model\om\BaseUser;


/**
 * Skeleton subclass for representing a row from the 'user' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.account.models
 */
class User extends BaseUser
{

//-----------------------------------------------------------------------------

    /**
     * Encrypts given password
     *
     * @static
     *
     * @param string $password The password to be encrypted
     *
     * @return string Encrypted password
     */

    public static function encryptPassword($password)
    {
        return md5($password);
    }

//-----------------------------------------------------------------------------

    public function setPassword($v)
    {
        return parent::setPassword(static::encryptPassword($v));
    }

//-----------------------------------------------------------------------------

} // User
