<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'Bookmarks',
    'theme' => 'classic',

    // preloading 'log' component
    'preload'=>array('log', 'bootstrap'),

    'modules'=>array(
        'core',
        'account',
        'bookmarks',
    ),

    // autoloading model and component classes
    'import'=>array(
        'application.models.*',
        'application.components.*',
        'core.components.*',
        'account.components.*',
    ),

    // application component
    'components'=>array(
//        'request' => array(
//            'scriptUrl' => '/bookmarks/app/index.php',
//        ),

        'user'=>array(
            // enable cookie-based authentication
            'allowAutoLogin'=>true,
        ),
        // uncomment the following to enable URLs in path-format

        'urlManager'=>array(
            'urlFormat'=>'path',
            'rules'=>array(
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ),
//            'showScriptName' => false,
        ),

        // uncomment the following to use a MySQL database
        /*
          'db'=>array(
              'connectionString' => 'mysql:host=localhost;dbname=testdrive',
              'emulatePrepare' => true,
              'username' => 'root',
              'password' => '',
              'charset' => 'utf8',
          ),
          */
        'errorHandler'=>array(
            // use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
        'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning',
                ),
                // uncomment the following to show log messages on web pages
                /*
                    array(
                        'class'=>'CWebLogRoute',
                    ),
                    */
            ),
        ),

        'bootstrap'=>array(
            'class' => 'ext.bootstrap.components.Bootstrap',
        ),
//        'clientScript' => array(
//            'class' => 'CClientScript',
//            'packages' => array(
//                'bootstrap' => array(
//                    'basePath' => realpath(dirname(__FILE__) . '/../../themes/classic/vendor/bootstrap'),
//                    'js' => array(
//                        'js/bootstrap.min.js',
//                    ),
//                    'css' => array(
//                        'css/bootstrap.min.css',
//                    ),
//                ), // bootstrap
//            ), // packages
//        ), // clientScript
    ),



    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'gm.godlewski@twelvecode.com',
        'version'    => '0.1.0',
    ),
);