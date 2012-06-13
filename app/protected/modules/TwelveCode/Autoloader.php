<?php

namespace TwelveCode;

class AutoLoader
{
    public static function autoLoad($class)
    {
        $path = realpath(dirname(__FILE__) . '/../' . $class . '.php');

        if ($path !== false)
        {
            require_once($path);
        }
        else
        {
            return;
        }
    }
} // AutoLoader