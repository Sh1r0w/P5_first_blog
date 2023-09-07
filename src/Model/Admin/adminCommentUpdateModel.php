<?php

namespace Model\Admin;

/* The adminPostsUpdateModel class is used to update the value of the key property based on the input
key value. */
class adminCommentUpdateModel
{
    public $key;
    
    public function commentUpdate($key)
    {
        if($key == "1"){
            return $this->key = "0";
        }else{
            return $this->key = "1";
        }

    }
}