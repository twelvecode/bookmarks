<?php

class CConsoleCommandExt extends CConsoleCommand
{

//------------------------------------------------------------------------------

    public function init()
    {
        parent::init();

        // Include the main Propel script
        require_once realpath(dirname(__FILE__) . '/../../../../vendor/propel/runtime/lib/Propel.php');
        spl_autoload_unregister(array('YiiBase', 'autoload'));

        // Initialize Propel with the runtime configuration
        Propel::init(realpath(dirname(__FILE__) . '/../../config/modules-conf.php'));

        // Location shifting required
        $classes = require_once(realpath(dirname(__FILE__) . '/../../config/classmap-modules-conf.php'));

        // Add the generated 'classes' directory to the include path
        set_include_path(realpath(dirname(__FILE__) . '/../../modules/') . PATH_SEPARATOR . get_include_path());
        spl_autoload_register(array('YiiBase', 'autoload'));
    }

//------------------------------------------------------------------------------

} // CConsoleCommandExt