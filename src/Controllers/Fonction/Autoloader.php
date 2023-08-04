<?php

namespace Controllers\Fonction;

class Autoloader
{
    
    static function register(): void
    {
        
        spl_autoload_register(static function(string $class)
        {

                $path = str_replace(['Controllers\\', '\\'], ['../src/Controllers/', '/'], $class) . '.php';
                echo $path;
                require_once($path);
            

           
            //echo file_exists($class);
            
        });
    }

}
