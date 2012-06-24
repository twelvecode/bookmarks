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