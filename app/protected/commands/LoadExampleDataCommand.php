<?php

Yii::import('application.components.console.*');

use TwelveCode\Account\Model\User;
use \TwelveCode\Account\Model\UserQuery;

class LoadExampleDataCommand extends CConsoleCommandExt
{
    public function run($args)
    {
        echo 'Cleaning up user data' . PHP_EOL;

        UserQuery::create()->deleteAll();

        $users = [
            'user1' => 'pass1',
            'user2' => 'pass2',
            'user3' => 'pass3',
        ];

        foreach ($users as $login => $password)
        {
            echo 'Creation of user ' . $login . ' account' . PHP_EOL;

            $user = new User();

            $user->setLogin($login);
            $user->setPassword($password);

            $user->save();
        }

    }
} // LoadExampleDataCommand