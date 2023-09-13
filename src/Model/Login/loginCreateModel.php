<?php

namespace Model\Login;

/* The loginCreate class is used to create a new login and password entry in a database table. */
class loginCreateModel
{

    private $data = array();

    public function loginCreate(\Controllers\Fonction\factory $fact): bool
    {

        if(isset($this->data['email'], $this->data['passwordH']))
        {

            return $fact->instance('Controllers\Repository', 'loginRepo')->create($this->data['email'], $this->data['passwordH']);
        }
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }
    
    public function __get($name)
    {
        return $this->data[$name];
    }

    public function __isset($name)
    {
        return isset($this->data[$name]);
    }
}