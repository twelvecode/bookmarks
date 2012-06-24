<?php

class AuthController extends FrontController
{

//-----------------------------------------------------------------------------

    /**
     * Login screen and logic
     *
     * @return void
     */

    public function actionLogin()
    {
        Yii::import('account.models.form.*');

        $form = new LoginForm();

        if (isset($_POST['LoginForm'])) {

            $form->setAttributes($_POST['LoginForm']);

            if ($form->validate() && $form->login()) {
                $this->redirect('/');
            }
        }

        $this->render('login', array(
            'form' => $form,
        ));
    }

//-----------------------------------------------------------------------------

    /**
     * Logout screen and logic
     *
     * @return void
     */

    public function actionLogout()
    {
        if (!Yii::app()->user->isGuest) {
            Yii::app()->user->logout();
        }

        $this->render('logout');
    }

//-----------------------------------------------------------------------------

} // AuthController