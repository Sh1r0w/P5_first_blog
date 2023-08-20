<?php

namespace Controllers\Fonction;

class Autoloader
{
    
    static function register()
    {
        
        spl_autoload_register(static function(string $class)
        {
            if($class == 'Controllers\logout'){
                session_destroy();
                header('Location: /');
            }elseif($class != 'Controllers\logout'){
                if(file_exists(dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . $class. '.php')){
                $path = dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . $class. '.php';
                //echo $path;
                require_once $path;
            }
            }
            
        });
    }

}
