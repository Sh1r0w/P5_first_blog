<?php

namespace Controllers\Fonction;

class Autoloader
{
    
    static function register(): void
    {
        
        spl_autoload_register(static function(string $class)
        {
            if($class == 'Controllers\logout'){
                session_destroy();
                header('Location: /');
            }elseif($class != 'Controllers\logout'){
                $path = str_replace(['Controllers\\', '\\'], ['../src/Controllers/', '/'], $class) . '.php';
                require_once($path);
            
            }
           
            //echo file_exists($class);
            
        });
    }

}
