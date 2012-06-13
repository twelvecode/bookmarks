<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../yii/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

// TwelveCode Autoloader Register
require_once (dirname(__FILE__) . '/protected/modules/TwelveCode/AutoLoader.php');

spl_autoload_register(array('\TwelveCode\AutoLoader', 'autoLoad'));

require_once($yii);
Yii::createWebApplication($config)->run();
