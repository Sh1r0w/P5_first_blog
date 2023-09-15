<?php

namespace Model\Admin;

/* The adminpostUpdateModel class is used to update the value of the key property based on the input
key value. */
class adminPostUpdateModel
{
    public $key;
    
    public function postUpdate($key)
    {
        if($key == "1"){
            return $this->key = "0";
        }else{
            return $this->key = "1";
        }

    }
}