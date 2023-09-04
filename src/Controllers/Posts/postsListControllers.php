<?php

namespace Controllers\Posts;

/* The "postsListControllers" class is used to manage a list of posts. */
class postsListControllers
{ 

    public $posts;

    
   public function postsList($data)
{
    if(isset($data)){
        $this->posts = $data;
    }
    return $this->posts;

}
}