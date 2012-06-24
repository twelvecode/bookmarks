<?php

class AuthController extends FrontController
{
    public function actionIndex()
    {

    }

    public function actionLogin()
    {
        Yii::import('account.models.form.*');

        $form = new LoginForm();

        $this->render('login', array(
            'form' => $form,
        ));
    }

    public function actionLogout()
    {

    }
}