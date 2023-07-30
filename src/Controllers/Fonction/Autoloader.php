<?php

namespace Controllers\Fonction;

class Autoloader
{
    
    static function register(): void
    {
        
        spl_autoload_register(static function(string $class)
        {
            $firstPath = 'model\Posts\\';
            $test = strpos($class, $firstPath);

            if($test !== false)
            {
                $path = str_replace(['model\Posts\\', '\\'], ['../src/model/', '/'], $class) . '.php';
                require_once($path);
            } else {
                $path = str_replace(['Controllers\Fonction\\', '\\'], ['../src/Controllers/Fonction/', '/'], $class) . '.php';
                require_once($path);
            }

           
            //echo file_exists($class);
            
        });
    }

}
