<?php

namespace Model\User;

class updatePassModel
{
    private $valide = '0';
    private $update = null;
    private $updateVerif = null;

    public function updatePass()
    {
        if($this->update == $this->updateVerif){
            return $this->valide = '1';
        }
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
            return $this->$name;
        
    }

    public function __isset($name)
    {
        return isset($this->$name);
    }
}