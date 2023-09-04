<?php

namespace Model\Admin;

class adminPostsUpdateModel
{
    public $key;
    
    public function postsUpdate($key)
    {
        if($key == "1"){
            return $this->key = "0";
        }else{
            return $this->key = "1";
        }

    }
}