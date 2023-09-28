<?php

namespace Controllers\Fonction;

/* The `class Autoloader` is responsible for registering an autoloader function in PHP. This autoloader
function is used to automatically load classes when they are needed, without the need to manually
include the class files. */
class Autoloader
{
    static function register()
    {

        spl_autoload_register(static function (string $class) {
            if (file_exists(dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . $class . '.php')) {
                $path = dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . $class . '.php';
                //echo $path;
                require_once $path;
            }
        });
    }
}
