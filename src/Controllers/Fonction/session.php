<?php

namespace Controllers\Fonction;

class Session
{
    public function __set($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public function __get($name)
    {
        if (array_key_exists($name, $_SESSION)) {
            return $_SESSION[$name];
        }
    }

    public function __isset($name)
    {
        return isset($_SESSION[$name]);
    }
}
