<?php

namespace Controllers\Fonction;

class Session
{
    public function __set(string $name, mixed $value)
    {
        $_SESSION[$name] = $value;
    }

    public function __get(string $name)
    {
        if (array_key_exists($name, $_SESSION)) {
            return $_SESSION[$name];
        }
    }

    public function __isset(string $name)
    {
        return isset($_SESSION[$name]);
    }
}
