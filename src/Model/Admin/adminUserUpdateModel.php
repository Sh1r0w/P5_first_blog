<?php

namespace Model\Admin;

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