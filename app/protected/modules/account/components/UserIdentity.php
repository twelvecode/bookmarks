<?php

use TwelveCode\Account\Model\UserQuery;
use \TwelveCode\Account\Model\User;

class UserIdentity extends CUserIdentity
{

    /**
     * Entity's ID
     * @var int
     */

    private $id;

//-----------------------------------------------------------------------------

    public function getId()
    {
        return $this->id;
    }

//-----------------------------------------------------------------------------

	public function authenticate()
	{
        $pass = User::encryptPassword($this->password);
        $user = UserQuery::create()->filterByLogin($this->username)
                                   ->filterByPassword($pass)
                                   ->findOne();

        if ($user === null) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else if ($user->getPassword() !== $pass) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else {
            $this->id = $user->getId();
            $this->errorCode = self::ERROR_NONE;
        }

		return !$this->errorCode;
	}

//-----------------------------------------------------------------------------

} // UserIdentity
