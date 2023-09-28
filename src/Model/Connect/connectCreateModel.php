<?php

namespace Model\Connect;

/* The connectCreate class is used to create a new connect and password entry in a database table. */
class connectCreateModel
{
    private $data = array();

    public function connectCreate(\Controllers\Fonction\factory $fact): bool
    {

        if (isset($this->data['email'], $this->data['passwordH'])) {
            return $fact->instance('Controllers\Repository', 'connectRepo')->create($this->data['email'], $this->data['passwordH']);
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
