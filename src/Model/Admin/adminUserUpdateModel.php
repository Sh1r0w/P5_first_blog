<?php

namespace Model\Admin;

/* The adminUserUpdateModel class is used to update the value of the key property based on the input
key value. */
class adminUserUpdateModel
{
    public $key;
    public function adminUpdate($key)
    {
        if($key == '1'){
            return $this->key = '0';
        }else{
            return $this->key ='1';
        }
    }

}