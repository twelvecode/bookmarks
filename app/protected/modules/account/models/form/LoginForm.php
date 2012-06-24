<?php

class LoginForm extends \CFormModel
{
    /**
     * User's login
     * @var string
     */

    public $login;

    /**
     * User's password
     * @var string
     */

    public $password;

    /**
     * Keep signed checkbox
     * @var bool
     */

    public $keepSigned;

    /**
     * User identity representing the user
     * @var UserIdentity
     */

    protected $identity;

//-----------------------------------------------------------------------------

    public function authenticate($username, $password)
    {
        if ($this->identity == null) {
            $this->identity = new UserIdentity($username, $password);
        }

        return $this->identity->authenticate();
    }

//-----------------------------------------------------------------------------

    public function login()
    {
        if ($this->authenticate($this->login, $this->password)) {
            Yii::app()->user->login($this->identity);
        } else {
            $this->addError('login', Yii::t('AccountModule.forms', 'Invalid login and/or password'));
        }
    }

//-----------------------------------------------------------------------------

    public function rules()
    {
        return array(
            array('login, password', 'required'),
            array('keepSigned', 'boolean'),
        );
    }

//-----------------------------------------------------------------------------

    public function attributeLabels()
    {
        return array(
            'login' => Yii::t('AccountModule.forms', 'Your username'),
            'password' => Yii::t('AccountModule.forms', 'Your password'),
            'keepSigned' => Yii::t('AccountModule.forms', 'Keep me signed in'),
        );
    }

//-----------------------------------------------------------------------------

} // LoginForm