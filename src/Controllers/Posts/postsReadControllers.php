<?php

namespace Controllers\Posts;

/* The class "postsReadControllers" is used to handle the reading of posts and redirect to the "posts"
page if no data is provided. */
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