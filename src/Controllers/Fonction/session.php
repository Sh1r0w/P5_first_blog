<?php

namespace Controllers\Fonction;

class session
{

    private static $_getSession;

    public static function getSession($input){
        if(is_null(self::$_getSession)){
            self::$_getSession = new session($input);
        }
        return self:: $_getSession;
    }


    public function __set($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public function __get($name)
    {
        if (array_key_exists($name, $_SESSION))
        {
            return $_SESSION[$name];
        }
    }
}