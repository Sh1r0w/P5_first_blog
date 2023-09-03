<?php

namespace Controllers\Posts;

class postsReadControllers
{
    public $postsRead;

    public function postsReadControllers($data)
    {
        
        if(isset($data)){
            return $this->postsRead = $data;
        }else{
            header('location: posts');
        }
        return $this->postsRead;


    }
}