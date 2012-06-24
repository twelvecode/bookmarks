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
        );
    }

//-----------------------------------------------------------------------------

    public function attributeLabels()
    {
        return array(
            'login' => Yii::t('account', 'Your username'),
            'password' => Yii::t('account', 'Your password'),
            'keepSigned' => Yii::t('account', 'Keep me signed in'),
        );
    }

//-----------------------------------------------------------------------------

} // LoginForm