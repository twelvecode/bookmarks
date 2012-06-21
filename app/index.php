<?php

// Check the maintenance mode
$maintenanceFile = dirname(__FILE__) . '/maintenance.php';

if (file_exists($maintenanceFile))
{
    require_once ($maintenanceFile);
    return;
}

// Integrate Propel
// Include the main Propel script
require_once dirname(__FILE__) . '/../vendors/propel/runtime/lib/Propel.php';

// Initialize Propel with the runtime configuration
Propel::init(dirname(__FILE__) . '/protected/config/modules-conf.php');

// Add the generated 'classes' directory to the include path
set_include_path(dirname(__FILE__) . '/protected/modules' . PATH_SEPARATOR . get_include_path());

// change the following paths if necessary
$yii=dirname(__FILE__).'/../yii/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();
